<?php
include '../../backend/connect_database.php';

if (isset($_POST['stat']) && isset($_POST['id']) && isset($_POST['tid']) && isset($_POST['dte']) && isset($_POST['rsn'])) {
    $id = intval($_POST['id']);
    $tid = intval($_POST['tid']);
    $stat = ($_POST['stat']);
    $date = ($_POST['dte']);
    $rsn = ($_POST['rsn']);

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // // Define your SQL update query to mark the transaction as done
        // $sql = "UPDATE `transact` SET `status` = :status WHERE `student_id` = :id AND `transact_id` = :tid";

        // // Prepare and execute the SQL statement
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);
        // $stmt->bindParam(':status', $stat, PDO::PARAM_STR); // Use PARAM_STR for remarks

        // if ($stmt->execute()) {
        //     echo "Transaction marked as done successfully.";
        // } else {
        //     $errorInfo = $stmt->errorInfo();
        
        //     // Check if there is an error message
        //     if (isset($errorInfo[2]) && is_string($errorInfo[2])) {
        //         echo "Error marking the transaction as done: " . $errorInfo[2];
        //     } else {
        //         echo "An unknown error occurred while processing your request. Please try again later.";
        //     }
        // }

        $sql2 = "UPDATE `transact` SET `status` = :status WHERE `student_id` = :id AND `date_created` = :date AND transact_type = :type";

        $stmt = $pdo->prepare($sql2);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR); // Change to PARAM_STR
        $stmt->bindParam(':status', $stat, PDO::PARAM_STR);
        $stmt->bindParam(':type', $rsn, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Transaction marked as done successfully.";
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
