<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Responsive Regisration Form </title>
</head>
<style>/* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    .autocomplete-container {
    position: relative;
    }

    .autocomplete-popup {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        display: none;
    }

    .autocomplete-popup ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .autocomplete-popup li {
        padding: 5px 10px;
        cursor: pointer;
    }

    .autocomplete-popup li:hover {
        background-color: #f0f0f0;
    }

    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fafffe;
    }
    .container{
        position: relative;
        max-width: 900px;
       
        width: 100%;
         /* border-radius: 0px;  */
        padding: 10px;
        margin: 0 15px;
        /* background-color: #fff; */
        /* box-shadow: 0 5px 10px rgba(0,0,0,0.1); */
    }
    .container header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }
    .container header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }
    .container form{
        position: relative;
        margin-top: 16px;
        min-height: 2000px;
        /* background-color: #fff; */
        overflow: hidden;
    }
    .container form .form{
        position: absolute;
        /* background-color: #fff; */
        transition: 0.3s ease;
    }
    .container form .form.second{
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }
    form.secActive .form.second{
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }
    form.secActive .form.first{
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }
    .container form .title{
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }
    .container form .fields{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    form .fields .input-field{
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    form .fields .input-field1{
        display: flex;
        width: 100%;
        /* width: calc(100% / 3 - 15px); */
        flex-direction: column;
        margin: 4px 0;
    }
    .input-field1 label{
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }

    form .fields .input-field2{
        display: flex;
        width: 100%;
        /* width: calc(100% / 3 - 15px); */
        flex-direction: column;
        margin: 4px 0;
       
    }
    .input-field2 label{
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }
    .input-field2 input, select{
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 90px;
        margin: 8px 0;
    }

    .input-field label{
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }
    .input-field1 input, select{
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }
    .input-field input, select{
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }
    .input-field input :focus,
    .input-field select:focus{
        box-shadow: 0 3px 6px rgba(0,0,0,0.13);
    }
    .input-field select,
    .input-field input[type="date"]{
        color: #707070;
    }
    .input-field input[type="date"]:valid{
        color: #333;
    }
    .container form button, .backBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }
    .container form .btnText{
        font-size: 14px;
        font-weight: 400;
    }
    form button:hover{
        background-color: #265df2;
    }
    form button i,
    form .backBtn i{
        margin: 0 6px;
    }
    form .backBtn i{
        transform: rotate(180deg);
    }
    form .buttons{
        display: flex;
        align-items: center;
    }
    form .buttons button , .backBtn{
        margin-right: 14px;
    }
    
    @media (max-width: 750px) {
        .container form{
            overflow-y: scroll;
        }
        .container form::-webkit-scrollbar{
           display: none;
        }
        form .fields .input-field{
            width: calc(100% / 2 - 15px);
        }
    }
    
    @media (max-width: 550px) {
        form .fields .input-field{
            width: 100%;
        }
    }
    /* .left-column img {
             
            
            margin-left: 20%;
            width: 50%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

    .logo {
            width: 80%;
            height: 80%;
        } */

        

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
        /* .fieldset-column {
            flex: 1;
            margin-right: 20px; 
        } */

        fieldset {
            flex: 1; 
            /* Equal size for all fieldsets */
            /* border: 1px solid #000000; */
           
            /* padding: 10px; */
            /* margin-right: 10px; */
             /* Add some spacing between fieldsets */
        }
      

        .fieldset-container {
            /* display: flex; */
            /* flex-wrap: wrap; */
            /* justify-content: space-between; */
             /* Distribute fieldsets evenly */
             display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size:16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
        }
        
       
      

        

        .container1 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size:16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


.radio-group label {
            /* display: block; */
            margin-right: 30px;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        #specifyInput {
            display: none;
        }

        .underline-input1 {
    width: 50%;
  
    
   
  
    outline: none;
   
}

  

        .responsive-table {
        width: 100%;
        border-collapse: collapse;
    }

    .responsive-table th,
    .responsive-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .responsive-table th {
        background-color: #f2f2f2;
    }

    .responsive-table input[type="text"] {
    width: 100%;
    box-sizing: border-box;
    border: none;
    /* border-bottom: 1px solid #000; */
    padding: 0;
    margin: 0;
    background-color: transparent;
    outline: none; /* Remove outline */
    
}

.aboutme input[type="text"] {
    border: none;
    border-bottom: 1px solid #000;
    padding: 0;
    margin: 0;
    background-color: transparent;
    outline: none; 
    font-size: 14px;
    text-decoration: none;
}

.hidden {
            display: none;
        }

        .visible {
            display: block;
        }

        .indigenousInfo{
            outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
       
        padding: 0 15px;
        height: 42px;
        margin: 8px 0

        }

        .underline-input {
    position: relative;
    width: 50%;
    margin: 8px 0;
}

.underline-input input {
    border: none;
    border-bottom: 1px solid #000; /* Add a bottom border for the underline effect */
    background: none;
    outline: none;
    width: 100%;
}

/* Initially hide the table */
#siblingsTable {
    display: none;
}

