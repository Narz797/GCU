<?php
session_start(); // Ensure the session is started
$id = $_SESSION['session_id'];

include '../backend/connect_database.php';

$sql = "SELECT `employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `civil_status`
    FROM teachers
    WHERE employee_id = :id"; // Replace 'your_table_name' with your actual table name

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
