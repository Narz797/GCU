<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	#Title{
		text-align: center;
	}
	.hidden1, .hidden2{
		display: none;
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
    <select name="select2" id="coa">
      <option value="a">health-related concerns</option>
      <option value="b">filial responsibilities</option>
      <option value="c">environmental</option>
      <option value="d">official co/extra-curricularactivites</option>
      <option value="e">personal concerns</option>
      <option value="f">socio-cultural concerns</option>
      <option value="g">behavioral</option>
      <option value="h">others</option>
    </select>
  </p>
  <p>
  <div id="others" class="hidden1">
		<label for="textfield5">Others:</label>
		<input type="text" name="textfield5" id="textfield5">
	</div>
	<div id="extra-cur" class="hidden2">
		<label for="textfield4">official co/extra-curricular activity:</label>
		<input type="text" name="textfield4" id="textfield4">
	</div>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
	<script>
		const dropdown = document.getElementById('coa');
		const textfield1 = document.getElementById('others');
		const textfield2 = document.getElementById('extra-cur');

		dropdown.addEventListener('change', function() {
		  if (dropdown.value === 'd') {
			textfield2.classList.remove('hidden2');
			  textfield1.classList.add('hidden1');
		  } else if (dropdown.value === 'h') {
			textfield1.classList.remove('hidden1');
			  textfield2.classList.add('hidden2');
		  } else {
			textfield1.classList.add('hidden1');
			textfield2.classList.add('hidden2');
		  }
		});
	</script>
</body>
</html>
