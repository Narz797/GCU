<!DOCTYPE html>
<html lang="en">

<?php 

include 'landingpage.php';

 ?>
<style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
/* 
        .field{
            
            background: -webkit-linear-gradient(left, #fefefe, #61c6be);
         
        } */

        .left-column img {
            /* margin-top: 15%;
            margin-bottom: 5%; */
            width: 50%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        .container {
          
            display: flex;
            flex-direction: row;
        }

        .left-column {
            flex: 1;
            padding: 10px;
            display: flex;
            /* justify-content: center; */
            align-items: center;
        }

        .right-column {
            /* margin-top: 2%; */
            flex: 2;
            background-color: -webkit-linear-gradient(left, #fefefe, #96ded8);
            padding: 20px;
            border-radius: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }

            
        }

         /* Media query for screens smaller than 576px (e.g., smartphones) */
         @media (max-width: 576px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .left-column img,
            .right-column {
                width: 100%;
            }

            /* Modify other styles as needed for small screens */
        }

        /* Media query for screens between 576px and 768px (e.g., tablets) */
        @media (min-width: 577px) and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .left-column img,
            .right-column {
                width: 80%;
            }

            /* Modify other styles as needed for medium-sized screens */
        }

        /* Media query for screens between 769px and 992px */
        @media (min-width: 769px) and (max-width: 992px) {
            .container {
                flex-direction: row;
            }

            .left-column img,
            .right-column {
                width: 50%;
            }

            /* Modify other styles as needed for larger screens */
        }

    </style>
<body  >
 <section id="recent-posts" class="recent-posts sections-bg" style=" background: -webkit-linear-gradient(left, #eee6e6, #008374);" >
        <div class="container">

        <div class="right-column">
           <h2 style="font-family:fantasy;">About Us </h2>
            <br>
               
           
            <p style="text-align:justify; font-size:16px; font-family: var(--font-primary)">The Guidance Counselors are trained and experienced to organize and 
              conduct personality development, academic survival and other seminars/
               workshops for students aside from the topic mentioned above. The Guidance Counselors 
               can also be invited as a resource speakers for the above topics.</p>

          
        </div>

        <div class="left-column">
            <!-- <img src="../assets/img/GCU_logo.png" alt="Logo" class="logo"> -->
            <img src="assets/img/gg.png"  class="logo" alt="" data-aos="zoom-out" data-aos-delay="100" style="width: 300px; height: 300px;">
        </div>

        

       
    </div>


    <div class="container">

    <div class="left-column">
    <!-- <img src="../assets/img/GCU_logo.png" alt="Logo" class="logo"> -->
    <img src="assets/img/cl.png"  class="logo" alt="" data-aos="zoom-out" data-aos-delay="100" style="width: 300px; height: 150px;">
</div>

<div class="right-column">
   
   
    <p style="text-align:justify; font-size:16px; font-family: var(--font-primary)">Responding to the call for social involvement (or action), these programs 
    are also extended to high schools and other organizations, upon request.</p>

    <p style="text-align:justify; font-size:16px; font-family: var(--font-primary)">More Importantly, these programs are constantly modified to meet the evolving 
    needs of the students and other clients.</p>

    <p style="text-align:justify; font-size:16px;font-family: var(--font-primary)">Changes or improvements of the programs are based from feedbacks from teachers, parents, students, 
    and other clients. Guidance and counseling is a service profession that ultimately aims to assist people develop a well-rounded personality and live a fulfilling Life, maximizing his or her God-given 
    potentials. As such, the BSU-OSS-GCU gratefully welcomes comments and suggestions from the same clients.</p>



  
</div>






</div>

 
    

    

  

    </section><!-- End Recent Blog Posts Section -->

     <!-- ======= Testimonials Section ======= -->
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
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>Matt Brandon</h3>
                      <h4>Freelancer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

</body>

<?php include 'includes/footer.php' ?>
