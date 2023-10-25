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
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left:100%;
            width: 15%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
            border-radius: 50%;
        }


    </style>
  <body>


       




</div>

<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; "></section> 



<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 80px; ">
<p style="margin-left: 2%; font-size: 30px; font-weight: bold;">STUDENT PROFILE</p> 
<i style="margin-left: 79%; font-size: 40px; font-weight: bold;" class="fa fa-sign-out-alt fa-2x" ></i>

</section> 






<br>

<div>
  </div>


    <div  >

    <!-- <div class="container" > -->
        <br>
        <h2 class="title"></h2>
        <div >
            
            

    <div class="container" style="width: 90%; margin-left: 2%;">
        <div class="left-column">
            <img src="../assets/img/ab.jpg" alt="Logo" class="logo">
        </div>

        

       
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
                            <th> No. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
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