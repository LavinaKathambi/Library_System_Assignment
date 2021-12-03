<?php


function con_function(){

	$server1 = 'localhost';
	$uname1 = "root";
	$pass1 = '';
	$db = "LMS"; //Library Management System
	$connection = new mysqli($server1,$uname1,$pass1,$db);

	if ($connection->connect_error){
		echo "<h1>Error in Connection With Database</h1>" ;
		//echo "$conn->connect_error";
		
		die();
	}


	return $connection;

}


function con_close($connection){
	$connection->close;

}




?>
