<?php

session_start();
include '../backend/connect_database.php';

try {
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"

    // SQL query to count pending transactions
    $countPendingSql = "SELECT COUNT(*) AS total_pending_transactions FROM transact WHERE status = 'pending'";
    $stmt1 = $pdo->prepare($countPendingSql);
    $stmt1->execute();
    $countPending = $stmt1->fetch(PDO::FETCH_ASSOC);

    // Count WDS
    $countPendingSql4 = "SELECT COUNT(*) AS total_pending_WDS FROM transact WHERE (DATE(date_created) = :currentDate OR status = 'pending')  AND status = 'pending' AND (transact_type = 'Withdrawing Enrollment' OR transact_type = 'Dropping Subjects' OR transact_type = 'Shifting')";
    $stmt4 = $pdo->prepare($countPendingSql4);
    $stmt4->bindParam(':currentDate', $currentDate);
    $stmt4->execute();
    $countWDS = $stmt4->fetch(PDO::FETCH_ASSOC);

    // Count LOA
    $countPendingSql1 = "SELECT COUNT(*) AS total_pending_LOA FROM transact WHERE (DATE(date_created) = :currentDate OR status = 'pending') AND transact_type = 'leave_of_absence'AND status = 'pending'";
    $stmt2 = $pdo->prepare($countPendingSql1);
    $stmt2->bindParam(':currentDate', $currentDate);
    $stmt2->execute();
    $countLOA = $stmt2->fetch(PDO::FETCH_ASSOC);

    // Count RA
    $countPendingSql2 = "SELECT COUNT(*) AS total_pending_RA FROM transact WHERE (DATE(date_created) = :currentDate OR status = 'pending') AND transact_type = 'readmission'AND status = 'pending'";
    $stmt3 = $pdo->prepare($countPendingSql2);
    $stmt3->bindParam(':currentDate', $currentDate);
    $stmt3->execute();
    $countRA = $stmt3->fetch(PDO::FETCH_ASSOC);

    // Count RS
    $countPendingSql3 = "SELECT COUNT(*) AS total_pending_RS FROM transact WHERE (DATE(date_created) = :currentDate OR status = 'pending') AND transact_type = 'referral' AND status = 'pending'";
    $stmt5 = $pdo->prepare($countPendingSql3);
    $stmt5->bindParam(':currentDate', $currentDate);
    $stmt5->execute();
    $countRS = $stmt5->fetch(PDO::FETCH_ASSOC);

    // Count Appointments
    $countAppointmentsSql = "SELECT COUNT(*) AS total_appointments FROM `appointment` WHERE (DATE(date) = :currentDate OR `status` = 'pending')";
    $stmt6 = $pdo->prepare($countAppointmentsSql);
    $stmt6->bindParam(':currentDate', $currentDate);
    $stmt6->execute();
    $countAppointments = $stmt6->fetch(PDO::FETCH_ASSOC);

    // Fetch admin user data
    $adminUserDataSql = "SELECT `email`, `position`, `date_joined`, `first_name`, `last_name`, `position`, `gender` FROM admin_user";
    $stmt7 = $pdo->prepare($adminUserDataSql);
    $stmt7->execute();
    $adminUserData = $stmt7->fetchAll(PDO::FETCH_ASSOC);

    // Fetch the latest data based on the date_created column
    $latestDataSql = "SELECT transact.transact_id, transact.student_id, transact.transact_type, transact.date_created, student_user.first_name, student_user.last_name
                        FROM transact
                        INNER JOIN student_user ON transact.student_id = student_user.stud_user_id
                        WHERE transact.status = 'pending'
                        ORDER BY `date_created` DESC
                        LIMIT 1;";

    $stmt8 = $pdo->prepare($latestDataSql);
    $stmt8->execute();
    $latestData = $stmt8->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($latestData)) {
        // Combine the latest data, count of pending transactions, appointments, and admin user data
        $response = [
            'latest_data' => $latestData,
            'total_pending_transactions' => $countPending['total_pending_transactions'],
            'total_pending_LOA' => $countLOA['total_pending_LOA'],
            'total_pending_RA' => $countRA['total_pending_RA'],
            'total_pending_RS' => $countRS['total_pending_RS'],
            'total_pending_WDS' => $countWDS['total_pending_WDS'],
            'total_appointments' => $countAppointments['total_appointments'],
            'adminUserData' => $adminUserData
        ];

        // Return data as JSON and set the content type header to JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = [

            'adminUserData' => $adminUserData
        ];
        // Return an empty JSON object if no results are found
                // Return data as JSON and set the content type header to JSON
                header('Content-Type: application/json');
                echo json_encode($response);
    }
} catch (PDOException $e) {
    // Handle any errors by returning a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    error_log('An error occurred: ' . $e->getMessage()); // Log the error to the server log
}
?>
