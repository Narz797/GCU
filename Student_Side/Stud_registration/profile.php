<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<style>
    /* Import Font Dancing Script */
@import url(https://fonts.googleapis.com/css?family=Dancing+Script);

* {
    margin: 0;
    
}

body {
    
    background-color: #e8f5ff;
    font-family: Arial;
    overflow: hidden;
}

/* NavbarTop */
.navbar-top {
    background-color: #fff;
    color: #333;
    box-shadow: 0px 4px 8px 0px grey;
    height: 70px;
}

.title {
    font-family: 'Dancing Script', cursive;
    padding-top: 15px;
    position: absolute;
    left: 45%;
}

.navbar-top ul {
    float: right;
    list-style-type: none;
    margin: 0;
    overflow: hidden;
    padding: 18px 50px 0 40px;
}

.navbar-top ul li {
    float: left;
}

.navbar-top ul li a {
    color: #333;
    padding: 14px 16px;
    text-align: center;
    text-decoration: none;
}

.icon-count {
    background-color: #ff0000;
    color: #fff;
    float: right;
    font-size: 11px;
    left: -25px;
    padding: 2px;
    position: relative;
}

/* End */

/* Sidenav */
.sidenav {
    background-color: #fff;
    color: #333;
    border-bottom-right-radius: 25px;
    height: 86%;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
    position: absolute;
    top: 70px;
    width: 250px;
}

.profile {
    margin-bottom: 20px;
    margin-top: -12px;
    text-align: center;
}

.profile img {
    border-radius: 50%;
    box-shadow: 0px 0px 5px 1px grey;
}


.name {
    font-size: 20px;
    font-weight: bold;
    padding-top: 20px;
}


.prof, .hr {
    margin: 0 auto; /* This centers the elements horizontally */
    text-align: center; /* This centers the text inside the elements */
}


.prof hr {
    margin-left: 20%;
    width: 60%;
}

.prof a {
    color: #818181;
    display: block;
    font-size: 20px;
    margin: 10px auto; /* Center the button horizontally */
    padding: 6px 8px;
    text-decoration: none;
}


.prof a:hover, .prof.active {
    background-color: #e8f5ff;
    border-radius: 28px;
    color: #000;
    margin-left: 14%;
    width: 65%;
}

/* End */

/* Main */
.main {
    margin-top: 2%;
    margin-left: 29%;
    font-size: 28px;
    padding: 0 10px;
    width: 58%;
}

.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
}

.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    width: 80%;
}

.edit {
    position: absolute;
    color: #e7e7e8;
    right: 14%;
}

.social-media {
    text-align: center;
    width: 90%;
}

.social-media span {
    margin: 0 10px;
}

.fa-facebook:hover {
    color: #4267b3 !important;
}

.fa-twitter:hover {
    color: #1da1f2 !important;
}

.fa-instagram:hover {
    color: #ce2b94 !important;
}

.fa-invision:hover {
    color: #f83263 !important;
}

.fa-github:hover {
    color: #161414 !important;
}

.fa-whatsapp:hover {
    color: #25d366 !important;
}

.fa-snapchat:hover {
    color: #fffb01 !important;
}

/* End */
    </style>
<body>
    <!-- Navbar top -->
    <div class="navbar-top" style="background-color: #009786;">
        <div class="title">
            <h1>Student Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            
            <li>
                <a href="#sign-out">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav" style=" background-color: -webkit-linear-gradient(left, #fefefe, #96ded8);">
        <div class="profile">
            <img src="assets/img/guidance.png" alt="" width="100" height="100">
            <div class="name">
               Firstname Lastname
            </div>
           
        </div>

        <div class="sidenav-prof">
            <div class="prof">
                <!-- <button>Profile</button> -->

               

                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="prof">
            <!-- <button>Settings</button> -->
                <a href="#settings">Settings</a>
                <hr align="center">
            </div>

            <div class="prof">
            <!-- <button>Settings</button> -->
                <a href="#settings">Notes</a>
                <hr align="center">
            </div>

        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>PROFILE</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <h2> Dito magpapakita ung niregister ni student</h2>
            </div>
        </div>

        <h2>HISTORY OF TRANSACTION</h2>
        <div class="card">
            <div class="card-body">
            <h2> Dito magpapakita ung history</h2>
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>