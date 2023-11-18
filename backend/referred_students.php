<?php
include '../backend/connect_database.php';
session_start();
$id = $_SESSION['session_id'];

$sql = "SELECT DISTINCT
student_user.stud_user_id AS student_id,
student_user.last_name,
student_user.first_name,
student_user.Year_level AS year_level,
student_user.course,
courses.Colleges AS college,
student_user.Contact_number AS contact_number,
student_user.ParentGuardianNumber AS GP_number,
student_user.gender,
referral.reason,
referral.referred AS refer,
transact.status,
transact.date_created AS date,
transact.transact_id
FROM
student_user
INNER JOIN
transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
courses ON student_user.course = courses.Acronym
INNER JOIN
referral ON transact.transact_id = referral.transact_id
WHERE
transact.transact_type = 'referral' AND transact.status != 'done' AND referral.teacher_id = :id

UNION

SELECT DISTINCT
tstable.student_id,
tstable.last_name,
tstable.first_name,
tstable.year_level,
tstable.course,
NULL AS college,
tstable.contact_number,
NULL AS GP_number,
tstable.gender,
tstable.reason,
tstable.refer,
transact.status,
tstable.date,
tstable.transact_id
FROM
tstable
INNER JOIN
transact ON tstable.transact_id = transact.transact_id

WHERE
tstable.status != 'done';


";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>