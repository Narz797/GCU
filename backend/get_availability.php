<?php

include '../backend/connect_database.php';

// Create a PDO instance using the connection details from connect_database.php
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Extract the year, month, and date from the GET parameters
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $date = isset($_GET['date']) ? $_GET['date'] : date('d');

    // Execute a query to retrieve events from the database for the specified year, month, and date
    $query = "SELECT 
                    appointment.appointment_id, 
                    appointment.employee_id, 
                    appointment.event_title, 
                    appointment.date, 
                    appointment.start_time, 
                    appointment.end_time, 
                    appointment.status, 
                    admin_user.first_name
                FROM 
                    appointment
                INNER JOIN 
                    admin_user ON appointment.employee_id = admin_user.admin_user_id
              WHERE YEAR(`date`) = :year AND MONTH(`date`) = :month AND DAY(`date`) = :date;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    $stmt->bindParam(':date', $date, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch data and return it as JSON
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($events);
} catch (PDOException $e) {
    error_log('Database query failed: ' . $e->getMessage());
    die('Database query failed: ' . $e->getMessage());
}

?>
