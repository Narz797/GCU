<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback Slip</title>
<style type="text/css">
	#Title{
		text-align: center;
    font-family: Arial, sans-serif;
	}
	.hidden1, .hidden2{
		display: none;
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
<h1 id="Title">Feedback Slip</h1>
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
  <p>Date of Referral
    <label for="date2">:</label>
    <input type="date" name="date2" id="date2">
  </p>
  <p>
    <label for="textarea">Reason/s for referral:</label>
  </p>
  <p>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
  </p>
  
 
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
</div>
</body>
</html>
