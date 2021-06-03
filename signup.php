 						
<?php 
include('connection.php');
?>

<?php 

if(isset($_POST['submit'])){
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$role = 2;

	$if_user_exist = "SELECT * FROM users WHERE email='$email' ";
	$res = mysqli_query($conn, $if_user_exist) or die (mysqli_error($conn));
		
	if(mysqli_num_rows($res) > 0){  ?>

		<div class="alert alert-danger">
			<strong>"This user exist"</strong>
		</div>

    <?php
	}
	else{
		$sql = "INSERT INTO users (firstname, lastname, email, password, role) VALUES ('$firstname','$lastname', '$email', '$password','$role')";

		if(mysqli_query($conn, $sql)){
			header("Location: login.php?register=success&email=".$email);
		}
    }
}

?>

<?php
include('header.php');
?>

<div class="image_registered">
    <div style="margin:30px auto;" align="center">
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
 			</div>
 		</div>
 	</div>
</div>

<?php
include('footer.php');
?>