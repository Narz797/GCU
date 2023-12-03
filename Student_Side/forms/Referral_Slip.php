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
$_SESSION['transact_type'] = 'ca'; //asign value to transact_type
logAudit($_SESSION['session_id'], 'access_class admisison form', $_SESSION['session_id'] .' has accessed the class admission page');
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Admission Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">

   <!-- Bootstrap CSS and JS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- jQuery UI and Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Font Awesome and Remix Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    
</head>
<style>

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
    font-size: 18px; /* Adjust the font size as needed */
  }

  /* Hide the default file input button */
input[type="file"] {
  display: none;
}

/* Style the custom button */
label[for="fileUpload"] {
  background-color:#009000;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  display: inline-block;
  font-size: 18px; /* Adjust the font size as needed */

}

/* Optional: Add hover effect */
label[for="fileUpload"]:hover {
  background-color:#008080;
  font-size: 18px; /* Adjust the font size as needed */

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

    /* .button {
      text-align: center;
    
      
    } */

   /* button {
      padding: 10px 20px;
      background-color: green;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    } */


    /* button:hover {
      background-color: #008080;
    } */


    .button-container {
      display: flex;
   
      
      
    }
    .button {
      margin-right: 10px; 
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
      font-weight: bold;

    }

    /* Style for the label */
/* label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  font-size: 18px;
} */

/* Style for the container of date inputs */
.date-range-container {
  display: flex;
  gap: 20px;
}

/* Style for each date input */
.date-input {
  flex: 1;
}

/* Style for date inputs */
input[type="date"] {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
  margin-top: 4px;
  font-size:18px;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);

}

/* input[type="date"]:focus {
  outline: none;
  border-color: #007bff;
  font-size:18px;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
} */

/* Style for the container of the reason dropdown */
.reason-dropdown-container {
  margin-top: 8px;
}

/* Style for the reason dropdown */
select {
  padding: 8px;
  font-size: 18px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
}

