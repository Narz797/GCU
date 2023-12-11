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
                window.location.href = '../../home';
            });
        });
    </script>
    <?php
    exit;
}
// Retrieve stud_id from the session
$id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_sudent_profile', $id .' has accessed the sudent_profile page');
echo"<script>console.log('$id')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Remix icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/view.css">
</head>


<!-- for remarks popup -->
<style>
  .body {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .container {
    width: 500px;
    color: black;
    background-color: white;
    box-shadow: 0 0 8px rgba(250, 250, 250, 0.6);
  }
  .container form {
    width: 100%;
    text-align: center;
    padding: 25px 20px;
  }
  form h1 {
    padding: 10px 0;
  }
  form .id {
    position: relative;
  }
  form input{
		width: 100%;
		height: 50px;
		margin: 4px 0;
		border-radius: 3px;
		border: 1px solid black;
		background-color: grey;
		padding: 0 15px;
		font-size: 20px;
	}
  form textarea {
    height: 50%;
    padding: 5px 15px;
    border-radius: 3px;
		border: 1px solid black;
		background-color: white;
    font-size: 20px;
    width: 100%;
    margin: 4px 0;
  }
  form button {
    margin-top: 5px;
    border-radius: none;
    background-color: #568203;
    color: white;
    padding: 10px 0;
    width: 100%;
    font-size: 20px;
    font-weight: 800;
    cursor: pointer;
    border-radius: 3px;
  }
  form button:hover {
    background-color: green;
  }
  form input::placeholder{
color: white;
  }
  form input:focus,
  form textarea:focus {
    border: 1px solid green;
    transition: all 0.3s ease;
  }
  form input:focus::placeholder,
  form textarea:focus::placeholder {
    padding-left: 4px;
    color: green;
    transition: all 0.3s ease;
  }

  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
  }

  .modal_content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

</style>
<!--  -->
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
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../student-profile" class="list-link current1">Back</a>
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
        <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
                </button>
        </div>
    </nav>
</header>
    <!-- Banner -->
<section>
<?php include '../../includes/banner.php' ?>
   <!-- <div class="block"> 
    </div> -->
    <div class="title independent-title">
        <h2> STUDENT PROFILE</h2>
    </div>

    <div class="card">
        <div class="card-body">
          <div class="card-image" id="gender">
              <!-- The initial image source should be empty -->
              <img src="" alt="">
          </div>
            <div class="card-information">
                <h2><span id="college">CHET</span><span  id="course"> PSYCHOLOGY</span></h2>
                <h1 class="title main-title"><span class="title-lastname main-title" id="lname">Rizzler,</span> <span id="fname"> Chad Vogn T.</span></h1>
                <p class="card-description1"> <span id="year_level">1st</span> Year Student<br><br></p>
                <p class="card-description">
                    <span>Email:</span> <b id="email">chad123@gmail.com</b><br>
                    <span>Contact Number:</span > <b id="number" > &nbsp0987-6543-211</b><br>
                    <!-- newly aded -->
                    <span>Address:</span ><b id="address" > 123 Benguet State University La Trinidad</b><br>
                    <span>Year Enrolled:</span><b id="yr_enrolled" > 2001</b><br>
                    <span>Civil Status:</span><b id="cs" > Married</b><br>
                    <hr>
					<b>Date of Birth:</b><span id="DOB" > December 01, 2000</span><br>
					<b>Birthplace:</b><span id ="BP" > Benguet State University La Trinidad</span><br>
                    <b>Nationality:</b><span id="nationality"> Filipino</span><br>
                </p>
            </div>
            <div class="card-image1">

<!-- get student 
	real-time signature
 	or ID picture-->

            <img src="" alt="ID" id="idd">
            </div>
            <div class="card-image1">


            <img src="" alt="Signature" id="sig">
            </div>
        </div>



