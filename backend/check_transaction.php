<?php
header('Content-Type: application/json');
session_start();
include '../backend/connect_database.php';

$type = $_SESSION['form_type'];//gets value of transact_type

if ($type == 'readmission') {
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
    student_user.first_name,
    student_user.last_name,
    student_user.course,
    transact.status,
    transact.transact_type,
    transact.date_created
    FROM
    student_user
    INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
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
    student_user.first_name,
    student_user.last_name,
    student_user.course,
    transact.status,
    transact.transact_type,
    transact.date_created
    FROM
    student_user
    INNER JOIN
    transact ON student_user.stud_user_id = transact.student_id
    WHERE
    transact.transact_type = 'withdrawal';";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
} else if ($type == 'loa') {
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
    transact ON student_user.stud_user_id = transact.student_id
    WHERE
    transact.transact_type = 'leave_of_absence';";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and echo data as JSON
    echo json_encode($data);
}

?>
