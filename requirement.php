<?php 

include 'includes/main.php';

 ?>

  <body>
  	<style>
  		form {
  width: 300px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="file"] {
  display: block;
  margin-bottom: 10px;
}

input[type="submit"] {
  width: 10%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 800px;
}


input[type="submit"]:hover {
  background-color:goldenrod;
}

  	</style>
        <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Upload Requirements</h2>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 80px;">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
               <i class="bi bi-file-text"></i>
              </div>
              <h3>Name ng Requirement</h3>
              	  <form action="upload.php" method="post" enctype="multipart/form-data">
    					<label for="file">Select a file:</label>
    					<input type="file" id="file" name="file">
   
  				</form>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
      <br>

      <div class="form-group">
        <input type="submit" value="SUBMIT">
      </div>

    </section><!-- End Our Services Section -->






  </body>
<?php include 'includes/footer.php' ?>