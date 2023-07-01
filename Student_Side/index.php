<?php
include 'includes/landingpage.php';

if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
}

<<<<<<< Updated upstream
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

    <div id="servicesss">
    <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>OUR SERVICES</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>   
      </div><!-- End post list item -->

        </div><!-- End recent posts list -->
=======
?>

<body>
  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-posts" class="recent-posts sections-bg">
    <div class="container" data-aos="fade-up">
>>>>>>> Stashed changes

      <div class="section-header">
        <h2>RECENT POST</h2>
        <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus
          fugit aut qui distinctio</p>
      </div>
<<<<<<< Updated upstream
    </section><!-- End Recent Blog Posts Section -->
    </div>
	</body>
<?php include 'includes/footer.php' ?>

<style>
   #history{
    background-color: lightgray;
    height: 1000px;
  }
  #mission{
    background-color: lightgray;
    height: 1000px;
  }
  #vision{
    background-color: lightgray;
    height: 1000px;
  }
  #servicesss{
    background-color: lightgray;
    height: 1000px;
  } 
</style>
=======

      <div class="row gy-4">

        <div class="col-xl-4 col-md-6">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/rec.jpg" alt="" class="img-fluid">
            </div>


            <h2 class="title">
              <a href="post1.php">MASARAP ANG BAWAL!</a>
            </h2>

            <div class="d-flex align-items-center">
              <img src="assets/img/blog/GCU.png" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">GUIDANCE AND COUNSELING UNIT</p>
                <p class="post-date">
                  <time datetime="2022-01-01">March 30, 2023</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/rec1.jpg" alt="" class="img-fluid">
            </div>



            <h2 class="title">
              <a href="serve.php">We Serve as One!</a>
            </h2>

            <div class="d-flex align-items-center">
              <img src="assets/img/blog/GCU.png" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">GUIDANCE AND COUNSELING UNIT</p>
                <p class="post-date">
                  <time datetime="2022-01-01">March 2023</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/rec2.jpg" alt="" class="img-fluid">
            </div>



            <h2 class="title">
              <a href="competition.php">Short Film Competition</a>
            </h2>

            <div class="d-flex align-items-center">
              <img src="assets/img/blog/GCU.png" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">GUIDANCE COUNSELING UNIT</p>
                <p class="post-date">
                  <time datetime="2022-01-01">March 30,2023</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

      </div><!-- End recent posts list -->

    </div>
  </section><!-- End Recent Blog Posts Section -->
</body>
<?php include 'includes/footer.php' ?>
>>>>>>> Stashed changes
