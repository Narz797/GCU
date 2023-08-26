<?php
include '../backend/connect_database.php';

if (isset($_SESSION['origin'])) {
    $origin = $_SESSION['origin'];

    if ($origin === 'Student_Register') {
        if (isset($_POST['idno']) && isset($_POST['firstname'])&& isset($_POST['lastname'])&& isset($_POST['middlename'])&& isset($_POST['select'])&& isset($_POST['year'])&& isset($_POST['course'])&& isset($_POST['date'])&& isset($_POST['email'])&& isset($_POST['username'])&& isset($_POST['password'])) {
            $idno = $_POST['idno'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $middlename = $_POST['middlename'];
            $select = $_POST['select'];
            $year = $_POST['year'];
            $course = $_POST['course'];
            $date = $_POST['date'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            

            $query = "SELECT * FROM `student_user` WHERE `stud_user_id` = '$idno'";

            $result = $conn->query($query);

            

            if ($result->num_rows === 1) {
                echo"User Already Registered";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    
                $sql = "INSERT INTO `student_user`(`stud_user_id`, `first_name`, `last_name`, `middle_name`, `gender`, `year_enrolled`, `course`, `birth_date`, `email`, `username`, `password`) VALUES ('$idno','$firstname','$lastname','$middlename','$select','$year','$course','$date','$email','$username','$hashedPassword')";
                
                $result = $conn->query($sql);
                echo"success_student";
            }

        } else {
            echo "Missing data fields.";
        
            }
    }else{
        echo "Error";
    }
} 
    $conn->close();


?>