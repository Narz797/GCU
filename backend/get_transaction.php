<?php

session_start();
include '../backend/connect_database.php';

try {


    // SQL query to count pending transactions
    $countPendingSql = "SELECT COUNT(*) AS total_pending_transactions FROM transact WHERE status = 'pending'";
    $stmt = $pdo->prepare($countPendingSql);
    $stmt->execute();

    $countPending = $stmt->fetch(PDO::FETCH_ASSOC);

    // LOA
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
    $countPendingSql1 = "SELECT COUNT(*) AS total_pending_LOA FROM transact WHERE DATE(date_created) = :currentDate AND status = 'pending' AND transact_type = 'leave_of_absence'";
    $stmt = $pdo->prepare($countPendingSql1);
    $stmt->bindParam(':currentDate', $currentDate);
    $stmt->execute();
    
    $countLOA = $stmt->fetch(PDO::FETCH_ASSOC);

        // RA
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
    $countPendingSql2 = "SELECT COUNT(*) AS total_pending_RA FROM transact WHERE DATE(date_created) = :currentDate AND status = 'pending' AND transact_type = 'readmission'";
    $stmt = $pdo->prepare($countPendingSql2);
    $stmt->bindParam(':currentDate', $currentDate);
    $stmt->execute();
    
    $countRA = $stmt->fetch(PDO::FETCH_ASSOC);

        // RS
        $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
        $countPendingSql3 = "SELECT COUNT(*) AS total_pending_RS FROM transact WHERE DATE(date_created) = :currentDate AND status = 'pending' AND transact_type = 'referral'";
        $stmt = $pdo->prepare($countPendingSql3);
        $stmt->bindParam(':currentDate', $currentDate);
        $stmt->execute();
        
        $countRS = $stmt->fetch(PDO::FETCH_ASSOC);

    // WDS
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
    $countPendingSql4 = "SELECT COUNT(*) AS total_pending_WDS FROM transact WHERE DATE(date_created) = :currentDate AND status = 'pending' AND transact_type = 'WDS'";
    $stmt = $pdo->prepare($countPendingSql4);
    $stmt->bindParam(':currentDate', $currentDate);
    $stmt->execute();
    
    $countWDS = $stmt->fetch(PDO::FETCH_ASSOC);

    
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

        // SQL query to fetch the latest data based on the date_created column
        $latestDataSql = "SELECT `student_id`, `transact_type`, `date_created`
        FROM transact
        WHERE `status` = 'pending'
        ORDER BY `date_created` DESC
        LIMIT 1; 
        ";
        
        $stmt = $pdo->prepare($latestDataSql); // Use $pdo here
        $stmt->execute();
    
        $latestData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($latestData)) {
        // Combine the latest data, count of pending transactions, appointments, and admin user data
        
        $response = [
            'latest_data' => $latestData,
            'total_pending_transactions' => $countPending['total_pending_transactions'],
            // 
            'total_pending_LOA' => $countLOA['total_pending_LOA'],
            'total_pending_RA' => $countRA['total_pending_RA'],
            'total_pending_RS' => $countRS['total_pending_RS'],
            'total_pending_WDS' => $countWDS['total_pending_WDS'],
            // 
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
