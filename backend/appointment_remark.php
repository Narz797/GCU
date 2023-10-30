<?php
include '../backend/connect_database.php';

if (isset($_POST['id']) && isset($_POST['action'])&& isset($_POST['remark'])) {
    // Sanitize and validate the trans_id and remark
    $trans_id = intval($_POST['id']);
    $action = $_POST['action'];
    $remark = $_POST['remark']; // Don't use intval for remarks as it may be non-numeric
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d');


    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query to mark the transaction as done
        $sql = "UPDATE `appointment` SET `remarks` = :remark, `action_taken` = :action, `latest_update` = :date WHERE `appointment_id` = :id";



        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $trans_id, PDO::PARAM_INT);
        $stmt->bindParam(':remark', $remark, PDO::PARAM_STR);
        $stmt->bindParam(':action', $action, PDO::PARAM_STR); // Use PARAM_STR for remarks
        $stmt->bindParam(':date', $date, PDO::PARAM_STR); 

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
