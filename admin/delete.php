<?php
ob_start();
include("../header.php");

	$id=$_GET['id'];
	$query = " DELETE FROM books where id='$id' ";
	$result = mysqli_query($conn, $query);

	if($result){
		header("Location: my.php");
	}

?>


