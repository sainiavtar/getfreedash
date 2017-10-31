<?php

session_start();

include("conn.php");

include("func.php");

//set session on uid

// $_SESSION['uid'] = 14;

if(isset($_GET['logout'])){

	session_destroy();

	echo "You have been Logout successfully!<br>";

}









?>



<!DOCTYPE html>

<html lang="en">

<head>

	<title>Get Free Dash</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/css.css">

	<link rel="stylesheet" href="bootstrap-files/bootstrap.min.css">

	<link rel="stylesheet" href="bootstrap-files/bootstrap-theme.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">

	<link href="bootstrap-files/bootstrap-glyphicons.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 

	<link href="https://fonts.googleapis.com/css?family=Pompiere" rel="stylesheet">

	<script type="text/javascript" src="bootstrap-files/jquery-3.1.0.min.js"></script>

	<script src="bootstrap-files/bootstrap.min.js"></script>

	<script src="myjs.js"></script>

	<style>

	</style>

</head>

<body>

<?php

if(@isset($_GET['rid'])){

	$refby	=	$_GET['rid'];

	$refbyId=	rod("id","gfd_user","ref_code='$refby'");

	if(!empty($refbyId)){

		$_SESSION["refby"] = $refbyId;	

	}

}

else{

	$_SESSION["refby"]	=	"";

}



//show USER LOGIN div if user is logged in

?>



	<div class="header">

		<div class="container">

			<div class="row">

				<div class="col-sm-6 logo">
					<img src="img/dash.png">
					

				</div>
<?php
                                if(is_user_login(0)){    ?>


				<div class="col-sm-6 logged_in">

					<h2>You are logged in <a href="/member/index.php" class="btn btn-primary">Click here to go to 
                                        dashboard</a></h2>

				</div>
   
		

                                <?php  } ?>

			</div>

		</div>

	</div>

	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-12  dashprocess">
				<div class="container">

					<h1><span style="color:white;">The hottest cryptocurrency DASH in your hands now.</span></h1><br><br>

					<p class="lead" id="font-text" style="font-size:30px;">Simply Sign with your phone number and get $1 worth of Dash </p><br>

					<p class="lead" id="font-text" style="font-size:30px;">Earn $1 for every friend who signs up using your referral link  </p><br><br>
						<a type="button" class="btn btn-primary btn-lg" href="/#getstarted">Get Started </a>
				</div>
			</div>

		</div>

	</div>

	

	<div class="setpadding"></div>

	<div class="container">
	<div class="row">
	
	<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

					<iframe class="embed-responsive-item" src="//youtube.com/embed/S0oNO3mbBE8?rel=0&amp;showinfo=0&amp;start=0"></iframe>

				</div>

			</div>
	
	 <div class="col-sm-6 dashvedio">
	 
		<h1>Dash is Digital Cash</h1>
          <p class="text-left">Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.The currency incorporates several key innovations, some aimed towards increasing anonymity and others simply to improve the functioning of the system. Its core purpose is to act as a kind of electronic cash, providing a level of anonymity hitherto unheard of among cryptocurrencies.Dash is not yet widely accepted by retailers, but a fair selection of independent businesses accept it. Its value per coin is also one of the highest on the market. </p>
		</div>

		

			

		</div>

		<hr>
