<?php 

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
    .column {
  float: left;
  /* width: 40%; */
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
}

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

        .left-column img {
            margin-top: 50%;
            margin-bottom: 5%;
            margin-left:10%;
            width: 80%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
            border-radius: 50%;

        }

        {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  /* width: 50%; */
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
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



<div class="row" >
<div class="column" style="width:20%; ">
  
  <!-- Your content goes here -->
   <div class="left-column" style=" display: flex; justify-content: center; align-items: center;">
       <img src="../assets/img/ab.jpg" alt="Logo" class="logo">
   </div>
   <p   style="text-align:center; font-size: 20px; font-weight: bold;align-items: center; color:white;" > ID #: 20015**</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" > Lee Min Hoo</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" >BS in Information Technology</p>
   <p   style="text-align:center;font-size: 20px; font-weight: bold;align-items: center; color:white;" >4-B</p>



 </div>



  <div class="column" style=" width:80%;  ">


        
        

            <div class="column" style="width:80%;display: flex;">
    <section class="table-body" style=" background-color:transparent; margin-left:20%;">
        
        <!-- Your table content here -->
        <i class='far fa-edit' style="font-size:36px; margin-left: 90%; background-color:white;"></i>

        <table >
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
                            

                            <!-- <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td> -->
                        </tr>
                        
                 
                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Languages: </th>
                            <!-- <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th> -->

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> English </td>
                            <td> Japanese</td>
                            <td> Korean </td>
                            <td> Tagalog </td>
                            

                            <!-- <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td> -->
                        </tr>
                        
                 
                    </tbody>

                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Address: </th>
                            <!-- <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th> -->

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> Busan </td>
                            <td>South</td>
                            <td> Korea </td>
                            <td> 44972</td>
                            

                            <!-- <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td> -->
                        </tr>
                        
                 
                    </tbody>
                    </tbody>
                    <thead style="color:white;">
                        <tr>
                            <th> Nationality</th>
                            <!-- <th> Civil Status </th>
                            <th> Birthdate</th>
                            <th> Birtplace</th> -->

                            
                        </tr>
                    </thead>
                    <tbody style="background-color: #72A50A;">
                        <tr>
                            <td> Korean</td>
                            <td> </td>
                            <td>  </td>
                            <td> </td>
                            

                            <!-- <td>
                                <p class="status delivered">Delivered</p>
                            </td>
                            <td> 
                                <i class="ri-delete-bin-6-line"></i>
                            </td> -->
                        </tr>
                        
                 
                    </tbody>


                </table>

    </section>




    
</div>




  </div>


</div>


<br>

<div>
  </div>


    <div  >


                        

                    
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