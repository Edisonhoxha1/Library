 						
<?php 
	include('connection.php');
	// if(! $conn){
	// 	die("urong" .mysqli_error());
	// }
	// echo "succesful";
  
 ?>
<?php 


if(isset($_POST['submit'])){
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$role = 2;




	$if_user_exist = "SELECT * FROM sign_up WHERE email='$email' ";
	$res = mysqli_query($conn, $if_user_exist) or die (mysqli_error($conn));
		
	if(mysqli_num_rows($res) > 0){ ?>

		<div class="alert alert-danger">
		 <strong>"This user exist"</strong>
		</div>
    <?php
	}
	else{

		$sql = "INSERT INTO sign_up (firstname, lastname, email, password , role) VALUES ('$firstname','$lastname', '$email', '$password','$role')";
		
		if(mysqli_query($conn, $sql)){
			 header("Location: login.php?register=success&email=".$email);
		}

		// echo "Registerd succesfuly";
    }

}

 ?>
 <?php
//  session_start();
// if($_SERVER["REQUEST METHOD"] == "POST"){




//     echo "Username entered is: ". $firstname . "<br />";
//     echo "Password entered is: ". $email;
// }
?>

 <!DOCTYPE html>
 <html lang="en">
 <?php
 include('header.php');
 ?>
 
 	<meta name="viewport" content="width=device-width, initial-scale=1">
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

    	<script type="text/javascript">
    		function controlPassword(){
    			var password = document.getElementById('password').value;
    			
    			var confirm_password = document.getElementById('confirm_password').value;
    			

    			if(password !== confirm_password){
    				document.getElementById('miss_match_password').innerHTML='<div class="alert alert-danger" role="alert">Password does not match!</div>';
    				document.getElementById('button').disabled=true;
    				
    			}

    		}

    		function validatePassword(){
    			var password = document.getElementById('password').value;
    			var validation=  /^[0-9a-zA-Z]+$/;
    			var n = password.length;

    			if(n<3 || !password.match(validation)){
    				document.getElementById("invalid_password").innerHTML='<div class="alert alert-danger" role="alert">Invalid Password!</div>';
    			}

    			
    		}

    		function manage(txt){
    			var bt = document.getElementById('submit');
    			var ele = document.getElementsByTagName('input'); 
    			

    			for(let i=0; i<ele.length; i++){
    				

    				if(ele[i].type == 'text' && ele[i].value == "" ){
    					bt.disabled = true;
    					return false;
    				}
    				else{
    					bt.disabled = false;
    				}
    			 }
    		}

//     		function invalid(){
//     			var class_div = document.getElementByClassName('invalid-feedback');
//     			var class_input = document.getElementByTagName('input');
// console.log(class_input);
//     			for(let i=0; i<class_input.length; i++){

//     				if(class_input[i].type == 'text' && class_input[i].value == ""){
    					
//     					document.getElementByClassName('invalid-feedback').onkeyup =function(){
//     						replaceClass('valid-feedback');
//     					}
//     			}
//     		}


    </script>

 
</head>
<body class="image_registered">
	<!-- <h2>Sign Up</h2></br>
 	<div class="conteiner">
 		<div class="row">
 			<div class="col-sm-3"> -->
<br><br><br>
    <div align="center">
     <div style = " background-color:#D8D8D8 ; width:350px; border: solid 3px #333333; " align = "left">
         <div style = "background-color:grey; color:white; padding:10px; text-align: center; font-size: 25px;"><b>Sign Up</b></div>
          <div style = "margin:30px">
            
 				<form  class="was-validated" action="#" method="post" name="myForm">
 					<div class="form-group"><i class="glyphicon glyphicon-user"></i> 
 						<label for="validationServerFirstname" class="form-label">Firstnane:</label>
 						<input type="firstname" class="form-control is-invalid" id="name" required name="firstname" onkeyup="manage(this)" placeholder="Firstnane">
 						<div  id="please" onkeyup="invalid()" class="invalid-feedback" >
 							Please choose your Firstname
 						</div>
 					</div>
 					<div class="form-group"><i class="glyphicon glyphicon-user"></i> 
 						<label for="validationServerLastname" class="form-label">Lastname:</label>
 						<input type="lastname" class="form-control is-invalid" name="lastname" required  onkeyup="manage(this)" placeholder="Lastname">
 						<div id="validationServerLastname" onkeyup="invalid()" class="invalid-feedback">
 							Please choose your Lastname
 						</div>
 					</div>
 					<div class="form-group"><i class="glyphicon glyphicon-envelope"></i>
 						 <label for="email">Email:</label>
 						 <div id="invalid_email"></div>
 						<input type="email" class="form-control is-invalid" id="email" name="email" required onkeyup="manage(this)" placeholder="Email">
 						<div id="validationServerEmail" onkeyup="invalid()" class="invalid-feedback">
 							Please choose your Email
 						</div>
 					</div>
 					<div class="form-group"><i class="glyphicon glyphicon-lock"></i>
 						<label for="password">Password:</label>
 						<div id="invalid_password"></div>
 						<input type="password" name="password" id="password" class="form-control is-invalid" required onkeyup="manage(this)"  placeholder="Password" onfocusout="validatePassword()">
 						<div id="validationServerPassword" onkeyup="invalid()" class="invalid-feedback">
 							Please choose your Password
 						</div>
 					</div>
 					<div class="form-group">
 						<i class="glyphicon glyphicon-lock"></i>
 						<label for="confirm_password">Confirm Password:</label>
 						<input type="password" name="confirm_password" id="confirm_password"  onkeyup="manage(this)" class="form-control is-invalid" required placeholder="Confirm your password" onfocusout="controlPassword()">
 						<div id="validationServerConfirmPassword" onkeyup="invalid()" class="invalid-feedback">
 							Please choose your Confirm Password
 						</div>
 						<div id="miss_match_password"></div>
 					</div>
 					<div class="button">

 						<button type="submit" name="submit" id="submit" class="btn btn-primary btn-block"  disabled >Sign Up</button>
 					</div>

 				</form>
 				<?php

 				// echo '<script type="text/javascript"> disableBtn(); </script>';
 				?>
 			</div>
 		</div>
 	</div>

<?php
include('footer.php');
?>