</div>
	

	

	<div class="container-fluid">
		
		<div class="row get_started">
				<div class="container">
			<div id="getstarted" class="col-sm-12 getstarted">

				<h2 id="header-font" class="right">Get Started</h2>

				<br>
				<div class="col-sm-4 sign_up ">
					<div class="heading" >
						<h2>Sign up using your Phone Number	</h2>
					</div>
					<div class="desc">
						<p>Simply enter your phone number and verify  with the OTP that we send you</p>
					</div>
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#stepfirst">Sign Up</button>
					<div class="setpadding"></div>
				</div>	
				<div class="col-sm-4 sign_up">
					<div class="heading">
						<h2>Download the APP to get your dash wallet</h2>
					</div>
					<div class="desc">
					</div>
					<a href="https://play.google.com/store/apps/details?id=hashengineering.darkcoin.wallet" type="button" class="btn btn-primary btn-lg" target="_blank">DOWNLOAD NOW</a>
					<div class="setpadding"></div>
				</div>	
				<div class="col-sm-4 sign_up">
					<div class="heading">
						<h2>Get your referral link</h2>
					</div>
					<div class="desc">
						<p>Share your referral link with as many friends as you can, you earn $1 for friend who signs up</p> 
					</div>
					<button type="button" class="btn btn-primary btn-lg" id="showReferral">CLICK THIS TO GET YOUR LINK NOW</button>
					<div class="setpadding"></div>
				</div>
			</div>

		</div>
	
	</div>
 </div>
	

	<div class="setpadding"></div>

	<div class="container">
		<div class="row">
		
		<div class="col-sm-6 dashbest">
		<h1>Why is Dash the Best </h1>
           <p>Dash is fast , cheap and instant unlike other cryptocurrencies. It has all of the properties of Bitcoin (decentralized, open ledger, security through proof of work, easy transfer of value) but it improves on the areas that Bitcoin is lacking to lay claim to the IoM.
		   DASH is an alternative to bitcoin that features better anonymity via Darksend, a protocol that mixes and mashes transactions together before dispersing them to the proper addresses.</p>

		</div>

			<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

					<iframe class="embed-responsive-item" src="//youtube.com/embed/S0oNO3mbBE8?rel=0&amp;showinfo=0&amp;start=0"></iframe>

				</div>

			</div>

		</div>

		<hr>
   </div>
	</div>

	

	<div class="container-fluid">

		<div class="row get_Subscribe">
				<div class="container">	
			<div class="col-sm-8 getstarted">
							
				<div class="setpadding"></div>

				<form>

					<div class="form-group col-sm-9 subc">

						<label class="control-label col-sm-4" for="email">
							<span id="font-text" style="font-size:30px;">Subscribe</span> 
						</label>

						<div class="col-sm-8">
							<input type="email" class="form-control input-lg" id="email" placeholder="Enter email">
						</div>

					</div>

					<div class="col-sm-3 sub_btn">

					  <button type="submit" class="btn btn-default btn-block btn-lg">Submit</button>

					</div>

				</form>

				<div class="setpadding"></div>

				<div class="setpadding"></div>

			</div>

			<div class="col-sm-4 aboutdash">

				<div class="setpadding"></div>

				<div class="text-center"><a href="https://play.google.com/store/apps/details?id=hashengineering.darkcoin.wallet" class="btn btn-primary btn-lg" target="_blank" type="button">DOWNLOAD THE DASH WALLET APP</a></div>

				<div class="setpadding"></div>

			</div>

		</div>
		</div>
	</div>

	

	<!--Contact Module-->

	<div class="container">

		

			

			<div class="row">

				<form class="form" action="" method="POST"><!--Header-->

					<div class="col-sm-12 text-center">

					<h3 id="header-font">Write to us:</h3>

					<p id="font-text" class="text-center">please contact if you are facing any issues</p>

					<hr class="mt-2 mb-2" /></div>

					<!--Body-->

					<div style="font-size: 22px;">
					<div class="col-sm-12 ">
						<div class="col-sm-5">

					<div class="md-form"><input id="form6" class="form-control" name="name" type="text" /> <label class="active" for="form6">Your name</label></div>

					</div>

					<div class="col-sm-5">

					<div class="md-form"><input id="form3" class="form-control" name="mob" type="text" /> <label class="active" for="form3">Your Number</label></div>

					</div>
					</div>
						<div class="col-sm-12 ">
					<div class="col-sm-5">

					<div class="md-form"><input id="form2" class="form-control" name="eid" type="text" /> <label class="active" for="form2">Your email</label></div>

					</div>

					<div class="col-sm-5">

					<div class="md-form"><input id="form32" class="form-control" name="sub" type="text" /> <label class="active" for="form34">Subject</label></div>

					</div>
					</div>

					<div class="col-sm-10">
					<div class="col-sm-12">

					<div class="md-form">
						<textarea id="form8" class="md-textarea" name="query"></textarea> <label class="active" for="form8">Message</label></div>

					</div>

					<input name="formid" type="hidden" value="1000" />
					</div>
					</div>

					<div class="col-sm-12 submit_btn">

					<div class="text-center">
					<button class="btn-default">Submit</button>
					</div>

					</div>

				</form>

			

		

		</div>

	</div>

	<!--Contact Module END-->

	

	<!--Footer Module--><hr>

	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-12 footer_sec">

				<div class="setpadding"></div>

				<p class="text-center" id="font-text">Copyright &copy; 2017 Get Free dash - All Rights Reserved.</p>

			

			</div>

		</div>

	</div>

	<!--Footer Module End-->

		<!-- Modal Sign Up 1st Step-->

	<div id="stepfirst" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

	  <div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

		 

		  <div class="modal-body">

			<div id="msg"></div>

			<h3>Step 1 / 3</h3><br>

			<strong class="bg-info" style="padding:10px 10px;border-radius:25px;font-size:18px;">Sign Up To Get $1 Free.</strong>

			

			<div class="container-fluid" style="background-color:#e6e6e6;margin-top:40px;padding-top:10px;">

			

				<div class="setpadding"></div>

				<div class="form-group">

					<select name="ccode" class="form-control" id="ccode">

						<option  value="NULL" selected>Select Country Code</option>

  <option data-countryCode="GB" value="44">UK (+44)</option>

  <option data-countryCode="US" value="1">USA (+1)</option>

    <option data-countryCode="DZ" value="213">Algeria (+213)</option>

    <option data-countryCode="AD" value="376">Andorra (+376)</option>

    <option data-countryCode="AO" value="244">Angola (+244)</option>

    <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>

    <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>

    <option data-countryCode="AR" value="54">Argentina (+54)</option>

    <option data-countryCode="AM" value="374">Armenia (+374)</option>

    <option data-countryCode="AW" value="297">Aruba (+297)</option>

    <option data-countryCode="AU" value="61">Australia (+61)</option>

    <option data-countryCode="AT" value="43">Austria (+43)</option>

    <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>

    <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>

    <option data-countryCode="BH" value="973">Bahrain (+973)</option>

    <option data-countryCode="BD" value="880">Bangladesh (+880)</option>

    <option data-countryCode="BB" value="1246">Barbados (+1246)</option>

    <option data-countryCode="BY" value="375">Belarus (+375)</option>

    <option data-countryCode="BE" value="32">Belgium (+32)</option>

    <option data-countryCode="BZ" value="501">Belize (+501)</option>

    <option data-countryCode="BJ" value="229">Benin (+229)</option>

    <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>

    <option data-countryCode="BT" value="975">Bhutan (+975)</option>

    <option data-countryCode="BO" value="591">Bolivia (+591)</option>

    <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>

    <option data-countryCode="BW" value="267">Botswana (+267)</option>

    <option data-countryCode="BR" value="55">Brazil (+55)</option>

    <option data-countryCode="BN" value="673">Brunei (+673)</option>

    <option data-countryCode="BG" value="359">Bulgaria (+359)</option>

    <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>

    <option data-countryCode="BI" value="257">Burundi (+257)</option>

    <option data-countryCode="KH" value="855">Cambodia (+855)</option>

    <option data-countryCode="CM" value="237">Cameroon (+237)</option>

    <option data-countryCode="CA" value="1">Canada (+1)</option>

    <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>

    <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>

    <option data-countryCode="CF" value="236">Central African Republic (+236)</option>

    <option data-countryCode="CL" value="56">Chile (+56)</option>

    <option data-countryCode="CN" value="86">China (+86)</option>

    <option data-countryCode="CO" value="57">Colombia (+57)</option>

    <option data-countryCode="KM" value="269">Comoros (+269)</option>

    <option data-countryCode="CG" value="242">Congo (+242)</option>

    <option data-countryCode="CK" value="682">Cook Islands (+682)</option>

    <option data-countryCode="CR" value="506">Costa Rica (+506)</option>

    <option data-countryCode="HR" value="385">Croatia (+385)</option>

    <option data-countryCode="CU" value="53">Cuba (+53)</option>

    <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>

    <option data-countryCode="CY" value="357">Cyprus South (+357)</option>

    <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>

    <option data-countryCode="DK" value="45">Denmark (+45)</option>

    <option data-countryCode="DJ" value="253">Djibouti (+253)</option>

    <option data-countryCode="DM" value="1809">Dominica (+1809)</option>

    <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>

    <option data-countryCode="EC" value="593">Ecuador (+593)</option>

    <option data-countryCode="EG" value="20">Egypt (+20)</option>

    <option data-countryCode="SV" value="503">El Salvador (+503)</option>

    <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>

    <option data-countryCode="ER" value="291">Eritrea (+291)</option>

    <option data-countryCode="EE" value="372">Estonia (+372)</option>

    <option data-countryCode="ET" value="251">Ethiopia (+251)</option>

    <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>

    <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>

    <option data-countryCode="FJ" value="679">Fiji (+679)</option>

    <option data-countryCode="FI" value="358">Finland (+358)</option>

    <option data-countryCode="FR" value="33">France (+33)</option>

    <option data-countryCode="GF" value="594">French Guiana (+594)</option>

    <option data-countryCode="PF" value="689">French Polynesia (+689)</option>

    <option data-countryCode="GA" value="241">Gabon (+241)</option>

    <option data-countryCode="GM" value="220">Gambia (+220)</option>

    <option data-countryCode="GE" value="7880">Georgia (+7880)</option>

    <option data-countryCode="DE" value="49">Germany (+49)</option>

    <option data-countryCode="GH" value="233">Ghana (+233)</option>

    <option data-countryCode="GI" value="350">Gibraltar (+350)</option>

    <option data-countryCode="GR" value="30">Greece (+30)</option>

    <option data-countryCode="GL" value="299">Greenland (+299)</option>

    <option data-countryCode="GD" value="1473">Grenada (+1473)</option>

    <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>

    <option data-countryCode="GU" value="671">Guam (+671)</option>

    <option data-countryCode="GT" value="502">Guatemala (+502)</option>

    <option data-countryCode="GN" value="224">Guinea (+224)</option>

    <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>

    <option data-countryCode="GY" value="592">Guyana (+592)</option>

    <option data-countryCode="HT" value="509">Haiti (+509)</option>

    <option data-countryCode="HN" value="504">Honduras (+504)</option>

    <option data-countryCode="HK" value="852">Hong Kong (+852)</option>

    <option data-countryCode="HU" value="36">Hungary (+36)</option>

    <option data-countryCode="IS" value="354">Iceland (+354)</option>

    <option data-countryCode="IN" value="91">India (+91)</option>

    <option data-countryCode="ID" value="62">Indonesia (+62)</option>

    <option data-countryCode="IR" value="98">Iran (+98)</option>

    <option data-countryCode="IQ" value="964">Iraq (+964)</option>

    <option data-countryCode="IE" value="353">Ireland (+353)</option>

    <option data-countryCode="IL" value="972">Israel (+972)</option>

    <option data-countryCode="IT" value="39">Italy (+39)</option>

    <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>

    <option data-countryCode="JP" value="81">Japan (+81)</option>

    <option data-countryCode="JO" value="962">Jordan (+962)</option>

    <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>

    <option data-countryCode="KE" value="254">Kenya (+254)</option>

    <option data-countryCode="KI" value="686">Kiribati (+686)</option>

    <option data-countryCode="KP" value="850">Korea North (+850)</option>

    <option data-countryCode="KR" value="82">Korea South (+82)</option>

    <option data-countryCode="KW" value="965">Kuwait (+965)</option>

    <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>

    <option data-countryCode="LA" value="856">Laos (+856)</option>

    <option data-countryCode="LV" value="371">Latvia (+371)</option>

    <option data-countryCode="LB" value="961">Lebanon (+961)</option>

    <option data-countryCode="LS" value="266">Lesotho (+266)</option>

    <option data-countryCode="LR" value="231">Liberia (+231)</option>

    <option data-countryCode="LY" value="218">Libya (+218)</option>

    <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>

    <option data-countryCode="LT" value="370">Lithuania (+370)</option>

    <option data-countryCode="LU" value="352">Luxembourg (+352)</option>

    <option data-countryCode="MO" value="853">Macao (+853)</option>

    <option data-countryCode="MK" value="389">Macedonia (+389)</option>

    <option data-countryCode="MG" value="261">Madagascar (+261)</option>

    <option data-countryCode="MW" value="265">Malawi (+265)</option>

    <option data-countryCode="MY" value="60">Malaysia (+60)</option>

    <option data-countryCode="MV" value="960">Maldives (+960)</option>

    <option data-countryCode="ML" value="223">Mali (+223)</option>

    <option data-countryCode="MT" value="356">Malta (+356)</option>

    <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>

    <option data-countryCode="MQ" value="596">Martinique (+596)</option>

    <option data-countryCode="MR" value="222">Mauritania (+222)</option>

    <option data-countryCode="YT" value="269">Mayotte (+269)</option>

    <option data-countryCode="MX" value="52">Mexico (+52)</option>

    <option data-countryCode="FM" value="691">Micronesia (+691)</option>

    <option data-countryCode="MD" value="373">Moldova (+373)</option>

    <option data-countryCode="MC" value="377">Monaco (+377)</option>

    <option data-countryCode="MN" value="976">Mongolia (+976)</option>

    <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>

    <option data-countryCode="MA" value="212">Morocco (+212)</option>

    <option data-countryCode="MZ" value="258">Mozambique (+258)</option>

    <option data-countryCode="MN" value="95">Myanmar (+95)</option>

    <option data-countryCode="NA" value="264">Namibia (+264)</option>

    <option data-countryCode="NR" value="674">Nauru (+674)</option>

    <option data-countryCode="NP" value="977">Nepal (+977)</option>

    <option data-countryCode="NL" value="31">Netherlands (+31)</option>

    <option data-countryCode="NC" value="687">New Caledonia (+687)</option>

    <option data-countryCode="NZ" value="64">New Zealand (+64)</option>

    <option data-countryCode="NI" value="505">Nicaragua (+505)</option>

    <option data-countryCode="NE" value="227">Niger (+227)</option>

    <option data-countryCode="NG" value="234">Nigeria (+234)</option>

    <option data-countryCode="NU" value="683">Niue (+683)</option>

    <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>

    <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>

    <option data-countryCode="NO" value="47">Norway (+47)</option>

    <option data-countryCode="OM" value="968">Oman (+968)</option>

    <option data-countryCode="PW" value="680">Palau (+680)</option>

    <option data-countryCode="PA" value="507">Panama (+507)</option>

    <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>

    <option data-countryCode="PY" value="595">Paraguay (+595)</option>

    <option data-countryCode="PE" value="51">Peru (+51)</option>

    <option data-countryCode="PH" value="63">Philippines (+63)</option>

    <option data-countryCode="PL" value="48">Poland (+48)</option>

    <option data-countryCode="PT" value="351">Portugal (+351)</option>

    <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>

    <option data-countryCode="QA" value="974">Qatar (+974)</option>

    <option data-countryCode="RE" value="262">Reunion (+262)</option>

    <option data-countryCode="RO" value="40">Romania (+40)</option>

    <option data-countryCode="RU" value="7">Russia (+7)</option>

    <option data-countryCode="RW" value="250">Rwanda (+250)</option>

    <option data-countryCode="SM" value="378">San Marino (+378)</option>

    <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>

    <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>

    <option data-countryCode="SN" value="221">Senegal (+221)</option>

    <option data-countryCode="CS" value="381">Serbia (+381)</option>

    <option data-countryCode="SC" value="248">Seychelles (+248)</option>

    <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>

    <option data-countryCode="SG" value="65">Singapore (+65)</option>

    <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>

    <option data-countryCode="SI" value="386">Slovenia (+386)</option>

    <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>

    <option data-countryCode="SO" value="252">Somalia (+252)</option>

    <option data-countryCode="ZA" value="27">South Africa (+27)</option>

    <option data-countryCode="ES" value="34">Spain (+34)</option>

    <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>

    <option data-countryCode="SH" value="290">St. Helena (+290)</option>

    <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>

    <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>

    <option data-countryCode="SD" value="249">Sudan (+249)</option>

    <option data-countryCode="SR" value="597">Suriname (+597)</option>

    <option data-countryCode="SZ" value="268">Swaziland (+268)</option>

    <option data-countryCode="SE" value="46">Sweden (+46)</option>

    <option data-countryCode="CH" value="41">Switzerland (+41)</option>

    <option data-countryCode="SI" value="963">Syria (+963)</option>

    <option data-countryCode="TW" value="886">Taiwan (+886)</option>

    <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>

    <option data-countryCode="TH" value="66">Thailand (+66)</option>

    <option data-countryCode="TG" value="228">Togo (+228)</option>

    <option data-countryCode="TO" value="676">Tonga (+676)</option>

    <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>

    <option data-countryCode="TN" value="216">Tunisia (+216)</option>

    <option data-countryCode="TR" value="90">Turkey (+90)</option>

    <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>

    <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>

    <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>

    <option data-countryCode="TV" value="688">Tuvalu (+688)</option>

    <option data-countryCode="UG" value="256">Uganda (+256)</option>

    <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->

    <option data-countryCode="UA" value="380">Ukraine (+380)</option>

    <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>

    <option data-countryCode="UY" value="598">Uruguay (+598)</option>

    <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->

    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>

    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>

    <option data-countryCode="VA" value="379">Vatican City (+379)</option>

    <option data-countryCode="VE" value="58">Venezuela (+58)</option>

    <option data-countryCode="VN" value="84">Vietnam (+84)</option>

    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>

    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>

    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>

    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>

    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>

    <option data-countryCode="ZM" value="260">Zambia (+260)</option>

    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>

					</select>

				</div> 

			

				

				<div class="form-group">

				  <label for="mob" class="sr-only">Mobile Number</label>

				  <input name="mob" type="text" class="form-control" id="mob" placeholder="Enter Mobile Number">

				</div>

				<button type="button" class="btn btn-success btn-lg stepsec">Next</button>

				<button class="btn btn-danger btn-lg" type="button" data-dismiss="modal">Close</button>

				<div class="setpadding"></div>

		  

			</div>

		  </div>

		</div>



	  </div>

	</div>

	<!-- Modal End-->

