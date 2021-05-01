<?php 
	include('connection.php');
	// if(! $conn){
	// 	die("urong" .mysqli_error());
	// }
	// echo "succesful";

  include('header.php');
 ?>
<?php   
// 
if(isset($_POST['submit'])){
   session_start();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    

    // $email = $_POST['email'];
    // $password = $_POST['password'];

    $sql = "SELECT * FROM sign_up WHERE email='$email' AND password='$password'";
    $result= mysqli_query($conn, $sql) or die (mysqli_error($conn));


    if(mysqli_num_rows($result) == 1){
    
      while($row=mysqli_fetch_array($result)){
        $role=$row['role'];
      }

      $_SESSION['email'] = $email;

      if($role == 2){
        header("Location: admin/my.php");
      }else{
            header("Location: admin/homepage_admin.php");
      }
    }
}

if(isset($_GET['email']) && isset($_GET['register']) ){ ?>
  <div class="alert alert-success">
    User registered successfuly.<strong> Your email: </strong>
  </div>
<?php

}

 ?>


 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
 
 <!-- <style type="text/css">
     .image_login{
        background-image: url("assets/images/img.jpg");
        background-size: auto;
     }
 </style> -->



</head>
<body class="image_login">
<!-- 	<h2>Sign In</h2></br> -->
 	<!-- <div  class="conteiner">
 		<div class="row">
 			<div class="col-sm"> -->
        <div class="image_login">
                <br><br><br>
          <div align = "center" >
            <div style = " background-color:#D8D8D8 ; width:350px; border: solid 3px #333333; " align = "left">
              <div style = "background-color:grey; color:white; padding:10px; text-align: center; font-size: 25px;"><b>Login</b></div>
                <div style = "margin:30px">

                 	<form action="#" method="post">
                 		<div class="form-group"><i class="glyphicon glyphicon-envelope"></i>
                 		    <label for="email">Email:</label>
                 				<input type="email" class="form-control" name="email" placeholder="Email" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';} ?>>
                 		</div>
                 		<div class="form-group"><i class="glyphicon glyphicon-lock"></i>
                 				<label for="password">Password:</label>
                 				<input type="password" name="password" class="form-control" placeholder="Password">
                 		</div>
                 		<div class="checkbox">
                 				<label><input type="checkbox" name="remember"> Remember me</label>
                 		</div>
                 		<div class="button">
                 				<button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                 		</div>
                 	</form>
                </div>
            </div>
          </div>
        </div>
 </body>
 </html>