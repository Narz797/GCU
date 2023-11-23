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
        student_user.Relation,
        absence.semester,
        absence.start_year,
        absence.end_year,
        absence.reason,
        absence.leave,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
        FROM student_user
        INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
        INNER JOIN absence ON transact.transact_id = absence.transact_id 
        LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
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
    readmission.motivation,
    readmission.reason,
    readmission.attachment,
    readmission.document,
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
INNER JOIN transact ON student_user.stud_user_id = transact.student_id
INNER JOIN readmission ON transact.transact_id = readmission.transact_id
LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
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
}  else if ($form == 'admission') {
    $sql = "SELECT
        student_user.stud_user_id,
        student_user.last_name,
        student_user.first_name,
        student_user.email,
        student_user.Year_level,
        student_user.course,
        student_user.gender,
        transact.transact_id,
        student_user.Contact_number,
        ca.date_of_AbsentOrTardy,
        ca.reason,
        ca.Attachment,
        ca.file_extension,
        ca.COA, 
        ca.specifics,
        ca.remarks,
        ca.date_of_AbsentOrTardy,
        CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
        FROM student_user
        INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
        INNER JOIN ca ON transact.transact_id = ca.transact_id 
        LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
        LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
        WHERE student_user.stud_user_id = :id  AND transact.transact_id = :tid AND (ca.Reason = 'Absent' OR ca.Reason = 'Tardy' OR ca.reason = 'Academic Deficiency/ies');
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':tid', $tid, PDO::PARAM_INT);  // Bind the ID parameter

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Assuming your blob columns are named "attachment1"
    foreach ($data as &$row) {
        foreach ($row as $key => $value) {
            if ($key === 'Attachment') {
                $row[$key] = base64_encode($value);
            }
        }
    }

    // Prepare and echo data as JSON
    echo json_encode($data);
}
 else if ($form == 'referral') {
    $teachid = $_SESSION['teachid'];

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
    student_user.Relation,
    referral.reason,
    referral.remarks,
    referral.Dates_for_AbsentTardy,
    referral.referred,
    teachers.email AS Temail,
    teachers.first_name AS Tfname,
    teachers.last_name AS Tlname,
    teachers.contact_number AS Tcn,
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
    transact ON student_user.stud_user_id = transact.student_id 
INNER JOIN
    referral ON transact.transact_id = referral.transact_id 
INNER JOIN
    teachers ON referral.teacher_id = teachers.employee_id 
LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
WHERE
    student_user.stud_user_id = :id
    AND transact.transact_type = 'referral' 
    AND transact.transact_id = :tid 
    AND referral.teacher_id = :teachid

    UNION

    SELECT
    tstable.student_id AS stud_user_id,
    tstable.last_name,
    tstable.first_name,
    NULL AS email,
    tstable.Year_level,
    tstable.course,
    tstable.gender,
    NULL AS transact_type,
    tstable.transact_id,
    tstable.Contact_number,
    NULL AS Relation,
    referral.reason,
    referral.remarks,
    referral.Dates_for_AbsentTardy,
    referral.referred,
    tstable.email AS Temail,
    teachers.first_name AS Tfname,
    teachers.last_name AS Tlname,
    teachers.contact_number AS Tcn,
        'None' AS ParentGuardianNumber,
    'None' AS ParentGuardianName
FROM
    tstable
INNER JOIN
    referral ON tstable.transact_id = referral.transact_id
INNER JOIN
    teachers ON tstable.teacher_id = teachers.employee_id
    WHERE
    tstable.transact_id = :tid;


        -- WHERE student_user.stud_user_id = :id AND transact.transact_type = 'referral' AND transact.transact_id = :tid AND referral.teacher_id = :teachid;
"; // add teacher info when Available

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT);
$stmt->bindParam(':teachid', $teachid, PDO::PARAM_INT); // Bind the ID parameter

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
    withdrawal.explain,
    withdrawal.shift_from,
    withdrawal.shift_to,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
    FROM student_user
    INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
    INNER JOIN withdrawal ON transact.transact_id = withdrawal.transact_id 
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
    WHERE student_user.stud_user_id = :id  AND transact.transact_id = :tid AND (transact.transact_type = 'Withdrawing Enrollment' OR transact.transact_type = 'Dropping Subjects' OR transact.transact_type = 'Shifting');
"; // add teacher info when Available

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT); // Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Prepare and echo data as JSON
echo json_encode($data);

    //code for withdrawal
}  else if ($form == 'appointment') {
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
    appointment.Reason,
    appointment.appointment_id,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber
    FROM student_user
    INNER JOIN transact ON student_user.stud_user_id = transact.student_id 
    INNER JOIN appointment ON transact.transact_id = appointment.transact_id
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id 
    WHERE student_user.stud_user_id = :id AND transact.transact_type = 'appointment' AND transact.transact_id = :tid;
"; // add teacher info when Available

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':tid', $tid, PDO::PARAM_INT); // Bind the ID parameter

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Prepare and echo data as JSON
echo json_encode($data);

    //code for withdrawal
} 

?>