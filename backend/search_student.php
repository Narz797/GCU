<?php
include '../backend/connect_database.php';
$sql = "SELECT `stud_user_id`, `first_name`, `last_name`, `year_enrolled`, `course`, `gender` FROM student_user";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>