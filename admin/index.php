<?php
// session_start();
// if($_SESSION['book']){
// }
// else{
// 	header("Location:login.php");
// }
?>


<?php
include('header.php');


if(!isset($_SESSION['email'])){
      header("location:index.php");
      die();
   }
	
	
	$query_role = "SELECT * FROM books WHERE user_id = $user_id ";
	$books_by_user = mysqli_query($conn, $query_role) or die (mysqli_error($conn));

	

	$query = "SELECT * From books ORDER BY id DESC ";
	$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
	
	

	

?>



<html>
<head>
	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
  	
  	.img{
  		background-image: url("book3.jpg");
  		background-color: #F8ECE0;
  		background-size: auto;
  		/*opacity: 0.5;*/
  	

  	}
  	.h3{
  		margin: 35px;
  		font-size: 50px;
  		 font-family: "Georgia", "Courier New", monospace;
}
  	}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  <script>
  	$(document).ready(function(){
  		$("#checkAll").click(function(){
  			if($(this).is(":checked")){
  				$(".checkItem").prop('checked',true);
  			}
  			else{
  				$(".checkItem").prop('checked',false);
  			}
  		});
  	});
  </script>   
 

</script>
</head>
<body>
	<div class="main">
 <?php 
	// var_dump($_POST['id']);
 				
	// 	if(isset($_POST('submit'))){
	// 		echo "test";
	// 		if(isset($_POST('id'))){
	// 			foreach($_POST['id'] as $id){
	// 				$delete_query = "DELETE FROM books WHERE id='$id'" ;
	// 				$result = mysqli_query($conn, $delete_query);	
	// 			}

	// 		}
	// 	}


	// $sql = "SELECT * FROM books";
	// $result = mysqli_query($conn, $sql);
	 ?> 
	 <div class="h3">
		<h3><strong> All Books. </strong></h3>
	</div>

	
		<div class="img">
		<table class="table">
			<thead>
				<tr style="background-color: #A4A4A4;">
					<td><input type="checkbox" id="checkAll"></td>
					<td style="width: 15%;"><strong><i>Number</i></strong></td>
					<td style="width: 15%;"><strong><i>Title</i></strong></td>
					<td style="width: 15%;"><strong><i>Author</i></strong></td>
					<td style="width: 15%;"><strong><i>Published Date</i></strong></td>
					<td style="width: 15%;"><strong><i>Sasia</i></strong></td>
					<td style="width: 15%;"><strong><i>Cmimi / Leke </i></strong></td>
					<td style="width: 15%;"><strong><i>Image</i></strong></td>
					<td></td>
					<td><input type="submit" name="submit" value="Delete All" onclick="return confirm('Are you sure to want to delete!')" class="btn btn-danger"></td>
 				</tr>
			</thead>
			<tbody>
				<?php
					while ($row=mysqli_fetch_array($result)){
				?>

				<tr class="listview">
					<td><input type="checkbox" class=checkItem value="<?php echo $rows['id']; ?>" name="check[]"></td>
					<td><strong><?php echo $row['id']; ?></strong> </td>
					<td><strong><?php echo $row['title']; ?></strong></td>
					<td><strong><?php echo $row['author']; ?></strong></td>
					<td><strong><?php echo $row['published_date']; ?></strong></td>
					<td><strong><?php echo $row['sasia']; ?></strong></td>
					<td><strong><?php echo $row['cmimi']; ?></strong></td>
					<td><?php echo $row['upload_img']; ?></td>

					<td><strong><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> Edit</a></strong></td>
					<td><strong><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete!')"> Delete</a></strong></td> 
					
				</tr>
				<?php
				}
				?>		

			</tbody>
		</table>
		</div>
	</div>



    
    
   
</body>
</html>


