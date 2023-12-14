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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <!-- Remix icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Stylesheet -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <link rel="stylesheet" href="assets/css/edit.css">
  <link rel="stylesheet" href="assets/css/referslip.css">

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

    
<style>
</style>

<!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="GCU_logo.png" alt="">
        </div>
        <div class="nav-mobile">
            <div class="list">
                <div class="list-item">
                    <button onclick="goBack()" class="list-link current">BACK</button>
                </div>
            </div>
        </div>
        <div class="align-right">
            <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center" onclick="goBack()" class="list-link current">
            <i class="ri-arrow-left-circle-line"></i>
            </button>
       
            <!-- <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
            </button> -->
        </div>
        </div>
    </nav>
</header>
<?php include '../includes/banner.php' ?>


<body style="background:white;  ">

    <section>


    <div class="independent-title1">
    <h2>Add Employee Account</h2>
    </div>
    
    <div class="amen">
    <button  onclick="add()" class="btnText1" id="Update"><span class="btnText">ADD</span><i class="ri-edit-2-fill"></i></button>
    <button onclick="goBack()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span><i class="ri-arrow-left-circle-line"></i></button>  
</div>

<div class="container-fluid mt--7">
      <div class="row">
      


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
   
            <div class="card-body" style="background-color:lightgray;">
    <form method="post" id="addE" action="../backend/register_user.php">
        <br>
       
        <div class="pl-lg-4">
                 
                    <div class="col-lg-6" style="width:90px; padding:0; ">
                      <div class="form-group focused id1" >
                        <label class="form-control-label" for="input-username" id="EId" name ='empID' >ID No.</label>
                        <input type="number"  class="form-control form-control-alternative" id="id" name="empID" placeholder="Employee ID No." required >
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email"  class="form-control form-control-alternative" id="email" name='email' required>
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass" name='password' required>
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                      </div>
                    </div>


                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="lname" name ='lname' required>
                      </div>
                    </div>
      
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="fname" name ='fname' required>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Middle Name</label>
                        <input type="text" class="form-control form-control-alternative" id="mname" name ='mname' required>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <!-- Editable -->
                        <input type="text" class="form-control form-control-alternative" id="contact" name='contactnum' oninput="limitTo11Digits(event)" required>
                      </div>
                    </div>


                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Gender</label>
                        <select class="form-control form-control-alternative" required id="inputgroupselect" name="gender" disabled>
                                <option disabled selected>Select gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label  class="form-control-label" for="input-last-name">Position</label>
                        <input type="text" class="form-control form-control-alternative" id="position"name='position' required>
                     
                      </div>
                    </div>
                  </div>
                </div>

            </form>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>


          

<br>
    <?php include 'includes/footer.php' ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var icon = document.querySelector('i[onclick="togglePasswordVisibility(\'' + inputId + '\')"]');
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.className = "fas fa-eye-slash";
    } else {
      passwordInput.type = "password";
      icon.className = "fas fa-eye";
    }
  }
</script>
<script>
          var eID = "<?php echo $_SESSION['session_id']; ?>";
                            function goBack() {
            window.history.back();
        }
            function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + ' Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = '../home';

}
  });
}
function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}

function add(){
    $("#addE").submit();
}
</script>
</html>
