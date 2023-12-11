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

        // Count CA
    $countPendingSql5 = "SELECT COUNT(*) AS total_pending_CA FROM transact WHERE (DATE(date_created) = :currentDate OR status = 'pending') AND status = 'pending' AND (transact_type = 'Absent' OR transact_type = 'Tardy' OR transact_type = 'Academic Deficiency/ies')";
    $stmt9 = $pdo->prepare($countPendingSql5);
    $stmt9->bindParam(':currentDate', $currentDate);
    $stmt9->execute();
    $countCA = $stmt9->fetch(PDO::FETCH_ASSOC);

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


    $latestDataSql = "SELECT transact.transact_id, transact.student_id,  transact.teacher_id, transact.transact_type, transact.date_created, student_user.first_name, student_user.last_name
    FROM transact
    INNER JOIN student_user ON transact.student_id = student_user.stud_user_id
    WHERE transact.status = 'pending'
    ORDER BY `date_created` DESC
    LIMIT 1;";

    $stmt8 = $pdo->prepare($latestDataSql);
    $stmt8->execute();
    $latestData = $stmt8->fetchAll(PDO::FETCH_ASSOC);

    // Fetch admin user data
    $id = $_SESSION['session_id'];

    $adminUserDataSql = "SELECT `email`, `position`, `date_joined`, `contact`, `first_name`, `last_name`, `gender` FROM admin_user WHERE `admin_user_id` = :adminUserId";
    $stmt7 = $pdo->prepare($adminUserDataSql);
    $stmt7->bindParam(':adminUserId', $id); // Bind the session id to the parameter
    $stmt7->execute();
    $adminUserData = $stmt7->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($latestData)) {
        $response = [
            'latest_data' => $latestData,
            'total_pending_transactions' => $countPending['total_pending_transactions'],
            'total_pending_CA' => $countCA['total_pending_CA'],
            'total_pending_LOA' => $countLOA['total_pending_LOA'],
            'total_pending_RA' => $countRA['total_pending_RA'],
            'total_pending_RS' => $countRS['total_pending_RS'],
            'total_pending_WDS' => $countWDS['total_pending_WDS'],
            'total_appointments' => $countAppointments['total_appointments'],
            'adminUserData' => $adminUserData,
        ];
    } else {
        $response = [
            'latest_data' => [], // No results for latest_data
            'total_pending_transactions' => $countPending['total_pending_transactions'],
            'total_pending_CA' => $countCA['total_pending_CA'],
            'total_pending_LOA' => $countLOA['total_pending_LOA'],
            'total_pending_RA' => $countRA['total_pending_RA'],
            'total_pending_RS' => $countRS['total_pending_RS'],
            'total_pending_WDS' => $countWDS['total_pending_WDS'],
            'total_appointments' => $countAppointments['total_appointments'],
            'adminUserData' => $adminUserData,
        ];
    }
    header('Content-Type: application/json');
echo json_encode($response);

} catch (PDOException $e) {
    // Handle any errors by returning a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    error_log('An error occurred: ' . $e->getMessage()); // Log the error to the server log
}
?>
