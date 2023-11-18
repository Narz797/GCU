<?php
session_start();
include '../backend/connect_database.php';
$tid = $_SESSION['session_id'];
if (
    isset($_POST['sid'], $_POST['reasons'])
) {
    $id = $_POST['sid'];
    $transact ='referral';
    $TCN = $_POST['Tcn'];
    $Temail = $_POST['TeachEmail'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s');
    


    // Use prepared statements with PDO
    $query2 = "SELECT CONCAT(`first_name`, ' ', `last_name`) AS `full_name` FROM `teachers` WHERE `employee_id` = ?";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindParam(1, $tid);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    $tname = $result2[0]['full_name']; // Assuming you expect only one result and want the full name as a string
    

    $query = "SELECT * FROM `student_user` WHERE `stud_user_id` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $status = 'pending';
    $reasons = $_POST['reasons'];

    if (count($result) === 0) {
        echo "Not_added";
        $RUR = 'Unregistered';
            
                $query2 = "SELECT CONCAT(`first_name`, ' ', `last_name`) AS `full_name` FROM `teachers` WHERE `employee_id` = ?";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->bindParam(1, $tid);
                $stmt2->execute();
                $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                
                $tname = $result2[0]['full_name']; // Assuming you expect only one result and want the full name as a string
                $RUR = 'Unregistered';
                $tid=$_SESSION['session_id'];
                $sid = $_POST['sid'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $yrlvl = $_POST['year_level'];
                $gender = $_POST['gender'];
                $course = $_POST['course'];
                $cn = $_POST['cn'];
                $rem = $_POST['rem'];
                $date = $_POST['datee']; 
                $transact ='referral';
            
                // $refer = $_POST['refer'];
                $datetime = new DateTime();
                $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format
            
                $sql_1 = 'INSERT INTO transact(student_id, transact_type, teacher_id, date_created, status) VALUES (:sid, :reasons, :tid,  :date_created, :status)';
                $sql_2 = 'INSERT INTO referral(`transact_id`, `stud_id`, `reason`, `remarks`, `Dates_for_AbsentTardy`, `referred`, `teacher_id`, `reg`) VALUES (:transact_id, :sid, :reasons, :rem, :date, :refer, :tid, :RUR)';
                $sql_3 = 'INSERT INTO `tstable`(`student_id`, `teacher_id`,  `transact_id`, `email`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `gender`, `contact_number`, `reason`, `date`,  `refer`, `status`) VALUES (:sid, :tid, :transact_id, :email, :fname, :mname, :lname, :course, :yrlvl, :gender, :cn, :reasons, :date, :tname, :status)';
            
            
                try {
                    $code = $pdo->prepare($sql_1);
                    $code->bindParam(':sid', $sid);
                    $code->bindParam(':tid', $tid); 
                    $code->bindParam(':reasons', $transact);
                    $code->bindParam(':date_created', $dateCreated);
                    // 
                    $code->bindParam(':status', $status);
                    $code->execute();
                
                    $transact_id = $pdo->lastInsertId();
                    $code = $pdo->prepare($sql_2);
                    $code->bindParam(':transact_id', $transact_id);
                    $code->bindParam(':sid', $sid);
                    $code->bindParam(':reasons', $reasons);
                    $code->bindParam(':rem', $rem);
                    $code->bindParam(':date', $date);
                    $code->bindParam(':refer', $tname);
                    $code->bindParam(':tid', $tid);
                    $code->bindParam(':RUR', $RUR);
                    $code->execute();
                
               
                    $code = $pdo->prepare($sql_3);
                    $code->bindParam(':sid', $sid);
                    $code->bindParam(':tid', $tid);
                    $code->bindParam(':transact_id', $transact_id);
                    $code->bindParam(':email', $Temail);
                    $code->bindParam(':fname', $fname);
                    $code->bindParam(':mname', $mname);
                    $code->bindParam(':lname', $lname);
                    $code->bindParam(':course', $course);
                    $code->bindParam(':yrlvl', $yrlvl);
                    $code->bindParam(':gender', $gender); 
                    $code->bindParam(':cn', $cn);
                    $code->bindParam(':reasons', $reasons);
                    $code->bindParam(':date', $dateCreated);
                    $code->bindParam(':tname', $tname);
                    $code->bindParam(':status', $status); // Make sure $status is defined and has a value
                    $code->execute();
                
                    echo "Data inserted successfully";
                } catch (PDOException $e) {
                    echo "Error inserting data: " . $e->getMessage();
                }
                
            
            


    } else {
        echo "Added";
       
        $RUR = 'Registered';
        $sid = $_POST['sid'];
        // $refer = $_POST['refer'];
        $date = $_POST['datee'];  // Convert DateTime to a string in MySQL DATETIME format
        $rem = $_POST['rem'];

        $sql_1 = 'INSERT INTO transact(student_id, transact_type, teacher_id, date_created, status) VALUES (:student_id, :transact_type, :tid,  :date_created, :status)';
        $sql_2 = 'INSERT INTO referral(`transact_id`, `stud_id`, `reason`, `remarks`, `Dates_for_AbsentTardy`,  `referred`, `teacher_id`, `reg`) VALUES (:transact_id, :sidd, :reasons, :rem, :date, :refer, :tid, :RUR)';
        try {
            $code = $pdo->prepare($sql_1);
            $code->bindParam(':student_id', $id);
            $code->bindParam(':tid', $tid); 
            $code->bindParam(':transact_type', $transact);
            $code->bindParam(':date_created', $dateCreated);
            $code->bindParam(':status',$status);
            $code->execute();
    
            $transact_id = $pdo->lastInsertId();

    if (isset($tname)) {
        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id', $transact_id);
        $code->bindParam(':sidd', $sid);
        $code->bindParam(':reasons', $reasons);
        $code->bindParam(':rem', $rem);
        $code->bindParam(':date', $date);
        $code->bindParam(':refer', $tname); // Assuming $tname contains the full name
        $code->bindParam(':tid', $tid);
        $code->bindParam(':RUR', $RUR);
        $code->execute();
    }
    
            echo "Data inserted successfully";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    
        
    }
} else {
    echo "Missing data fields.";
}
?>