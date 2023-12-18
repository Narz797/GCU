<?php
session_start();
include 'landingpage.php';

if ((isset($_GET['logout']) && $_GET['logout'] === 'true') || (isset($_SESSION) && !empty($_SESSION))) {
  // Clear session variables
  session_unset();
  // Destroy the session
  session_destroy();
  // Check if the session is cleared
  if (session_status() === PHP_SESSION_NONE) {
    $message = "Session is cleared.";
  } else {
    $message = "Session is not cleared.";
  }
  // Log the message in the browser's console
  echo '<script>console.log("' . $message . '");</script>';
}
?>

<!-- test -->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto');
  .left-column img {
    margin-top: 15%;
    margin-bottom: 5%;
    width: 50%;
    -webkit-animation: mover 2s infinite alternate;
    animation: mover 1s infinite alternate;
  }
  .left-column {
    /* margin-top: 15%; */
    flex: 1;
    padding: 10px;
    display: flex;
    margin-right: 20px;
    /* justify-content: center;
            align-items: center; */
  }
  .right-column {
    margin-top: 5%;
    flex: 2;
    background-color: -webkit-linear-gradient(left, #fefefe, #96ded8);
    padding: 20px;
    border-radius: 10px;
  }
  .container1 {
    display: flex;
    /* Use flexbox to align items horizontally */
    /* align-items: center;  */
    /* Vertically center the items within the container */
  }

  @media only screen and (max-width: 767px) {
    .left-column img {
      width: 100%; /* Adjust as needed */
      margin-top: 10%;
      margin-bottom: 2%;
    }

    .right-column {
      margin-top: 5%;
    }
    
   
    /* Add other responsive styles as needed */
  }
</style>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<body>

      
      <section id="hero" class="hero"  >
      


      </section>



  <!-- ======= Our Services Section ======= -->
  <div id="hs">
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2 style="color:black; font-family:fantasy; color: black; text-shadow: 2px 2px 4px rgba(255, 255, 0, 1);" >What is Guidance and Counseling Unit?</h2>
          <div class="text-box" style="text-align:justify;  font-family: var(--font-primary)">
            Republic Act No. 9258 Act of 2004 Guidance and Counseling is a profession that involves the use
            of an integrated approach to the development of a well-functioning individual primarily by helping him/her
            potentials to the fullest and plan him/her to utilize his/her potentials to the fullest and plan his/her
            future in accordance with his/her abilities, interests and needs. It includes functions such as counseling
            subjects,
            particularly subjects given in the licensure examinations, and other human development services.
          </div>
        </div>
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative"
              style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>Our Principle</h3>

              <p style="font-size:16px;  font-family: var(--font-primary); color:black; " >A service-oriented partner for the
                development of competitive and empowered students.
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
            style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Our Mandate</h3>
              <p style="font-size:16px;   font-family: var(--font-primary);color:black;  ">Advocate quality and relevant
                student-wellness-services and programs that
                are responsive to the emerging needs of the times..
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
            style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Our Aim</h3>
              <p style="font-size:16px;  font-family: var(--font-primary) ; color:black; ">Equip students with essential Life skills
                to prepare them to become productive citizens of the local and international society.</p>

            </div>
          </div><!-- End Service Item -->
        </div>
        <div class="container1">
          <div class="left-column">
            <img src="assets/img/aaa.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"
              style="width: 400px; height: 300px;">
          </div>
          <div class="right-column">
            <h3><b>Why visit the Office of the Student Wellness Services - Guidance and Counseling Unit</b></h3>
            <br>
            <div class="text-box" style="text-align:justify; font-family: var(--font-primary)">
              We want to assist students' academic, vocational, social, moral and personal growth and development.
              A comprehensive component serving the entire university campus population, the guidance and counselling
              unit
              is vital to the personal growth and development of the student body.
            </div>
          </div>
        </div>
    </section><!-- End Our Services Section -->
  </div>
  
    <script>
    $("#contacts").on("submit", function (event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: '../../backend/contacts.php',
        data: {
          name: $("#name").val(),
          email: $("#email").val(),
          course: $("#course").val(),
          message: $("#message").val()
        },
        success: function (data) {
          alert(data);
        }
      });
    });
  </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <body>
    <?php include 'includes/footer.php' ?>