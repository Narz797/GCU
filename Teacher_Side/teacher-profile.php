<?php 
session_start();
  // Check if the session variable is empty
  include '../backend/log_audit2.php';
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
  // include 'main2.php';
$id = $_SESSION['session_id'];
logAudit($id, 'access_teacher', $id .' has accessed the teacher home page');
$_SESSION['transact_type'] = 'Referral';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher's Profile</title>
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
            <button class="icon-btn place-items-center" onclick="edit()">
              <i class="ri-edit-2-fill"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
            </button>
        </div>
        </div>
    </nav>
</header>
<?php include '../includes/banner.php' ?>


<body>
<div class="independent-title1">
        <h2>MY PROFILE</h2>
    </div>






<div class="amen">
    <button onclick="verify()" class="btnText1" id="Update"><span class="btnText">Update</span><i class="ri-edit-2-fill"></i></button>
    <button onclick="cancel()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span><i class="ri-arrow-left-circle-line"></i></button>  
</div>
<footer id="topbar" class="topbar d-flex align-items-center" style="background-color:#008B8B; height: 50px; "></footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
    var eID = "<?php echo $_SESSION['session_id'];?>";
      var tID = "<?php echo $_SESSION['session_id'];?>";
<<<<<<< Updated upstream
      function resend(){
      // document.getElementById("modal").style.display = "none";
          // Show loading spinner
          Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
                    willClose: () => {
        // Set the display property of the element with ID "modal" to "block"
        document.getElementById("modal").style.display = "block";
    }
            });
        $.ajax({
      type: 'POST',
      url: '../backend/resend.php',
      success: function(data) {
                // Hide loading spinner on success
                swal.close();

                Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  // window.location.reload();
                } 
              });
   
  

     
        // add location to enter code
      },
                  error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Error: " + error);
                  },
    });
    } 
        function goBack() {
            window.history.back();
        }
        function logout() {
=======
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
>>>>>>> Stashed changes
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
function goBack() {
            window.history.back();
        }

    </script>
<script>
  var tID = "<?php echo $_SESSION['session_id'];?>";
  function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}
function faq(){
        window.location.href="../dh_teacher.php"
    }
</script>