/* .input-field input:required {
    border: 1px solid red;
} */



        
    </style>
<body>

    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>STUDENT REGISTRATION FORM</header>

        <form action="#" id="registrationForm">
            <div class="form first">
            <div class="details personal">
                <br>
            <hr>
            <hr>
            <br>
            <!-- <h2>Personal Details</h2>
            <hr> -->

            <div class="fields">

                <div class="input-field">
                    <label for="idNumber">ID Number</label>
                    <input type="text" id="idno" name="idno" required>
                </div>
                

                <div class="input-field">
                    <label for="course">Course</label>
                    <div class="autocomplete-container">
                        <input type="text" name="course" id="course" onkeyup="showSuggestions('course', 'autocomplete-suggestions1')">
                        <!-- Create a container to display autocomplete suggestions for the first input -->
                        <div id="autocomplete-suggestions1" class="autocomplete-popup"></div>
                    </div>
                </div>
                

                <div class="input-field">
                    <label>Year Level</label>
                    <input type="number" id="year" name="year" required>
                </div>




                <div class="input-field">
                    <label>Last Name</label>
                    <input type="text" id="lastname" name="lastname" required >
                </div>
              
                <div class="input-field">
                    <label>First Name</label>
                    <input type="text" id="firstname" name="firstname" required  >
                </div>

                <div class="input-field">
                    <label>Middle Name</label>
                    <input type="text" id="middlename" name="middlename" required >
                </div>

                

                <div class="input-field">
                    <label>Contact Number</label>
                    <input type="text" id="cn" name="cn" required >
                </div>

                <div class="input-field">
                    <label>Email</label>
                    <input type="text" id="email" name="email" required >
                </div>

                <div class="input-field">
                    <label>Civil Status</label>
                    <select required id="cs">
                        <option disabled selected>Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Others</option>
                    </select>
                </div>


                <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" id="dob" name="dob" required >
                </div>

                <div class="input-field">
                    <label>Birth Place</label>
                    <input type="text" id="bp" name="bp" required >
                </div>

                <div class="input-field">
                    <label>Nationality</label>
                    <input type="text" id="nationality" name="nationality" required >
                </div>

                <div class="input-field1">
                    <label>Languages/Dialects youu can read, write, and understand:</label>
                    <input type="text" id="lang" name="lang" required >
                </div>

                <div class="input-field1">
                    <label>House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                    <input type="text" id="address" name="address" required >
                </div>

               

                <h2>Family Background</h2>
                <br>
                <br>
                <div style="width: 100%;">
                <!--  -->
                    <p><b>Whom do you live?</b></p>
                    <br>
                    <div class="radio-group">
                        <label>
                            <input type="radio" id="yesRadio" name="whom" value="yes" onclick="showParentsInput();" required>
                            Parents
                        </label>
                        <label>
                            <input type="radio" id="noRadio" name="whom" value="no" onclick="showGuardianInput();" required>
                            Guardian
                        </label>
                    </div>
                    
                    <br>
                    <div id="inputContainer" style="display: none;">
                        <h3> Father</h3>
                       
                       <!-- <p>Father</p> -->
                       <fieldset style="border:none;">
                            
                            <div class="fields">
                                <div class="input-field">
                                    <label>Last Name</label>
                                    <input type="text" id="Flname" name="Flname" required>
                                </div>
                                <div class="input-field">
                                    <label>First Name</label>
                                    <input type="text" id="Ffname" name="Ffname" required >
                                </div>
                                <div class="input-field">
                                    <label>Middle Name</label>
                                    <input type="text" id="Fmname" name="Fmname" required>
                                </div>
                                <div class="input-field">
                                    <label>Age</label>
                                    <input type="text" id="Fage" name="Fage" required>
                                </div>
                                <div class="input-field">
                                    <label>Occupational</label>
                                    <input type="text" id="Focc" name="Focc" required>
                                </div>
                                <div class="input-field">
                                    <label>Educational Attainment</label>
                                    <input type="text" id="Fedu" name="Fedu" required>
                                </div>

                            </div>
                            
                
                       </fieldset>
                       <hr>
                  

                       <h3> Mother</h3>
                      
                       <!-- <p>Father</p> -->
                       <fieldset style="border:none;">
                            
                            <div class="fields">
                                <div class="input-field">
                                    <label>Last Name</label>
                                    <input type="text" id="Mlname" name="Mlname" required >
                                </div>
                                <div class="input-field">
                                    <label>First Name</label>
                                    <input type="text" id="Mfname" name="Mfname" required >
                                </div>
                                <div class="input-field">
                                    <label>Middle Name</label>
                                    <input type="text" id="Mmname" name="Mmname" required >
                                </div>
                                <div class="input-field">
                                    <label>Age</label>
                                    <input type="text" id="Mage" name="Mage" required >
                                </div>
                                <div class="input-field">
                                    <label>Occupational</label>
                                    <input type="text" id="Mocc" name="Mocc" required >
                                </div>
                                <div class="input-field">
                                    <label>Educational Attainment</label>
                                    <input type="text" id="Medu" name="Medu" required>
                                </div>

                            </div>
                            
                
                       </fieldset>
                    </div>

                    <div id="inputContainerG" style="display: none;">
                        <h3>Guardian</h3>
                       
                       <!-- <p>Father</p> -->
                       <fieldset style="border:none;">
                            
                            <div class="fields">
                                <div class="input-field">
                                    <label>Last Name</label>
                                    <input type="text" id="Glname" name="Glname" required >
                                </div>
                                <div class="input-field">
                                    <label>First Name</label>
                                    <input type="text"  id="Gfname" name="Gfname" required>
                                </div>
                                <div class="input-field">
                                    <label>Middle Name</label>
                                    <input type="text" id="Gmname" name="Gmname" required>
                                </div>
                                <div class="input-field">
                                    <label>Age</label>
                                    <input type="text" id="Gage" name="Gage" required>
                                </div>
                                <div class="input-field">
                                    <label>Occupational</label>
                                    <input type="text" id="Gocc" name="Gocc" required>
                                </div>
                                <div class="input-field">
                                    <label>Educational Attainment</label>
                                    <input type="text" id="Gedu" name="Gedu" required >
                                </div>

                            </div>
                            
                
                       </fieldset>
                       <hr>
                  

                    </div>
                </div>


                <!-- Skip for now -->
                <div style="width: 100%;">
                    <p><b><i>List the names of your siblings (brothers & sisters) 
                        including yourself, arranged from the eldest to the youngest.</i></b></p>
            
                    <br>
                 
                    <label for="total_number"><b>Your total number: </b></label>
                    <select id="total_number" name="total_number" onchange="createTable()" >
                    
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    
                    <br><br>
                    <table id="siblingsTable" class="responsive-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Age</th>
                                <th>Highest Educational Attainment</th>
                                <th>Civil Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sibling rows will be dynamically added here -->
                        </tbody>
                    </table>
                  
                </div>
                
                

              

                <button class="nextBtn" id="nextButton" type="button">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>

                
           
            </div>
           

            <div class="form second">
              
                    <h3>Educational Background</h3>
                    <br>
                    <div class="fields">

                        <div class="input-field">
                            <label for="yearLevel">Year Level</label>
                            <select id="yearLevel" name="yearLevel">
                                <option value="seniorHigh">Senior High </option>
                                <option value="juniorHigh">Junior High </option>
                                <option value="juniorHigh"> Elementary</option>
                                <option value="juniorHigh">Other School Attended/ALS Graduate</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Name of the School</label>
                            <input type="text"  >
                        </div>
                        <div class="input-field">
                            <label>Year Graduated</label>
                            <input type="text"  >
                        </div>

                        <div class="input-field2">
                            <label>Awards Received</label>
                            <input type="text"  >
                        </div>


                    </div>


