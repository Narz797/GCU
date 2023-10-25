<?php

session_start();
include '../backend/connect_database.php';

try {
    // SQL query to fetch data where status is 'done'
    $doneTransactionsSql = "SELECT `student_id`, `transact_type` FROM transact WHERE `status` = 'done'";
    
    $stmt = $pdo->prepare($doneTransactionsSql);
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
