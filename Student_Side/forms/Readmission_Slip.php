<!doctype html>
<?php
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
include 'formstyle.php';
$_SESSION['transact_type']='readmission';//asign value to transact_type
?>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <title>Readmission Slip</title>
</head>
<body>
  <div class="card">
    <h1 id="Title" class="card-header">Readmission Slip</h1>
    <div class="card-body">
      <form id="form_transact" method="post">
        <p>
          <label for="textarea">Reason/s for stopping:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="reason_stop"></textarea>
        </p>
        <p>
          <label for="textarea">Motivation for enrolling again:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="motivation_enroll"></textarea>
        </p>
        <div class="button">
          <p>
            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
          </p>
        </div>
      </form>
      <div>
      </div>
      <script>
        $("#form_transact").on("submit", function (event) {
          event.preventDefault();
          $.ajax({
            type: 'POST',
            url: '../../backend/create_transaction.php',
            data: {
              reason: $("#reason_stop").val(),
              motivation: $("#motivation_enroll").val(),
            },
            success: function (data) {
              //alert('Successfull');
              alert(data);
            }
          });
        }); 
      </script>
</body>
</html>