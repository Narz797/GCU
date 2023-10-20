<?php
session_start();
include '../backend/connect_database.php';
$id = $_SESSION['session_id'];
$transact = $_SESSION['transact_type'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Retrieve event data from the POST request
        $title = $_POST["title"];
        $date = $_POST["date"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $ID = $_POST["ID"];
        $status = 'open';
        $datetime = new DateTime();
        $dateCreated = $datetime->format('Y-m-d H:i:s');

        // Checks if data is already available
        $query = "SELECT * FROM `appointment` WHERE `employee_id` = :id AND `event_title` = :title AND `date` = :date AND `start_time` = :start_time AND `end_time` = :end_time";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":start_time", $start_time);
        $stmt->bindParam(":end_time", $end_time);
        $stmt->bindParam(":id", $ID);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            echo "Already Added!";
        } else {
            // Create SQL statements to insert the event data into the database
            $sql_1 = "INSERT INTO `transact` (`employee_id`, `transact_type`, `date_created`, `status`) VALUES (:id, :transact_type, :date_created, :status)";
            $sql_2 = "INSERT INTO `appointment` (`employee_id`, `transact_id`, `event_title`, `date`, `start_time`, `end_time`, `status`) VALUES (:id, :transact_id, :title, :date, :start_time, :end_time, :status)";

            try {
                $stmt = $pdo->prepare($sql_1);
                $stmt->bindParam(":id", $ID);
                $stmt->bindParam(':transact_type', $transact);
                $stmt->bindParam(':date_created', $dateCreated);
                $stmt->bindParam(':status', $status);
                $stmt->execute();

                $transact_id = $pdo->lastInsertId();

                $stmt = $pdo->prepare($sql_2);
                $stmt->bindParam(':transact_id', $transact_id);
                $stmt->bindParam(":title", $title);
                $stmt->bindParam(":date", $date);
                $stmt->bindParam(":start_time", $start_time);
                $stmt->bindParam(":end_time", $end_time);
                $stmt->bindParam(":id", $ID);
                $stmt->bindParam(":status", $status);
                $stmt->execute();

                echo "Data inserted successfully";
            } catch (PDOException $e) {
                echo "Error inserting data: " . $e->getMessage();
            }
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