/* Style for the reason dropdown when focused */
select:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}


    /* Create a two-column layout using flexbox */
    .two-columns {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    /* Style for each column */
 
    div {
      margin-bottom: 10px;
    }

    .column {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    input {
      margin-right: 5px; /* Optional: Add some space between the radio button and the label */
      width: 20px; /* Set a fixed width for the radio button */
    }

    label {
      flex-grow: 1; /* Allow labels to grow and take up remaining space */
    }
    .hidden {
      display: none;
    }

    .reminder-container {
      display: flex;
      align-items: center;
    }

    .icon {
      font-size: 20px;
      margin-right: 10px;
      /* margin-right: 20px; */
    }

    .btn{
      background-color: #0039a6;
      color: white;
    }

    .btn:hover{
      background-color: #318CE7;
      color: white;
    }
    


   






  
 

</style>
<body>
  <div class="card">
  <div class="logo-container" >
    <img  src="../assets/img/GCU_logo.png" alt="GCU Logo">
   
   <!-- <h1  id="Title" style="font-family: Papyrus, fantasy;">Readmission Slip</h1> -->
 
    <img  style="margin-left:auto" src="../assets/img/bsu.png" alt="BSU Logo">
  </div>
  <hr>

  <h1 id="Title" style="font-family: fantasy; color: black; ">Admission Slip</h1>
  <hr>

    <div class="card-body">
      <form id="form_transact" name="form1" action="../../backend/create_transaction.php" method="post" enctype="multipart/form-data">

<b style="font-family: Century Gothic, sans-serif; font-size:18px;">Late Or Absent:</b><br>

<div class="reason-dropdown-container">
  <select name="textfield" id="refer">
  <option disabled selected>Select</option>
    <option value="Tardy">Late</option>
    <option value="Absent">Absent</option>
   
  </select>
</div>

<br>
<p></p>
<br>
<div class="date-range-container" id="dates">
  <div class="date-input">

    <label for="Date">Number of Days:</label>
    <div class="input-group date form-group" id="datepicker">
            <input type="text" class="form-control" id="Date" name="Date" placeholder="Select days"  style="width: 50%;" autocomplete="off"/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i><span class="count"></span></span>
        </div>
  </div>
</div>


<div id="COA">
<b style="font-family: Century Gothic, sans-serif; font-size:18px;">Reason:</b><br>
    <input type="radio" id="health" name="concern" value="health"> Health-related concerns
    <br>

    <input type="radio" id="personal" name="concern" value="personal"> Personal Concerns
    <br>

    <input type="radio" id="socio-cultural" name="concern" value="socio-cultural"> Socio-Cultural Concerns
    <br>

    <input type="radio" id="behavioral" name="concern" value="behavioral"> Behavioral
    <br>

    <input type="radio" id="filial" name="concern" value="filial"> Filial Responsibilities
    <br>

    <input type="radio" id="environmentalRadio" name="concern" value="environmental"> Environmental
    <br>

    <input type="radio" id="officialActivityRadio" name="concern" value="officialActivity" > Official co/extra-curricular activity
 
      <input type="text" id="officialActivitySpecify" class="hidden" name="specify" style="width: 100%;" placeholder="Please Specify">

<br>
    <input type="radio" id="otherRadio" name="concern" value="others" > Others

    
    <input type="text" id="otherSpecify" class="hidden" name="specify" style="width: 100%;"placeholder="Please Specify">
    <br>
</div>
  <div class="form1" id="rem">
          <label for="remark">Reason:</label><br>
          <input type="text"id="remark" name="remark"  style="width: 100%;">


        </div>
  
       
<p></p>
<br>
      <label for="fileUpload">Upload Required Files</label>
      <input type="file" id="fileUpload" name="fileUpload[]" required>
      <br>
   
      <div class="reminder-container">
  <i class="fas fa-exclamation-circle icon"></i>
  <p style="margin-top: 12px; font-size: 12px; font-weight: bold;">Reminder: Zip multiple files before uploading them.</p>
</div>


  <br>
  <br>
          <br>

  <div class="button-container">
          <div class="button">
            <p>
              <!-- Change type from submit to button, and use onclick to handle the back button -->
              <button type="button"  class="btn" onclick="window.location.href='../student-home'">Back</button>
            </p>
          </div>
         
          <div class="button">
            <p>
              <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
              <button type="submit" class="btn" id ="submit">Submit</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      var sID = "<?php echo $_SESSION['session_id'];?>";
      var LA = $("#dates");
    var AO = $("#rem");
    var COA = $('#COA');
    var selectedConcern;
    var sID = "<?php echo $_SESSION['session_id'];?>";
    
    $(".hidden").hide();
    LA.hide();
    AO.hide();
    COA.hide();

    function validateForm() {
        var fileInput = document.getElementById('fileUpload');

        if (fileInput.files.length === 0) {
            alert('Please select a file');
            return false; // Prevent form submission
        }

        // Your additional validation logic can go here if needed

        return true; // Allow form submission
    }

    function logSelectedConcern() {
        var radioButtons = document.getElementsByName("concern");
       
    
      
        for (var i = 0; i < radioButtons.length; i++) {
          if (radioButtons[i].checked) {
            selectedConcern = radioButtons[i].value;
            console.log("Selected concern: " + selectedConcern);

            if (selectedConcern == "officialActivity"){
              $("#officialActivitySpecify").show();
              $("#otherSpecify").hide();
              $("#otherSpecify").val("");

            }else if (selectedConcern == "others"){
              $("#otherSpecify").show();
              $("#officialActivitySpecify").hide();
              $("#officialActivitySpecify").val("");
       
            }
            else{
              $(".hidden").hide();
              $("#officialActivitySpecify").val("");
              $("#otherSpecify").val("");
            }
            return;
          }
        }

        // If no radio button is checked
        console.log("No concern selected");
      }
      
      // Attach the function to the change event of the radio buttons
      var radioButtons = document.getElementsByName("concern");
      for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener("change", logSelectedConcern);
      }

    $("#refer").change(function() {
      
      var dateInput = document.getElementById('Date');
      var remInput = document.getElementById('remark');

      if ($(this).val() == "Absent") {
        LA.show();
        COA.show();
        AO.hide();
        $("#remark").val("");
        dateInput.setAttribute('required', 'required');
        remInput.removeAttribute('required');
      }
      else if ($(this).val() == "Tardy") {
        LA.show();
        COA.hide();
        AO.hide();
        selectedConcern = "";
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#remark").val("");
        dateInput.setAttribute('required', 'required');
        remInput.removeAttribute('required');
        var radioButtons = document.getElementsByName('concern');

        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].checked = false;}
        
            var textInputs = document.getElementsByName('specify');

        for (var i = 0; i < textInputs.length; i++) {
            textInputs[i].value = '';
        }


      } else if ($(this).val() == "Academic Deficiency/ies") {
        LA.hide();
        COA.hide();
        AO.show();
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#Date").val("");
        dateInput.removeAttribute('required');
        remInput.setAttribute('required', 'required');
      } else {
        LA.hide();
        COA.hide();
        AO.hide();
        $("#remark").val("");
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#Date").val("");
      }
    });

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
    
    var formData = new FormData(this);
    var date = document.getElementById("Date").value;
    var oth = selectedConcern;
    var ECspecifics = $("#officialActivitySpecify").val();
    var OTHspecifics = $("#otherSpecify").val(); 
    var specifics;

    if (ECspecifics !== undefined && ECspecifics !== null && ECspecifics.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'rem' has a non-empty value:", ECspecifics);
                  specifics = ECspecifics
                } else if (OTHspecifics !== undefined && OTHspecifics !== null && OTHspecifics.trim() !== ""){
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'rem' has a non-empty value:", OTHspecifics);
                  specifics = OTHspecifics
                }
                else{
                  specifics = "";
                }

    var student_id = <?php echo $_SESSION['session_id'] ?>;
    var transact_type = "AT";
    var selectedReasons = $("#refer").val();
    var remarks = $("#remark").val();
    console.log("Specs", specifics);
    formData.append('date', date);
    formData.append('transact_type', transact_type);
    formData.append('selectedReasons', selectedReasons);
    formData.append('COA', oth);
    formData.append('specs', specifics);
    formData.append('rem', remarks);
    var files = document.getElementById('fileUpload').files;

    // Loop through the selected files to determine their types
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileExtension = file.name.split('.').pop();

        // Save the file extension to the FormData object
        formData.append('file_' + i + '_extension', fileExtension);

        // Determine the file type and add it to the FormData
        let fileType;
        if (fileExtension === 'pdf') {
            fileType = 'application/pdf';
        } else if (fileExtension === 'docx') {
            fileType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        } else if (fileExtension === 'jpg' || fileExtension === 'jpeg') {
            fileType = 'image/jpeg';
        }else if (fileExtension === 'png') {
            fileType = 'image/png';
        } else if (fileExtension === 'rar') {
            fileType = 'rar';
        }else if (fileExtension === 'zip') {
            fileType = 'zip';
        }// Add more cases for other file types

        if (fileType) {
            formData.append('file_' + i, file, 'file_' + i + '.' + fileExtension);
        } else {
            console.log('Unsupported file:', file.name);
        }
    }
    Swal.fire({
      title: "Do you wish to proceed?",
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
        url: '../../backend/create_transaction.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: sID,
              action: 'sent request',
              details: sID + ' sent Class Admission request' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          // alert("Request Sent");
          Swal.fire({
  title: "Request Sent!",
  // text: "You clicked the button!",
  icon: "success"
});

        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
        }
    });
  }
  });
    
});
$(document).ready(function() {

  $('#datepicker').datepicker({
        startDate: new Date(2000, 0, 1), // Update this to an earlier date
        multidate: true,
        format: "dd/mm/yyyy",

        // Remove or adjust the following line if needed
        // datesDisabled: ['31/08/2017'],
        language: 'en'
    }).on('changeDate', function(e) {
        // `e` here contains the extra attributes
        $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    });
});
  </script>

<script>

  </script>
</body>
</html>