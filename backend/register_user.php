<?php
session_start();
include '../backend/connect_database.php';
if (isset($_SESSION['origin'])) {

    $origin = $_SESSION['origin'];


    if ($origin === 'Student_Register') {
        //register for student in here
        $membership = $_POST['membership'];
        $indigeninfo = $_POST['indigenousInfo'];
        $pwd = $_POST['pwd'];
        $studpar = $_POST['studpar'];
        $src = $_POST['src'];
        $scholarship = $_POST['scholarship'];
        $others = $_POST['others'];
        $maristatus = $_POST['maritalStatus'];
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
        $Fis = $_POST['Fis'];
        $Mis = $_POST['Mis'];
        $abtFam = $_POST['abtFam'];
        $whenChild = $_POST['whenChild'];
        $teachAre = $_POST['teachAre'];
        $friendsDunno = $_POST['friendsDuno'];
        $future = $_POST['future'];
        $goal = $_POST['goal'];
        $eu = $_POST['eu'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $image = $_POST['image'];

        $query1 = "SELECT * FROM `student_user` WHERE `stud_user_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $_SESSION['idno']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 1) {
            echo "User Already Registered";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `student_user`(`stud_user_id`, `course`, `Year_level`, `last_name`,
             `first_name`, `middle_name`, `Contact_number`, `year_enrolled`, `Section`, `Civil_status`, 
             `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`, `Address`, 
             `email`, `IG`, `PWD`, `username`, `password`) 
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
            $stmt->bindParam(17,$eu);
            $stmt->bindParam(18,$membership);
            $stmt->bindParam(19,$pwd);
            $stmt->bindParam(20,$eu);
            $stmt->bindParam(21,$pass);
    
            if ($stmt->execute()) {
                echo "success_teacher";
            } else {
                echo "Registration failed";
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
?>