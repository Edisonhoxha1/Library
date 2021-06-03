<?php
include('header.php');
include('functions.php');

//pagination
if(isset($_GET['nr_page']) && $_GET['nr_page']!= ""){

  $nr_page = $_GET['nr_page'];

}else{

  $nr_page = 1;

}

$total_books_per_page = 6 ;

$offset = ($nr_page - 1) * $total_books_per_page;
$previous_page = $nr_page - 1;
$next_page = $nr_page + 1;
$adjacents = "2";

$total_books_nr_query = ("SELECT COUNT(*) FROM books");
$total_books_nr_result = mysqli_query($conn, $total_books_nr_query) or die (mysqli_error($conn));
$total_books_result = mysqli_fetch_array($total_books_nr_result);
$total_books_nr = $total_books_result[0]; // books nr = result book from table books in database

$total_page_nr = ceil($total_books_nr/$total_books_per_page);
$last_page = $total_page_nr;
$second_page = $total_page_nr - 1;
$first_page = 1;


$query = "SELECT * FROM books ORDER BY id DESC LIMIT $offset, $total_books_per_page ";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));


include('menu.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		$.ajax({
		    type:'post',
		    url:'cart.php',
		    data:{
		    	total_cart_books:"totalitems"
		    },
		    success:function(response){
		      document.getElementById("cart_number").innerHTML=response;
		    }
		});
    });


	function cart(id){

		var book ={};

		var img_src =document.getElementById(id+"_image").src;
		var title = document.getElementById(id+"_title").textContent;
		var author = document.getElementById(id+"_author").textContent;
		var price = document.getElementById(id+"_price").textContent;

		$.ajax({
			type: 'post',
			url: 'cart.php',
			data:{
				id : id,
				img_src : img_src,
				title : title,
				author : author,
				price : price
			},
			 success:function(response) {
            	document.getElementById("cart_number").innerHTML=response; 
          	}
		});
	}

	function showCart(){
		$.ajax({
			type : 'post',
			url : 'cart.php',
			data :{
				cart : 'all'
			},
			 success:function(response) {
            	document.getElementById("mycart1").innerHTML=response;
            	// $("#mycart1").slideToggle();
        	}
		});
	}


	function emptyCart(){
		$.ajax({
			type : 'post',
			url : 'cart.php',
			data : {
				empty_cart : "true"
			},
			success:function(response){
				document.getElementById("cart_number").innerHTML=response;
			}

		});

	}

	function removeItem(id){
		$.ajax({
			type : 'post',
			url : 'cart.php',
			data : {
				remove_book_id : id
			},
			success:function(response){
				console.log(response);
				document.getElementById("cart_number").innerHTML=response;
			}

		});
	}
	
	

$(document).ready(function(){
	$("#img_style").each(function(im){
		$(this).attr("width","900")
	});
});


</script>

<!-- 
<script> 
$(document).ready(function(){
  $("#shopping_cart").mouseover(function(){
    $("#mycart1").slideToggle("slow");
  });
});
</script> -->

<div class="container">
	<div class="jumbotron jumbotron-fluid">
    <h3 class="display-5">Wellcome!</h3>
    <?php

     ?>
		<p class="lead"><i>
			"Reading is a conversation. All books talk. But a good book listens as well." <br>
			"A room without books is like a body without a soul."</i>
		</p>
	</div>
</div>


<div class="container-fluid">
	<div class="figure" id="img_style">
		<div class="col-md-12" style="margin-right: 908px;">
			<div class="row">
				<?php
				while ($row = mysqli_fetch_array($result)){
				?>
				<div id="<?php echo $row['id']; ?>" class="col-md-4" style="text-align: center;">
					<figure class="figure">
			          	<a href="single.php?id=<?php echo $row['id']; ?>">
		          			<img src="<?php echo $row['upload_img']; ?>" id="<?php echo $row['id']; ?>_image" class="figure-img img-fluid" >
		  					<figcaption class="figure-caption text-center" id="<?php echo $row['id']; ?>_title"><strong><?php trimContent($row['title'], 10); ?></strong></figcaption> 
		  					<figcaption class="figure-caption text-center" id="<?php echo $row['id']; ?>_author"><strong><?php echo $row['author']; ?></strong></figcaption><br>
		  					<figcaption class="figure-caption text-center" id="<?php echo $row['id']; ?>_price"><strong>
							<?php
			                      discountPrice($row['price'],$row['discount']);
			                ?></strong>
                    		</figcaption>
			          	</a>

	  					<figcaption class="figure-caption text-right">
		  					<p><button type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#exampleModalCenter_<?php echo $row['id']; ?>">
		          				<span class="glyphicon glyphicon-info-sign"></span> Description
		        			   </button>
		        			</p>
			            </figcaption>
						<div class="modal fade" id="exampleModalCenter_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<!-- TODO -->
	  						<div class="modal-dialog modal-dialog-centered" role="document">
	   							<div class="modal-content">
	      							<div class="modal-header d-block">
	      								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          							<span aria-hidden="true">&times;</span>
	        							</button>
	       								<h5 class="modal-title text-center" id="exampleModalLongTitle"><?php trimContent($row['title'], 30); ?></h5>
	      							</div>
	      							<div class="modal-body text-left">
	      								<table>
	      									<tr>
	      										<th>Author:</th>
	      										<td><?php echo $row['author']; ?></td>
	      									</tr>
	      									<tr>
	      										<th>Price:</th>
	      										<td><?php discountPrice($row['price'], $row['discount']) ?></td>
	      									</tr>
	      									<tr>
	      										<th>Short Discription:</th>
	      										<td><?php trimContent($row['description'], 200); ?></td>
	      									</tr>
	      								</table>
	      							</div>
	      							<div class="modal-footer">
	        							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                   					<button class="btn btn-success add-to-cart" type="button" data-dismiss="modal" onclick="cart(<?php echo $row['id']; ?>)"> Add to cart  <svg xmlns
										="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
	        							</button>
	      							</div>
	    						</div>
	  						</div>
						</div>
					</figure>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>




<div class="container-fluid">
	<div class="row text-right">
		<ul class="pagination pagination-sm" >

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



				if($nr_page <=3 || $nr_page >= $second_page - 2){

					for ($counter = 1; $counter <= 3 ; $counter++){

						if ($counter == $nr_page) {

				 				echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";

				         	}else{

				        		echo "<li class='page-item'><a class='page-link' href='?nr_page=$counter'>$counter</a></li>";

				             }

					}

					echo "<li class='page-item'><a class='page-link'> ... </a></li>";
					echo "<li class='page-item'><a class='page-link' href='?nr_page=$second_page'>$second_page</a></li>";
					echo "<li class='page-item'><a class='page-link' href='?nr_page=$last_page'>$last_page</a></li>";


				}elseif($nr_page > 3 && $nr_page < $second_page){

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
					echo "<li class='page-item'><a class='page-link' href='?nr_page=$second_page'>$second_page</a></li>";
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
		        <span class="sr-only">Next</span></a></li></li>

		</ul>
	</div>
</div>


<?php
include('footer.php');
?>


 