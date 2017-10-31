<?php
session_start();
include("conn.php");
include("func.php");
// farr($_SESSION);
// die();
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

	<?php
		$total_user			=	mysql_query("SELECT * FROM gfd_user");
		$total_user			=	mysql_num_rows($total_user);

		$ref_money_left		=	scount("gfd_user","referred_bonus_given='0' AND ref_by!=''");
		$signup_money_left	=	scount("gfd_user","signup_bonus_given='0'");
		$total_money_left	=	$ref_money_left + $signup_money_left;
		
		$ref_money_paid		=	scount("gfd_user","referred_bonus_given='1'");
		$signup_money_paid	=	scount("gfd_user","signup_bonus_given='1'");
		$total_money_paid	=	$ref_money_paid + $signup_money_paid;
	?>
	
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
	
<div class="container details" style="margin-top:100px;">
	<div class="setpadding"></div>
	<div class="row">
		<div class="col-sm-4 col-xs-12">
			<div class="row admin-square">
				<div class="col-sm-12 ">
					<div class="setpadding"></div>
					<div class="center" style="color:white;">Total No. of Users</div>
				</div>
				<div class="col-sm-6 col-sm-offset-3">
					<div class="setpadding"></div>
					<div class="value"><?php echo $total_user; ?></div>
					<br><br>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12 squaremargin">
			<div class="row admin-square">
				<div class="col-sm-12">
					<div class="setpadding"></div>
					<div class="center" style="color:white;">Total Paid Out</div>
				</div>
				<div class="col-sm-6 col-sm-offset-3">
					<div class="setpadding"></div>
					<div class="value" id="paidout"><?php echo $total_money_paid; ?></div>
					<br><br>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12 squaremargin">
			<div class="row admin-square">
				<div class="col-sm-12">
					<div class="setpadding"></div>
					<div class="center" style="color:white;">Total Payment Pending</div>
				</div>
				<div class="col-sm-6 col-sm-offset-3">
					<div class="setpadding"></div>
					<div class="value" id="paymentpending"><?php echo $total_money_left; ?></div>
					<br><br>
				</div>
			</div>
		</div>
	</div>
	<div class="setpadding"></div>
</div><hr>
		
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<h3 id='font-text'><div class='text-center' style=''>User Details</div></h3>
			</div>
		</div>
	
	<?php
		$mq		=	mysql_query("SELECT * FROM gfd_user WHERE verified='1'");
		echo '  <div class="table-responsive">
		<table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Mobile Number</th>
        <th>Date</th>
        <th>Time</th>
        <th>Wallet</th>
        <th>SignUp Bonus Given</th>
        <th>Referred Details</th>
      </tr>
    </thead>
    <tbody>
		';
		while($row=mysql_fetch_array($mq)){
			$id		=	$row['id'];
			$fname	=	$row['fname'];
			$lname	=	$row['lname'];
			$ref_by	=	$row['ref_by'];
			$id		=	$row['id'];
			$mob	=	$row['mobile'];
			$date	=	(int)$row['date'];
			$date_show	=	date('d/m/Y',$date);
			$time	=	date('h:iA',$date);
			$wallet	=	$row['wallet'];
			$signBonus	=	$row['signup_bonus_given'];
			// $refBonus	=	$row['referred_bonus_given'];
			$name = "$fname $lname";
			$signupbonus = $signBonus==1?"Yes":"<button class='btn btn-warning btn-sm giveSignBonus' value='$id'>No</button>";
			
			// if(empty($ref_by)){
				// $referralbonus = "Not required";
			// }
			// else{//check if ref bonus given
				// $referralbonus = $refBonus==1?"Yes":"<button class='btn btn-warning btn-sm giveRefBonus' value='$id --- $ref_by'>No</button>";
			// }
			
			echo"<tr>
			<td>$fname</td>
			<td>$mob</td>
			<td>$date_show</td>
			<td>$time</td>
			<td>$wallet</td>
			<td>$signupbonus</td>
			<td><a class='btn btn-primary' href='ref_track.php?id=$id'>Click Here</a></td>
			</tr>";
		}
		echo '</tbody>
		</table>
		</div>';
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
