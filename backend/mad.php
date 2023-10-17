<?php
include '../backend/connect_database.php';

    if (isset($_POST['event_id'])) {
        // Sanitize and validate the event_id
        $event_id = intval($_POST['event_id']);
        
        try {

            $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

            // Set PDO to throw exceptions on error
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Define your SQL update query to mark the event as done
            $sql = "UPDATE `appointment` SET `status` = 'done' WHERE `appointment_id` = :event_id";

            // Prepare and execute the SQL statement
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Event marked as done successfully.";
            } else {
                echo "Error marking the event as done: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        } finally {
            $pdo = null; // Close the database connection
        }
    } else {
        echo "Event ID not provided.";
    }

?>
