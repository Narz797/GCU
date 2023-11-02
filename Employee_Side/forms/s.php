<?php
session_start();
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
  $form=$_SESSION['form_type'];

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
    <title>Shifting Slip</title>
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
            <a href="./index.php" ><img src="../assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../subpage/wds-forms" class="list-link current1">Back</a>
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
                <small>Date is <u><?php echo date('F j, Y'); ?></u></u></small>
            </header>
            <hr>
            <div class="info">

<!-- Get student's data input in h3-->

                <p>Student ID No.</p><h3 id="id_no">20002213</h3>
                <p>Name of Student</p><h3 id="name">Narz Taquio</h3>
                <p>Course & Year Level</p><h3 id="ys">BSIT 4th Year</h3>
                <p>Sex</p><h3 id="gender">Male</h3>
                <p>Contact Number</p><h3 id="cn">0909-0909-090</h3>
                <p>Guardian/Parent</p><h3 id="pgname">Layla Taquio</h3>
                <p>Contact Number of Guardian/Parent</p><h3 id="pgn">0909-0909-090</h3>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <p class="title1"> Shifting from <u id="from"> BSIT</u> to <u id="to">BLIS</u></p>
                    <hr>
                    <h2 class="title"> Reason/s for shifting:</h2>
                </div>
                <div class="main-box">
                <div class="box">

<!-- Get student fill-up form data -->

                  <p class="card-description" id="reason">Those actually got pretty long. Not the longest, but still pretty long. I hope this one won't get lost somehow. Anyways, let's talk about WAFFLES! I like waffles. Waffles are cool. Waffles is a funny word. There's a Teen Titans Go episode called "Waffles" where the word "Waffles" is said a hundred-something times. It's pretty annoying. There's also a Teen Titans Go episode about Pig Latin. Don't know what Pig Latin is? It's a language where you take all the consonants before the first vowel, move them to the end, and add '-ay' to the end. If the word begins with a vowel, you just add '-way' to the end. For example, "Waffles" becomes "Afflesway". I've been speaking Pig Latin fluently since the fourth grade, so it surprised me when I saw the episode for the first time. I speak Pig Latin with my sister sometimes. It's pretty fun. I like speaking it in public so that everyone around us gets confused. That's never actually happened before, but if it ever does, 'twill be pretty funny. By the way, "'twill" is a word I invented recently, and it's a contraction of "it will". I really hope it gains popularity in the near future, because "'twill" is WAY more fun than saying "it'll". "It'll" is too boring. Nobody likes boring. This is nowhere near being the longest text ever, but eventually it will be! I might still be writing this a decade later, who knows? But right now, it's not very long. </p>
                  <!-- <div class="center-attached"> -->

<!-- Get any uplaoded file or the real-time image -->

                  <!-- <img src="" title="No Attached Document">
                  <img src="" title="No Attached Document"> -->
                  <!-- </div> -->
                </div>
                </div>
                <div class="action">
                 <a href="#divOne"><button class="yes" onclick="status_update('done')">Accept</button></a>
                 <a href="#divTwo"><button class="no" onclick="status_update('pending')">Reconsider</button></a>
                 <a href="#divThree"><button class="pending" onclick="status_update('pending')">Lacking</button></a>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- This is the pop-up for the three buttons -->
<!-- 
                <div class="overlay" id="divOne">
                    <div class="wrapper">
                        <h1>The student's form for shifting will be <u class="One">ACCEPTED</u> .</h1>
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

                                    <!-- <input type="submit" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="overlay" id="divTwo">
                    <div class="wrapper">
                        <h1>The student's form for  shifting is being <u class="Two">Reconsidered</u> .</h1>
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
                 </div>
                 <div class="overlay" id="divThree">
                    <div class="wrapper">
                        <h1>The student's form for shifting is <u class="Three">LACKING</u> .</h1>
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
        function logout() {
    window.location.href = '../../home?logout=true';
}
function archive() {
    window.location.href = '../subpage/archive.php';
        }

        // Function to update the HTML elements
        function updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, from, to) {

            $('#id_no').text(id);
            $('#name').text(fname+ ' '+ lname);
            $('#ys').text(course+ ' '+year_level);
            $('#gender').text(gender);
            $('#cn').text(cn);
            $('#pgname').text(pgname);
            $('#pgn').text(pgn);
            $('#from').text(from);
            $('#to').text(to);
            $('#reason').text(reason);


            }
            function fetchData() {
            console.log('AJAX request started');
            console.log('<?php echo $form?>');
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
                var reason = studentData.statement;
                var from = studentData.shift_from;
                var to = studentData.shift_to;

                console.log(fname);
                updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, relation, reason, from, to);


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
            url: '../../backend/update_forms/update_wds.php',
            data: {
                stat: status,
                id: sid,
                tid: tid
            },
            success: function (data) {
                console.log("Remarked:", data);
                window.location.href = "../subpage/wds-forms";
                alert(data);
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