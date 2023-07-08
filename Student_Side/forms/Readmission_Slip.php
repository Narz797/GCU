<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Readmission Slip</title>
<style type="text/css">
	#Title{
	text-align: center;
    font-family: Arial, sans-serif;
	}
  body{
    background-color:#E8E4C9;
    
  }
  .form {
      width: 90%;
      padding: 60px;
      padding-right:60px;
      background-color: cream;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      
    }
  .form label{
    color:black;
    font-size:20px;
    font-family: Arial, sans-serif;
  }
	
</style>
	
</head>

<body>
<h1 id="Title">Readmission Slip</h1>
<div class="form">
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
    <label for="textarea">Reason/s for stopping:</label>
  </p>
  <p>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
  </p>
  <p>
    <label for="textarea">Motivation for enrolling again:</label>
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