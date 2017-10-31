<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function setuid(){
$cookieUid = @$_COOKIE['uid'];
if(empty($cookieUid) || isset($_SESSION['uid'])){return '';}
//else set uid into session
	if(!empty($cookieUid)){
	$_SESSION['uid'] = base64_decode($cookieUid);
	$_SESSION['is_user_login'] = "true";
	}
}
setuid();
// MTI=


function mnr($q){
return mysql_num_rows($q);
}

function rod($colname,$table,$where='',$retarr=0){
/*mysql rod(return one data from row) function return 'single col data' if ok else 0
takes three arg
1. only one col name
2. table name
3. $where that will contain condition only
*/
// imp note: there is prblm in this func and may be related func in case there is no where arg. is passed but only order by is passed.
// echo "select $colname from $table where $where";
// die();
if(empty($where)){
return 0;
// die('mmmm');
}
// now use limit =1 for performance
if($retarr==0 && substr_count($where,'LIMIT')==0){
$limit = " LIMIT 1";
}
else{
$limit = "";
}

	$mq=mysql_query("select $colname from $table where $where") or die(mysql_error());
// $mq=mysql_query("select $colname from $table where $where{$limit}") or $norun=0;
	if(isset($norun) || mnr($mq)==0){
	return 0;
	}
	else{
		if($retarr==0){
		return mysql_result($mq,0);
		}
		else{
			//colname might be diff if DIstinct is used
			$spacepos = strrpos($colname,' ');
			if(!empty($spacepos)){
			$colname = substr($colname,$spacepos+1);
			}
			// $colname = substr($colname,$spacepos);
			// echo $colname;die(' bbb');
			while($row = mysql_fetch_array($mq)){
			$arr[] = $row[$colname];
			}
		return $arr;	
		}
	}
}

function rad($arrcol,$table,$where){
// die("SELECT $arrcol from $table where $where");
// $mq	=	mysql_query("SELECT uname,uid,upass from $table where $where");
$mq	=	mysql_query("SELECT $arrcol from $table where $where") or $norun=1;
if(isset($norun) || mnr($mq)==0){
// die(mysql_error());
return 0;
}
else{
$rad = mysql_fetch_assoc($mq);
return $rad;
}
print_r($rad);
}


function upd($table,$set,$where,$show=0){
global $offinc;
/*mysql upd function return 1 if ok else 0
takes three arg
1. table name
2. what to set
3. $where that will contain condition only
*/
$q		=	"UPDATE $table SET $set where $where";
// echo $q;
// echo "<br><br><br>";
// die();
$mq = mysql_query($q) OR $notrun=1;
// mysql_query($q) or die(mysql_error());
	if(isset($notrun) || mysql_affected_rows()==0){
		if($show==1){
		die("There was problem updating database.");
		}
		else{
		return 0;
		}
	}
	return 1;
}

function farr($arr=''){
if(!is_array($arr)){
echo "You have not passed an array";
return '';
}
echo '<pre>',print_r($arr),'</pre>';
}

function smail($to,$subject,$body,$from,$type='html'){
if(substr_count($to,",")!=0){
$toarr	=	explode(",",$to);
$to		=	$toarr[0];
$bcce		=	$toarr[1];
// echo "$to---$bcce";die('');;
// $count	=	count($toarr);
}
	if($type==='html'){
	$header		= "MIME-Version: 1.0" . "\r\n";
	$header		.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// $header		.= "To: $to\r\n";
	$header		.= "From: <$from>" . "\r\n";
		if(isset($bcce)){
		$header		.= "Bcc: <$bcce>" . "\r\n";
		}
	}
	else{
	$header		= "From: <$from>" . "\r\n";
		if(isset($bcce)){
		$header		= "Bcc: <$bcce>" . "\r\n";
		}
	}
	// confirm mail sent
	if(mail($to,$subject,$body,$header)){
	return 1;
	}
	else{
	return 0;
	}
}

function scount($table,$where,$id='id'){
/*mysql count function return no. of rows if ok else 0
takes three arg
1. table name
2. $where that will contain condition only
3. optional what to count// default will be id
*/
if(@empty($where)){
return 0;
}
// die("select count($id) from $table where $where");
	$mq=mysql_query("select count($id) from $table where $where") or $norun=0;
	// $mq=mysql_query($q) or die(mysql_error());
	if(isset($norun)){
	return 0;
	}
	else{
	return mysql_result($mq,0);
	}
}


function curldata($url,$arg,$get=0){
// echo `curl -XPOST "$url" -d "$param"`;
// echo $url.$arg;
// echo "<br>";
// die(''); 
// echo $get;
$ch = curl_init($url);


// we are using only post
// curl_setopt($ch, CURLOPT_POST,1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,$arg);
// post work end

if($get==0){//means POST used
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$arg);
}
else{
	$get_url=$url."?".$arg;
	curl_setopt($ch, CURLOPT_POST,0);
	curl_setopt($ch, CURLOPT_URL, $get_url);
	// echo $get_url;die('');
}
// die('f');
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
// DO NOT RETURN HTTP HEADERS 
curl_setopt($ch, CURLOPT_HEADER,0);
// RETURN THE CONTENTS OF THE CALL
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
// if ssl then set to true
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
return curl_exec($ch);
}