<div class="card-body">
<div class="card-information">
                 <h1 class="title main-title">FAMILY BACKGROUND</h1>
                <p class="card-description">
                  <div id = "ma">
                    <b>Mother:</b><span id="mom" style="color:white;"> Narz Monkey Taquio</span>
                    <p class="card-description1"> <span id="mage">50</span> Years Old<br></p>
                    <span id="mom_cn">000-000-0000 </span>| <span id="mom_occ">HouseWife</span><br>
                    <span id="mom_school">High School</span><br>
                    <hr>
                    </div>
                    <div id="da">
                    <b>Father:</b> <span id="dad" style="color:white;"> Narz Monkey Taquio</span><br>
                    <p class="card-description1"> <span id="fage">50</span> Years Old<br></p>
                    <span id="dad_cn">000-000-0000 </span> | <span id="dad_occ">CEO</span><br>
                    <span id="dad_school">Bachelor of Business Management</span><br>
                    <hr>
                    </div>

                    <div id="gd">
                    <b>Guardian:</b> <span id="grd" style="color:white;"> Narz Monkey Taquio</span><br>
                    <p class="card-description1"> <span gage>50</span> Years Old<br></p>
                    <span id="grd_cn">000-000-0000 </span> | <span id="grd_occ">Aunt</span><br>
                    <span id="grd_school">High School</span><br>
                    </div>
                </p>
            </div>
           <div class="card-information">
                 <h1 class="title main-title">EDUCATIONAL BACKGROUND</h1>
                <p class="card-description">
                    <b>Senior Highschool:</b> <span id="HS">loading...</span>
                    <p class="card-description1"> <span id="HS_YG">2023</span> Years Graduated<br></p>
                    <hr>
                    <b>Junior Highschool:</b> <span id="JS">loading...</span>
                    <p class="card-description1"> <span id="JS_YG">2023</span> Years Graduated<br></p>
                    <hr>
                    <b>Elementary School:</b> <span id="ES">loading...</span>
                    <p class="card-description1"> <span  id="ES_YG">2023</span> Years Graduated<br></p>
                    <hr>
                    <div id="OTH">
                    <b>Other School Attended:</b> <span id="OS">loading...</span>
                    <p class="card-description1"> <span  id="OS_YG">None</span> None<br></p>
                    </div>
                </p>
            </div>
           <div class="card-information">
                <h1 class="title main-title">MORE ABOUT ME</h1>
                <p class="card-description">
                    Member of Indigenous group?<b id="IG"> YES</b><br>
                    Person with Disability? <b id="PWD">YES</b><br>
                    A student parent? <b id="SP">YES</b><br>
                    Sources of Financial Support? <b id="FS">Relatives and/or Guardian</b><br>
                    Marital Status of Parents? <b id="MS">Marriage is legally annuled</b>
                    <hr>
                    <a href="#divTwo"><button class="yes">Read More</button></a>
                </p>  
            </div>
        </div>



    </div> 
</section>
<div class="overlay" id="divTwo">
                    <div class="moreabout">
                        <h1>More About Me</h1>
                        <a href="#" class="close">&times;</a>
                        <p> <span class="pop">The 3 words that describes me are</span>
                            <b><span id="1">Hot</span>, <span id="2">Sexy</span>, <span   id="3">Chad</span></b></p>
                        <p> <span class="pop">My greatest goal is</span>
                            <b id="goal">maintaining being Hot, Sexy, A Chad</b></p>
                            <br>
                            <hr><br>
                        <div class="float"> 
                        <div class="fixing">
                        <label>My Father is <br></label>
                        <b id="fis">Hot, Sexy, A Chad Hot, Sexy, A Chad</b><br>
                        <label>My Mother is <br></label>
                        <b id="mis">Hot, Sexy, A Chad Hot, Sexy, A Chad</b><br>
                        <label> The sibling I'm closest to is <br></label>
                        <b id="closest">BILLY</b><br>
                        <label>Because <br></label>
                        <b id="coz">Hot, Sexy, A Chad Hot, Sexy, A Chad</b>
                    </div>
                    <div class="fixing">
                           <label>When I was a child I<br></label> 
                            <b id="when_child">was Hot, Sexy, and a Chad</b><br>
                            <label>In school my teachers are <br> </label>
                            <b id="teachers_are">Hot, Sexy, A Chad</b><br>
                            <label>My friends don't know that <br> </label> 
                            <b id="dont_know"> I am Hot, Sexy, A Chad</b><br>
                            <label>When I think about the future, I <br></label>
                            <b id="future"> dream to be Hot, Sexy, A Chad</b><br>
                    </div>
                    </div>
                           
                            
                        </div>
                    </div>
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Notes</h2>
                <small>Type what to take note about the student.</small>
            </header>
            <hr>
        <div class="popup-box">
        <div class="popup">
        <div class="content">
            <header class="header1"><p></p>
            <i class="uil uil-times"></i>
            </header>
            <form action="#">
                <div class="row title">
                    <label>Title</label>
                    <input type="text" spellcheck="false">
                </div>
                <div class="row description">
                    <label>Content</label>
                    <textarea spellcheck="false"></textarea>
                </div>
                <button></button>
            </form>
        </div>
        </div>
        </div>
        <div class="wrapper">
            <li class="add-box">
            <div class="icon"><i class="uil uil-plus"></i></div>
            <p>Add new note</p>
            </li>
        </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">ALL Transacted Forms/Slips</h2>
                <hr>
                    <p class="card-description">

