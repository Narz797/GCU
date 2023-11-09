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
  

include 'includes/main2.php';
 ?>
<head>
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
          <!-- Vendor CSS Files -->
  <link href="../Employee_Side/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../Employee_Side/assets/apmt.css">
    <link rel="stylesheet" href="../Employee_Side/assets/css/forms.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
    .column {
  float: left;
  width: 50%;
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


  @media (max-width: 768px) {
    /* Styles for screens with a maximum width of 768px (e.g., tablets and smaller) */
    .row {
      flex-direction: column;
    }
    .column {
      width: 100%;
    }
    /* Add more responsive styles as needed */
  }




    </style>
  <body>
       
</div>
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; "></section> 
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 80px; ">
<p style="margin-left: 2%; font-size: 30px; font-weight: bold;">CHOOSE TRANSACTION</p>
</section> 
<div class="row">
  <div class="column" style="background-color:transparent;">
  <section id="services" class="services sections-bg" style="background-color: transparent;">
      <div class="container" data-aos="fade-up">
        <!-- <div class="row gy-4" data-aos="fade-up" data-aos-delay="100" > -->
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100" style="width:100%;">
          <div class="col-lg-4 col-md-6" style="width:100%;">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Readmission Slip</h3>
              <br>
              <a href="./forms/readmission-slip" class="readmore stretched-link">Open <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" style="width:100%;">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Withdrawal/Dropping/Shifting Form</h3>
              <br>
              <a href="./forms/withdrawal-slip" class="readmore stretched-link">Open <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" style="width:100%;">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Referral Slip</h3>
              <br>
              <a href="./forms/referral-slip" class="readmore stretched-link">Open <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" style="width:100%;">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Leave Of Absence</h3>
              <br>
              
              <a href="./forms/leave-of-absence-slip" class="readmore stretched-link">Open <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
        </div>
      </div>
      
    </section><!-- End Our Services Section -->
  </div>
    <div class="column" >
    <!-- <div class="container" > -->
        <br>
        <h2 class="title"></h2>
        <div  style="background-color:transparent; height: auto;">
            <header class="card-header" >
                <p style="margin-left: 2%; font-size: 30px; font-weight: bold; color:yellowgreen;" > HISTORY</p>
                <p>&nbsp&nbsp The following are the previous requested forms.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>List of Requested Forms</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search.....">
                </div>
                
            </section>
            <section  id="blog" class="blog"  >
    <div class="container" data-aos="fade-up">
          </div>
          <div class="col-lg-4" style="width:auto;">
            <div class="sidebar" style="background-color:white;">
              <div class="sidebar-item recent-posts">
                <div class="mt-3" id="scrollable-container">
                  <!-- Content loaded via Ajax will be appended here -->
                </div>
              </div>
            </div>
          </div>
        
          </div>
        </div>
      </div>
      
      
            
    </section><!-- End Blog Details Section -->
    
    </div>
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 50px; "></section> 
  </body>
<!-- <script src="../Employee_Side/assets/js/calendar.js"></script>    
<script src="../Employee_Side/assets/main.js"></script>  -->
<script>
  $(document).ready(function() {
    // Function to load data from the database via Ajax
    function loadDataFromDatabase() {
      $.ajax({
        url: '../backend/stud_history.php',
        method: 'GET',
        dataType: 'json', // Set the expected data type to JSON
        success: function(data) {
          // Iterate through the JSON data and append it to the scrollable container
          data.forEach(function(item) {
            // Create the HTML structure for each data item
            var content = '<div class="post-item mt-3">';
            content += '<img src="assets/img/form.png" alt="" style="height:60px; ">';
            content += '<div>';
            content += '<h4><a href="Form1.php">' + item.transact_type + '</a></h4>';
            content += '<time datetime="2020-01-01">' + item.date_completed + '</time>';
            content += '</div>';
            content += '</div>';
            content += '<br>';
            content += '<hr>';
            $('#scrollable-container').append(content);
          });
        },
        error: function(error) {
          console.error('Error fetching data: ' + error);
        }
      });
    }

    // Call the function to load data when the page loads
    loadDataFromDatabase();
  });
</script>