<!--  end of Skip for now -->
             
               
                
                        <p><b><i>In view of the Indigenous People's Act (RA 8371), Magna Carta for 
                        Persons with Disability (RA 7277, as amended by RA 9442), the (c) Solo Parents 
                        Welfare Act of 2000 (RA 8972), and CHED Memorandum Order 9 s.2013, please answer 
                        the following items:</i></b></p>

                        <br>

                        <p><b>
                            <!-- Are you a member of Indigenous group?</b>  </p>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" id="yesRadio" name="membership" value="yes" />
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" id="noRadio" name="membership" value="no" />
                                    No
                                </label>
                            </div>
                            <br> -->

                            <p>Are you a member of an Indigenous group?</p>
        <div class="radio-group">
            <label>
                <input type="radio" id="yesRadio1" name="membership" value="yes" onclick="showInput();" />
                Yes
            </label>
            <label>
                <input type="radio" id="noRadio1" name="membership" value="no" onclick="hideInput();" />
                No
            </label>
        </div>
        
        <div  class="underline-input" id="indigenousInput" class="hidden">
            <br>
            <label for="indigenousInfo">Please specify:</label>
            <input type="text" id="indigenousInfo" name="indigenousInfo">
            </div>

            
                            
                           
                      
                        <br>

                        <p><b>
                            Are you a person with a disability (PWD)?</b>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" id="yesRadio2" name="pwd" value="yes" />
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" id="noRadio2" name="pwd" value="no" />
                                    No
                                </label>
                            </div>
                            
                        </p>
                        <br>

                        <p><b>
                            Are you a student parent?</b>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" id="yesRadio3" name="studpar" value="yes" />
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" id="noRadio3" name="studpar" value="no" />
                                    No
                                </label>
                            </div>
                            
                        </p>
                        <br>
                        


             
                    <fieldset class="container1">
                        <legend><h3><b>Sources of Financial Support</b></h3></legend>
                  
                        <div class="checkbox-group">
                       

                            <label class="container1">Parents
                                <input type="checkbox" name="src" value="Parents" id="parentsCheckbox">
                                <span class="checkmark"></span>
                            </label>

                       
                            <label class="container1">Self-supporting
                                <input type="checkbox" name="src" value="Self" id="selfCheckbox">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container1">Relatives and/or Guardian
                                <input type="checkbox" name="src" value="Relatives" id="relativesCheckbox" >
                                <span class="checkmark"></span>
                            </label>
                        
                            <!-- <label class="container1">Scholarship; specify: 
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label> -->

                            <label class="container1" onclick="toggleSpecifyBox()">
                                Scholarship
                                <input type="checkbox" name="src" value="Scholarship" id="scholarshipCheckbox">
                                <span class="checkmark"></span>
                            </label>

                                <!-- Specify box -->
                                <div id="specifyBox">
                                    Specify: <input type="text" id="specify" name="specify">
                                </div>
                           <!-- fix -->
                            <label class="container1">Others; specify: 
                                <input type="checkbox"  >
                                <span class="checkmark"></span>
                            </label>
                          
                        </div>

                        <br>
                    </fieldset>
    
                        <!-- Your submit button and other form sections here -->
            

                

                <fieldset>
                    
                    <legend><h3><b>Marital Status of Parents</b></h3></legend>
                        <!-- <legend><b>Marital Status of Parents</b></legend> -->
                        <div class="fieldset-container">
                            <div class="fieldset-column">
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice1" name="maritalStatus" value="married" />
                                        <label for="contactChoice1">Parents are married</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice2" name="maritalStatus" value="annulled" />
                                        <label for="contactChoice2">Marriage is legally annulled</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice3" name="maritalStatus" value="livingTogether" />
                                        <label for="contactChoice3">Parents are not married but are living together</label>
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="fieldset-column">
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice4" name="maritalStatus" value="singleParent" />
                                        <label for="contactChoice4">Single Parent</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice5" name="maritalStatus" value="separated" />
                                        <label for="contactChoice5">Parents are separated (one or both have other partners)</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="contactChoice6" name="maritalStatus" value="widowWidower" />
                                        <label for="contactChoice6">Widow/widower</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </fieldset>
                <br>

                <div class="aboutme">

                    <h2>More about Me:</h2>
                <p>1. The three words that describe me are 
                    <input type="text" id="first" name="first">
                    <input type="text" id="second" name="second">
                    <input type="text" id="third" name="third">
                </p>

                <p>2. My father is
                    <input type="text" id="Fis" name="Fis">
                   
                </p>

                <p>3. My mother is
                    <input type="text">
                </p>
                <p>4. The sibling (kapatid) I am closest to is my
                    <input type="text"  id="Mis" name="Mis">
                    because<input type="text" >
                </p>
                <p>5. When I think about my family I feel
                    <input type="text" id="abtFam" name="abtFam">
                    
                </p>
                <p>6. When I was a child, I
                    <input type="text" id="whenChild" name="whenChild">
                    
                </p>
                <p>7. In school, my teachers are
                    <input type="text" id="teachAre" name="teachAre">
                    
                </p>
                <p>8. My friends don't know that
                    <input type="text" id="freindsDunno" name="freindsDunno">
                    
                </p>
                <p>9. When I think about the future, I
                    <input type="text" id="future" name="future">
                    
                </p>

                <p>10. My greatest goal is
                    <input type="text" id="goal" name="goal">
                    
                </p>
                <br>


                </div>
                <h2>Create Account</h2>
                <br>

                <div class="fields">

                    <div class="input-field">
                        <label>email/usernmame</label>
                        <input type="text" id="eu" name="eu">
                    </div>

                    <div class="input-field">
                        <label>Password</label>
                        <input type="text" id="pass" name="pass">
                    </div>
                    <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="text" id="conpass" name="conpass">
                    </div>
                    
    
                </div>



                

            
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <!-- <button class="nextBtn">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button> -->
                        
                        <!-- <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button> -->

                        <!-- add design -->
                        <input type="submit" class="btn btn-primary" name="submit" class="submit" value="Submit">
                    </div>
            </div> 

            

  
     
           


        </form>  
    </div>

    


    <!-- <script src="script.js"></script> -->

    <script>
        function showInput() {
    var inputElement = document.getElementById("indigenousInput");
    inputElement.classList.remove("hidden");
    inputElement.classList.add("visible");
    inputElement.classList.add("underline"); // Add the underline class
}

