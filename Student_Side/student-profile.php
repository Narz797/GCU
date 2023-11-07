<?php 

session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
  
include 'includes/main1.php';
 ?>

<head>

    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
          <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../Employee_Side/assets/apmt.css">
    <link rel="stylesheet" href="../Employee_Side/assets/css/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>
<style>
    /* .column {
  float: left;

  padding: 10px;
  height: auto; 
} */

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/*   
.fa-sign-out-alt {
    position: relative;
} */

i.fa-sign-out-alt:hover {
    color: yellowgreen;
  }
        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }



/* Create two equal columns that floats next to each other */
/* .column {
  float: left;
 
  padding: 10px;
  height: auto; 
 
} */

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media (max-width: 768px) {
            .column {
                width: 100%;
                padding: 10px;
            }

            .left-column img {
                width: 100%;
            }

            .table-body {
                margin-left: 0; /* Adjust margins as needed for smaller screens */
            }

            /* Add more responsive styles as needed */
        }

        /* Your existing styles (non-responsive) */
        /* .column {
            float: left;
            width: 20%;
            padding: 10px;
            height: auto;
        } */

        /* .myDiv {
                    width:50%;
                    height: 75px;
                    border: 2px solid black;
                    margin: 10px; 
                    text-align: center;
                    background-color:#72A50A;
                    display: inline-block;
                    color:black;

                } */

                th, td {
   
    /* padding: 8px; */
    text-align: left;
    
  }
  /* t{

      background-color:#72A50A;

  } */

 
  tr:hover {
    background-color:darkgreen; /* Hover color */
  }

  .container {
    display: flex;
    align-items: center;
    /* width:1000%; */
    margin-left:5%;
  }

  /* table {
    width: 50%;
    border-collapse: collapse;
    margin-right: 20px;
  } */

  /* th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  } */

  /* th {
    background-color: #f2f2f2;
  } */

  /* tr:hover {
    background-color: #f5f5f5;
  } */

  .ID {
    height: 400px;
    width:3000px;
    margin-left:100%;
    margin-top:20px;
  }

  .image-container {
    display: flex;
    align-items: center;
}

.name-info {
    margin-left: 10px; /* Add margin to create space between image and text */
}
.image {
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left:5%;
            width: 80%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
            border-radius:50%;
           

  
}


 

    </style>
  <body>


       




</div>

<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; "></section> 



<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 80px; ">
<p style="margin-left: 2%; font-size: 30px; font-weight: bold;">STUDENT PROFILE</p> 

<a href="javascript:history.back()">
    <i style="margin-left: 3500%; font-size: 40px; font-weight: bold;" class="fa fa-sign-out-alt fa-2x"></i>
</a>
</section> 
<!-- <div class="image" >
       <img src="../assets/img/ab.jpg" alt="Logo" class="logo" style="height:100%; withd:20px; border-radius:50%;">
        
  
    </div>  -->

    <div class="image-container">
    
            <img class="image"src="../assets/img/ab.jpg" alt="Logo" class="logo" style="height: 100%; width: 20%; border-radius: 50%;">
            
        <div class="name-info">
        <p>FirstName , Lastname ,  Middlename</p>
        
       
    </div>
    
</div>

   



<!-- <div class="row" > -->
<!-- <div class="column" style="width:20%; "> -->
  
  <!-- Your content goes here -->
   <!-- <div class="left-column" style=" display: flex; justify-content: center; align-items: center;">
       <img src="../assets/img/ab.jpg" alt="Logo" class="logo">
   </div> -->
   <!-- <p   style="text-align:center; font-size: 20px; font-weight: bold;align-items: center; color:white;" > ID #: 20015**</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" > Lee Min Hoo</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" >BS in Information Technology</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" >4-B</p> -->

   <!-- <div style="display: inline-block; border: 2px solid black; padding: 10px; border-radius: 10px; background-color: white;">
    <img src="../assets/img/id.jpg" alt="ID" class="ID" style="height: 400px;">
</div> -->




 <!-- </div> -->





  <!-- <div style=" width:80%;  "> -->


        
        

            <!-- <div  style="width:80%;display: flex;"> -->
    
        <!-- Your table content here -->
        <!-- <i class='far fa-edit' style="font-size:36px; margin-left: 90%; background-color:white;"></i>
         -->
         
         <!-- <div class="myDiv" style="height: 400px; display: inline-block; border: 2px solid black; padding: 10px; border-radius: 10px; background-color: white;">
    <h2>School ID</h2>
    <img src="../assets/img/id.jpg" alt="ID" class="ID" style="height: 400px;">
