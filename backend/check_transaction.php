<?php
header('Content-Type: application/json');

include '../backend/connect_database.php';

$sql = "SELECT
student_user.stud_user_id,
student_user.first_name,
student_user.last_name,
student_user.course,
transact.status,
transact.transact_type,
transact.date_created
FROM
student_user
INNER JOIN
transact ON student_user.stud_user_id = transact.student_id;
";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
