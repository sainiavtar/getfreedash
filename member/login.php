<?php
session_start();
include("../conn.php");
include("../func.php");

//logout
if(isset($_GET['logout'])){
	setcookie("uid", '', 0, "/");
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

if(isset($_POST['mob']) && isset($_POST['password'])){
	if(is_numeric($_POST['mob'])){
		$search_by_mob	=	1;
	}
	else{
		$search_by_mob	=	0;
	}
	$mob	=	$_POST['mob'];
	$pass	=	$_POST['password'];
	$pass	=	hash('sha256',$pass);
	if(isset($_POST['rememberme'])){
		$rememberme="yes";
	}
	// echo $pass;
	// die();
	if(!empty($pass)){
		if($search_by_mob==1){
			$id		=	rod("id","gfd_user","mobile='$mob' AND password='$pass'");
		}
		else{
			$id		=	rod("id","gfd_user","email='$mob' AND password='$pass'");
		}
		// if(1==1){
		if(!empty($id)){
			$_SESSION["is_user_login"]	=	"yes";
			$_SESSION["uid"]			=	"$id";
			if(isset($rememberme)){
				setcookie("uid", base64_encode($id), time() + (3600 *24 * 365 * 9), "/");//9 years
			}
			$url="/member/index.php";
			go($url);
		}
		else{
			$set_err	=	1;
		}
	}
	else{
		$set_err	=	1;
	}
}
if(isset($set_err)){
	echo '
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="alert alert-danger fade in alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<p class="text-center">Your mobile number or password is incorrect.</p>
					</div>
				</div>
			</div>
		</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/css.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">
	<link href="bootstrap-files/bootstrap-glyphicons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Pompiere" rel="stylesheet">
	<script type="text/javascript" src="../bootstrap-files/jquery-3.1.0.min.js"></script>
	<script src="../bootstrap-files/bootstrap.min.js"></script>
	<script src="../myjs.js"></script>
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
			<form class="form" method="POST" action="/member/login.php">
				<h1 id="font-text">Log In</h1>
				<div class="setpadding"></div>
				<div class="form-group">
				  <label for="mob" class="sr-only">Mobile Number</label>
				  <input name="mob" type="text" class="form-control" id="mob" placeholder="Enter Mobile Number">
				</div>
				<div class="setpadding"></div>
				<div class="form-group">
				  <label for="password" class="sr-only">Enter Password</label>
				  <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
				</div>
				<div class="setpadding"></div>
				<input type="submit" class="btn btn-success btn-lg" value="Log In">
			</form>
		</div>
	</div>
</div>

</body>
</html>