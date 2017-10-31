<?php
// phpinfo();
// echo $refby		=	$_SESSION["refby"];
// die();

session_start();
include("conn.php");
include("func.php");
// islogin();

// echo 111111111;
//default value
$data = array();
$error = 0;
$msg = '';
$proType = $_REQUEST['proType'];
// $proType = "steprefno";
//below to restrict any request from other host

$httpRef = @$_SERVER['HTTP_REFERER'];

// if(!strstr($httpRef, $httpRef))
// {
// $error=1;
// $msg="Invalid Site Access!!!";
// $result_array = array('error' => $error, 'msg' => $msg, 'data' => $data);
// echo json_encode($result_array);
// exit;
// }



//mow start processing $proType is there

$sayErr		=	"<div class='bg-danger text-center' style='border-radius:20px;font-size:16px;'>[[say]]</div>";
$saySuccess	=	"<div class='bg-success text-center' style='border-radius:20px;font-size:16px;'>[[saySuccess]]</div>";


if($proType=="stepfirst"){
	$ccode		=	$_GET['ccode'];
	$mob		=	$_GET['mob'];
	//remove initial zero
	$mob		= ltrim($mob,0);
	$full_mob	=	$ccode.$mob;
	$date		=	time();
	$refby		=	$_SESSION["refby"];
	$signupbonusgiven	=	0;
	$referredbonusgiven	=	0;
	$verify		=	0;
	$wallet		=	"";
	$say	=	"OTP is send on your mobile. Please verify!";
	if(strlen($mob)>8 && strlen($mob)<13 && is_numeric($mob)){
		$search_mob	=	rod("mobile","gfd_user","mobile='$mob' AND c_code='$ccode'");
		if(!empty($search_mob)){
			$is_verified	=	rod("verified","gfd_user","mobile='$mob' AND c_code='$ccode'");
			if($is_verified==1){
				$error = 1;
				$say	=	"Mobile number already exists!";
				$msg	=	str_replace("[[say]]",$say,$sayErr);
			}
			else{
					// echo "o55555555oo";die();
				sendotp("exist");
				$msg	=	str_replace("[[saySuccess]]",$say,$saySuccess);
			}
		}
		else{
				// echo "o44oo";die();
			sendotp();
			$msg	=	str_replace("[[saySuccess]]",$say,$saySuccess);
		}
	}
	else{
		// echo $serErr;
		
		$error = 1;
		$say	=	"Please select country code and enter mobile number correctly!";
		$msg	=	str_replace("[[say]]",$say,$sayErr);
	}
	

}

if($proType=="stepsecond"){
	$otp		=	$_GET['otp'];
	$fullmob	=	$_SESSION["fullmob"];//user mob
	$url = "http://api.msg91.com/api/verifyRequestOTP.php";
	$para = "authkey=140905AioSt4wtTj5589d989a&mobile=$fullmob&otp=$otp";
	$result = curldata($url,$para,1);
	$toJson = json_decode($result);
	// var_dump($toJson);
	$status = $toJson->message;
	// var_dump($status);
	if($status=="otp_verified"){
	// if(1==1){
		$id	=	@$_SESSION["uid"];
		$upd	=	upd("gfd_user","verified=1","id='$id'");
		$error = 0;
		$say	=	"Mobile number verified successfully!";
		$msg	=	str_replace("[[saySuccess]]",$say,$saySuccess);
	}
	else{
		$error = 1;
		$say	=	"OTP Mismatch! Try again";
		$msg	=	str_replace("[[say]]",$say,$sayErr);	
	}
}

