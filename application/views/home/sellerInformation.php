<div class="main-floor no-border">
	<div class="titKeyType">
		<img src="/assets/images/home/sellerregistertop.png">
		<p>You want to be a seller?</p>
	</div>
	<div class="sllr_step">
        <ul>
            <li class="">01. Account Information</li>
            <li class="on">02. Seller’s Information</li>
            <li class="last-child">03. Complete Registration</li>
        </ul>
    </div>
	<div class="">
		<h3>Seller Register</h3>
		<ul class="clearfix" style="margin-top:10px;">
			<li>- If you are already AiiMai member, by entering a few simple information, you can freely list and sell items on AiiMai.</li>
			<li>- AiiMai charges a service fee, included in payment processing, only when transactions completed.</li>
			<li>- AiiMai Sales Manager (ASM) helps you list items, check inventories and communicate with customers. It’s for free!</li>
			<li>- AiiMai provides various payment methods. (credit card, PayPal etc.)</li>
		</ul>
	</div>
	<div class="register-main-top">
		<h3>Member Information</h3>
	</div>
	<div style="border:2px solid rgb(3, 160, 3);border-radius:3px;padding:5px;margin-bottom:10px;">
		Select type of member
		<input name="merchantType" id="person" type="radio" value="1" onclick="$('#personDesc').show();$('#companyDesc').hide();$('#personName').show();$('#companyName').hide();" checked><label for="person">Person</label>
		<input name="merchantType" id="company" type="radio" value="2" onclick="$('#personDesc').hide();$('#companyDesc').show();$('#personName').hide();$('#companyName').show();"><label for="company">Company/Organization</label>
		<?php if($user->merchant_type==2):?>
		<script>
		$(document).ready(function(){
			$("#company").click();
		});
		</script>
		<?php endif;?>
		<p id="personDesc">
			- For individuals who buy and sell online.<br>
			- Merchants who use a company or group name should select ‘Business Owner’
		</p>
		<p id="companyDesc" style="display:none;">
			- For merchants who use a company or group name.
		</p>
	</div>
	<div class="register-main-body">
		<table>
			<tr>
				<td>
					<font color="red">*</font>
					<span id="personName">Name</span>
					<span id="companyName" style="display:none;">Company Name</span>
				</td>
				<td style="padding-right:0px;">
					<input type="text" id="name" value="<?php echo $user->merchant_name;?>" class="inp-txt width150">* Please type your real full name on NRIC or business name as it shown in the license.
					<!--<p style="color:red;">note) You will not be approved as a seller if you do not type your real name/business name on the required document.</p>-->
				</td>
			</tr>
			<tr>
				<td><font color="red">*</font>ID log-in</td>
				<td>
					<input type="text" id="ID" value="<?php echo $user->merchant_login_ID;?>" class="inp-txt width250">
					<button onclick="checkID();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 10px;padding: 5px 10px;">Check ID</button>	
				</td>
			</tr>
			<tr>
				<td><font color="red">*</font>Contact Information</td>
				<td>
					<?php if($user->user_confirm_email==0):?>
					<div id="gsm_mail_wrapper" class="gsm_mail" style="background-position: -260px -625px;">
						<input type="text" id="email" class="inp-txt" style="width:190px;" readonly="" value="<?php echo $_SESSION['userEmail'];?>">
						<button onclick="sendMerchantEmail();" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 10px;padding: 3px 5px;">Send Confirmation Email</button>	
						<p>
							(*) After you confirmed email address successfully, click reload button 
							<button onclick="reloadEmail();" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 10px;padding: 3px 5px;">Reload</button>	
						</p>
					</div>
					<?php endif;?>
					<div id="confirmEmail" class="gsm_mail" <?php if($user->user_confirm_email==0):?>style="display:none;"<?php endif;?>>
						<h3><?php echo $_SESSION['userEmail'];?></h3>
					</div>
					<div class="gsm_phone">
						<div id="hp_no0_code" class="gsm_select" style="display: none;">
							<p><a href="javascript:showCallingCode('hp_no0_code','hp_no0_major_code');"><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<select id="phone1" style="width: 110px;">
							<option value="62">Indonesia</option>
							<option value="60">Malaysia</option>
							<option value="65" selected>Singapore</option>
							<option value="81">Japan</option>
							<option value="82">South Korea</option>
							<option value="852">Hong Kong</option>
							<option value="853">Macau</option>
							<option value="86">China</option>
							<option value="91">India</option>
							<option value="61">Australia</option>
							<option value="673">Brunei Darussalam</option>
							<option value="55">Brazil</option>
							<option value="1">Canada</option>
							<option value="41">Switzerland</option>
							<option value="86">China</option>
							<option value="49">Germany</option>
							<option value="45">Denmark</option>
							<option value="20">Egypt</option>
							<option value="34">Spain</option>
							<option value="358">Finland</option>
							<option value="33">France</option>
							<option value="44">United Kingdom</option>
							<option value="30">Greece</option>
							<option value="852">Hong Kong</option>
							<option value="36">Hungary</option>
							<option value="62">Indonesia</option>
							<option value="972">Israel</option>
							<option value="91">India</option>
							<option value="39">Italy</option>
							<option value="81">Japan</option>
							<option value="82">South Korea</option>
							<option value="965">Kuwait</option>
							<option value="95">Myanma</option>
							<option value="853">Macau</option>
							<option value="52">Mexico</option>
							<option value="60">Malaysia</option>
							<option value="31">Netherland</option>
							<option value="47">Norway</option>
							<option value="64">New Zealand</option>
							<option value="63">Philippines</option>
							<option value="48">Poland</option>
							<option value="351">Portugal</option>
							<option value="7">Russia</option>
							<option value="46">Sweden</option>
							<option value="65">Singapore</option>
							<option value="66">Thailand</option>
							<option value="90">Turkey</option>
							<option value="886">Taiwan</option>
							<option value="1">United States</option>
							<option value="84">Vietnam</option>
						</select>
						<input type="text" id="phone2" class="inp-txt" style="width: 53px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" maxlength="4" value="<?php echo $user->merchant_phone2;?>" title="ex) 1234"> - 
						<input type="text" id="phone3" class="inp-txt" style="width: 53px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" maxlength="4" value="<?php echo $user->merchant_phone3;?>" title="ex) 5678">
					</div>
					<div class="gsm_home">
						<div id="" class="gsm_select" style="display: none;">
							<p><a href=""><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<select id="homephone1" name="" style="width: 110px;">
							<option value="62">Indonesia</option>
							<option value="60">Malaysia</option>
							<option value="65" selected>Singapore</option>
							<option value="81">Japan</option>
							<option value="82">South Korea</option>
							<option value="852">Hong Kong</option>
							<option value="853">Macau</option>
							<option value="86">China</option>
							<option value="91">India</option>
							<option value="61">Australia</option>
							<option value="673">Brunei Darussalam</option>
							<option value="55">Brazil</option>
							<option value="1">Canada</option>
							<option value="41">Switzerland</option>
							<option value="86">China</option>
							<option value="49">Germany</option>
							<option value="45">Denmark</option>
							<option value="20">Egypt</option>
							<option value="34">Spain</option>
							<option value="358">Finland</option>
							<option value="33">France</option>
							<option value="44">United Kingdom</option>
							<option value="30">Greece</option>
							<option value="852">Hong Kong</option>
							<option value="36">Hungary</option>
							<option value="62">Indonesia</option>
							<option value="972">Israel</option>
							<option value="91">India</option>
							<option value="39">Italy</option>
							<option value="81">Japan</option>
							<option value="82">South Korea</option>
							<option value="965">Kuwait</option>
							<option value="95">Myanma</option>
							<option value="853">Macau</option>
							<option value="52">Mexico</option>
							<option value="60">Malaysia</option>
							<option value="31">Netherland</option>
							<option value="47">Norway</option>
							<option value="64">New Zealand</option>
							<option value="63">Philippines</option>
							<option value="48">Poland</option>
							<option value="351">Portugal</option>
							<option value="7">Russia</option>
							<option value="46">Sweden</option>
							<option value="65">Singapore</option>
							<option value="66">Thailand</option>
							<option value="90">Turkey</option>
							<option value="886">Taiwan</option>
							<option value="1">United States</option>
							<option value="84">Vietnam</option>
						</select>
						<input type="text" id="homephone2" class="inp-txt" style="width: 53px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" maxlength="4" value="<?php echo $user->merchant_homephone2;?>" title="ex) 1234"> - 
						<input type="text" id="homephone3" class="inp-txt" style="width: 53px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" maxlength="4" value="<?php echo $user->merchant_homephone3;?>" title="ex) 5678">
					</div>
				</td>
			</tr>
			<tr>
				<td><font color="red">*</font>Address</td>
				<td>
				<!--
					<p style="color:blue;">※ Entered address here will be registered as 5 types of address; [Representative], [Information], [Ship-from], [Item Return] and [Receipt]. 
