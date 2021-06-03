<?php
include('header.php');

$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id='$id' ";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

include('menu.php');
?>

<script type="text/javascript">

  $(document).ready(function(){

    $.ajax({
        type:'post',
        url:'cart.php',
        data:{
         total_cart_books:"totalitems"
        },
        success:function(response){
          console.log(response);
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

</script>


	<div class="jumbotron jumbotron-fluid">
    <h3 class="display-5">Wellcome!</h3>
		<p class="lead"><i>
			"Reading is a conversation. All books talk. But a good book listens as well." <br>
			"A room without books is like a body without a soul."</i>
		</p>
	</div>
</div>

<div class="container" style="text-align: center;">
	<div class="figure">
		<div class="row">
  			<?php
  			while ($row = mysqli_fetch_array($result)){
  			?>
  			<div class="col-md-3 ">
  				<figure class="figure">
    					<img src="<?php echo $row['upload_img']; ?>" id="<?php echo $row['id']; ?>_image" class=" figure-img  img-thumbnail rounded" alt="Image problem.">
          </figure>
        </div>

        <div class="col-md-3">
         <!--  <div class="row"> -->
    					<p id="<?php echo $row['id']; ?>_title" style="text-align: left;"><strong><?php echo $row['title']; ?></strong></p>
    					<p id="<?php echo $row['id']; ?>_author" style="text-align: left;"><strong><?php echo $row['author']; ?></strong></p>
              <p style="text-align: left;"><i>Short desctiption:</i></p>
    					<p style="text-align: left;"><?php echo $row['description']; ?></p>
            <!-- </div> -->
        </div>

        <div class = "vertical"></div>
            <div class=" col-md-5">
               
                  <?php
                  if($row['discount'] == 0){ ?>

                    <p class="page-item disabled">

                  <?php  

                  }else{

                    echo '<p class"page-item">'.$row['discount'].'% discount only for:</p>';

                  }
                  ?>

                <div class="price">
                  <?php
                    if($row['discount'] == 0){ ?>

                      <span class="actual_amount"><?php echo $row['price']; ?> Leke</span>

                    <?php
                    }else{
                    ?>

                      <span class="amount" style=" vertical-align: text-top;"><?php echo $row['price']; ?> Leke</span>
                      <span class="actual_amount"><?php echo $row['price']-($row['discount']/100*$row['price']); ?> Leke</span>

                    <?php  
                    }
                    ?>
                </div>

                <button id="add_to_cart"  class="btn btn-danger btn-block" type="button" onclick="cart(<?php echo $row['id']; ?>)"> Add to cart  <svg xmlns
                      ="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
                </button>
                <button style="margin-top: 20px;" class="btn btn-light btn-block"> Transport within <p style="color: red;"><strong> Albania </strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg></p>
                </button>

                <div class="social_icon">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-google"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                </div>
            </div>
         		<?php
         	}
         		?>
  	</div>
  </div> 
</div>    
