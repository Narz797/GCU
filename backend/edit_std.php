<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';
if (isset($_POST['id']) && isset($_POST['lname'])) {

    $studID = $_POST['id'];
    $lname = $_POST['lname'];

    $sql = "UPDATE student_user SET 
last_name = :last_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':last_name', $lname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['fname'])) {

    $studID = $_POST['id'];
    $fname = $_POST['fname'];

    $sql = "UPDATE student_user SET 
first_name = :first_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':first_name', $fname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['mname'])) {

    $studID = $_POST['id'];
    $mname = $_POST['mname'];

    $sql = "UPDATE student_user SET 
middle_name = :middle_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':middle_name', $mname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['course'])) {

    $studID = $_POST['id'];
    $course = $_POST['course'];

    $sql = "UPDATE student_user SET 
course = :course
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':course', $course, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['YL'])) {

    $studID = $_POST['id'];
    $YL = $_POST['YL'];

    $sql = "UPDATE student_user SET 
Year_level = :Year_level
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Year_level', $YL, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['sec'])) {

    $studID = $_POST['id'];
    $sec = $_POST['sec'];

    $sql = "UPDATE student_user SET 
Section = :Section
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Section', $sec, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['CN'])) {

    $studID = $_POST['id'];
    $CN = $_POST['CN'];

    $sql = $sql = "UPDATE student_user SET 
Contact_number = :Contact_number
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Contact_number', $CN, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['CS'])) {

    $studID = $_POST['id'];
    $CS = $_POST['CS'];

    $sql = "UPDATE student_user SET 
Civil_status = :Civil_status
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Civil_status', $CS, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['bday'])) {

    $studID = $_POST['id'];
    $bday = $_POST['bday'];

    $sql = "UPDATE student_user SET 
birth_date = :birth_date
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':birth_date', $bday, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['bplace'])) {

    $studID = $_POST['id'];
    $bplace = $_POST['bplace'];

    $sql = "UPDATE student_user SET 
Birth_place = :Birth_place
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Birth_place', $bplace, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['nation'])) {

    $studID = $_POST['id'];
    $nation = $_POST['nation'];

    $sql = "UPDATE student_user SET 
Nationality = :Nationality
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Nationality', $nation, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['lang'])) {

    $studID = $_POST['id'];
    $lang = $_POST['lang'];

    $sql = "UPDATE student_user SET 
Languages_and_dialects = :Languages_and_dialects
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Languages_and_dialects', $lang, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['address'])) {

    $studID = $_POST['id'];
    $address = $_POST['address'];

    $sql = "UPDATE student_user SET 
`Address` = :Address
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Address', $address, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Flname'])) {

    $studID = $_POST['id'];
    $Flname = $_POST['Flname'];

    $sql = "UPDATE father SET 
lname = :lname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':lname', $Flname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Ffname'])) {

    $studID = $_POST['id'];
    $Ffname = $_POST['Ffname'];

    $sql = "UPDATE father SET 
fname = :fname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':fname', $Ffname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Fmname'])) {

    $studID = $_POST['id'];
    $Fmname = $_POST['Fmname'];

    $sql = "UPDATE father SET 
mname = :mname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':mname', $Fmname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Fage'])) {

    $studID = $_POST['id'];
    $Fage = $_POST['Fage'];

    $sql = "UPDATE father SET 
age = :age
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':age', $Fage, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Focc'])) {

    $studID = $_POST['id'];
    $Focc = $_POST['Focc'];

    $sql = "UPDATE father SET 
occupation = :occupation
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':occupation', $Focc, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Fcol'])) {

    $studID = $_POST['id'];
    $Fcol = $_POST['Fcol'];

    $sql = "UPDATE father SET 
educ_background = :educ_background
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':educ_background', $Fcol, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Fcn'])) {

    $studID = $_POST['id'];
    $Fcn = $_POST['Fcn'];

    $sql = "UPDATE father SET 
contact = :contact
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':contact', $Fcn, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mlname'])) {

    $studID = $_POST['id'];
    $Mlname = $_POST['Mlname'];

    $sql ="UPDATE mother SET 
lname = :lname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':lname', $Mlname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mfname'])) {

    $studID = $_POST['id'];
    $Mfname = $_POST['Mfname'];

    $sql = "UPDATE mother SET 
fname = :fname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':fname', $Mfname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mmname'])) {

    $studID = $_POST['id'];
    $Mmname = $_POST['Mmname'];

    $sql = "UPDATE mother SET 
mname = :mname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':mname', $Mmname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mage'])) {

    $studID = $_POST['id'];
    $Mage = $_POST['Mage'];

    $sql = "UPDATE mother SET 
age = :age
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':age', $Mage, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mocc'])) {

    $studID = $_POST['id'];
    $Mocc = $_POST['Mocc'];

    $sql ="UPDATE mother SET 
occupation = :occupation
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':occupation', $Mocc, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mcol'])) {

    $studID = $_POST['id'];
    $Mcol = $_POST['Mcol'];

    $sql = "UPDATE mother SET 
educ_background = :educ_background
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':educ_background', $Mcol, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Mcn'])) {

    $studID = $_POST['id'];
    $Mcn = $_POST['Mcn'];

    $sql = "UPDATE mother SET 
contact = :contact
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':contact', $Mcn, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Glname'])) {

    $studID = $_POST['id'];
    $Glname = $_POST['Glname'];

    $sql = "UPDATE guardian SET 
lname = :lname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':lname', $Glname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gfname'])) {

    $studID = $_POST['id'];
    $Gfname = $_POST['Gfname'];

    $sql = "UPDATE guardian SET 
fname = :fname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':fname', $Gfname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gmname'])) {

    $studID = $_POST['id'];
    $Gmname = $_POST['Gmname'];

    $sql = "UPDATE guardian SET 
mname = :mname
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':mname', $Gmname, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gage'])) {

    $studID = $_POST['id'];
    $Gage = $_POST['Gage'];

    $sql = "UPDATE guardian SET 
age = :age
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':age', $Gage, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gocc'])) {

    $studID = $_POST['id'];
    $Gocc = $_POST['Gocc'];

    $sql = "UPDATE guardian SET 
occupation = :occupation
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':occupation', $Gocc, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gcol'])) {

    $studID = $_POST['id'];
    $Gcol = $_POST['Gcol'];

    $sql = "UPDATE guardian SET 
educ_background = :educ_background
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':educ_background', $Gcol, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['Gcn'])) {

    $studID = $_POST['id'];
    $Gcn = $_POST['Gcn'];

    $sql = "UPDATE guardian SET 
contact = :contact
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':contact', $Gcn, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['sen_school'])) {

    $studID = $_POST['id'];
    $sen_school = $_POST['sen_school'];

    $sql = "UPDATE senior_highschool SET 
school_name = :school_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':school_name', $sen_school, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['sen_school_yg'])) {

    $studID = $_POST['id'];
    $sen_school_yg = $_POST['sen_school_yg'];

    $sql = "UPDATE senior_highschool SET 
`year` = :year
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':year', $sen_school_yg, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['sen_school_awards'])) {

    $studID = $_POST['id'];
    $sen_school_awards = $_POST['sen_school_awards'];

    $sql = "UPDATE senior_highschool SET 
awards = :awards
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':awards', $sen_school_awards, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['jun_school'])) {

    $studID = $_POST['id'];
    $jun_school = $_POST['jun_school'];

    $sql = "UPDATE junior_highschool SET 
school_name = :school_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':school_name', $jun_school, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['jun_school_yg'])) {

    $studID = $_POST['id'];
    $jun_school_yg = $_POST['jun_school_yg'];

    $sql = "UPDATE junior_highschool SET 
`year` = :year
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':year', $jun_school_yg, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['jun_school_awards'])) {

    $studID = $_POST['id'];
    $jun_school_awards = $_POST['jun_school_awards'];

    $sql = "UPDATE junior_highschool SET 
`awards` = :awards
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':awards', $jun_school_awards, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['elem_school'])) {

    $studID = $_POST['id'];
    $elem_school = $_POST['elem_school'];

    $sql = "UPDATE elementary_school SET 
`school_name` = :school_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':school_name', $elem_school, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['elem_school_yg'])) {

    $studID = $_POST['id'];
    $elem_school_yg = $_POST['elem_school_yg'];

    $sql = "UPDATE elementary_school SET 
`year` = :year
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':year', $elem_school_yg, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['elem_school_awards'])) {

    $studID = $_POST['id'];
    $elem_school_awards = $_POST['elem_school_awards'];

    $sql = "UPDATE elementary_school SET 
`awards` = :awards
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':awards', $elem_school_awards, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['oth_school'])) {

    $studID = $_POST['id'];
    $oth_school = $_POST['oth_school'];

    $sql = "UPDATE other_school SET 
`school_name` = :school_name
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':school_name', $oth_school, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['oth_school_yg'])) {

    $studID = $_POST['id'];
    $oth_school_yg = $_POST['oth_school_yg'];

    $sql = "UPDATE other_school SET 
`year` = :year
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':year', $oth_school_yg, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['oth_school_awards'])) {

    $studID = $_POST['id'];
    $oth_school_awards = $_POST['oth_school_awards'];

    $sql = "UPDATE other_school SET 
`awards` = :awards
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':awards', $oth_school_awards, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['indige'])) {

    $studID = $_POST['id'];
    $indige = $_POST['indige'];

    $sql = "UPDATE student_user SET 
`IG` = :IG
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':IG', $indige, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['pwd'])) {

    $studID = $_POST['id'];
    $pwd = $_POST['pwd'];

    $sql = "UPDATE student_user SET 
`PWD` = :PWD
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':PWD', $pwd, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['sp'])) {

    $studID = $_POST['id'];
    $sp = $_POST['sp'];

    $sql = "UPDATE student_user SET 
`Student_parent` = :Student_parent
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Student_parent', $sp, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id'])) {

    if(isset($_POST["#MS_pam"])){
        $marital_status = $_POST['#MS_pam'];
    }
    elseif(isset($_POST["#MS_mla"])){
        $marital_status = $_POST['#MS_mla'];
    }
    elseif(isset($_POST["#MS_notm"])){
        $marital_status = $_POST['#MS_notm'];
    }
    elseif(isset($_POST["#MS_sp"])){
        $marital_status = $_POST['#MS_sp'];
    }
    elseif(isset($_POST["#MS_ps"])){
        $marital_status = $_POST['#MS_ps'];
    }
    elseif(isset($_POST["#MS_wid"])){
        $marital_status = $_POST['#MS_wid'];
    }
    $studID = $_POST['id'];

    $sql = "UPDATE student_user SET 
`Marital_status_of_parents` = :Marital_status_of_parents
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':Marital_status_of_parents', $marital_status, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['pass'])) {

    $studID = $_POST['id'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql = "UPDATE `student_user` SET 
`password`= :passwordd
WHERE `stud_user_id` = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':passwordd', $pass, PDO::PARAM_STR);
    $stmt->execute();
}
if (isset($_POST['id']) && isset($_POST['email'])) {

    $studID = $_POST['id'];
    $email =$_POST['email'];

    $sql = "UPDATE student_user SET 
`email` = :email
WHERE stud_user_id = :stud_user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':stud_user_id', $studID, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
}

echo '<script>';
echo "alert('Updated Successfully!');";
// echo 'window.location.href=" ../Student_Side/student-login";';
echo '</script>';
exit;

?>
