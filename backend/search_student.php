<?php
include '../backend/connect_database.php';
$sql = "SELECT
student_user.stud_user_id,
student_user.last_name,
student_user.first_name,
student_user.Year_level,
student_user.course,
student_user.gender,
courses.Colleges,
student_user.Contact_number,
student_user.ParentGuardianNumber,
student_user.ParentGuardianName
FROM
student_user
INNER JOIN
courses ON student_user.course = courses.Acronym";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>