<?php
include '../backend/connect_database.php';

if (isset($_POST['id']) && isset($_POST['remark'])) {
    // Sanitize and validate the trans_id and remark
    $trans_id = intval($_POST['id']);
    $remark = $_POST['remark']; // Don't use intval for remarks as it may be non-numeric
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s');

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query to mark the transaction as done
        $sql = "UPDATE `transact` SET `remarks` = :remark, `date_edited` = :date WHERE `transact_id` = :id";

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $trans_id, PDO::PARAM_INT);
        $stmt->bindParam(':remark', $remark, PDO::PARAM_STR); // Use PARAM_STR for remarks
        $stmt->bindParam(':date', $dateCreated, PDO::PARAM_STR); // Use PARAM_STR for remarks

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
