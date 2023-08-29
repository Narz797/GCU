<!doctype html>
<?php include 'formstyle.php' ?>
<html>

<head>
  <title>Leave Of Absence Slip</title>
</head>

<body>

  <div class="card">
    <div class="card-header">
      <h1 id="Title">Leave Of Absence Slip</h1>
    </div>
    <div class="card-body">
      <form id="form_transact" method="post">
        <p>
          <label for="select2">Semester and School Year Intended to Come Back:</label>
          <select name="select2" id="semester">
            <option value="a">First Semester</option>
            <option value="b">Second Semester</option>
          </select>
          <label>Year:</label>
          <input type="number" placeholder="YYYY" id="start_year" class="year_yield">
          <label> - </label>
          <input type="number" placeholder="YYYY" id="end_year" class="year_yield">
        </p>
        <p>
          <label for="textarea">Reason/s for stopping/filing a leave:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="reason_leave"></textarea>
        </p>
        <p>
          <label for="textarea">What to do when on-leave:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea" id="do_leave"></textarea>
        </p>
        <div class="button">
          <p>
            <input type="submit" name="submit" id="submit" value="Submit">
          </p>
        </div>
      </form>
    </div>

  </div>

  <script>

    $("#form_transact").on("submit", function (event) {
      event.preventDefault();
      var student_id = <?php echo $_SESSION['session_id'] ?>;
      var transact_type = "leave_of_absence"

      $.ajax({
        type: 'POST',
        url: '../backend/create_transaction.php',
        data: {
          id: student_id,
          transact: transact_type,
          semester: $("#semester").val(),
          start_year: $("#start_year").val(),
          end_year: $("#end_year").val(),
          reason_leave: $("#reason_leave").val(),
          do_leave: $("#do_leave").value()
        },
        success: function (data) {
          alert('Successfull');

        }
      });
    }); 
  </script>

</body>

</html>