<!doctype html>
<?php
session_start();
include 'formstyle.php';
$_SESSION['transact_type']='referral';//asign value to transact_type
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Feedback Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">

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
            <input type="checkbox" name="reasons[]" value="1" id="interview">
            interview</label>
          <br>
          <label>
            <input type="checkbox" name="reasons[]" value="2" id="counseling">
            counseling</label>
          <br>
          <label>
            <input type="checkbox" name="reasons[]" value="3" id="late">
            late</label>
          <br>
          <label>
            <input type="checkbox" name="reasons[]" value="4" id="absent">
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
      var selectedReasons = $("input[name='reasons[]']:checked").map(function(){
        return $(this).val();
      }).get();

      
      var othersText = $("#oth").val();

      // Add othersText to the selectedReasons array if it's not empty
      if (othersText.trim() !== "") {
        selectedReasons.push(othersText);
      }

      $.ajax({
        type: 'POST',
        url: '../../backend/create_transaction.php',
        data: {
          id: student_id,
          transact: transact_type,
          reasons: selectedReasons,
          refer: $('#refer').find(":selected").val()
        },
        success: function (data) {
          alert(data);

        }
      });
    });
  </script>
</body>

</html>