<div class="main-floor no-border">
	<div class="register-header">
		<h2>Register</h2>
		<span class="reg-tip">
			- $2 Cart Coupon for New Member <br>
			- 100 Apoint reward for Mobile App Download Member
		</span>
	</div>
	<div class="register-main-top">
		<h3>Tell us about yourself</h3>
		<p class="reg-sns">
			<a href="javascript:;" class="icon_fb">Facebook Login</a>
			<span class="txt">Register with your facebook account</span>
		</p>
		<div class="reg-seller fr">
			<strong>※ Do you want to sell items? </strong>
			<a href="">Seller Register</a>
		</div>
	</div>
	<div class="register-main-body">
		<table>
			<tr>
				<td>Email</td>
				<td><input type="text" placeholder="example:xxx@gmail.com" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" placeholder="" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" placeholder="" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Re-enter Password</td>
				<td><input type="password" placeholder="" class="inp-txt width250"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender" value="male" checked>Male
					<input type="radio" name="gender" value="female">Female
				</td>
			</tr>
			<tr>
				<td>Security check</td>
				<td class="veri-code">
					<img id="validCodeImg" src="" onclick="refreshCode()"> 
                    <a href="javascript:refreshCode()">Refresh</a>
                    <input type="text" placeholder="" class="inp-txt width100">
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>
					<select class="select">
						<option value="">Choose Country</option>
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