<?php
include '../backend/connect_database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the session origin is set and is equal to 'Employee'
    if (isset($_SESSION['origin']) && $_SESSION['origin'] == 'Employee') {

        $empID = $_POST['empID'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contactnum = $_POST['contactnum'];
        $position = $_POST['position'];
        $username = $_POST['username'];
        $newPassword = $_POST['password'];

        // Check if a new password is provided
        if (!empty($newPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // SQL update statement with hashed password
            $sql = "UPDATE admin_user SET 
                    last_name = :lname,
                    middle_name = :mname,
                    first_name = :fname,
                    gender = :gender,
                    position = :position,
                    contact = :contactnum,
                    email = :email,
                    username = :username,
                    password = :password
                    WHERE admin_user_id = :empID";

            // Bind the hashed password parameter
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        } else {
            // SQL update statement without updating the password
            $sql = "UPDATE admin_user SET 
                    lname = :lname,
                    mname = :mname,
                    fname = :fname,
                    gender = :gender,
                    email = :email,
                    contactnum = :contactnum,
                    position = :position,
                    username = :username
                    WHERE admin_user_id = :empID";

            $stmt = $pdo->prepare($sql);
        }

        // Bind other parameters
        $stmt->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contactnum', $contactnum, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        try {
            $stmt->execute();
            echo '<script>';
            echo 'alert("Employee account updated successfully.");';
            echo 'window.location.href="../Admin_Side/editemployee.php";';
            echo '</script>';
            exit;

        } catch (PDOException $e) {

            echo '<script>';
            echo 'alert("Employee account updated Failed.");';
            echo 'window.location.href="../Admin_Side/editemployee.php";';
            echo '</script>';
            exit;
        }

        // Close the database connection
        $pdo = null;
    } else {
        echo "Invalid session origin. Access denied.";
    }
} else {
    echo "Invalid request method.";
}
?>