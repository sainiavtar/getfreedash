<?php
session_start();

// phpinfo();

include("conn.php");
include("func.php");

$getEmail = "shah@sobs.in";
$sub = "Just check";
$body = "bbbbbbbbbbbbbbbb";
$from = "info@getfreedash.com";

// if(smail($getEmail,$sub,$body,$from,$type='html')){
	// echo "okkk"
// }

echo "seesion<br>";
farr($_SESSION);

echo "cookie<br>";
@farr($_COOKIE);

echo $_SESSION["session_OTP"];

?>