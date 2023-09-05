<!DOCTYPE html>
<html>
<head>
  <title>Admin Sign Up</title>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../Css/register_style.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link rel="icon" href="../Assets/img/GCU_logo.png">
</head>
<body>
  <div class="container">
    <div class="logo">
     
      <img src="../Assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Sign Up</h2>
    <form id="Signup_Admin_User" method="POST">
      


      <div class="form-row">
        <div class="form-group">
          <input type="text" id="firstname" placeholder="First Name" name="firstname" required>
        </div>

        <div class="form-group">
          <input type="text" id="lastname" placeholder="Last Name" name="lastname" required>
        </div>

      </div>

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="middlename" placeholder="Middle Name" name="middlename" required>
        </div>

        <div class="form-group">
      <label for="select">Gender</label>
              <select name="select" id="select">
          <option>Male</option>
          <option>Female</option>
          </select>
        </div>

      </div>

     <div class="form-row">

        <div class="form-group">
          <input type="text" id="position"  placeholder="Position"name="position" required>
        </div>

      </div>

       <div class="form-row">

        <div class="form-group">
          <input type="email" id="email" placeholder="Email" name="email" required>
        </div>

      </div>

    

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="username" placeholder="Username" name="username" required>
        </div>

        <div class="form-group">
          <input type="password" id="password" placeholder="Password" name="password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="buttons">
          <input type="submit" value="Sign Up" id="submitButton">
          <input type="button" value="Cancel">
        </div>
      </div>

        <div class="login">
          Already have an account? <a href="login_Employee.php">Log in</a>
        </div>

      </div>

    </form>
  </div>

