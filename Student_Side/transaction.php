<?php 

include 'includes/main.php';


 ?>

  <body>


    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

 <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Choose Transaction</h2>
         
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100" ">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Class Admission</h3>
              <p>Description</p>
              <a href="./forms/Class Admission.php" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Withdrawal/Dropping/Shifting Form</h3>
              <p>Description</p>
              <a href="./forms/withdrawal-dropping-shifitng-form.php" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Feedback Slip</h3>
              <p>Description</p>
              <a href="./forms/Feedback_Slip.php" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Forms</h3>
              <p>Description</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Forms</h3>
              <p>Description</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

         <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
                <div class="icon">
                    <i class="bi bi-file-text"></i>
                </div>
               <h3>Name ng Forms</h3>
                <p>Description</p>
                <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->


        </div>

      </div>

      
    </section><!-- End Our Services Section -->



          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Transaction</h3>

                <div class="mt-3">

                  <div class="post-item mt-3">
                    <img src="assets/img/form.png" alt="" style="height:60px; ">
                    <div>
                      <h4><a href="Form1.php">Name ng Form</a></h4>
                      <time datetime="2020-01-01">March 2023</time>
                    </div>
                  </div><!-- End recent post item-->


            
            <br>
                   <div class="post-item mt-3">
                    <img src="assets/img/form.png" alt="" style="height:60px; ">
                    <div>
                      <h4><a href="Form1.php">Name ng Form</a></h4>
                      <time datetime="2020-01-01">March 2023</time>
                    </div>
                  </div><!-- End recent post item-->

                  


                </div>

              </div><!-- End sidebar recent posts-->



            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
  </body>
<?php include 'includes/footer.php' ?>
<script>
   $(document).ready(function () {
        // Login form submission
        $("#Login_Student_User").submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "login.php",
                data: $(this).serialize(),
                success: function (response) {
                    $("#message").html(response);
                }
            });
        });
      });


</script>
