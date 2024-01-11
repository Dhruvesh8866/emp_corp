<?php

require_once ('dbh.php');

session_start();


$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `employee` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

$empid = "";
if(mysqli_num_rows($result) == 1){
	
	$employee = mysqli_fetch_array($id);
//$empid = ($employee['id']);
	
	$_SESSION["id"]= ($employee['id']);

	//echo ("logged in");
	//echo ("$empid");
	
	header("Location: ..//eloginwel.php");
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>