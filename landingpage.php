<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

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
    <img src="assets/img/bsu.png" class="bsu" alt="" style="width:5.5%; height:auto;" >
    <li><a href="index.php">HOME</a></li>
    <li><a href="about.php">ABOUT</a></li>
    <li><a href="services.php">SERVICES</a></li>

    <space style = "width: 300px"> </space>
    <!-- <li class="login-register"><a href="login.php">LOGIN</a></li> -->
    <div class="dropdown">
    <li class="login-register"><a>LOGIN</a></li>
      <div class="dropdown-content">
        <a href="Student_Side/login.php">As Student</a>
        <a href="Employee_Side/login_Employee.php">As Employee</a>
      </div>
  </div>
    <li class="login-register"><a href="./Student_Side/stud_registration/index.html">REGISTER</a></li>


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



 
  <style>

</style>





  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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