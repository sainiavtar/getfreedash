

<?php
include("conn.php");
include("func.php");
// echo hash('sha256',123);
// die();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/dash-icon3-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Verify</title>
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
<?php
// echo $i=base64_encode("40---8877454327");
// echo "<br>";
// echo base64_decode($i);
// die();
if(isset($_GET['code']) && !empty($_GET['code'])){
	// $mycode	=	base64_encode('39---88779632145');
	// die();
	$code	=	$_GET['code'];
	$code	=	base64_decode($code);
	
	// echo $code;
	// die();
	// $code	=	base64_decode($mycode);
	$explode	=	explode("---",$code,2);
	$id			=	$explode[0];
	$mob		=	$explode[1];
	$verify		=	scount("gfd_user","id=$id AND mobile=$mob");
	// echo $verify;
	// die();
	if($verify==1){
		$upd	=	upd("gfd_user","e_verified='1'","id=$id AND mobile=$mob");
		echo "<div class='text-center bg-success'>Email Verified Successfully!!!</div>";
		echo "<a href='https://getfreedash.com/'>BACK TO HOME</a>";
	}
	else{
		echo "<div class='text-center bg-warning'>ERROR_OCCURED!!!</div>";
	}
	
}
?>
</body>
</html>