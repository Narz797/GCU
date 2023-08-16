<?php
$servername = "localhost";
$database = "db_gcu";
$username = "root";
$password = "";

// Create connection
//trial
//sie

 $conn = mysqli_connect($servername, $username, $password, $database);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
$username = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM student_user WHERE email='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    header("Location: ../Student_Side/transaction.php");
    exit();
} elseif ($result->num_rows === 0){
    $sql2 = "SELECT * FROM admin_user WHERE email='$username' AND password='$password'";

    $result2 = $conn->query($sql2);
    if ($result2->num_rows === 1) {
        header("Location: ../Employee_Side/index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}
}
$conn->close();


//  <---------------------------Working code below but no jquery-------------------------->
 
//  // Check connection
//  if (!$conn) {
//      die("Connection failed: " . mysqli_connect_error());
//  }
 
//  // Retrieve user input from the login form
//  if (isset($_POST['email']) && isset($_POST['password'])) {
//      $username = $_POST['email'];
//      $password = $_POST['password'];
 
//      // Query the database for user credentials
//      $query = "SELECT * FROM student_user WHERE email='$username' AND password='$password'";
//      $result = mysqli_query($conn, $query);
 
//      if (mysqli_num_rows($result) == 1) {
//          // Login successful, redirect to the home page or perform desired actions
//          header("Location: ../Student_Side/index.php");
//          exit();

//      } else {
//          // Login failed, display an error message or redirect back to the login page
//          echo "Invalid username or password.";
//      }
//  } 
 
//  // Close the database connection
//  mysqli_close($conn);

 

?>