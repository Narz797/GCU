<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

$id = ($_POST['tid']);

$allowedFields = array(
    'college' => $_POST['colege'],
    'gender' => $_POST['gender'],
    'first_name' => $_POST['fname'],
    'middle_name' => $_POST['mname'],
    'last_name' => $_POST['lname'],
    'contact_number' => $_POST['cn'],
    'email' => $_POST['email'],
    'civil_status' => $_POST['cs']
);

$updateFields = [];
$parameters = [
    ':id' => $id
];

foreach ($allowedFields as $key => $value) {
    if (!empty($value)) {
        $updateFields[] = "`$key` = :$key";
        $parameters[":$key"] = $value;
    }
}

$sql = "UPDATE `teachers` SET " . implode(", ", $updateFields) . " WHERE employee_id = :id";

$stmt = $pdo->prepare($sql);
foreach ($parameters as $key => &$value) {
    if ($key !== ':id') {
        $stmt->bindParam($key, $value);
    } else {
        $stmt->bindParam($key, $value, PDO::PARAM_INT);
    }
}

$stmt->execute();

$data = array('success' => true); // You might not get data using fetchAll() for an UPDATE statement

// Prepare and echo data as JSON
echo json_encode($data);
?>
