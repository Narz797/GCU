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
$_SESSION['transact_type'] = 'ca'; //asign value to transact_type
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Feedback Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
</head>
<style>
  #back_button{
  padding: 10px 30px;
  float: left; /* Adjusted the float property */
  position: fixed; /* Fixed position so it stays in place */
  top: 10px; /* Positioned at the top */
  left: 50px; /* Positioned at the left */
  z-index: 1000;
  background-color:#105c06;
}

label {
    display: block;
    margin-bottom: 5px;
  }

  /* Style the date input */
  input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px; /* Adjust the font size as needed */
  }

  /* Hide the default file input button */
input[type="file"] {
  display: none;
}

/* Style the custom button */
label[for="fileUpload"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  display: inline-block;
}

/* Optional: Add hover effect */
label[for="fileUpload"]:hover {
  background-color: #45a049;
}
label {
  display: block;
  margin-bottom: 10px;
}

input[type="radio"] {
  margin-right: 5px;
}

/* Optional: Add styles for selected radio button */
input[type="radio"]:checked + span {
  font-weight: bold;
  color: #007bff; /* Change color as needed */
}


  
 

</style>
<body>
  <div class="card">
    <div class="card-header">
      <h1 id="Title">Late or Absent Slip</h1>
    </div>
    <div class="card-body">
      <form id="form_transact" name="form1" method="post">
       
     

      <label for="date">Range of days absent/tardy:</label><br>
          <!-- id = date -->
          <label for="date">From:</label>
          <input type="date" id="fromDate" name="fromDate" required>
          <label for="date">To:</label>
          <input type="date" id="toDate" name="toDate" required>
       
<br>
<p></p>
<br>
        <b>Reason:</b>
        <br>
          <label for="textfield"></label>
          <select name="textfield" id="refer">
            <option value="Late">Late</option>
            <option value="Absent">Absent</option>
            <option value="Academic Deficiency/ies">Academic Deficiency/ies</option>
          </select>
        
        <br>
        <br>
<p></p>
<br>

        <label for="fileUpload">Upload Required Files</label>
        <input type="file" id="fileUpload" name="fileUpload" multiple>
  <br>

        <p>
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
        </p>
      </form>
    </div>
  </div>
  <script>
    function myFunction() {
      var checkBox2 = document.getElementById("others");
      var text2 = document.getElementById("oth");
      if (checkBox2.checked == true) {
        text2.style.display = "block";
      } else {
        text2.style.display = "none";
      }
    }
  </script>
  <script>
    $("#form_transact").on("submit", function (event) {
      event.preventDefault();
      var fromDate = document.getElementById("fromDate").value;
    var toDate = document.getElementById("toDate").value;

    var dateRange = fromDate + ' to ' + toDate; // Concatenate the dates

    console.log(dateRange); // Check in the console
      var student_id = <?php echo $_SESSION['session_id'] ?>;
      var transact_type = "AT"
      var selectedReasons = $("input[name='reasons[]']:checked").map(function () {
        return $(this).val();
      }).get();
      $.ajax({
        type: 'POST',
        url: '../../backend/create_transaction.php',
        data: {
          reasons: $('#refer').val(),
          date: dateRange,
          files: $('#fileUpload').val(),
         
        },
        success: function (data) {
          alert(data);
        }
      });
    });
  </script>
</body>
</html>