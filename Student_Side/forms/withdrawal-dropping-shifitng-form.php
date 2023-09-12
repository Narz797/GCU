<!doctype html>
<?php
session_start();
include 'formstyle.php';
$_SESSION['transact_type']='withdrawal';//asign value to transact_type
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

  </style>

</head>

<body>

  <div class="card">
    <div class="card-header">
      <h1 id="Title">Withdrawal/Dropping/Shifting Slip</h1>
    </div>
    <div class="card-body">
      <form id="form_transact" name="form1" method="post">
        <p>
          <label>Reason</label>
          <label for="select2">:</label>
          <select name="select2" id="action">
            <option value="Withdrawing Enrollment">Withdrawing Enrollment</option>
            <option value="Dropping Subjects">Dropping Subjects</option>
            <option value="Shifting">Shifting</option>
          </select>
        </p>
        <p>
          <label for="textarea2">State your Reason/s:
          </label><br>
          <textarea name="textarea2" class="textarea" id="reason_state"></textarea>
        </p>
        <p>
          <label>Reason/s for withdrawing enrollment/ dropping subject/s / shifting</label>
          <label for="textarea">:<br>
          </label>
          <textarea name="textarea" class="textarea" id="reason_explain"></textarea>
        </p>
        <div class="hidden" id="for-shift">
            <label>Shifting from</label>
            <label for="textfield4">:</label>
            <div class="autocomplete-container">
                <input type="text" name="textfield4" id="textfield4" onkeyup="showSuggestions('textfield4', 'autocomplete-suggestions1')">
                <!-- Create a container to display autocomplete suggestions for the first input -->
                <div id="autocomplete-suggestions1" class="autocomplete-popup"></div>
            </div>

            <label>to</label>
            <label for="textfield5">:</label>
            <div class="autocomplete-container">
                <input type="text" name="textfield5" id="textfield5" onkeyup="showSuggestions('textfield5', 'autocomplete-suggestions2')">
                <!-- Create a container to display autocomplete suggestions for the second input -->
                <div id="autocomplete-suggestions2" class="autocomplete-popup"></div>
            </div>
        </div>



        <p>
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
        </p>
      </form>
      
      <div id="suggestions"></div>

    </div>
  </div>
  <script>
    const dropdown = document.getElementById('action');
    const textfield = document.getElementById('for-shift');

    dropdown.addEventListener('change', function () {
      if (dropdown.value === 'Shifting') {
        textfield.classList.remove('hidden');
      } else {
        textfield.classList.add('hidden');
      }
    });
  </script>
  <script>
    $("#form_transact").on("submit", function (event) {
      event.preventDefault();
      var student_id = <?php echo $_SESSION['session_id']?>;
      var transact_type = "withdrawal"

      $.ajax({
        type: 'POST',
        url: '../../backend/create_transaction.php',
        data: {
          reason: $('#action').find(":selected").val(),
          statement: $('#reason_state').val(),
          explain: $("#reason_explain").val()
        },
        success: function (data) {
          alert(data);

        }
      });
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
            suggestionsDiv.innerHTML = xmlhttp.responseText;
            suggestionsDiv.style.display = "block";
        }
    };

    xmlhttp.open("GET", "../../backend/autocomplete.php?input=" + inputValue, true);
    xmlhttp.send();
}

document.addEventListener("keydown", function (event) {
    if (event.key === "Tab") {
        var activeSuggestion = document.querySelector(".autocomplete-popup li:hover");
        if (activeSuggestion) {
            var inputId = activeSuggestion.parentElement.id.replace("autocomplete-suggestions", "textfield");
            var suggestionText = activeSuggestion.innerText;
            document.getElementById(inputId).value = suggestionText;
            event.preventDefault(); // Prevent the default tab behavior
        }
    }
});


  </script>
</body>

</html>