<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Follow-up Appointment Slip</title>
</head>
<style type="text/css">
#Title{
		text-align: center;
    font-family: Arial, sans-serif;
    color:white;
	}
	.hidden1, .hidden2{
		display: none;
	}
  body{
    background-color:green;
  }
  .form {
      width: 90%;
      padding: 60px;
      padding-right:60px;
      background-color: darkgreen;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      
    }
  .form label{
    color: white;
    font-size:20px;
    font-family: Arial, sans-serif;
  }
	

</style>
<body>
	<h1 id="Title">Follow-up Appointment Slip</h1>
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
    <input type="number" placeholder="YYYY" min="1999" max="2040">
    <label for="select">Sex:</label>
    <select name="select" id="select">
      <option>Male</option>
      <option>Female</option>
    </select>
  </p>
  <label>Please report to the undersigned on:</label>
  <p>
    <label for="date2">Date:</label>
    <input type="date" name="date2" id="date2">
    <label for="time">Time:</label>
    <input type="time" name="time" id="time">
    <label>Place</label>
    <label for="textfield4">:</label>
    <input type="text" name="textfield4" id="textfield4">
  </p>
  <label>to undertake the following:</label>
  <p>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Follow-up" id="CheckboxGroup1_0">
      Follow-up</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Group Guidance" id="CheckboxGroup1_1">
      Group Guidance</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Life coaching" id="CheckboxGroup1_2">
      Life coaching</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Parent Conference" id="CheckboxGroup1_3">
      Parent Conference</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Testing " id="CheckboxGroup1_4">
      Testing </label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="Others" id="CheckboxGroup1_5">
      Others</label>
    <label for="textfield5">(Specify):</label>
    <input type="text" name="textfield5" id="textfield5">
  </p>
  <p>
    <label for="textarea">Remarks:<br>
    </label>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
    <br>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</div>
</body>
</html>
