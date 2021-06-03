<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
	<a class="navbar-brand" href="#">BookStore <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16"><path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/></svg>
	</a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item item"><i><a class="nav-link" href="#">Deliver to <strong>Albania</strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  			<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg> </a></i>
  			</li>
		</ul>
		<!-- search -->
		<div class="input-group"> 
			<form class="input-group" method="post" action="search.php">
			<input type="search" name="value" class="form-control  rounded" placeholder="Search">
			<div class="input-group-append">
				<button class="btn btn-warning" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
				</button>
			</div>
			</form>
		</div>
		<!-- TODO -->
		<!-- show cart button -->
		<div style="padding: 10px;" > 
			<button id="shopping_cart" class="btn btn-danger" type="button" data-toggle="modal" data-target="#myModal" onclick="showCart()">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg> 
			<div id="cart_number"><span class="align-text-top"></span></div>
			</button>
			<div id="myModal" class="modal fade">
 				 <div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#e6e6ff;">
      						<h4 class="modal-title" >Cart</h4>
      						<button type="button" class="close" data-dismiss="modal">&times;</button>
    					</div>
      					<!-- Modal body -->
						<div id="mycart1"></div>
    
    					<!-- Modal footer -->
				        <div class="modal-footer" style="background-color: #e6e6ff ;">
				          <button type="button" class="btn btn-light" data-dismiss="modal" onclick="emptyCart()">Empty cart</button>
				          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        </div>
 					</div>
  				</div>
			</div>
		</div>

		<!-- login button -->
		<div>
			<a class="btn btn-secondary" href="login.php">Login</a>
		</div>
		
	</div>
</nav>


