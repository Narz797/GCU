<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>

  <header id="header" class="header d-flex align-items-center" style="background-color: black; ">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between"  style="background-color: black;">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!--  <img src="/GCU.png" alt="">  -->
        <!-- <h1>Impact<span>.</span></h1> -->
      </a>
<nav id="navbar" class="navbar" style="margin-right: 3000px">
  <ul>
    <img src="assets/img/bsu.png" alt="" height="50px" width="50px">
    <li><a href="index.php">HOME</a></li>
    <li><a href="about.php">ABOUT</a></li>
    <li><a href="services.php">SERVICES</a></li>
    <li><a href="contact.php">CONTACT</a></li>
    <li class="spacer" style="margin-left:200px;"></li>

    <li class="login-register"><a href="login.html">LOGIN</a></li>
    <li class="login-register"><a href="SignUp.html">REGISTER</a></li>
        <li class="search-bar">
      <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search">
        <button type="submit">Search</button>
      </form>
    </li>

  </ul>
</nav><!-- .navbar -->



      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->


<div style="background-image: url('assets/img/bg.png'); background-repeat: no-repeat; background-size: cover; padding-bottom: 50px;">
  <br>
  <img src="assets/img/GCU.png" alt="" height="200px" width="200px" style="display: inline-block; vertical-align: middle; margin-left: 300px;">
  <div style="display: inline-block; vertical-align: middle;">
    <h5 style="font-family: 'Georgia', serif; ">REPUBLIC OF THE PHILIPPINES</h5>
    <hr class="line" style="width: 100%;  margin-bottom: 0;">
    <h1 style="font-family: 'Times New Roman', serif; font-weight: bold; color:black;"><span>BENGUET STATE UNIVERSITY</span></h1>
    <h3 style="font-family: 'Garamond', serif; ">GUIDANCE AND COUNSELING UNIT</h3>
  </div>
</div>


<style>
  #navbar ul {
    list-style: none;
    padding: 0;
  
  }

  /* Remove the margin from each list item */
  #navbar ul li {
    margin: 0;
  }

  /* Remove the left margin from the first list item */
  #navbar ul li:first-child {
    margin-left: 0%;
  }

  #navbar ul li a {
    display: inline-block;
    padding: 10px 20px;
    background-color: black;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    font-size: 16px;
  }

  #navbar ul li a:hover {
    background-color: goldenrod;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }
</style>

<!-- Header section -->
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; ">

  <div class="social-links d-none d-md-flex align-items-center" style="margin-left: 250px;">


<nav id="navbar" class="navbar">
  <ul>
    
    <li><a href="history.php">HISTORY</a></li>
    <li><a href="mission.php">MISSION</a></li>
    <li><a href="vision.php">VISION</a></li>


  </ul>
</nav><!-- .navbar -->
</div>



</section>









<!-- End Top Bar -->



  <style>
  .icon-box:hover {
     background-color: goldenrod !important;
  }
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