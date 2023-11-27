<?php
session_start();
ob_start();
include '../backend/connect_database.php';
if (isset($_SESSION['origin'])) {

    $origin = $_SESSION['origin'];

    if ($origin === 'Student_Register') {

        // if(isset($_POST['indigenousInfo'])){
        //     $_SESSION['indigenousInfo'] = $_POST['indigenousInfo'];
        // }

        // if(isset($_POST['specificScholar'])){
        //     $_SESSION['specificScholar'] = $_POST['specificScholar'];
        // }

        // if(isset($_POST['specificOther'])){
        //     $_SESSION['specificOther'] = $_POST['specificOther'];
        // }

        //register for student in here
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
        if (isset($_POST['pass'])) {
            $_SESSION['pass'] = $_POST['pass'];
        }
        if (isset($_POST['conpass'])) {
            $_SESSION['conpass'] = $_POST['conpass'];
        }
        if (
            isset($_FILES['sign']) && $_FILES['sign']['error'] === UPLOAD_ERR_OK &&
            isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK
        ) {

            $studUserId = $_SESSION['idno']; // replace with the actual user ID
            // $studlastName = $_SESSION['lastname'];

            // // Save the signature file
            // $signContent = file_get_contents($_FILES['sign']['tmp_name']);
            // $signType = $_FILES['sign']['type'];
            // $signFileName = "uploads/sign_" . $studUserId . "_" . $studlastName . "." . pathinfo($_FILES['sign']['name'], PATHINFO_EXTENSION);
            // file_put_contents($signFileName, $signContent);

            // // Save the ID picture file
            // $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            // $imageType = $_FILES['image']['type'];
            // $imageFileName = "uploads/id_" . $studUserId . "_" . $studlastName . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // file_put_contents($imageFileName, $imageContent);

            $photoId = file_get_contents($_FILES['sign']['tmp_name']);
            $photosign = file_get_contents($_FILES['image']['tmp_name']);

            $stmt = $pdo->prepare("INSERT INTO `photos` (stud_user_id, sign,sign_type,id,image_type) VALUES (:stud_user_id, :sign,:sign_type,:id,:image_type)");
            $stmt->bindParam(":stud_user_id", $studUserId);
            $stmt->bindParam(":sign",$photosign, PDO::PARAM_LOB);
            $stmt->bindParam(":sign_type",$_FILES['sign']['type']);
            $stmt->bindParam(":id",$photoId, PDO::PARAM_LOB);
            $stmt->bindParam(":image_type",$_FILES['image']['type']);

            $stmt->execute();

        } else {
            echo "Error uploading files.";
        }
        if (
            isset($_SESSION['sib_lname']) && isset($_SESSION['sib_fname'])
            && isset($_SESSION['sib_mname']) && isset($_SESSION['sib_age']) && isset($_SESSION['sib_educ_attainment'])
            && isset($_SESSION['sib_civil_status'])
        ) {
            $sibling_count = $_SESSION['total_number'];
            // Assuming siblings data structure, loop through and construct SQL queries
            $stmtSibling = $pdo->prepare("INSERT INTO siblings (studentId, lastName, firstName, middleName, age, highEdu, civilStatus) 
                VALUES (:studentId, :lastName, :firstName, :middleName, :age, :highEdu, :civilStatus)");

            for ($sibling_count; $sibling_count > 0; $sibling_count--) {
                $stmtSibling->bindParam(':studentId', $_SESSION['idno']);
                $stmtSibling->bindParam(':lastName', $_SESSION['sib_lname'][$sibling_count - 1]);
                $stmtSibling->bindParam(':firstName', $_SESSION['sib_fname'][$sibling_count - 1]);
                $stmtSibling->bindParam(':middleName', $_SESSION['sib_mname'][$sibling_count - 1]);
                $stmtSibling->bindParam(':age', $_SESSION['sib_age'][$sibling_count - 1]);
                $stmtSibling->bindParam(':highEdu', $_SESSION['sib_educ_attainment'][$sibling_count - 1]);
                $stmtSibling->bindParam(':civilStatus', $_SESSION['sib_civil_status'][$sibling_count - 1]);

                $stmtSibling->execute();
            }
        }

        $query1 = "SELECT * FROM `student_user` WHERE `stud_user_id` = ?";
        $stmt = $pdo->prepare($query1);
        $stmt->bindParam(1, $_SESSION['idno']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 1) {
            echo '<script>';
            echo "alert('User Already Registered');";
            echo 'window.location.href=" ../Student_Side/Stud_registration/page1.php";';
            echo '</script>';
            exit;
        } else {
            if ($_SESSION['pass'] != $_SESSION['conpass']) {
                echo '<script>';
                echo "alert('The password is not equal to your confirm password. Please check your passwords');";
                echo 'window.location.href=" ../Student_Side/Stud_registration/page1.php";';
                echo '</script>';
                exit;
            } else {
                $hashedPassword = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
                $sql = "INSERT INTO `student_user`(
            `stud_user_id`, `course`, `Year_level`, `last_name`,`first_name`,
            `middle_name`, `Contact_number`, `year_enrolled`, `Section`, `Civil_status`, 
            `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`,
            `Address`, `email`,`IG`,`specificIG`,`PWD`,`Student_parent`,`Marital_status_of_parents`, `username`,
            `password`) 
            VALUES (?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(1, $_SESSION['idno']);
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

                $sql1 = "INSERT INTO `elementary_school`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->bindParam(1, $_SESSION['idno']);
                $stmt1->bindParam(2, $_SESSION['elemname']);
                $stmt1->bindParam(3, $_SESSION['elemyear']);
                $stmt1->bindParam(4, $_SESSION['elemawards']);

                $sql2 = "INSERT INTO `junior_highschool`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->bindParam(1, $_SESSION['idno']);
                $stmt2->bindParam(2, $_SESSION['junschool']);
                $stmt2->bindParam(3, $_SESSION['junyear']);
                $stmt2->bindParam(4, $_SESSION['junawards']);

                $sql3 = "INSERT INTO `senior_highschool`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
                $stmt3 = $pdo->prepare($sql3);
                $stmt3->bindParam(1, $_SESSION['idno']);
                $stmt3->bindParam(2, $_SESSION['senschool']);
                $stmt3->bindParam(3, $_SESSION['senyear']);
                $stmt3->bindParam(4, $_SESSION['senawards']);

                if (isset($_SESSION['othname']) && isset($_SESSION['othyear']) && isset($_SESSION['othawards'])) {
                    $sql6 = "INSERT INTO `other_school`(`stud_user_id`,`school_name`,`year`,`awards`) VALUES (?,?,?,?)";
                    $stmt6 = $pdo->prepare($sql6);
                    $stmt6->bindParam(1, $_SESSION['idno']);
                    $stmt6->bindParam(2, $_SESSION['othname']);
                    $stmt6->bindParam(3, $_SESSION['othyear']);
                    $stmt6->bindParam(4, $_SESSION['othawards']);

                    $stmt6->execute();
                }

                if ($_SESSION['whom'] == 'parents') {
                    $sql4 = "INSERT INTO `father`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`,`contact`) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt4 = $pdo->prepare($sql4);
                    $stmt4->bindParam(1, $_SESSION['idno']);
                    $stmt4->bindParam(2, $_SESSION['Ffname']);
                    $stmt4->bindParam(3, $_SESSION['Fmname']);
                    $stmt4->bindParam(4, $_SESSION['Flname']);
                    $stmt4->bindParam(5, $_SESSION['Fage']);
                    $stmt4->bindParam(6, $_SESSION['Focc']);
                    $stmt4->bindParam(7, $_SESSION['Fedu']);
                    $stmt4->bindParam(8, $_SESSION['Fcontact']);

                    $stmt4->execute();

                    $sql5 = "INSERT INTO `mother`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`,`contact`) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt5 = $pdo->prepare($sql5);
                    $stmt5->bindParam(1, $_SESSION['idno']);
                    $stmt5->bindParam(2, $_SESSION['Mfname']);
                    $stmt5->bindParam(3, $_SESSION['Mmname']);
                    $stmt5->bindParam(4, $_SESSION['Mlname']);
                    $stmt5->bindParam(5, $_SESSION['Mage']);
                    $stmt5->bindParam(6, $_SESSION['Mocc']);
                    $stmt5->bindParam(7, $_SESSION['Medu']);
                    $stmt5->bindParam(8, $_SESSION['Mcontact']);

                    $stmt5->execute();
                }
                if ($_SESSION['whom'] == 'guardian') {
                    $sql8 = "INSERT INTO `guardian`(`stud_user_id`,`fname`,`mname`,`lname`,`age`,`occupation`,`educ_background`,`contact`) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt8 = $pdo->prepare($sql8);
                    $stmt8->bindParam(1, $_SESSION['idno']);
                    $stmt8->bindParam(2, $_SESSION['Gfname']);
                    $stmt8->bindParam(3, $_SESSION['Gmname']);
                    $stmt8->bindParam(4, $_SESSION['Glname']);
                    $stmt8->bindParam(5, $_SESSION['Gage']);
                    $stmt8->bindParam(6, $_SESSION['Gocc']);
                    $stmt8->bindParam(7, $_SESSION['Gedu']);
                    $stmt8->bindParam(8, $_SESSION['Gcontact']);

                    $stmt8->execute();
                }

                $sql6 = "INSERT INTO `other_info`(`stud_user_id`,`source`,`specific_scholar`,`specific_other`,`first`,`second`,`third`,`Fis`,`Mis`,`kapatid`,`kap_res`,`abtFam`,`whenChild`,`teachAre`,`friendsDuno`,`future`,`goal`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt6 = $pdo->prepare($sql6);
                $stmt6->bindParam(1, $_SESSION['idno']);
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
                // $stmt7->bindParam(1, $_SESSION['idno']);
                // $stmt7->bindParam(2, $signContent, PDO::PARAM_LOB);
                // $stmt7->bindParam(3, $signType);
                // $stmt7->bindParam(4, $imageContent, PDO::PARAM_LOB);
                // $stmt7->bindParam(5, $imageType);

                // $stmt7->execute();

                if ($stmt->execute() && $stmt1->execute() && $stmt2->execute() && $stmt3->execute() && $stmt6->execute()) {
                    echo '<script>';
                    echo "alert('Registered Successfully!');";
                    echo 'window.location.href=" ../Student_Side/student-login";';
                    echo '</script>';
                    exit;
                } else {
                    echo '<script>';
                    echo "alert('Registration Failed!');";
                    echo 'window.location.href=" ../Student_Side/Stud_registration/page1.php";';
                    echo '</script>';
                    exit;
                }
            }
        }
    } elseif ($origin === 'Teacher_Register') {
        if (
            isset(
                $_POST['idNumber'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['middlename'],
                $_POST['cn'],
                $_POST['college'],
                $_POST['gender'],
                $_POST['stat'],
                $_POST['email'],
                $_POST['password']
            )
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
                echo '<script>';
                echo "alert('User Already Registered!');";
                echo 'window.location.href=" ../Teacher_Side/register.php";';
                echo '</script>';
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
                    echo 'success_teacher';
                } 
            }
        } else {
            echo '<script>';
            echo "alert('Missing data fields!');";
            echo 'window.location.href=" ../Teacher_Side/register.php";';
            echo '</script>';
        }

        // Close the database connection
        // $conn->close();

    } elseif ($origin === 'Employee') {
        if (isset($_POST['empID'])) {
            $employee_id = $_POST['empID'];
        }

        if (isset($_POST['lname'])) {
            $employee_lname = $_POST['lname'];
        }

        if (isset($_POST['fname'])) {
            $employee_fname = $_POST['fname'];
        }

        if (isset($_POST['mname'])) {
            $employee_mname = $_POST['mname'];
        }

        if (isset($_POST['gender'])) {
            $employee_sex = $_POST['gender'];
        }

        if (isset($_POST['email'])) {
            $employee_email = $_POST['email'];
        }

        if (isset($_POST['contactnum'])) {
            $employee_contactnum = $_POST['contactnum'];
        }

        if (isset($_POST['position'])) {
            $employee_position = $_POST['position'];
        }
        if (isset($_POST['username'])) {
            $employee_username = $_POST['username'];
        }
        if (isset($_POST['password'])) {
            $employee_password = $_POST['password'];
        }

        $joined_date = date("Y-m-d");  // Use a common MySQL date format

        // Hash the password securely
        $hashed_password = password_hash($employee_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `admin_user`(`admin_user_id`, `first_name`, 
            `last_name`, `middle_name`, `gender`, `position`,`contact`, `email`, 
            `username`, `password`, `date_joined`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $employee_id);
        $stmt->bindParam(2, $employee_fname);
        $stmt->bindParam(3, $employee_lname);
        $stmt->bindParam(4, $employee_mname);
        $stmt->bindParam(5, $employee_sex);
        $stmt->bindParam(6, $employee_position);
        $stmt->bindParam(7,$employee_contactnum);
        $stmt->bindParam(8, $joined_date);
        $stmt->bindParam(9, $employee_email);
        $stmt->bindParam(10, $employee_username);
        $stmt->bindParam(11, $hashed_password);

        if ($stmt->execute()) {
            echo '<script>';
            echo 'var eID = "' . $_SESSION["session_id"] . '";';
            echo 'alert("User Registration Successfully!");';
            echo 'window.location.href = "../Admin_Side/EmployeeProfiles.php";';
            echo ' $.ajax({';
            echo '    type: "POST",';
            echo '    url: "../backend/log_audit.php",';
            echo '    data: {';
            echo '        userId: eID,';
            echo '        action: "Admin added employee",';
            echo '        details: "Admin added employee"';
            echo '    },';
            echo '    success: function(response) {';
            echo '        console.log("logged", response);';
            echo '    }';
            echo ' });';
            echo '</script>';
            exit;
        }
        
    }
}
ob_end_flush();
$pdo = null; // Close the database connection
