<?php
session_start();
include '../../backend/log_audit2.php';
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
  $id = $_SESSION['stud_id'];
  $tran = $_SESSION['tran_id'];
  $tid = $_SESSION['teachid'];
  $form=$_SESSION['form_type'];

  logAudit($_SESSION['session_id'], 'access_'.$form=$_SESSION['form_type'].' form', $_SESSION['session_id'] .' has accessed the wds form of'. $id);

  echo '<script>
        console.log("clicked, ' . $id . '");
        console.log("clicked, ' . $tran . '");
        console.log("TID, ' . $tid . '");
        console.log("clicked, ' . $form . '");
        </script>';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral Slip</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/slips3.css">

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
                    <a href="../subpage/rs-forms" class="list-link current1">Back</a>
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="archive()">
           <i class="ri-archive-drawer-line"></i>
        </button>
        </div>
    </nav>
</header>
    <!-- Banner -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
            <img src="../assets/images/GCU_logo.png" alt="">
            <div class="banner-text">
                <h5>REPUBLIC OF THE PHILIPPINES</h5>
                <hr class="banner-line">
                <h2><span>BENGUET STATE UNIVERSITY</span></h2>
                <h1>GUIDANCE AND COUNSELING UNIT</h1>
            </div>
        </div>
    </section>
    <div class="block"> 
    </div>
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Student Information</h2>
                <small>Date is <u><?php echo date('F j, Y'); ?></u></small>
            </header>
            <hr>
            <div class="info">

<!-- Get student's data input in h3-->

                <p>Student ID No.</p><h3 id="id_no">20002213</h3>
                <p>Name of Student</p><h3 id="name">Narz Taquio</h3>
                <p>Course & Year Level</p><h3 id="ys">BSIT 4th Year</h3>
                <p>Sex</p><h3 id="gender">Male</h3>
                <p>Contact Number</p><h3 id="cn">0909-0909-090</h3>
                <p>Guardian/Parent</p><h3  id="pgname">Layla Taquio</h3>
                <p>Contact Number of Guardian/Parent</p><h3 id="pgn">0909-0909-090</h3>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div class="teacher">

<!-- Get teacher's data -->

                    <p class="title1"> Referred by: <u id="teach">Naycer Tulas of CIS Department.</u></p>
                    <p><b> Email:</b> <span id="Temail">naycertulas00@bsugov.com</span></p>
                    <p> <b>Contact Number:</b> <span id="Tcn">0000-0000-000</span></p>
                </div>
                <div class="main-box">
                <div class="box">
                  <h2 class="title">  Reason for refferral:</h2>
                  <!-- <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p> -->
                  <p class="card-description refer" id="reason">Counseling</p>
                </div>
                <br>


                <div>
                  <h2 class="title" id="DAT">Dates Absent/Tardy:</h2>
                  <!-- <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p> -->
                  <p class="card-description refer" id="dates">Counseling</p>
                </div>
                <br>

                <div>
                  <h2 class="title" id="TR">Teacher's Remarks</h2>
                  <!-- <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p> -->
                  <p class="card-description refer" id="rem">Teacher's Remarks</p>
                </div>
                <!-- <div class="action"> -->
                </div>
<!--This will be pop-up-->
                <br>
                <br>
                <br>
                <button class="yes" onclick="status_update('Recieved')">Received</button>
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

    <!-- Script     -->
