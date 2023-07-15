<?php
$servername = "localhost";
$database = "db_gcu";
$username = "root";
$password = "";

// Create connection
//trial
//sie
 $conn = mysqli_connect($servername, $username, $password, $database);



 
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 
 // Retrieve user input from the login form
 if (isset($_POST['email']) && isset($_POST['password'])) {
     $username = $_POST['email'];
     $password = $_POST['password'];
 
     // Query the database for user credentials
     $query = "SELECT * FROM student_user WHERE email='$username' AND password='$password'";
     $result = mysqli_query($conn, $query);
 
     if (mysqli_num_rows($result) == 1) {
         // Login successful, redirect to the home page or perform desired actions
         header("Location: ../Student_Side/index.php");
         exit();

     } else {
         // Login failed, display an error message or redirect back to the login page
         echo "Invalid username or password.";
     }
 } 
 
 // Close the database connection
 mysqli_close($conn);

 

?>