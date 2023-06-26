<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./assets/css/sisua.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<header class="header"> you can put the bsu banner here (i don't have it eh) just change the background in the css .header part </header>

<div class="background"></div>
<div class="container">
    <div class="content">
        <h2 class="logo"><i class='bx bxs-school' ></i>GCU</h2>
    <div class="text-sci">
        <h2>Good Day!</h2>
        <h3>This is the Guidance Counseling Unit</h3>
        <p>If you are a <i>NEW EMPLOYEE</i> of the GCU then please sign up and wait for the admin to approve your email.</p>
        <div class="links">
        <a href="#"><i class='bx bx-link' ></i></a>
        <a href="#"><i class='bx bxs-envelope' ></i></a>
        <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
        </div>
    </div>
    </div>

    <div class="logreg-box">
        <div class="form-box login">
            <form action="index.html">
                <h2>WELCOME</h2>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-user-pin'></i></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-lock-alt' ></i></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>

                <div class="check">
                    <label><input type="checkbox" name="">Remember Me</label>
                    <a href="#">Forget password?</a>
                </div>
                <a href="index.html"><button class="btn1" type="submit">SIGN IN</button></a>

                <div class="sua">
                    <p>No Account?</p><a href="#" class="su-link">Sign Up</a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="#">
                <h2>SIGN UP</h2>

                <div class="input-box">
                    <span class="icon"><i class='bx bxs-user-circle' ></i></span>
                    <input type="text" required>
                    <label>Full Name</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-user-pin'></i></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-lock-alt' ></i></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-lock-alt' ></i></span>
                    <input type="password" required>
                    <label>Confirm Password</label>
                </div>

                <div class="check">
                    <label><input type="checkbox" name=""> I agree on the terms and conditions</label>
                </div>
                <button class="btn" type="submit">REGISTER</button>

                <div class="su">
                    <p>Already have an account?</p><a href="#" class="si-link">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="./assets/js/sisua.js"></script>   
</body>
</html>

