<!DOCTYPE html>
<html lang="en">

<?php include '../includes/head.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">   

<style>
  li a:hover {
  transform: scale(1.1);
}
.align-right {
  display: inline-flex !important;
    align-items: center;
    justify-content: center;
    width: 3.5rem;
    height: 3.5rem;
    color: white;
 
}

@media (max-width: 767px) {

/* 
  .mobile-nav-toggle {
    display: block;
    font-size: 24px;
    color: white;
    cursor: pointer;
  }

  #navbar ul {
    flex-direction: column;
    position: absolute;
    top: 70px;
    left: 0;
    width: 100%;
    background-color: #008374;
    z-index: 1000;
    display: none;
  }

  #navbar ul.show {
    display: flex;
  }

  #navbar ul li {
    text-align: center;
  }

  #navbar ul li a {
    width: 100%;
  } */
}



</style>


<body> 

<header id="header" class="header d-flex align-items-center" style="background-color: #008374; ">

<!-- <div class="container-fluid container-xl d-flex align-items-center justify-content-between" >
  <a href="index.html" class="logo d-flex align-items-center">

  </a> -->
<nav id="navbar" class="navbar" >
<ul >
<img src="assets/img/GCU_logo.png" class="bsu" alt="" style="display:flex; width: 4%; margin-left: 2rem;" >
<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
 
<li ><a  style=" background: #ecad00 ;color:black;" onclick="logout()">BACK</a></li>
<li><a  style=" background: #ecad00;color:black;" onclick="edit()">EDIT ACCOUNT</a></li>

<li><a  style=" background: #ecad00 ;color:black;" onclick="verify()" id="Update">UPDATE</a></li>
<li><a  style=" background: #ecad00 ;color:black;" onclick="cancel()" id="Cancel">CANCEL</a></li>
<div class="container-fluid container-xl d-flex align-items-center justify-content-between" >
  <a href="index.html" class="logo d-flex align-items-center">

  </a>
  </div>
  <div class="align-right">
<li><a href="../home" style="color:white; margin-top: 12px; padding: 15px 0px 0px;"><i class="ri-user-3-line" style=" font-size:2.4rem; line-height: 0; background: #ecad00;"></i></a></li>
</div>     

<!-- <div class="containerA" style="margin-right:10%; background-color:transparent;">


       <li class="dropdown"><a href="#" style="background:#e9d8a6;"> <span class="large"><img src="assets/img/dp.png" alt="" style="width: 20px;" ></span><i class="bi bi-chevron-down dropdown-indicator"></i> </a>

<ul  style="background-color: transparent; "> 

          <li><a href="../home" style="background: linear-gradient(to right,#ede0d4,#ffc971  );color:black;">LOGOUT</a></li>
          
        </ul>
      </li>
 -->
      </ul>
      </nav>

<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
     
<!-- </div> -->

</header>
  


    <?php 

  include '../includes/banner.php';

  ?>






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
    background-color: transparent;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    font-size: 16px;
    width: 100%;
    border-radius: 0;
    text-align: center;
    margin-top: 0px;
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

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get the mobile tab toggle button
    var mobileNavToggle = document.querySelector(".mobile-nav-toggle");

    // Get the navigation menu
    var navbar = document.getElementById("navbar");

    // Toggle the 'show' class when the mobile tab toggle button is clicked
    mobileNavToggle.addEventListener("click", function () {
      navbar.classList.toggle("show");
    });
  });
</script>





</body>

</html>