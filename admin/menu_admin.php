<?php session_start(); ?>	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	<a class="navbar-brand" href="#">BookStore <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16"><path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/></svg>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
   	</button>
   	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item item"><i><a class="nav-link" href="#">Deliver to <strong>Albania</strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  			<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg> </a></i>
  			</li>
		</ul>
	</div>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item item">
				<a class="nav-link" href="add.php"> Add Books <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="https://www.bing.com/images/search?q=foto+librash&qpvt=foto+librash&form=IGRE&first=1&tsc=ImageBasicHover" target="_blank">Picture of books 
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="my.php" >My Books </a>
			</li>

			<?php 
			if($_SESSION['role']==1){
			?>

			<li class="nav-item">
				<a class="nav-link" href="homepage_admin.php" >All Books </a>
			</li>

			<?php 
			} 
			?>
			
			<?php 
			if($_SESSION['role']==1){
			?>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sites
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="homepage_admin.php">List <span style="font-size:.5em; position:absolute; top:3px; left:2px">Books</span>
					</a>
					<a class="dropdown-item" href="homepage_admin.php"> Edit Books</a>
					<a class="dropdown-item" href="homepage_admin.php">Delete</a>
				</div>
			</li>

			<?php 
			} 
			?>

		</ul>
	</div>
		
	<form class="form-inline my-2 my-lg-2">
		<input class="form-control mr-md-2" type="value" placeholder="Search" aria-label="Search">
		<button class="btn btn-primary my-2 my-sm-0" type="submit">Search </button>
	</form></br>

	<form class="form-inline my-2 my-lg-0">
		<div class="dropdown">
			<button style="margin: 15px;" type="button" class="btn btn-secondary my-2 my-sm-0 dropdown-toggle" data-toggle="dropdown">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg></button>
				<div class="dropdown-menu">
     				<li class="dropdown-header"><strong>Profile</strong></li>
     				<a class="dropdown-item" href="../logout.php">Logout</a>
     			</div>
     	</div>
	</form>
</nav>





