

<?php
include("conn.php");
include("func.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/dash-icon3-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Forget Password</title>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="css/mycss.css" type="text/css">
  
  
  
</head>
<body>
	<section id="ext_menu-9" data-rv-view="52">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-bran">
                        <a href="" class="navbar-logo"><img src="../assets/images/dashlogo.gif"></a>
                        <a class="navbar-caption" href="/">GETFREEDASH</a>
                    </div>

                </div>
            </div>

        </div>
    </nav>

</section>
<?php

if(isset($_GET['code']) && !empty($_GET['code'])){
	$code	=	$_GET['code'];
	$code	=	base64_decode($code);
	$explode	=	explode("---",$code);
	$id			=	$explode[0];
	$mob		=	$explode[1];	
}

//form process
if(isset($_POST['pass1']) && isset($_POST['pass2'])){
	if(!empty($_POST['pass1']) && !empty($_POST['pass2'])){
		$pass1		=	$_POST['pass1'];
		$pass2		=	$_POST['pass2'];
		$id			=	$_POST['id'];
		$mob		=	$_POST['mob'];
		if($pass1===$pass2){
			$pass	=	hash('sha256',$pass1);
			$upd	=	upd("gfd_user","password='$pass'","id=$id AND mobile=$mob");
			$success = 1;
		}
		else{
			$err1=1;
		}	
	}
	else{
		$err2=1;
	}
}
?>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<h2 class="text-center">Forget Password</h2>
		<?php
			if(isset($success)){
				echo '
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<p class="text-center bg-success">Your password is changed successfully!</p>
						</div>
					</div>';
			}
			if(isset($err1)){
				echo '
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<p class="text-center bg-danger">Please enter same password!</p>
						</div>
					</div>';
			}
			if(isset($err2)){
				echo '
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<p class="text-center bg-danger">Please fill all fields!</p>
						</div>
					</div>';
			}
		?>
		<div class="col-sm-6 col-sm-offset-3">
			<form class="form" method="POST" action="">
				<div class="setpadding"></div>
				<div class="form-group">
				  <label for="pass1" class="sr-only">Enter Password</label>
				  <input name="pass1" type="password" class="form-control" id="pass1" placeholder="Enter Password">
				</div>
				<div class="setpadding"></div>
				<div class="form-group">
				  <label for="pass2" class="sr-only">Re-Enter Password</label>
				  <input name="pass2" type="password" class="form-control" id="pass2" placeholder="Re-Enter Password">
				</div>
				<div class="setpadding"></div>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="mob" value="<?php echo $mob; ?>">
				<input type="submit" class="btn btn-success btn-lg btn-block" value="Update Password">
			</form>
		</div>
	</div>
</div>
</body>
</html>