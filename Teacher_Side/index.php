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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER</title>
    
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="assets/css/teachers.css"/>
    <link rel="stylesheet" href="assets/css/teach.css"/>
       <!-- Remix icons -->
       <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   
    <!-- Bootstrap CSS and JS -->
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
 <!-- Header -->
 <header class="header">
    <nav class="nav">
        <div class="logo">
        <img src="GCU_logo.png" alt="">
        <!-- <img src="assets/images/bsu.png" alt=""> -->
        </div>
    </nav>
</header>

    <!-- Welcome-message -->
<section> <?php include '../includes/banner.php' ?>
<div class="title independent-title ">
        <h2 > Teacher's Dashboard </h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Greetings!</small>
<!-- call employee id 
    number or 
    profession = "Admin"-->
            <h2 class="title">Welcome back, <span> Professor!</span></h2>
        </header>
        <hr>
    </div>
</section>
<br>
    <!-- Management-area -->
 
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">ACTIONS</h2>
                <small>Choose what task to do today.</small>
            </header>
            <hr>
            <div>
                <a href="./referral-slip.php" class="card-body-link">
                <i class="ri-calendar-line"></i>Refer a student
                </a>
                <a href="./teacher-profile.php" class="card-body-link">
                <i class="ri-profile-line"></i>Edit your Profile
                </a>
                <a href="../dh_teacher.php" class="card-body-link"> 
                <i class="ri-question-mark"></i>Need Help?
                </a>
                <a onclick="logout()" class="card-body-link">
                <i class="ri-user-3-line"></i>Log-Out
                </a>
            </div>
        </div>
<div class="container1 ">
<section class="main  border">
  <section class="attendance ">
    <div class="attendance-list">
      <h1>List of Referred Students</h1>
        <table class="table" id="dynamicTable">
        <thead>
          <tr>
          <th>Student's ID</th>
          <th>Full Name</th>
          <th>Course</th>
          <th>Year/Level</th>
          <th>Gender</th>
          <th>Reason</th>
          <th>Date Referred</th>
          <th>Status</th>

<!-- I dont know if u need action here
 but just in case or just delete it-->
<!-- 
          <th>Action</th> -->
          </tr>
        </thead>
        <tbody>

        </tbody>
        </table>
        <!-- <p id="noHistoryMessage1">Empty</p> -->
    </div>
  </section>
</section>
</div>
</div>
<br>
  <?php include 'includes/footer.php' ?>    
