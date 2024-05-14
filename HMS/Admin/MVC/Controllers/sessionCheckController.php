<?php

session_start();

function  sessioncheck(){
	if(empty($_SESSION['id'])){
		return header("location:../../../Home/MVC/Views/home.php");
	}
}



?>