It will be displayed in public on item page. Please, type in your local language and Roman alphabet. 
You can edit your address and change the display setting on ‘ASM > Setting > My Information > Seller's information displayed to customer.’</p>-->
					<select id="address1" name="" style="height: 25px;">
						<option value="AU">Australia</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="CA">Canada</option>
						<option value="CN">China</option>
						<option value="GB">United Kingdom</option>
						<option value="HK">Hong Kong</option>
						<option value="ID">Indonesia</option>
						<option value="JP">Japan</option>
						<option value="KR">South Korea</option>
						<option value="MY">Malaysia</option>
						<option value="PH">Philippines</option>
						<option value="SG" selected>Singapore</option>
						<option value="TH">Thailand</option>
						<option value="TW">Taiwan</option>
						<option value="US">United States</option>
						<option value="VN">Vietnam</option>
					</select><br>
<!--					<input type="text" id="address2" placeholder="" class="inp-txt width400"><br>-->
					<textarea id="address2" class="width400" style="height:50px;margin-top:10px;"><?php echo $user->merchant_address2;?></textarea>
					<!--<font color="red">*Please check the recipient name and address carefully for exact delivery. Letters and numbers only.</font>-->
					<p style="font-weight:600;">*Please enter your real address as per registered in your business license / NRIC.</p>
				</td>
				
			</tr>
			<tr>
				<td><font color="red">*</font>Sales staff name</td>
				<td>
					<input id="salesStaff" type="text" class="inp-txt width150" value="<?php echo $user->merchant_salesStaff;?>">
					 Sales staff name will be displayed at the shop information section of Item page.
				</td>
			</tr>
			<tr>
				<td><font color="red">*</font>More Datails</td>
				<td>
					<img id="loading" src="/assets/images/cms/loading.gif" style="display:none;">
					<button onclick="$('#file').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Upload</button>
					<form id="upload_image_form" method="post" enctype="multipart/form-data">
						<input onchange="return uploadFile()" name="image" type="file" id="file" style="display:none;">
					</form>
					<input id="fileSrc" type="hidden">
				</td>
			</tr>
		</table>
		<div class="memberAgree clearfix">
			<input type="checkbox" id="agreement" name="agreement" value="Y" checked="checked"> 
			<p class="fl">
				<label for="agreement">I accept the Seller Agreement </label><a href="" target="_blank">Seller Agreement</a><br>
			</p>
		</div>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="sellerInformation()" value="Submit">
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
<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
<script>
	refreshCode();
</script>