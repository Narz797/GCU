<?php
include '../backend/connect_database.php';
session_start();
$id = $_SESSION['session_id'];

$sql = "SELECT DISTINCT
tstable.student_id,
tstable.last_name,
tstable.first_name,
tstable.year_level,
tstable.course,
tstable.contact_number,
tstable.gender,
tstable.reason,
tstable.refer,
referral.status,
transact.date_created AS date,
transact.transact_id
FROM
tstable

INNER JOIN
transact ON tstable.transact_id = transact.transact_id
INNER JOIN
referral ON transact.transact_id = referral.transact_id

WHERE
transact.transact_type = 'Referral' AND transact.status != 'done' AND referral.teacher_id = :id

";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>