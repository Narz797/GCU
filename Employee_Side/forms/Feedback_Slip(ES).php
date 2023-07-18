<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback Slip</title>
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
	
</head>

<body>
<h1 id="Title">Feedback Slip</h1>
<div class="form">
<form id="form1" name="form1" method="post">
  <p>
    <label for="select">Intervention/s or Assistance Provided:</label>
   
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
      preferred to scholarship sponsors</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="refer" onclick="myFunction()">
      <label>referred to</label>
    <div class="hidden1" id="ref" style="display: none;">
    <label>Referred to</label>
    <label for="textfield">:</label>
    <input type="text" name="textfield" id="textfield">
    <label>for interventions</label>
  </div>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="others" onclick="myFunction()">
      others</label>
    <input type="text" name="textfield3" id="oth" style="display: none">
    <br>
  </p>
	

  <p>
    <label>Remarks</label>
      <label for="textarea">:<br>
      </label>
    <textarea name="textarea" id="textarea" style="width: 50%"></textarea>
  </p>
  

  <input type="submit" name="submit" id="submit" value="Submit">
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
