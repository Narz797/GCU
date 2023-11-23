<?php
include '../../backend/connect_database.php';

if (isset($_POST['stat']) && isset($_POST['id']) && isset($_POST['tid']) && isset($_POST['dte']) && isset($_POST['rsn'])) {
    $id = intval($_POST['id']);
    $tid = intval($_POST['tid']);
    $stat = ($_POST['stat']);
    $date = ($_POST['dte']);
    $rsn = ($_POST['rsn']);
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Define your SQL update query to mark the transaction as done
        $sql = "UPDATE `referral` SET `status` = :status WHERE `stud_id` = :id AND `Dates_for_AbsentTardy` = :date";

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':status', $stat, PDO::PARAM_STR);
// Use PARAM_STR for remarks

        if ($stmt->execute()) {
            echo "Transaction1 marked as done successfully.";
        } else {
            $errorInfo = $stmt->errorInfo();
        
            // Check if there is an error message
            if (isset($errorInfo[2]) && is_string($errorInfo[2])) {
                echo "Error marking the transaction as done: " . $errorInfo[2];
            } else {
                echo "An unknown error occurred while processing your request. Please try again later.";
            }
        }

        $sql2 = "UPDATE `transact` SET `status` = :status, `date_completed` = :date, `date_edited` = :date WHERE `transact_id` = :tid ";

        $stmt = $pdo->prepare($sql2);
        $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);
        $stmt->bindParam(':date', $dateCreated, PDO::PARAM_STR); // Change to PARAM_STR
        $stmt->bindParam(':status', $stat, PDO::PARAM_STR);


        if ($stmt->execute()) {
            echo "Transaction2 marked as done successfully.";
        } else {
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2]) && is_string($errorInfo[2])) {
                echo "Error marking the transaction as done: " . $errorInfo[2];
            } else {
                echo "An unknown error occurred while processing your request. Please try again later.";
            }
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
} else {
    echo "error";
}
?>
