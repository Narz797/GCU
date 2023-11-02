<?php
session_start();
include '../backend/connect_database.php';
$type = $_SESSION['form_type'];
if ($type == 'appointment') {
$sql = "SELECT 
    appointment.appointment_id, 
    appointment.employee_id, 
    appointment.student_id,
    appointment.event_title, 
    appointment.date, 
    appointment.start_time, 
    appointment.end_time, 
    appointment.Reason, 
    appointment.status,
    student_user.first_name,
    student_user.last_name,
    transact.transact_id
    FROM 
    appointment
    INNER JOIN 
    student_user ON appointment.student_id = student_user.stud_user_id
    INNER JOIN
    transact ON appointment.transact_id = transact.transact_id
    WHERE appointment.status != 'done' AND appointment.status != 'open';
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
}
?>