<!-- the table header(thead) are the general 
    sortable script-->

        <table class="table-sortable" id="dynamicTable">
        <thead>
            <tr>
                <th>Date of Transaction</th>
                <th>Form / Slip</th>
                <!-- <th>Reason/s</th> -->
                <th>Action Taken</th>
                <th>Last Updated</th>
                <th>Remarks</th>

<!-- you can find the design on the subpage
titled: remark_design.php-->

                <th>Add Remarks</th>
            </tr>
        </thead>
        <tbody>
        

        </tbody>
        </table> 

        <!-- Remarks popup -->
        <div id="modal" class="modal">
            <div class="modal_content">
                <div class="body">
                <div class="container">
                    <form>
                    <h1>Add Remarks</h1>
                    <div class="id">
                        <textarea cols="20" rows="7" placeholder="Enter your remarks here..." id="remarksTextarea"></textarea>
                        <button onclick="add_remarks()"> Add </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
                    <!--  -->
        </p>
                </div>
            </div>
            <div class="card border one">
                <div>
                    <h2 class="title">ALL &nbspAppointed Counseling</h2>
                    <hr>
                    <p class="card-description">
        <table class="table-sortable" id="dynamicTable2">
        <thead>
            <tr>
                <th>Date of Appointment</th>
                <th>Reason of Appointment</th>
                <th>Inscribed/Remarks About the Appointment</th>
                <th>Action Taken</th>
                <th>Latest Update</th>

<!-- you can find the design on the subpage
titled: edit_design.php-->

                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>
        <!-- Edit popup -->

        <div class="modal" id="modal2">
            <div class="modal_content">
                <div class="body">
                <div class="container">
                    <form>
                    <h1>Edit Data</h1>
                    <div class="id">
                        <input type="text" placeholder="Action Taken" id="editTextarea">
                    </div>
                    <div class="id">
                        <textarea cols="20" rows="7" placeholder="Remarks about the appointment..." id="editTextarea2"></textarea>
                        <button onclick="edit_remarks()"> Edit </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        <!--  -->
                </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
<?php 
// Retrieve stud_id from the session
$student = $_SESSION['stud_user_id'];

// $student_transacts = $_SESSION['ST_id'];

// echo "<script>alert('$student_transacts')</script>";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script -->
    <script>

var trans_id
var stud_name
var app_id
var tID
var eID = '<?php echo $id;?>';
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
    window.location.href = '../../home';
}
function faq(){
        window.location.href="../FAQ.php"
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
    window.location.href = 'archive.php';
        }
