<?php
session_start(); // Ensure the session is started

include '../backend/connect_database.php';
try {   
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $updateFieldsStudent = [];
        $updateFieldsFather = [];
        $updateFieldsMother = [];
        $updateFieldsGuardian = [];
        $parametersStudent = [':id' => $id];
        $parametersFather = [':id' => $id];
        $parametersMother = [':id' => $id];
        $parametersGuardian = [':id' => $id];
    
        // Check if the student fields are set
        if (isset($_POST['course'], $_POST['YL'], $_POST['SEC'], $_POST['CN'], $_POST['CS'], $_POST['Adrs'])) {
            $allowedFieldsStudent = array(
                'course' => $_POST['course'],
                'Year_level' => $_POST['YL'],
                'Section' => $_POST['SEC'],
                'Contact_number' => $_POST['CN'],
                'Civil_status' => $_POST['CS'],
                'Address' => $_POST['Adrs']
            );
    
            // Process student fields
            foreach ($allowedFieldsStudent as $key => $value) {
                if (!empty($value)) {
                    $updateFieldsStudent[] = "`$key` = :$key";
                    $parametersStudent[":$key"] = $value;
                }
            }
        }
    
        // Check if the father fields are set
        if (isset($_POST['Fage'], $_POST['Focc'], $_POST['Fcn'])) {
            $allowedFieldsFather = array(
                'age' => $_POST['Fage'],
                'occupation' => $_POST['Focc'],
                'contact' => $_POST['Fcn']
            );
    
            // Process father fields
            foreach ($allowedFieldsFather as $key => $value) {
                if (!empty($value)) {
                    $updateFieldsFather[] = "`$key` = :$key";
                    $parametersFather[":$key"] = $value;
                }
            }
        }

        if (isset($_POST['Mage']) && isset($_POST['Mocc']) && isset($_POST['Mcn'])) {  
            $allowedFieldsMother = array(
                'age' => $_POST['Mage'],
                'occupation' => $_POST['Mocc'],
                'contact' => $_POST['Mcn']
            );
    
            // Process father fields
            foreach ($allowedFieldsMother as $key => $value) {
                if (!empty($value)) {
                    $updateFieldsMother[] = "`$key` = :$key";
                    $parametersMother[":$key"] = $value;
                }
            }

        }
        if (isset($_POST['Gage']) && isset($_POST['Gocc']) && isset($_POST['Gcn'])) {  
            $allowedFieldsGuardian = array(
                'age' => $_POST['Gage'],
                'occupation' => $_POST['Gocc'],
                'contact' => $_POST['Gcn']
            );
    
            // Process father fields
            foreach ($allowedFieldsGuardian as $key => $value) {
                if (!empty($value)) {
                    $updateFieldsGuardian[] = "`$key` = :$key";
                    $parametersGuardian[":$key"] = $value;
                }
            }
    
        }
    
        // Execute the student update
        if (!empty($updateFieldsStudent)) {
            $sqlStudent = "UPDATE `student_user` SET " . implode(", ", $updateFieldsStudent) . " WHERE stud_user_id = :id";
            $stmtStudent = $pdo->prepare($sqlStudent);
            foreach ($parametersStudent as $key => &$value) {
                if ($key !== ':id') {
                    $stmtStudent->bindParam($key, $value);
                } else {
                    $stmtStudent->bindParam($key, $value, PDO::PARAM_INT);
                }
            }
            $stmtStudent->execute();
        }
    
        // Execute the father update
        if (!empty($updateFieldsFather)) {
            $sqlFather = "UPDATE `father` SET " . implode(", ", $updateFieldsFather) . " WHERE stud_user_id = :id";
            $stmtFather = $pdo->prepare($sqlFather);
            foreach ($parametersFather as $key => &$value) {
                if ($key !== ':id') {
                    $stmtFather->bindParam($key, $value);
                } else {
                    $stmtFather->bindParam($key, $value, PDO::PARAM_INT);
                }
            }
            $stmtFather->execute();
        }

                // Execute the mother update
                if (!empty($updateFieldsMother)) {
                    $sqlMother = "UPDATE `mother` SET " . implode(", ", $updateFieldsMother) . " WHERE stud_user_id = :id";
                    $stmtMother = $pdo->prepare($sqlMother);
                    foreach ($parametersMother as $key => &$value) {
                        if ($key !== ':id') {
                            $stmtMother->bindParam($key, $value);
                        } else {
                            $stmtMother->bindParam($key, $value, PDO::PARAM_INT);
                        }
                    }
                    $stmtMother->execute();
                }

                        // Execute the Guardian update
        if (!empty($updateFieldsGuardian)) {
            $sqlGuardian = "UPDATE `guardian` SET " . implode(", ", $updateFieldsGuardian) . " WHERE stud_user_id = :id";
            $stmtGuardian = $pdo->prepare($sqlGuardian);
            foreach ($parametersGuardian as $key => &$value) {
                if ($key !== ':id') {
                    $stmtGuardian->bindParam($key, $value);
                } else {
                    $stmtGuardian->bindParam($key, $value, PDO::PARAM_INT);
                }
            }
            $stmtGuardian->execute();
        }
    
        $data = array('success' => true);
        echo json_encode($data);
    } else {
        // Handle the case where 'id' is not set
        $data = array('success' => false, 'error' => 'ID not set');
        echo json_encode($data);
    }
    
} catch (PDOException $e) {
    // Log the error for debugging purposes
    $error = "Database error: " . $e->getMessage();
    error_log($error);
    echo $error;
}
?>
