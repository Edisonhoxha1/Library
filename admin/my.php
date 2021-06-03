<?php

ob_start();

include("../header.php");

include('../functions.php');

include('menu_admin.php');

if(!isset($_SESSION['email'])){
    header("Location:../login.php");
    die();
}

if(isset($_SESSION['id'])){
	$user_id=$_SESSION['id'];
}


//pagination
if(isset($_GET['nr_page']) && $_GET['nr_page']!=""){
	$nr_page=$_GET['nr_page'];  //page number

}else{

	$nr_page = 1; 
}

$total_books_per_page = 5 ; //books for page

$offset = ($nr_page-1) * $total_books_per_page; 
$previous_page = $nr_page - 1;
$next_page = $nr_page + 1;
$adjacents = "2";

$total_books_nr_query = "SELECT COUNT(*) FROM books WHERE user_id = $user_id " ;
$total_books_nr_result = mysqli_query($conn,$total_books_nr_query) or die (mysqli_error($conn));
$total_books_res = mysqli_fetch_array($total_books_nr_result); //total books number are despayed for all pages
$total_books_nr = $total_books_res[0]; 

$total_page_nr =ceil($total_books_nr / $total_books_per_page); //total page number
$last_page = $total_page_nr;
$second_last = $total_page_nr - 1;
$first_page = 1;

//get all books of this user displayed for one page
$books_of_user_query = "SELECT * FROM books JOIN users WHERE books.user_id = users.id AND books.user_id = $user_id ORDER BY books.id DESC LIMIT $offset, $total_books_per_page "; 
$books_of_user_result = mysqli_query($conn, $books_of_user_query) or die (mysqli_error($conn));

?>
<!-- TODO -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$("#deleteAcc").on("click", function() {
  $(".checkbox input:checked").parent().remove();
});
</script> -->
		
<div class="container col-md-12">	
	<div class="main">
		<div class="title">
			<h3><strong> My Books. </strong></h3>
		</div>
		<div class="img_table">
			<table class="table">
				<thead>
					<tr style="background-color: #A4A4A4;">
						<td><input type="checkbox" id="checkAll"></td>
						<td><strong><i>ID</i></strong></td>
						<td style="width: 20%;"><strong><i>Title</i></strong></td>
						<td style="width: 20%;"><strong><i>Author</i></strong></td>
						<td style="width: 15%;"><strong><i>Published Date</i></strong></td>
						<td style="width: 15%;"><strong><i>Quantity</i></strong></td>
						<td style="width: 15%;"><strong><i>Price</i></strong></td>
						<td style="width: 15%;"><strong><i>Description</i></strong></td>
						<td style="width: 15%;"><strong><i>Image</i></strong></td>
						<td></td>
						<!-- TODO -->
						<td><a href="delete_all.php?id=<?php echo $row['id']; ?>" id="deleteAcc"  onclick="return confirm('Are you sure to want to delete!')" class="btn btn-danger">Delete All</a>
						</td>
	 				</tr>
				</thead>
				<tbody>

					<?php
						while ($row=mysqli_fetch_array($books_of_user_result)){
					?>

					<tr class="listview">
						<td><input type="checkbox" class=checkbox value="<?php echo $rows['id'];?>" name="checkbox"></td>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['author']; ?></td>	
						<td><?php echo $row['published_date']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php discountPrice($row['price'], $row['discount']) ?></td>
						<td><?php trimContent($row['description'], 50) ?></td>
						<td><img src="<?php echo $row['upload_img']; ?>" width=70px height=70px></td>
						<td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> Edit</a></td>
						<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete!')"> Delete</a></td> 
					</tr>

					<?php
						}
					?>		

				</tbody>
			</table>
		</div>
	</div>
</div>


 <ul class="pagination pagination-sm">

 	<?php
 		if($nr_page == 1){ ?>

  			<li class="page-item disabled">
  	<?php 

 		}else{
  	?>
  		<li class="page-item">
  <?php } ?>


  	<a class="page-link" href="?nr_page=<?php echo $previous_page ;?>"><span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span></a></li>

	
	<?php

	if($total_page_nr < 4){

	 		for ($counter = 1; $counter <= $total_page_nr; $counter++){

	 			if ($counter == $nr_page) {

	 				echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";

	         	}else{

	        		echo "<li class='page-item'><a class='page-link' href='?nr_page=$counter'>$counter</a></li>";

	             }
	       	}
	}else{

		if($nr_page <=3 || $nr_page >= $second_last - 2){

			for ($counter = 1; $counter <= 3 ; $counter++){

				if ($counter == $nr_page) {

		 				echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";

		         	}else{

		        		echo "<li class='page-item'><a class='page-link' href='?nr_page=$counter'>$counter</a></li>";

		             }

			}

			echo "<li class='page-item'><a class='page-link'> ... </a></li>";
			echo "<li class='page-item'><a class='page-link' href='?nr_page=$second_last'>$second_last</a></li>";
			echo "<li class='page-item'><a class='page-link' href='?nr_page=$last_page'>$last_page</a></li>";


		}elseif($nr_page > 3 && $nr_page < $second_last){

			echo "<li class='page-item'><a class='page-link' href='?nr_page=1'>1</a></li>";
			echo "<li class='page-item'><a class='page-link' href='?nr_page=2'>2</a></li>";
			echo "<li class='page-item'><a class='page-link'> ... </a></li>";

			for($i=$nr_page; $i <= $nr_page+2; $i++){

					if($i==$nr_page){
						
					echo "<li class='page-item active'><a class='page-link' href='?nr_page=$i'>$i</a></li> ";
				}else{

					echo "<li class='page-item'><a class='page-link' href='?nr_page=$i'>$i</a></li>";
				}
				
			}

			echo "<li class='page-item'><a class='page-link'> ... </a></li>";
			echo "<li class='page-item'><a class='page-link' href='?nr_page=$second_last'>$second_last</a></li>";
			echo "<li class='page-item'><a class='page-link' href='?nr_page=$last_page'>$last_page</a></li>";

		}
	}

	?>

	<?php
	if((int)$nr_page == (int)$total_page_nr){ ?>

		<li class="page-item disabled">
		<?php
	}else{ ?>
		<li class="page-item">

	<?php } ?> 
	
	<a class="page-link" href="<?php echo "?nr_page=".$next_page ;?>"><span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span></a></li>

</ul>

<?php
include('../footer.php');
?>


