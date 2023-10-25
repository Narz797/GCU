<!DOCTYPE html>
<html>
<head>
  <title>Admin Sign Up</title>
  <!-- Stylesheet -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../Css/register_style.css">
  <link href="assets/img/GCU_logo.png" rel="icon">
  <link rel="icon" href="../Assets/img/GCU_logo.png">
  <link href="assets/register_style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<div class="logo">
   <img src="../assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
 </div>
   <h1>Admin Registration</h1>
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

            
    
     </div>

     


     <div class="form-column">
      
        <label for="sex">Sex:</label>
       <input type="text" id="sex" name="sex">

       <label for="emailadd">Email Address:</label>
       <input type="text" id="emailadd" name="emailadd">


       <label for="contactNumber">Contact Number:</label>
       <input type="tel" id="contactNumber" name="contactNumber" required>
      
       <label for="cs">Position:</label>
       <input type="text" id="cs" name="cs">
       

       <button type="submit">Register</button>
     </div>



   </form>


 </div>
</body>
</html>

