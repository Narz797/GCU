<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Digital Help </title>
    <link rel="stylesheet" href="assets/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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
            <a href="./index.php" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="align-right">
            <button class="icon-btn place-items-center" value="logout" onclick="goBack()">
                <i class="bx bxs-chevron-left"> Back</i>
            </button>
        </div>
    </nav>
</header>
    <!-- Welcome-message -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
            <img src="assets/images/GCU_logo.png" alt="">
            <div class="banner-text">
                <h5>REPUBLIC OF THE PHILIPPINES</h5>
                <hr class="banner-line">
                <h2><span>BENGUET STATE UNIVERSITY</span></h2>
                <h1>GUIDANCE AND COUNSELING UNIT</h1>
            </div>
        </div>
    </section>
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
      <form id="send_help" method="post">
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <div class="input-box1">
          <textarea type="text" placeholder="What can we help you with?"></textarea>
        </div>
        </div>
        <div class="button">
          <input type="button" value="Send Now" >
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
        <div class="credits">Designed by <a class="dev" href="https://www.facebook.com/">BSIT</a></div>
    </div>
</footer>

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
    $("#loading-spinner").show();
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/forgot_pass.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        $("#loading-spinner").hide();
        if (data === "unregistered") {
          alert("This Email in not registered, please use a registered email")
          console.log(data);
          
        } else {
          alert("The code to change your password is sent to your email")
        console.log(data)
        window.location.href = "verify_code.php";
        }

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