<?php 
session_start();
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
            <h2 class="title">Welcome back,&nbspAdmin</h2>
        </header>
        <hr>
        <div class="card-body">
            <div class="card-image">
                <img src="assets/images/sp.jpg" alt="">
            </div>
            <div class="card-information">
<!-- call employee 
    registered data -->
                <h1 class="title main-title"><span class="title-lastname main-title">uchiha,</span> Itachi Verlyn Rizz M.</h1>
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
                <a href="./request-forms"><button class="list-link">Read More</button></a>
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
    // Function to update the HTML elements
    function updateValues(studentId, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined) {
        $('#studentId').text(studentId);
        $('#transactType').text(transactType);
        $('#total').text(total);
        $('#employee_email').text(employee_email);
        $('#employee_position').text(employee_position);
        $('#date_joined').text(employee_date_joined);
        $('#totalAppointments').text(totalAppointments);
   
    }
    // Function to fetch data from get_transaction.php
    function fetchData() {
        console.log('AJAX request started');
        $.ajax({
            type: 'GET',
            url: '../backend/get_transaction.php',
            dataType: 'json',
            
                // ...
                success: function (data) {
                    console.log(data.latest_data);
                    if (data.latest_data.length > 0) {
                            var studentId = data.latest_data[0].student_id;
                            var transactType = data.latest_data[0].transact_type;
                            var total = data.total_pending_transactions;
                            var totalAppointments = data.total_appointments; // Define total here
                            var employee_email = data.adminUserData[0].email;
                            var employee_position = data.adminUserData[0].position;
                            var employee_date_joined = data.adminUserData[0].date_joined;
                            console.log(totalAppointments);
                            updateValues(studentId, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined);
                            console.log(total);
                            // Start both counting animations
                            countAppointments(totalAppointments);
                            countForms(total);
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
// Call the fetchData function when the page loads
HistoryData();
    // Call the fetchData function when the page loads
    fetchData();
</script>
<script src="./assets/js/count.js"></script> 
</body>
</html>