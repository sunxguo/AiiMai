<div class="main-floor no-border">
	<div class="titKeyType">
		<img src="/assets/images/home/sellerregistertop.png">
		<p>You want to be a seller?</p>
	</div>
	<div class="sllr_step">
        <ul style="width: 100%;" style="border:none;">
            <li class="on" style="padding-right: 30px;">01. Account Information</li>
            <li class="" style="padding-left:0px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-right: none;border-radius: 6px 0 0 6px;">02. Seller's Information</span>
			</li>
            <li class="last-child" style="padding-left: 20px;padding-right: 0px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-radius: 6px;">03. Complete Registration</span>
			</li>
        </ul>
    </div>
	<div class="register-main-top">
		<h3>Tell us about yourself</h3>
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
			<input type="checkbox" id="agreement" name="agreement" value="Y"> 
			<p class="fl">
				<label for="agreement">I agree to the following <a href="/home/info?key=userAgreement" target="_blank" style="color: #5F7392;font-size:12px;text-decoration:underline;">User Agreement</a></label><br>
					For information on how we protect your privacy and use your information, please read our <a href="" target="_blank">Privacy Policy</a> 
			</p>
		</div>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="sellerRegister()" value="Create Account & Next Step">
		</div>
	</div>
	<!--
	<div class="register-main-bottom clearfix">
		<div class="clearSelf">
			<p class="fl">※ Already registered and want to sell? </p>
			<a href="" class="fl" target="_blank">Seller Register</a>
			<br><p class="fl">※ If you are not a member of AiiMai yet, please create an account first, then you can register as a seller.</p>
		</div>
	</div>
	-->
</div>
<script>
	refreshCode();
</script>