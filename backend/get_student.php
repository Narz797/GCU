<?php
session_start(); // Ensure the session is started
$id = $_SESSION['stud_user_id'];

include '../backend/connect_database.php';

$sql = "SELECT
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
    mother.fname AS mfname,
    mother.lname AS mlname,
    mother.occupation AS mocc,
    mother.educ_background AS medu,
    mother.contact AS mcn,
    mother.age AS mage,
    father.fname AS ffname,
    father.lname AS flname,
    father.occupation AS focc,
    father.educ_background AS fedu,
    father.contact AS fcn,
    father.age AS fage,
    guardian.fname AS gfname,
    guardian.lname AS glname,
    guardian.occupation AS gocc,
    guardian.educ_background AS gedu,
    guardian.contact AS gcn,
    guardian.age AS gage,
    senior_highschool.school_name AS HS,
    senior_highschool.year AS HS_YG,
    junior_highschool.school_name AS JS,
    junior_highschool.year AS JS_YG,
    elementary_school.school_name AS ES,
    elementary_school.year AS ES_YG,
    other_school.school_name AS OS,
    other_school.year AS OS_YG,
    about_me.first,
    about_me.second,
    about_me.third,
    about_me.greatest_goal,
    about_me.father,
    about_me.mother,
    about_me.closest_sibling,
    about_me.because,
    about_me.when_i_was_a_child,
    about_me.teachers_are,
    about_me.dont_know_that,
    about_me.future,




    -- photos.signature,
    -- photos.id,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.fname
        ELSE mother.fname
    END AS ParentGuardianName,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN guardian.contact
        ELSE mother.contact
    END AS ParentGuardianNumber,
    CASE
        WHEN guardian.contact IS NOT NULL AND guardian.contact > 0 THEN 'Guardian'
        ELSE 'Mother'
    END AS Relation

    FROM student_user
    INNER JOIN courses ON student_user.course = courses.Acronym
    -- INNER JOIN photos ON student_user.stud_user_id = photos.stud_user_id
    LEFT JOIN guardian ON student_user.stud_user_id = guardian.stud_user_id
LEFT JOIN mother ON student_user.stud_user_id = mother.stud_user_id
LEFT JOIN father ON student_user.stud_user_id = father.stud_user_id
LEFT JOIN senior_highschool ON student_user.stud_user_id = senior_highschool.stud_user_id
LEFT JOIN junior_highschool ON student_user.stud_user_id = junior_highschool.stud_user_id
LEFT JOIN elementary_school ON student_user.stud_user_id = elementary_school.stud_user_id
LEFT JOIN other_school ON student_user.stud_user_id = other_school.stud_user_id
LEFT JOIN about_me ON student_user.stud_user_id = about_me.Student_id
LEFT JOIN other_info ON student_user.stud_user_id = other_info.stud_user_id
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
