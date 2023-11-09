<?php
session_start();
include '../backend/connect_database.php';
$tid = $_SESSION['session_id'];
if (
    isset($_POST['sid'], $_POST['reasons'])
) {
    $id = $_POST['sid'];
    $transact ='referral';
    


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

    if (count($result) === 0) {
        echo "Not_added";
            
                $query2 = "SELECT CONCAT(`first_name`, ' ', `last_name`) AS `full_name` FROM `teachers` WHERE `employee_id` = ?";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->bindParam(1, $tid);
                $stmt2->execute();
                $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                
                $tname = $result2[0]['full_name']; // Assuming you expect only one result and want the full name as a string
                $tid=$_SESSION['session_id'];
                $sid = $_POST['sid'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $yrlvl = $_POST['year_level'];
                $gender = $_POST['gender'];
                $course = $_POST['course'];
                $cn = $_POST['cn'];
                $reasons = $_POST['reasons'];
                $date = $_POST['datee']; 
            
                // $refer = $_POST['refer'];
                $datetime = new DateTime();
                $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format
            
                $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:sid, :transact_type, :date_created, :status)';
                $sql_2 = 'INSERT INTO referral(`transact_id`, `reason`, `referred`, `teacher_id`) VALUES (:transact_id, :reasons, :refer, :tid)';
                $sql_3 = 'INSERT INTO `tstable`(`student_id`, `teacher_id`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `gender`, `contact_number`, `reason`, `date`,  `refer`, `status`) VALUES (:sid, :tid, :fname, :mname, :lname, :course, :yrlvl, :gender, :cn, :reasons, :date, :tname, :status)';
            
            
                try {
                    $code = $pdo->prepare($sql_1);
                    $code->bindParam(':sid', $sid); // Change :student_id to :sid
                    $code->bindParam(':transact_type', $transact);
                    $code->bindParam(':date_created', $dateCreated);
                    $code->bindParam(':status', $status); // Make sure $status is defined and has a value
                    $code->execute();
                
                    $transact_id = $pdo->lastInsertId();
                    $code = $pdo->prepare($sql_2);
                    $code->bindParam(':transact_id', $transact_id); // Change :transact_id to :transact_id
                    $code->bindParam(':reasons', $reasons);
                    $code->bindParam(':refer', $tname);
                    $code->bindParam(':tid', $tid);
                
                    $code->execute();
                
                    $code = $pdo->prepare($sql_3);
                    $code->bindParam(':sid', $sid);
                    $code->bindParam(':tid', $tid);
                    $code->bindParam(':fname', $fname);
                    $code->bindParam(':mname', $mname);
                    $code->bindParam(':lname', $lname);
                    $code->bindParam(':yrlvl', $yrlvl);
                    $code->bindParam(':gender', $gender);
                    $code->bindParam(':course', $course); 
                    $code->bindParam(':cn', $cn);
                    $code->bindParam(':reasons', $reasons);
                    $code->bindParam(':date', $date);
                    $code->bindParam(':tname', $tname);
                    $code->bindParam(':status', $status); // Make sure $status is defined and has a value
                    $code->execute();
                
                    echo "Data inserted successfully";
                } catch (PDOException $e) {
                    echo "Error inserting data: " . $e->getMessage();
                }
                
            
            


    } else {
        echo "Added";
        $reasons = $_POST['reason'];
        // $refer = $_POST['refer'];
        $datetime = new DateTime();

        $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

        $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:student_id, :transact_type, :date_created, :status)';
        $sql_2 = 'INSERT INTO referral(`transact_id`, `reason`, `referred`, `teacher_id`) VALUES (:transact_id, :reasons, :refer, :tid)';
        try {
            $code = $pdo->prepare($sql_1);
            $code->bindParam(':student_id', $id);
            $code->bindParam(':transact_type', $transact);
            $code->bindParam(':date_created',$dateCreated);
            $code->bindParam(':status',$status);
            $code->execute();
    
            $transact_id = $pdo->lastInsertId();

    if (isset($tname)) {
        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id', $transact_id);
        $code->bindParam(':reasons', $reasons);
        $code->bindParam(':refer', $tname); // Assuming $tname contains the full name
        $code->bindParam(':tid', $tid);
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