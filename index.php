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
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/dash-icon3-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>getfreedash</title>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
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
if(is_user_login(0)){
	$logintrue = 1;
	$menu			=	'<a class="nav-link link" href="/member/index.php" style="color:lightgreen">MY ACCOUNT</a>';
}
else{
	$menu			=	'<a class="btn btn-link" id="loginButton1">LOG IN / SIGN UP</a>';
}

?>


<section id="ext_menu-9" data-rv-view="52">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="" class="navbar-logo"><img src="assets/images/dashlogo.gif"></a>
                        <a class="navbar-caption" href="/new.php">GETFREEDASH</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
						<li class="nav-item"><a class="nav-link link" href="#image1-a">VIDEO</a></li>
						<li class="nav-item"><a class="nav-link link" href="#getstarted-a">GET STARTED</a></li>
						<li class="nav-item"><a class="nav-link link" href="#features7-b">ABOUT DASH</a></li>
						<li class="nav-item"><a class="nav-link link" href="#testimonials3-e">TESTIMONIAL</a></li>
						<li class="nav-item"><a class="nav-link link" href="#form1-f">CONTACT</a></li>
						<li class="nav-item"><?php echo $menu; ?></li>
					</ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-section-with-arrow mbr-parallax-background mbr-after-navbar" id="header1-7" data-rv-view="47" style="background-image: url(assets/images/dsahbg-1386x692.jpg);">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1 tt"><span style="font-weight: normal;">The hottest cryptocurrency DASH in your hands now</span></h1>
                    <p class="mbr-section-lead lead"><br>Simply Sign with your phone number and get $1 worth of Dash
<br>
<br>Earn $1 for every friend who signs up using your referral link&nbsp;</p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#image1-a"><i class="mbr-arrow-icon"></i></a></div>

</section>

<div class="setpadding" id="image1-a"></div>
<div class="setpadding"></div>
<section id="youtube_video">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://youtube.com/embed/S0oNO3mbBE8?rel=0&amp;showinfo=0&amp;start=0"></iframe>
				</div>
			</div>
			<div class="col-sm-6">
				<h1 class="text-center">Dash is Digital Cash</h1>
				<p class="text-justify lead"><strong>Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.The currency incorporates several key innovations, some aimed towards increasing anonymity and others simply to improve the functioning of the system. Its core purpose is to act as a kind of electronic cash, providing a level of anonymity hitherto unheard of among cryptocurrencies.Dash is not yet widely accepted by retailers, but a fair selection of independent businesses accept it. Its value per coin is also one of the highest on the market. </strong>
				</p>
			</div>
		</div>
	</div>
<div class="setpadding"></div>
<div class="setpadding"></div>
</section>


<section id="getstarted-a">
<div class="container-fluid getstarted">
		<div class="row">
			<div id="getstarted" class="col-sm-12">
				<div class="setpadding"></div>
				<h2 id="header-font" class="right">Get Started</h2>
				<div class="setpadding"></div>
				<div class="setpadding"></div>
				<div class="col-sm-4">
					<div class="heading" >
						<h2>Sign up using your Phone Number	</h2>
					</div>
						<p>Simply enter your phone number and verify  with the OTP that we send you</p>
						<div class="setpadding"></div><div class="setpadding"></div>
					<?php
					if(empty($logintrue)){//don't show login button
						echo '<button type="button" class="btn btn-success btn-lg" id="loginButton2">Log In</button>';
					}
					?>
					<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#stepfirst">Sign Up</button>
					<div class="setpadding"></div>
				</div>	
				<div class="col-sm-4">
					<div class="heading">
						<h2>Download the APP to get your dash wallet</h2>
					</div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<div class="setpadding"></div>
					<a href="https://play.google.com/store/apps/details?id=hashengineering.darkcoin.wallet" type="button" class="btn btn-success btn-lg" target="_blank">DOWNLOAD NOW</a>
					<div class="setpadding"></div>
				</div>	
				<div class="col-sm-4">
					<div class="heading">
						<h2>Get your referral link</h2>
					</div>
					<div class="setpadding"></div>
					<div class="desc">
						<p>Share your referral link with as many friends as you can, you earn $1 for friend who signs up</p> 
					</div>
					<button type="button" class="btn btn-success" id="showReferral">CLICK THIS TO GET YOUR LINK NOW</button>
					<div class="setpadding"></div>
				</div>
			</div>
	
		</div>
 </div>
 </section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-b" data-rv-view="56" style="background-color: rgb(242, 130, 129);">
    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><span class="mbri-preview mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">PRIVATE</h4>
                        
                        <p class="card-text">Keep your payments private so nobody can track you, your transactions and balances are nobody’s business. With Dash’s ahead- of- time anonymization, only you have access to your financial information.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><span class="mbri-globe mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">GLOBAL</h4>
                        
                        <p class="card-text">You can send money anywhere in the world with the same low fees and the same speed as if you were sending money next door!</p>
                        
                    </div>
                </div>
          </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><span class="mbri-protect mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">SECURE</h4>
                        
                        <p class="card-text">Advanced encryption and a trustless protocol for complete security in your payments and anonymization process.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><span class="mbri-like mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">LOW - FEES</h4>
                        
                        <p class="card-text">Most transactions only cost a few cents to send, which is considerably cheaper than services like Western Union, PayPal, or Moneygram.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</section>

