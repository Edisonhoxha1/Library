<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "librari_db";

	$conn = mysqli_connect($hostname, $username, $password, $database);
	if($conn == false){
		die ("error." .mysqli_error($conn));
		}
	else{
		echo "succes";
	}
?>