<!doctype html>
<?php
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
  // include 'formstyle.php';
  $_SESSION['transact_type'] = 'readmission'; // Assign value to transact_type
?>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <title>Readmission Slip</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Your existing styles here */
    body {
      /* font-family: Arial, sans-serif; */
      background-color: #f4f4f4;
      
      padding: 0;
     
     
      /* background: linear-gradient(
    142deg,
    green  0%,
    black 100%
  ); */
 

      
    }

    .card {
      max-width: 800px;
      margin: 50px auto;
     background:white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 8px;
      box-sizing: border-box;
      
      box-shadow: 0 18px 40px rgba(0, 0, 0, 1); 
      

      animation: fadeInUp 1s ease-in-out; /* Animation */
    }

    .card-header {
      background: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
      border-radius: 8px 8px 0 0;
    }

    .card-body {
      padding: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      font-size:18px;

      font-family: "Century Gothic", sans-serif;
    }

    textarea {
      box-shadow: 0 5px 10px rgba(0, 0, 0, 1); /* Solid black box shadow */
      width: 100%;
      padding: 8px;
      height:200px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      font-family: "Century Gothic", sans-serif;
      font-size:18px;
    }

    .button {
      text-align: center;
    
      
    }

   button {
      padding: 10px 20px;
      background-color: green;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }


    button:hover {
      background-color: #008080;
    }


    .button-container {
      display: flex;
   
      
      
    }
    .button {
      margin-right: 10px; /* Adjust the margin to create space between buttons */
    }



    /* Define the fadeInUp animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo-container {
      display: flex;
      /* text-align: center; */
      
    
      animation: fadeInUp 1s ease-in-out; /* Animation */
    }

    .logo-container img {
      width: 80px;
      height: 80px;
    }
    h1
    {
      margin-left:10px;
      text-align: center;
      font-family: "Century Gothic", sans-serif;


    }
  </style>
</head>

<body>
  <div class="card">
    <!-- Other card content goes here -->
    <div class="logo-container" >
    <img  src="../assets/img/GCU_logo.png" alt="GCU Logo">
   
   <!-- <h1  id="Title" style="font-family: Papyrus, fantasy;">Readmission Slip</h1> -->
 
    <img  style="margin-left:auto" src="../assets/img/bsu.png" alt="BSU Logo">
  </div>
  <hr>

  <h1 stly=" font-family: Consolas;" id="Title" >Readmission Slip</h1>
  <hr>
    <div class="card-body">
      <form id="form_transact" method="post">
        <p>
          <label for="textarea">Reason/s for stopping:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="reason_stop" required></textarea>
        </p>
        <p>
          <label for="textarea">Motivation for enrolling again:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="motivation_enroll" required></textarea>
        </p>
        <div class="button-container">
          <div class="button">
            <p>
              <!-- Change type from submit to button, and use onclick to handle the back button -->
              <button type="button" class="btn btn-primary" onclick="window.location.href='../student-home'">Back</button>
            </p>
          </div>
          <div class="button">
            <p>
              <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
              <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
            </p>
          </div>
        </div>
      </form>
    </div>

    <script>
      function submitForm() {
        // Check if the form is filled before submitting
        if ($('#reason_stop').val() === '' || $('#motivation_enroll').val() === '') {
          alert('Please fill out all fields before submitting.');
        } else {
          // If the form is filled, proceed with AJAX submission
          if (window.confirm("Do you want to proceed?")) {
          $.ajax({
            type: 'POST',
            url: '../../backend/create_transaction.php',
            data: {
              reason: $("#reason_stop").val(),
              motivation: $("#motivation_enroll").val(),
            },
            success: function (data) {
              alert("Request Sent");
            }
          });
        }
        }
      }
    </script>
  </div>
</body>
</html>
