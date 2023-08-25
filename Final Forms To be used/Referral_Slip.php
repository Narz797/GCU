<!doctype html>
<?php
include 'formstyle.php';
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Feedback Slip</title>


</head>

<body>
  <div class="card">
    <div class="card-header">
      <h1 id="Title">Referral Slip</h1>
    </div>
    <div class="card-body">
      <form id="form1" name="form1" method="post">
        <p>
          <label for="select">Reason For Referral:</label>

        </p>
        <p>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
            interview</label>
          <br>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1">
            counseling</label>
          <br>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_2">
            psychological testing</label>
          <br>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="others" onclick="myFunction()">
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
</body>

</html>