function sendotp($type="newuser"){
	global $ccode,$mob,$date,$refby,$signupbonusgiven,$referredbonusgiven,$verify,$wallet,$full_mob;
	if($type=="newuser"){
		$refCode = mt_rand(100000,999999);
		$refCode = str_ireplace("0","5",$refCode);//replace 0 with 5. 0 is confusing in refCode looks like O
		$insert		=	mysql_query("INSERT INTO gfd_user VALUES(NULL,'','','','','$refCode','$ccode','$mob','$date','$refby','$signupbonusgiven','$referredbonusgiven','$verify','','$wallet','1')") OR die(mysql_error());
	}
	
	// $OTPcode	=	2563;
	$OTPcode	=	mt_rand(100000,999999);
	// file_put_contents("otp.txt",$OTPcode);
	$SMSmsg		=	"Your OTP is $OTPcode";
	//set OTP on session
	$_SESSION["session_OTP"] = $OTPcode;//no need of session as we get it from  user
	$_SESSION["fullmob"] = $full_mob;//no need of session as we get it from  user
	$error = 0;
	// $url = "http://api.msg91.com/api/verifyRequestOTP.php";
	$url = "http://api.msg91.com/api/sendotp.php";
	$para = "authkey=140905AioSt4wtTj5589d989a&mobiles=$full_mob&message=$SMSmsg&otp=$OTPcode";
	// echo "$url?$para";
	// die();
	curldata($url,$para,1);	
	$id		=	rod("id","gfd_user","mobile='$mob' AND c_code='$ccode'");
	$_SESSION['uid'] = $id;
	//also send email to refby if any
	if(!empty($refby)){
		$getEmail = rod("email","gfd_user","id='$refby'");
		if(filter_var($getEmail,FILTER_VALIDATE_EMAIL)){
			$from = "info@getfreedash.com";
			$sub = "You have got $1 referral Bonus";
			$body = "Hi User,<br>You have got $1 in your dash account as your friend have sign up with your referral link on
			https://getfreedash.com website.
			
			Thanks";
			@smail($getEmail,$sub,$body,$from,$type='html');
			
		}
	}
}

function go($url){
header("Location: $url");
die('');
}


function islogin($redirect=1){
	// var_dump($_SESSION);
	// die();
	if(isset($_SESSION["login"])){
		// die("kk");
	}
	else{
		if($redirect==1){
			go("/login.php?");
		}
		else{
			return 0;
		}
	}
}


function is_user_login($redirect=1){
	// var_dump($_SESSION);
	// die();
	if(isset($_SESSION["is_user_login"]) && isset($_SESSION["uid"])){
		return true;
	}
	else{
		if($redirect==1){
			go("/member/login.php?");
		}
		else{
			return 0;
		}
	}
}

//show referal link

ob_start();
?>
	<!-- Referral modal success-->
	<div id="referralsuccess" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">	
			<div class="container-fluid" style="background-color:#00cccc;padding-top:10px;">
				<div class="text-center"><h4>Hi [[fname]],Your referral link is given below</h4></div>
				<div>
				Your referral id is <span class="bg-primary" style="cursor:auto;text-transform: none;">[[ref_code]]</span><br><br>
				Your referral link is<br> <span class="bg-primary" style="cursor:auto;text-transform: none;">https://getfreedash.com/index.php?rid=[[ref_code]]</span><br><br>
				</div>
				<div class="setpadding"></div>
				<div class="sharebutton">
					<a data-action="share/whatsapp/share" href="whatsapp://send?text=https://getfreedash.com/index.php?rid=[[ref_code]]"><img src="img/wa.jpg" class="img img-responsive"></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://getfreedash.com/index.php?rid=[[ref_code]]" target="_blank"><img src="img/fb.jpg" class="img img-responsive"></a>
					<a href="https://twitter.com/intent/tweet?url=https://getfreedash.com/index.php?rid=[[ref_code]]"><img src="img/twitter.jpg" class="img img-responsive"></a>
					<a href="https://plus.google.com/share?url=https://getfreedash.com/index.php?rid=[[ref_code]]"><img src="img/gplus.jpg" class="img img-responsive"></a>
				</div>
				<div class="setpadding"></div>
				<button class="btn btn-danger btn-lg" type="button" data-dismiss="modal">Close</button>
				<div class="setpadding"></div>
		  
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
<?php
$showRefModal = ob_get_clean();

function showRefLink($uid,$uData=''){
global $showRefModal;
	if(empty($uData)){
		$uData	=	rad("*","gfd_user","id=$uid");
	}
	//now replace ref_code
	$modalData = str_ireplace("[[fname]]",$uData['fname'],$showRefModal);
	$modalData = str_ireplace("[[ref_code]]",$uData['ref_code'],$modalData);
	return $modalData;
}

?>
