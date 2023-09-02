<!doctype html>
<?php
session_start();
include 'formstyle.php';
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Feedback Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div class="card">
    <div class="card-header">
      <h1 id="Title">Referral Slip</h1>
    </div>
    <div class="card-body">
      <form id="form_transact" name="form1" method="post">
        <p>
          <label for="select">Reason For Referral:</label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="interview" value="1" id="interview">
            interview</label>
          <br>
          <label>
            <input type="checkbox" name="counseling" value="2" id="counseling">
            counseling</label>
          <br>
          <label>
            <input type="checkbox" name="late" value="3" id="late">
            late</label>
          <br>
          <label>
            <input type="checkbox" name="absent" value="4" id="absent">
            absent</label>
          <br>
          <label>
            <input type="checkbox" name="others" value="5" id="others" onclick="myFunction()">
            others</label>
          <input type="text" name="textfield3" id="oth" style="display: none">
        </p>
        <p>
          Referred By:
          <label for="textfield"></label>
          <select name="textfield" id="refer">
            <option value="1">Myself</option>
            <option value="2">Instructor</option>
            <option value="3">College Dean</option>
          </select>
          <br>
        </p>
        <p>
          <input type="submit" name="submit" id="submit" value="Submit">
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
      var student_id = <?php echo $_SESSION['session_id'] ?>;
      var transact_type = "referral"

      $.ajax({
        type: 'POST',
        url: '../backend/create_transaction.php',
        data: {
          id: student_id,
          transact: transact_type,
          interview: $("#interview").val(),
          counsel: $("#counseling").val(),
          late: $('#late').val(),
          absent: $('#absent').val(),
          others: $("#others").val(),
          content: $("#oth").val()
        },
        success: function (data) {
          alert('Successfull');

        }
      });
    });
  </script>
</body>

</html>