</div> -->


<!-- 
            <div class="myDiv">
            <h2>Contact Number</h2>
            <hr>
            <p>09091238752</p>
            </div>

            <div class="myDiv">
            <h2>Box 3</h2>
            <p>This is some text in Box 3.</p>
            </div>
             -->
        

        <!-- <table >
                    <thead style="color:white;">
                        <tr>
                            <th> Contact Number </th>
                            <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birthplace</th>

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> 09090909090 </td>
                            <td> Single</td>
                            <td> Secret </td>
                            <td> Busan, South </td>
                            

                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td>
                        </tr>
                        
                 
                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Languages: </th>
                            <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th>

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> English </td>
                            <td> Japanese</td>
                            <td> Korean </td>
                            <td> Tagalog </td>
                            

                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td>
                        </tr>
                        
                 
                    </tbody>

                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Address: </th>
                            <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th>

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> Busan </td>
                            <td>South</td>
                            <td> Korea </td>
                            <td> 44972</td>
                            

                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td>
                        </tr>
                        
                 
                    </tbody>
                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Nationality</th>
                            <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th>

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> Korean</td>
                            <td> </td>
                            <td>  </td>
                            <td> </td>
                            

                            <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td>
                        </tr>
                        
                 
                    </tbody>


                </table> -->

    <!-- </section> -->

    <!-- <div>
    <img src="../assets/img/id.jpg" alt="ID" class="ID" style="height: 400px;">
    </div> -->

    

    <!-- <table>
  <tr>
    <th >Student ID</th>
    <td>12345</td>
  </tr>
  <tr>
    <th style="color: black">Name</th>
    <td style="color: black">John Doe</td>
  </tr>
  <tr>
    <th>Age</th>
    <td>20</td>
  </tr>
  <tr>
    <th style="color: black" >Gender</th>
    <td style="color: black">Male</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>Computer Science</td>
  </tr>
  <tr>
    <th style="color: black">GPA</th>
    <td style="color: black">3.7</td>
  </tr>
</table>

<div>
<img src="../assets/img/id.jpg" alt="ID" class="ID" style="height: 400px;">
</div> -->

<div class="container">
  <table style="width:1000%;">
    <tr >
      <th >Student ID</th>
      <td>12345</td>
    </tr>
    <tr>
      <th style="color: black">Name</th>
      <td style="color: black">John Doe</td>
      

    </tr>
    <tr>
      <th>Age</th>
      <td>20</td>
    </tr>
    <tr>
      <th style="color: black">Gender</th>
      <td style="color: black">Male</td>
    </tr>
    <tr>
      <th>Major</th>
      <td>Computer Science</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

    <tr>
      <th style="color: black">GPA</th>
      <td style="color: black">3.7</td>
    </tr>

  </table>

  <div>
    <img src="../assets/img/id.jpg" alt="ID" class="ID">
  </div>
</div>


    
<!-- </div> -->



<!-- 
  </div>


</div> -->


<!-- <br>

<div>
  </div>


    <div  > -->


                        

                    
    </div>

    <div class="container" style="width: 90%; margin-left: 2%;">
        <!-- <div class="left-column">
            <img src="../assets/img/ab.jpg" alt="Logo" class="logo">
        </div> -->

        <!-- <h1>Name: </h1> -->

                        

                    
    </div>
       



    <!-- History of transaction -->
    <div  >
        <br>
        <h2 class="title"></h2>
        <div class="card" >
         
            <hr>
            <div class=" gallery" >
            <main class="table" id="customers_table" style=" height: auto; ">
            <section class="table-header">
                <p style="margin-left: 2%; font-size: 25px; font-weight: bold; color:white;" >HISTORY OF TRANSACTION AND APPOINTMENT</p>
                <!-- <div class="input-group">
                    <input type="search" placeholder="Search...">
                </div> -->

               
             
            </section>
            <section class="table-body" >
                <table >
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Title of appointment </th>
                            <th> Date</th>
                            
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <td> 1 </td>
                            <td> Counseling</td>
                            <td> 17 Dec, 2022 </td>
                            <!-- <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td> -->
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> Readmission</td>
                            <td> 27 Aug, 2023 </td>
                            <!-- <td>
                                <p class="status cancelled">Cancelled</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td>
                        </tr> -->
                 
                    </tbody>
                </table>
            </section>
            </main>
            </div>
        </div>
    </div>
</section>


<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 50px; "></section> 


  </body>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/calendar.js"></script>    