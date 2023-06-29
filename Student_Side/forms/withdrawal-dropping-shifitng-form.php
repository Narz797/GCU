<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Withdrawal/Dropping/Shifting Slip</title>
<style>
		.hidden{
			display: none;
		}
			#Title{
		text-align: center;
	}
</style>
</head>

<body>
<h1 id="Title">Withdrawal/Dropping/Shifting Slip</h1>
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
   Reason
     <label for="select2">:</label>
    <select name="select2" id="action">
      <option value = "a">Withdrawing Enrollment</option>
      <option value = "b">Dropping Subjects</option>
      <option value = "c">Shifting</option>
    </select>
  </p>
  <p>
    Reason/s for withdrawing enrollment/ dropping subject/s shifting
      <label for="textarea">:<br>
    </label>
    <textarea name="textarea" style="width: 40%;" id="textarea"></textarea>
  </p>
  <div class="hidden" id="for-shift">
    Shifting from
    <label for="textfield4">:</label>
    <input type="text" name="textfield4" id="textfield4">
    to
    <label for="textfield5">:</label>
    <input type="text" name="textfield5" id="textfield5">
  </div>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
	<script>
		const dropdown = document.getElementById('action');
		const textfield = document.getElementById('for-shift');

		dropdown.addEventListener('change', function() {
		  if (dropdown.value === 'c') {
			textfield.classList.remove('hidden');

		  }  else {
			textfield.classList.add('hidden');

		  }
		});
	</script>
</body>
</html>
