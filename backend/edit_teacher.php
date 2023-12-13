<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

$id = ($_POST['tid']);
$pass = ($_POST['pass']);
 if(isset($_POST['tid'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['pass2'])&&isset($_POST['colege'])&&isset($_POST['gender'])&&isset($_POST['fname'])&&isset($_POST['mname'])&&isset($_POST['lname'])&&isset($_POST['cn'])&&isset($_POST['cs'])){
    if (!empty($_POST['pass'])) {
        $password = $_POST['pass'];
        $password = password_hash($password, PASSWORD_DEFAULT);

    }else{
    $password = $_POST['pass'];
}

$allowedFields = array(
    'college' => $_POST['colege'],
    'gender' => $_POST['gender'],
    'first_name' => $_POST['fname'],
    'middle_name' => $_POST['mname'],
    'last_name' => $_POST['lname'],
    'contact_number' => $_POST['cn'],
    'email' => $_POST['email'],
    'civil_status' => $_POST['cs'],
    'password' => $password 
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
