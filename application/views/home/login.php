<div class="main-floor no-border login">
	<div class="register-header">
		<h2>Login</h2>
		<span class="reg-tip">
			
		</span>
	</div>
	<div class="login-main-body">
		<div class="login-main-info fl">
		<form method="post" action="/home/loginHandler" enctype="multipart/form-data">
			<div class="login-field">
				<label style="width:30%;">Username or Email</label>
				<div>
					<input name="username" type="text" class="inp-txt width250" value="<?php echo isset($_GET['username'])?$_GET['username']:'';?>">
				</div>
			</div>
			<div class="login-field">
				<label style="width:30%;">Password</label>
				<div>
					<input name="pwd" type="password" class="inp-txt width250">
				</div>
			</div>
			<div class="login-field">
				<label style="width:30%;">Security</label>
				<div class="veri-code">
					<img id="validCodeImg" src="" onclick="refreshCode()"> 
                    <a href="javascript:refreshCode()">Refresh</a>
                    <input name="validCode" type="text" class="inp-txt width100">
				</div>
			</div>
			<div class="login-btn-div">
				<input type="submit" class="login-btn" id="btnRegister" onclick="" value="Log In">
			</div>
			<div class="login-field" style="padding-left: 40px;">
				<a href="/home/forgotPassword" target="_blank">Forgot Your Password?</a>
			</div>
		</form>
		</div>
		<div class="login-other-func fr">
			<div class="login-ad">
				<img src="/assets/images/home/login-ad.jpg">
			</div>
			<ul class="">
				<!--
				<li><a href="">Find email or ID </a>|<a href=""> Find Password</a></li>
				<li><a href="">Guide for Problem</a></li>
				-->
				<li>
					<p class="reg-sns">
						<fb:login-button scope="public_profile,email" onlogin="checkLoginState();" style="top: 3px;"></fb:login-button>
						<span class="txt">Sign in with your facebook account</span>
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div class="login-footer clearfix">
		<h3><img src="/assets/images/cms/icon4.jpg">Specially for AiiMai Members</h3>
		<div class="login-footer-left fl clearfix">
			<div class="login-footer-title">Everyday at AiiMai</div>
			<ul>
				<li><a href="" target="_blank" class="luck-auction">Lucky Auction</a></li>
				<li><a href="" target="_blank" class="today-sale">Today's Sale</a></li>
				<li><a href="" target="_blank" class="bestsellers">BestSellers</a></li>
			</ul>
		</div>
		<div class="login-footer-right fr clearfix">
			<div class="login-footer-title">Shopping Tips & Benefits</div>
			<ul>
				<li><a href="" target="_blank" class="club">Coupon Book<strong>A-Prime Club</strong></a></li>
				<li><a href="" target="_blank" class="chance">Everyday Enjoy your<strong>Achance</strong></a></li>
				<li><a href="" target="_blank" class="stamp">Share your review<strong>1A-Stamp</strong></a></li>
			</ul>
		</div>
	</div>
<script>
	refreshCode();
</script><script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
	  loginAiiMaiWithFB();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '705101599598980',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.
/*
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });*/

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  function loginAiiMaiWithFB(){
	FB.api('/me', function(response){
		$.post(
		"/common/loginWithFB",
		{
			'email':response.email,
			'username':response.username
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				location.href="/home";
			}else{
				alert(result.message);
				location.href="/home/register";
			}
		});
    });
  }
</script>