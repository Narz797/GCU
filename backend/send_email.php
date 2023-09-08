<?php
$to = "j.tacudog@bsu.edu.ph";
$subject = "My Subject";
$message = "Hello, this is a test email.";
$from = "your@gmail.com";
$password = "your_password";

// Create a PHPMailer instance
require 'vendor/autoload.php'; // Path to PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls'; // Use TLS encryption
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom($from, 'Your Name');
    $mail->addAddress($to, 'Recipient Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email sending failed. Error: {$mail->ErrorInfo}";
}
?>