<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <!--  <style type="text/css">
  	body {
  		font-size: 25px;
  		text-align: center;
  		background-image: url("img.jpg");
  		background-size: auto;
  	}
  	#btn1 {
  		margin-left: 70px;
  		margin-top: 50px;


  	}

  	#btn2 {
  		margin-top: 30px;

  	}

  </style> -->

  <!-- <script> 
$(document).ready(function(){
  $("#btn1").click(function(){
    $("#signup").slideToggle("slow");
  });
});

$(document).ready(function(){
  $("#btn2").click(function(){
    $("#login").slideToggle("slow");
  });
});
</script> -->
</head>
<body>
	<div class="row">
		<div class="col-sm">
		<div class="alert alert-info">
			<strong> Wellcome to the BookStore.</strong>
		</div>
		<div>
			<a href="registered.php" class="btn btn-primary btn-lg active" role="true"> Sign Up </a>
			<a href="login.php" class="btn btn-primary btn-lg active" role="true"> Login </a>

		</div>
	</div>
</div>
<br><br>

<p style="color: white; font-size: 25px;">
	"Reading is a conversation. All books talk. But a good book listens as well." <br>
	"A room without books is like a body without a soul."
</p>

</body>
</html>