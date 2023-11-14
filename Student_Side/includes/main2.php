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
  <ul style="height:1000px;">
    <img src="assets/img/bsu.png" class="bsu" alt="" style="width:4%; height:4%;" >
  
     
    <li ><a href="student-home">TRANSACTION</a></li>
    <li><a href="appointment.php">APPOINTMENT</a></li>



    <!-- Show when Mobile view -->
    <!-- <li class="for-mobile"><a href="student-home">TRANSACTION</a></li>
    <li class="for-mobile"><a href="appointment.php">APPOINTMENT</a></li> -->


    <div class="containerA" style="margin-right: 3%; background-color: black;">

<li class="dropdown">
    <a href="#" style="display: flex; align-items: center;">
        <span><img src="assets/img/dp.png" alt="" height="40px"></span>
        <!-- <i class="fas fa-chevron-right" style="margin-left: 5px; color:white;"></i> -->
    </a>
    <ul style="background-color: transparent; width: 100px;">
        <li><a href="../Student_Side/student-profile2.php">PROFILE</a></li>
        <li><a href="../home?logout=true">LOGOUT</a></li>
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






<!-- </section> -->
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

<!-- </section> -->

  <a href="../dh_student.php"class="scroll-top d-flex align-items-center justify-content-center">
  <i class="fa fa-question-circle"></i>
    <span class="hover-text">Need Help? Click here for assistance.</span></a>

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