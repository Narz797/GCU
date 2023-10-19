<?php

session_start();
include '../backend/connect_database.php';

try {
    // SQL query to fetch the latest data based on the date_created column
    $latestDataSql = "SELECT `student_id`, `transact_type`, `date_created`
    FROM transact
    WHERE `status` = 'pending' AND `date_created` = (SELECT MAX(`date_created`) FROM transact WHERE `status` = 'pending');
    ";
    
    $stmt = $pdo->prepare($latestDataSql); // Use $pdo here
    $stmt->execute();

    $latestData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // SQL query to count pending transactions
    $countPendingSql = "SELECT COUNT(*) AS total_pending_transactions FROM transact WHERE status = 'pending'";
    $stmt = $pdo->prepare($countPendingSql);
    $stmt->execute();

    $countPending = $stmt->fetch(PDO::FETCH_ASSOC);

    
    // SQL query to count appointments for the current date
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
    $countAppointmentsSql = "SELECT COUNT(*) AS total_appointments FROM `appointment` WHERE DATE(date) = :currentDate AND `status` = 'pending'";
    $stmt = $pdo->prepare($countAppointmentsSql);
    $stmt->bindParam(':currentDate', $currentDate);
    $stmt->execute();

    $countAppointments = $stmt->fetch(PDO::FETCH_ASSOC);

    // SQL query to fetch email, position, and date_joined from the admin_user table
    $adminUserDataSql = "SELECT `email`, `position`, `date_joined` FROM admin_user";
    $stmt = $pdo->prepare($adminUserDataSql);
    $stmt->execute();
    $adminUserData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($latestData)) {
        // Combine the latest data, count of pending transactions, appointments, and admin user data
        
        $response = [
            'latest_data' => $latestData,
            'total_pending_transactions' => $countPending['total_pending_transactions'],
            'total_appointments' => $countAppointments['total_appointments'],
            'adminUserData' => $adminUserData
        ];

        // Return data as JSON and set the content type header to JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Return an empty JSON object if no results are found
        echo json_encode([]);
    }
} catch (PDOException $e) {
    // Handle any errors by returning a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    error_log('An error occurred: ' . $e->getMessage()); // Log the error to the server log
}
?>
