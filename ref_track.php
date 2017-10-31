<?php
session_start();
include("conn.php");
include("func.php");
islogin();
?>

<!Doctype html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/dash-icon3-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>User Details</title>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
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
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
						<li class="nav-item"><a class="nav-link link" href="user_detail.php">USER DETAIL</a></li>
						<li class="nav-item"><a class="nav-link link" href="/login.php?logout">LOG OUT</a></li>
					</ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
	<div class="container" style="margin-top:100px;">
	<?php
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$id=$_GET['id'];
			 $search_mob	=	rod("mobile","gfd_user","id=$id");
			 echo "	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-offset-4 col-sm-4'>
				<h3 id='font-text'><div class='text-center' style='border-radius:20px;font-size:16px;padding:10px 10px;background-color:#4588d3;color:white;'>All Referred by Mobile Number <strong>$search_mob</strong> </div></h3>
			</div>
		</div>
		<div class='setpadding'></div>
	</div>";
			 // die($search_mob);
			// echo "SELECT * FROM gfd_user WHERE ref_by=$id";
			// die();
			$mq		=	mysql_query("SELECT * FROM gfd_user WHERE ref_by=$id");
			echo '  <div class="table-responsive">
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>Date</th>
				<th>Time</th>
				<th>Referral Bonus Given</th>
			</tr>
			</thead>
			<tbody>
				';
			while($row=mysql_fetch_array($mq)){
				$id		=	$row['id'];
				$fname	=	$row['fname'];
				$lname	=	$row['lname'];
				$mob	=	$row['mobile'];
				$ref_by	=	$row['ref_by'];
				$date	=	$row['date'];
				$date_show	=	date('d-m-Y',$date);
				$time	=	date('h:i A',$date);
				$refBonus	=	$row['referred_bonus_given'];
				if(empty($ref_by)){
					$referralbonus = "Not required";
				}
				else{//check if ref bonus given
					$referralbonus = $refBonus==1?"Yes":"<button class='btn btn-warning btn-sm giveRefBonus' value='$id --- $ref_by'>No</button>";
				}
				if(empty($fname)){
					$name="Not Available";
				}
				else{
					$name = "$fname $lname";
				}
				echo"<tr>
				<td>$name</td>
				<td>$mob</td>
				<td>$date_show</td>
				<td>$time</td>
				<td>$referralbonus</td>
				</tr>";
			}
			echo '</tbody>
			</table>
			</div>';
		}
		
	?>
</div>
  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/tether/tether.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/jarallax/jarallax.js"></script>
  <script src="../assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="../assets/dropdown/js/script.min.js"></script>
  <script src="../assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="../assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="../assets/theme/js/script.js"></script>
  <script src="../assets/formoid/formoid.min.js"></script>
  <script src="../myjs.js"></script>
</body>
</html>
