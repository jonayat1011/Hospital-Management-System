<?php

require_once('../Models/alldb.php');
session_start();

function login($id, $pass) {

    if(empty($id) || empty($pass)) {
        $_SESSION['mess'] = "Please Enter Valid ID and Password";
        return false;
    } else {
        $usertype = Checkusertype($id);

        if($usertype == "invalid") {
            $_SESSION['mess'] = "Invalid user ID! Please Enter Valid ID and Password";
            return false;
        } elseif ($usertype == "admin") {
            session_start(); // Start session for adminStatus function
            $Status = adminStatus($id, $pass);
            if(!$Status) {
                $_SESSION['mess'] = "ID and password do not match";
                return false;
            } else {
                header("location: ../../../Admin/MVC/Views/dashboard.php");
                exit;
            }
        } elseif ($usertype == "doctor") {
            session_start(); // Start session for doctorStatus function
            $Status = doctorStatus($id, $pass);
            if(!$Status) {
                $_SESSION['mess'] = "ID and password do not match";
                return false;
            } else {
                header("location: ../../../Admin/MVC/Views/dashboard.php");
                exit;
            }
        } elseif ($usertype == "patient") {
            session_start(); // Start session for patientStatus function
            $Status = patientStatus($id, $pass);
            if(!$Status) {
                $_SESSION['mess'] = "ID and password do not match";
                return false;
            } else {
                header("location: ../../../Admin/MVC/Views/dashboard.php");
                exit;
            }
        } elseif ($usertype == "staff") {
            session_start(); // Start session for staffStatus function
            $Status = staffStatus($id, $pass);
            if(!$Status) {
                $_SESSION['mess'] = "ID and password do not match";
                return false;
            } else {
                header("location: ../../../Admin/MVC/Views/dashboard.php");
                exit;
            }
        } else {
            // Return false for any other cases
            return false;
        }
    }
}
?>
