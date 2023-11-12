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
        if (!empty($_POST['src'])) {
            $_SESSION['src'] = $_POST['src'];
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
        if (!empty($_POST['friendsDuno'])) {
            $_SESSION['friendsDuno'] = $_POST['friendsDuno'];
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
        if (!empty($_POST['image'])) {
            $_SESSION['image'] = $_POST['image'];
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
            $hashedPassword = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO `student_user`(
            `stud_user_id`, `course`, `Year_level`, `last_name`,`first_name`,
            `middle_name`, `Contact_number`, `year_enrolled`, `Section`, `Civil_status`, 
            `gender`, `birth_date`, `Birth_place`, `Nationality`, `Languages_and_dialects`,
            `Address`, `email`,`IG`,`PWD`, `username`,
            `password`) 
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
            $stmt->bindParam(17,$_SESSION['email']);
            $stmt->bindParam(18,$_SESSION['membership']);
            $stmt->bindParam(19,$_SESSION['pwd']);
            $stmt->bindParam(20,$_SESSION['eu']);
            $stmt->bindParam(21,$hashedPassword);
    
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