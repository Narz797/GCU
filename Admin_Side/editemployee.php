<?php 
session_start();
$_SESSION['origin']='Employee';

$id = $_SESSION['user_id'];

// echo "<script>console.log('id: " . $id . "')</script>";

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
    <link rel="stylesheet" href="assets/css/profiles.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Export -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>  
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

</head>
<style>

    </style>
<body>

    <!-- Header -->
    <header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./index.php" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="main.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="studentprofile.php" class="list-link current1">Student Profiles</a>
                </li>
                <li class="list-item hov">
                    <a href="logreport.php" class="list-link current1">Log Report</a>
                </li>
                <li class="list-item hov">
                    <a href="exportimport.php" class="list-link current1">Export/Import of Database</a>
                </li>
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
    
<section>
  
      
    <div class="title independent-title">
    <h2>Edit Employee Account</h2>
    </div>
     <!-- Section -->
    
    <section class="table-body">
    <section  id="table">
    
    <form id="edit_emp" name ="edit_emp"method="post">
        <br>
        <center>
        <div class="input-group input-group-lg">
        <input type="number" class="form-control" id="id" name="empID" placeholder="Employee ID No." 
            aria-label="Employee ID No." aria-describedby="inputGroup-sizing-lg" 
            value="<?php echo $id; ?>" readonly required>

              </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" class="form-control" placeholder="Last Name" id="lname" 
              aria-label="Last Name" name ='lname' aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" name ='mname' class="form-control" placeholder="Middle Name" id="mname"
              aria-label="Middle Name" aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" name ='fname'class="form-control" placeholder="First Name" id="fname"
              aria-label="First Name" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <label class="input-group-text" for="inputgroupselect">Sex</label>
            <select class="form-select" name ='gender' id="inputgroupselect" required>
                <option disabled selected >Choose...</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='email' class="form-control" placeholder="Email" id="email" 
              aria-label="Email" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='contactnum' class="form-control" placeholder="Contact No." id="contact"
              aria-label="Contact No." aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" name='position' class="form-control" placeholder="Position" id="position"
              aria-label="Position" aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br>
        <div class="input-group input-group-lg">
              <input type="text" class="form-control" name='username' placeholder="Username" id="username"
              aria-label="Username" aria-describedby="inputGroup-sizing-lg" required>
              <input type="text" class="form-control" name='password' placeholder="Password" id="pass"
              aria-label="Password" aria-describedby="inputGroup-sizing-lg" required>
        </div>
    </center>

        <br>
        <button type="submit" value="Add Employee">Edit Employee Account</button>
    </form>
    </section>

</section>
<br>
</div>

<style>
.table-body{
    background-color: darkolivegreen;  
    
}


</style>

    <!-- Footer -->
    <footer id="footer" class="footer">
    <div class="container" id="footercopyright">
        <div class="copyright">
            <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
        </div>
        <div class="credits">Designed by <a href="https://www.facebook.com/">BSIT</a></div>
    </div>
</footer>
<!-- Script     -->

<script>
$("#edit_emp").on("submit", function (event) {
      event.preventDefault();

      console.log($("#Sid").val());
      $.ajax({
        type: 'POST',
        url: '../backend/edit_emp.php',
        data: {
                          id: $("#id").val(),
                          fname: $("#fname").val(),
                          mname: $("#mname").val(),
                          lname: $("#lname").val(),
                          gender: $("#inputgroupselect").val(),
                          email: $("#email").val(),
                          cn: $("#contact").val(),
                          position: $("#position").val(),
                          un: $("#username").val(),
                          pass: $("#pass").val() 
                          
                      },
        success: function (data) {
          console.log('Success!');
          console.log(data);
          alert("Edited Successfully");
          
          window.location.href="EmployeeProfiles.php";
        //   $.ajax({
        //     type: 'POST',
        //     url: '../backend/log_audit.php',
        //     data: {
        //       userId: tID,
        //       action: 'reffered',
        //       details: tID + ' reffered '+sID
        //     },
        //     success: function(response) {
        //       // Handle the response if needed
        //       console.log("logged", response);
        //     }
        //   });

        },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    }
      });
    });
</script>  
<script src="./assets/main.js"></script> 
</body>
</html>