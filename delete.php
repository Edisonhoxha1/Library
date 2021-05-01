<?php
	include("../connection.php");
	// if(! $conn){
	// 	die("could not connect." .mysqli_error());
	// 	}
	// 		echo "succesful";

	include('../session.php');
	include('header.php');
	


	$id=$_GET['id'];
	$query = " DELETE FROM books where id='$id' ";
	$result = mysqli_query($conn, $query);

	// if($result){
	// 	echo "SUCCESFUL";
	// }
	// else{
	// 	echo "Urong";
	// }
			
			include('menu_admin.php');
?>


<!-- <html>
<head> -->
	<style type="text/css">
		/*.container{
			text-align: center;

		}*/
	</style>
	
<!-- </head>
<body> -->
	
</br>
	<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your id has been delete successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col-sm">
			<form 	action="homepage_admin.php" method="post">
				<button type="Table" class="btn btn-success btn-block"><span class="glyphicon glyphicon_plus"></span>Table</button>
			</form>
		</div>
	</div>
</div>

<?php
include('footer.php');
?>

