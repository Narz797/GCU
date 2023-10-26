<!doctype html>
<?php
session_start();
include 'formstyle.php';
$_SESSION['transact_type'] = 'referral'; //asign value to transact_type
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
</style>
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
            <input type="radio" name="reasons[]" value="Interview" id="interview">
            interview</label>
          <br>
          <label>
            <input type="radio" name="reasons[]" value="Counseling" id="counseling">
            counseling</label>
          <br>
          <label>
            <input type="radio" name="reasons[]" value="Late" id="late">
            late</label>
          <br>
          <label>
            <input type="radio" name="reasons[]" value="Absent" id="absent">
            absent</label>
          <br>
          <label>
            <input type="radio" name="others" value="5" id="others" onclick="myFunction()">
            others</label>
          <input type="text" name="textfield3" id="oth" style="display: none">
        </p>
        <p>
          Referred By:
          <label for="textfield"></label>
          <select name="textfield" id="refer">
            <option value="Myself">Myself</option>
            <option value="Instructor">Instructor</option>
            <option value="College Dean">College Dean</option>
          </select>
          <br>
        </p>
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
      var student_id = <?php echo $_SESSION['session_id'] ?>;
      var transact_type = "withdrawal"
      var selectedReasons = $("input[name='reasons[]']:checked").map(function () {
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