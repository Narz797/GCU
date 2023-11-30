<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Page</title>
    <link href="./assets/img/GCU_logo.png" rel="icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header, nav, main, footer {
            padding: 1em;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        nav {
            background-color: #444;
            color: #fff;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
        }

        main {
            padding: 2em;
            
        }

        section {
            margin-bottom: 2em;
            
        }

        h2 {
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        

        /* Media Query for Responsive Design */
        @media only screen and (max-width: 600px) {
   

   main {
       padding: 1em;
   }

   .column {
       width: 100%;
   }

   .row {
       font-size: 10px;
       display: flex;
   }
   section {
       margin-bottom: 1em;
   }
   h2 {
       font-size: 1.5em;
   }
   .banner-container img {
       width: 15%;
   }
   .banner-text h5 {
       font-size: 2vw;
   }
   .banner-text h2 {
       font-size: 3vw;
   }
   .banner-text h1 {
       font-size: 4vw;
   }
   .users .card {
       width: 100%;
       margin: 10px 0;
   }
   .slip {
       width: 100%;
   }
}

        .logout {
  background-color: #4CAF50; /* Green background color */
  border: none; /* No borders */
  color: white; /* White text color */
  padding: 10px 20px; /* Padding for better appearance */
  text-align: center; /* Center text within the button */
  text-decoration: none; /* Remove underlines from the link */
  display: inline-block; /* Display as an inline element */
  font-size: 16px; /* Set font size */
  cursor: pointer; /* Add a pointer cursor on hover */
  border-radius: 5px; /* Add rounded corners */
}

/* Hover effect */
.logout:hover {
  background-color: #2980b9;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

* {
  box-sizing: border-box;
  
 
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;

  
  height: auto; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
 
}
    </style>
</head>
<body>


    <header>
        <h1>Help Center</h1>
    </header>

    <nav>

<!--        
        <a href="#getting-started">Getting Started</a>
        <a href="#account">Account</a>
        <a href="#troubleshooting">Troubleshooting</a> -->
        <!-- <a href="#contact">Contact Us</a> -->
        <a  href="Teacher_Side/index.php" class="logout">Back</a>
    </nav>

    <div class="row">
        <div class="column" style="background-color:white;">
        <h2>Getting Started</h2>
            <main>
        <section id="getting-started">
            
            <h2>What To Do?</h2>
            <br>
            <p>Welcome to our platform! Follow these steps to get started:</p>
            <ol>
                <li>Fill up the referral slip with the required stuent information.</li>
                <li>Once you are done, click the Refer button</li>
                <li>The GCU has successfully received your referred student!</li>
                <li>Check the update of progress in the Status column in the table below</li>

            </ol>
        </section>

        <section id="account">
            <h2>Account</h2>
            <p>If you are facing issues with your account, please check the following:</p>
            <ul>
                <li>Ensure that you are the person who logs in with that account.</li>
                <li>Log out if you are not the person, as it may lead to dismissal from the school.</li>
            </ul>
        </section>

        <section id="troubleshooting">
            <h2>Troubleshooting</h2>
            <p>If you encounter any issues while using our platform, try the following:</p>
            <ul>
                <li>Clear your browser cache</li>
                <li>Update your browser to the latest version</li>
                <li>Contact support for further assistance</li>
            </ul>
            <br> 
        </section>

    </main>
        </div>
        <div class="column" style="background-color:#bbb;">
            <h2>OTHERS</h2>
            <main>
        <section id="getting-started">
            <h2>Getting More</h2>
            <p>Wonder what you can do with the platform?</p>
            <ol>
                <li>In your profile account, you can edit your information by clicking the Edit button.</li>
                <li>A pop-up will show where you can change your information. Fill up the form.</li>
                <li>Submit the form or Click exit.</li>
                <li>Yay! Your have successfully edited your information.</li>

            </ol>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>Need assistance or inquiry about the platform?</p>
            <p>Contact us through the following</p>
            <ul>
                <li>gcu@gmail.com</li>
                <li>facebook.gcu.com</li>
                <li>0000-0000-0000</li>
            </ul>
            <h2>About Us</h2>
            <p>This platform was created by the College of Information Sciences <Br> dedicated fot the use of the Guidance Counseling Unit of Benguet State University </p>
            <br> 
            <br> 
        </section>
      
    </main>
        </div>
    </div>

    

    <footer>
        <p>&copy; 2023 Benguet State University - Guidance and Counseling Unit. All rights reserved.</p>
    </footer>

    <script>
        function goToHomePage() {
            // Replace '#' with the actual URL of your home page
            window.location.href = '#';
        }
    </script>

</body>
</html>
