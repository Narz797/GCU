<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>

  <header id="header" class="header d-flex align-items-center" style="background-color: black; ">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between"  style="background-color: black;">
      <a href="index.php" class="logo d-flex align-items-center">
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


<div class="top" style="background-image: url('assets/img/bg.png'); background-repeat: no-repeat; background-size: cover; padding-bottom: 50px;">
  <br>
  <img src="assets/img/GCU_logo.png" alt="" height="200px" width="200px" style="display: inline-block; vertical-align: middle; margin-left: 30px;">
  <div style="display: inline-block; vertical-align: middle;">
    <h5 style="font-family: 'Georgia', serif; ">REPUBLIC OF THE PHILIPPINES</h5>
    <hr class="line" style="width: 100%;  margin-bottom: 0;">
    <h1 style="font-family: 'Times New Roman', serif; font-weight: bold; "><span>BENGUET STATE UNIVERSITY</span></h1>
    <h3 style="font-family: 'Garamond', serif;;">GUIDANCE AND COUNSELING UNIT</h3>
  </div>
</div>



<!-- Header section -->
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; ">

  <div class="social-links d-none d-md-flex align-items-center" style="margin-left: 1400px;">





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

  .top{
    text-align:center;

  }
</style>




</section>









<!-- End Top Bar -->



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">

        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h1>Welcome to <span>BENGUET STATE UNIVERSITY</span></h1>
          <h2>GUIDANCE AND COUNSELING UNIT</h2> 
        </div>

        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/guidance.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100" style="width: 3000px; height: auto;">
        </div>

      </div>

     
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon" "><i class="bi bi-clock-history"></i></div>
              <h4 class="title"><a href="history.php" class="stretched-link">HISTORY</a></h4>

            
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-flag"></i></div>
              <h4 class="title"><a href="mission.php" class="stretched-link">MISSION</a></h4>
       
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-eye"></i></div>
              <h4 class="title"><a href="vision.php" class="stretched-link">VISION</a></h4>
          
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-tools"></i></div>
              <h4 class="title"><a href="services.php" class="stretched-link">SERVICES</a></h4>
           
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>
  </section>

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