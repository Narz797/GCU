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
            nav a {
                display: block;
                margin: 1em 0;
            }

            main {
                padding: 1em;
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

       
        <a href="#getting-started">Getting Started</a>
        <a href="#account">Account</a>
        <a href="#troubleshooting">Troubleshooting</a>
        <a href="#contact">Contact Us</a>
        <a  href="Student_Side/student-home" class="logout">Logout</a>
    </nav>

    <div class="row">
        <div class="column" style="background-color:white;">
            <h2>TRANSACTION</h2>
            <main>
        <section id="getting-started">
            <h2>Getting Started</h2>
            <p>Welcome to our platform! Follow these steps to get started:</p>
            <ol>
                <li>Choose transaction</li>
                <li>Fill Up the form</li>
                <li>Submit the form</li>
                <li>Wait for the reply of the Guidance and Counseling Unit through text.</li>

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
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>If you need help or have any questions, feel free to contact our support team at bsuossgcu205@gmail.com / 0907 905 0664 / Guidance & Counseling Unit - Benguet State University (FB PAGE).</p>
        </section>
    </main>
        </div>
        <div class="column" style="background-color:#bbb;">
            <h2>APPOINTMENT</h2>
            <main>
        <section id="getting-started">
            <h2>Getting Started</h2>
            <p>Welcome to our platform! Follow these steps to get started:</p>
            <ol>
                <li>Choose date of appointment</li>
                <li>Book the available date and time.</li>
                <li>State your reason for setting an appointment.</li>
                <li>Submit your transaction.</li>
                <li>Wait for the reply of the Guidance and Counseling Unit through text.</li>

            </ol>
        </section>

        <section id="account">
            <h2>Account</h2>
            <p>If you are facing issues with your account, please check the following:</p>
            <ul>
                <li>Ensure that you are the person who logs in with that account</li>
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
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>If you need help or have any questions, feel free to contact our support team at bsuossgcu205@gmail.com / 0907 905 0664 / Guidance & Counseling Unit - Benguet State University (FB PAGE).</p>
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
