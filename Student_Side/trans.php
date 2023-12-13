<?php 
session_start();
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
// include 'formstyle.php';

logAudit($_SESSION['session_id'], 'access_transaction page', $_SESSION['session_id'] .' has accessed the transaction page');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Form</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet --> 
    <link rel="stylesheet" href="assets/css/trans.css">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- Export -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>  
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"/>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<!-- pagination -->
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<body>

  <!-- Header -->
  <header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/images/GCU_logo.png" alt="">
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="./index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="./appointment.php" class="list-link current1">Schedule an Appointment</a>
                </li>
                <li class="list-item hov">
                    <a href="./student-profile2.php" class="list-link current1">Edit your Profiles</a>
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
                <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
                </button>
        </div>
    </nav>
</header>

<section>
<?php include '../includes/banner.php' ?>

    <div class="title independent-title">
        <h2>FORMS</h2>
    </div>
    
    <div class="container">
    <div class="card">
            <header class="card-header">
                <small>The following are the list of forms from the GCU. Today is</small>
                <!-- get current date
    M/D/Y-->
    <h2 class="title"><?php echo date('F j, Y'); ?></h2>
            </header>
            <hr>
          <div class=" gallery">

          <div class="content1">
                <img src="./assets/images/ca.jpg">
                <h4>CLASS ADMISSION SLIP</h4>
                <h5>This document is designed for students who may be experiencing absences or tardiness.</h5>
                <h7>OSS-GCU-05</h7>
                <a href="forms/admission-slip">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/loa.jpg">
                <h4>LEAVE OF ABSENCE SLIP</h4>
                <h5>This document is designated for students seeking to submit a request for a temporary leave of absence.</h5>
                <h7>OSS-GCU-F11</h7>
                <a href="forms/leave-of-absence-slip">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/read.jpg">
                <h4>READMISSION SLIP</h4>
                <h5>This document is designed for individuals who are in the process of re-enrolling in an educational institution</h5>
                <h7>OSS-GCU-F12</h7>
                <a href="forms/readmission-slip">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/wds.jpg">
                <h4>WITHDRAWAL/DROPPING/</h4>
                <h4>SHIFTING SLIP</h4>
                <h5>This document is for withdrawal of enrollment, modify or transition of subject selections.</h5>
                <h7>OSS-GCU-F13</h7>
                <a href="forms/withdrawal-slip">
                <button class="buy-1">READ MORE</button></a>
            </div>
          </div>
          
        </div>
    </div>
</section>
<br>

<?php include 'includes/footer1.php' ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function faq(){
        window.location.href="../dh_student.php"
    }

     var eID = "<?php echo $_SESSION['session_id'];?>";



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



</script>  
<script src="assets/main.js"></script> 

</html>