<?php
session_start();
$_SESSION['origin'] = 'Student_Register'; //for register_user.php
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link rel="stylesheet" href="../assets/css/stud_reg.css"> -->
    <link href="../assets/img/GCU_logo.png" rel="icon">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>Student Regisration Form </title>


    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script> -->
</head>
<style>
 
</style>

<body>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>STUDENT REGISTRATION FORM</header>
        <form action="page2.php" method="POST" id="registrationForm" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <hr>
                    <br>
                    <br>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <label for="idno">ID Number</label>
                            <input type="text" name='idno' id="idno" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                        <div class="input-field">
                            <label for='course'>Course</label>
                            <select name='course' id="cs">
                                <option disabled selected>Select Course</option>
                                <option value='BSAB'>Bachelor of Science in Agribusiness</option>
                                <option value='BSA'>Bachelor of Science in Agriculture</option>
                                <option value='BA Comm'>Bachelor of Arts in Communication</option>
                                <option value='BAEL'>Bachelor of Arts in English Language</option>
                                <option value='BAFL'>Bachelor of Arts in Filipino Language</option>
                                <option value='BSABE'>Bachelor of Science in Agriculture and Biosystems Engineering</option>
                                <option value='BSCE'>Bachelor of Science in Civil Engineering</option>
                                <option value='BSEE'>Bachelor of Science in Electrical Engineering</option>
                                <option value='BSIE'>Bachelor of Science in Industrial Engineering</option>
                                <option value='BSF'>Bachelor of Science in Forestry</option>
                                <option value='BSET'>Bachelor of Science in Entrepreneurship</option>
                                <option value='BSFT'>Bachelor of Science in Food Technology</option>
                                <option value='BSHM'>Bachelor of Science in Hospitality Management</option>
                                <option value='BSND'>Bachelor of Science in Nutrition and Dietetics</option>
                                <option value='BSTM'>Bachelor of Science in Tourism Management</option>
                                <option value='BPeD'>Bachelor of Physical Education</option>
                                <option value='BSESS'>Bachelor of Science in Exercise and Sports Sciences</option>
                                <option value='BLIS'>Bachelor in Library and Information Sciences</option>
                                <option value='BSDC'>Bachelor of Science in Development Communication</option>
                                <option value='BSIT'>Bachelor of Science in Information Technology</option>
                                <option value='BS Bio'>Bachelor of Science in Biology</option>
                                <option value='BS Chem'>Bachelor of Science in Chemistry</option>
                                <option value='BSES'>Bachelor of Science in Environmental Science</option>
                                <option value='BS Math'>Bachelor of Science in Mathematics</option>
                                <option value='BSS'>Bachelor of Science in Statistics</option>
                                <option value='BSN'>Bachelor of Science in Nursing</option>
                                <option value='BPA'>Bachelor of Public Administration</option>
                                <option value='BS Psych'>Bachelor of Science in Psychology</option>
                                <option value='BECED'>Bachelor of Early Childhood Education</option>
                                <option value='BEED'>Bachelor of Elementary Education</option>
                                <option value='BSED'>Bachelor of Secondary Education</option>
                                <option value='BTLED'>Bachelor of Technology and Livelihood Education</option>
                                <option value='DVM'>Doctor of Veterinary Medicine</option>
                                <option value='BA Hist'>Bachelor of Arts in History</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Year Level</label>
                            <select id="cs" name='year_level'>
                                <option disabled selected>Select</option>
                                <option value='1'>1st</option>
                                <option value='2'>2nd</option>
                                <option value='3'>3rd</option>
                                <option value='4'>4th</option>
                                <option value='5'>5th</option>
                                <option value='6'>6th</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" id="lastname" name="lastname" required>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" id="middlename" name="middlename" required>
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="text" id="cn" name="cn" value="09" oninput="formatPhoneNumber(this);" placeholder="Please enter only numbers." required>
                        </div>
                        <!-- <div class="input-field">
                            <label>Email</label>
                            <input type="text" id="email" name="email" required>
                        </div> -->
                        <div class="input-field">
                            <label>Year Enrolled</label>
                            <!-- <input type="text" class="form-control" id="year_enroll" name="year_enroll" required/> -->

                            <!-- <input type="text" class="form-control" name="datepicker" id="datepicker"  required/> -->
                            <input type="text" id="year_enroll" name="year_enroll"  required autocomplete="off">
                        </div>
                        <!-- <div class="input-field">
                            <label>Section</label>
                            <input type="data" id="section" name="section" required>
                        </div> -->
                        <div class="input-field">
                            <label for="section">Section</label>
                            <input type="text" id="section" name="section" oninput="capitalizeInput()" required>
                        </div>
                        <div class="input-field">
                            <label>Civil Status</label>
                            <select required id="civs" name='civil_status'>
                                <option disabled selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Sex</label>
                            <select required id="gender" name='gender'>
                                <option disabled selected>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>
                        <div class="input-field">
                            <label>Birth Place</label>
                            <input type="text" id="bp" name="bp" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" id="nationality" name="nationality" required>
                        </div>

                        <div class="input-field1">
                            <label>Languages/Dialects you can read, write, and understand:</label>
                            <input type="text" id="lang" name="lang" required>
                        </div>
                        <div class="input-field1">
                            <label>House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <h2>Family Background</h2>
                        <br>
                        <br>

                        <div style="width: 100%;">

                            <p><b>Whom do you live?</b></p>
                            <br>
                            <div class="radio-group" required>
                                <label>
                                    <input type="radio" id="yesRadio" name="whom" value="parents" onclick="showParentsInput();" required>
                                    Parents
                                </label>
                                <label>
                                    <input type="radio" id="noRadio" name="whom" value="guardian" onclick="showGuardianInput();" required>
                                    Guardian
                                </label>
                            </div>
                            <br>

                            <div id="inputContainer" style="display: none;">
                                <h3> Father</h3>

                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Flname" name="Flname" >
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Ffname" name="Ffname" >
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Fmname" name="Fmname">
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Fage" name="Fage" oninput="this.value = this.value.replace(/[^0-9]/g, '');" >
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Focc" name="Focc" >
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Fedu" name="Fedu" >
                                        </div>
                                        <div class="input-field">
                                            <label>Contact Number</label>
                                            <input type="text" id="Fcontact" name="Fcontact" value="09" oninput="formatPhoneNumber(this);" >
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <h3> Mother</h3>

                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Mlname" name="Mlname" >
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Mfname" name="Mfname" >
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Mmname" name="Mmname" >
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Mage" name="Mage" oninput="this.value = this.value.replace(/[^0-9]/g, '');" >
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Mocc" name="Mocc" >
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Medu" name="Medu">
                                        </div>
                                        <div class="input-field">
                                            <label>Contact Number</label>
                                            <input type="text" id="Mcontact" name="Mcontact" value="09" oninput="formatPhoneNumber(this);" >
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="inputContainerG" style="display: none;">
                                <h3>Guardian</h3>
                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Glname" name="Glname" >
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Gfname" name="Gfname" >
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Gmname" name="Gmname" >
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Gage" name="Gage" oninput="this.value = this.value.replace(/[^0-9]/g, '');" >
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Gocc" name="Gocc" >
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Gedu" name="Gedu" >
                                        </div>
                                        <div class="input-field">
                                            <label>Contact Number</label>
                                            <input type="text" id="Gcontact" name="Gcontact" value="09" oninput="formatPhoneNumber(this);" >
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>
                        </div>

                        <div style="width: 100%;">
                            <p><b><i>List the names of your siblings (brothers & sisters)
                                        including yourself, arranged from the eldest to the youngest.</i></b></p>
                            <br>
                            <label for="total_number"><b>Your total number: </b></label>
                            <select id="total_number" name="total_number" onchange="createTable()">
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
                            <table id="siblingsTable" name='siblings' class="responsive-table">
                                <thead>
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Age</th>
                                        <th>Highest Educational Attainment</th>
                                        <th>Civil Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="buttons"> -->
                <button class="backBtn" onclick="goback()">
                    <i class="uil uil-navigator"></i>
                    <span class="btnText">Back</span>
                </button>
                        <button class="nextBtn" id="next" type="submit" onclick="getTableValues()">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- <script>
    $("#year_enroll").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true 
});
    </script> -->

    <script>
        function goback(){
            window.location.href = "../../home";
        }
        function capitalizeInput() {
            var input = document.getElementById('section');
            input.value = input.value.toUpperCase();
        }
        $("#year_enroll").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>
    <script>
        var insertStatements;
        let siblingsData = [];

        function createTable() {
            var totalNumber = parseInt(document.getElementById("total_number").value);

            var table = document.getElementById("siblingsTable");
            var current_row = table.rows.length - 1;
            if (current_row < totalNumber) {
                table.getElementsByTagName("tbody")[0].innerHTML = "";
                siblingsData = [];

                for (var i = current_row; i < totalNumber; i++) {
                    var row = table.insertRow(i + 1);
                    var names = [{
                            name: 'sib_lname[]',
                            // pattern: /^[a-zA-Z\s]+$/,
                            // placeholder: 'Last Name'
                        },
                        {
                            name: 'sib_fname[]',
                            // pattern: /^[a-zA-Z\s]+$/,
                            // placeholder: 'First Name'
                        },
                        {
                            name: 'sib_mname[]',
                            // pattern: /^[a-zA-Z\s]+$/,
                            // placeholder: 'Middle Name'
                        },
                        {
                            name: 'sib_age[]',
                            // pattern: /^[0-9]+$/,
                            // oninput: onlyNumbersInput
                        },
                        {
                            name: 'sib_educ_attainment[]',
                            options: ['Elementary', 'Highschool', 'College', 'Bachelor\'s Degree', 'Master\'s Degree', 'Doctorate']
                        },
                        {
                            name: 'sib_civil_status[]',
                            options: ['Single', 'Married', 'Divorced', 'Widowed']
                        }
                    ];

                    for (var j = 0; j < 6; j++) {
                        var cell = row.insertCell(j);
                        var input = document.createElement("input");

                        if (names[j].options) {
                            var select = document.createElement("select");
                            select.name = names[j].name;
                            for (var k = 0; k < names[j].options.length; k++) {
                                var option = document.createElement("option");
                                option.value = names[j].options[k];
                                option.text = names[j].options[k];
                                select.appendChild(option);
                            }
                            cell.appendChild(select);
                        } else {
                            input.type = "text";
                            input.name = names[j].name;
                            // input.pattern = names[j].pattern;
                            // input.pattern = /^[a-zA-Z\s]+$/;
                            // input.addEventListener("input", names[j].oninput);
                            cell.appendChild(input);
                        }
                    }
                }
            } else {
                var remove_row = current_row - totalNumber;
                while (remove_row > 0) {
                    table.deleteRow(table.rows.length - 1);
                    remove_row--;
                }
            }
        }

        function onlyNumbersInput() {
            this.value = this.value.replace(/[^0-9]/g, "");
        }

        function getTableValues() {
            var table = document.getElementById('siblingsTable');
            siblingsData = [];

            for (var i = 1; i < table.rows.length; i++) {
                var rowData = {};
                for (var j = 0; j < table.rows[i].cells.length; j++) {
                    var cell = table.rows[i].cells[j];
                    var input = cell.querySelector("input,select");
                    rowData[input.name] = input.value;
                }
                siblingsData.push(rowData);
            }

            // The rest of your AJAX code
        }
    </script>



    <!-- <script>
        function goToPage2() {
            document.getElementById('next').addEventListener('click', function() {
                getTableValues();
            });

        }
    </script> -->

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
        // Add a click event listener to the button
        document.getElementById("total_number").addEventListener("click", function() {
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
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to form elements
            const form = document.getElementById("registrationForm");
            const nextButton = document.getElementById("nextButton");
            // Add a click event listener to the "Next" button
            nextButton.addEventListener("click", function(e) {
                // Check if the form is valid
                if (form.checkValidity());
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
            xmlhttp.onreadystatechange = function() {
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
            suggestions.forEach(function(suggestion) {
                var li = document.createElement("li");
                li.textContent = suggestion;
                li.addEventListener("click", function() {
                    input.value = suggestion; // Fill in the input field with the selected suggestion
                    suggestionsDiv.style.display = "none"; // Hide the suggestions
                });
                ul.appendChild(li);
            });
            suggestionsDiv.appendChild(ul);
            suggestionsDiv.style.display = "block"; // Show the suggestions
        }
        var textfield4 = document.getElementById('course');
        textfield4.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    </script>

    <script>
        document.getElementById("yesRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "block";
            document.querySelector('label[for="indigenousInfo"]').style.display = "block";
        });
        document.getElementById("noRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "none";
            document.querySelector('label[for="indigenousInfo"]').style.display = "none";
        });
    </script>
    <script>
        function toggleSpecifyBox(checkboxId, specifyBoxId) {
            var checkbox = document.getElementById(checkboxId);
            var specifyBox = document.getElementById(specifyBoxId);
            if (checkbox.checked) {
                specifyBox.style.display = "block";
            } else {
                specifyBox.style.display = "none";
            }
        }
    </script>

    <script>
            function formatPhoneNumber(input) {
                // Remove non-numeric characters
                let phoneNumber = input.value.replace(/[^0-9]/g, '');

                // Limit input to 11 digits
                phoneNumber = phoneNumber.slice(0, 11);

                // Ensure that the number starts with "+63"
                if (phoneNumber.length >= 2) {
                    phoneNumber = "09" + phoneNumber.slice(2);
                }

                // Update the input value
                input.value = phoneNumber;
            }
    </script>

    
<!-- <script>
alert

          swal({
                    title: 'pag error',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
          swal({
                    title: 'Page success',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
    

</script> -->


</body>



</html>

