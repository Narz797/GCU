<?php
include '../../backend/connect_database.php';

if (isset($_POST['stat']) && isset($_POST['id']) && isset($_POST['tid']) && isset($_POST['aid'])) {
    $id = intval($_POST['id']);
    $tid = intval($_POST['tid']);
    $aid = intval($_POST['aid']);
    $stat = $_POST['stat']; // Don't use intval for remarks as it may be non-numeric

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query to mark the transaction as done
        $sql = "UPDATE `transact` SET `status` = :status WHERE `student_id` = :id AND `transact_id` = :tid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);
        $stmt->bindParam(':status', $stat, PDO::PARAM_STR);

        // Execute the first SQL statement
        if ($stmt->execute()) {
            echo "Transaction marked as done successfully.";
        } else {
            echo "Error marking the transaction as done: " . implode(' ', $stmt->errorInfo());
        }

        // Define your SQL update query to mark the appointment as done
        $sql2 = "UPDATE `appointment` SET `status` = :status WHERE `student_id` = :id AND `appointment_id` = :aid";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->bindParam(':aid', $aid, PDO::PARAM_INT);
        $stmt2->bindParam(':status', $stat, PDO::PARAM_STR);

        // Execute the second SQL statement
        if ($stmt2->execute()) {
            echo "Appointment marked as done successfully.";
        } else {
            echo "Error marking the appointment as done: " . implode(' ', $stmt2->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null; // Close the database connection
    }
} else {
    echo "Error: Missing data.";
}
?>