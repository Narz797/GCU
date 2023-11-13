<?php
session_start();
include '../backend/connect_database.php';
if (isset($_SESSION['origin'])) {

    $origin = $_SESSION['origin'];


    if ($origin === 'Student_Register') {
        //register for student in here
        if (!empty($_POST['membership'])) {
            $_SESSION['membership'] = $_POST['membership'];
        }
        if (!empty($_POST['indigenousInfo'])) {
            $_SESSION['indigenousInfo'] = $_POST['indigenousInfo'];
        }
        if (!empty($_POST['pwd'])) {
            $_SESSION['pwd'] = $_POST['pwd'];
        }
        if (!empty($_POST['studpar'])) {
            $_SESSION['studpar'] = $_POST['studpar'];
        }
        if (isset($_POST['src']) && is_array($_POST['src'])) {
            $_SESSION['src'] = implode(', ', $_POST['src']);
        }
        if (!empty($_POST['specificScholar'])) {
            $_SESSION['specificScholar'] = $_POST['specificScholar'];
        }
        if (!empty($_POST['specificOther'])) {
            $_SESSION['specificOther'] = $_POST['specificOther'];
        }
        if (!empty($_POST['maritalStatus'])) {
            $_SESSION['maritalStatus'] = $_POST['maritalStatus'];
        }
        if (!empty($_POST['first'])) {
            $_SESSION['first'] = $_POST['first'];
        }
        if (!empty($_POST['second'])) {
            $_SESSION['second'] = $_POST['second'];
        }
        if (!empty($_POST['third'])) {
            $_SESSION['third'] = $_POST['third'];
        }
        if (!empty($_POST['Fis'])) {
            $_SESSION['Fis'] = $_POST['Fis'];
        }
        if (!empty($_POST['Mis'])) {
            $_SESSION['Mis'] = $_POST['Mis'];
        }
        if (!empty($_POST['abtFam'])) {
            $_SESSION['abtFam'] = $_POST['abtFam'];
        }
        if (!empty($_POST['whenChild'])) {
            $_SESSION['whenChild'] = $_POST['whenChild'];
        }
        if (!empty($_POST['teachAre'])) {
            $_SESSION['teachAre'] = $_POST['teachAre'];
        }
        if (!empty($_POST['friendsDunno'])) {
            $_SESSION['friendsDunno'] = $_POST['friendsDunno'];
        }
        if (!empty($_POST['future'])) {
            $_SESSION['future'] = $_POST['future'];
        }
        if (!empty($_POST['goal'])) {
            $_SESSION['goal'] = $_POST['goal'];
        }
        if (!empty($_POST['eu'])) {
            $_SESSION['eu'] = $_POST['eu'];
        }
        if (!empty($_POST['pass'])) {
            $_SESSION['pass'] = $_POST['pass'];
        }
        if (!empty($_POST['conpass'])) {
            $_SESSION['conpass'] = $_POST['conpass'];
        }

        if (isset($_FILES['sign']) && $_FILES['sign']['error'] === UPLOAD_ERR_OK) {
            $signContent = file_get_contents($_FILES['image']['tmp_name']);
            $signType = $_FILES['sign']['type'];
        }
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            $imageType = $_FILES['image']['type'];
        }
        
        echo var_dump($_SESSION);

        $query1 = "SELECT * FROM `student_user` WHERE `stud_user_id` = ?";
        $stmt = $pdo->prepare($query1);
        $stmt->bindParam(1, $_SESSION['idno']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 1) {
            echo "User Already Registered";
        } else {
            if($_SESSION['pass'] != $_SESSION['conpass']){
                echo "The password is not equal to your confirm password. Please check your passwords";
            }else{
            $hashedPassword = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO `student_user`(
            `stud_user_id`, `course`, `Year_level`, `last_name`,`first_name`,
            `middle_name`, `Contact_number`, `year_enrolled`, `Section`, `Civil_status`, 
            `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`,
            `Address`, `email`,`IG`,`PWD`,`studpar`,`maritalStatus`, `username`,
            `password`) 
            VALUES (?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $_SESSION['idno']);
            $stmt->bindParam(2, $_SESSION['course']);
            $stmt->bindParam(3, $_SESSION['year_level']);
            $stmt->bindParam(4, $_SESSION['lastname']);
            $stmt->bindParam(5, $_SESSION['firstname']);
            $stmt->bindParam(6, $_SESSION['middlename']);
            $stmt->bindParam(7, $_SESSION['cn']);
            $stmt->bindParam(8,$_SESSION['year_enroll']);
            $stmt->bindParam(9, $_SESSION['section']);
            $stmt->bindParam(10, $_SESSION['civil_status']);
            $stmt->bindParam(11,$_SESSION['gender']);
            $stmt->bindParam(12,$_SESSION['dob']);
            $stmt->bindParam(13,$_SESSION['bp']);
            $stmt->bindParam(14,$_SESSION['nationality']);
            $stmt->bindParam(15,$_SESSION['lang']);
            $stmt->bindParam(16,$_SESSION['address']);
            $stmt->bindParam(17,$_SESSION['email']);
            $stmt->bindParam(18,$_SESSION['membership']);
            $stmt->bindParam(19,$_SESSION['pwd']);
            $stmt->bindParam(20,$_SESSION['studpar']);
            $stmt->bindParam(21,$_SESSION['maritalStatus']);
            $stmt->bindParam(22,$_SESSION['eu']);
            $stmt->bindParam(23,$hashedPassword);

            $sql1 = "INSERT INTO `elementary_school`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(1, $_SESSION['idno']);
            $stmt1->bindParam(2, $_SESSION['elemname']);
            $stmt1->bindParam(3, $_SESSION['elemyear']);
            $stmt1->bindParam(4,$_SESSION['elemawards']);

            $sql2 = "INSERT INTO `junior_highschool`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(1, $_SESSION['idno']);
            $stmt2->bindParam(2, $_SESSION['junschool']);
            $stmt2->bindParam(3, $_SESSION['junyear']);
            $stmt2->bindParam(4,$_SESSION['junawards']);

            $sql3 = "INSERT INTO `senior_highschool`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->bindParam(1, $_SESSION['idno']);
            $stmt3->bindParam(2, $_SESSION['senschool']);
            $stmt3->bindParam(3, $_SESSION['senyear']);
            $stmt3->bindParam(4,$_SESSION['senawards']);

            if($_SESSION['othname']!=null && $_SESSION['othyear']!=null && $_SESSION['othawards']!=null){
                $sql6 = "INSERT INTO `other_school`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
                $stmt6 = $pdo->prepare($sql6);
                $stmt6->bindParam(1, $_SESSION['idno']);
                $stmt6->bindParam(2, $_SESSION['othname']);
                $stmt6->bindParam(3, $_SESSION['othyear']);
                $stmt6->bindParam(4,$_SESSION['othawards']);

                $stmt6->execute();
            }

            if($_SESSION['whom']=='parents'){
                $sql4 = "INSERT INTO `father`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`) VALUES (?,?,?,?,?,?,?)";
                $stmt4 = $pdo->prepare($sql4);
                $stmt4->bindParam(1, $_SESSION['idno']);
                $stmt4->bindParam(2, $_SESSION['Ffname']);
                $stmt4->bindParam(3, $_SESSION['Fmname']);
                $stmt4->bindParam(4, $_SESSION['Flname']);
                $stmt4->bindParam(5,$_SESSION['Fage']);
                $stmt4->bindParam(6,$_SESSION['Focc']);
                $stmt4->bindParam(7,$_SESSION['Fedu']);

                $stmt4->execute();

                $sql5 = "INSERT INTO `mother`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`) VALUES (?,?,?,?,?,?,?)";
                $stmt5 = $pdo->prepare($sql5);
                $stmt5->bindParam(1, $_SESSION['idno']);
                $stmt5->bindParam(2, $_SESSION['Mfname']);
                $stmt5->bindParam(3, $_SESSION['Mmname']);
                $stmt5->bindParam(4, $_SESSION['Mlname']);
                $stmt5->bindParam(5,$_SESSION['Mage']);
                $stmt5->bindParam(6,$_SESSION['Mocc']);
                $stmt5->bindParam(7,$_SESSION['Medu']);

                $stmt5->execute();

            }
            if($_SESSION['whom']=='guardian'){
                $sql8 = "INSERT INTO `guardian`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`) VALUES (?,?,?,?,?,?,?)";
                $stmt8 = $pdo->prepare($sql8);
                $stmt8->bindParam(1, $_SESSION['idno']);
                $stmt8->bindParam(2, $_SESSION['Gfname']);
                $stmt8->bindParam(3, $_SESSION['Gmname']);
                $stmt8->bindParam(4, $_SESSION['Glname']);
                $stmt8->bindParam(5,$_SESSION['Gage']);
                $stmt8->bindParam(6,$_SESSION['Gocc']);
                $stmt8->bindParam(7,$_SESSION['Gedu']);

                $stmt8->execute();
            }

            $sql6 = "INSERT INTO `other_info`(`stud_user_id`,`source`,`first`,`second`,`third`,`Fis`,`Mis`,`abtFam`,`whenChild`,`teachAre`,`friendsDuno`,`future`,`goal`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt6 = $pdo->prepare($sql6);
            $stmt6->bindParam(1, $_SESSION['idno']);
            $stmt6->bindParam(2, $_SESSION['src']);
            $stmt6->bindParam(3, $_SESSION['first']);
            $stmt6->bindParam(4, $_SESSION['second']);
            $stmt6->bindParam(5, $_SESSION['third']);
            $stmt6->bindParam(6,$_SESSION['Fis']);
            $stmt6->bindParam(7,$_SESSION['Mis']);
            $stmt6->bindParam(8,$_SESSION['abtFam']);
            $stmt6->bindParam(9, $_SESSION['whenChild']);
            $stmt6->bindParam(10, $_SESSION['teachAre']);
            $stmt6->bindParam(11,$_SESSION['friendsDunno']);
            $stmt6->bindParam(12,$_SESSION['future']);
            $stmt6->bindParam(13,$_SESSION['goal']);

            $sql7 = "INSERT INTO `photos`(`stud_user_id`,`signature`,`sign_type`,`id`, `image_type`) VALUES (?,?,?,?,?)";
            $stmt7 = $pdo->prepare($sql7);
            $stmt7->bindParam(1, $stud_user_id);
            $stmt7->bindParam(2, $signContent, PDO::PARAM_LOB);
            $stmt7->bindParam(3, $signType);
            $stmt7->bindParam(4, $imageContent, PDO::PARAM_LOB);
            $stmt7->bindParam(5, $imageType);
    
            if ($stmt->execute() && $stmt1->execute() && $stmt2->execute()
            && $stmt3->execute() && $stmt6->execute() && $stmt7->execute()) {
                echo "success_teacher";
            } else {
                echo "Registration failed";
            }
            }
        }

        }
        elseif ($origin === 'Teacher_Register') {
            if (
                isset($_POST['idNumber'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'],
                $_POST['cn'], $_POST['college'], $_POST['gender'], $_POST['stat'], $_POST['email'], $_POST['password'])
            ) {
                $idnumber = $_POST['idNumber'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $middlename = $_POST['middlename'];
                $gender = $_POST['gender'];
                $college = $_POST['college'];
                $cn = $_POST['cn'];
                $stat = $_POST['stat'];
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                // Use prepared statements with PDO
                $query = "SELECT * FROM `teachers` WHERE `employee_id` = ?";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(1, $idnumber);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                if (count($result) === 1) {
                    echo "User Already Registered";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `teachers` (`employee_id`, `college`, `gender`, `last_name`, `first_name`, `middle_name`, `contact_number`, `email`, `password`, `civil_status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(1, $idnumber);
                    $stmt->bindParam(2, $college);
                    $stmt->bindParam(3, $gender);
                    $stmt->bindParam(4, $lastname);
                    $stmt->bindParam(5, $firstname);
                    $stmt->bindParam(6, $middlename);
                    $stmt->bindParam(7, $cn);
                    $stmt->bindParam(8, $email);
                    $stmt->bindParam(9, $hashedPassword);
                    $stmt->bindParam(10, $stat);
            
                    if ($stmt->execute()) {
                        echo "success_teacher";
                    } else {
                        echo "Registration failed";
                    }
                }
            } else {
                echo "Missing data fields.";
            }
            
            // Close the database connection
            // $conn->close();
            
        }
}
$pdo = null; // Close the database connection
