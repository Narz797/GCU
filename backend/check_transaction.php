<?php
include '../backend/connect_database.php';

$sql = "SELECT `transaction`, `name`, `status` FROM `student_transactions`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($transaction, $name, $status);

$data = array(); // Initialize an array to store the data

while ($stmt->fetch()) {
    $data[] = array(
        "transaction" => $transaction,
        "name" => $name,
        "status" => $status
    );
}

$stmt->close();

// Close the database connection
$conn->close();

// Prepare and echo data as JSON
echo json_encode($data);
?>