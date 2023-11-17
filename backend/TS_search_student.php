<?php
include '../backend/connect_database.php';

// Assuming you have a variable with the student ID, replace 'YOUR_STUDENT_ID' with that variable
$studentId = $_GET['studentId']; // Add appropriate validation if needed

$sql = "SELECT
    student_user.stud_user_id,
    student_user.last_name,
    student_user.first_name,
    student_user.middle_name,
    student_user.course,
    student_user.gender,
    student_user.Contact_number
FROM
    student_user
INNER JOIN
    courses ON student_user.course = courses.Acronym
WHERE
    student_user.stud_user_id = :studentId";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
