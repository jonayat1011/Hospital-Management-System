<?php
require_once('../Models/alldb.php');
session_start();

function totalDoctors(){

	$numOFtotalDoctors=numOFtotalDoctors();

return $numOFtotalDoctors;
}

function totalPatients(){
	$numOFtotalPatients=numOFtotalPatients();

	return $numOFtotalPatients;
}
function totalAppointments(){
	$numtotalAppointments=numtotalAppointments();

	return $numtotalAppointments;
}

function totalEarning(){
	$numtotalEarning=numtotalEarning();

	return $numtotalEarning;
}


function canceledAppointment(){
	$numOFcanceledAppointment=numOFcanceledAppointment();

	return $numOFcanceledAppointment;
}

function confirmedAppointment(){
	$numOFconfirmedAppointment=numOFconfirmedAppointment();

	return $numOFconfirmedAppointment;
}
function appointmentList($date){
	$res=AllappointmentList($date);

	return $res;
}

function finduser($id){
$res=finduserBYid($id);

    return  $res;
}

function finduserName($id){
$res=finduserBYid($id);

 $row = mysqli_fetch_assoc($res);

    return $row["user_name"];
}
function finduserGender($id){
	$res=finduserBYid($id);

 $row = mysqli_fetch_assoc($res);

    return $row["user_gender"];
}
function finduserAge($id){
	$res=finduserBYid($id);

 $row = mysqli_fetch_assoc($res);

    return $row["user_age"];
}

function getMonthlyAppointmentCounts($year, $month) {
    // Array to store appointment counts for each month

    $res = MonthlyAppointmentCounts($year, $month);
    
    $row = mysqli_fetch_assoc($res);
    $row_num = mysqli_num_rows($res);
    if($row_num == 1){
        $count = $row["count"];
        return $count;
    } else {
        return 0; // No appointments found
    }

}

function getWeeklyAppointmentCounts($year, $month, $week) {
    // Get appointment count for the specified week
    $res = WeeklyAppointmentCounts($year, $month, $week);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $count = $row["count"];
        mysqli_free_result($res); // Free result set
        return $count;
    } else {
        echo "Error: " . mysqli_error($con); // Display error message if query fails
        return 0; // Return 0 if no appointments found or error occurred
    }
}

?>