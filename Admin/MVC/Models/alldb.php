<?php
session_start();
require_once('db.php'); // Assuming this file contains the database connection logic
///// Dashboard 
function Checkusertype($id) {
    $con = conn(); // Assuming this function establishes a database connection
   // $id = mysqli_real_escape_string($con, $id); // Escaping user input to prevent SQL injection

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

function numOFtotalDoctors(){
	$con = conn(); // Assuming this function establishes a database connection
    
    $sql = "SELECT * FROM Doctor";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function numOFtotalPatients(){
	$con = conn(); // Assuming this function establishes a database connection
    

    $sql = "SELECT * FROM Patient";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}


function numtotalAppointments(){

	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}
function numtotalEarning(){
    $con = conn(); // Assuming this function establishes a database connection
    
    // You should enclose "paid" in single quotes as it's a string value
    $sql = "SELECT * FROM Billing WHERE billing_status='paid'";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $num = 0;
    while ($row = mysqli_fetch_assoc($res)) {
    	$num=$num+$row["billing_amount"];
    }
 
    return $num;
}

function numOFcanceledAppointment(){
	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment WHERE appointment_status ='cancelled' ";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function numOFconfirmedAppointment(){
	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment WHERE appointment_status ='confirmed' ";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function AllappointmentList($date){
		$con = conn(); // Assuming this function establishes a database connection

    $sql = "SELECT * FROM Appointment WHERE appointment_date ='$date' ";
    $res = mysqli_query($con, $sql);

 

    return  $res;

}

function finduserBYid($id){
	$con = conn();
	$sql = "SELECT * FROM user WHERE user_id ='$id'";
    $res = mysqli_query($con, $sql);

        return  $res;
}
function MonthlyAppointmentCounts($year, $month){
    $con = conn();
    $sql = "SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = '$year' AND MONTH(appointment_date) = '$month'";

    $res = mysqli_query($con, $sql);

    return  $res;
}

function WeeklyAppointmentCounts($year, $month, $week) {
    $con = conn();
    if($week==1){
    	$start_day=1;
    	$end_day=7;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      if($week==2){
    	$start_day=8;
    	$end_day=14;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }if($week==3){
    	$start_day=15;
    	$end_day=21;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      if($week==4){
    	$start_day=15;
    	$end_day=30;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      

    $res = mysqli_query($con, $sql);

 

    return $res;
}

//print_r(WeeklyAppointmentCounts(2024,5,1)) ;

///// hospital setups
function addDoctorINDoctor($name, $id, $password){
    $con = conn();
    $department_id="";
    $sql = "INSERT INTO `Doctor`(`doctor_id`, `doctor_username`, `doctor_password`, `department_id`) VALUES  ('$id', '$name', '$password', '$department_id')";
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function addDoctorINuser($name, $id, $password, $age, $gender, $phone, $email){
    $con = conn();
    $type="doctor";
     $profilePicture="";
    $sql = "INSERT INTO `user`(`user_id`, `user_name`, `user_type`, `user_age`, `user_gender`, `user_ phone`, `user_email`, `ProfilePicture`) VALUES ('$id', '$name', '$type', '$age', '$gender', '$phone', '$email', '$profilePicture')";
 
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function isDoctorIdExists($id){
   
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    if ($row_num > 0) {
        return false;
    } else {
        return true;
    }
}
/*
if(addDoctorINuser("p2", "49", "p2", 20, "male", 011, "p2@gmail.com") && addDoctorINDoctor("p2", "49", "p2")){
    echo "yyyyyyy";
} else {
    echo "noooooooooooooo";
}

*/


function Searchuser($SearchbyID) {
 
 $con = conn();
     $sql = "SELECT * FROM user WHERE user_id ='$SearchbyID'";
    $res = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($res);
}










 ?>
