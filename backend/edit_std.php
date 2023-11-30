<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';

if (isset($_POST['membership'])) {
    $_SESSION['membership'] = $_POST['membership'];
}
if (isset($_POST['indigenousInfo'])) {
    $_SESSION['indigenousInfo'] = $_POST['indigenousInfo'];
}
if (isset($_POST['pwd'])) {
    $_SESSION['pwd'] = $_POST['pwd'];
}
if (isset($_POST['studpar'])) {
    $_SESSION['studpar'] = $_POST['studpar'];
}
if (isset($_POST['src']) && is_array($_POST['src'])) {
    $_SESSION['src'] = implode(', ', $_POST['src']);
}
if (isset($_POST['specificScholar'])) {
    $_SESSION['specificScholar'] = $_POST['specificScholar'];
}
if (isset($_POST['specificOther'])) {
    $_SESSION['specificOther'] = $_POST['specificOther'];
}
if (isset($_POST['maritalStatus'])) {
    $_SESSION['maritalStatus'] = $_POST['maritalStatus'];
}
if (isset($_POST['first'])) {
    $_SESSION['first'] = $_POST['first'];
}
if (isset($_POST['second'])) {
    $_SESSION['second'] = $_POST['second'];
}
if (isset($_POST['third'])) {
    $_SESSION['third'] = $_POST['third'];
}
if (isset($_POST['Fis'])) {
    $_SESSION['Fis'] = $_POST['Fis'];
}
if (isset($_POST['Mis'])) {
    $_SESSION['Mis'] = $_POST['Mis'];
}
if (isset($_POST['kapatid'])) {
    $_SESSION['kapatid'] = $_POST['kapatid'];
}
if (isset($_POST['kap_res'])) {
    $_SESSION['kap_res'] = $_POST['kap_res'];
}
if (isset($_POST['abtFam'])) {
    $_SESSION['abtFam'] = $_POST['abtFam'];
}
if (isset($_POST['whenChild'])) {
    $_SESSION['whenChild'] = $_POST['whenChild'];
}
if (isset($_POST['teachAre'])) {
    $_SESSION['teachAre'] = $_POST['teachAre'];
}
if (isset($_POST['friendsDunno'])) {
    $_SESSION['friendsDunno'] = $_POST['friendsDunno'];
}
if (isset($_POST['future'])) {
    $_SESSION['future'] = $_POST['future'];
}
if (isset($_POST['goal'])) {
    $_SESSION['goal'] = $_POST['goal'];
}
if (isset($_POST['eu'])) {
    $_SESSION['eu'] = $_POST['eu'];
}
if (isset($_POST['email'])){
    $_SESSION['email'] = $_POST['email'];
}
// if (isset($_POST['pass'])) {
//     $_SESSION['pass'] = $_POST['pass'];
// }
if (isset($_POST['conpass'])) {
    $_SESSION['conpass'] = $_POST['conpass'];
}





        // $hashedPassword = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
        $sql = "UPDATE `student_user`
        SET `course` = ?, `Year_level` = ?, `last_name` = ?, `first_name` = ?, `middle_name` = ?,
            `Contact_number` = ?, `year_enrolled` = ?, `Section` = ?, `Civil_status` = ?, `gender` = ?,
            `birth_date` = ?, `Birth_place` = ?, `Nationality` = ?, `Languages_and_dialects` = ?,
            `Address` = ?, `email` = ?, `IG` = ?, `specificIG` = ?, `PWD` = ?, `Student_parent` = ?,
            `Marital_status_of_parents` = ?, `username` = ?, `password` = ?
        WHERE `stud_user_id` = ?
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $_POST['id']);
        $stmt->bindParam(2, $_SESSION['course']);
        $stmt->bindParam(3, $_SESSION['year_level']);
        $stmt->bindParam(4, $_SESSION['lastname']);
        $stmt->bindParam(5, $_SESSION['firstname']);
        $stmt->bindParam(6, $_SESSION['middlename']);
        $stmt->bindParam(7, $_SESSION['cn']);
        $stmt->bindParam(8, $_SESSION['year_enroll']);
        $stmt->bindParam(9, $_SESSION['section']);
        $stmt->bindParam(10, $_SESSION['civil_status']);
        $stmt->bindParam(11, $_SESSION['gender']);
        $stmt->bindParam(12, $_SESSION['dob']);
        $stmt->bindParam(13, $_SESSION['bp']);
        $stmt->bindParam(14, $_SESSION['nationality']);
        $stmt->bindParam(15, $_SESSION['lang']);
        $stmt->bindParam(16, $_SESSION['address']);
        $stmt->bindParam(17, $_SESSION['email']);
        $stmt->bindParam(18, $_SESSION['membership']);
        $stmt->bindParam(19, $_SESSION['indigenousInfo']);
        $stmt->bindParam(20, $_SESSION['pwd']);
        $stmt->bindParam(21, $_SESSION['studpar']);
        $stmt->bindParam(22, $_SESSION['maritalStatus']);
        $stmt->bindParam(23, $_SESSION['eu']);
        $stmt->bindParam(24, $hashedPassword);

        $sql1 = "UPDATE elementary_school SET school_name = ?, year = ?, awards = ? WHERE stud_user_id = ?";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(1, $_POST['id']);
        $stmt1->bindParam(2, $_SESSION['elemname']);
        $stmt1->bindParam(3, $_SESSION['elemyear']);
        $stmt1->bindParam(4, $_SESSION['elemawards']);

        $sql2 = "UPDATE junior_highschool SET school_name = ?, year = ?, awards = ? WHERE stud_user_id = ?";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(1, $_POST['id']);
        $stmt2->bindParam(2, $_SESSION['junschool']);
        $stmt2->bindParam(3, $_SESSION['junyear']);
        $stmt2->bindParam(4, $_SESSION['junawards']);

        $sql3 = "UPDATE senior_highschool SET school_name = ?, year = ?, awards = ? WHERE stud_user_id = ?";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindParam(1, $_POST['id']);
        $stmt3->bindParam(2, $_SESSION['senschool']);
        $stmt3->bindParam(3, $_SESSION['senyear']);
        $stmt3->bindParam(4, $_SESSION['senawards']);

        if (isset($_SESSION['othname']) && isset($_SESSION['othyear']) && isset($_SESSION['othawards'])) {
            $sql6 = "UPDATE other_school SET school_name = ?, year = ?, awards = ? WHERE stud_user_id = ?";
            $stmt6 = $pdo->prepare($sql6);
            $stmt6->bindParam(1, $_POST['id']);
            $stmt6->bindParam(2, $_SESSION['othname']);
            $stmt6->bindParam(3, $_SESSION['othyear']);
            $stmt6->bindParam(4, $_SESSION['othawards']);

            $stmt6->execute();
        }

        // if ($_SESSION['whom'] == 'parents') {
            $sql4 = "UPDATE father SET fname = ?, mname = ?, lname = ?, age = ?, occupation = ?, educ_background = ?, contact = ? WHERE stud_user_id = ?";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4->bindParam(1, $_POST['id']);
            $stmt4->bindParam(2, $_SESSION['Ffname']);
            $stmt4->bindParam(3, $_SESSION['Fmname']);
            $stmt4->bindParam(4, $_SESSION['Flname']);
            $stmt4->bindParam(5, $_SESSION['Fage']);
            $stmt4->bindParam(6, $_SESSION['Focc']);
            $stmt4->bindParam(7, $_SESSION['Fedu']);
            $stmt4->bindParam(8, $_SESSION['Fcontact']);

            $stmt4->execute();

            $sql5 = "UPDATE mother SET fname = ?, mname = ?, lname = ?, age = ?, occupation = ?, educ_background = ?, contact = ? WHERE stud_user_id = ?";
            $stmt5 = $pdo->prepare($sql5);
            $stmt5->bindParam(1, $_POST['id']);
            $stmt5->bindParam(2, $_SESSION['Mfname']);
            $stmt5->bindParam(3, $_SESSION['Mmname']);
            $stmt5->bindParam(4, $_SESSION['Mlname']);
            $stmt5->bindParam(5, $_SESSION['Mage']);
            $stmt5->bindParam(6, $_SESSION['Mocc']);
            $stmt5->bindParam(7, $_SESSION['Medu']);
            $stmt5->bindParam(8, $_SESSION['Mcontact']);

            $stmt5->execute();
        // }
        // if ($_SESSION['whom'] == 'guardian') {
            $sql8 = "UPDATE guardian SET fname = ?, mname = ?, lname = ?, age = ?, occupation = ?, educ_background = ?, contact = ? WHERE stud_user_id = ?";
            $stmt8 = $pdo->prepare($sql8);
            $stmt8->bindParam(1, $_POST['id']);
            $stmt8->bindParam(2, $_SESSION['Gfname']);
            $stmt8->bindParam(3, $_SESSION['Gmname']);
            $stmt8->bindParam(4, $_SESSION['Glname']);
            $stmt8->bindParam(5, $_SESSION['Gage']);
            $stmt8->bindParam(6, $_SESSION['Gocc']);
            $stmt8->bindParam(7, $_SESSION['Gedu']);
            $stmt8->bindParam(8, $_SESSION['Gcontact']);

            $stmt8->execute();
        // }

        $sql6 = "UPDATE other_info SET source = ?, specific_scholar = ?, specific_other = ?, first = ?, second = ?, third = ?, Fis = ?, Mis = ?, kapatid = ?, kap_res = ?, abtFam = ?, whenChild = ?, teachAre = ?, friendsDuno = ?, future = ?, goal = ? WHERE stud_user_id = ?";
        $stmt6 = $pdo->prepare($sql6);
        $stmt6->bindParam(1, $_POST['id']);
        $stmt6->bindParam(2, $_SESSION['src']);
        $stmt6->bindParam(3, $_SESSION['specificScholar']);
        $stmt6->bindParam(4, $_SESSION['scecificOther']);
        $stmt6->bindParam(5, $_SESSION['first']);
        $stmt6->bindParam(6, $_SESSION['second']);
        $stmt6->bindParam(7, $_SESSION['third']);
        $stmt6->bindParam(8, $_SESSION['Fis']);
        $stmt6->bindParam(9, $_SESSION['Mis']);
        $stmt6->bindParam(10, $_SESSION['kapatid']);
        $stmt6->bindParam(11, $_SESSION['kap_res']);
        $stmt6->bindParam(12, $_SESSION['abtFam']);
        $stmt6->bindParam(13, $_SESSION['whenChild']);
        $stmt6->bindParam(14, $_SESSION['teachAre']);
        $stmt6->bindParam(15, $_SESSION['friendsDunno']);
        $stmt6->bindParam(16, $_SESSION['future']);
        $stmt6->bindParam(17, $_SESSION['goal']);

        // $sql7 = "INSERT INTO `photos`(`stud_user_id`,`signature`,`sign_type`, `id_picture`, `image_type`) VALUES (?,?,?,?,?)";
        // $stmt7 = $pdo->prepare($sql7);
        // $stmt7->bindParam(1, $_POST['id']);
        // $stmt7->bindParam(2, $signContent, PDO::PARAM_LOB);
        // $stmt7->bindParam(3, $signType);
        // $stmt7->bindParam(4, $imageContent, PDO::PARAM_LOB);
        // $stmt7->bindParam(5, $imageType);

        // $stmt7->execute();

        if ($stmt->execute() && $stmt1->execute() && $stmt2->execute() && $stmt3->execute() && $stmt6->execute()) {
            echo '<script>';
            echo "alert('Updated Successfully!');";
            // echo 'window.location.href=" ../Student_Side/student-login";';
            echo '</script>';
            exit;
        } else {
            echo '<script>';
            echo "alert('Update Failed!');";
            // echo 'window.location.href=" ../Student_Side/Stud_registration/page1.php";';
            echo '</script>';
            exit;
        }

?>
