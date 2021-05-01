<?php
include('connection.php');
?>
<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <?php
    session_start(); //starts the session
    if($_SESSION['email']){ // checks if the user is logged in  
    }
    else{
        header("location: homepage_admin.php"); // redirects if user is not logged in
    }
    $email = $_SESSION['email']; //assigns user value
    ?>
    <body>
        <h2>Home Page</h2>
        <p>Hello <?php Print "$email"?>!</p> <!--Displays user's name-->
        <a href="login.php">Click here to go logout</a><br/><br/>
        <form action="homepage_admin.php" method="POST">
            <input type="submit" value="Add to list"/>
        </form>
    	
	</body>
</html>