<?php
	include("../connection.php");
	// if(! $conn){
	// 	die ('could not connect.' .mysqli_error());
	// }
	// echo "successull";

	// include('session.php');
	include('menu_admin.php');

	$id = $_GET['id'];
	$query = "SELECT * FROM books where id=$id";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result);
	


?>

<?php
	
?>

<?php
	if(isset($_POST['update'])){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$published_date = $_POST['published_date'];
		$sasia = $_POST['sasia'];
		$cmimi = $_POST['cmimi'];
		$upload_img = $_POST['upload_img'];


		

		$edit_query = "UPDATE books SET title='$title', author='$author', published_date='$published_date', sasia='$sasia', cmimi='$cmimi' upload_img='$upload_img' WHERE id='$id' ";
		$edit_result = mysqli_query($conn, $edit_query);

   if($edit_result){
   	mysqli_close($conn);
   	header("location:homepage_admin.php");
   	exit;
   }
   else{
   	echo mysqli_error();
   }
	
}
	
?>

<!-- <html>
<head>
</head>
<body> -->
	<div class="row">
			<div class="col-sm">
				<h2> Welcome to the BookStore</h2>
					<div class="alert alert-success">
						<strong>Good day!</strong> Visit <a href="add.php" target="_blank">BookStore page</a>!
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm">
				<form action="#" method="post">
					<table class="table table-hover">
						<tr>
							<td>Title</td>
							<td><input type="text" name="title" class="form-control" required value="<?php echo $row['title']; ?>"></td>
						</tr>
						<tr>
							<td> Author</td>
							<td><input type="text" name="author" class="form-control" required value="<?php echo $row['author']; ?>"></td>
				
						</tr>
						<tr>
							<td>Published Date</td>
							<td><input type="date" name="published_date" class="form-control" value="<?php $row['published_date']; ?>"></td>
						</tr>
						<tr>
							<td>Sasia</td>
							<td><input type="date" name="sasia" class="form-control" value="<?php $row['sasia']; ?>"></td>
						</tr>
						<tr>
							<td>Cmimi</td>
							<td><input type="date" name="cmimi" class="form-control" value="<?php $row['cmimi']; ?>"></td>
						</tr>
						<tr>
							<td> Choose Photo</td>
							<td>
						    <form action="upload.php" method="post" enctype="multipart/form-data" value="<?php echo $row['upload_img']; ?>">
							<input type="file" name="upload_img" value="<?php echo $row['upload_img']; ?>">
						    </form>
						    </td>
						</tr>
						<tr>
							<td></td>
							<td><button type="update" name="update" class="btn btn-primary">
								<span class="glyphicon glyphicon_plus"></span> Update
								</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>

<?php
include('footer.php');
?>