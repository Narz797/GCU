<?php
// Start the session
session_start();
include '../backend/connect_database.php';
if (isset($_SESSION['origin'])) {
    $origin = $_SESSION['origin'];


 if ($origin === 'Student') {
$email = $_SESSION['FP_email'];
if (isset($_POST['pass1']) && isset($_POST['pass2'])) 
{
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];


    try {
        if ($pass1 == $pass2)
        {
            $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
            $sql = "UPDATE `student_user` SET `password`= :pass WHERE `email` = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':pass', $hashedPassword); // Use the hashed password here
            $stmt->bindParam(':email', $email); // Bind the email parameter
            if ($stmt->execute()) {
                echo "Password Reset";
                // unset($_SESSION[$variableName]);
            } else {
                echo "Password reset failed";
            }
        }else
        {
            echo 'Passowrds does no match';
        }
 
            

   

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
 }elseif ($origin === 'Employee') {
    $email = $_SESSION['FP_email'];
if (isset($_POST['pass1']) && isset($_POST['pass2'])) 
{
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];


    try {
        if ($pass1 === $pass2)
        {
            $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
            $sql = "UPDATE `admin_user` SET `password`= :pass WHERE `email` = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':pass', $hashedPassword); // Use the hashed password here
            $stmt->bindParam(':email', $email); // Bind the email parameter
            if ($stmt->execute()) {
                echo "Password Reset";
                // unset($_SESSION[$variableName]);
            } else {
                echo "Password reset failed";
            }
        }else
        {
            echo 'Passowrds does no match';
        }
 
            

   

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
}elseif ($origin === 'Teacher') {
    $email = $_SESSION['FP_email'];
    if (isset($_POST['pass1']) && isset($_POST['pass2'])) 
    {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
    
    
        try {
            if ($pass1 == $pass2)
            {
                $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "UPDATE `teachers` SET `password`= :pass WHERE `email` = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':pass', $hashedPassword); // Use the hashed password here
                $stmt->bindParam(':email', $email); // Bind the email parameter
                if ($stmt->execute()) {
                    echo "Password Reset";
                    // unset($_SESSION[$variableName]);
                } else {
                    echo "Password reset failed";
                }
            }else
            {
                echo 'Passowrds does no match';
            }
     
                
    
       
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}




}
?>
