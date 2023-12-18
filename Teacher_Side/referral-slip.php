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
    <link rel="stylesheet" href="assets/css/referslip.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Bootstrap CSS and JS -->
    
    

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
  
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
        </div>
    </nav>
</header>

<section>
    <section> <?php include '../includes/banner.php' ?>

<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">REFERRAL Slip</h2>
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


   <form id="form_transact"  name="form2" method="post">

    <p> <label for="Sid">* Student ID:</label> </p> 
    <p> <input class="form-control1" type="number" id="Sid" name="Sid" required onblur="search()"> </p>
    <p> <label for="fname">* Student's First Name:</label> </p>
    <p> <input class="form-control1" type="text"  id="fname" name="fname" required> </p>
    <p> <label for="mname">Student's Middle Name:</label> </p>
    <p> <input class="form-control1" type="text" id="mname" name="mname" > </p>
    <p> <label for="lname">* Student's Last Name:</label> </p>
    <p> <input class="form-control1" type="text" id="lname" name="lname" required> </p>
    <p> <label for="yl">* Year/Level:</label> </p>
    <p>                         <select select type="text" name='yl' id="yl" required>
                                <option disabled selected>Year Level</option>
                                <option value='1'>1st</option>
                                <option value='2'>2nd</option>
                                <option value='3'>3rd</option>
                                <option value='4'>4th</option>
                                <option value='5'>5th</option>
                                <option value='6'>6th</option>
                            </select> </p>
    <p> <label for="contact">Student's Contact Number:</label> </p>
    <p>  <input class="form-control1" type="number" id="contact" name="contact" oninput="limitTo11Digits(event)"> </p>
    <p> <label>Gender:</label>
     <div class="semester-year-container">
      <select id="genderr" required>
      <option disabled selected>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
      </select>
    </div>
    </p>
    <p> <label for="crse">* Course:</label>
     <div class="semester-year-container">
     <select type="text" name="textfield5" id="crse" required>
                      <option disabled selected>Select Course</option>
                                      <option value='BSAB'>Bachelor of Science in Agribusiness</option>
                                      <option value='BSA'>Bachelor of Science in Agriculture</option>
                                      <option value='BA Comm'>Bachelor of Arts in Communication</option>
                                      <option value='BAEL'>Bachelor of Arts in English Language</option>
                                      <option value='BAFL'>Bachelor of Arts in Filipino Language</option>
                                      <option value='BSABE'>Bachelor of Science in Agriculture and Biosystems Engineering</option>
                                      <option value='BSCE'>Bachelor of Science in Civil Engineering</option>
                                      <option value='BSEE'>Bachelor of Science in Electrical Engineering</option>
                                      <option value='BSIE'>Bachelor of Science in Industrial Engineering</option>
                                      <option value='BSF'>Bachelor of Science in Forestry</option>
                                      <option value='BSET'>Bachelor of Science in Entrepreneurship</option>
                                      <option value='BSFT'>Bachelor of Science in Food Technology</option>
                                      <option value='BSHM'>Bachelor of Science in Hospitality Management</option>
                                      <option value='BSND'>Bachelor of Science in Nutrition and Dietetics</option>
                                      <option value='BSTM'>Bachelor of Science in Tourism Management</option>
                                      <option value='BPeD'>Bachelor of Physical Education</option>
                                      <option value='BSESS'>Bachelor of Science in Exercise and Sports Sciences</option>
                                      <option value='BLIS'>Bachelor in Library and Information Sciences</option>
                                      <option value='BSDC'>Bachelor of Science in Development Communication</option>
                                      <option value='BSIT'>Bachelor of Science in Information Technology</option>
                                      <option value='BS Bio'>Bachelor of Science in Biology</option>
                                      <option value='BS Chem'>Bachelor of Science in Chemistry</option>
                                      <option value='BSES'>Bachelor of Science in Environmental Science</option>
                                      <option value='BS Math'>Bachelor of Science in Mathematics</option>
                                      <option value='BSS'>Bachelor of Science in Statistics</option>
                                      <option value='BSN'>Bachelor of Science in Nursing</option>
                                      <option value='BPA'>Bachelor of Public Administration</option>
                                      <option value='BS Psych'>Bachelor of Science in Psychology</option>
                                      <option value='BECED'>Bachelor of Early Childhood Education</option>
                                      <option value='BEED'>Bachelor of Elementary Education</option>
                                      <option value='BSED'>Bachelor of Secondary Education</option>
                                      <option value='BTLED'>Bachelor of Technology and Livelihood Education</option>
                                      <option value='DVM'>Doctor of Veterinary Medicine</option>
                                      <option value='BA Hist'>Bachelor of Arts in History</option>
      </select>
    </div>
    </p>
    <p> <label>* Reason:</label>
     <div class="semester-year-container">
     <select required id="reason">
        <option disabled selected>Select reason for referral</option>
        <option>Academic Deficiency/ies</option>
        <option>Absent</option>
        <option>Tardy</option>
        <option>Others</option>
        </select>
    </div>
    </p>
    <div class="date-range-container" id="dates">
                <label for="date">* Days absent/tardy:</label>
                <!-- id = date -->
                <div class=" date form-group" id="datepicker">
                <span class="input-group-addon" style="color:black; font-size:x-small;"><i class="glyphicon glyphicon-calendar"></i><span class="count"> </span></span>
                  <input type="text" class="form-control1" id="Date" name="Date" placeholder="Select days" autocomplete="off"/>
                 
    </div>
    </div>
    <p id="rem"> <label for="remark">Remarks:</label>
    <input class="form-control1" type="text"id="remark" name="remark">
    </p>

               <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
               <button type="submit"><span class="btnText">Submit</span><i class="ri-navigation-line"></i></button>
   </form>

 </div>

      

    

