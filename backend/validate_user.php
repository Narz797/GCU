<?php
include '../backend/connect_database.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
$username = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM student_user WHERE email='$username' AND password='$password'";

$result = $conn->query($sql);



if ($result->num_rows === 1) {
    echo"success_student";
    // header("Location: ../Student_Side/transaction.php");
    // exit();
} elseif ($result->num_rows === 0){
    $sql2 = "SELECT * FROM admin_user WHERE email='$username' AND password='$password'";

    $result2 = $conn->query($sql2);
    if ($result2->num_rows === 1) {
        echo"success_admin";
        // header("Location: ../Employee_Side/index.php");
        // exit();
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}
}
$conn->close();




 

?>