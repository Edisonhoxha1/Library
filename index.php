<?php
include('connection.php');

$offset=0;
$limit=10;


if(isset($_GET['limit'])){
	$limit =(int)$_GET['limit'];
}

if(isset($_GET['offset'])){
	$offset = (int)$_GET['offset'];
}

$query = "SELECT * FROM books ORDER BY id DESC LIMIT $offset, $limit ";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

$query_number = "SELECT * FROM books";
$result_number = mysqli_query($conn, $query_number) or die (mysqli_error($conn));
$num_rows = mysqli_num_rows($result_number);




?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
Font Awesome CSS
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->



 
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
		<a class="navbar-brand" href="#">BookStore <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16"><path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
		       </svg></a>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item item"><i><a class="nav-link" href="#">Deliver to <strong>Albania</strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  				<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg> </a></i></li>
			</ul>
			<div class="input-group">
				<input type="search" class="form-control rounded " placeholder="Search">
				<button class="btn btn-warning" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
				</button>
			</div>
			<div style="padding: 20px;" >
				<button id="shopping_cart" class="btn btn-danger" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				</svg>
				</button>
			</div>
			<div>
				<button class="btn btn-secondary">Login</button>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
	<div class="jumbotron ">
		<p style="text-align: center; font-size: 30px; color: black; "><i>
			"Reading is a conversation. All books talk. But a good book listens as well." <br>
			"A room without books is like a body without a soul."</i>
		</p>
	</div>
		<div class="figure">
			<div class="row">
			<?php
						while ($row = mysqli_fetch_array($result)){
						?>
			<div class="col-md-3">
				<figure class="figure">
  					<img src="book1.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  					<figcaption class="figure-caption"><strong><?php echo $row['title']; ?></strong></figcaption>
  					<figcaption class="figure-caption"><strong><?php echo $row['author']; ?></strong></figcaption><br>
  					<figcaption class="figure-caption"><?php echo $row['cmimi']; ?></figcaption>
  					<figcaption class="figure-caption text-right">
  					<p><button type="button" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#exampleModalCenter">
          				<span class="glyphicon glyphicon-info-sign"></span> Info
        			   </button>
        			</p>
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  								<div class="modal-dialog modal-dialog-centered" role="document">
   									<div class="modal-content">
      									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLongTitle">Title</h5>
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          									<span aria-hidden="true">&times;</span>
        									</button>
      									</div>
      										<div class="modal-body">Modal ndsfkbdskfn nasjkfdbahfbadhbfhak bsdyiegaihduaeduheaiheyg buhefiugduaheduieafuagfeagfeahfaehfueahfaehfueafae
      										</div>
      								<div class="modal-footer">
        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<!-- button cart   -->      		    <button id="add_to_cart"  class="btn btn-danger" type="button" onclick="add_to_cart()"><svg xmlns="
	                                    http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
        								</button>
      								</div>
    								</div>
  								</div>
							</div>
						</figcaption>

				</figure>
			</div>
	
			<?php
						}
						?>
			</div>
		</div>
	</div>
</div>


		<!--  <div class="row">
			
				<?php
						while ($row = mysqli_fetch_array($result)){
						?>
				<div class="col-md-3">
				<div class="thumbnail" >
					
						<img src="book1.jpg" alt="Nature">
						
						<div  class="caption">
							<p style="font-size: 20px;"><strong><?php echo $row['title']; ?></strong></p>
							<p style="font-size: 15px;"><strong><?php echo $row['author']; ?></strong></p>
							<p><strong><?php echo $row['cmimi']; ?></strong></p>
							
							<p> <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#exampleModalCenter">
          					   		<span class="glyphicon glyphicon-info-sign"></span> Info
        					    </button>
        					</p>
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  								<div class="modal-dialog modal-dialog-centered" role="document">
   									<div class="modal-content">
      									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLongTitle">Title</h5>
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          									<span aria-hidden="true">&times;</span>
        									</button>
      									</div>
      										<div class="modal-body">fesfwjekfnejranfwjanfsakjfnsajkfbsahfmbsanfjsakmbdfsjd df sjdfnskjafsafnskdf</div>
      								<div class="modal-footer">
        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        								<button id="add_to_cart"  class="btn btn-danger" type="button" onclick="add_to_cart()"><i class="fa fa-shopping-cart"></i></button>
      								</div>
    								</div>
  								</div>
							</div>

						</div>
				</div>
				</div>
					<?php
						}
						?>
			
		</div>

		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-end">
		    <li class="page-item disabled" id="btn_previous" >
		      <a class="page-link" href="http://localhost/librari/bookstore.php?offset=<?php echo $offset-$limit; ?>&&limit<?php echo $limit; ?>" tabindex="-1">Previous</a>
		    </li>
		    <li class="page-item"><a class="page-link" href="http://localhost/librari/bookstore.php?offset=0&&limit=<?php echo $limit; ?>">1</a></li>
		    
		    <li class="page-item"><a class="page-link" href="http://localhost/librari/bookstore.php?offset=4&&limit=<?php echo $limit; ?>">2</a></li>
		   
		    <li class="page-item"><a class="page-link" href="http://localhost/librari/bookstore.php?offset=8&&limit=<?php echo $limit; ?>">3</a></li>



		 
		    <li class="page-item" id="next_btn">
		      <a class="page-link" href="http://localhost/librari/bookstore.php?offset=<?php echo $offset+$limit; ?>&&limit<?php echo $limit; ?>">Next</a>
		    </li>
		  </ul>
		</nav>


	</div>

 -->

<?php
include('footer.php');
?>


 <!-- <script type="text/javascript">
  	function add_to_cart(){
  		console.log("erdhi");
  		var items_nr = document.getElementById('items').value();
  		console.log(items_nr);

  	}

  	window.onload = function(){
  		var offset = "<?php echo $offset ;?>";
  		var btn_previous = document.getElementById("btn_previous");
  		if(offset!=0){
  			btn_previous.classList.remove("disabled");

  		}
  		var next_btn = document.getElementById("next_btn");
  		var num_rows = "<?php echo $num_rows; ?>"
console.log(offset, num_rows);
  		if(Number(offset) >= Number( num_rows)){
  			
  			
  			next_btn.classList.add("disabled");
  		}
  	}

  	// window.onload = function(){
  	// 	var offset_1 = "<?php echo $offset; ?>";
  	// 	var next_btn = document.getElementById("next_btn");
  	// 	if(offest_1 >= $result_number){
  	// 		next_btn.classList.add("disabled");


  	// 	}
  	// }

  	

  </script> -->

