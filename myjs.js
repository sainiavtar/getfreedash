$(document).ready(function(){
	
	// $('#stepthird').modal('show');
	// $('#stepsec').modal('show');
	
	// $("#loginButton").click(function(){
		// $('#userloginform').modal('show');
	// });
	$("#loginButton1,#loginButton2").click(function(){
		$('#userloginform').modal('show');
	});
	
	$("#loginButton3").click(function(){
		$('#forgetform').modal('hide');
		$('#userloginform').modal('show');
	});	
	
	$("#fpSubmit").click(function(){
		fpEmailId = $('#fpEmailId').val();
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'email='+fpEmailId+'&proType=fp',
			success:function(data){
				console.log(data);
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					alert(res_obj.msg);
				}
				else{
					$('#fpEmailId').val("");
					$('#forgetform').modal('hide');
					alert(res_obj.msg);
				}
			}
		});
	});
	
	
	$("#forgetformClick").click(function(){
		$('#userloginform').modal('hide');
		$('#forgetform').modal('show');
	});	
	
	$("#createanaccount").click(function(){
		$('#userloginform').modal('hide');
		$('#stepfirst').modal('show');
	});
	
	
	// $('#showReferral').click(); 
	$( "#showReferral" ).trigger( "click" );
	// $('#referralsuccess').modal('show'); 
	//second modal
	$('.stepsec').click(function(){
		//$('#stepfirst').modal('hide');
		//$('#stepsec').modal('show'); 
		ccode	=	$('#ccode').val();
		mob		=	$('#mob').val();
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'ccode='+ccode+'&mob='+mob+'&proType=stepfirst',
			success:function(data){
				console.log(data);
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					$('#msg').html(res_obj.msg);
				}
				else{
					$('#stepfirst').modal('hide');
					$('#stepsec').modal('show'); 
					$('#msg2').html(res_obj.msg);
				}
			}
		});
	});
	
	//third modal
	$('.stepthird').click(function(){
		//$('#stepsec').modal('hide');
		//$('#stepthird').modal('show'); 
		otp	=	$('#otp').val();
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'otp='+otp+'&proType=stepsecond',
			success:function(data){
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					$('#msg2').html(res_obj.msg);
				}
				else{
					$('#stepsec').modal('hide');
					$('#stepthird').modal('show'); 
					$('#msg3').html(res_obj.msg);
				}
			}
		});
	});
	
	//success modal of signup
	$('.success').click(function(){
		//$('#stepthird').modal('hide');
		//$('#success').modal('show'); 
		wallet	=	$('#wallet').val();
		fname	=	$('#fname').val();
		lname	=	$('#lname').val();
		eid		=	$('#eid').val();
		pass1	=	$('#pass1').val();
		pass2	=	$('#pass2').val();
		$.ajax({
			type:'GET',
			url:'process.php',
			// data:'wallet='+wallet+'&proType=stepthird',
			data:'wallet='+wallet+'&pass1='+pass1+'&pass2='+pass2+'&fname='+fname+'&lname='+lname+'&eid='+eid+'&proType=stepthird',
			success:function(data){
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					$('#msg3').html(res_obj.msg);
				}
				else{
					$('#stepthird').modal('hide');
					$('#success').modal('show');
					$('#msg4').html(res_obj.msg);
				}
			}
		});
	});
	
	//go back to first stepfirst
	$('.goback').click(function(){
		$('#stepsec').modal('hide');
		$('#stepfirst').modal('show'); 
	});


	//show referal modal
	// $('.askDetailPro').click(function(){
	$(document).on('click','.askDetailPro', function(){
		fname	=	$('#fname').val();
		lname	=	$('#lname').val();
		emailid	=	$('#emailid').val();
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'fname='+fname+'&lname='+lname+'&emailid='+emailid+'&proType=askDetailPro',
			success:function(data){
				res_obj = JSON.parse(data);
				if(res_obj.msg==''){//means show referral id and link
					is_empty = $('#referralsuccess').html();
					// alert(is_empty);
					if(is_empty!=undefined){
						$('#referralsuccess').removeAttr('id');
					}
					$('#askDetailModal').modal('hide');
					$('body').append(res_obj.data.result);
					$('#referralsuccess').modal('show');
					
				}
			}
		});
	});
	
	//show referal modal
	$('#showReferral').click(function(){
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'proType=showReferralModal',
			success:function(data){
				
				if(data=='userloginform'){
					$('#userloginform').modal('show');
				}
				else{
					res_obj = JSON.parse(data);
					if(res_obj.msg==''){//means show referral id and link
						is_empty = $('#referralsuccess').html();
						// alert(is_empty);
						if(is_empty!=undefined){
							$('#referralsuccess').removeAttr('id');
						}
						$('body').append(res_obj.data.result);
						$('#referralsuccess').modal('show');
						
					}
					else{//show askDetailModal
						is_empty1 = $('#askDetailModal').html();
						// alert(is_empty);
						if(is_empty1!=undefined){
							$('#referralsuccess').removeAttr('id');
						}
						$('body').append(res_obj.data.result);
						$('#askDetailModal').modal('show');
					}
				}
				
			}
		});
	});
	
	//give sign Bonus
	$('.giveSignBonus').click(function(){
		thisButton = $(this);
		id	=	thisButton.val();
		if(id==''){
			return false;
		}
		thisButton.val('');//reset value to avoid click on same button
		// alert(id);
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'id='+id+'&proType=giveSignBonus',
			success:function(data){
				console.log(data);
				thisButton.text(data);
				total_paid_out = $('#paidout').text();
				total_paid_out++;
				$('#paidout').text(total_paid_out);
				payment_pending = $(paymentpending).text();
				payment_pending--;
				$(paymentpending).text(payment_pending);
				this
				}
			});
	});
	
	
	//give ref Bonus
	$('.giveRefBonus').click(function(){
		thisButton = $(this);
		getVal	=	thisButton.val();
		if(getVal==''){
			return false;
		}
		thisButton.val('');//reset value to avoid click on same button
		// alert(getVal);
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'getVal='+getVal+'&proType=giveRefBonus',
			success:function(data){
				console.log(data);
				thisButton.text(data);
				}
			});
	});
	
	//referral link generate
	$('.referralsuccess').click(function(){
		refno	=	$('#refno').val();
		// alert(refno);
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'refno='+refno+'&proType=steprefno',
			success:function(data){
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					$('#msg4').html(res_obj.msg);
				}
				else{
					$('#myModalReferral').modal('hide');
					$('#referralsuccess').modal('show');
					$('#msg5').html(res_obj.msg);
				}
			}
		});
	});
	
	/*
	$.getJSON("http://ip-api.com/json/", function (data) {
		console.log(data);
		ip			=	data.query;
		visitorCC =		data.countryCode;
		// visitorCC =		"AR";
		// alert(ip + " " + visitorCC);
	  	atval = "[data-countryCode='"+visitorCC+"']";
		$(atval).prop('selected', true);
	});
	*/
	
	$.getJSON("https://freegeoip.net/json/", function (data) {
		console.log(data);
		visitorCC =		data.country_code;
		// visitorCC =		"AR";
		// alert(ip + " " + visitorCC);
	  	atval = "[data-countryCode='"+visitorCC+"']";
		$(atval).prop('selected', true);
	});
	
	//withdraw
	$('#withdraw').click(function(){
		totalmoney	=	$('#total_money_left').attr('class');
		// alert(totalmoney);
		$.ajax({
			type:'GET',
			url:'ajax.php',
			data:'totalmoney='+totalmoney,
			success:function(data){
					$('body').append(data);
					$('#withdrawModal').modal('show');
				}
		});
	});
	
	//userlogin
	$('.userlogin').click(function(){
		mob		=	$('#usermob').val();
		pass	=	$('#password').val();
		// pass the value of rememberme yes
		rememberme	=	'yes';
		// alert(rememberme);
		$.ajax({
			type:'GET',
			url:'process.php',
			data:'mob='+mob+'&pass='+pass+'&rememberme='+rememberme+'&proType=memberlogin',
			success:function(data){
				res_obj = JSON.parse(data);
				if(res_obj.error==1){
					$('#errmsg').html(res_obj.msg);
				}
				else{
					window.location="/member/index.php";
				}
			}
		});
	});
	
	$(document).ready(function()
		{
		  $("tr:odd").css({
			"background-color":"#4da6ff",
			"color":"#fff"});
	});
	
});