function hideInput() {
    var inputElement = document.getElementById("indigenousInput");
    inputElement.classList.remove("visible");
    inputElement.classList.add("hidden");
    inputElement.classList.remove("underline"); // Remove the underline class
}

    </script>


    


    <script>
        function createTable() {
            var totalNumber = document.getElementById("total_number").value;
            var table = document.getElementById("siblingsTable").getElementsByTagName('tbody')[0];
            table.innerHTML = ""; // Clear existing rows
    
            for (var i = 0; i < totalNumber; i++) {
                var row = table.insertRow(i);
                var noCell = row.insertCell(0);
                var lnameCell = row.insertCell(1);
                var fnameCell = row.insertCell(2);
                var mnameCell = row.insertCell(3);
                var ageCell = row.insertCell(4);
                var educCell = row.insertCell(5);
                var civilCell = row.insertCell(6);
    
                noCell.innerHTML = "" + (i + 1);
                lnameCell.innerHTML = '<input type="text" name="lname[]">';
                fnameCell.innerHTML = '<input type="text" name="fname[]">';
                mnameCell.innerHTML = '<input type="text" name="mname[]">';
                ageCell.innerHTML = '<input type="text" name="age[]">';
                educCell.innerHTML = '<input type="text" name="education[]">';
                civilCell.innerHTML = '<input type="text" name="civil[]">';
            }
        }
    </script>
    
    

   

    <script>
        function showParentsInput() {
            document.getElementById("inputContainer").style.display = "block";
            document.getElementById("inputContainerG").style.display = "none"; // Hide Guardian inputs
            enableParentInputs(true); // Enable parent inputs
            enableGuardianInputs(false); // Disable Guardian inputs
        }
    
        function showGuardianInput() {
            document.getElementById("inputContainerG").style.display = "block";
            document.getElementById("inputContainer").style.display = "none"; // Hide Parent inputs
            enableParentInputs(false); // Disable Parent inputs
            enableGuardianInputs(true); // Enable Guardian inputs
        }
    
        function enableParentInputs(enable) {
            const parentInputs = document.querySelectorAll('#inputContainer input[type="text"]');
            parentInputs.forEach(input => {
                input.disabled = !enable;
            });
        }
    
        function enableGuardianInputs(enable) {
            const guardianInputs = document.querySelectorAll('#inputContainerG input[type="text"]');
            guardianInputs.forEach(input => {
                input.disabled = !enable;
            });
        }
    </script>


    
    

  




    





    

