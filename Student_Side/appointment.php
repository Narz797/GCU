<?php 

include 'includes/main2.php';

 ?>

<head>

    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
          <!-- Vendor CSS Files -->
  <link href="../Employee_Side/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../Employee_Side/assets/apmt.css">
    <link rel="stylesheet" href="../Employee_Side/assets/css/forms.css">
  
</head>
<style>
    .column {
  float: left;
  width: 50%;
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
<p style="margin-left: 2%; font-size: 30px; font-weight: bold;">APPOINTMENT SCHEDULE</p>

</section> 





<div class="row">
<div class="container">
      <br>
     

   

  
      <div class="card">
          <hr>
      <div class="body-calendar">
       <div class="container-calendar">
    <div class="left">

  

      <div class="calendar">

 

        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">month,year</div>
          <i class="fas fa-angle-right next"></i>
        </div>

 
        
        <div class="weekdays">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div class="days"></div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mm/yyyy" class="date-input" />
            <button class="goto-btn">Go</button>
          </div>
          <button class="today-btn">Today</button>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="today-date">
        <div class="event-day">day</div>
        <div class="event-date">day month year</div>
      </div>
      <div class="events"></div>
      <div class="add-event-wrapper">
        <div class="add-event-header">
          <div class="title">Add Event</div>
          <i class="fas fa-times close"></i>
        </div>
        <div class="add-event-body">
          <div class="add-event-input">
            <input type="text" placeholder="Event Name" class="event-name" />
          </div>
          <div class="add-event-input">
            <input
              type="text"
              placeholder="Event Time From: 00:00"
              class="event-time-from"
            />
          </div>
          <div class="add-event-input">
            <input
              type="text"
              placeholder="Event Time To: 00:00"
              class="event-time-to"
            />
          </div>
        </div>
       
      </div>
    </div>

  </div>
</div>
      </div>
  </div>
</section>
<br>

<div>
  </div>


    <div  >

    <!-- <div class="container" > -->
        <br>
        <h2 class="title"></h2>
        <div >
            <header class="card-header" >
                <p style="margin-left: 10%; font-size: 30px; font-weight: bold; color:yellowgreen;" > YOUR SCHEDULE OF APPOINTMENT </p>
               
            </header>
            <hr>
            <div class="gallery">
            <main class="table" id="customers_table"  style=" height: auto; ">
    
            <section class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th> No. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody>
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
                <p style="margin-left: 2%; font-size: 25px; font-weight: bold; color:white;" >HISTORY OF APPOINTMENT</p>
                <div class="input-group">
                    <input type="search" placeholder="Search...">
                </div>
             
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



<script src="../Employee_Side/assets/js/calendar.js"></script>    
<script src="../Employee_Side/assets/main.js"></script> 