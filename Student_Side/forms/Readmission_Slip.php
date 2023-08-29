<!doctype html>
<?php
session_start();
include 'formstyle.php';
// $_SESSION['session_id']=10;

?>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <input type="submit" name="submit" id="submit" value="Submit">
          </p>
        </div>
      </form>
      <div>
      </div>

      <script>

        $("#form_transact").on("submit", function (event) {
          event.preventDefault();
          var student_id = <?php echo $_SESSION['session_id'] ?>;
          var transact_type = "readmission"

          $.ajax({
            type: 'POST',
            url: '../backend/create_transaction.php',
            data: {
              id: student_id,
              transact:transact_type,
              reason: $("#reason_stop").val(),
              motivation: $("#motivation").val(),
            },
            success: function (data) {
              alert('Successfull');

            }
          });
        }); 
      </script>

</body>

</html>