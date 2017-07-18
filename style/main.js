


function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

															
var original = $('#modal').html();
var original_login_button = $('.user_info').html();
var valid=false;

$(document).ready(function(){
	
	$(document).on('keypress','.password',function(){
		var pass_pattern=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
		if(pass_pattern.test($('.password').val()))
		{
			$('.password').next().html('');
		}
		else
		{ 
			$('.password').next().html('<p class="text-danger">Password must contain Minimum \
			<ul><li>Eight characters</li> <li>Atleast one letter</li> <li>One number </li> <li>One special character</li></p>');
		}
	});
	
	$(document).on('keypress mouseout','.confirm_password',function(){
		if(($('.password').val())==($('.confirm_password').val()))
		 { 
				$('.confirm_password').next().html('');
		}
	  
		else { 
				$('.confirm_password').next().html('<p class="text-danger">Password does\'nt match</p>');
			}
	});
	
	$(document).on('submit','.register_form',function(){
	    $.ajax({
				 type:'post',
				 cache:false,
				 dataType:'json',
				 url:'register.php',
				 data:$('.register_form').serialize(),
				 beforeSend: function(){
								$("#register").html('<span class=""> Registering...</span>');
				 },
				 success: function(response){
												$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+response.msg+'</h2></div>');
												setTimeout(function(){
																		$('#modal').html(original);
																		$('#close-modal').click();
																		$('.modal-backdrop ,fade ,in').remove();
																		$("#header").load("header.php");
																	},2000
															);
															
														
										   }
			   });
		return false;
	});
	
	$(document).on('submit','.login_form',function(){
	    $.ajax({
				 type:'post',
				 cache:false,
				 url:'login.php',
				 dataType:'json',
				 data:$('.login_form').serialize(),
				 beforeSend: function(){
								$("#login").html('<span class="">Loging in...</span>');
				 },
				 success: function(response){   if(response.status=="login") 
												{	
													$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+(response.msg)+'<br>Welcome '+(response.username)+' </h2></div>');
													setTimeout(function(){  
																			$('#modal').html(original);
																			$('#close-modal').click();
																			$('.modal-backdrop ,fade ,in').remove();
																			$("#header").load("header.php");
																		 },1);
												}
												else if(response.status=="logout")
												{
													$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+(response.msg)+'<br>Please Retry</h2></div>');
												    setTimeout(function(){  
																			$('#modal').html(original);
																		 },2000);
												}
														
										   }
			   });
			   
		return false;
	});


	
	$(document).on('click','.logout',function(){
		
		$.ajax({
				type:'post',
				cache:false,
				url:'logout.php',
				data:{ status:'logout'},
				success: function(result){
					if(result=="ok"){
					$("#header").load("header.php");
					}
				}
		})
	});
	
	
// Facebook login script	
$(document).on('click','#fbLink',function(){
	
		window.fbAsyncInit = function() {
		// FB JavaScript SDK configuration and setup
		FB.init({
		  appId      : '1848921672102352', // FB App ID
		  cookie     : true,  // enable cookies to allow the server to access the session
		  xfbml      : true,  // parse social plugins on this page
		  version    : 'v2.8' // use graph api version 2.8
		});
		
		// Check whether the user already logged in
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				//display user data
				getFbUserData();
			}
			});
		};

		// Load the JavaScript SDK asynchronously
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// Facebook login with JavaScript SDK
		function fbLogin() {
			FB.login(function (response) {
				if (response.authResponse) {
					// Get and display the user profile data
					getFbUserData();
				} else {
					document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
				}
			}, {scope: 'email'});
		}

		// Fetch the user profile data from facebook
		function getFbUserData(){
			FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
			function (response) {
				saveUserData(response);
				
			});
		}

		// Save user data to the database
		function saveUserData(userData){
			var userData=JSON.stringify(userData);
			$.ajax({
					method :'post',
					url : 'register.php',
					data : {'userdata':userData},
					dataType:'json',
					success : function(response){			
															$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+response.msg+'</h2></div>');
															setTimeout(function(){
																					$('#modal').html(original);
																					$('#close-modal').click();
																					$('.modal-backdrop ,fade ,in').remove();
																					$("#header").load("header.php");
																				},2000
																		);
												}
				});
		   
		}

		// Logout from facebook
		function fbLogout() {
			FB.logout(function() {
				document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
				document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
				document.getElementById('userData').innerHTML = '';
				document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
			});
		}

	});
	
	
	
}); //document.ready close



