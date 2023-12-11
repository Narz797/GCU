<?php
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Digital Help </title>
    <link rel="stylesheet" href="assets/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <!-- Header -->
<header class="header" style="background: #007f5f;">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/img/GCU_logo.png" alt="">
        </div>
        <div class="align-right">
            <button class="icon-btn place-items-center" value="logout" onclick="goBack()">
                <i class="bx bxs-chevron-left"> Back</i>
            </button>
        </div>
    </nav>
</header>
<style>
      #loading-spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      transition: opacity 0.5s ease;
      display: none;
    
    }

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
    <!-- Welcome-message -->
    <?php include 'includes/banner.php' ?>

<section style="background: #ffefd3">
    <div class="block" style="background: #007f5f;"> 
    </div>
 <div class="accordion">
    <div class="accordion-text">
      <div class="title">FAQ</div>
    <ul class="faq-text">

    <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">How does the Referral Slip work?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">Welcome to our platform! Follow these steps to get started: <br>
        ● Fill up the referral slip with the required student information. <br>
        ● The GCU has successfully received your referred student! <br>
        ● Check the update of progress in the Status column in the table below. <br>

        </p>
        <span class="line"></span>
      </li>

      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">Wonder what you can do with the platform?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">● In your profile account, you can edit your information by clicking the Edit button.<br>
        ● A pop-up will show where you can change your information. Fill up the form.<br>
        ● Submit the form or Click exit.<br>
        ● Yay! Your have successfully edited your information.<br>
        </p>
        <span class="line"></span>
      </li>

      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">What is the website about?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">This platform was created by the College of Information Sciences dedicated for the use of the Guidance Counseling Unit of Benguet State University.
         an account before logging in.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">Having issues while using the website?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">If you encounter any issues while using our platform, try the following:<br>
        ● Clear your browser cache<br>
        ● Update your browser to the latest version<br>
        ● Contact support for further assistance<br>
        </p>
        <span class="line"></span>
      
    </ul>
    </div>
  </div>

  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic" style="font-family: 'Poppins' , sans-serif;">Address</div>
          <div class="text-one" style="font-family: 'Poppins' , sans-serif;">IT Department</div>
          <div class="text-two" style="font-family: 'Poppins' , sans-serif;">College of Information Sciences</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic" style="font-family: 'Poppins' , sans-serif;">Phone</div>
          <div class="text-one" style="font-family: 'Poppins' , sans-serif;">+63907 905 0664</div>
          <!-- <div class="text-two">+0096 3434 5678</div> -->
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic"style="font-family: 'Poppins' , sans-serif;">Email</div>
          <div class="text-one" style="font-family: 'Poppins' , sans-serif;">bsuossgcu205@gmail.com</div>
         
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text" style="font-family: 'Poppins' , sans-serif;">SEND US A MESSAGE</div>
        <p style="font-family: 'Poppins' , sans-serif;">Good Day! If you have any queries, you can send us a message from here.</p>
        <p style="font-family: 'Poppins' , sans-serif;">It is our pleasure to be of help to you!</p>
        <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
      <form id="send_help" method="post">
        <div class="input-box">
          <input type="text" id="name" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text"  id="email" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <div class="input-box1">
          <textarea style="font-family: 'Poppins' , sans-serif;" type="text"  id="msg" placeholder="How can we help you with?"></textarea>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
<!-- <footer id="footer" class="footer" style="background: #007f5f;">
    <div class="foot" id="footercopyright">
        <div class="copyright">
           
        </div>
        <div class="credits">Designed by <a class="dev" href="https://www.facebook.com/BSUCollegeofInformationSciences">BSIT</a></div>
    </div>
</footer> -->

<footer class="d-flex justify-content-center" style="width: 100%; background:  #007f5f;">
    
        <br>

        <p style="text-align: center; margin: 0; display: block; color:white; font-family: 'Poppins' , sans-serif;">BENGUET STATE UNIVERSITY <br> &copy; <?php echo date("Y"); ?>.
         Guidance and Counseling Unit. All rights reserved.</p>
        <br>
        
    </footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
                    function goBack() {
            window.history.back();
        }
    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
      li[i].addEventListener("click", (e)=>{
        let clickedLi;
        if(e.target.classList.contains("question-arrow")){
          clickedLi = e.target.parentElement;
        }else{
          clickedLi = e.target.parentElement.parentElement;
        }
       clickedLi.classList.toggle("showAnswer");
      });
    }

    $("#send_help").on("submit", function(event) {
    event.preventDefault();
    
    // Show loading spinner
    Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/send_help.php',
      data: {
        name: $("#name").val(),
        email: $("#email").val(),
        msg: $("#msg").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
  
          // alert("The code to change your password is sent to your email")
          Swal.fire({
              icon: "sucess",
              title: "Help Sent!",
              text: "Please await for further contact",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  // Assuming 'send_help' is the ID of your form
                        var form = document.getElementById('send_help');

                        // Loop through all form elements
                        for (var i = 0; i < form.elements.length; i++) {
                            // Check if the element is an input element or textarea
                            if (form.elements[i].type === 'text' || form.elements[i].type === 'textarea') {
                                // Clear the value
                                form.elements[i].value = '';
                            }
                        }
                  
                } 
              });
        console.log("data",data)
        // window.location.href = "verify_code.php";
        

        // add location to enter code
      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
        $("#loading-spinner").hide();
        
        console.error("Error:", error);
        alert("Error: " + error);
      },
    });
  });
  </script>
</body>
</html>