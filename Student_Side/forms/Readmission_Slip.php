<!doctype html>
<?php 
session_start();
include '../../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'You already logged out',
                text: 'Please login again'
            }).then(function () {
                window.location.href = 'http://localhost/GCU/home';
            });
        });
    </script>
    <?php
    exit;
}
// include 'formstyle.php';
$_SESSION['transact_type']='readmission';//asign value to transact_type 
logAudit($_SESSION['session_id'], 'access_readmission form', $_SESSION['session_id'] .' has accessed the readmission page');
?>
<html>
<head>
  <title>Readmission Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
</head>
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
    /* Style for the container of semester and year inputs */
.semester-year-container {
  display: flex;
  gap: 10px;
  align-items: center;
}

/* Style for the semester dropdown */
select {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 200px; /* Adjust the width as needed */
  box-sizing: border-box;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 1); /* Solid black box shadow */
}
option{
  font-family: "Century Gothic", sans-serif;
  font-size: 16px;

}

/* Style for the container of year inputs */
.year-input-container {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
 

}

/* Style for the group of year inputs and label */
.year-input-group {
  display: flex;
  align-items: center;
}

/* Style for the year labels */
label, span {
  margin-right: 5px;
}

/* Style for the year inputs */
.year-input {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 80px; /* Adjust the width as needed */
  box-sizing: border-box;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 1); /* Solid black box shadow */

}

/* Style for the year inputs when focused */
.year-input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}




  </style>
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
        <label for="select2">Semester and School Year Intended to Come Back:</label>

<div class="semester-year-container">
  <select name="select2" id="semester">
    <option value="1">First Semester</option>
    <option value="2">Second Semester</option>
  </select>

  <label>Year:</label>
  <!-- <input type="number" placeholder="YYYY" id="start_year" class="year-input" name="datepicker" id="datepicker"> -->
  <input type="text" class="form-control" name="datepicker" id="datepicker"  required/>
  <label>-</label>
  <!-- <input type="number" placeholder="YYYY" id="end_year" class="year-input"> -->
  <input type="text" class="form-control" name="datepicker" id="datepicker2"  required/>

  
</div>
<br>
<br>

        </p>
        <p>
        <label for="textarea">Reason/s for stopping:</label>
        </p>
        <p>
<!-- Corrected code -->
        <textarea name="textarea" class="textarea" id="reason_stop" required></textarea>
        </p>
        <p>
        <label for="textarea">Motivation for enrolling again:</label>
        </p>
        <p>
<!-- Corrected code -->
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
              <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>
    $("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>
  
  

  
  <script>
        var sID = "<?php echo $_SESSION['session_id'];?>";
      function submitForm() {
        // Check if the form is filled before submitting
        if ($('#reason_stop').val() === '' || $('#motivation_enroll').val() === '') {
          alert('Please fill out all fields before submitting.');
        } else {
          // If the form is filled, proceed with AJAX submission
    //       Swal.fire({
    //   title: "Are you sure?",
    //   text: "Do you wish to proceed?",
    //   icon: "question",
    //   showCancelButton: true,
    //   confirmButtonColor: "#3085d6",
    //   cancelButtonColor: "#d33",
    //   confirmButtonText: "Yes"
    // }).then((result) => {
    //   if (result.isConfirmed) {
      Swal.fire({
      title: "Do you wish to proceed?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
     
              // })
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: '../../backend/create_transaction.php',
            data: {
              reason: $("#reason_stop").val(),
              motivation: $("#motivation_enroll").val(),
              sem: $("#semester").val(),
              frm:$("#datepicker").val(),
              to:$("#datepicker2").val()
            },
            success: function (data) {
              // swal({
              //         title:'Form requested',
              //         icon: 'success',
              //         showConfirmButton: false,
              //         timer:1500
              // })

 


              $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: sID,
              action: 'sent request',
              details: sID + ' sent Readmission request' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          Swal.fire({
  title: "Request Sent!",
  // text: "You clicked the button!",
  icon: "success"
});
            }
          });
        }
        });
        }
      }
    </script>

</body>
</html>