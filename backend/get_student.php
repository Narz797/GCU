<?php
session_start(); // Ensure the session is started
$id = $_SESSION['stud_user_id'];

include '../backend/connect_database.php';

$sql = "SELECT
    student_user.stud_user_id,
    student_user.last_name,
    student_user.first_name,
    student_user.email,
    student_user.Year_level,
    student_user.course,
    student_user.gender,
    courses.Colleges,
    student_user.Contact_number,
    student_user.ParentGuardianNumber,
    student_user.ParentGuardianName,
    student_user.Relation
    FROM student_user
    INNER JOIN courses ON student_user.course = courses.Acronym
    WHERE student_user.stud_user_id = :id"; // Use a named placeholder

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
