<?php 

include 'includes/post.php';

 ?>

  <body>

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                  <img src="assets/img/blog/rec.jpg" alt="" class="img-fluid" style="width: 5000px; height: 600px;">
              </div>


              <h2 class="title">MASARAP ANG BAWAL!</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"> Date Posted: <i class="bi bi-clock"></i><a href="blog-details.html"><time datetime="2020-01-01">March 25,2023</time></a></li>
                </ul>
              </div><!-- End meta top -->

            <style>
            .register-link button {
              display: inline-block;
              background-color: #007bff;
              color: white;
              text-align: center;
              padding: 10px 20px;
              text-decoration: none;
              font-size: 16px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }

            .register-link button:hover {
              background-color:goldenrod;
            }
            </style>

            <div class="content">
              <h1>Premarital Sex Seminar</h1>
              <p>Premarital sex is a long debated issue between the sexual conservatives and liberals. However, according to a research done by the Journal of Health Promotion (2019), premarital sex has its consequences medically, physically, mentally, academically, and economically especially to young adults.</p>
              <p>That’s why, we are inviting you to attend our face-to-face seminar to learn more about reproductive health and sexuality.</p>
              <p>To pre-register, access the link: <a href="https://forms.gle/zzngzvTUsmn9TQMY6">https://forms.gle/zzngzvTUsmn9TQMY6</a> or scan the QR code:</p>
              <p>See you at CTE, Dominador S. Garin Hall on March 30, 2023 from 10:00am to 11:30am.</p>
              <div class="register-link">
                <a href="https://forms.gle/zzngzvTUsmn9TQMY6">
                  <button type="button">Pre-Register Now</button>
                </a>
              </div>
            </div><!-- End post content -->



            

            </article><!-- End blog post -->



            <div class="comments">
        

              <div class="reply-form">

                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

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
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  <div class="post-item mt-3">
                    <img src="assets/img/blog/rec1.jpg" alt="" style="height:60px; ">
                    <div>
                      <h4><a href="serve.php">We Serve as One!</a></h4>
                      <time datetime="2020-01-01">March 2023</time>
                    </div>
                  </div><!-- End recent post item-->
                  <br>
                 

                  <div class="post-item">
                    <img src="assets/img/blog/rec2.jpg" alt="" style="height:60px;">
                    <div>
                      <h4><a href="competition.php">Short Film Competition</a></h4>
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