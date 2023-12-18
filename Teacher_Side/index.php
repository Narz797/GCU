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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    

</head>

<body>
 <!-- Header -->
 <header class="header">
    <nav class="nav">
        <div class="logo">
        <img src="GCU_logo.png" alt="">
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


          </tr>
        </thead>
        <tbody>

        </tbody>
        </table>

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

var clg;
var eID;
var sID;
var dc;
var transID;
var Temail;
var cn;


$(document).ready(function() {

    // Fetch data using $.ajax
    $.ajax({
      
        url: '../backend/referred_students.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            
        // console.log(data);
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


            tableBody.append(row);
            // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
         }
        //  console.log("data",data);
         $('#dynamicTable').DataTable();



    },
    error: function(xhr, status, error) {
    console.error('Error fetching data:', error);
    // console.log('Server response:', xhr.responseText);
}
    });



  });


</script>
</html>
</span>