<script>
    const form = document.querySelector("form");
    const nextBtn = form.querySelector(".nextBtn");
    const backBtn = form.querySelector(".backBtn");
    const allInput = form.querySelectorAll(".first input");

    nextBtn.addEventListener("click", () => {
        let inputFilled = false;
        
        allInput.forEach(input => {
            if (input.value.trim() !== "") {
                inputFilled = true;
            }
        });

        if (inputFilled) {
            form.classList.add('secActive');
        } else {
            alert("Please fill in all required fields.");
        }
    });

    backBtn.addEventListener("click", () => {
        form.classList.remove('secActive');
    });
</script>

<script>

    // Add a click event listener to the button
document.getElementById("total_number").addEventListener("click", function () {
    // Get the table element
    var table = document.getElementById("siblingsTable");

    // Toggle the table's display style between 'none' and 'table'
    if (table.style.display === "none") {
        table.style.display = "table";
    } else {
        table.style.display = "none";
    }
});


</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get references to form elements
    const form = document.getElementById("registrationForm");
    const nextButton = document.getElementById("nextButton");

    // Add a click event listener to the "Next" button
    nextButton.addEventListener("click", function (e) {
        // Check if the form is valid
        if (form.checkValidity()) {
            // Form is valid, move to the next section
            // You can add your logic here to proceed to the next section
            alert("Form is valid. You can proceed to the next section.");
        } else {
            // Form is not valid, show an error message
            alert("Please fill out all required fields before proceeding.");
        }
    });
});

