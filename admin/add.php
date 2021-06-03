<?php
ob_start();

include("../header.php");
include('menu_admin.php');

if(!isset($_SESSION['email'])){
    header("Location:../login.php");
    die();
}

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$author = $_POST['author'];
	$published_date = $_POST['published_date'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$upload_img = $_POST['upload_img'];
	$user_id = $_SESSION['id'];

	$fname = $_FILES['fileToUpload']['name'];
	$dst = "../assets/images/" .$fname;
	$dst_db = "../assets/images/" .$fname;

	move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$dst);

   
	$sql = "INSERT INTO books (title, author, published_date, quantity, price, discount, description, user_id) VALUES ('$title', '$author', '$published_date', '$quantity', '$price','$discount', '$description','$user_id')";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  

	if($result == false){
		die ("ERROR : Could not connect. " .mysqli_query_error());

	}else{ 

		header("Location: my.php");
	}
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2> Welcome to the BookStore</h2>
				<div class="alert alert-success">
					<strong>Good day!</strong> Visit <a href="add.php" >BookStore page</a>!
				</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="#" method="post" enctype="multipart/form-data">
				<table class="table table-hover">
					<tr class="row">
						<td class="col-md-4">Title</td>
						<td class="col-md-8"><input type="text" name="title" class="form-control" required></td>
					</tr>
					<tr class="row">
						<td class="col-md-4"> Author</td>
						<td class="col-md-8"><input type="text" name="author" class="form-control" required></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Published Date</td>
						<td class="col-md-8"><input type="date" name="published_date" class="form-control"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Quantity</td>
						<td class="col-md-8"><input type="number" name="quantity" class="form-control"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Price </td>
						<td class="col-md-7"><input type="number" name="price" class="form-control"></td>
						<td class="col-md-1">Leke</td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Discount</td>
						<td class="col-md-7"><input type="number" name="discount" class="form-control"></td>
						<td class="col-md-1">%</td>
					</tr>
					<tr class="row">
						<td class="col-md-4">Description </td>
						<td class="col-md-8"><input type="text" name="description" class="form-control"></td>
					</tr>
					<tr class="row">
						<td class="col-md-4"> Choose Photo</td>
						<td class="col-md-8"> <input type="file" name="fileToUpload" value=""/></td>
					</tr>
					<tr class="row">
						<td class="col-md-10"></td>
						<td class="col-md-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>


<?php
include('../footer.php');
?>


