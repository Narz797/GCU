<?php
include '../backend/connect_database.php';

if (isset($_POST['aid']) && isset($_POST['tid']) && isset($_POST['remark']) && isset($_POST['date']) && isset($_POST['time'])) {
    // Sanitize and validate the trans_id and remark
    $tid = intval($_POST['tid']);
    $aid = intval($_POST['aid']);
    $remark = $_POST['remark'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $datenow = date("Y-m-d H:i:s"); // Current date and time

        // Define your SQL update query for the first table (appointment)
        $sql1 = "UPDATE `appointment` SET `remarks` = :remark, `date` = :date, `start_time` = :time, `latest_update` = :datenow WHERE `appointment_id` = :aid";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':aid', $aid, PDO::PARAM_INT);
        $stmt1->bindParam(':remark', $remark, PDO::PARAM_STR);
        $stmt1->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt1->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt1->bindParam(':datenow', $datenow, PDO::PARAM_STR);
        
        if ($stmt1->execute()) {
            echo "Appointment marked as done successfully.";
        } else {
            echo "Error marking the appointment as done: " . implode(' ', $stmt1->errorInfo());
        }

        // Define your SQL update query for the second table (transact)
        $sql2 = "UPDATE `transact` SET `remarks` = :remark, `date_edited` = :datenow WHERE `transact_id` = :tid";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':tid', $tid, PDO::PARAM_INT);
        $stmt2->bindParam(':remark', $remark, PDO::PARAM_STR);
        $stmt2->bindParam(':datenow', $datenow, PDO::PARAM_STR);
        
        if ($stmt2->execute()) {
            echo "Transaction marked as done successfully.";
        } else {
            echo "Error marking the transaction as done: " . implode(' ', $stmt2->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null; // Close the database connection
    }
} else {
    echo "Error: Missing data.";
}
