<?php

session_start();
include '../backend/connect_database.php';

try {
    $currentDate = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"

 

    // Count logins of employee
    $countPendingSql4 = "SELECT COUNT(*) AS total_logins FROM audit_log WHERE DATE(timestamp) = :currentDate AND action = 'access_employee'";
    $stmt4 = $pdo->prepare($countPendingSql4);
    $stmt4->bindParam(':currentDate', $currentDate);
    $stmt4->execute();
    $countLOGIN = $stmt4->fetch(PDO::FETCH_ASSOC);




    // Fetch admin user data
    $id = $_SESSION['session_id'];

    $adminUserDataSql = "SELECT `uname` FROM admin_admin WHERE `admin_id` = :adminUserId";
    $stmt7 = $pdo->prepare($adminUserDataSql);
    $stmt7->bindParam(':adminUserId', $id); // Bind the session id to the parameter
    $stmt7->execute();
    $adminUserData = $stmt7->fetchAll(PDO::FETCH_ASSOC);

        $response = [
   
             'total_logins' => $countLOGIN['total_logins'],

            'adminUserData' => $adminUserData,
        ];

    header('Content-Type: application/json');
echo json_encode($response);

} catch (PDOException $e) {
    // Handle any errors by returning a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    error_log('An error occurred: ' . $e->getMessage()); // Log the error to the server log
}
?>
