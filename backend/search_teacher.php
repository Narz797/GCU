<?php



include '../backend/connect_database.php';

$sql = "SELECT `employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `civil_status`
    FROM teachers"; // Replace 'your_table_name' with your actual table name

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
