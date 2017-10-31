<?php
session_start();
include("../conn.php");
include("../func.php");
is_user_login();
?>

<!Doctype html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/mycss.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap-glyphicons.css">
	<link href="../bootstrap-files/bootstrap-glyphicons.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="../assets/images/dash-icon3-128x128.png" type="image/x-icon">
	<link rel="stylesheet" href="../assets/bootstrap-material-design-font/css/material.css">
	<link rel="stylesheet" href="../assets/et-line-font-plugin/style.css">
	<link rel="stylesheet" href="../assets/tether/tether.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/animate.css/animate.min.css">
	<link rel="stylesheet" href="../assets/dropdown/css/style.css">
	<link rel="stylesheet" href="../assets/theme/css/style.css">
	<link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
	<link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
	<style>
	</style>
</head>
<body>
	<?php
	$id	=	$_SESSION["uid"];
	$all_data	=	rad("*","gfd_user","id=$id");
	$fname		=	$all_data['fname'];
	$lname		=	$all_data['lname'];
	$ref_code	=	$all_data['ref_code'];
	$full_ref_code	=	"https://getfreedash.com/index.php?rid=$ref_code";
	$show_name	=	$fname." ".$lname;
	if($show_name==" "){
		$show_name	=	"NA";
	}
	$mob		=	$all_data['mobile'];
	$email		=	$all_data['email'];
	if(empty($email)){
		$email	=	"NA";
	}
	$ref_money_left		=	scount("gfd_user","ref_by='$id' AND referred_bonus_given='0'");
	$signup_money_left	=	scount("gfd_user","id='$id' AND signup_bonus_given='0'");
	$total_money_left	=	$ref_money_left + $signup_money_left;
	
	$ref_money_paid		=	scount("gfd_user","ref_by='$id' AND referred_bonus_given='1'");
	$signup_money_paid	=	scount("gfd_user","id='$id' AND signup_bonus_given='1'");
	$total_money_paid	=	$ref_money_paid + $signup_money_paid;
	
	$total_reffered	=	scount("gfd_user","ref_by='$id'");
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
						<li class="nav-item"><a class="nav-link link" href="/member/logout.php">LOG OUT</a></li>
					</ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

	<div class="container-fluid" style="background-color:#4d94ff;margin-top:100px;">
		<div class="row">
			<div class="col-sm-6">
				<p id="cch1" style="color:white;margin:10px;">Your referral link is <strong><?php echo $full_ref_code; ?></strong></p>
			</div>
			<div class="col-sm-6">
				
				<div class="row">
					<div class="col-xs-3" style="margin:10px;">
						Share Now
					</div>
					<div class="col-xs-2 sharebutton" style="margin:10px;">
						<a data-action="share/whatsapp/share" href="whatsapp://send?text=<?php echo $full_ref_code; ?>"><img src="../img/wa.jpg" class="img img-responsive"></a>
					</div>
					<div class="col-xs-2 sharebutton" style="margin:10px;">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $full_ref_code; ?>" target="_blank"><img src="../img/fb.jpg" class="img img-responsive"></a>
					</div>
					<div class="col-xs-2 sharebutton" style="margin:10px;">
						<a href="https://twitter.com/intent/tweet?url=<?php echo $full_ref_code; ?>" target="_blank"><img src="../img/twitter.jpg" class="../img img-responsive"></a>
					</div>
					<div class="col-xs-1 sharebutton" style="margin:10px;">
						<a href="https://plus.google.com/share?url=<?php echo $full_ref_code; ?>" target="_blank"><img src="../img/gplus.jpg" class="../img img-responsive"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<span id="total_money_left" class="<?php echo $total_money_left; ?>"></span>
	<div class="setpadding"></div>
	<div class="container-fluid" style="margin-top:0px;">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-2">
				<img src="../img/user.jpg" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">Name : <?php echo $show_name; ?></div>
			</div>
			<div class="col-sm-2 col-sm-offset-1">
				<img src="../img/phone.png" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">Mobile : <?php echo $mob; ?></div>
			</div>
			<div class="col-sm-2 col-sm-offset-1">
				<img src="../img/email.jpg" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">Email Id : <?php echo $email; ?></div>
			</div>
		</div>
	</div>
	<div class="setpadding"></div><div class="setpadding"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-2">
				<img src="../img/paid-balance.jpg" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">Total Paid Balance : $<?php echo $total_money_paid; ?></div>
			</div>
			<div class="col-sm-2 col-sm-offset-1">
				<img src="../img/dollar.png" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">
					Balance <span class="badge badge-primary" id="total_money_left"><?php echo "$".$total_money_left; ?></span></span>&nbsp;&nbsp;&nbsp; 
					<?php
						if($total_money_left==!0){
							echo '<button class="btn btn-success" id="withdraw">Withdraw</button>';
						}
					?>
				</div>
			</div>
			<div class="col-sm-2 col-sm-offset-1">
				<img src="../img/referred.png" class="img img-responsive img-circle" id="icons">
				<div class="user_dashboard_font text-center">Total Referred : <?php echo $total_reffered; ?></div>
			</div>
		</div>
	</div>
	<hr>
	
	<?php
			echo "	<div class='container'>
		<div class='row'>
			<div class='col-sm-offset-4 col-sm-4'>
				<h3 id='font-text'><div class='text-center' style='border-radius:20px;font-size:16px;padding:10px 10px;background-color:#4588d3;color:white;'>All Referred by YOU <strong>$mob</strong> </div></h3>
			</div>
		</div>";
			 // die($mob);
			// echo "SELECT * FROM gfd_user WHERE ref_by=$id";
			// die();
			$mq		=	mysql_query("SELECT * FROM gfd_user WHERE ref_by=$id");
			echo '  <div class="table-responsive">
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Time</th>
				<th>Bonus Given</th>
			</tr>
			</thead>
			<tbody>
				';
			while($row=mysql_fetch_array($mq)){
				$id		=	$row['id'];
				$fname	=	$row['fname'];
				$lname	=	$row['lname'];
				$show_name	=	$fname." ".strtoupper(substr($lname,0,1));
				$date	=	$row['date'];
				$date_show	=	date('d-m-Y',$date);
				$time	=	date('h:i A',$date);
				$referred_bonus_given	=	$row['referred_bonus_given'];
				if($referred_bonus_given==1){
					$referred_bonus_given="Yes";
				}
				else{
					$referred_bonus_given="No";
				}
				echo"<tr>
				<td>$show_name</td>
				<td>$date_show</td>
				<td>$time</td>
				<td>$referred_bonus_given</td>
				</tr>";
			}
			echo '</tbody>
			</table>
			</div>';
		echo '</div>';
	?>
	
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
