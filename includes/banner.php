<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Your existing styles */
    #RBG h5 {
      font-size: 1vw;
    }
    #RBG h3 {
      font-size: 1.8vw;
    }
    #RBG h1 {
      font-size: 2vw;
    }
   .banner_img {
      max-width: 100%; /* Ensure the image doesn't exceed its original size */
      height: auto;
      display: block; /* Remove the inline-block display property */
      margin-right: 3%;
      vertical-align: middle; 
      width: 10%; 
    }

    /* Media Query for screens with a max-width of 768px */
    @media only screen and (max-width: 768px) {
      #RBG h5 {
        font-size: 3vw;
      }

      #RBG h3 {
        font-size: 3vw;
      }

      #RBG h1 {
        font-size: 4vw;
      }
      .banner{
        height: auto;
      }
      .banner_img {
      width: 20%; /* Adjust the percentage based on your design */
      height: auto;
      padding: 10px;
      margin-right: 0; /* Remove the right margin on smaller screens */
    }
    }
  </style>
</head>
<body>
 
<section class="banner">
  
  <div style="background-image: url('assets/img/bg.png'); background-repeat: no-repeat; background-size: cover; display:flex; justify-content:center; padding-top:5%; padding-bottom:2%;">
    <br>
    <img class = "banner_img" src="assets/img/bsu.png" class="bsu" alt="" >

    <div id="RBG" style="display: inline-block; vertical-align: middle; margin-top:2%;">
      <h5 style="font-family: 'Georgia', serif; color:black;">REPUBLIC OF THE PHILIPPINES</h5>
      <hr class="line" style="width: 100%; border-color: black; margin-bottom: 0;">
      <h1 style="font-family: 'fantasy'; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);"><span>BENGUET STATE UNIVERSITY</span></h1>
      <h1 style="font-family: 'Garamond', serif; font-weight: bold; color:black;">GUIDANCE AND COUNSELING UNIT</h1>
    </div>
  </div>
</section>
</body>
</html>
