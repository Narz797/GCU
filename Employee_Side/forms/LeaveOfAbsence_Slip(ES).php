<title>Leave Of Absence Slip</title>
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
<h1 id="Title">Leave Of Absence Slip</h1>
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