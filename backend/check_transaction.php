<?php
header('Content-Type: application/json');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include '../backend/connect_database.php';

$type = $_SESSION['form_type'];//gets value of transact_type

if ($type == 'readmission') {
    $sql = "SELECT
    student_user.stud_user_id,
    student_user.first_name,
    student_user.last_name,
    student_user.Year_level,
    student_user.course,
    student_user.Contact_number,
    student_user.gender,
    transact.transact_id,
    transact.status,
    transact.transact_type,
    transact.date_created,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
    FROM
    student_user
    INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
    WHERE
    transact.transact_type = 'readmission';";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);

} else if ($type == 'admission') {
    $sql = "SELECT
    student_user.stud_user_id,
    student_user.first_name,
    student_user.last_name,
    student_user.Year_level,
    student_user.course,
    student_user.Contact_number,
    student_user.gender,
    courses.Colleges,
    MIN(transact.transact_id) AS transact_id,
    MIN(transact.status) AS status,
    MIN(transact.transact_type) AS transact_type,
    MIN(transact.date_created) AS date_created,
    ca.reason,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    ca ON transact.transact_id = ca.transact_id 
INNER JOIN
    courses ON student_user.course = courses.Acronym
LEFT JOIN
    guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN
    mother ON student_user.stud_user_id = mother.stud_user_id
WHERE
    ca.reason = 'Absent' OR ca.reason = 'Tardy' OR ca.reason = 'Academic Deficiency/ies'
GROUP BY
    student_user.stud_user_id,
    student_user.first_name,
    student_user.last_name,
    student_user.Year_level,
    student_user.course,
    student_user.Contact_number,
    student_user.gender,
    courses.Colleges,
    ca.reason,
    ParentGuardianName,
    ParentGuardianNumber;
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);

} else if ($type == 'referral') {
    $sql = "SELECT
    tstable.student_id AS stud_user_id,
    tstable.transact_id,
    tstable.last_name,
    tstable.first_name,
    tstable.year_level AS Year_level,
    tstable.course,
    NULL AS Colleges,
    tstable.contact_number AS Contact_number,
    tstable.gender,
    tstable.refer AS referred,
    transact.status AS status,
    NULL AS transact_type,
    tstable.date AS date_created,
    tstable.teacher_id,
    referral.reg,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
FROM
    tstable
INNER JOIN
    referral ON tstable.transact_id = referral.transact_id
    INNER JOIN
    transact ON tstable.transact_id = transact.transact_id
    LEFT JOIN guardian ON tstable.student_id = guardian.stud_user_id
LEFT JOIN mother ON tstable.student_id = mother.stud_user_id

WHERE
    transact.transact_type = 'referral';
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
} else if ($type == 'withdrawal') {
    $sql = "SELECT
    student_user.stud_user_id,
    transact.transact_id,
    student_user.last_name,
    student_user.first_name,
    student_user.Year_level,
    student_user.course,
    courses.Colleges,
    student_user.Contact_number,
    student_user.gender,
    withdrawal.reason,
    withdrawal.shift_from,
    withdrawal.shift_to,
    transact.status,
    transact.transact_type,
    transact.date_created,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
INNER JOIN
    withdrawal ON transact.transact_id = withdrawal.transact_id
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
WHERE
    transact.transact_type = 'Withdrawing Enrollment' OR transact.transact_type = 'Dropping Subjects' OR transact.transact_type = 'Shifting';";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
} else if ($type == 'loa') {
    $sql = "SELECT
    student_user.stud_user_id,
    transact.transact_id,
    student_user.last_name,
    student_user.first_name,
    student_user.Year_level,
    student_user.course,
    courses.Colleges,
    student_user.Contact_number,
    student_user.gender,
    transact.status,
    transact.transact_type,
    transact.date_created,
    transact.transact_id,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
WHERE
    transact.transact_type = 'leave_of_absence';
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
}else if ($type == 'all') {
    $sql = "SELECT
    student_user.stud_user_id,
    student_user.last_name,
    student_user.first_name,
    student_user.Year_level,
    student_user.course,
    courses.Colleges,
    student_user.Contact_number,
    transact.status,
    transact.date_created,
    transact.transact_type,
    transact.date_created,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
WHERE transact.status = 'Lacking';
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
}else if ($type == 'done') {
    $sql = "SELECT
    student_user.stud_user_id,
    student_user.last_name,
    student_user.first_name,

    CONCAT(
        CASE
            WHEN transact.transact_type = 'WDS' THEN IFNULL(withdrawal.reason, '')
            ELSE IFNULL(transact.transact_type, '')
        END
    ) AS reason,
    transact.status,
    transact.date_created,
    transact.transact_type,
    transact.date_edited
FROM
    student_user
LEFT JOIN
    transact ON student_user.stud_user_id = transact.student_id
LEFT JOIN
    withdrawal ON transact.transact_id = withdrawal.transact_id
LEFT JOIN
    appointment ON transact.transact_id = appointment.transact_id
WHERE transact.status = 'done' OR transact.status = 'Excused' OR transact.status = 'Unexcused'OR transact.status = 'reconsider';

";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
}
?>
