<?php
ob_start();

include('../header.php');
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
if(isset($_GET['page_no']) && $_GET['page_no']!=""){
	$page_no = $_GET['page_no'];
}
else{
	$page_no = 1;
}

$total_records_per_page = 5;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM books ");

$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

	
$query = "SELECT b.id, b.title, b.author, b.published_date, b.quantity, b.discount, b.price, b.description, b.upload_img, u.firstname From books AS b JOIN users AS u WHERE b.user_id = u.id ORDER BY b.id DESC  LIMIT $offset, $total_records_per_page ";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
	
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
			<h3><strong> All Books </strong></h3>
		</div>
		<div class="image_homepage">
			<table class="table">
				<thead>
					<tr style="background-color: #A4A4A4;">
						<td><input type="checkbox" id="checkAll"></td>
						<td><strong><i>ID</i></strong></td>
						<td style="width: 15%;"><strong><i>Title</i></strong></td>
						<td style="width: 15%;"><strong><i>Author</i></strong></td>
						<td style="width: 15%;"><strong><i>Published Date</i></strong></td>
						<td style="width: 15%;"><strong><i>Quantity</i></strong></td>
						<td style="width: 15%;"><strong><i>Price / Leke </i></strong></td>
						<td style="width: 15%;"><strong><i>Description</i></strong></td>
						<td style="width: 15%;"><strong><i>Image</i></strong></td>
						<td style="width: 15%;"><strong>User Name</strong></td>
						<td></td>
						<!-- TODO -->
						<td><input type="submit" name="submit" value="Delete All" id="deleteAcc" onclick="return confirm('Are you sure to want to delete!')" class="btn btn-danger">
						</td>
	 				</tr>
				</thead>
				<tbody>
					
					<?php
						while ($row=mysqli_fetch_array($result)){
					?>

					<tr class="listview">
						<td class=""><input type="checkbox" class=checkbox value="<?php echo $rows['id']; ?>" name="check[]"></td>
						<td class=""><?php echo $row['id']; ?> </td>
						<td class=""><?php echo $row['title']; ?></td>
						<td class=""><?php echo $row['author']; ?></td>
						<td class=""><?php echo $row['published_date']; ?></td>
						<td class=""><?php echo $row['quantity']; ?></td>
						<td class=""><?php discountPrice($row['price'], $row['discount'])?></td>
						<td class=""><?php trimContent($row['description'],50)?></td>
						<td class=""><img src="<?php echo $row['upload_img']; ?>" width=70px height=70px></td>
						<td class=""><?php echo $row['firstname']; ?></td>
						<td class=""><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> Edit</a></td>
						<td class=""><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete!')"> Delete</a></td> 
					</tr>

					<?php
						}
					?>		

				</tbody>
			</table>
		</div>
	</div>
</div>



<nav aria-label="Page navigation example">
	<ul class="pagination pagination-sm">

		<?php
			if($page_no == 1){ ?>

				<li class="page-item disabled">
		<?php 

			}else{
		?>
			<li class="page-item">
  		<?php } ?>


		<a class="page-link" href="?page_no=<?php echo $previous_page ;?>"><span aria-hidden="true">&laquo;</span>
		<span class="sr-only">Previous</span></a></li>

		<?php

		if ($total_no_of_pages <= 4){   
 		
 			for ($counter = 1; $counter <= $total_no_of_pages; $counter++){

 				if ($counter == $page_no) {

 					echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";

         		}else{

        			echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";

				 }
       		}

		}elseif ($total_no_of_pages > 4 ){

			if($page_no <= 3 ) { 
			 		
				for ($counter = 1; $counter < 4; $counter++){

			 			if ($counter == $page_no) {

			    			echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 

			 			}else{

			           		echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
						}
				}

				echo "<li class='page-item'><a class='page-link'>...</a></li>";
				echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";	
				echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
				
			}elseif($page_no > 3 && $page_no < $total_no_of_pages - 3) { 

				echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
				echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
				echo "<li class='page-item'><a class='page-link'>...</a></li>";

				for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++){ 

					if ($counter == $page_no) {
			 			echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
			 		}else{
			       		echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
					}                  
			       
				}
					echo "<li class='page-item'><a class='page-link'>...</a></li>";
					echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
					echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
			}

			else{
				echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
				echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
				echo "<li class='page-item'><a class='page-link'>...</a></li>";

				for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++){
					if ($counter == $page_no) {
						echo "<li class=' page-item active'><a class='page-link'>$counter</a></li>"; 
					}else{
						echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
					}                   
				}
			}
		}
		?>

	<?php

	if((int)$page_no == (int)$total_no_of_pages){ ?>

		<li class="page-item disabled">
		<?php
	}else{ ?>
		
		<li class="page-item">

	<?php } ?> 

	<a class="page-link" href="<?php echo "?page_no=".$next_page ;?>"><span aria-hidden="true">&raquo;</span>
		<span class="sr-only">Next</span></a></li>

	</ul>
</nav>



<?php
include('../footer.php');
?>

    
    



