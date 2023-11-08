<?php
session_start();
include '../backend/connect_database.php';

$id = $_SESSION['session_id'];// gets stud id from session
$transact = $_SESSION['transact_type'];//gets value of transact_type
$status = 'pending';

if ($transact == 'readmission') {
    $reason = $_POST['reason'];
    $motivation = $_POST['motivation'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    $sql_1 = "INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:student_id, :transact_type, :date_created, :status)";
    $sql_2 = 'INSERT INTO readmission(`transact_id`, `motivation`, `reason`) VALUES (:transact_id, :motivation, :reason)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->bindParam(':status',$status);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':motivation', $reason);
        $code->bindParam(':reason',$motivation);
        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }

} else if ($transact == 'WDS') {
    $reason = $_POST['reason'];
    $statement = $_POST['statement'];
    $explain = $_POST['explain'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    $course_frm = $_POST['course_frm'];
    $course_to = $_POST['course_to'];

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:student_id, :reason, :date_created, :status)';
    
    if ($reason == 'Shifting') {
        $sql_2 = 'INSERT INTO withdrawal(`transact_id`, `reason`, `statement`, `explain`, `shift_from`, `shift_to`) VALUES (:transact_id, :reason, :statement, :explain, :course_frm, :course_to)';
    } else {
        // Modify this SQL statement as needed for non-'Shifting' actions
        $sql_2 = 'INSERT INTO withdrawal(`transact_id`, `reason`, `statement`, `explain`) VALUES (:transact_id, :reason, :statement, :explain)';
    }

    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':date_created', $dateCreated);
        $code->bindParam(':reason', $reason);
        $code->bindParam(':status', $status);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        if ($reason == 'Shifting') {
            $sql_course1 = 'SELECT `Acronym` FROM `courses` WHERE `Acronym` = :course_frm';
            $stmt_course1 = $pdo->prepare($sql_course1);
            $stmt_course1->bindParam(':course_frm', $course_frm);
            $stmt_course1->execute();
            $course_frm_id = $stmt_course1->fetch(PDO::FETCH_COLUMN);

            $sql_course2 = 'SELECT `Acronym` FROM `courses` WHERE `Acronym` = :course_to';
            $stmt_course2 = $pdo->prepare($sql_course2);
            $stmt_course2->bindParam(':course_to', $course_to);
            $stmt_course2->execute();
            $course_to_id = $stmt_course2->fetch(PDO::FETCH_COLUMN);

            if ($course_frm_id === false || $course_to_id === false) {
                echo "Error: One or both course IDs could not be retrieved.";
            } else {
                $code = $pdo->prepare($sql_2);
                $code->bindParam(':transact_id', $transact_id);
                $code->bindParam(':reason', $reason);
                $code->bindParam(':statement', $statement);
                $code->bindParam(':explain', $explain);
                $code->bindParam(':course_frm', $course_frm_id);
                $code->bindParam(':course_to', $course_to_id);
                $code->execute();
                echo "Data inserted successfully for 'Shifting' action";
            }
        } else {
            // Handle other actions (non-'Shifting') here
            $code = $pdo->prepare($sql_2);
            $code->bindParam(':transact_id', $transact_id);
            $code->bindParam(':reason', $reason);
            $code->bindParam(':statement', $statement);
            $code->bindParam(':explain', $explain);
            $code->execute();
            echo "Data inserted successfully for non-'Shifting' action";
        }
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
}

 else if ($transact == 'leave_of_absence') {
    $semester = $_POST['semester'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $reason_leave = $_POST['reason_leave'];
    $do_leave = $_POST['do_leave'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:student_id, :transact_type, :date_created,:status)';
    $sql_2 = 'INSERT INTO absence(`transact_id`, `semester`, `start_year`, `end_year`, `reason`, `leave`) VALUES (:transact_id, :semester, :start, :end, :reason, :do)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->bindParam(':status',$status);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':semester', $semester);
        $code->bindParam(':start', $start_year);
        $code->bindParam(':end', $end_year);
        $code->bindParam(':reason', $reason_leave);
        $code->bindParam(':do',$do_leave);

        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
}
 else if ($transact == 'referral') {
    $tid = $_SESSION['session_id'];

    $query2 = "SELECT CONCAT(`first_name`, ' ', `last_name`) AS `full_name` FROM `teachers` WHERE `employee_id` = ?";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindParam(1, $tid);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    $tname = $result2[0]['full_name']; // Assuming you expect only one result and want the full name as a string
    $tid=$_SESSION['session_id'];
    $sid = $_POST['sid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $yrlvl = $_POST['year_level'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $college = $_POST['colleges'];
    $cn = $_POST['cn'];
    $gp = $_POST['gp'];
    $gpn = $_POST['gpn'];
    $reasons = $_POST['reasons'];

    // $refer = $_POST['refer'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created, status) VALUES (:sid, :transact_type, :date_created, :status)';
    $sql_2 = 'INSERT INTO referral(`transact_id`, `reason`, `referred`, `teacher_id`) VALUES (:transact_id, :reasons, :refer, :tid)';
    $sql_3 = 'INSERT INTO `tstable`(`student_id`, `first_name`, `last_name`, `course`, `college`, `year_level`, `gender`, `contact_number`, `GP_name`, `GP_number`, `reason`, `date`, `refer`, `status`, `teacher_id`) VALUES (:sid, :fname, :lname, :course, :colleges, :yrlvl, :gender, :cn, :gp, :gpn, :reasons, :date_created, :refer, :status, :tid)';


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
        $code->bindParam(':fname', $fname);
        $code->bindParam(':lname', $lname);
        $code->bindParam(':yrlvl', $yrlvl);
        $code->bindParam(':gender', $gender);
        $code->bindParam(':course', $course);
        $code->bindParam(':colleges', $college);  
        $code->bindParam(':cn', $cn);
        $code->bindParam(':gp', $gp);
        $code->bindParam(':gpn', $gpn);
        $code->bindParam(':reasons', $reasons);
        $code->bindParam(':refer', $tname);
        $code->bindParam(':date_created', $dateCreated);
        $code->bindParam(':status', $status); // Make sure $status is defined and has a value
        $code->bindParam(':tid', $tid);
        $code->execute();
    
        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
    

 }
// echo "User ID: " . $id;
$pdo = null;
?>