<?php
session_start();
include '../backend/connect_database.php';
$id = $_SESSION['stud_id'];
$form = $_SESSION['form_type'];

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
        WHERE student_user.stud_user_id = :id AND transact.transact_type = 'leave_of_absence';
"; // Use a named placeholder

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

} else if ($form == 'read') {

    //code for readmission
} else if ($form == 'ref') {
    //code for referral
}  else if ($form == 'w') {
    //code for withdrawal
}  else if ($form == 'd') {
    //code for dropping
}  else if ($form == 's') {
    //code for shifting
}

?>