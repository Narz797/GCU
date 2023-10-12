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
    $query = "SELECT `event_title`, `date`, `start_time`, `end_time`, `status` 
              FROM `appointment` 
              WHERE YEAR(`date`) = :year AND MONTH(`date`) = :month";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    // $stmt->bindParam(':date', $date, PDO::PARAM_INT);
    $stmt->execute();


    // Fetch data and return it as JSON
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($events);
} catch (PDOException $e) {
    die('Database query failed: ' . $e->getMessage());
}