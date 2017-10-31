<?php
$con	=	mysql_connect("localhost","gfd_u","gfd_password1") or die("Unable to connect to MongoDB");
$db		=	@mysql_select_db("getfreedash",$con) or die("Unable to select MongoDB database");

?>