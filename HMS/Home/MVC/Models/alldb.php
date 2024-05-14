<?php
session_start();
require_once('db.php'); // Assuming this file contains the database connection logic

function Checkusertype($id) {
    $con = conn(); // Assuming this function establishes a database connection
    $id = mysqli_real_escape_string($con, $id); // Escaping user input to prevent SQL injection

    $sql = "SELECT * FROM user WHERE user_id ='$id'";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        return $row["user_type"];
    } else {
        return "invalid";
    }
}

function adminStatus($id, $pass){
    session_start(); // Start session if not started already
    $con = conn(); 
    $id = mysqli_real_escape_string($con, $id); 

    $sql = "SELECT * FROM Admin WHERE admin_id ='$id' and admin_password ='$pass'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        $_SESSION['id'] = $row["admin_id"];
        $_SESSION['name'] = $row["admin_username"];
        return true ;
    } else {
        return false ;
    }
}

function doctorStatus($id, $pass){
    session_start(); // Start session if not started already
    $con = conn(); 
    $id = mysqli_real_escape_string($con, $id); 

    $sql = "SELECT * FROM Doctor WHERE doctor_id ='$id' and doctor_password ='$pass'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        $_SESSION['id'] = $row["doctor_id"];
        $_SESSION['name'] = $row["doctor_username"];
        return true ;
    } else {
        return false ;
    }

}

function patientStatus($id, $pass){
	$con = conn(); 
    $id = mysqli_real_escape_string($con, $id); 

    $sql = "SELECT * FROM Patient WHERE patient_id ='$id' and patient_password ='$pass'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        $_SESSION['id'] = $row["patient_id"];
        $_SESSION['name'] = $row["patient_username"];
        return true ;
    } else {
        return false ;
    }
}

function staffStatus($id, $pass){
	$con = conn(); 
    $id = mysqli_real_escape_string($con, $id); 

    $sql = "SELECT * FROM Staff WHERE staff_id ='$id' and staff_password ='$pass'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        $_SESSION['id'] = $row["staff_id"];
        $_SESSION['name'] = $row["staff_username"];
        return true ;
    } else {
        return false ;
    }

}
/*
if(!staffStatus("4", "4")){
    echo "nooooo";
} 
else{
    echo "yyy";
}
// Example usage of the adminStatus function
*/

?>