<script src="../assets/main.js"></script>
<script>
            var sid;
    var tid;
    var eID = "<?php echo $_SESSION['session_id'];?>";
    var frm = "<?php echo $form=$_SESSION['form_type'];?>";
        function logout() {
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
    window.location.href = '../../home?logout=true';
}
function archive() {
    $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'archive',
              details: eID + ' Clicked archive'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = '../subpage/archive.php';
        }


        // Function to update the HTML elements
        function updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, rem, date_AT, referred, Temail, Tfname, Tlname, Tcn) {

            $('#id_no').text(id);
            $('#name').text(fname+ ' '+ lname);
            $('#ys').text(course+ ' '+year_level);
            $('#gender').text(gender);
            $('#cn').text(cn);
            $('#pgname').text(pgname);
            $('#pgn').text(pgn);
            $('#reason').text(reason);
            $('#teach').text(Tfname+ ' '+Tlname);
            $('#Temail').text(Temail);
            $('#Tcn').text(Tcn);
            $('#rem').text(rem);

            // Function to convert date strings to Date objects with format "MM/DD/YYYY"
            function convertToDate(dateString) {
                var parts = dateString.split('/');
                return new Date(parts[2], parts[1] - 1, parts[0]);
            } 
 
                // Split the date_AT string at every comma
                var dateArray = date_AT.split(',');

                // Convert the date strings to Date objects
                var dateObjects = dateArray.map(convertToDate);

                // Format the dates with month names
                var formattedDates = dateObjects.map(dateObject =>
                    dateObject.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })
                );

                // Join the formatted dates with <br> tags
                var formattedDateText = formattedDates.join('<br>');

                // Set the HTML content of the element with id 'dates'
                $('#dates').html(formattedDateText);


            }
            function fetchData() {
            console.log('AJAX request started');
            console.log('<?php echo $form?>');
            $.ajax({
            type: 'GET',
            url: '../../backend/get_form.php',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            if (data.length > 0) {
                var studentData = data[0]; // Assuming you expect a single row
                var id = studentData.stud_user_id;
                sid = studentData.stud_user_id;
                tid = studentData.transact_id;
                var fname = studentData.first_name;
                var lname = studentData.last_name;
                var email = studentData.email;
                var year_level = studentData.Year_level;
                var course = studentData.course;
                var gender = studentData.gender;
                var cn = studentData.Contact_number;
                var pgn = studentData.ParentGuardianNumber;
                var pgname = studentData.ParentGuardianName;
                var relation = studentData.Relation;
                var reason = studentData.reason;
                var rem = studentData.remarks;
                var date_AT = studentData.Dates_for_AbsentTardy;
                var referred = studentData.referred;
                var Temail = studentData.Temail;
                var Tfname = studentData.Tfname;
                var Tlname = studentData.Tlname;
                var Tcn = studentData.Tcn;

                console.log(fname);
                updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, rem, date_AT, referred, Temail, Tfname, Tlname, Tcn);

                var rem = studentData.remarks;

                if (rem !== undefined && rem !== null && rem.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'rem' has a non-empty value:", rem);

                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'rem' is either undefined, null, or an empty string.");
                    $('#TR').hide();
                }
                if (date_AT !== undefined && date_AT !== null && date_AT.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'Date' has a non-empty value:", date_AT);
                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'Date' is either undefined, null, or an empty string.");
                    $('#DAT').hide();
                    $('#dates').hide();
                }

                
            } else {
                // Handle the case when no results are found
                console.log('No results found');
            }
            },
            error: function (xhr, status, error) {
            console.error('Error: ' + error);
            console.error('Status: ' + status);
            console.error('Response: ' + xhr.responseText);
            }
            });

        }

            function status_update(status){
                // update status to pendig here
                $.ajax({
            type: 'POST',
            url: '../../backend/update_forms/update_ref.php',
            data: {
                stat: status,
                id: sid,
                tid: tid
            },
            success: function (data) {
                console.log("Remarked:", data);
                 window.location.href = "../subpage/rs-forms";
                 $.ajax({
                    type: 'POST',
                    url: '../../backend/log_audit.php',
                    data: {
                    userId: eID,
                    action: 'update '+frm +' status',
                    details: eID + ' updated '+frm +' status to ' + status
                    },
                    success: function(response) {
                    // Handle the response if needed
                    console.log("logged", response);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error marking event as done:", error);
                alert("Error marking event as done: " + error);
            },
            });
            }
            fetchData();
        
</script>   
</body>
</html>