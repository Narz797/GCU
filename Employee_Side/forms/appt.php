<?php
session_start();
include '../../backend/log_audit2.php';
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
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
                text: 'Please tlogin again'
            }).then(function () {
                window.location.href = 'http://localhost/GCU/home';
            });
        });
    </script>
    <?php
    exit;
}

  $id = $_SESSION['stud_id'];
  $tran = $_SESSION['tran_id'];
  $form=$_SESSION['form_type'];

  logAudit($_SESSION['session_id'], 'access_'.$form=$_SESSION['form_type'].' form', $_SESSION['session_id'] .' has accessed the wds form of'. $id);

  echo '<script>
        console.log("clicked, ' . $id . '");
        console.log("clicked, ' . $tran . '");
        console.log("clicked, ' . $form . '");
        </script>';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/slips2.css">
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
                    <a href="../index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../appointment" class="list-link current1">Back</a>
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
            <p>Student ID No.</p><h3 id="id_no">20002213</h3>
                <p>Name of Student</p><h3 id="name">Narz Taquio</h3>
                <p>Course & Year Level</p><h3 id="ys">BSIT 4th Year</h3>
                <p>Sex</p><h3 id="gender">Male</h3>
                <p>Contact Number</p><h3 id="cn">0909-0909-090</h3>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title"> Reason/s for appointment:</h2>
                </div>
                <div class="main-box">
                <div class="box">
                  <p class="card-description" id="reason">Those actually got pretty long. Not the longest, but still pretty long. I hope this one won't get lost somehow. Anyways, let's talk about WAFFLES! I like waffles. Waffles are cool. Waffles is a funny word. There's a Teen Titans Go episode called "Waffles" where the word "Waffles" is said a hundred-something times. It's pretty annoying. There's also a Teen Titans Go episode about Pig Latin. Don't know what Pig Latin is? It's a language where you take all the consonants before the first vowel, move them to the end, and add '-ay' to the end. If the word begins with a vowel, you just add '-way' to the end. For example, "Waffles" becomes "Afflesway". I've been speaking Pig Latin fluently since the fourth grade, so it surprised me when I saw the episode for the first time. I speak Pig Latin with my sister sometimes. It's pretty fun. I like speaking it in public so that everyone around us gets confused. That's never actually happened before, but if it ever does, 'twill be pretty funny. By the way, "'twill" is a word I invented recently, and it's a contraction of "it will". I really hope it gains popularity in the near future, because "'twill" is WAY more fun than saying "it'll". "It'll" is too boring. Nobody likes boring. This is nowhere near being the longest text ever, but eventually it will be! I might still be writing this a decade later, who knows? But right now, it's not very long. </p>
                </div>
                </div>

                <div>
                    <h2 class="title"> Date of Appointment:</h2>
                </div>
                <div class="main-box">
                <div class="box">
                  <p class="card-description" id="dte">Loading.. </p>
                </div>
                </div>
                
<div class="action">
                 <a href="#"><button class="yes" onclick="status_update('accepted')">Accept</button></a>
                 <a href="#divTwo"><button class="no" >Reschedule</button></a>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- This is the pop-up -->

                 <div class="overlay" id="divTwo">
                    <div class="wrapper">
                        <h1>The student's request will be <u class="Two">RESCHEDULED</u> .</h1>
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form class = "mid">
                                    <!-- <label>Attending Personnel</label>
                                    <input type="text" placeholder="Your Name"> -->
                                    <!-- <label>Remarks</label>
                                    <textarea placeholder="Type here if you have remarks..." id="remarks"></textarea> -->
                                    <label>Rescheduled Date and Time:</label>
                                    <input type="datetime-local" id="date">
                                    <br>
                                    <div class="tsk">
                                        <br>
                                    <button class="yes" onclick="resched()"> Apply </button>
                                    <!-- <input type="submit" value="Apply"> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
    <!-- Script     -->
<script src="../assets/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var sid;
    var tid;
    var aid;
    var red;
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
        function updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, dat) {

            var dateFromDatabase = new Date(dat);
        // Define options for formatting the date
        var options = { year: 'numeric', month: 'long', day: 'numeric' };

        // Convert the date to a string with the month in words
        var formattedDate = dateFromDatabase.toLocaleDateString('en-US', options);

        // Display the result
        console.log(formattedDate);

        $('#id_no').text(id);
        $('#name').text(fname+ ' '+ lname);
        $('#ys').text(course+ ' '+year_level);
        $('#gender').text(gender);
        $('#cn').text(cn);
        $('#reason').text(reason);
        $('#dte').text(formattedDate);


        }
    function fetchData() {
    console.log('AJAX request started');
    $.ajax({
    type: 'GET',
    url: '../../backend/get_form.php',
    dataType: 'json',
    success: function (data) {
        if (data.length > 0) {
            var studentData = data[0]; // Assuming you expect a single row
            var id = studentData.stud_user_id;
            sid = studentData.stud_user_id;
            tid = studentData.transact_id;
            aid = studentData.appointment_id;
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
            var reason = studentData.Reason;
            var dat = studentData.date;
            res = studentData.Reason;

            console.log(fname);
            updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, dat);
                        
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
          url: '../../backend/update_forms/update_appt.php',
          data: {
            stat: status,
            id: sid,
            tid: tid,
            aid: aid,
            res:res
          },
          success: function (data) {
            console.log("Remarked:", data);
            Swal.fire({
              icon: "success",
              title: "appointment remarked"
            });
            window.location.href = "../appointment";
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
            Swal.fire({
              icon: "error",
              title: "Something went wrong",
              text: "Please try again",
            });
          },
        });
        }

        function resched(){
        var dateTimeInput = document.getElementById("date").value;

        // separate date and time
        if (dateTimeInput) { // Use dateTimeInput directly, no need for .value
            // Parse the input value as a JavaScript Date object
            var selectedDate = new Date(dateTimeInput);

            // Extract the date and time components
            var date = selectedDate.toISOString().slice(0, 10);
            var time = selectedDate.toTimeString().slice(0, 8);

            // Display the separated date and time
            console.log("Date: " + date);
            console.log("Time: " + time);
        } else {
            console.log("Please select a date and time");
        }

        console.log("ID:", aid);
        // console.log("Remarks:", textareaValue);
        // console.log("Remarks:", textareaValue2);
        $.ajax({
          type: 'POST',
          url: '../../backend/app_resched.php',
          data: {
            aid: aid,
            tid: tid,
            date: date,
            time: time
          },
          success: function (data) {
            console.log("Remarked:", data);
            Swal.fire({
              icon: "success",
              title: "Appointment rescheduled"
            });
            status_update('resched')
            window.location.href = "../appointment";
            $.ajax({
                    type: 'POST',
                    url: '../../backend/log_audit.php',
                    data: {
                    userId: eID,
                    action: 'resched '+frm,
                    details: eID + ' resched '+frm +' to ' + date
                    },
                    success: function(response) {
                    // Handle the response if needed
                    console.log("logged", response);
                    }
                });
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            Swal.fire({
              icon: "error",
              title: "Something went wrong",
              text: "Please try again",
            });
          },
        });
        
    }
    fetchData();
</script>  
</body>
</html>