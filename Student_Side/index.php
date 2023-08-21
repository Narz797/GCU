<?php

// New Comment
include 'includes/landingpage.php';

// if(isset($_SESSION["id"])){
//   $id = $_SESSION["id"];
//   $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
// }

?>

<body>
			<!-- ======= Recent Blog Posts Section ======= -->
    <div id="history">
    <section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">
      <div class="container">

        <main >
          <section>
            <h2>HISTORY</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ultrices est ac fermentum.</p>
          </section>

          <!-- Add more sections for different years -->
        </main>
         
      </div>
      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        <!-- Additional content for the section -->
      </div>
    </div>
  </section><!-- End Our Services Section -->
    </div>

    <div id="mission">
    <section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">
      <div class="container">

        <main>
          <section>
            <h2>MISSION</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ultrices est ac fermentum.</p>
          </section>

          <!-- Add more sections for different years -->
        </main>

      </div>
      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        <!-- Additional content for the section -->
      </div>
    </div>
  </section><!-- End Our Services Section -->
    </div>

    <div id="vision">
          <section id="services" class="services sections-bg">
          <div class="container" data-aos="fade-up">
            <div class="container">

              <main>
                <section>
                  <h2>VISION</h2>
                  <hr>
                  <p>Provides assistance to students on matters related to personal, social, academic, psychological, emotional, spiritual vocational and career concerns</p>
                </section>
            
                <!-- Add more sections for different years -->
              </main>

            </div>
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
              <!-- Additional content for the section -->
            </div>
          </div>
        </section><!-- End Our Services Section -->
    </div>

    <div id="Contacts">
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>La Trinidad, Benguet, Philippines, 2601</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>bsuossgcu205@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>09079050664</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Monday-Friday: 8:00 AM - 5:00 PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="course" id="course" placeholder="Course/Year Level" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->


<body>
<?php include 'includes/footer.php' ?>
