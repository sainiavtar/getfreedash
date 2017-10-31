<?php
session_start();
include("func.php");


//logout
if(isset($_GET['logout']) && empty($_POST)){
	session_destroy();
	echo '
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="alert alert-danger fade in alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<p class="text-center">You have been Logout successfully!<br></p>
					</div>
				</div>
			</div>
		</div>';
}


// $username	=	"shah12345";
// $pass		=	"12345shah";
if(isset($_POST['username']) && isset($_POST['pass'])){
	$username	=	$_POST['username'];
	$pass		=	$_POST['pass'];
	if($username==="shah12345" && $pass==="12345shah"){
		$_SESSION["login"]	=	"true";
		// die("session is set");
		$url="/user_detail.php";
		// echo $url;
		// die();
		go($url);
	}
	else{
	echo '
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="alert alert-danger fade in alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<p class="text-center">Enter correct Username and Password!<br></p>
					</div>
				</div>
			</div>
		</div>';
	}
}

?>

<!Doctype html>
<html>
<head>
	<title>Admin Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="bootstrap-files/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-files/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">
	<link href="bootstrap-files/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="bootstrap-files/jquery-3.1.0.min.js"></script>
	<script src="bootstrap-files/bootstrap.min.js"></script>
	<script src="myjs.js"></script>
	<style>
	body{
		background-color:#d9d9d9;
	}
	</style>
</head>
<body>
<div class="setpadding"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form class="form" method="POST" action="/login.php">
				<h1 id="font-text">Log In_Admin Dashboard</h1>
				<div class="setpadding"></div>
				<div class="form-group">
					<label for="username" class="sr-only">Username:</label>
					<input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
				</div>
				<div class="setpadding"></div>
				<div class="form-group">
					<label for="pwd" class="sr-only">Password:</label>
					<input name="pass" type="password" class="form-control" id="pwd" placeholder="Enter Password">
				</div>
				<div class="setpadding"></div>
				<input type="submit" class="btn btn-success btn-lg" value="Log In">
			</form> 
		</div>
	</div>
</div>
</body>
</html>
