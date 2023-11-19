<?php
include '../backend/connect_database.php';

if ( isset($_POST['Tid'])) { // Change key to "appointment_id"
  
    $tID = $_POST['Tid'];
    
    try {
        // Prepare and execute a SQL query to update the 'status' in the 'transact' table.
        $sql = "UPDATE `transact` SET `status` = 'done' WHERE `transact_id` = :tid";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tid', $tID, PDO::PARAM_INT);
        $stmt->execute();

        // Check if any rows were affected by the update.
        if ($stmt->rowCount() > 0) {
            echo "Event updated successfully.";
        } else {
            echo "Event not found or already updated.";
        }

                // Prepare and execute a SQL query to update the 'status' in the 'transact' table.
        $sql2 = "UPDATE `referral` SET `status` = 'done' WHERE `transact_id` = :tid";

        $stmt = $pdo->prepare($sql2);
        $stmt->bindParam(':tid', $tID, PDO::PARAM_INT);
        $stmt->execute();

        // Check if any rows were affected by the update.
        if ($stmt->rowCount() > 0) {
            echo "Event updated successfully.";
        } else {
            echo "Event not found or already updated.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection only if it exists.
        if ($pdo) {
            $pdo = null;
        }
    }
} else {
    echo "Missing or invalid data in the POST request.";
}
?>
