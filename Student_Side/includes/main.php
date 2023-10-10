<!DOCTYPE html>
<html lang="en">

<?php include '../includes/head.php'; ?>

<body>

  <header id="header" class="header d-flex align-items-center" style="background-color: black; ">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between" >
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!--  <img src="/GCU.png" alt="">  -->
        <!-- <h1>Impact<span>.</span></h1> -->
      </a>
<nav id="navbar" class="navbar" style="margin-right: auto; margin-left:auto;">
  <ul>
    <img src="assets/img/bsu.png" class="bsu" alt="" style="width:5.5%; height:auto;" >
    <li><a href="../index.php">HOME</a></li>
    <li><a href="../about.php">ABOUT</a></li>
    <li><a href="../services.php">SERVICES</a></li>



    <!-- Show when Mobile view -->
    <!-- <li class="for-mobile"><a href="transaction.php">TRANSACTION</a></li>
    <li class="for-mobile"><a href="appointment.php">APPOINTMENT</a></li> -->


<div class="containerA" style="margin-right:3%; background-color:black;">

<div class="account-icon">

<li class="dropdown"><a href="#"><span> <img src="assets/img/dp.png" alt="" height="40px" ></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul  style="background-color: transparent; ">
              <li><a href="Stud_registration/profile.php">PROFILE</a></li>
              <li><a href="../index.php?logout=true">LOGOUT</a></li>
            </ul>
          </li>

</div>

</div>

  </ul>
</nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->


    <?php 

  include '../includes/banner.php';

  ?>

<!-- Header section -->
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; ">

  <div class="social-links d-none d-md-flex align-items-center" style="margin-left: 250px;">


<nav id="navbar" class="navbar">
  <ul>
    
    <li><a href="transaction.php">TRANSACTION</a></li>
    <li><a href="appointment.php">APPOINTMENT</a></li>

    
  </ul>
</nav><!-- .navbar -->
</div>
</section>
<style>
  .for-mobile{
    visibility: hidden;
  }
  .containerA {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }
.dropdown-content {
      display: none;
      position: absolute;
      background-color: black;
      min-width: 150px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      padding: 10px;
      z-index:2;
      right: 0;
    }

    .dropdown-content a {
      display: block;
      padding: 5px 0;
      color: #333;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #f4f4f4;
    }

    .account-icon:hover .dropdown-content {
      display: block;
    }




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
    width: 100%;
    border-radius: 0;
    text-align: center;
    margin-top: 10px;
  }

  #navbar ul li a:hover {
    background-color: goldenrod;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }
  #spacer{
    width: 10%;
  }
  @media (max-width: 1279px) {
    .for-mobile{
      visibility: visible;
  }
    #navbar1{
      visibility: hidden;
  }
    #spacer{
      width: 10px;
    }
    button{
      visibility: hidden;
    }
    input{
      width: 100%;
    }
    .account-idon{
      width: auto;
    }
    /* #navbar ul{
      margin-top: 2%;
    } */
  
   
  }

</style>

</section>

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