<?php
session_start();
$_SESSION['origin'] = 'Student_Register';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Sign Up</title>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link rel="stylesheet" href="../Css/register_style.css">
   <link href="assets/img/GCU_logo.png" rel="icon">
   <link href="assets/register_style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
<div class="logo">
      <img src="../assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
      <h1>Student Registration</h1>
      <form class="form-grid">
        <div class="form-column">
          <label for="idNumber">ID Number:</label>
          <input type="text" id="idNumber" name="idNumber" required>
          
          <label for="lastName">Last Name:</label>
          <input type="text" id="lastName" name="lastName" required>
          
          <label for="firstName">First Name:</label>
          <input type="text" id="firstName" name="firstName" required>
          
          <label for="middleName">Middle Name:</label>
          <input type="text" id="middleName" name="middleName">

                
          <label for="sex">Sex:</label>
          <input type="text" id="sex" name="sex">

          <label for="cs">Civil Status:</label>
          <input type="text" id="cs" name="cs">

          
        
          




        </div>

        


        <div class="form-column">

          <label for="birthdate">Birthdate:</label>
          <input type="date" id="birthdate" name="birthdate" required>

          <label for="nationality">Nationality:</label>
          <input type="text" id="nationality" name="nationality">

          <label for="bp">Birthplace:</label>
          <input type="text" id="bp" name="bp"> 

          <label for="emailadd">Email Address:</label>
          <input type="text" id="emailadd" name="emailadd">


          <label for="contactNumber">Contact Number:</label>
          <input type="tel" id="contactNumber" name="contactNumber" required>
          
          

          <button type="submit">Register</button>
        </div>


        

      </form>


    </div>
</body>
</html>
  