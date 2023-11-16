<?php 
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
$id = $_SESSION['session_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Header -->
<header class="header">
    <nav class="nav">
        <div class="logo">
         <a href="./employee-home" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="align-right">
        <button class="icon-btn theme-toggle-btn place-items-center">
            <i class="ri-sun-line theme-light-icon"></i>
            <i class="ri-moon-line theme-dark-icon"></i>
        </button>
        </div>
    </nav>
</header>
    <!-- Banner -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
        <img src="assets/images/GCU_logo.png" alt="">
        <div class="banner-text">
            <h5>REPUBLIC OF THE PHILIPPINES</h5>
            <hr class="banner-line">
            <h2><span>BENGUET STATE UNIVERSITY</span></h2>
            <h1>GUIDANCE AND COUNSELING UNIT</h1>
        </div>
        </div>
    </section>
    <div class="block"></div>
    <!-- First Section -->
    <div class="title independent-title">
        <h2 > Control Panel</h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Profile Account</small>
<!-- call employee id 
    number or 
    profession = "Admin"-->
            <h2 class="title">Welcome back,<span id="position"></span></h2>
        </header>
        <hr>
        <div class="card-body">
            <div class="card-image" id="gender">
                <img src="" alt="">
            </div>
            <div class="card-information">
<!-- call employee 
    registered data -->
                <h1 class="title main-title"><span class="title-lastname main-title" id="lname">uchiha,</span> <span id="fname"> Verlyn Rizz M.</span></h1>
                <p class="card-description1">Joined at <b id="date_joined"></b><br><br></p>
                <p class="card-description">
                    <span>Email:</span><b id="employee_email"></b><br>
                    <span>Position:</span><b id="employee_position"></b>
                </p>
            </div>
            <div class="card-image1">
                <img src="./assets/images/map.png" alt="">
            </div>
        </div>
    </div>
</section>
 <!-- Management-area -->
 <section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">ACTIONS</h2>
                <small>Choose what task to do today.</small>
            </header>
            <hr>
            <div>
                <a href="./request-forms" class="card-body-link">
                <i class="ri-folder-line"></i>Requested Forms
                </a>
                <a href="./student-profile" class="card-body-link">
                <i class="ri-server-line"></i>Student Profiles
                </a>
                <a href="./appointment" class="card-body-link">
                <i class="ri-calendar-line"></i>Appointment Schedules
                </a>
                <a href="./subpage/archive.php" class="card-body-link">
                <i class="ri-calendar-line"></i>Archive
                </a>
                <a href="../home?logout=true" class="card-body-link">
                <i class="ri-user-3-line"></i>Log-Out
                </a>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">LATEST Requested Forms</h2>
                    <p class="card-description2"><b id="studentId"></b> has requested a <b id="transactType"></b> form.</p>
                </div>
                <!-- <a href="./request-forms"> -->
                    <button class="list-link" onclick = "goto_recent()">Read More</button>
                <!-- </a> -->
            </div>
            <div class="card border two">
                <div>
                    <h2 class="title"><i>UNREAD</i> &nbspForms</h2>
                    <div class="wrapper">
                    <a href="./request-forms"><button class="list-link">Read More</button></a>
                     <div class="count">
                        <i class="ri-file-copy-2-line"></i>
                        <span class="num" data-val="315"><b id="total"></b></span>
                        <span class="text">Forms waiting...</span>
                    </div>
                </div>
                </div>
            </div>
            <div class="card border three">
                <div>
                    <h2 class="title"><i>TODAY'S</i> &nbspAppointment</h2>
                    <div class="wrapper">
                    <a href="./appointment"><button class="list-link">Read More</button></a>
                     <div class="count">
                        <i class="ri-calendar-todo-fill"></i>
                        <span class="num" data-val="10"><b id="totalAppointments"></b></span>
                        <span class="text">pending...</span>
                    </div>
                </div>
                </div>
            </div>
            <div class="card border four">
                <div>
                    <h2 class="title">HISTORY: FINISHED TRANSACTIONS</h2>
                    <p class="card-description" id="list-history"> 
                          
                        </p>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Script -->
<script src="./assets/index.js"></script>   
    
<script>
    var sid;
    var tt;
    var tid;
    var teachid;
            function archive() {
    window.location.href = '';
        }
    // Function to update the HTML elements
    function updateValues(fname, lname, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, gender) {
       
        const genderImageMap = {
                  'Male': 'assets/images/sp.jpg',
                  'Female': 'assets/images/sp2.jpg'
              };
              const image = document.createElement('img');
                image.style.display = 'block'; // Display the image above the text

                if (gender === 'Male') {
                  image.src = genderImageMap['Male'];
                } else if (gender === 'Female') {
                  image.src = genderImageMap['Female'];
                }

        $('#studentId').text(fname + " " + lname);
        $('#transactType').text(transactType);
        $('#total').text(total);
        $('#employee_email').text(employee_email);
        $('#employee_position').text(employee_position);
        $('#date_joined').text(employee_date_joined);
        $('#totalAppointments').text(totalAppointments);
        $('#position').text(ePosition);
        $('#fname').text(eFname);
        $('#lname').text(eLname);
                
                        // Replace the content of the #gender div with the created image
                const genderElement = document.getElementById('gender');
                genderElement.innerHTML = ''; // Clear existing content
                genderElement.appendChild(image);
    }
    // Function to fetch data from get_transaction.php
    function fetchData() {
        console.log('AJAX request started');
    $.ajax({
        type: 'GET',
        url: '../backend/get_transaction.php',
        dataType: 'json',
        success: function (data) {
            processData(data);
        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
            console.error('Status: ' + status);
            console.error('Response: ' + xhr.responseText);
        }
    });
    }


    // Function to process the retrieved data
function processData(data) {
    if (data.latest_data && data.latest_data.length > 0) {
        // Process the data and perform necessary actions
        var sid = data.latest_data[0].student_id;
        var fname = data.latest_data[0].first_name;
        var lname = data.latest_data[0].last_name;
        var transactType = data.latest_data[0].transact_type;
         tt = data.latest_data[0].transact_type;
        var tid = data.latest_data[0].transact_id;
        var total = data.total_pending_transactions;
        var totalAppointments = data.total_appointments;
        var employee_email = data.adminUserData[0].email;
        var employee_position = data.adminUserData[0].position;
        var employee_date_joined = data.adminUserData[0].date_joined;
        var eFname = data.adminUserData[0].first_name;
        var eLname = data.adminUserData[0].last_name;
        var ePosition = data.adminUserData[0].position;
        var eGender = data.adminUserData[0].gender;

        updateValues(fname, lname, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, eGender);

        countAppointments(totalAppointments);
        countForms(total);
    } else {
        // Handle when no results are found
        var studentId = "None";
        var total = 0;
        var totalAppointments = 0;
        var employee_email = data.adminUserData[0].email;
        var employee_position = data.adminUserData[0].position;
        var employee_date_joined = data.adminUserData[0].date_joined;
        var eFname = data.adminUserData[0].first_name;
        var eLname = data.adminUserData[0].last_name;
        var ePosition = data.adminUserData[0].position;
        var eGender = data.adminUserData[0].gender;

        updateValues(fname, lname, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, eGender);

        countAppointments(totalAppointments);
        countForms(total);
        console.log('No results found');
    }
}
// Function to update the card description with data
function updateCardDescription(data) {
    const cardDescription = $('#list-history');
    cardDescription.empty(); // Clear existing content
    if (data.length > 0) {
        data.forEach(item => {
            cardDescription.append(`${item.student_id}..........${item.transact_type}<br>`);
        });
    } else {
        cardDescription.text('No finished transactions.');
    }
}
// Function to fetch data from get_transaction.php
function HistoryData() {
    console.log('AJAX request started');
    $.ajax({
        type: 'GET',
        url: '../backend/get_done_transaction.php',
        dataType: 'json',
        // ...
        success: function (data) {
            console.log(data);
            updateCardDescription(data);
        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
            console.error('Status: ' + status);
            console.error('Response: ' + xhr.responseText);
        }
    });
}

function goto_recent(){
    if (tt === 'referral')
    {
        console.log("student", sid);
        console.log("transact", tid);

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: tt, },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/ref.php';
                }
            });
    }else if(tt === 'readmission'){
        console.log("student", sid);
        console.log("transact", tid);

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: tt},
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/read.php';
                }
            });

    }else if(tt === 'Withdrawing Enrollment'){
        console.log("student", sid);
        console.log("transact", tid);
        var type = 'withdrawal';

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: type },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/w.php';
                }
            });

    }else if(tt === 'Dropping Subjects'){
        console.log("student", sid);
        console.log("transact", tid);
        var type = 'withdrawal';

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: type},
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/d.php';
                }
            });

    }else if(tt === 'Shifting'){
        console.log("student", sid);
        console.log("transact", tid);
        var type = 'withdrawal';

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: type},
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/s.php';
                }
            });

    }else if(tt === 'leave_of_absence'){
        console.log("student", sid);
        console.log("transact", tid);
        var type = 'loa';

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_recent.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, ttype: type},
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/loa.php';
                }
            });

    }
}
// Call the fetchData function when the page loads
HistoryData();
    // Call the fetchData function when the page loads
    fetchData();

</script>
<script src="./assets/js/count.js"></script> 
</body>
</html>