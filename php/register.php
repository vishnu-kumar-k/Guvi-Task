<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user = $_POST['username'];
	$pass = $_POST['password'];
    $email=$_POST['useremail'];
    $number=$_POST['number'];
    $date=$_POST['date'];


    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

    $servername = "guvi.cvvq0uavgzap.eu-north-1.rds.amazonaws.com";
	$username = "admin";
	$password = "administrator";
	$dbname = "guvi";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "insert into auth(username,useremail,userpassword,usernumber,userdob) values('$user','$email','$pass','$number','$date')"; 
	
    $result = $conn->query($sql);

	if ($result) {
    die( json_encode(array('status' => true)));
	} else {
		die ( json_encode(array('status' => false)));
	}

	$conn->close();




$text=$user;


}
