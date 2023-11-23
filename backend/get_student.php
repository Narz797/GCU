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
    student_user.Relation,
    photos.signature,
    photos.id
    FROM student_user
    INNER JOIN courses ON student_user.course = courses.Acronym
    INNER JOIN photos ON student_user.stud_user_id = photos.stud_user_id
    WHERE student_user.stud_user_id = :id"; // Use a named placeholder

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as &$row) {
    $row['signature'] = base64_encode($row['signature']);
    $row['id'] = base64_encode($row['id']);
}


// Prepare and echo data as JSON
echo json_encode($data);
?>
