<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Class Admission Slip(es)</title>
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
  </p>
  <p>  
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
      verified supporting document/s</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1">
      interviewed with guidance</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_2">
      life coaching</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_3">
      parent conference</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_4">
      counseling</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="others" onclick="myFunction()">
      others</label>
    <input type="text" name="textfield3" id="oth" style="display: none">
    <br>
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
function myFunction() {
  var checkBox = document.getElementById("others");
  var text = document.getElementById("oth");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
</body>
</html>
