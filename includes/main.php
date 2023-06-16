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
<nav id="navbar" class="navbar" style="margin-right: auto; margin-left:auto;">
  <ul>
    <img src="assets/img/bsu.png" alt="" style="width:5.5%; height:auto;">
    <li><a href="index.php">HOME</a></li>
    <li><a href="about.php">ABOUT</a></li>
    <li><a href="services.php">SERVICES</a></li>
    <li><a href="contact.php">CONTACT</a></li>
    <li class="spacer" ></li>


            <li class="search-bar">
      <form action="search.html" method="GET">
        <input type="text" name="query" placeholder="Search">
        <button type="submit">Search</button>
      </form>
    </li>

    <div class="containerA">

<div class="account-icon">
  <div class="dropdown">
    <img src="assets/img/dp.png" alt="" height="40px" >
    <div class="dropdown-content">
      <!-- Dropdown content goes here -->
      <a href="#">Profile</a>
      <a href="#">Logout</a>
    </div>
  </div>
</div>

</div>


  </ul>
</nav><!-- .navbar -->



      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->


<div style="background-image: url('assets/img/bg.png'); background-repeat: no-repeat; background-size: cover; padding-bottom: 50px;">
  <br>
  <img src="assets/img/GCU.png" alt="" style="display: inline-block; vertical-align: middle; margin-left: 21%; width:14%; height:auto;">
  <div id="RBG" style="display: inline-block; vertical-align: middle;">
    <h5 style="font-family: 'Georgia', serif;">REPUBLIC OF THE PHILIPPINES</h5>
    <hr class="line" style="width: 100%; border-color: black; margin-bottom: 0;">
    <h1 style="font-family: 'Times New Roman', serif; font-weight: bold;"><span>BENGUET STATE UNIVERSITY</span></h1>
    <h3 style="font-family: 'Garamond', serif;">GUIDANCE AND COUNSELING UNIT</h3>
  </div>
</div>



<!-- Header section -->
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; ">

  <div class="social-links d-none d-md-flex align-items-center" style="margin-left: 250px;">


<nav id="navbar" class="navbar">
  <ul>
    
    <li><a href="transaction.php">TRANSACTION</a></li>
    <li><a href="appointment.php">APPOINTMENT</a></li>

    <li class="spacer" style="margin-left:380px;"></li>

       <li class="spacer" style="margin-left:500px;"></li>

    



  </ul>
</nav><!-- .navbar -->
</div>
</section>
<style>

  .containerA {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-left: 10%;
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



 #RBG h5{
  font-size: 1.4vw;
 }
 #RBG h3{
  font-size: 2vw;
 }
 #RBG h1{
  font-size: 2.8vw;
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
  }

  #navbar ul li a:hover {
    background-color: goldenrod;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
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