</script>

<!-- course auto complete -->
<script>
     // autcomplete
     function showSuggestions(inputId, suggestionContainerId) {
    var input = document.getElementById(inputId);
    var inputValue = input.value;
    var suggestionsDiv = document.getElementById(suggestionContainerId);

    if (inputValue.length === 0) {
        suggestionsDiv.style.display = "none";
        return;
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var suggestions = JSON.parse(xmlhttp.responseText); // Assuming your suggestions are returned as a JSON array
            displaySuggestions(suggestions, suggestionsDiv, input);
        }
    };

    xmlhttp.open("GET", "../../backend/autocomplete.php?input=" + inputValue, true);
    xmlhttp.send();
}

function displaySuggestions(suggestions, suggestionsDiv, input) {
    if (suggestions.length === 0) {
        suggestionsDiv.style.display = "none";
        return;
    }

    suggestionsDiv.innerHTML = ""; // Clear previous suggestions

    var ul = document.createElement("ul");
    suggestions.forEach(function (suggestion) {
        var li = document.createElement("li");
        li.textContent = suggestion;
        li.addEventListener("click", function () {
            input.value = suggestion; // Fill in the input field with the selected suggestion
            suggestionsDiv.style.display = "none"; // Hide the suggestions
        });
        ul.appendChild(li);
    });

    suggestionsDiv.appendChild(ul);
    suggestionsDiv.style.display = "block"; // Show the suggestions
}


