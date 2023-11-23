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
COALESCE(
        CASE
            WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
            ELSE mother.fname
        END,
        'None'
    ) AS ParentGuardianName,
    COALESCE(
        CASE
            WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
            ELSE mother.contact
        END,
        'None'
    ) AS ParentGuardianNumber
FROM
student_user
INNER JOIN
courses ON student_user.course = courses.Acronym
LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id"
;

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>