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
    student_user.ParentGuardianNumber,
    student_user.gender,
    transact.transact_id,
    transact.status,
    transact.transact_type,
    transact.date_created
    FROM
    student_user
    INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
    WHERE
    transact.transact_type = 'readmission';";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);

} else if ($type == 'referral') {
    $sql = "SELECT
    student_user.stud_user_id,
    transact.transact_id,
    student_user.last_name,
    student_user.first_name,
    student_user.Year_level,
    student_user.course,
    courses.Colleges,
    student_user.Contact_number,
    student_user.ParentGuardianNumber,
    student_user.gender,
    referral.referred,
    transact.status,
    transact.transact_type,
    transact.date_created
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
INNER JOIN
    referral ON transact.transact_id = referral.transact_id
WHERE
    transact.transact_type = 'referral';";
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
    student_user.ParentGuardianNumber,
    student_user.gender,
    withdrawal.reason,
    withdrawal.shift_from,
    withdrawal.shift_to,
    transact.status,
    transact.transact_type,
    transact.date_created
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
INNER JOIN
    withdrawal ON transact.transact_id = withdrawal.transact_id
WHERE
    transact.transact_type = 'WDS';";
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
    student_user.ParentGuardianNumber,
    student_user.gender,
    transact.status,
    transact.transact_type,
    transact.date_created,
    transact.transact_id
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
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
    student_user.ParentGuardianNumber,
    transact.status,
    transact.date_created,
    transact.transact_type,
    transact.date_created
FROM
    student_user
INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
INNER JOIN
    courses ON student_user.course = courses.Acronym
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
}

?>