// remarks
function openModal(id) {
    document.getElementById("modal").style.display = "block";
    console.log(id);
    trans_id = id;
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  // Add an event listener to close the modal when clicking outside of it
  window.addEventListener("click", function (event) {
    var modal = document.getElementById("modal");
    if (event.target === modal) {
      closeModal();
    }
  });


//Edit

function openModal2(id) {
    document.getElementById("modal2").style.display = "block";
    console.log(id);
    app_id=id;
    console.log("tid:", tID);

  }

  function closeModal2() {
    document.getElementById("modal2").style.display = "none";
  }

  // Add an event listener to close the modal when clicking outside of it
  window.addEventListener("click", function (event) {
    var modal2 = document.getElementById("modal2");
    if (event.target === modal2) {
      closeModal2();
    }
  });


    //appointment
    function edit_remarks(){
      
        var textareaValue = document.getElementById("editTextarea").value;
        var textareaValue2 = document.getElementById("editTextarea2").value;
        console.log("ID:", app_id);
        console.log("Remarks:", textareaValue);
        console.log("Remarks:", textareaValue2);
        $.ajax({
          type: 'POST',
          url: '../../backend/appointment_remark.php',
          data: {
            id: app_id,
            tid:tID,
            action: textareaValue,
            remark: textareaValue2
          },
          success: function (data) {
            Swal.fire({
              icon: "success",
              title: "appointment remarked",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'edit remark',
              details: eID + ' edited remark of ' + stud_name
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            console.log("Remarked:", data);
                } 
              });

          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            // alert("Error marking event as done: " + error);
            Swal.fire({
                icon: "error",
              title: "Something went wrong",
              text: "Please try again",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                                                            
                } 
              });
          },
        });
        
    }
  //transact
  function add_remarks() {
    var textareaValue = document.getElementById("remarksTextarea").value;
    console.log("ID:", trans_id);
    console.log("Remarks:", textareaValue);
            $.ajax({
          type: 'POST',
          url: '../../backend/student_remark.php',
          data: {
            id: trans_id,
            remark: textareaValue
          },
          success: function (data) {
            Swal.fire({
              icon: "success",
              title: "transation remarked"
            });
            Swal.fire({
              icon: "success",
              title: "transation remarked",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  $.ajax({
                    type: 'POST',
                    url: '../../backend/log_audit.php',
                    data: {
                      userId: eID,
                      action: 'add remark',
                      details: eID + ' added remark for ' + stud_name
                    },
                    success: function(response) {
                      // Handle the response if needed
                      console.log("logged", response);
                    }
                  });
                    console.log("Remarked:", data);
                } 
              });

          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            Swal.fire({
                icon: "error",
              title: "Something went wrong",
              text: "Please try again",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                                                            
                } 
              });
          },
        });
        }

    // Function to update the HTML elements
    function updateValues(fname, lname, email, year_level, course, gender, college, cn, address, year_enrolled, cs, bday, bplace, nat, ig, pwd, studpar, marit, src, mfname, mlname, mocc, medu, mcn, mage, ffname, flname, focc,fedu, fcn, fage, gfname, glname, gocc, gedu, gcn, gage, hs, hs_yg, js, js_yg, es, es_yg, os, os_yg, frst, scnd, thrd, ggoal, afather, amother, closest, bcoz, child, tch, dkt, ftr, pgn, pgname, relation) {

        const genderImageMap = {
            'male': '../assets/images/male.jpg',
            'female': '../assets/images/female.jpg'
        };

        const image = document.createElement('img');
        image.style.display = 'block'; // Display the image above the text

        if (gender === 'Male') {
            image.src = genderImageMap['male'];
        } else if (gender === 'Female') {
            image.src = genderImageMap['female'];
        }

        $('#lname').text(lname+ ', ');//
        $('#fname').text(fname);//
        $('#year_level').text(year_level+ ' ');//
        $('#email').text(' '+email);//
        $('#number').text(' '+cn);//
        // 
        $('#address').text(' '+address);//
        $('#yr_enrolled').text(' '+year_enrolled);//
        $('#cs').text(' '+cs);//
        $('#DOB').text(' '+bday);//
        $('#BP').text(' '+bplace);//
        $('#nationality').text(' '+nat);//
        $('#mom').text(' '+mfname +' '+mlname);//
        $('#mage').text(' '+mage);//
        $('#mom_cn').text(' '+mcn);//
        $('#mom_occ').text(' '+mocc);//
        $('#mom_school').text(' '+medu);//
        $('#dad').text(' '+ffname +' '+flname);//
        $('#fage').text(' '+fage);//
        $('#dad_cn').text(' '+fcn);//
        $('#dad_occ').text(' '+focc);//
        $('#dad_school').text(' '+fedu);//
        $('#grd').text(' '+gfname +' '+glname);//
        $('#gage').text(' '+gage);//
        $('#grd_cn').text(' '+gcn);//
        $('#grd_occ').text(' '+gocc);//
        $('#grd_school').text(' '+gedu);//
        
        $('#HS').text(' '+hs);//
        $('#HS_YG').text(' '+hs_yg);//
        $('#JS').text(' '+js);//
        $('#JS_YG').text(' '+js_yg);//
        $('#ES').text(' '+es);//
        $('#ES_YG').text(' '+es_yg);//
        $('#OS').text(' '+os);//
        $('#OS_YG').text(' '+os_yg);//

        $('#IG').text(' '+ig);//
        $('#PWD').text(' '+pwd);//
        $('#SP').text(' '+studpar);//
        $('#FS').text(' '+src);//
        $('#MS').text(' '+marit);//

        // 
        $('#guardian').text(' '+pgname);
        $('#relation').text(' '+relation);
        $('#guardian_number').text(' '+pgn);
        $('#college').text(college+ ' ');//
        $('#course').text(course);//

        $('#1').text(' '+frst);//
        $('#2').text(' '+scnd);//
        $('#3').text(' '+thrd);//
        $('#goal').text(' '+ggoal);//
        $('#fis').text(' '+afather);//
        $('#mis').text(' '+amother);//
        $('#closest').text(' '+closest);//
        $('#coz').text(' '+bcoz);//
        $('#when_child').text(' '+child);//
        $('#teachers_are').text(' '+tch);//
        $('#dont_know').text(' '+dkt);//
        $('#future').text(' '+ftr);//
        // Replace the content of the #gender div with the created image
        const genderElement = document.getElementById('gender');
        genderElement.innerHTML = ''; // Clear existing content
        genderElement.appendChild(image);
   
    }
    function fetchData() {
    console.log('AJAX request started');
    $.ajax({
        type: 'GET',
        url: '../../backend/get_student.php',
        dataType: 'json',
        success: function (data) {
          console.log(data);

            if (data.length > 0) {
                var studentData = data[0]; // Assuming you expect a single row
                var fname = studentData.first_name;
                stud_name = studentData.first_name + ' ' + studentData.last_name;
                var lname = studentData.last_name;
                var email = studentData.email;
                var year_level = studentData.Year_level;
                var course = studentData.course;
                var gender = studentData.gender;
                var college = studentData.Colleges;
                var cn = studentData.Contact_number;
                var address =studentData.Address;
                var year_enrolled =studentData.year_enrolled;
                var cs =studentData.Civil_status;
                var bday =studentData.birth_date;
                var bplace =studentData.Birth_place;
                var nat =studentData.Nationality;
                var ig =studentData.IG;
                var pwd =studentData.PWD;
                var studpar =studentData.Student_parent;
                var marit =studentData.Marital_status_of_parents;
                var src =studentData.source;
                var mfname =studentData.mfname;
                var mlname =studentData.mlname;
                var mocc =studentData.mocc;
                var medu =studentData.medu;
                var mcn =studentData.mcn;
                var mage =studentData.mage;
                var ffname =studentData.ffname;
                var flname =studentData.flname;
                var focc =studentData.focc;
                var fedu =studentData.fedu;
                var fcn =studentData.fcn;
                var fage =studentData.fage;
                var gfname =studentData.gfname;
                var glname =studentData.glname;
                var gocc =studentData.gocc;
                var gedu =studentData.gedu;
                var gcn =studentData.gcn;
                var gage =studentData.gage;
                var hs = studentData.HS;
                var hs_yg =studentData.HS_YG;
                var js =studentData.JS;
                var js_yg =studentData.JS_YG;
                var es =studentData.ES;
                var es_yg =studentData.ES_YG;
                var os =studentData.OS;
                var os_yg = studentData.OS_YG;
                var frst =studentData.first;
                var scnd =studentData.second;
                var thrd =studentData.third;
                var ggoal =studentData.goal;
                var afather = studentData.fis;
                var amother = studentData.mis;
                var closest =studentData.kapatid;
                var bcoz =studentData.kap_res;
                var child =studentData.whenChild;
                var tch =studentData.teachAre;
                var dkt = studentData.friendsDuno;
                var ftr = studentData.future;
                var pgn = studentData.ParentGuardianNumber;
                var pgname = studentData.ParentGuardianName;
                var relation = studentData.Relation;
                var sign = studentData.sign;
                var idd = studentData.id;
                console.log(fname);
                updateValues(fname, lname, email, year_level, course, gender, college, cn, address, year_enrolled, cs, bday, bplace, nat, ig, pwd, studpar, marit, src, mfname, mlname, mocc, medu, mcn, mage, ffname, flname, focc,fedu, fcn, fage, gfname, glname, gocc, gedu, gcn, gage, hs, hs_yg, js, js_yg, es, es_yg, os, os_yg, frst, scnd, thrd, ggoal, afather, amother, closest, bcoz, child, tch, dkt, ftr, pgn, pgname, relation);
                            
                const id = <?php echo $_SESSION['stud_user_id']; ?>;

                const pers_info = lname;

                displayBlobAsImage(sign, 'sig'); // Pass the image data and an element ID
               displayBlobAsImage(idd, 'idd'); // Pass the image data and an element ID


               function displayBlobAsImage(blobData, elementId) {
            if (blobData) {
                var imgElement = document.getElementById(elementId);
                if (imgElement) {
                    imgElement.src = 'data:image/jpeg;base64,' + blobData; // Assuming JPEG format
                }
            }
        }

                // const filePath_jpg = `../../backend/uploads/id_${id}_${pers_info}.jpg`;
                // const filePath_png = `../../backend/uploads/id_${id}_${pers_info}.png`;
                // const filePath_jpeg = `../../backend/uploads/id_${id}_${pers_info}.jpeg`;

                // const imgElement = document.getElementById('idd');
                // // imgElement.style.width = '50%';
                // // imgElement.style.height = '50%';

                // if (fileExists(filePath_jpg)) {
                //   // Display the image
                //   imgElement.src = filePath_jpg;
                //   imgElement.alt = 'Photo';
                // } else if (fileExists(filePath_png)) {
                //   // Display the image
                //   imgElement.src = filePath_png;
                //   imgElement.alt = 'Photo';
                // } else if (fileExists(filePath_jpeg)) {
                //   // Display the image
                //   imgElement.src = filePath_jpeg;
                //   imgElement.alt = 'Photo';
                // } else {
                //   console.log('File not found.');
                // }

                // function fileExists(url) {
                //   var http = new XMLHttpRequest();
                //   http.open('HEAD', url, false);
                //   http.send();
                //   return http.status !== 404;
                // }




                // const filePath2_jpg = `../../backend/uploads/sign_${id}_${pers_info}.jpg`;
                // const filePath2_png = `../../backend/uploads/sign_${id}_${pers_info}.png`;
                // const filePath2_jpeg = `../../backend/uploads/sign_${id}_${pers_info}.jpeg`;

                // const imgElement2 = document.getElementById('sig');
                // // imgElement.style.width = '50%';
                // // imgElement.style.height = '50%';

                // if (fileExists(filePath2_jpg)) {
                //   // Display the image
                //   imgElement2.src = filePath2_jpg;
                //   imgElement2.alt = 'Photo';
                // } else if (fileExists(filePath2_png)) {
                //   // Display the image
                //   imgElement2.src = filePath2_png;
                //   imgElement2.alt = 'Photo';
                // } else if (fileExists(filePath2_jpeg)) {
                //   // Display the image
                //   imgElement2.src = filePath2_jpeg;
                //   imgElement2.alt = 'Photo';
                // } else {
                //   console.log('File not found.');
                // }

                // function fileExists(url) {
                //   var http = new XMLHttpRequest();
                //   http.open('HEAD', url, false);
                //   http.send();
                //   return http.status !== 404;
                // }

                var ma = $("#ma");
                var fa = $("#da");
                var gua = $("#gd");
                var oth = $("#OTH");
                // Combine mother's information
                var motherInfo = [mfname, mlname, mocc, medu, mcn, mage].join(' ').trim();
                if (motherInfo === '') {
                    // Handle the case where any of the mother's information is null, undefined, or empty
                    console.log("ma empty");

                    ma.hide();
                }

                // Combine father's information
                var fatherInfo = [ffname, flname, focc, fedu, fcn, fage].join(' ').trim();
                if (fatherInfo === '') {
                    // Handle the case where any of the father's information is null, undefined, or empty

                    console.log("da empty");
                    fa.hide();
                }

                // Combine guardian's information
                var guardianInfo = [gfname, glname, gocc, gedu, gcn, gage].join(' ').trim();
                if (guardianInfo === '') {
                    // Handle the case where any of the guardian's information is null, undefined, or empty
                    console.log("gua  empty");
                    gua.hide();

                }
                // var oth_schl = [os, os_yg].join(' ').trim();
                if ((os === '' || os_yg === '') || (os === 'None' || os_yg === '0')) {
                    // Handle the case where any of the guardian's information is null, undefined, or empty
                    console.log("oth  empty");
                    oth.hide();

                }

                console.log("os", os);
                console.log("os_yg", os_yg);
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


    
    $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../../backend/student_transacts.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');
                    
                    
                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; 

                    // console.log("transact", S_transact);
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.date_created + "</td>");
                    row.append("<td>" + entry.transact_type +"</td>");
                    // row.append("<td>" + entry.reason +"</td>");
                    row.append("<td>" + entry.status + "</td>");
                    var latest =entry.date_edited ? entry.date_edited:"None";
                    row.append("<td>" + latest + "</td>");
                    // row.append("<td>" + entry.date_edited + "</td>");
                    var rem =entry.remarks ? entry.remarks:"None";
                    row.append("<td>" + rem + "</td>");
                    // row.append("<td>" + entry.remarks + "</td>");
                    // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    // var statusText = status == 'pending' ? 'Unread' : 'Read';
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button class='add' onclick='openModal("+entry.transact_id+")'><i class='ri-menu-add-line'></i></button>");
                    statusCell.append(statusLink);
                    row.append(statusCell);
                    tableBody.append(row);
            
                    
                 }
                 console.log("data",data);
                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage1.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage1.show(); // Show the no history message if no data
                    }
                    // Initial table population
                    // filterData();

            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });


        });
// 
        $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../../backend/student_slot.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');
                    
                    
                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable2 tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; 
                    tID = entry.transact_id;
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.date + "</td>");
                    row.append("<td>" + entry.Reason +"</td>");
                    row.append("<td>" + entry.remarks +"</td>");
                    var act =entry.action_taken ? entry.action_taken:"None";
                    row.append("<td>" + act+ "</td>");
                    var lates =entry.latest_update ? entry.latest_update:"None";
                    row.append("<td>" + lates + "</td>");
                    // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    // var statusText = status == 'pending' ? 'Unread' : 'Read';
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button class='edit' onclick='openModal2("+entry.appointment_id+")'><i class='ri-pencil-line'></i></button>");

                    statusCell.append(statusLink);
                    row.append(statusCell);
                    tableBody.append(row);
            
                    
                 }
                 console.log("data",data);
                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage1.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage1.show(); // Show the no history message if no data
                    }
                    // Initial table population
                    // filterData();

            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });

            
        });
    fetchData();
</script>
<script src="../assets/main.js"></script>
<script src="../assets/js/tablesort.js"></script>
<script src="../assets/js/notes.js"></script>
<?php include '../includes/footer.php' ?>
</body>
</html>