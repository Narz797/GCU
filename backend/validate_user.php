<?php
session_start();
include '../backend/connect_database.php';

if (isset($_SESSION['origin'])) {
    $origin = $_SESSION['origin'];

    if ($origin === 'Student') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM student_user WHERE email=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);

            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $storedHashedPassword = $row['password'];
                $user_id = $row['stud_user_id']; // Retrieve user_id

                // Verify the password
                if (password_verify($password, $storedHashedPassword)) {
                    // Password is correct
                    $_SESSION['session_id'] = $user_id;
                    echo "success_student";
                } else {
                    // Password is incorrect
                    echo "Invalid username or password.";
                }
            } else {
                echo "Error";
            }
        }
    } elseif ($origin === 'Employee') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM admin_user WHERE email=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);

            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $storedHashedPassword = $row['password'];
                $user_id = $row['admin_user_id']; // Retrieve user_id

                // Verify the password
                if (password_verify($password, $storedHashedPassword)) {
                    // Password is correct
                    $_SESSION['session_id'] = $user_id;
                    echo "success_employee";
                } else {
                    // Password is incorrect
                    echo "Invalid username or password.";
                }
            } else if ($stmt->rowCount() === 0) {
                $sql2 = "SELECT * FROM admin_admin WHERE uname=?";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute([$username]);
        
                if ($stmt2->rowCount() === 1) {
                    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $user_id = $row['admin_id']; // Retrieve user_id
        
                    // No password verification for admin
                    $_SESSION['session_id'] = $user_id;
                    echo "success_admin";
                } else {
                    echo "Invalid username or password.";
                }
            }else{
                echo "Error";
            }
        }
    } elseif ($origin === 'Teacher') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM teachers WHERE email=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);

            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $storedHashedPassword = $row['password'];
                $user_id = $row['employee_id']; // Retrieve user_id

                // Verify the password
                if (password_verify($password, $storedHashedPassword)) {
                    // Password is correct
                    $_SESSION['session_id'] = $user_id;
                    echo "success_teacher";
                } else {
                    // Password is incorrect
                    echo "Invalid username or password.";
                }
            } else{
                echo "Error";
            }
        }
    }
}

$pdo = null; // Close the database connection
?>
