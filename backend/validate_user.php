<?php
$servername = "localhost";
$database = "db_gcu";
$username = "root";
$password = "";

// Create connection
 $conn = mysqli_connect($servername, $username, $password, $database);
session_start();

if (isset($_POST["source"])) {

    if ($_POST["source"] == "student_side_login") {
        student_login();
    } else if ($_POST["source"] == "employee_side") {
        employee_login();
    }
}

//Student Side
function student_login()
{
    global $conn;

    $email = $_POST["email"];
    $password = $_POST["password"];

    $student_user = mysqli_query($conn, "SELECT * FROM student_user WHERE email = '$email'");

    // testing
    if (mysqli_num_rows($student_user) > 0) {
        $row = mysqli_fetch_assoc($student_user);
        if ($password == $row['password']) {
            
        } else {
            exit;
        }
    } else {
        exit;
    }
}

?>