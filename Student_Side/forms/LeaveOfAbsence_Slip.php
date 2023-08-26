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
      <form id="form1" name="form1" method="post">
        <p>
          <label for="select2">Semester and School Year Intended to Come Back:</label>
          <select name="select2" id="coa">
            <option value="a">First Semester</option>
            <option value="b">Second Semester</option>
          </select>
          <label for="month">Year:</label>
          <input type="number" placeholder="YYYY" min="1999" max="2030">
          <label> - </label>
          <input type="number" placeholder="YYYY" min="1999" max="2030">
        </p>
        <p>
          <label for="textarea">Reason/s for stopping/filing a leave:</label>
        </p>
        <p>
          <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
        </p>
        <p>
          <label for="textarea">What to do when on-leave:</label>
        </p>
        <p>
          <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
        </p>
        <div class="button">
          <p>
            <input type="submit" name="submit" id="submit" value="Submit">
          </p>
        </div>
      </form>
    </div>

  </div>

</body>

</html>