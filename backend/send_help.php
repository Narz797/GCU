<?php
// Start the session
session_start();
include '../backend/connect_database.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'D:\xampp\htdocs\GCU\phpmailer\phpmailer\vendor\autoload.php';

// Output the result
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $_SESSION['FP_email'] = $email;

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'BSU.GCU.2023@gmail.com'; // Your sender email address
        $mail->Password = 'snzv uwll wgla thmt'; // Your sender email password

        $mail->SMTPSecure = "tls";
        $mail->Port = 587; // TCP port to connect to

        // Email content
        $mail->setFrom('BSU.GCU.2023@gmail.com', 'Guidance Counseling Unit');
        $mail->addAddress('narzjoseftaquio797@gmail.com'); // User's email

        $mail->isHTML(true);
        $mail->Subject = 'FAQ';
        $email_body = "
            <h2>Name: $name</h2>
            <h2>Email: $email</h2>
            <br><br>
            <h3>$msg</h3>
        ";
        $mail->Body = $email_body;
        $mail->SMTPDebug = 2; // Enable verbose debug output

        $mail->send();
        echo 'sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Handle the case where name, email, or msg are not set
    echo "Error: name, email, or msg not set.";
}
?>
