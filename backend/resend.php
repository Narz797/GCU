<?php
// Start the session
session_start();
include '../backend/connect_database.php';
unset($_SESSION['random_number']);
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'D:\xampp\htdocs\GCU\phpmailer\phpmailer\vendor\autoload.php';
echo "Entered";

    // Check if the random number is already set in the session
    if (!isset($_SESSION['random_number'])) {
        // Generate a random 4-digit number
        $randomNumber = rand(1000, 9999);

        // Save the random number in the session
        $_SESSION['random_number'] = $randomNumber;
    } else {
        // If the random number is already set in the session, retrieve it
        $randomNumber = $_SESSION['random_number'];
    }

    // Output the result
    echo "Random 4-digit number: $randomNumber";
    echo "Email received";

            if (isset($_SESSION['FP_email'])) {
                $email = $_SESSION['FP_email'];

                echo $email;
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
                        $mail->addAddress($email); // User's email

                        $mail->isHTML(true);
                        $mail->Subject = 'Reset Password';
                        $email_body = "
                            <h2>This is an email for password reset for  $email</h2>
                            <h5>If you did not request this password reset please ignore it or change your password </h5>
                            <br><br>
                            <p> Verification Code: <b>$randomNumber</b></p>
                        ";
                        $mail->Body = $email_body;
                        $mail->SMTPDebug = 2; // Enable verbose debug output

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
       
        
        }
       
?>
