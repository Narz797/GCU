<?php
session_start();
include 'landingpage.php';
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
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
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h1>Welcome to <span>BENGUET STATE UNIVERSITY</span></h1>
          <h2>GUIDANCE AND COUNSELING UNIT</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/guidance.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"
            style="width: 3000px; height: auto;">
        </div>
      </div>
    </div>
    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box" >
              <div class="icon"><i class="bi bi-flag"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link">OUR PRINCIPLE</a></h4>
            </div>
          </div><!--End Icon Box -->
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box"  >
              <div class="icon"><i class="bi bi-eye"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link">OUR MANDATE</a></h4>
            </div>
          </div><!--End Icon Box -->
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box" style="  font-family: var(--font-primary)  ">
              <div class="icon"><i class="bi bi-tools"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link">OUR AIM</a></h4>
            </div>
          </div><!--End Icon Box -->
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box" style=" background: cream">
              <div class="icon"><i class="bi bi-clock-history"></i></div>
              <h4 class="title"><a href="#Contacts" class="stretched-link">CONTACT</a></h4>
            </div>
          </div><!--End Icon Box -->
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Our Services Section ======= -->
  <div id="hs">
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>What is Guidance and Counseling Unit?</h2>
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
              style=" background: -webkit-linear-gradient(left, #eee6e6,#FAFAD2);">
              <div class="icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>Our Principle</h3>
              <!-- <p style="font-size:16px;"><b>TUTUKK: "Kalinga"</b></p> -->
              <p style="font-size:16px;  font-family: var(--font-primary) ">A service-oriented partner for the
                development of competitive and empowered students.
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
              style=" background: -webkit-linear-gradient(left, #eee6e6, 	#FAFAD2);">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Our Mandate</h3>
              <p style="font-size:16px;   font-family: var(--font-primary)  ">Advocate quality and relevant
                student-wellness-services and programs that
                are responsive to the emerging needs of the times..
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
              style=" background: -webkit-linear-gradient(left, #eee6e6, 	#FAFAD2);">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Our Aim</h3>
              <p style="font-size:16px;  font-family: var(--font-primary)  ">Equip students with essential Life skills
                to prepare them to become productive citizens of the local and international society.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->
        </div>
        <div class="container1">
          <div class="left-column">
            <img src="assets/img/gd.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"
              style="width: 300px; height: 300px;">
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
    <body>
      <?php include 'includes/footer1.php' ?>