<?php 
session_start();
// Include the log_audit.php file
include '../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'You already logged out',
                text: 'Please login again'
            }).then(function () {
                window.location.href = '../home';
            });
        });
    </script>
    <?php
    exit;
}
$id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_add employee',  'Admin has accessed the add employee page');


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Account</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/sub.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    

</head>

<body>

    <!-- Header -->
    <header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/images/bsu.png" alt="">
        </div>
        <div class="nav-mobile">
        <ul class="list">
                <li class="list-item">
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="EmployeeProfiles.php" class="list-link current1">Back</a>
                </li>
            </ul>
            <button class="icon-btn menu-toggle-btn menu-toggle-close place-items-center">
                <i class="ri-close-line"></i>
            </button>
            </ul>
            <button class="icon-btn menu-toggle-btn menu-toggle-close place-items-center">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="align-right">
            <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center">
                <i class="ri-function-line"></i>
            </button>
            <button class="icon-btn theme-toggle-btn place-items-center">
                <i class="ri-sun-line theme-light-icon"></i>
                <i class="ri-moon-line theme-dark-icon"></i>
            </button>
            <button class="icon-btn place-items-center">
                <i class="ri-user-3-line"></i>
            </button>
        </div>
    </nav>
</header>
    <!-- Welcome-message -->
    

    <div class="title independent-title">
    <h2>Add Employee Account</h2>
    </div>
    
   
    <section class="table-body">
    <section  id="table">
    <center>
    <form method="post" action="../backend/register_user.php">
        <br>
       
        <div class="input-group input-group-lg">
              <input type="number" class="form-control" name ='empID' placeholder="Employee ID No." 
              aria-label="Employee ID No." aria-describedby="inputGroup-sizing-lg" required>
              </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" class="form-control" placeholder="Last Name" 
              aria-label="Last Name" name ='lname' aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" name ='mname' class="form-control" placeholder="Middle Name" 
              aria-label="Middle Name" aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" name ='fname'class="form-control" placeholder="First Name" 
              aria-label="First Name" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <label class="input-group-text" for="inputgroupselect">Sex</label>
            <select class="form-select" name ='gender' id="inputgroupselect" required>
                <option selected>Choose...</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='email' class="form-control" placeholder="Email" 
              aria-label="Email" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='contactnum' class="form-control" placeholder="Contact No." 
              aria-label="Contact No." aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='position' class="form-control" placeholder="Position" 
              aria-label="Position" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" class="form-control" name='username' placeholder="Username" 
              aria-label="Username" aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" class="form-control" name='password' placeholder="Password" 
              aria-label="Password" aria-describedby="inputGroup-sizing-lg" required>
        </div>
</center>
</div>
<br>
<center>
    <div class="addemployee">
    
    <button type="submit" class="button" value="Add Employee">Add Employee Account</button>
   
    </div>
</center>
</form>

  
<br>
</div>




<!-- Script     -->
<script src="./assets/main.js"></script>

 <script src="assets/js/table.js"></script>   

<style>
.table-body{
    background-color: darkgreen;
}

.button{
        
        border:none;
           color:black;
           padding:12px 32px;
           text-decoration: none;
           margin:12px 2px;
           cursor:pointer;
           height:60px;
           width:100px;
           border-style: outset;
           background-color: blue;
           border-radius:20px;

           
    }



</style>

    </body>
    <?php include 'includes/footer.php' ?>
</html>