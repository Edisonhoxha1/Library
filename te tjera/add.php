<?php
include('header.php');
// include('session.php');


include("connection.php");
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$author = $_POST['author'];
	$published_date = $_POST['published_date'];
	$sasia = $_POST['sasia'];
	$cmimi = $_POST['cmimi'];
	$upload_img = $_POST['upload_img'];
	$user_id = $user_id;

	$sql = "INSERT INTO books (title, author, published_date, sasia, cmimi, upload_img, user_id) VALUES ('$title', '$author', '$published_date', '$sasia', '$cmimi', '$upload_img','$user_id')";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if($result == false){
		die ("ERROR : Could not connect. " .mysqli_query_error());

	}else{ 
		header("Location:index.php, bookstore.php");
	}
	
}

?>

<html>
<head>
</head>
<body>
	<div class="row">
			<div class="col-sm">
				<h2> Welcome to the BookStore</h2>
					<div class="alert alert-success">
						<strong>Good day!</strong> Visit <a href="add.php" >BookStore page</a>!
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm">
				<form action="#" method="post">
					<table class="table table-hover">
						<tr>
							<td>Title</td>
							<td><input type="text" name="title" class="form-control" required></td>
						</tr>
						<tr>
							<td> Author</td>
							<td><input type="text" name="author" class="form-control" required></td>
						</tr>
						<tr>
							<td>Published Date</td>
							<td><input type="date" name="published_date" class="form-control"></td>
						</tr>
						<tr>
							<td>Sasia</td>
							<td><input type="text" name="sasia" class="form-control"></td>
						</tr>
						<tr>
							<td>Cmimi </td>
							<td><input type="text" name="cmimi" class="form-control"></td>
						</tr>
						<tr>
							<td> Choose Photo</td>
							<td>
						    <form action="upload.php" method="post" enctype="multipart/form-data">
							<input type="file" name="upload_img">
						    </form>
						    </td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit" name="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon_plus"></span> Submit
								</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>

</body>
</html>




