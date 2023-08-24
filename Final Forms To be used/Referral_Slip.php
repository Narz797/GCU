<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback Slip</title>

	
</head>

<body>
<h1 id="Title">Referral Slip</h1>
<div class="form">
<form id="form1" name="form1" method="post">
  <p>
    <label for="select">Reason For Referral:</label>
   
  </p>
  <p>  
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
      interview</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1">
      counseling</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_2">
      psychological testing</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_3">
      referred to scholarship sponsors</label>
    <br>
	  
	      <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_3">
      Guidance/Life Coaching</label>
    <br>
	  
	      <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_3">
      Parent Conference</label>
    <br>
   

    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="others" onclick="myFunction()">
      others</label>
    <input type="text" name="textfield3" id="oth" style="display: none">
    </p>
  <p>
    Referred By:
      <label for="textfield">:</label>
    <input type="text" name="textfield" id="textfield">
    <br>
  </p>
	

  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
</p>
</form>
</div>
	<script>
		function myFunction() {
  var checkBox1 = document.getElementById("refer");
  var text1 = document.getElementById("ref");
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
</body>
</html>
