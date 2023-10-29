<?php
session_start(); // Ensure the session is started
$id = $_SESSION['stud_user_id'];

include '../backend/connect_database.php';

$sql = "SELECT
transact.date_created,
transact.transact_type,

CONCAT(
    IFNULL(withdrawal.explain, ''),
    IFNULL(referral.reason, ''),
    IFNULL(readmission.reason, ''),
    IFNULL(absence.reason, '')
) AS reason,
transact.status,
transact.date_edited,
transact.remarks
FROM
transact
LEFT JOIN
withdrawal ON transact.transact_id = withdrawal.transact_id
LEFT JOIN
referral ON transact.transact_id = referral.transact_id
LEFT JOIN
readmission ON transact.transact_id = readmission.transact_id
LEFT JOIN
absence ON transact.transact_id = absence.transact_id
WHERE transact.student_id = :id AND transact.status != 'pending';

";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);
?>
