<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Readmission Slip</title>

	
</head>

<body>
<h1 id="Title">Readmission Slip</h1>
<div class="form">
<form id="form1" name="form1" method="post">
  <p>
    <label>Cleared for Leave of Absence:</label>
  <p>
  <input type="radio" id="firstsem" name="radio" value="First">
  <label for="firstsem">1st</label>
  <input type="radio" id="secondsem" name="radio" value="Second">
  <label for="secondsem">2nd Semester</label>
  <input type="radio" id="summer" name="radio" value="Summer">
  <label for="summer">Summer</label>
  <label>;</label>
    <label for="month">School Year:</label>
    <input type="number" placeholder="YYYY" min="1999" max="2030">
    <label> - </label>
    <input type="number" placeholder="YYYY" min="1999" max="2030">
  </p>
    <label for="textarea">Remarks:</label>
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
	
</body>
</html>