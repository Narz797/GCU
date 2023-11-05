<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="register.css">
   <title>Teacher Regisration Form </title>
</head>
<body>

    <!-- Might as well put the header or banner here-->

    <div class="container">
        <header>TEACHER REGISTRATION FORM</header>
        <form action="#" id="registrationForm">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <label for="idNumber">Employee ID Number:</label>
                            <input type="text" id="idNumber" name="idNumber" required>
                        </div>
                        <div class="input-field">
                            <label>College</label>
                            <select required>
                                <option disabled selected>Select College</option>
                                <option>College of Agriculture</option>
                                <option>College of Teacher Education</option>
                                <option>College of Home Economics & Technology</option>
                                <option>College of Forestry</option>
                                <option>College of Nursing</option>
                                <obtion>College of Veterinary Medicine</option>
                                    <option>College of Human Kinetics</option>
                                    <option>College of Public Administration & Governance</option>
                                    <option>College of Information Sciences</option>
                                    <option>College of Arts & Humanities</option>
                                    <option>College of Social Sciences</option>
                                    <option>College of Numeracy & Applied Sciences</option>
                                    <option>College of Natural Sciences</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" required>
                        </div>
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" required>
                        </div>
                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" required>
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="text" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" required>
                        </div>
                        <div class="input-field">
                            <label>Civil Status</label>
                            <select required>
                                <option disabled selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <button>SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>