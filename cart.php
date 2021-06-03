<?php
session_start();

if(isset($_POST['total_cart_books'])){
	if(isset($_SESSION['cart']))
	echo "(".count($_SESSION['cart']).")";

	exit();
}


if(isset($_POST['id'])){
	var_dump($_POST['id']);
		
		if(isset($_SESSION['cart'])){
			
			$cart = $_SESSION['cart'];

			for($i=0; $i<count($cart); $i++){


				if($_POST['id']===$cart[$i]->id){

					$cart[$i]->count = $cart[$i]->count+1;

				}else{


					$book = new stdClass();
					$book->id=$_POST['id'];
					$book->img_src=$_POST['img_src'];
					$book->title=$_POST['title'];
					$book->author=$_POST['author'];
					$book->price=$_POST['price'];
					$book->count=1;
					
					$_SESSION['cart'][]=$book;

				}

			}

		}else{

			$book = new stdClass();
			$book->id=$_POST['id'];
			$book->img_src=$_POST['img_src'];
			$book->title=$_POST['title'];
			$book->author=$_POST['author'];
			$book->price=$_POST['price'];
			$book->count=1;
			$_SESSION['cart'][]=$book;


		}
	

	echo "(".count($_SESSION['cart']).")";
}

if(isset($_POST['cart'])){

	if(isset($_SESSION['cart'])){

		$my_books=$_SESSION['cart'];

// var_dump(count($my_books));
		for($i=0; $i<count($my_books); $i++){

// var_dump($my_books[$i]);
// echo "------------------------------------------------------------ ";
			
			echo "<div class='container-fluid'>";
			echo "<div class='row'";
			echo "<div class='figure'>";
			echo "<div class='col-md-7'>";
			echo "<figure class='figure'>";
			echo "<img src=".$my_books[$i]->img_src."class='figure-img  img-thumbnail rounded' alt='problem image'>";
			echo "</figure>";
			echo "</div>";
			echo "<div class='col-md-3'>";
				echo "<p>".$my_books[$i]->id."</p>";
			echo "<p>".$my_books[$i]->title."</p>";
			echo "<p>".$my_books[$i]->author."<p>";
			echo "<p>".$my_books[$i]->count."</p>";
			echo "<p>".$my_books[$i]->price."</p>";
			echo "</div><br>";
			echo "<div class='col-md-2'>";
			echo '<div id="x" class="btn btn-secondary btn-sm float-right" onclick="removeItem('.$my_books[$i]->id.')"> X </div><br> ';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}else{
		echo "<div class='no-items-in-cart' style='text-align:center; color:red; font-family:courier; font-size:25px;'>Your cart is empty</div>";
	}


			echo "<div class = 'horizontal'></div>";
			echo "<div class='container-fluid'>";
			echo "<div class='row'";
			echo "<div class='figure'>";
			echo "<div class='col-md-5'>";
			echo "<p>Totali</p>";
			echo "</div>";
			echo "<div class='col-md-3'>";
			echo "</div>";
			echo "<div class='col-md-4'>";
			echo "<div class='btn btn-secondary btn-sm'> perfundo</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";

}

if(isset($_POST['empty_cart'])){
	unset($_SESSION['cart']);
	echo "";
}

if(isset($_POST['remove_book_id'])){

	$id = $_POST['remove_book_id'];

	for($i=0; $i<count($_SESSION['cart']); $i++){
		if($_SESSION['cart'][$i]->id == $id){

			unset($_SESSION['cart'][$i]);

		}
	}
}

?>

