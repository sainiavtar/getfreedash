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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/css.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap-files/bootstrap-theme.min.css">
	<link href="../bootstrap-files/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="../bootstrap-files/jquery-3.1.0.min.js"></script>
	<script src="../bootstrap-files/bootstrap.min.js"></script>
	<script src="../myjs.js"></script>
	<style>
	</style>
</head>
<body>
	<?php
	$id	=	$_SESSION["uid"];
	$all_data	=	rad("*","gfd_user","id=$id");
	$fname		=	$all_data['fname'];
	$lname		=	$all_data['lname'];
	$show_name	=	$fname." ".$lname;
	if($show_name==" "){
		$show_name	=	"NA";
	}
	$mob		=	$all_data['mobile'];
	$email		=	$all_data['email'];
	if(empty($email)){
		$email	=	"NA";
	}
	// $ref_money		=	mysql_query("SELECT count(*) FROM gfd_user WHERE ref_by='$id' AND referred_bonus_given='0'");
	$ref_money		=	scount("gfd_user","ref_by='$id' AND referred_bonus_given='0'");
	// $signup_money	=	mysql_query("SELECT count(*) FROM gfd_user WHERE ref_by='$id' AND signup_bonus_given='0'");
	$signup_money	=	scount("gfd_user","id='$id' AND signup_bonus_given='0'");
	$total_money	=	$ref_money + $signup_money;
	?>
	<span id="total_money" class="<?php echo $total_money; ?>"></span>
	<div class="container-fluid" style="background-color:black;">
		<div class="row">
			<div class="col-sm-12">
				<p id="cch1" style="color:white;">Welcome to Dashboard</p>
			</div>
		</div>
	</div>
	
	<div class="container-fluid" style="background-color:#ee6e73;color:white;font-size:18px;">
		<div class="row">
				<div class="col-sm-2">
					<div class="setpadding"></div>
					<span id="font-text" style="font-size:18px;">Name : <?php echo $show_name; ?></span>
					<div class="setpadding hidden-xs"></div>
				</div>
				<div class="col-sm-3">
					<div class="setpadding hidden-xs"></div>
					<span id="font-text" style="font-size:18px;">Mobile : <?php echo $mob; ?></span>
					<div class="setpadding hidden-xs"></div>
				</div>
				<div class="col-sm-3">
					<div class="setpadding hidden-xs"></div>
					<span id="font-text" style="font-size:18px;">Email Id : <?php echo $email; ?></span>
					<div class="setpadding hidden-xs"></div>
				</div>
				<div class="col-sm-3">
					<div class="setpadding hidden-xs"></div>
					<span id="font-text" style="font-size:18px;">Balance <span class="badge badge-success" id="total_money"><?php echo "$".$total_money; ?></span></span>
					<button class="btn btn-primary" id="withdraw">Withdraw</button>
					<div class="setpadding hidden-xs"></div>
				</div>
				<div class="col-sm-1">
					<div class="setpadding"></div>
					<span id="font-text" style="font-size:18px;"><a class="btn btn-warning" href="http://getfreedash.com/member/login.php?logout" style="color:white;">Log Out</a></span>
					<div class="setpadding"></div>
				</div>
		</div>
	</div>
	
	<?php
			echo "	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-offset-4 col-sm-4'>
				<h3 class='text-center' id='font-text'><div class='bg-success text-center' style='border-radius:20px;font-size:16px;padding:10px 10px;'>All Referred by YOU <strong>$mob</strong> </div></h3>
			</div>
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
		
	?>


</body>
</html>
