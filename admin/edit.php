<?php
ob_start();
include("../header.php");	
include('menu_admin.php');

    
$id = $_GET['id'];
$query = "SELECT * FROM books where id=$id";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
	
if(isset($_POST['update'])){
	$title = $_POST['title'];
	$author = $_POST['author'];
	$published_date = $_POST['published_date'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$upload_img = $_POST['upload_img'];

	$fname = $_FILES['fileToUpload']['name'];
	$dst = "../assets/images/" .$fname;
	$dst_db = "../assets/images/" .$fname;


	$edit_query = "UPDATE books SET title='$title', author='$author', published_date='$published_date', quantity='$quantity', price='$price', discount='$discount', description='$description', upload_img='$upload_img' WHERE id='$id' ";
	$edit_result = mysqli_query($conn, $edit_query);

   if($edit_result){
   		mysqli_close($conn);
   		header("location:my.php");
   		exit;
   }
   else{
   	echo mysqli_error();
   }
}

?>

<html>
<head>
</head>
<body>
	
<div class="container">
	<div class="row" >
		<div class="col-md">
			<h2> Welcome to the BookStore</h2>
			<div class="alert alert-success">
				<strong>Good day!</strong> Visit <a href="add.php" target="_blank">BookStore page</a>!
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="#" method="post">
				<table class="table table-hover">
					<tr class="row">
						<td class="col-md-4">Title</td>
						<td class="col-md-8"><input type="text" name="title" class="form-control" required value="<?php echo $row['title']; ?>"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4"> Author</td>
						<td class="col-md-8"><input type="text" name="author" class="form-control" required value="<?php echo $row['author']; ?>"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Published Date</td>
						<td class="col-md-8"><input type="date" name="published_date" class="form-control" value="<?php echo $row['published_date']; ?>"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Sasia</td>
						<td class="col-md-8"><input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Price</td>
						<td class="col-md-7"><input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>"></td>
						<td class="col-md-1">Leke</td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Discount</td>
						<td class="col-md-7"><input type="number" name="discount" class="form-control" value="<?php echo $row['discount']; ?>"></td>
						<td class="col-md-1">%</td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Description</td>
						<td class="col-md-8"><input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>">  </td>
					</tr>
				    <tr class="row">
						<td class="col-md-4"> Choose Photo</td>
						<td class="col-md-8"><form action="upload.php" method="post" enctype="multipart/form-data" value="<?php echo $row['upload_img']; ?>">
							<input type="file" name="upload_img" value="<?php echo $row['upload_img']; ?>">
						    </form>
						</td>
					</tr>
					<tr class="row">
							<td class="col-md-10"></td>
							<td class="col-md-2"><button type="update" name="update" class="btn btn-primary">Update</button>
							</td>
						</tr>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>