</div>

                 </div>
            </div>
        </div>
    </div>
</section> 
<br>

<?php include 'includes/footer1.php' ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
    var eID = "<?php echo $_SESSION['session_id'];?>";
         function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
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
              // console.log("logged", response);
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
function search() {
    var studentId = $("#Sid").val();

    $.ajax({
        url: '../backend/TS_search_student.php',
        type: 'GET',
        dataType: 'json',
        data: { studentId: studentId }, // Pass the student ID to the server
        success: function(data) {
          if (data.length>0){
            // console.log(data);

            for (var i = 0; i < data.length; i++) {
                var entry = data[i];

                var fnameInput = document.getElementById('fname');
                var mnameInput = document.getElementById('mname');
                var lnameInput = document.getElementById('lname');
                var courseInput = document.getElementById('crse');
                var contactInput = document.getElementById('contact');
                 var genderInput = document.getElementById('genderr');

                fnameInput.value = entry.first_name;
                fnameInput.setAttribute('readonly', 'readonly');

                mnameInput.value = entry.middle_name;
                mnameInput.setAttribute('readonly', 'readonly');

                lnameInput.value = entry.last_name;
                lnameInput.setAttribute('readonly', 'readonly');

                courseInput.value = entry.course;
                courseInput.setAttribute('disabled', 'disabled');

                contactInput.value = entry.Contact_number;
                contactInput.setAttribute('readonly', 'readonly');

                genderInput.value = entry.gender;
                genderInput.setAttribute('disabled', 'disabled');
           
            }
          }else{
              

                var fnameInput = document.getElementById('fname');
                var mnameInput = document.getElementById('mname');
                var lnameInput = document.getElementById('lname');
                var courseInput = document.getElementById('crse');
                var contactInput = document.getElementById('contact');
                var genderInput = document.getElementById('genderr');

                fnameInput.value = "";
                fnameInput.removeAttribute('readonly');
                mnameInput.value = "";
                mnameInput.removeAttribute('readonly');
                lnameInput.value = "";
                lnameInput.removeAttribute('readonly');
                courseInput.value = "Select Course";
                courseInput.removeAttribute('disabled');
                contactInput.value = "";
                contactInput.removeAttribute('readonly');
                genderInput.value = "Select gender";
                genderInput.removeAttribute('disabled');
          }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}


$(document).ready(function() {
  var LA = $("#dates");
    var AO = $("#rem");
    LA.hide();
    AO.hide();

    $("#reason").change(function() {
      if ($(this).val() == "Absent" || $(this).val() == "Tardy") {
        LA.show();
        AO.hide();
      } else if ($(this).val() == "Academic Deficiency/ies" || $(this).val() == "Others") {
        LA.hide();
        AO.show();
      } else {
        LA.hide();
        AO.hide();
      }
    });

//check if student is available in database
$("#form_transact").on("submit", function (event) {
      event.preventDefault();

      var transact_type = "Referral"
      var studentContactNumber = document.getElementById("contact").value;
      // console.log($("#Sid").val());
      $.ajax({
        type: 'POST',
        url: '../backend/check_student.php',
        data: {
                          sid: $("#Sid").val(),
                          fname: $("#fname").val(),
                          mname: $("#mname").val(),
                          lname: $("#lname").val(),
                          year_level: $("#yl").val(),
                          gender: $("#genderr").val(),
                          course: $("#crse").val(),
                          cn: $("#contact").val(),
                          reasons: $("#reason").val(),
                          datee: $("#Date").val(),
                          rem: $("#remark").val()
                          
                      },
        success: function (data) {
          // console.log('Success!');
          // alert(data);
            Swal.fire({
              icon: "success",
              title: "Student reffered",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                           
                   window.location.reload()
                } 
              });
;
          $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: tID,
              action: 'reffered',
              details: tID + ' reffered '+sID
            },
            success: function(response) {
              // Handle the response if needed
              // console.log("logged", response);
            }
          });

        },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    }
      });
    });



$('#datepicker').datepicker({
        startDate: new Date(2000, 0, 1), // Update this to an earlier date
        multidate: true,
        format: "dd/mm/yyyy",

        // Remove or adjust the following line if needed
        // datesDisabled: ['31/08/2017'],
        language: 'en'
    }).on('changeDate', function(e) {
        // `e` here contains the extra attributes
        $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    });

  });
  function delete_stud (tid){
    transID = tid;
      // sID = id;

    }

</script>
</body>
</html>