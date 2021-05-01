<?php
	include('connect.php');
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$published_date = $_POST['published_date'];
	}



	$sql = "INSERT INTO books (title, author, published_date) values ('$title', '$author', '$published_date')";
	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	if(! $conn){
		die('not conn' .mysqli_error());

	}
	echo "success";
?>
