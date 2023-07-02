<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Leave Of Absence Slip</title>
</head>
<style type="text/css">
	#Title{
		text-align: center;
	}

	
</style>
<body>
	<h1 id="Title">Leave Of Absence Slip</h1>
<form id="form1" name="form1" method="post">
  <p>
    <label for="number">Student ID No.:</label>
    <input type="number" name="number" id="number">
    <label for="date">Date:</label>
    <input type="date" name="date" id="date">
  </p>
  <p>
    <label for="textfield">First Name:</label>
    <input type="text" name="textfield" id="textfield">
    <label for="textfield2">Middle Name:</label>
    <input type="text" name="textfield2" id="textfield2">
    <label for="textfield3">Last Name:</label>
    <input type="text" name="textfield3" id="textfield3">
  </p>
  <p>
    <label for="month">Year:</label>
    <input type="number" placeholder="YYYY" min="1999" max="2020">
    <label for="select">Sex:</label>
    <select name="select" id="select">
      <option>Male</option>
      <option>Female</option>
    </select>
  </p>
  <p>Semester and School Year Intended to Comback:</p>
  <p>
   Semester
    <label for="select2">:</label>
    <select name="select2" id="select2">
      <option>1st Semester</option>
      <option>2nd Semester</option>
      <option>Summer</option>
    </select>
	  <label for="month">School Year:</label>
    <input type="number" placeholder="YYYY" min="1999" max="2040">
	  <label for="month">-</label>
    <input type="number" placeholder="YYYY" min="1999" max="2040">
  </p>
  <p>
    Reason/s for stopping/filing a leave
      <label for="textarea">:</label>
  </p>
  <p>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
  </p>
  <p>
    What to do while on leave
      <label for="textarea2">:<br>
      </label>
    <textarea name="textarea2" id="textarea2" style="width: 50%"></textarea>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
	
</body>
</html>
