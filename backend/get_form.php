<?php
session_start();
include '../backend/connect_database.php';
$id = $_SESSION['stud_id'];
$form = $_SESSION['form_type'];
$tid = $_SESSION['tran_id'];

if ($form == 'loa') {
$sql = "SELECT
        student_user.stud_user_id,
        student_user.last_name,
        student_user.first_name,
        student_user.email,
        student_user.Year_level,
        student_user.course,
        student_user.gender,
        transact.transact_type,
        transact.transact_id,
        student_user.Contact_number,
        student_user.ParentGuardianNumber,
        student_user.ParentGuardianName,
        student_user.Relation,
        absence.semester,
        absence.start_year,
        absence.end_year,
        absence.reason,
        absence.leave
        FROM student_user
        INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
        INNER JOIN absence ON transact.transact_id = absence.transact_id 
        WHERE student_user.stud_user_id = :id AND transact.transact_type = 'leave_of_absence'AND transact.transact_id = :tid;
"; // Use a named placeholder

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT);// Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

} else if ($form == 'readmission') {
    $sql = "SELECT
        student_user.stud_user_id,
        student_user.last_name,
        student_user.first_name,
        student_user.email,
        student_user.Year_level,
        student_user.course,
        student_user.gender,
        transact.transact_type,
        transact.transact_id,
        student_user.Contact_number,
        student_user.ParentGuardianNumber,
        student_user.ParentGuardianName,
        student_user.Relation,
        readmission.motivation,
        readmission.reason,
        readmission.attachment,
        readmission.document
        FROM student_user
        INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
        INNER JOIN readmission ON transact.transact_id = readmission.transact_id 
        WHERE student_user.stud_user_id = :id AND transact.transact_type = 'readmission' AND transact.transact_id = :tid;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);  // Bind the ID parameter

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Assuming your blob columns are named "image1_data" and "image2_data"
foreach ($data as &$row) {
    $row['attachment'] = base64_encode($row['attachment']);
    $row['document'] = base64_encode($row['document']);
}



// Prepare and echo data as JSON
echo json_encode($data);

    //code for readmission
} else if ($form == 'referral') {
    $sql = "SELECT
        student_user.stud_user_id,
        student_user.last_name,
        student_user.first_name,
        student_user.email,
        student_user.Year_level,
        student_user.course,
        student_user.gender,
        transact.transact_type,
        transact.transact_id,
        student_user.Contact_number,
        student_user.ParentGuardianNumber,
        student_user.ParentGuardianName,
        student_user.Relation,
        referral.reason,
        referral.referred
        FROM student_user
        INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
        INNER JOIN referral ON transact.transact_id = referral.transact_id 
        WHERE student_user.stud_user_id = :id AND transact.transact_type = 'referral' AND transact.transact_id = :tid;
"; // add teacher info when Available

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT); // Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Prepare and echo data as JSON
echo json_encode($data);

    //code for referral
}  else if ($form == 'withdrawal') {
    $sql = "SELECT
    student_user.stud_user_id,
    student_user.last_name,
    student_user.first_name,
    student_user.email,
    student_user.Year_level,
    student_user.course,
    student_user.gender,
    transact.transact_type,
    transact.transact_id,
    student_user.Contact_number,
    student_user.ParentGuardianNumber,
    student_user.ParentGuardianName,
    student_user.Relation,
    withdrawal.statement,
    withdrawal.shift_from,
    withdrawal.shift_to
    FROM student_user
    INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
    INNER JOIN withdrawal ON transact.transact_id = withdrawal.transact_id 
    WHERE student_user.stud_user_id = :id AND transact.transact_type = 'WDS' AND transact.transact_id = :tid;
"; // add teacher info when Available

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT); // Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Prepare and echo data as JSON
echo json_encode($data);

    //code for withdrawal
}  else if ($form == 'd') {
    //code for dropping
}  else if ($form == 's') {
    //code for shifting
}

?>