<div class="main-floor no-border">
	<div class="register-header">
		<h2>Register</h2>
		<span class="reg-tip">
		<!--
			- $2 Cart Coupon for New Member <br>
			- 100 Apoint reward for Mobile App Download Member
			-->
		</span>
	</div>
	<div class="register-main-top">
		<h3>Tell us about yourself</h3>
		<p class="reg-sns">
			<?php /*?><a href="<?php echo $loginUrl;?>" class="icon_fb">Facebook Login</a><?php */?>
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();" style="top: -15px;"></fb:login-button>
			<span class="txt">Register with your facebook account</span>
		</p>
		<div class="reg-seller fr">
			<strong>※ Do you want to sell items? </strong>
			<a href="/cms/register">Seller Register</a>
		</div>
	</div>
	<div class="register-main-body">
		<table>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" id="email" placeholder="example:xxx@gmail.com" class="inp-txt width250">
					<button onclick="checkUserEmail(true);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 10px;padding: 5px 10px;">Validation Check</button>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" id="username" placeholder="" class="inp-txt width250">
					<button onclick="checkuserName(true);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 10px;padding: 5px 10px;">Validation Check</button>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" id="password" placeholder="" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Re-enter Password</td>
				<td><input type="password" id="repassword" placeholder="" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender" value="male" id="male" checked><label for="male">Male</label>
					<input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
				</td>
			</tr>
			<tr>
				<td>Security check</td>
				<td class="veri-code">
					<img id="validCodeImg" src="" onclick="refreshCode()"> 
                    <a href="javascript:refreshCode()">Refresh</a>
                    <input type="text" id="validCode" placeholder="" class="inp-txt width100">
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>
					<select class="select" id="country">
						<option value="">Choose Country</option>
						<option value="SG">Singapore</option>
						<option value="AU">Australia</option>
						<option value="BR">Brazil</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="CA">Canada</option>
						<option value="CN">China</option>
						<option value="DK">Denmark</option>
						<option value="EG">Egypt</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="DE">Germany</option>
						<option value="GR">Greece</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JP">Japan</option>
						<option value="KW">Kuwait</option>
						<option value="MO">Macau</option>
						<option value="MY">Malaysia</option>
						<option value="MX">Mexico</option>
						<option value="MM">Myanma</option>
						<option value="NL">Netherlands</option>
						<option value="NZ">New Zealand</option>
						<option value="NO">Norway</option>
						<option value="PH">Philippines</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="RU">Russia</option>
						<option value="SG">Singapore</option>
						<option value="KR">South Korea</option>
						<option value="ES">Spain</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="TW">Taiwan</option>
						<option value="TH">Thailand</option>
						<option value="TR">Turkey</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="VN">Vietnam</option>
					</select>
				</td>
			</tr>
		</table>
		<div class="memberAgree clearfix">
			<input type="checkbox" id="agreement" name="agreement" value="Y" checked="checked"> 
			<p class="fl">
				<label for="agreement">I agree to the following </label><a href="" target="_blank">User Agreement</a><br>
					For information on how we protect your privacy and use your information, please read our <a href="" target="_blank">Privacy Policy</a> 
			</p>
		</div>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="register()" value="Create Account">
		</div>
	</div>
	<div class="register-main-bottom clearfix">
		<div class="clearSelf">
			<p class="fl">※ Already registered and want to sell? </p>
			<a href="" class="fl" target="_blank">Seller Register</a>
			<br><p class="fl">※ If you are not a member of AiiMai yet, please create an account first, then you can register as a seller.</p>
		</div>
	</div>
</div>
<script>
	refreshCode();
</script>
<script>
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
	FB.api('/me', function(response) {
		$.post(
		"/common/loginWithFB",
		{
			'email':response.email
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				location.href="/home";
			}else{
				alert(result.message);
				$("#email").val(response.email);
			}
		});
    });
  }
</script>
