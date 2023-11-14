<!DOCTYPE html>
<html lang="en">
<!-- testing -->
<?php include 'includes/head.php'; ?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<style>


.scroll-top .hover-text {
  display: none;
  position: absolute;
  top: -30px; /* Adjust this value to position the text above the icon */
  right: 5%;
  transform: translateX(-30%);
  width: 200px; /* Adjust the width of the tooltip as needed */
  padding: 10px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle box shadow for a tooltip effect */
  border-radius: 5px;
  text-align: center;
  z-index: 1; /* Ensure the tooltip appears above the icon */
  color:black;
}

.scroll-top:hover .hover-text {
  display: block;
}


 
  
  </style>

<body>
  <header id="header" class="header d-flex align-items-center" style="background-color: black; ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!--  <img src="/GCU.png" alt="">  -->
        <!-- <h1>Impact<span>.</span></h1> -->
      </a>
      <nav id="navbar" class="navbar" style="margin: auto;">
        <ul>
          <img src="assets/img/bsu.png" class="bsu" alt="" style="width:5.5%; ">
          <li><a href="/gcu/home">HOME</a></li>
          <li><a href="/gcu/about">ABOUT</a></li>
          <li><a href="/gcu/services">SERVICES</a></li>

          <space style="width: 400px"> </space>
          <li class="dropdown"><a href="#"><span>LOGIN</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul style="background-color: transparent; ">
              <li><a href="Student_Side/student-login">STUDENT</a></li>
              <li><a href="Employee_Side/employee-login">EMPLOYEE</a></li>
              <li><a href="Teacher_Side/teacher-login">TEACHER</a></li>


            </ul>
          </li>
          <!-- <li class="dropdown"><li class="login-register"><a href="./Student_Side/Stud_registration/page1.html">
            REGISTER</a></li> -->
          <li class="dropdown"><a><span>REGISTER</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul style="background-color: transparent; ">
              <li><a href="./Student_Side/Stud_registration/page1.php">STUDENT</a></li>
              <li><a href="Teacher_Side/register.php">TEACHER</a></li>


            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <?php
  include 'includes/banner.php';
  ?>
  <!-- Header section -->
  <section id="topbar" class="topbar d-flex align-items-center" style="height: auto; ">
    <div class="social-links d-none d-md-flex align-items-center" style="margin-left: 1400px;">
      <style>
      </style>
  </section>
  <!-- End Top Bar -->
  <a href="dh_landing.php" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="fa fa-question-circle"></i>
    <span class="hover-text">Need Help? Click here for assistance.</span>
</a>



  <!-- <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <div id="preloader"></div>
  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>