<?php
// Include your database connection code or configuration here
include '../backend/connect_database.php';

// Get the year and month from the request parameters
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('n');

// Query the database to retrieve events for the specified month and year
$query = "SELECT * FROM `appointment` WHERE YEAR(`date`) = :year AND MONTH(`date`) = :month";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':year', $year, PDO::PARAM_INT);
$stmt->bindParam(':month', $month, PDO::PARAM_INT);
$stmt->execute();

$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the events data to JSON
$jsonData = json_encode($events);

// Set the response headers
header('Content-Type: application/json');

// Output the JSON data
echo $jsonData;
?>
