<?php
session_start();
include '../backend/connect_database.php';
$id=$_SESSION['session_id'] ;


$sql = "SELECT 
    appointment.appointment_id, 
    appointment.date, 
    appointment.Reason,
    appointment.status,
    admin_user.first_name,
    admin_user.last_name
    FROM 
    appointment
    INNER JOIN 
        admin_user ON appointment.employee_id = admin_user.admin_user_id
    WHERE student_id = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>