<section class="form2" id="form2-d" data-rv-view="59" style="background-color: rgb(41, 105, 176);">
    <div class="setpadding"></div>
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">SUBSCRIBE FORM</h3>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
                    <div data-form-alert="true"><div hidden="" data-form-alert-success="true">Thanks for filling out form!</div></div>
                    <form class="mbr-form" action="" method="post" data-form-title="SUBSCRIBE FORM">
                        <input type="hidden" value="3KiOTrQ125VxormOdVtKGhaeC4f5OBXPlfy09tIHpFkKL0nipunk4aCCHM3kyJs5euoxBAfQfDkEBlsUQPFDh7hoP1d9sQrb/7DlyDMnDAyWQUsFKrE/yqzkhc6uodkj" data-form-email="true">
                        <div class="mbr-subscribe mbr-subscribe-dark input-group">
                            <input type="email" class="form-control" name="email" required="" data-form-field="Email" placeholder="Enter Email Address" id="form2-d-email">
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary">SUBSCRIBE</button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div class="setpadding"></div>
</section>

<section class="mbr-section mbr-parallax-background" id="testimonials3-e" data-rv-view="65" style="background-image: url(assets/images/bg-4-1920x1275.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>

        <div class="mbr-section mbr-section__container mbr-section__container--middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-center">
                        <h3 class="mbr-section-title display-2">WHAT OUR FANTASTIC USERS SAY</h3>
                        
                    </div>
                </div>
            </div>
        </div>


    <div class="mbr-testimonials mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-4">

                    <div class="mbr-testimonial card">
                        <div class="card-block"><p>“its really very amazing app that makes me finish html page in 3 minutes ( that's usually takes more than 1 hours at least from me if i did it from scratch). i hope to have very big library and plugins for this APP thanks again for your nice application”</p></div>
                        <div class="mbr-author card-footer">
                            
                            <div class="mbr-author-name">Abanoub S.</div>
                            
                        </div>
                    </div>
                </div><div class="col-xs-12 col-lg-4">

                    <div class="mbr-testimonial card">
                        <div class="card-block"><p>“First of all hands off to you guys for your effort and nice, super tool. Good work team. We are expecting the new version soon with advance functionality with full bootstrap design. Great effort and super UI experience with easy drag &amp; drop with no time design bootstrap builder in present web design world.”</p></div>
                        <div class="mbr-author card-footer">
                            
                            <div class="mbr-author-name">Suffian A.</div>
                            
                        </div>
                    </div>
                </div><div class="col-xs-12 col-lg-4">

                    <div class="mbr-testimonial card">
                        <div class="card-block"><p>“At first view, looks like a nice innovative tool, i like the great focus and time that was given to the responsive design, i also like the simple and clear drag and drop features. Give me more control over the object's properties and ill be using this tool for more serious projects. Regards.”</p></div>
                        <div class="mbr-author card-footer">
                            
                            <div class="mbr-author-name">Jhollman C.</div>
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>

    <div class="container-fluid" id="myfaq">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
						  <h2 id="header-font" style="text-align:center;color:blue;"><div class="setpadding"></div><div class="setpadding"></div>FAQ</h2><div class="setpadding"></div>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
					  <h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						  What is Dash1?
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					  <div class="panel-body">
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.<br><br>
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						   What is Dash2?
						</a>
					  </h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					  <div class="panel-body">
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						  What is Dash3?
						</a>
					  </h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					  <div class="panel-body">
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
						Dash is the hottest digital currency that has taken the world by a storm, send or receive any amount of money instantly and for free forever.
					  </div>
					</div>
				  </div>
				</div>
			</div>
		</div>
			<div class="setpadding"></div>
<div class="setpadding"></div>
    </div>


<section class="mbr-section form1" id="form1-f" data-rv-view="75" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">CONTACT FORM<br><br></h3>
                    <small class="mbr-section-subtitle">please contact if you are facing any issues</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


                    <div data-form-alert="true">
                        <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for filling out form!</div>
                    </div>


                    <form action="" method="post" data-form-title="CONTACT FORM">

                        <input type="hidden" value="jbr4mWIpiV7KcSivKFT7Gf5Jrix6z/sVwV0Q3OXEExwS01sjVgijZM4jFuKMTgtGpmPMtFj0C8JUHJhC76/zT9uy5hb7yGR7MFap0KftSqzW9C0RnriwlEBDTilg3xG4" data-form-email="true">

                        <div class="row row-sm-offset">

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-f-name">Name<span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" name="name" required="" data-form-field="Name" id="form1-f-name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-f-email">Email<span class="form-asterisk">*</span></label>
                                    <input type="email" class="form-control" name="email" required="" data-form-field="Email" id="form1-f-email">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-f-phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="form1-f-phone">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="form1-f-message">Message</label>
                            <textarea class="form-control" name="message" rows="7" data-form-field="Message" id="form1-f-message"></textarea>
                        </div>

                        <div><button type="submit" class="btn btn-primary">CONTACT US</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-8" data-rv-view="50" style="background-color: rgb(41, 105, 176); padding-top: 2.625rem; padding-bottom: 2.625rem;">
    
    <div class="container text-xs-center">
        <p><strong>Copyright © 2017 Get Free dash - All Rights Reserved.</strong></p>
    </div>
</footer>

<!-- ALL MODAL BODY START HERE -->
			<!-- Modal Sign Up 1st Step-->
	<div id="stepfirst" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<h5>Step 1 / 3</h5>
					</div>
					<div class="col-sm-6">
						<div class="text-right"><strong class="modalcontentfirst" style="border-radius:25px;font-size:18px;">Sign Up To Get $1 Free.</strong></div>
					</div>
				</div>
			</div>
			<div class="text-center"><div id="msg"></div></div>
			
			<div class="container-fluid" style="background-color:#00cccc;margin-top:10px;padding-top:10px;">
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
				<span style="margin-bottom:10px;"></span>
		  
			</div>
			<span style="margin-bottom:10px;"></span>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
<!-- Modal Sign Up 2st Step-->
	<div id="stepsec" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<h5>Step 2 / 3</h5>
					</div>
				</div>
			</div>
			<div id="msg2"></div>
			<div class="container-fluid" style="background-color:#00cccc;margin-top:40px;padding-top:10px;">
			
				<div class="setpadding"></div>
				<div class="form-group">
				  <label for="otp" class="sr-only">Verify OTP</label>
				  <input name="otp" type="text" class="form-control" id="otp" placeholder="Verify OTP">
				</div>
				<button type="button" class="btn btn-success btn-lg stepthird">Next</button>
				<button type="button" class="btn btn-danger btn-lg goback">Go Back</button>
				<div class="setpadding"></div>
		  
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
	
	<!-- Modal Sign Up 3st Step-->
	<div id="stepthird" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<h5>Step 3 / 3</h5>
					</div>
				</div>
			</div>
		  <div class="text-center"><div id="msg3"></div></div>
			
			<div class="container-fluid" style="background-color:#00cccc;padding-top:10px;">
				<div class="text-left small-font" style="color:yellow;">* All fields are mandatory!</div>
				<div class="getstarted">
					<p id="font-text" style="font-weight:bold;font-size:25px;">Download the APP to get your dash wallet</p>
					<a href="https://play.google.com/store/apps/details?id=hashengineering.darkcoin.wallet" type="button" class="btn btn-primary btn-lg" target="_blank">DOWNLOAD NOW</a>
				</div>
				<div class="form-group">
				  <label for="wallet" class="sr-only">Enter Wallet Address</label>
				  <input type="text" class="form-control" id="wallet" placeholder="Enter Wallet Address">
				</div>
				<div class="form-group">
				  <label for="fname" class="sr-only">Enter First Name</label>
				  <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
				</div>
				<div class="form-group">
				  <label for="lname" class="sr-only">Enter Last Name</label>
				  <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
				</div>
				<div class="form-group">
				  <label for="eid" class="sr-only">Enter Email id</label>
				  <input type="text" class="form-control" id="eid" placeholder="Enter Email id">
				</div>
				<div class="form-group">
				  <label for="pass1" class="sr-only">Enter Password</label>
				  <input type="password" class="form-control" id="pass1" placeholder="Enter Password">
				</div>
				<div class="form-group">
				  <label for="pass2" class="sr-only">Re-Enter Password</label>
				  <input type="password" class="form-control" id="pass2" placeholder="Re-Enter Password">
				</div>
				<button type="button" class="btn btn-success btn-lg success">Sign me up!</button>
		  
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
	
	<!-- Modal Sign Up Congrats Message-->
	<div id="success" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			  <div class="container-fluid" style="background-color:#00cccc;margin-top:0px;padding-top:10px;">
					<div class="text-center" style="color:green;"><h3>Congratulation! Sign Up Successful!!!</h3></div>
					<h3 class="text-center">You will get $1 shortly in your dash wallet account.<br></h3>
					<div class="text-center"><a href="" class="btn btn-danger" role="button">Close</a></div>
			  </div>
				
				<?php
					// $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
					// $goto='https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
				?>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
	
	
<!-- Modal USER LOGIN START-->
	<div id="userloginform" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container-fluid" style="background-color:#00cccc;padding-top:10px;">
					<div class="text-center"><h3>User Login</h3></div>
					<div id="errmsg"></div>
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="text-center"><strong class="text-center" style="padding:10px 10px;border-radius:25px;font-size:18px;">You must login to access your member area.</strong></div>
							<form class="form" method="POST" action="/member/login.php">
								<div class="form-group">
								  <label for="mob" class="sr-only">Mobile Number</label>
								  <input name="mob" type="text" class="form-control" id="usermob" placeholder="Enter Email id  or Mobile Number">
								</div>
								<div class="form-group">
								  <label for="password" class="sr-only">Enter Password</label>
								  <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="checkbox">
											<label><input name="rememberme" id="rememberme" type="checkbox" checked> Remember me</label>
										</div>
									</div>
									<div class="col-sm-6">
										<a id="forgetformClick" class="" style="cursor:pointer;color:white;">Forget Password?</a>
									</div>
								</div>
								<input type="button" class="btn btn-success btn-lg userlogin" value="Log In">
								<button class="btn btn-danger btn-lg" type="button" data-dismiss="modal">Close</button>
							</form>
							<p class="small-font">Don't have an account?<a id="createanaccount" class="" style="cursor:pointer;color:white;"> Create an account.</a></p>
						</div>
					</div>
		  
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
	
<!-- Modal FORGET PASSWORD START-->
	<div id="forgetform" class="modal custom fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div class="container-fluid" style="background-color:#00cccc;padding-top:10px;">
					<div class="text-center"><h3>Forget Password</h3></div>
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="text-center"><strong class="text-center" style="padding:10px 10px;border-radius:25px;font-size:14px;">Enter your registered email address below</strong></div>
								<div class="form-group">
								  <label for="email" class="sr-only">Enter Email Address</label>
								  <input name="text" type="email" class="form-control" id="fpEmailId" placeholder="Enter Email Address">
								</div>
								<input type="submit" class="btn btn-success btn-lg" value="Submit" id="fpSubmit">
								<button class="btn btn-danger btn-lg" type="button" data-dismiss="modal">Close</button>

							<p class="small-font">Already have an account?<a id="loginButton3" class="" style="cursor:pointer;color:white;"> Click here to login.</a></p>
						</div>
					</div>
		  
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<!-- Modal End-->
<!-- ALL MODAL BODY END HERE -->


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  <script src="myjs.js"></script>

  <input name="animation" type="hidden">
  </body>
</html>