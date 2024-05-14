<?php
require_once('../Models/alldb.php');
session_start();


function addDoctorToDatabase($name, $id, $password, $age, $gender, $phone, $email) {
    if (empty($name) || empty($id) || empty($password) || empty($age) || empty($gender) || empty($phone) || empty($email)) {
        $_SESSION['AddDoctormess'] = "Please fill in all fields";
        return false;
    } else {
        $res = isDoctorIdExists($id);
        if ($res) {
            $res1 = addDoctorINuser($name, $id, $password, $age, $gender, $phone, $email);
            $res2 = addDoctorINDoctor($name, $id, $password);

            if ($res1 && $res2) {
            	 $_SESSION['AddDoctormess'] = "New doctor was  added successful .";
                return true;
            } else {
                $_SESSION['AddDoctormess'] = "New doctor was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddDoctormess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}

function Search($SearchbyID, $columnName, $userType) {
    $res = Searchuser($SearchbyID);
    if ($res) { // Check if search was successful
        if ($userType == "doctor") {
            return $res[$columnName];
        }
    }
    return null; // Return null if search failed or userType is not "doctor"
}


?>