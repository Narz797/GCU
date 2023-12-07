<?php
session_start();
include 'landingpage.php';

if ((isset($_GET['logout']) && $_GET['logout'] === 'true') || (isset($_SESSION) && !empty($_SESSION))) {
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
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
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

  @media only screen and (max-width: 767px) {
    .left-column img {
      width: 100%; /* Adjust as needed */
      margin-top: 10%;
      margin-bottom: 2%;
    }

    .right-column {
      margin-top: 5%;
    }
    
   
    /* Add other responsive styles as needed */
  }
</style>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<body>
<!-- <section id="topbar" class="topbar d-flex align-items-center" style="background-color: #80b918; height: 50px; color: black; "></section> -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="hero"  style="background: linear-gradient(to right,#2b9348,#f7b801,#55a630  );"> -->
  <!-- <section id="hero" class="hero"  > -->
      <!-- <block style="background:#aacc00; height:20px; " ></block> -->
      <!-- <hr style="background:#aacc00; height:20%; "></hr> -->

      <!-- </section>
     <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      
                       
                      
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                     
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Matt Brandon</h3>
                      <h4>Freelancer</h4>
                     
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                     
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> -->

      <section id="hero" class="hero"  >



    <!-- <div class="container position-relative" > -->
      <!-- <div class="row gy-5" data-aos="fade-in"> -->
        <!-- <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start"> -->
          <!-- <h2 style="font-family: 'Lucida Calligraphy'; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);"> <br> <span style="font-family:fantasy; color: #black; text-shadow: 2px 2px 4px rgba(255, 255, 0, 1);">BENGUET STATE UNIVERSITY</span></h2> -->
         
          <!-- <h2  style="font-family: 'Lucida Calligraphy'; font-size:70px; color:white; text-shadow: 2px 2px 4px rgba(0, 128, 0, 1);">Guidance and Counseling Unit</h2> -->
                         <!-- <h2 style="font-family: 'Lucida Calligraphy'; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);"> <br> <span style="font-family:fantasy; color: #black; text-shadow: 2px 2px 4px rgba(255, 255, 0, 1);">BENGUET STATE UNIVERSITY</span></h2> -->

          <!-- <h2 style="font-family: 'Lucida Calligraphy'; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);"> <br> <span style="font-family:fantasy; color: #black; text-shadow: 2px 2px 4px rgba(255, 255, 0, 1);">BENGUET STATE UNIVERSITY</span></h2> -->

        <!-- </div> -->
        <!-- <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/aaa.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"
            style="width: 3000px; height: auto;">
        </div> -->
      <!-- </div> -->
    <!-- </div> -->
    
    
    
<!--   
    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5"  >
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box"style="background: linear-gradient(to right,#bfd200, #80b918, #2b9348);" >
              <div class="icon" style="color:black;" ><i class="bi bi-flag"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link" style="color:black;" >OUR PRINCIPLE</a></h4>
            </div>
          </div>
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box" style="background: linear-gradient(to right,#bfd200, #80b918, #2b9348);" >
              <div class="icon" style="color:black;" ><i class="bi bi-eye"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link" style="color:black;" >OUR MANDATE</a></h4>
            </div>
          </div>
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box" style="  font-family: var(--font-primary)  ; background: linear-gradient(to right,#bfd200, #80b918, #2b9348);">
              <div class="icon" style="color:black;"  ><i class="bi bi-tools"></i></div>
              <h4 class="title"><a href="#hs" class="stretched-link" style="color:black;" >OUR AIM</a></h4>
            </div>
          </div>
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box"style="background: linear-gradient(to right,#bfd200, #80b918, #2b9348); ">
              <div class="icon" style="color:black;" ><i class="bi bi-clock-history"></i></div>
              <h4 class="title" ><a href="https://www.facebook.com/profile.php?id=61553066382035" style="color:black;"  class="stretched-link" >CONTACT</a></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- ======= Our Services Section ======= -->
  <div id="hs">
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2 style="color:black; font-family:fantasy; color: black; text-shadow: 2px 2px 4px rgba(255, 255, 0, 1);" >What is Guidance and Counseling Unit?</h2>
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
              style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>Our Principle</h3>
              <!-- <p style="font-size:16px;"><b>TUTUKK: "Kalinga"</b></p> -->
              <p style="font-size:16px;  font-family: var(--font-primary); color:black; " >A service-oriented partner for the
                development of competitive and empowered students.
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
            style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Our Mandate</h3>
              <p style="font-size:16px;   font-family: var(--font-primary);color:black;  ">Advocate quality and relevant
                student-wellness-services and programs that
                are responsive to the emerging needs of the times..
              </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative"
            style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Our Aim</h3>
              <p style="font-size:16px;  font-family: var(--font-primary) ; color:black; ">Equip students with essential Life skills
                to prepare them to become productive citizens of the local and international society.</p>
              <!-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div><!-- End Service Item -->
        </div>
        <div class="container1">
          <div class="left-column">
            <img src="assets/img/aaa.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"
              style="width: 400px; height: 300px;">
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <body>
    <?php include 'includes/footer.php' ?>