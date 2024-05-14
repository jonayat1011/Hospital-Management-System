<?php
require_once('../Models/alldb.php');
$id=$_POST['id'];
$pass=$_POST['pass'];
$status=add($id,$pass);
if($status)
{
	echo "Add";
}
else
{
	echo "Not possible";
}
?>