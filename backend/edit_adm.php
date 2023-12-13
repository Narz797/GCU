<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

$id = ($_POST['id']);
$pass = ($_POST['pass']);
if(isset($_POST['un'])&&isset($_POST['pass'])){
    if (!empty($_POST['pass'])) {
        $password = $_POST['pass'];
        $password = password_hash($password, PASSWORD_DEFAULT);

    }else{
    $password = $_POST['pass'];
}


$allowedFields = array(
   
    'uname' => $_POST['un'],
    'pass' => $password 
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
}
$sql = "UPDATE `admin_admin` SET " . implode(", ", $updateFields) . " WHERE admin_id  = :id";

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