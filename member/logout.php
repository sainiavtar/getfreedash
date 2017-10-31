<?php
session_start();
include("../func.php");

//logout
	setcookie("uid", '', 0, "/");
	session_destroy();
	/*
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
	*/
	$url	=	"https://getfreedash.com";
	go($url);
?>