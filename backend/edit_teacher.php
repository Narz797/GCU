<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

$id = ($_POST['tid']);
$clg = ($_POST['colege']);
$gndr = ($_POST['gender']);
$fname = ($_POST['fname']);
$mname = ($_POST['mname']);
$lname = ($_POST['lname']);
$cn = ($_POST['cn']);
$email = ($_POST['email']);
$cs = ($_POST['cs']);

// Start building the SQL query
$sql = "UPDATE `teachers` SET ";

$setValues = [];
$parameters = [];

// Check each field for existence and add to the query if not empty
if (!empty($clg)) {
    $setValues[] = "`college` = :clg";
    $parameters[':clg'] = $clg;
}
if (!empty($gndr)) {
    $setValues[] = "`gender` = :gndr";
    $parameters[':gndr'] = $gndr;
}
if (!empty($fname)) {
    $setValues[] = "`first_name` = :fname";
    $parameters[':fname'] = $fname;
}
if (!empty($mname)) {
    $setValues[] = "`middle_name` = :mname";
    $parameters[':mname'] = $mname;
}
if (!empty($lname)) {
    $setValues[] = "`last_name` = :lname";
    $parameters[':lname'] = $lname;
}
if (!empty($cn)) {
    $setValues[] = "`contact_number` = :cn";
    $parameters[':cn'] = $cn;
}
if (!empty($email)) {
    $setValues[] = "`email` = :email";
    $parameters[':email'] = $email;
}
if (!empty($cs)) {
    $setValues[] = "`civil_status` = :cs";
    $parameters[':cs'] = $cs;
}

// Join the set values
$setValuesStr = implode(", ", $setValues);

$sql .= $setValuesStr . " WHERE employee_id = :id"; // Complete the SQL query

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter

// Bind parameters for the fields that are not empty
foreach ($parameters as $key => $value) {
    $stmt->bindParam($key, $value, PDO::PARAM_STR);
}

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