if($proType=="stepthird"){
	$wallet		=	$_GET['wallet'];
	$fname		=	$_GET['fname'];
	$lname		=	$_GET['lname'];
	$eid		=	$_GET['eid'];
	$pass1		=	$_GET['pass1'];
	$pass2		=	$_GET['pass2'];
	$search_eid	=	rod("email","gfd_user","email='$eid'");
	if(empty($search_eid)){
		$eid_exist	=	0;
	}
	else{
		$eid_exist	=	1;
	}
	if(strlen($pass1)<6 || strlen($pass1)>14){
		$paas_len_err	=	1;
	}
	else{
		$paas_len_err	=	0;
	}
	if(strlen($pass2)<6 || strlen($pass2)>14){
		$paas_len_err	=	1;
	}
	else{
		$paas_len_err	=	0;
	}
	if($wallet!="" && $fname!="" && $lname!="" && $eid!="" && $pass1!="" && $pass2!="" && $eid_exist!=1 && $paas_len_err!=1){
		if($pass1===$pass2){
			$pass	=	hash('sha256',$pass1);
			$id		=	$_SESSION["uid"];
			$mob	=	rod("mobile","gfd_user","id=$id");
			$code	=	@base64_encode($id."---".$mob);
			if(!empty($id)){
				$_SESSION["is_user_login"]	=	"yes";
				$_SESSION["uid"]			=	"$id";
				setcookie("uid", base64_encode($id), time() + (3600 *24 * 365 * 9), "/");//9 years
			}
			$upd	=	upd("gfd_user","password='$pass',fname='$fname',lname='$lname',email='$eid',wallet='$wallet'","id='$id'");
			// $upd	=	upd("gfd_user","wallet='$wallet'","id='$id'");
			
			$from = "info@getfreedash.com";
			$sub = "Verify Your Email Address";
			$body = "Hi User,<br>Please click the given link to verify your email address or copy the given link and paste on browser address bar.<br><br>
			<a href='https://getfreedash.com/verify.php?code=$code' target='_blank'>https://getfreedash.com/verify.php?code=$code</a>
			";
			@smail($eid,$sub,$body,$from,$type='html');
			$_SESSION['is_user_login'] = "true";//to ayto login user
			setcookie("uid", base64_encode($id), time() + (3600 *24 * 365 * 9), "/");//9 years
			
			$error = 0;
			$say	=	"Congratulation! Sign Up Successful!!!";
			$msg	=	str_replace("[[saySuccess]]",$say,$saySuccess);
		}
		else{
			$error = 1;
			$say	=	"Please enter all fields correctly.<br>Please enter same password in both password fields.";
			$msg	=	str_replace("[[say]]",$say,$sayErr);	
		}
	}
	else{
		$error = 1;
		if($paas_len_err==1 || $eid_exist==1){
			if($paas_len_err==1 && $eid_exist==1){
				$say	=	"All fields are mandatory.<br>Please enter all fields correctly.<br>Password - Enter 6 to 14 characters!<br>Email id already exist!";	
			}
			elseif($paas_len_err==1 || $eid_exist!=1){
				$say	=	"All fields are mandatory.<br>Please enter all fields correctly.<br>Password - Enter 6 to 14 characters!";
			}
			// else($eid_exist==1 || $paas_len_err!=1){
			else{
				$say	=	"All fields are mandatory.<br>Please enter all fields correctly!<br>Email id already exist!";
			}
		}
		else{
			$say	=	"All fields are mandatory.<br>Please enter all fields correctly.";
		}
		$msg	=	str_replace("[[say]]",$say,$sayErr);	
	}
}

if($proType=="steprefno"){
	$refno		=	$_GET['refno'];
	if(strlen($refno)>8 && strlen($refno)<13 && is_numeric($refno)){
		$id		=	rod("id","gfd_user","mobile='$refno'");
		if($id==0){
			$error = 1;
			$say	=	"Mobile number not found!";
			$msg	=	str_replace("[[say]]",$say,$sayErr);

		}
		else{
			$id		=	base64_encode($id);
			$link		=	"/index.php";
			$error	= 0;
			$say	=	$link."?id='$id'";
			$msg	=	str_replace("[[saySuccess]]",$say,$saySuccess);		
		}
	}
	else{
			$error = 1;
			$say	=	"Mobile number not found!";
			$msg	=	str_replace("[[say]]",$say,$sayErr);
	}
}

//ask for fname,lname and email when click on get ref link

if($proType=="askDetailPro"){
	$fname		=	@$_GET['fname'];
	$lname		=	@$_GET['lname'];
	$emailid	=	@$_GET['emailid'];
	// farr($_GET);die();
	//now insert in db
	$uid		=	@$_SESSION['uid'];
	if(empty($uid)){die("no uid in sess");}
	upd("gfd_user","fname='$fname',lname='$lname',email='$emailid'","id=$uid");
	$uData		=	rad("*","gfd_user","id=$uid");
	$error = 0;
	$msg = "";
	$data['result'] = showRefLink($uid,$uData);
}


