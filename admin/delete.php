<?php
	include('connection.php');
	// if(! $conn){
	// 	die("could not connect." .mysqli_error());
	// 	}
	// 		echo "succesful";

	include('session.php');
	echo $role;


	$id=$_GET['id'];
	$query = " DELETE FROM books where id='$id' ";
	$result = mysqli_query($conn, $query);

	// if($result){
	// 	echo "SUCCESFUL";
	// }
	// else{
	// 	echo "Urong";
	// }
			
			include('head.html');
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.container{
			text-align: center;

		}
	</style>
	
</head>
<body>
	
</br>
	<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your id has been delete successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col-sm">
			<form 	action="index.php" method="post">
				<button type="Table" class="btn btn-success btn-block"><span class="glyphicon glyphicon_plus"></span>Table</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>


