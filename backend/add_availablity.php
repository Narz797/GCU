<?php
include '../backend/connect_database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve event data from the POST request
    $title = $_POST["title"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
  
    // Create a SQL statement to insert the event data into the database
    $sql = "INSERT INTO `appointment` (`event_title`, `date`, `start_time`, `end_time`) VALUES (:title, :date, :start_time, :end_time)";

    
    $stmt = $pdo->prepare($sql);
    
    // Bind the parameters and execute the statement
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":start_time", $start_time);
    $stmt->bindParam(":end_time", $end_time);
  
    if ($stmt->execute()) {
      // Insertion was successful
      echo "Event added successfully.";
    } else {
      // Insertion failed
      echo "Event insertion failed.";
    }
  }
?>