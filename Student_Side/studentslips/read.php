<!doctype html>
<?php 
session_start();
include '../../backend/log_audit2.php';
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
                window.location.href = '../../home';
            });
        });
    </script>
    <?php
    exit;
} 
// include 'formstyle.php';
$_SESSION['transact_type']='Readmission';//asign value to transact_type 
logAudit($_SESSION['session_id'], 'access_readmission form', $_SESSION['session_id'] .' has accessed the readmission page');
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Readmission Slip</title>
<!-- Remix icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/slipnew.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
  
</head>

<body>

<header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="../assets/img/GCU_logo.png" alt="">
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
        </div>
    </nav>
</header>

  
<section>
    <section> <?php include '../banner.php' ?>

<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">READMISSION Slip</h2>
                <small>Date is <u><?php echo date('F j, Y'); ?></u></small>
            </header>
            <hr>
            <div class="info">
                <p><b>Referral slips serve as a crucial tool for educators, enabling them to recommend students who may require additional support or guidance.</b> </p>
                 <p><b>   It is imperative that teachers diligently complete the accompanying form, providing comprehensive information pertaining to the students 
                    they wish to refer to the Guidance and Counseling Unit (GCU) of BSU.</b></p>
            </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">


<div class="card1" >
<hr>

<h1 style="font-family: fantasy; color: black; " id="Title" >Referral Slip</h1>
<hr>
 
 <div class="card-body">
   <form id="form_transact" method="post">
     <p>
     <label for="select2">Semester and School Year Intended to Come Back:</label>

<div class="semester-year-container">
<select name="select2" id="semester">
 <option value="1">First Semester</option>
 <option value="2">Second Semester</option>
</select>

<label>Year:</label>
<!-- <input type="number" placeholder="YYYY" id="start_year" class="year-input" name="datepicker" id="datepicker"> -->
<input type="text" class="form-control" name="datepicker" id="datepicker"  autocomplete="off" required/>
<label>-</label>
<!-- <input type="number" placeholder="YYYY" id="end_year" class="year-input"> -->
<input type="text" class="form-control" name="datepicker" id="datepicker2" autocomplete="off" required/>


</div>
<br>
<br>

     </p>
     <p>
     <label for="textarea">Reason/s for stopping:</label>
     </p>
     <p>
<!-- Corrected code -->
     <textarea name="textarea" class="textarea" id="reason_stop" required></textarea>
     </p>
     <p>
     <label for="textarea" >Motivation for enrolling again:</label>
     </p>
     <p>
<!-- Corrected code -->
     <textarea name="textarea" class="textarea" id="motivation_enroll" required></textarea>
     </p>
     <div class="button-container">
       <div class="button">
         <p>
           <!-- Change type from submit to button, and use onclick to handle the back button -->
           <button type="button" class="btn btn-primary" onclick="window.history.back();">Back</button>
         </p>
       </div>
       <div class="button">
         <p>
           <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
           <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
         </p>
       </div>
     </div>
   </form>
 </div>
</div>










                 </div>
            </div>
        </div>
    </div>
</section> 
<!-- This is the pop-up for the three buttons -->

                <!-- <div class="overlay" id="divOne">
                    <div class="wrapper">
                        <h1>The referred student will be contacted. Clicking send will notify the teacher that the request was received.</h1>
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form>
                                    <label>Attending Personnel</label>
                                    <input type="text" placeholder="Your Name">
                                    <label>Remarks</label>
                                    <textarea placeholder="Type here if you have remarks..."></textarea>
                                    <div class="tsk"> -->

<!-- Add a function here where the data will be stored -->
<!-- 
                                    <input type="submit" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> -->
<br>

    
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: #008374; height: auto; ">
    <br>
    <br>
    <br>
    <br>
    <footer class="d-flex justify-content-center" style="width: 100%;">
    
        <br>

        <p style="text-align: center; margin: 0; display: block;">BENGUET STATE UNIVERSITY <br> &copy; <?php echo date("Y"); ?>.
         Guidance and Counseling Unit. All rights reserved.</p>
        <br>
        
    </footer>
    </section>

  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>
    $("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>
  
  

  
  <script>
        var sID = "<?php echo $_SESSION['session_id'];?>";
      function submitForm() {
        $("#form_transact").on("submit", function (event) {
        event.preventDefault();
        var datepickerValue = $("#datepicker").val();
      var datepicker2Value = $("#datepicker2").val();
        // Check if the form is filled before submitting
        // if (($('#reason_stop').val() === '' || $('#motivation_enroll').val() === '')||(!datepickerValue || !datepicker2Value)) {
        //   alert('Please fill out all fields before submitting.');
        // } else {
          // If the form is filled, proceed with AJAX submission
    //       Swal.fire({
    //   title: "Are you sure?",
    //   text: "Do you wish to proceed?",
    //   icon: "question",
    //   showCancelButton: true,
    //   confirmButtonColor: "#3085d6",
    //   cancelButtonColor: "#d33",
    //   confirmButtonText: "Yes"
    // }).then((result) => {
    //   if (result.isConfirmed) {
      console.log('from',$("#datepicker").val())
      console.log('to',$("#datepicker2").val())
      Swal.fire({
      title: "Do you wish to proceed?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
     
              // })
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: '../../backend/create_transaction.php',
            data: {
              reason: $("#reason_stop").val(),
              motivation: $("#motivation_enroll").val(),
              sem: $("#semester").val(),
              frm:$("#datepicker").val(),
              to:$("#datepicker2").val()
            },
            success: function (data) {
              // swal({
              //         title:'Form requested',
              //         icon: 'success',
              //         showConfirmButton: false,
              //         timer:1500
              // })

 


              $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: sID,
              action: 'sent request',
              details: sID + ' sent Readmission request' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          Swal.fire({
    title: "Request Sent!",
    icon: "success",
    text: "Your request has been sent successfully.",
    showConfirmButton: true,
    confirmButtonText: "OK",
}).then((result) => {
    if (result.isConfirmed) {
        // Redirect to the specified URL
        window.location.href = "../trans.php";
    }
});
            }
          });
        }
        });
        // }
      });
      }
    </script>

</body>
</html>