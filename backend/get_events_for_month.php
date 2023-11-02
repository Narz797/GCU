<?php
include '../backend/connect_database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Retrieve the start and end dates for the current month from the POST request
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];

        // Create a SQL statement to fetch event dates for the current month
        $query = "SELECT DISTINCT `date` FROM `appointment` WHERE `date` BETWEEN :start_date AND :end_date AND status = 'open'";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":start_date", $startDate);
        $stmt->bindParam(":end_date", $endDate);
        $stmt->execute();

        $eventDates = $stmt->fetchAll(PDO::FETCH_COLUMN); // Fetch the date column

        // Return the list of event dates as plain text, separated by newlines
        echo implode("\n", $eventDates);
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
