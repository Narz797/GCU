<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

$id = ($_POST['id']);
$pass = ($_POST['pass']);

$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

$allowedFields = array(
   
    'first_name' => $_POST['fname'],
    'middle_name' => $_POST['mname'],
    'last_name' => $_POST['lname'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'contact' => $_POST['cn'],
    'position' => $_POST['position'],
    'username' => $_POST['un'],
    'password' => $hashedPassword 
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

$sql = "UPDATE `admin_user` SET " . implode(", ", $updateFields) . " WHERE admin_user_id  = :id";

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
