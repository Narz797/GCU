<?php
session_start(); // Ensure the session is started
$id = $_SESSION['stud_user_id'];
include '../backend/connect_database.php';
$sql = "SELECT
        appointment.appointment_id,
        appointment.date, 
        appointment.Reason, 
        appointment.remarks, 
        appointment.action_taken, 
        appointment.latest_update
        FROM 
        appointment
        INNER JOIN 
        student_user ON appointment.student_id = student_user.stud_user_id
        WHERE appointment.status = 'done' AND student_user.stud_user_id = :id ;
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>