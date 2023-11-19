<?php
session_start();
include '../backend/connect_database.php';
$type = $_SESSION['form_type'];
$id = $_SESSION['session_id'];
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
    courses.Colleges,
    student_user.course,
    student_user.Contact_number,
    transact.transact_id
    FROM 
    appointment
    INNER JOIN 
    student_user ON appointment.student_id = student_user.stud_user_id
    INNER JOIN
    transact ON appointment.transact_id = transact.transact_id
    INNER JOIN
    courses ON student_user.course = courses.Acronym
    WHERE appointment.status != 'done' AND appointment.status != 'open' AND appointment.employee_id = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
}
?>