<?php
session_start(); // Ensure the session is started
$id = $_SESSION['stud_user_id'];

include '../backend/connect_database.php';

$sql = "SELECT DISTINCT
student_user.stud_user_id,
student_user.last_name,
student_user.first_name,
student_user.email,
student_user.Year_level,
student_user.course,
student_user.gender,
courses.Colleges,
student_user.Contact_number,
student_user.Address,
student_user.year_enrolled,
student_user.Civil_status,
student_user.birth_date,
student_user.Birth_place,
student_user.Nationality,
student_user.IG,
student_user.PWD,
student_user.Student_parent,
student_user.Marital_status_of_parents,
other_info.source,
COALESCE(mother.fname, '') AS mfname,
 COALESCE(mother.lname, '') AS mlname,
COALESCE(mother.occupation, '') AS mocc,
 COALESCE(mother.educ_background, '') AS medu,
 COALESCE(mother.contact, '') AS mcn,
 COALESCE(mother.age, '') AS mage,
 COALESCE(father.fname, '') AS ffname,
 COALESCE(father.lname, '') AS flname,
 COALESCE(father.occupation, '') AS focc,
 COALESCE(father.educ_background, '') AS fedu,
 COALESCE(father.contact, '') AS fcn,
 COALESCE(father.age, '') AS fage,
 COALESCE(guardian.fname, '') AS gfname,
 COALESCE(guardian.lname, '') AS glname,
 COALESCE(guardian.occupation, '') AS gocc,
 COALESCE(guardian.educ_background, '') AS gedu,
 COALESCE(guardian.contact, '') AS gcn,
 COALESCE(guardian.age, '') AS gage,
senior_highschool.school_name AS HS,
senior_highschool.year AS HS_YG,
junior_highschool.school_name AS JS,
junior_highschool.year AS JS_YG,
elementary_school.school_name AS ES,
elementary_school.year AS ES_YG,
 other_school.school_name AS OS,
 other_school.year AS OS_YG,
other_info.first,
other_info.second,
other_info.third,
other_info.goal,
other_info.fis,
other_info.mis,
other_info.kapatid,
other_info.kap_res,
other_info.whenChild,
other_info.teachAre,
other_info.friendsDuno,
other_info.future
FROM student_user
INNER JOIN courses ON student_user .course = courses.Acronym
LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
LEFT JOIN father ON student_user.stud_user_id = father.stud_user_id
INNER JOIN senior_highschool ON student_user.stud_user_id = senior_highschool.stud_user_id
INNER JOIN junior_highschool ON student_user.stud_user_id = junior_highschool.stud_user_id
INNER JOIN elementary_school ON student_user.stud_user_id = elementary_school.stud_user_id
INNER JOIN other_school ON student_user.stud_user_id = other_school.stud_user_id

INNER JOIN other_info ON student_user.stud_user_id = other_info.stud_user_id
    WHERE student_user.stud_user_id = :id"; // Use a named placeholder

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach ($data as &$row) {
//     $row['signature'] = base64_encode($row['signature']);
//     $row['id'] = base64_encode($row['id']);
// }


// Prepare and echo data as JSON
echo json_encode($data);
?>
