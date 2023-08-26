<?php
session_start();

include '../backend/connect_database.php';


if (isset($_SESSION['origin'])) {
    $origin = $_SESSION['origin'];

    if ($origin === 'Student') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM student_user WHERE email='$username'";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $storedHashedPassword = $row['password'];

                // Verify the password
                if (password_verify($password, $storedHashedPassword)) {
                    // Password is correct
                    $get_id = "SELECT user_id FROM student_user WHERE email='$username'";
                    $id = $conn->query($get_id);

                    $_SESSION['session_id'] = $id;

                    echo"Successfully logged in";
                } else {
                    // Password is incorrect
                    echo "Invalid username or password.";
                }

                
            } else {
                echo "Error";
            }
            }
    }

    elseif ($origin === 'Employee') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM admin_user WHERE email='$username'";
            
            $result = $conn->query($sql);
            
            
            
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $storedHashedPassword = $row['password'];

                // Verify the password
                if (password_verify($password, $storedHashedPassword)) {
                    // Password is correct
                    echo"success_employee";
                } else {
                    // Password is incorrect
                    echo "Invalid username or password.";
                }
                
            } else {
                echo "Error";
            }
        }
    }

}
    $conn->close();
?>