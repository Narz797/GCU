<?php
session_start();
include '../backend/connect_database.php';
$id=$_SESSION['session_id'] ;


$sql = "SELECT 
    appointment_id, 
    date, 
    Reason,
    status
    FROM 
    appointment
    WHERE student_id = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>