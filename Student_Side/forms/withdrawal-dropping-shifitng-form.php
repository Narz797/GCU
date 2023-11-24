<!doctype html>
<?php
session_start();
include '../../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
$_SESSION['transact_type']='WDS';//asign value to transact_type
logAudit($_SESSION['session_id'], 'access_wds form', $_SESSION['session_id'] .' has accessed the WDS page');
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Withdrawal/Dropping/Shifting slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <style>
    .hidden {
      display: none;
    }
    .autocomplete-container {
    position: relative;
    }
    .autocomplete-popup {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        display: none;
    }
    .autocomplete-popup ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .autocomplete-popup li {
        padding: 5px 10px;
        cursor: pointer;
    }
    .autocomplete-popup li:hover {
        background-color: #f0f0f0;
    }

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

    .button {
      text-align: center;
    
      
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

    /* Style for the select container */
select {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
  font-family: "Century Gothic", sans-serif;

}

/* Style for the select options */
select option {
  background-color: #fff;
  color: #333;
}

/* Style for the select container when focused */
select:focus {
  outline: none;
  border-color: #007bff; /* Change the border color when focused */
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow when focused */
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

  <h1 stly=" font-family: Consolas;" id="Title" >Withdrawal/Dropping/Shifting Slip</h1>
  <hr>

    <!-- <div class="card-header">
      <h1 id="Title">Withdrawal/Dropping/Shifting Slip</h1>
    </div> -->
    <div class="card-body">
      <form id="form_transact" name="form1" method="post">
        <p>
          <label>Select your conern:</label>
          <!-- <label for="select2">:</label> -->
          <select name="select2" id="action">
            
            <option value="Withdrawing Enrollment">Withdrawing Enrollment</option>
            <option value="Dropping Subjects">Dropping Subjects</option>
            <option value="Shifting">Shifting</option>
          </select>
        </p>
        <p>
       
          <label>Reason/s:</label>
          <!-- <label for="textarea">:<br> -->
          </label>
          <textarea name="textarea" class="textarea" id="reason_explain" required ></textarea>
        </p>
        <div class="hidden" id="for-shift">
            <label for="textfield4">Shifting from:</label>
            <div class="autocomplete-container">
                <input type="text" name="textfield4" id="textfield4" onkeyup="showSuggestions('textfield4', 'autocomplete-suggestions1')" autocomplete="off">
                <!-- Create a container to display autocomplete suggestions for the first input -->
                <div id="autocomplete-suggestions1" class="autocomplete-popup"></div>
            </div>
            <label for="textfield5">to:</label>
            <div class="autocomplete-container">
                <input type="text" name="textfield5" id="textfield5" onkeyup="showSuggestions('textfield5', 'autocomplete-suggestions2')" autocomplete="off">
                <!-- Create a container to display autocomplete suggestions for the second input -->
                <div id="autocomplete-suggestions2" class="autocomplete-popup"></div>
            </div>
        </div>
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
              <button type="submit" class="btn btn-primary"  id="submit">Submit</button>
            </p>
          </div>
        </div>


      </form>
      
      <div id="suggestions"></div>
    </div>
  </div>
  <script>
    var sID = "<?php echo $_SESSION['session_id'];?>";
    const dropdown = document.getElementById('action');
    const textfield = document.getElementById('for-shift');
    dropdown.addEventListener('change', function () {
  if (dropdown.value === 'Shifting') {
    textfield.classList.remove('hidden');
  } else {
    textfield.classList.add('hidden');
  }
});
$("#form_transact").on("submit", function (event) {
  event.preventDefault();
  var student_id = <?php echo $_SESSION['session_id']?>;
  var transact_type = "withdrawal";
  var course_frm = dropdown.value === 'Shifting' ? textfield4.value : null;
  var course_to = dropdown.value === 'Shifting' ? textfield5.value : null;
 
  if (window.confirm("Do you want to proceed?")) {
  $.ajax({
    type: 'POST',
    url: '../../backend/create_transaction.php',
    data: {
      reason: $('#action').find(":selected").val(),

      explain: $("#reason_explain").val(),
      course_frm: course_frm,
      course_to: course_to
    },
    success: function (data) {
      $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: sID,
              action: 'sent request',
              details: sID + ' sent WDS request' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
      alert("Request Sent");

    }
  });
}
});
   
  </script>
  <script>
     // autcomplete
     function showSuggestions(inputId, suggestionContainerId) {
    var input = document.getElementById(inputId);
    var inputValue = input.value;
    var suggestionsDiv = document.getElementById(suggestionContainerId);
    if (inputValue.length === 0) {
        suggestionsDiv.style.display = "none";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var suggestions = JSON.parse(xmlhttp.responseText); // Assuming your suggestions are returned as a JSON array
            displaySuggestions(suggestions, suggestionsDiv, input);
        }
    };
    xmlhttp.open("GET", "../../backend/autocomplete.php?input=" + inputValue, true);
    xmlhttp.send();
}
function displaySuggestions(suggestions, suggestionsDiv, input) {
    if (suggestions.length === 0) {
        suggestionsDiv.style.display = "none";
        return;
    }
    suggestionsDiv.innerHTML = ""; // Clear previous suggestions
    var ul = document.createElement("ul");
    suggestions.forEach(function (suggestion) {
        var li = document.createElement("li");
        li.textContent = suggestion;
        li.addEventListener("click", function () {
            input.value = suggestion; // Fill in the input field with the selected suggestion
            suggestionsDiv.style.display = "none"; // Hide the suggestions
        });
        ul.appendChild(li);
    });
    suggestionsDiv.appendChild(ul);
    suggestionsDiv.style.display = "block"; // Show the suggestions
}
// Add an event listener to textfield4
var textfield4 = document.getElementById('textfield4');
textfield4.addEventListener('input', function () {
    this.value = this.value.toUpperCase();
});
// Add an event listener to textfield5
var textfield5 = document.getElementById('textfield5');
textfield5.addEventListener('input', function () {
    this.value = this.value.toUpperCase();
});
  </script>


</body>
</html>