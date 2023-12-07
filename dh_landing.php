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
<header class="header">
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

</style>
    <!-- Welcome-message -->
<section>
<?php include 'includes/banner.php' ?>
    <div class="block"> 
    </div>
 <div class="accordion">
    <div class="accordion-text">
      <div class="title">FAQ</div>
    <ul class="faq-text">
      <li>
        <div class="question-arrow">
          <span class="question">What do you mainly do in the system?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>You have a simple dashboard for monitoring requested forms and appointed counseling. The system having atleast four Actions to be taken.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">How to know if one is clickable?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Anything that the cursor hovers and changes color means that that area in display is responsive.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">From where should I add remarks regarding a students?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>You can add remarks or comment regarding a student on the "Student Profiles" page.</p>
        <p>Student Profiles > View > Add Notes</p>
        <p>You can also add remarks on a student's specific transacted form/slip or edit a student's specific appointment.</p>
        <p>Student Profiles > View > Add Remarks Table or Edit Table</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">Where can I change my display to dark mode/light mode?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>You can switch to dark mode or light mode with the icon on your top right corner screen.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">Can I export my data?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Yes, Certainly. All tables in the system has an export function. You can export your data as an excel or a pdf.</p>
        <span class="line"></span>
      </li>
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
          <div class="text-one">+0098 9893 5647</div>
          <div class="text-two">+0096 3434 5678</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">bsit2024@gmail.com</div>
          <div class="text-two">nichole00@gmail.com</div>
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
<footer id="footer" class="footer">
    <div class="foot" id="footercopyright">
        <div class="copyright">
            <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
        </div>
        <div class="credits">Designed by <a class="dev" href="https://www.facebook.com/BSUCollegeofInformationSciences">BSIT</a></div>
    </div>
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