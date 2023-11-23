<?php
include '../backend/connect_database.php';

if (isset($_POST['event_id']) && isset($_POST['trans_id']) && isset($_POST['remark'])) {
    // Sanitize and validate the event_id
    $event_id = intval($_POST['event_id']);
    $trans_id = intval($_POST['trans_id']);
    $stud_id = intval($_POST['S_id']);
    $remark = $_POST['remark'];
    $reason = $_POST['Res']; // Assuming $remark is a string
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d');

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query for the first table
        $sql1 = "UPDATE `appointment` SET `status` = 'done', `remarks` = :remark WHERE `appointment_id` = :event_id";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt1->bindParam(':remark', $remark, PDO::PARAM_STR); // Use PDO::PARAM_STR for string

        // Execute the first SQL statement
        $stmt1->execute();

        // Define your SQL update query for the second table
        $sql2 = "UPDATE `transact` SET `status` = 'done', `date_completed` = :date WHERE `transact_id` = :trans_id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':trans_id', $trans_id, PDO::PARAM_INT);
        $stmt2->bindParam(':date', $date, PDO::PARAM_STR);

        // Execute the second SQL statement
        $stmt2->execute();


        $sql3 = "SELECT `referred` FROM `appointment` WHERE `student_id` = :id AND `appointment_id` = :aid";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindParam(':id', $stud_id, PDO::PARAM_INT);
        $stmt3->bindParam(':aid', $event_id, PDO::PARAM_INT);
        
        // Execute the select query
        if ($stmt3->execute()) {
            // Fetch the value
            $referredValue = $stmt3->fetchColumn();
        
            // Check if a matching record was found with 'yes' value
            if ($referredValue == 'yes') {
                echo 'Referred: ' . $referredValue;
                        // Define your SQL update query to mark the appointment as done
                    $sql4 = "UPDATE `referral` SET `status` = 'done' WHERE `stud_id` = :id AND `reason` = :res";
                    $stmt4 = $pdo->prepare($sql4);
                    $stmt4->bindParam(':id', $stud_id, PDO::PARAM_INT);
                    $stmt4->bindParam(':res', $reason, PDO::PARAM_INT);


                    // Execute the second SQL statement
                    if ($stmt4->execute()) {
                        echo "Appointment marked as done successfully.";
                    } else {
                        echo "Error marking the appointment as done: " . implode(' ', $stmt4->errorInfo());
                    }

            } else {
                echo 'No matching record found or not referred';
            }
        } else {
            // Handle the case where the query execution failed
            echo 'Error executing query';
        }
        echo "Events marked as done successfully.";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null; // Close the database connection
    }
} else {
    echo "Event ID, Transaction ID, or Remark not provided.";
}
?>