//showReferralModal
if($proType=="showReferralModal"){
	$uid		=	@$_SESSION['uid'];
	$uData		=	rad("*","gfd_user","id=$uid");
	if(empty($uData)){//do nothing and exit;
	
	die("userloginform");
	}
	//otherwise
	
	if(!empty($uData['fname'])){//then directly show referral link and refid
		$error = 0;
		$msg = "";
		$data['result'] = showRefLink($uid,$uData);
	}
	else{//then ask for fname,lname and emailid
		ob_start();
		?>
			<!-- Referral modal-->
			<div id="askDetailModal" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<div class="text-center"><h3>Generate Referral Link</h3></div>
					</div>
				  <div class="modal-body">
					<div id="msg4"></div>
					<div class="text-center"><strong class="modalcontentfirst" style="border:none;">We will send you email when any one sign up through your link.</strong></div>
					<div class="container-fluid" style="background-color:#00cccc;margin-top:40px;padding-top:10px;">
					
						<div class="setpadding"></div>
						<div class="form-group">
						  <input name="fname" type="text" class="form-control" id="fname" placeholder="Enter First Name">
						</div>
						<div class="form-group">
						  <input name="lname" type="text" class="form-control" id="lname" placeholder="Enter Last Name">
						</div>
						<div class="form-group">
						  <input name="emailid" type="text" class="form-control" id="emailid" placeholder="Enter Email ID">
						</div>
						<button type="button" class="btn btn-success btn-lg askDetailPro">Next</button>
						<button class="btn btn-danger btn-lg" type="button" data-dismiss="modal">Close</button>
						<div class="setpadding"></div>
				  
					</div>
				  </div>
				</div>

			  </div>
			</div>
			<!-- Modal End-->
		<?php
		$error = 0;
		$msg = "nofname";
		$data['result'] = ob_get_clean();
		}
}

//pro giveSignBonus
if($proType=="giveSignBonus"){
	if(islogin(0)==0){
		// echo "Error";die();
	}
	$id		=	@$_GET['id'];
	$upd = upd("gfd_user","signup_bonus_given='1'","id='$id'");
	echo $upd==1?"Yes":"No";
	die();
}

//pro giveRefBonus
if($proType=="giveRefBonus"){
	if(islogin(0)==0){
		// echo "Error";die();
	}
	$getVal		=	@$_GET['getVal'];
	$explode	=	explode(" --- ",$getVal);
	$uid		=	$explode[0];
	$ref_by		=	$explode[1];
	
	$upd = upd("gfd_user","referred_bonus_given='1'","id='$uid'");
	echo $upd==1?"Yes":"No";
	die();
}

//FORGET PASSWORD

if($proType=="fp"){
	$email		=	$_GET['email'];
	$rad = rad("id,fname,mobile","gfd_user","email='$email'");
	if(!empty($rad)){
		$id		=	$rad["id"];
		$fname	=	$rad["fname"];
		$mob	=	$rad["mobile"];
		$base64	=	base64_encode("$id---$mob");
		$fpUrl	=	"https://getfreedash.com/fp.php?code=$base64";
		$from = "info@getfreedash.com";
		$sub = "Forget Password Reset Request - getfreedash.com";
		$body = "Hi $fname,<br>Please click the given link to reset your password or copy the given link and paste on browser address bar.<br><br>
		<a href='$fpUrl' target='_blank'>$fpUrl</a>
		";
		@smail($email,$sub,$body,$from,$type='html');		
		
		$error = 0;
		$say	=	"We have successfully sent you an email to reset your password.";
		$msg	=	$say;
	}
	else{
		$error = 1;
		$say	=	"We are sorry but email id $email is not found in our database.";
		$msg	=	$say;	
	}
}

if($proType=="memberlogin"){
	// die("qqa");
	$mob		=	$_GET['mob'];
	$pass		=	$_GET['pass'];
	$rememberme	=	$_GET['rememberme'];
		if(is_numeric($mob)){
			$search_by_mob	=	1;
		}
		else{
			$search_by_mob	=	0;
		}
		if(!empty($pass) && !empty($mob)){
			$pass	=	hash('sha256',$pass);
			if($search_by_mob==1){
				$id		=	rod("id","gfd_user","mobile='$mob' AND password='$pass'");
			}
			else{
				$id		=	rod("id","gfd_user","email='$mob' AND password='$pass'");
			}
			// if(1==1){
			if(!empty($id)){
				// die("jjj");
				$_SESSION["is_user_login"]	=	"yes";
				$_SESSION["uid"]			=	"$id";
				if($rememberme=="yes"){
					setcookie("uid", base64_encode($id), time() + (3600 *24 * 365 * 9), "/");//9 years
				}
				// $url="/member/index.php";
				// go($url);
				//$error = 0;
			}
			else{
				// die("gggs");
				$error = 1;
					$say	=	'
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
							<p class="text-center bg-danger" style="border-radius:20px;">Your mobile number or password is incorrect.</p>
					</div>
				</div>
			</div>';
					$msg	=	$say;	
			}
		}
		else{
			// die("jjg");
			$error = 1;
			$say	=	'
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
							<p class="text-center bg-danger" style="border-radius:20px;">Please fill all fields correctly.</p>
					</div>
				</div>
			</div>';
			$msg	=	$say;	
		}
}



//now send json data
$result_array = array('error' => $error, 'msg' => $msg, 'data' => $data);
echo json_encode($result_array);
exit;
?>
