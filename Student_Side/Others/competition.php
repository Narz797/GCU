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


              <h2 class="title">SHORT FILM COMPETITION</h2>

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
              <h1>ATTN: SHORT FILM COMPETITION WINNERS!</h1>
              <p>As of 8:00 am today, the voting for the short story competition has officially ended.<br> 
                We will only select 3 winners according to the number of likes. Please see below for your reference:<br>
                1. ENTRY #1 by Bles Bilagot (1st placer)<br>
                2. ENTRY #4 by Shekina Homrbrebueno (2nd placer)<br>
                3. ENTRY #2 by Sharliz Yvette Biniahan  (3rd Placer)<br>
                4. ENTRY #5 by Ariane Lapuz<br>
                5. ENTRY #3 by Valasang Arts<br>
                Congratulations to all for doing a great job and for sharing your talents!<br>
                "Win or lose, I believe in doing my best and that is what I always do."    - Lin Dan<br>
                Regarding the claiming of prices, please standby as we will send you an email.</p>
              

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
                    <img src="assets/img/blog/rec.jpg" alt="" style="height:60px;">
                    <div>
                      <h4><a href="post1.php">MASARAP ANG BAWAL!</a></h4>
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