<?php
session_start();
include '../backend/connect_database.php';

$sql = "SELECT *
    FROM 
    audit_log
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>