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
    <section class="banner">
  
  <div style="background-image: url('assets/img/bg.png'); background-repeat: no-repeat; background-size: cover; display:flex; justify-content:center; padding-top:2%; padding-bottom:2%;">
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

<section style="background: #ffefd3">
    <div class="block" style="background: #007f5f;"> 
    </div>
 <div class="accordion">
    <div class="accordion-text">
      <div class="title">FAQ</div>
    <ul class="faq-text">

    <li>
        <div class="question-arrow">
          <span class="question">What is the website all about?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>The website for Guidance and Counseling at Benguet State University facilitates quick and efficient transactions at GCU.
          <br><br>For students<br> - through the 
      the digitized forms it is now easier for them to request forms such as :
        <br> ✔ admission slip <br>
        ✔ leave of absence slip <br>
        ✔withdrawal, dropping and shifting slip <br>
        ✔ readmission slip. <br>
        <br>
        For teachers,<br>
      -Referring students has become effortless for them with the utilization of the digitized referral slip,
       eliminating the necessity to visit GCU for transactions
      <br>
      <br>
        For Employees,<br>
        - They can now expedite the processing of client requests more efficiently using the website

    
    </p>
        <span class="line"></span>
      </li>

      <li>
        <div class="question-arrow">
          <span class="question">What do you mainly do in the system?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>You have a simple dashboard to read the services rendered by Benguet Sate Univeersity-Guidance and Counseling Unit. 
        The system incorporates a log-in and registration feature, requiring users to register initially if they do not have
         an account before logging in.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">How to know if one is clickable?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Any area that becomes visible and interactive as the cursor hovers and moves over it indicates that it is responsive.</p>
        <span class="line"></span>
      
      <li>
        <div class="question-arrow">
          <span class="question">I'm having technical issues where should I ask help?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>If you have any technical issues or more questions you wish to ask, feel free to contact us directly by filling the form below this FAQ.</p>
        <span class="line"></span>
      </li>
    </ul>
    </div>
  </div>

  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">IT Department</div>
          <div class="text-two">College of Information Sciences</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+63907 905 0664</div>
          <!-- <div class="text-two">+0096 3434 5678</div> -->
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">bsuossgcu205@gmail.com</div>
         
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">SEND US A MESSAGE</div>
        <p>Good Day! If you have any queries, you can send us a message from here.</p>
        <p>It is our pleasure to be of help to you!</p>
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
          <textarea type="text"  id="msg" placeholder="What can we help you with?"></textarea>
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

        <p style="text-align: center; margin: 0; display: block; color:white;">BENGUET STATE UNIVERSITY <br> &copy; <?php echo date("Y"); ?>.
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