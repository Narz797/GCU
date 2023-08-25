<!doctype html>
<?php
include 'formstyle.php';
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Readmission Slip</title>
</head>

<body>
  <div class="card">
    <h1 id="Title" class="card-header">Readmission Slip</h1>
    <div class="card-body">
      <form id="form1" name="form1" method="post">
        <p>
          <label for="textarea">Reason/s for stopping:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea"></textarea>
        </p>
        <p>
          <label for="textarea">Motivation for enrolling again:</label>
        </p>
        <p>
          <textarea name="textarea" class="textarea"></textarea>
        </p>
        <div class="button">
          <p>
          <input type="submit" name="submit" id="submit" value="Submit">
          </p>
        </div>
      </form>
      <div>
      </div>

</body>

</html>