<!DOCTYPE html>
<html lang="en">

<?php include '../includes/head.php'; ?>
<heead>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<style>
  li a:hover {
  transform: scale(1.1);
}

.mobile-nav-show {
    color: transparent;
  }
  
  .mobile-nav-hide {
    color: transparent;
  }
</style>


<body> 

<header id="header" class="header d-flex align-items-center" style="background-color: #008374; ">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between" >
  <a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!--  <img src="/GCU.png" alt="">  -->
    <!-- <h1>Impact<span>.</span></h1> -->
  </a>
<nav id="navbar" class="navbar" style="margin-right: auto; margin-left:auto;">
<ul id="mob">
<img src="assets/img/bsu.png" class="bsu" alt="" style="width:4%; height:4%;" >
<!-- <img src="assets/img/GCU_logo.png" class="bsu" alt="" style="width:7%; height:6%;" > -->


 
<li ><a href="student-home" style="background-color:#e9d8a6;color:black;">TRANSACTION</a></li>
<li><a href="appointment.php" style="background-color:#e9d8a6;color:black;">APPOINTMENT</a></li>
<<<<<<< Updated upstream
<li><a href="appointment.php" style="background-color:#e9d8a6;color:black;">FAQ</a></li>

=======
<li class="icons">  <a href="../dh_student.php" style="background-color:#e9d8a6;color:black; height:40px;">FAQ</a></li>
>>>>>>> Stashed changes



<!-- Show when Mobile view -->
<!-- <li class="for-mobile"><a href="transaction.php">TRANSACTION</a></li>
<li class="for-mobile"><a href="appointment.php">APPOINTMENT</a></li> -->


<div class="containerA" style="margin-right:3%; background-color:transparent;">

<!-- <div class="account-icon"> -->

<!-- <li class="dropdown"><a href="#"><span> <img src="assets/img/dp.png" alt="" height="40px"  ></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a> -->
       <li class="dropdown"><a href="#" ><span> <img src="assets/img/dp.png" alt="" height="40px"  ><i class="bi bi-chevron-down dropdown-indicator"></i></span> </a>

<ul  style="background-color: transparent; "> 
          <li><a href="../Student_Side/student-profile2.php" style="background: linear-gradient(to right,#ede0d4,#ffc971  );color:black;">PROFILE</a></li>
          <li><a href="../home?logout=true" style="background: linear-gradient(to right,#ede0d4,#ffc971  );color:black;">LOGOUT</a></li>
          
        </ul>
      </li>

</div>

</div>

</ul>
</nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header><!-- End Header --><!-- End Header -->
  <!-- End Header -->


    <?php 

  include '../includes/banner.php';

  ?>






<!-- </section> -->
<style>
  @media (min-width: 1280px) {
  .mobile-nav-toggle {
    display: none;
  }
}
  .for-mobile{
    visibility: hidden;
  }
  .containerA {
      max-width: 500px;
      margin: 0 auto;
      /* background-color: #f7b801; */
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }
.dropdown-content {
      display: none;
      position: absolute;
      background-color:transparent;
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
    /* background-color: black; */
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
    ul{
      height:1000px;
    }
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
  /* background-color: #fff; */
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