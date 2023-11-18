<?php
include '../../backend/connect_database.php';


if (isset($_POST['stat']) && isset($_POST['id']) && isset($_POST['tid'])) {

    $id = intval($_POST['id']);
    $tid = intval($_POST['tid']);
    $stat = ($_POST['stat']);
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format
    // Don't use intval for remarks as it may be non-numeric

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query to mark the transaction as done
        $sql = "UPDATE `transact` SET `status` = :status, `date_completed` = :date WHERE `student_id` = :id AND `transact_id` = :tid";

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);
        $stmt->bindParam(':date', $dateCreated, PDO::PARAM_STR); // Change to PARAM_STR
        $stmt->bindParam(':status', $stat, PDO::PARAM_STR); // Use PARAM_STR for remarks

        if ($stmt->execute()) {
            echo "Transaction marked as done successfully.";
        } else {
            echo "Error marking the transaction as done: " . implode(' ', $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null; // Close the database connection
    }
} else {
    echo "error";
}
?>
