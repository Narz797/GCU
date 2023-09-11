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
          <input type="text" name="textfield4" id="textfield4" id="autocomplete1" class="autocomplete" autocomplete="off">
            <!-- Create a container to display autocomplete suggestions for the first input -->
          <div id="autocomplete-suggestions1"></div>

          <label>to</label>
          <label for="textfield5">:</label>
          <input type="text" name="textfield5" id="textfield5" id="autocomplete2" class="autocomplete" autocomplete="off">
            <!-- Create a container to display autocomplete suggestions for the first input -->
          <div id="autocomplete-suggestions2"></div>

        </div>
        <p>
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
        </p>
      </form>
      
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
      var student_id = <?php echo $_SESSION['session_id'] ?>;
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

    // autcomplete
 document.addEventListener('DOMContentLoaded', function () {
 // Attach an event listener to the first autocomplete input
document.getElementById('autocomplete1').addEventListener('input', function () {
  // Get user input
  const userInput = this.value;

  // Retrieve previously stored suggestions for the first input
  const storedSuggestions = JSON.parse(localStorage.getItem('autocompleteSuggestions1')) || [];

  // Filter stored suggestions based on the current user input
  const filteredSuggestions = storedSuggestions.filter(suggestion => suggestion.startsWith(userInput));

  // Display filtered suggestions
  displaySuggestions(filteredSuggestions, 'autocomplete-suggestions1');

  // Make an AJAX request to fetch additional suggestions if needed
  fetch('../../backend/autocomplete.php?query=' + userInput) // Updated URL here
    .then(response => response.json())
    .then(data => {
      // Merge and deduplicate suggestions from the server with the stored suggestions
      const combinedSuggestions = [...new Set([...filteredSuggestions, ...data])];

      // Update and store the combined suggestions
      localStorage.setItem('autocompleteSuggestions1', JSON.stringify(combinedSuggestions));
    });
});

// Attach an event listener to the second autocomplete input (similar to the first one)
document.getElementById('autocomplete2').addEventListener('input', function () {
  // Get user input
  const userInput = this.value;

  // Retrieve previously stored suggestions for the second input
  const storedSuggestions = JSON.parse(localStorage.getItem('autocompleteSuggestions2')) || [];

  // Filter stored suggestions based on the current user input
  const filteredSuggestions = storedSuggestions.filter(suggestion => suggestion.startsWith(userInput));

  // Display filtered suggestions
  displaySuggestions(filteredSuggestions, 'autocomplete-suggestions2');

  // Make an AJAX request to fetch additional suggestions if needed
  fetch('../../backend/autocomplete.php?query=' + userInput) // Updated URL here
    .then(response => response.json())
    .then(data => {
      // Merge and deduplicate suggestions from the server with the stored suggestions
      const combinedSuggestions = [...new Set([...filteredSuggestions, ...data])];

      // Update and store the combined suggestions
      localStorage.setItem('autocompleteSuggestions2', JSON.stringify(combinedSuggestions));
    });
});
 });

  </script>
</body>

</html>