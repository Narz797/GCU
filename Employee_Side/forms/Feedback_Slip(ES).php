<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback Slip</title>
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
<h1 id="Title">Feedback Slip</h1>
<form id="form1" name="form1" method="post">
  <p>
    <label for="select">Intervention/s or Assistance Provided:</label>
    <select name="select" id="select">
      <option value = "a">Interview</option>
      <option value = "b">Counseling</option>
      <option value = "c">Psychological Testing</option>
      <option value = "d">Referred to Scholarship sponsors</option>
      <option value = "e">Referred to..</option>
      <option value = "f">Others</option>
    </select>
    
  </p>
	<div class="hidden1" id="refer">Refered to
    <label for="textfield">:</label>
    <input type="text" name="textfield" id="textfield">
    for interventions
  </div>
  <div class="hidden2" id="oth">
	  <p>
    Others
      <label for="textfield2">:</label>
    <input type="text" name="textfield2" id="textfield2">
  </p>
	</div>
  <p>
    Remarks
      <label for="textarea">:<br>
      </label>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
  </p>
  

  <input type="submit" name="submit" id="submit" value="Submit">
</form>
	<script>
		const dropdown = document.getElementById('select');
		const textfield1 = document.getElementById('refer');
		const textfield2 = document.getElementById('oth');

		dropdown.addEventListener('change', function() {
		  if (dropdown.value === 'e') {
			textfield1.classList.remove('hidden1');
			  textfield2.classList.add('hidden2');
		  } else if (dropdown.value === 'f') {
			textfield2.classList.remove('hidden2');
			  textfield1.classList.add('hidden1');
		  } else {
			textfield1.classList.add('hidden1');
			textfield2.classList.add('hidden2');
		  }
		});
	</script>
</body>
</html>
