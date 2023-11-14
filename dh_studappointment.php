<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Page</title>
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

    <main>
        <section id="getting-started">
            <h2>Getting Started</h2>
            <p>Welcome to our platform! Follow these steps to get started:</p>
            <ol>
                <li>Choose transaction</li>
                <li>Fill Up the form</li>
                <li>Submit the form</li>
                <li>Wait for the reply of the Guidance and Counseling Unit.</li>

            </ol>
        </section>

        <section id="account">
            <h2>Account</h2>
            <p>If you are facing issues with your account, please check the following:</p>
            <ul>
                <li>Ensure your username and password are correct</li>
                <li>Contact support if you forgot your password</li>
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
            <p>If you need help or have any questions, feel free to contact our support team at bsu.edu.com.</p>
        </section>
    </main>

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
