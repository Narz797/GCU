<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Class Admission Slip</title>
<style type="text/css">
	#Title{
		text-align: center;
	}

	
</style>
	
</head>

<body>
<h1 id="Title">Class Admission Slip</h1>
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
    <label for="date2">Date/s Absent/Tardy:</label>
    <input type="date" name="date2" id="date2">
    <label for="number2">Number of day/s absent/tardy:</label>
    <input type="number" name="number2" id="number2">
  </p>
  <p>
    <label for="select2">Cause/s of absences:</label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
      health-related concerns</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1">
      filial responsibilites</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_2">
      environmental</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_3">
      personal concerns</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_4">
      socio-cultural concerns</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_5">
      behavioral</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="official" onclick="myFunction()">
      official co/extra-curricular activity</label>
    <input type="text" name="textfield6" id="extra" style="display: none">
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="others" onclick="myFunction()">
      others</label>
    <input type="text" name="textfield6" id="oth" style="display: none">
    <br>
  </p>
 
	
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>

</body>
	<script>
function myFunction() {
  var checkBox1 = document.getElementById("official");
  var text1 = document.getElementById("extra");
  var checkBox2 = document.getElementById("others");
  var text2 = document.getElementById("oth");
  if (checkBox1.checked == true){
    text1.style.display = "block";
  } else {
     text1.style.display = "none";
  }
	if (checkBox2.checked == true){
    text2.style.display = "block";
  } else {
     text2.style.display = "none";
  }
}
</script>
</html>
