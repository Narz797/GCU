<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Class Admission Slip(ES)</title>
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
<h1 id="Title">Class Admission Slip</h1>
<form id="form1" name="form1" method="post">
  <p>
    <label for="select">Actions Taken:</label>
    <select name="select" id="action">
      <option value="a">Verified supporting documents</option>
      <option value="b">Interviewed with guidance</option>
      <option value="c">Life coaching</option>
      <option value="d">Parent conference</option>
      <option value="e">Counseling</option>
      <option value="f">Others</option>
    </select>
	<div class="hidden" id="others">
		<label for="textfield3">Others:</label>
		<input type="text" name="textfield3" id="textfield3">
	</div>
  </p>
  <p>
    <label>
      <input type="radio" name="EU" value="radio" id="EU_0">
    Excused</label>
    <label for="textfield">:</label>
    <input type="text" name="textfield" id="textfield">
    <br>
    <label>
      <input type="radio" name="EU" value="radio" id="EU_1">
      Unexcused</label>
    <label for="textfield2">:</label>
    <input type="text" name="textfield2" id="textfield2">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    <br>
  </p>
</form>
	<script>
		const dropdown = document.getElementById('action');
		const textfield = document.getElementById('others');

		dropdown.addEventListener('change', function() {
		  if (dropdown.value === 'f') {
			textfield.classList.remove('hidden');

		  }  else {
			textfield.classList.add('hidden');

		  }
		});
	</script>
</body>
</html>