var textfield4 = document.getElementById('course');
textfield4.addEventListener('input', function () {
    this.value = this.value.toUpperCase();
});



  </script>


<!-- save to database -->

<script>
  $("#registrationForm").on("submit", function (event) {
    var source = "student_side_signup";
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../../backend/register_user.php',
      data: {
        idno: $("#idno").val(),
        firstname: $("#firstname").val(),
        lastname: $("#lastname").val(),
        middlename: $("#middlename").val(),
        course: $("#course").val(),
        year: $("#year").val(),
        cn: $("#cn").val(),
        email: $("#email").val(),
        cs: $("#cs").val(),
        select: $("#select").val(),
        dob: $("#dob").val(),
        bp: $("#bp").val(),
        nationality: $("#nationality").val(),
        lang: $("#lang").val(),
        address: $("#address").val(),
        whom: $("#whom").val(),
        Flname: $("#Flname").val(),
        Ffname: $("#Ffname").val(),
        Fmname: $("#Fmname").val(),
        Fage: $("#Fage").val(),
        Focc: $("#Focc").val(),
        Fedu: $("#Fedu").val(),
        Mlname: $("#Mlname").val(),
        Mfname: $("#Mfname").val(),
        Mmname: $("#Mmname").val(),
        Mage: $("#Mage").val(),
        Mocc: $("#Mocc").val(),
        Medu: $("#Medu").val(),
        Glname: $("#Glname").val(),
        Gfname: $("#Gfname").val(),
        Gmname: $("#Gmname").val(),
        Gage: $("#Gage").val(),
        Gocc: $("#Gocc").val(),
        Gedu: $("#Gedu").val(),
        total_number: $("#total_number").val(),
        siblings: $("#siblings").val(),
        membership: $("#membership").val(),
        indigenousInfo: $("#indigenousInfo").val(),
        pwd: $("#pwd").val(),
        studpar: $("#studpar").val(),
        src: $("#src").val(), // Assuming src is an input element
        maritalStatus: $("#maritalStatus").val(),
        first: $("#first").val(),
        Fis: $("#Fis").val(),
        Mis: $("#Mis").val(),
        abtFam: $("#abtFam").val(),
        whenChild: $("#whenChild").val(),
        teachAre: $("#teachAre").val(),
        freindsDunno: $("#freindsDunno").val(),
        future: $("#future").val(),
        goal: $("#goal").val(),
        eu: $("#eu").val(),
        pass: $("#password").val(),
        source: source
      },
      success: function (data) {
        if (data === "success_student") {
          window.location.href = "../Student_Side/login.php";
          alert("Sign up successful");
        } else {
          alert(data);
        }
      },
      error: function (data) {
        alert("Connection error");
      }
    });
  });
</script>


<!-- <script>
  $("#registrationForm").on("submit", function (event) {
  var source = "student_side_signup";
  event.preventDefault();
  $.ajax({
      type: 'POST',
      url: '../../backend/register_user.php',
      data: {
        idno: $("#idno").val(),//
        firstname: $("#firstname").val(),//
        lastname: $("#lastname").val(),//
        middlename: $("#middlename").val(),//
        contact: $("#cn").val(),
        email: $("#email").val(),
        civil: $("#cs").val(),
        select: $("#select").val(),
        year: $("#year").val(),//
        course: $("#course").val(),//
        date: $("#date").val(),
        dob: $("#dob").val(),
        bp: $("#bp").val(),
        nationality: $("#nationality").val(),
        lang: $("#lang").val(),
        address: $("#address").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        source: source
      },
      success: function (data) {
  
          if (data === "success_student") {
              window.location.href = "../Student_Side/login.php";
              alert("Sign up successful");
          } else {
            alert(data);
          }
        
      }, error: function (data) {
        alert("Connection error");
      }
  });
  });
</script> -->




</body>
</html>