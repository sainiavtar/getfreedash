<?php
session_start();
include("../conn.php");
include("../func.php");
is_user_login();

$total_money	=	$_GET['totalmoney'];
$id	=	$_SESSION['uid'];

$all_data	=	rad("*","gfd_user","id=$id");
$mob		=	$all_data['mobile'];
$wallet		=	$all_data['wallet'];
$to			=	"xyz@getfreedash.com";
$from		=	"info@getfreedash.com";
$subject	=	"Withdrawal Request";
$body		=	"User of $mob has requested for withdrawal of money.";
smail($to,$subject,$body,$from);
echo "	<div id='withdrawModal' class='modal fade' role='dialog' data-backdrop='static' data-keyboard='false'>
	  <div class='modal-dialog'>

		<!-- Modal content-->
		<div class='modal-content'>
		 
		  <div class='modal-body'>
			<div class='setpadding'></div>
				<h2 id='font-text' class='text-center'>Your balance $ $total_money will now be send to your wallet <strong>$wallet</strong> in 24 hours.</h2>
				<div><a href='/member/index.php' class='btn btn-success text-center' type='button' data-dismiss='modal'>Close</a></div>
			<div class='setpadding'></div>
		  </div>
		</div>

	  </div>
	</div>";
?>