<!-- Modal Sign Up 2st Step-->

	<div id="stepsec" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

	  <div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

		 

		  <div class="modal-body">

			<div id="msg2"></div>

			<h3>Step 2 / 3</h3><br>

			

			<div class="container-fluid" style="background-color:#e6e6e6;margin-top:40px;padding-top:10px;">

			

				<div class="setpadding"></div>

				<div class="form-group">

				  <label for="otp" class="sr-only">Verify OTP</label>

				  <input name="otp" type="text" class="form-control" id="otp" placeholder="Verify OTP">

				</div>

				<button type="button" class="btn btn-success btn-lg stepthird">Next</button>

				<button type="button" class="btn btn-success btn-lg goback">Go Back</button>

				<div class="setpadding"></div>

		  

			</div>

		  </div>

		</div>



	  </div>

	</div>

	<!-- Modal End-->

	

	<!-- Modal Sign Up 3st Step-->

	<div id="stepthird" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

	  <div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

		 

		  <div class="modal-body">

		  <div id="msg3"></div>

			<h3>Step 3 / 3</h3><br>

			

			<div class="container-fluid" style="background-color:#e6e6e6;margin-top:40px;padding-top:10px;">

			

				<div class="setpadding"></div>

				<div class="getstarted">

					<p id="font-text" style="font-weight:bold;font-size:30px;">Download the APP to get your dash wallet</p>

					<a href="https://play.google.com/store/apps/details?id=hashengineering.darkcoin.wallet" type="button" class="btn btn-primary btn-lg" target="_blank">DOWNLOAD NOW</a>

				</div>

				<div class="setpadding"></div>

				<div class="form-group">

				  <label for="wallet" class="sr-only">Enter Wallet Address</label>

				  <input type="text" class="form-control" id="wallet" placeholder="Enter Wallet Address">

				</div>

				<button type="button" class="btn btn-success btn-lg success">Sign me up!</button>

				<div class="setpadding"></div>

		  

			</div>

		  </div>

		</div>



	  </div>

	</div>

	<!-- Modal End-->

	

	<!-- Modal Sign Up Congrats Message-->

	<div id="success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

	  <div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

		 

		  <div class="modal-body">

		  <div id=""></div>

				<div class="setpadding"></div>

				<?php

					// $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);

					// $goto='http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];

				?>

				<h2 class="bg-success" style="border-radius:15px;">Congratulation! Sign Up Successful!!!<br>

				You will get $1 shortly in your dash wallet account.

				

				<a href="" class="btn btn-info" role="button">Close</a></h2>

				<div class="setpadding"></div>

		  </div>

		</div>



	  </div>

	</div>

	<!-- Modal End-->

	

	



	



</body>

</html>