</body>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var eID = "<?php echo $_SESSION['session_id'];?>";
  var tID = "<?php echo $_SESSION['session_id'];?>";
  function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
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
function search() {
    var studentId = $("#Sid").val();

    $.ajax({
        url: '../backend/TS_search_student.php',
        type: 'GET',
        dataType: 'json',
        data: { studentId: studentId }, // Pass the student ID to the server
        success: function(data) {
          if (data.length>0){
            console.log(data);

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
                courseInput.setAttribute('readonly', 'readonly');

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
                courseInput.value = "";
                courseInput.removeAttribute('readonly');
                contactInput.value = "";
                contactInput.removeAttribute('readonly');
                genderInput.value = "";
                genderInput.removeAttribute('disabled');
          }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}
var clg;
var eID;
var sID;
var dc;
var transID;
var Temail;
var cn;


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
      console.log($("#Sid").val());
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
                          rem: $("#remark").val(),
                          Tcn: cn,
                          TeachEmail: Temail 
                          
                      },
        success: function (data) {
          console.log('Success!');
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
              console.log("logged", response);
            }
          });

        },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    }
      });
    });

    $("#form_edit").on("submit", function (event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: '../backend/edit_teacher.php',
        data: {
                          tid: eID,
                          colege: $("#clg_edit").val(),
                          gender: $("#gnder_edit").val(),
                          fname: $("#fname_edit").val(),
                          mname: $("#mname_edit").val(),
                          lname: $("#lname_edit").val(),
                          cn: $("#cn_edit").val(),
                          email: $("#email_edit").val(),
                          cs: $("#cs_edit").val()
                          
                      },
        success: function (data) {
               Swal.fire({
                icon: "success",
              title: "Updated remarked",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

          fetchData()
          $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: tID,
              action: 'edit info',
              details: tID + ' edited their personal info'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          window.location.href = "index.php";
        } 
              });
        },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    }
      });
    });



    // Fetch data using $.ajax
    $.ajax({
      
        url: '../backend/referred_students.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
           // const table = document.getElementById('data-table');
           // const searchInput = document.getElementById('searchInput');
            
        console.log(data);
        // if (data.status===0){
        var tableBody = $("#dynamicTable tbody");

        for (var i = 0; i < data.length; i++) {
            
            var entry = data[i];
            dc =entry.date;
            sID = entry.student_id;
            
            var tableToAppend = tableBody; // Determine which table to append to
            var row = $("<tr></tr>");
            row.append("<td>" + entry.student_id + "</td>");
            row.append("<td>" + entry.first_name+" " + entry.last_name+"</td>");
            row.append("<td>" + entry.course + "</td>");
            row.append("<td>" + entry.year_level + "</td>");
            row.append("<td>" + entry.gender + "</td>");
            row.append("<td>" + entry.reason + "</td>");
            row.append("<td>" + entry.date + "</td>");
            row.append("<td>" + entry.status + "</td>");


            // var statusCell = $("<td></td>");
            // var statusLink = $("<a href='#divTwo'><button onclick='delete_stud( " + entry.transact_id + ")'><i class='ri-delete-bin-6-line'></i></button></a>");

            // statusCell.append(statusLink);
            // row.append(statusCell);

            tableBody.append(row);
            // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
         }
         console.log("data",data);
         $('#dynamicTable').DataTable();



    },
    error: function(xhr, status, error) {
    console.error('Error fetching data:', error);
    console.log('Server response:', xhr.responseText);
}
    });


    function fetchData() {

    // Function to update the HTML elements
    function updateValues(EmployeeId, college, name, cn, email , gender) {

        $('#EId').text(EmployeeId);
        $('#college').text(college);
        $('#name').text(name);
        $('#cn').text(cn);
        $('#email').text(email);
      
    }


console.log('AJAX request started');
$.ajax({
    type: 'GET',
    url: '../backend/get_teacher.php',
    dataType: 'json',
    
        // ...
        success: function (data) {
            if (data.length > 0) {
                  var EmployeeData = data[0]; // Assuming you expect a single row
                    var EmployeeId = EmployeeData.employee_id;
                    eID = EmployeeData.employee_id;
                    var college = EmployeeData.college;
                    var gender = EmployeeData.gender;
                    var name = EmployeeData.last_name + ', '+ EmployeeData.first_name;
                    cn = EmployeeData.contact_number;
                    var email = EmployeeData.email;
                    Temail = EmployeeData.email;
                    // var cs = EmployeeData.civil_status;
                    console.log("ID: ", gender);

                    updateValues(EmployeeId, college, name, cn, email, gender);

                } else {
                // Handle the case when no results are found
                // You can update the UI as needed
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
fetchData();

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
  function dlete()
  {

      console.log("Tid: ",transID);
    $.ajax({
          type: 'POST',
          url: '../backend/del_stud.php',
          data: {

            Tid: transID
          },
          success: function (data) {
            console.log("Remarked:", data);
            document.getElementById("divTwo").style.display = "none";
            window.location.href = "index.php";
            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: tID,
              action: 'done',
              details: tID + ' removed '+sID +' from table'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            // alert("Error marking event as done: " + error);
            Swal.fire({
              icon: "error",
              title: "Ooops...",
              text: "Error removing student. Please try again",
            });
            window.location.href = "index.php";
          },
        });
  }
  function cancel()
  {


            console.log("Canceled");
            document.getElementById("divTwo").style.display = "none";
            fetchData();

  }
</script>
</html>
</span>