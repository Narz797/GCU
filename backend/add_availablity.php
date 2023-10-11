<?php
include '../backend/connect_database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve event data from the POST request
    $title = $_POST["title"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $ID = $_POST["ID"];
    $status = 'pending';
  
    // Create a SQL statement to insert the event data into the database
    $sql = "INSERT INTO `appointment` (`employee_id`, `event_title`, `date`, `start_time`, `end_time`, `status`) VALUES (:id, :title, :date, :start_time, :end_time, :status)";

    
    $stmt = $pdo->prepare($sql);
    
    // Bind the parameters and execute the statement
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":start_time", $start_time);
    $stmt->bindParam(":end_time", $end_time);
    $stmt->bindParam(":id", $ID);
    $stmt->bindParam(":status", $status);
  
    if ($stmt->execute()) {
      // Insertion was successful
      echo "Event added successfully.";
    } else {
      // Insertion failed
      echo "Event insertion failed.";
    }
  }
?>