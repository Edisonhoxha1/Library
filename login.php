<?php   
session_start();

include('connection.php');

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result= mysqli_query($conn, $sql) or die (mysqli_error($conn));

  if(mysqli_num_rows($result) == 1){
      
    while($row=mysqli_fetch_array($result)){
      $role=$row['role'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];
    }

    if($role == 2){

      header("Location: admin/my.php");
    }else{
          header("Location: admin/homepage_admin.php");
         }
  }
}

if(isset($_GET['email']) && isset($_GET['register'])){ ?>

    <div class="alert alert-success">
      User registered successfuly.<strong> Your email: </strong>
    </div>
  <?php
}
  ?>
 
<?php
 include('header.php');
?>
       
<div class="image_login">
  <div style="margin:50px auto;" align = "center" >
    <div style = " background-color:#D8D8D8 ; width:350px; border: solid 3px #333333; " align = "left">
      <div style = "background-color:grey; color:white; padding:10px; text-align: center; font-size: 25px;"><b>Login</b></div>
        <div style = "margin:30px">
          <form action="#" method="post">
            <div class="form-group"><i class="glyphicon glyphicon-envelope"></i>
              <label form="email">Email:</label>
              <input type="email" class="form-control" name="email" placeholder="Email" 
              <?php if(isset($_GET['email'])){ echo 'value="'.$_GET['email'].'"';} ?>>
            </div>
            <div class="form-group"><i class="glyphicon glyphicon-lock"></i>
              <label form="password">Password:</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <!-- TODO -->
           <!--  <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div> -->
            <div class="button">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <div>
              <p style="text-align: right; margin-top: 10px;"> To register click <a href="signup.php"> Here</a></p>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>