<?php

session_start();
include '../backend/connect_database.php';

$id=$_SESSION['session_id'] ;

try {
    // SQL query to fetch data where status is 'done'
    $doneTransactionsSql = "SELECT `transact_type`, `date_completed` FROM transact WHERE `status` != 'pending' AND `student_id` = :id AND `transact_type` != 'appointment'";
    
    $stmt = $pdo->prepare($doneTransactionsSql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $doneTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($doneTransactions)) {
        // Return data as JSON and set the content type header to JSON
        header('Content-Type: application/json');
        echo json_encode($doneTransactions);
    } else {
        // Return an empty JSON array if no results are found
        echo json_encode([]);
    }
} catch (PDOException $e) {
    // Handle any errors by returning a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    error_log('An error occurred: ' . $e->getMessage()); // Log the error to the server log
}
?>
