<?php
session_start();
include '../backend/connect_database.php';

if (isset($_POST['idno'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['course'], $_POST['year'], $_POST['cn'], $_POST['email'], $_POST['cs'], $_POST['dob'], $_POST['bp'], $_POST['nationality'], $_POST['lang'], $_POST['address'], $_POST['whom'], $_POST['Flname'], $_POST['Ffname'], $_POST['Fmname'], $_POST['Fage'], $_POST['Focc'], $_POST['Fedu'], $_POST['Mlname'], $_POST['Mfname'], $_POST['Mmname'], $_POST['Mage'], $_POST['Mocc'], $_POST['Medu'], $_POST['Glname'], $_POST['Gfname'], $_POST['Gmname'], $_POST['Gage'], $_POST['Gocc'], $_POST['Gedu'], $_POST['total_number'], $_POST['siblings'], $_POST['membership'], $_POST['indigenousInfo'], $_POST['pwd'], $_POST['studpar'], $_POST['src'], $_POST['maritalStatus'], $_POST['first'], $_POST['Fis'], $_POST['Mis'], $_POST['abtFam'], $_POST['whenChild'], $_POST['teachAre'], $_POST['freindsDunno'], $_POST['future'], $_POST['goal'], $_POST['eu'], $_POST['pass'])) {
    $idno = $_POST['idno'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $cn = $_POST['cn'];
    $email = $_POST['email'];
    $cs = $_POST['cs'];
    $dob = $_POST['dob'];
    $bp = $_POST['bp'];
    $nationality = $_POST['nationality'];
    $lang = $_POST['lang'];
    $address = $_POST['address'];
    $whom = $_POST['whom'];
    $Flname = $_POST['Flname'];
    $Ffname = $_POST['Ffname'];
    $Fmname = $_POST['Fmname'];
    $Fage = $_POST['Fage'];
    $Focc = $_POST['Focc'];
    $Fedu = $_POST['Fedu'];
    $Mlname = $_POST['Mlname'];
    $Mfname = $_POST['Mfname'];
    $Mmname = $_POST['Mmname'];
    $Mage = $_POST['Mage'];
    $Mocc = $_POST['Mocc'];
    $Medu = $_POST['Medu'];
    $Glname = $_POST['Glname'];
    $Gfname = $_POST['Gfname'];
    $Gmname = $_POST['Gmname'];
    $Gage = $_POST['Gage'];
    $Gocc = $_POST['Gocc'];
    $Gedu = $_POST['Gedu'];
    $total_number = $_POST['total_number'];
    $siblings = $_POST['siblings'];
    $membership = $_POST['membership'];
    $indigenousInfo = $_POST['indigenousInfo'];
    $pwd = $_POST['pwd'];
    $studpar = $_POST['studpar'];
    $src = implode(', ', $_POST['src']);
    $maritalStatus = $_POST['maritalStatus'];
    $first = $_POST['first'];
    $Fis = $_POST['Fis'];
    $Mis = $_POST['Mis'];
    $abtFam = $_POST['abtFam'];
    $whenChild = $_POST['whenChild'];
    $teachAre = $_POST['teachAre'];
    $freindsDunno = $_POST['freindsDunno'];
    $future = $_POST['future'];
    $goal = $_POST['goal'];
    $eu = $_POST['eu'];
    $pass = $_POST['pass'];

    // Check if the user already exists using prepared statements
    $query = "SELECT * FROM `student_user` WHERE `stud_user_id` = :idno";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idno', $idno, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        echo "User Already Registered";
    } else {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Insert the user data using prepared statements
        $sql = "INSERT INTO `student_user` (`stud_user_id`, `first_name`, `last_name`, `middle_name`, `Year_level`, `course`, `birth_date`, `email`, `Contact_number`, `Civil_status`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, `Whom_do_you_live`, `IG`, `PWD`, `Student_parent`, `Financial_support`, `Marital_status_of_parents`, `username`, `password`) VALUES (:idno, :firstname, :lastname, :middlename, :year, :course, :dob, :email, :cn, :cs, :dob, :bp, :nationality, :lang, :address, :whom, :indigenousInfo, :pwd, :studpar, :src, :maritalStatus, :eu, :hashedPassword)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idno', $idno, PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':middlename', $middlename, PDO::PARAM_STR);
        $stmt->bindParam(':year', $year, PDO::PARAM_STR);
        $stmt->bindParam(':course', $course, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':cn', $cn, PDO::PARAM_STR);
        $stmt->bindParam(':cs', $cs, PDO::PARAM_STR);
        $stmt->bindParam(':bp', $bp, PDO::PARAM_STR);
        $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
        $stmt->bindParam(':lang', $lang, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':whom', $whom, PDO::PARAM_STR);
        $stmt->bindParam(':indigenousInfo', $indigenousInfo, PDO::PARAM_STR);
        $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
        $stmt->bindParam(':studpar', $studpar, PDO::PARAM_STR);
        $stmt->bindParam(':src', $src, PDO::PARAM_STR);
        $stmt->bindParam(':maritalStatus', $maritalStatus, PDO::PARAM_STR);
        $stmt->bindParam(':eu', $eu, PDO::PARAM_STR);
        $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute(); // Execute the statement

        if ($stmt->rowCount() === 1) {
            echo "success_student";
        } else {
            echo "Error inserting data.";
        }
    }
} else {
    echo "Missing data fields.";
}

$pdo = null; // Close the database connection using PDO
?>
