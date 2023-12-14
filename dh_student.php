<?php
  session_start();
  
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Digital Help </title>
    <link rel="stylesheet" href="assets/css/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Remix icons -->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   </head>
<body>
  <!-- Header -->
  <header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/img/GCU_logo.png" alt="">
        </div>
        <div class="nav-mobile">
            <div class="list">
                <div class="list-item">
                  <button onclick="goBack()" class="list-link current">BACK</button>
                </div>
            </div>
        </div>
        <div class="align-right">
            <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center" onclick="goBack()" class="list-link current">
            <i class="ri-arrow-left-circle-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
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
          <span class="question" style="font-family: 'Poppins' , sans-serif;">What is the transaction page all about?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">Transaction page is designed to request forms to the GCUS such as: <br>
            ✔ Readmission <br>
            ✔ Withdrawal/Dropping/Shifting <br>
            ✔ Admission <br>
            ✔ Leave of Absence <br>
            ✔ Admission <br>
        </p>
        <span class="line"></span>
      </li>

      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">What is the appointment page all about?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">The appointment page is created for scheduling appointment such as counseling, academic couching to the Guidance and Counseling Unit.
        </p>
        <span class="line"></span>
      </li>

      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">What do you mainly do in the system?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">You have a simple dashboard to read the services rendered by Benguet Sate Univeersity-Guidance and Counseling Unit. 
        The system incorporates a log-in and registration feature, requiring users to register initially if they do not have
         an account before logging in.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">How to know if one is clickable?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">Any area that becomes visible and interactive as the cursor hovers and moves over it indicates that it is responsive.</p>
        <span class="line"></span>
      
      <li>
        <div class="question-arrow">
          <span class="question" style="font-family: 'Poppins' , sans-serif;">I'm having technical issues where should I ask help?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p style="font-family: 'Poppins' , sans-serif;">If you have any technical issues or more questions you wish to ask, feel free to contact us directly by filling the form below this FAQ.</p>
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
    var eID = "<?php echo $_SESSION['session_id'];?>";
     function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + ' Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = 'home';
}
  });
}
function goBack() {
            window.history.back();
        }

        
    var tID = "<?php echo $_SESSION['session_id'];?>";
  

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