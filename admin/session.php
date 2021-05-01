<?php
   include('../connection.php');
   session_start();
   
   $user_check = $_SESSION['email'];

   
   $ses_sql = mysqli_query($conn,"select * from sign_up where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   $user_id = $row['id'];
   $role = $row['role'];


   
   if(!isset($_SESSION['email'])){
      header("location:login.php");
      die();
   }
?>