<div class="main-floor no-border">
	<div class="titKeyType">
		<img src="/assets/images/home/sellerregistertop.png">
		<p>You want to be a seller?</p>
	</div>
	<div class="sllr_step">
	<!--
        <ul style="width: 100%;">
            <li class="" style="">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-right: none;border-radius: 6px 0 0 6px;">01. Account Information</span>
			</li>
            <li class="on" style="padding-left: 40px; padding-right: 30px;">
				02. Seller's Information
			</li>
            <li class="last-child" style="padding-left: 0px;padding-right: 0px;  margin-left: -40px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 35px;margin-right: 20px;  border-radius: 0 6px 6px 0;border-left: none;">03. Complete Registration</span>
			</li>
        </ul>-->
		<ul style="width: 100%;" style="border:none;">
            <li class="" style="padding-right: 0px;margin-right: 40px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-right: none;border-radius: 6px 0 0 6px;">01. Account Information</span>
			</li>
            <li class="on" style="padding-left:20px;padding-right: 30px;border-radius: 6px 0 0 6px;">
				02. Seller's Information
			</li>
            <li class="last-child" style="padding-right: 0px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-radius: 6px;">03. Complete Registration</span>
			</li>
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
			<!--
			<tr>
				<td><font color="red">*</font>ID log-in</td>
				<td>
					<input type="text" id="ID" value="<?php echo $user->merchant_login_ID;?>" class="inp-txt width250">
					<button onclick="checkID();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 10px;padding: 5px 10px;">Check ID</button>	
				</td>
			</tr>
			-->
			<tr>
				<td><font color="red">*</font>Contact Information</td>
				<td>
					<?php /*if($user->user_confirm_email==0):?>
					<div id="gsm_mail_wrapper" class="gsm_mail" style="background-position: -260px -625px;">
						<input type="text" id="email" class="inp-txt" style="width:190px;" readonly="" value="<?php echo $_SESSION['userEmail'];?>">
						<button onclick="sendMerchantEmail();" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 10px;padding: 3px 5px;">Send Confirmation Email</button>	
						<p>
							(*) After you confirmed email address successfully, click reload button 
							<button onclick="reloadEmail();" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 10px;padding: 3px 5px;">Reload</button>	
						</p>
					</div>
					<?php endif;*/?>
					<div id="confirmEmail" class="gsm_mail">
						<h3><?php echo $_SESSION['userEmail'];?></h3>
					</div>
					<div class="gsm_phone">
						<div id="hp_no0_code" class="gsm_select" style="display: none;">
							<p><a href="javascript:showCallingCode('hp_no0_code','hp_no0_major_code');"><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<input type="text" id="phone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
						<input type="text" id="phone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone2;?>" title="Area Code" placeholder="Area Code"> - 
						<input type="text" id="phone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone3;?>" title="Number" placeholder="Number">
					</div>
					<div class="gsm_home">
						<div id="" class="gsm_select" style="display: none;">
							<p><a href=""><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<input type="text" id="homephone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
						<input type="text" id="homephone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone2;?>" title="Area Code" placeholder="Area Code"> - 
						<input type="text" id="homephone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone3;?>" title="Number" placeholder="Number">
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
				<td><font color="red">*</font>Sales staff</td>
				<td>
					Sales staff name will be displayed at the shop information section of Item page.<br>
					Name: <input id="salesStaff" type="text" class="inp-txt width150" value="<?php echo $user->merchant_salesStaff;?>"> 
					Email: <input id="salesStaffEmail" type="text" class="inp-txt width150" value="<?php echo $user->merchant_salesStaff_email;?>"><br>
					<div class="gsm_phone">
						<div id="hp_no0_code" class="gsm_select" style="display: none;">
							<p><a href="javascript:showCallingCode('hp_no0_code','hp_no0_major_code');"><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<input type="text" id="salesStaffPhone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
						<input type="text" id="salesStaffPhone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_salesStaff_phone2;?>" title="Area Code" placeholder="Area Code"> - 
						<input type="text" id="salesStaffPhone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_salesStaff_phone3;?>" title="Number" placeholder="Number">
					</div>
					<div class="gsm_home">
						<div id="" class="gsm_select" style="display: none;">
							<p><a href=""><img src="http://static.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
						</div>
						<input type="text" id="salesStaffMobilePhone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
						<input type="text" id="salesStaffMobilePhone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_salesStaff_mobilephone2;?>" title="Area Code" placeholder="Area Code"> - 
						<input type="text" id="salesStaffMobilePhone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_salesStaff_mobilephone3;?>" title="Number" placeholder="Number">
					</div>
				</td>
			</tr>
			<!--
			<tr>
				<td><font color="red">*</font>Seller's information displayed to customer</td>
				<td></td>
			</tr>
			-->
			<tr>
				<td style="padding: 5px;"><font color="red">*</font>Copy of Business License<p style="font-weight:normal;font-size:12px;color:#434343;">(For Company / Organization Accounts)</p> or NRIC / Passport <p style="font-weight:normal;font-size:12px;color:#434343;">(For Person Account)</p></td>
				<td style="padding-right: 0px;">
					<img style="min-width: 300px;  min-height: 60px;max-height:100px;cursor:pointer;float: left;" id="businessLicenseImage" src="<?php echo $user->merchant_business_license;?>" onclick="$('#fileBusinessLicense').click();">
					<img id="loadingBusinessLicense" src="/assets/images/cms/loading.gif" style="display:none;">
					<form id="upload_BusinessLicense_form" method="post" enctype="multipart/form-data">
						<input onchange="return uploadBusinessLicense()" name="image" type="file" id="fileBusinessLicense" style="display:none;">
					</form>
					<span style="margin-left:10px;">(Image Formats: png,jpg,gif,pdf; File Size Limit: 1.5MB)</span>
					<button onclick="$('#fileBusinessLicense').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Upload</button>
					<button onclick="$('#businessLicenseImage').attr('src','');" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Delete</button>
				</td>
			</tr>
			<tr>
				<td style="padding: 5px;width: 27%;"><font color="red">*</font>Copy of Most Recent Bank Statement<p style="font-weight:normal;font-size:12px;color:#434343;">(For Company / Organization Accounts)</p> or Utilities Bill <p style="font-weight:normal;font-size:12px;color:#434343;">(For Person Account)</p></td>
				<td style="padding-right: 0px;">
					<img style="min-width: 300px;  min-height: 60px;max-height:100px;cursor:pointer;float: left;" id="bankAccountImage" src="<?php echo $user->merchant_bank_account;?>" onclick="$('#fileBankAccount').click();">
					<img id="loadingBankAccount" src="/assets/images/cms/loading.gif" style="display:none;">
					<form id="upload_BankAccount_form" method="post" enctype="multipart/form-data">
						<input onchange="return uploadBankAccount()" name="image" type="file" id="fileBankAccount" style="display:none;">
					</form>
					<span style="margin-left:10px;">(Image Formats: png,jpg,gif,pdf; File Size Limit: 1.5MB)</span>
					<button onclick="$('#fileBankAccount').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Upload</button>
					<button onclick="$('#bankAccountImage').attr('src','');" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Delete</button>
				</td>
			</tr>
			<!--
			<tr>
				<td><font color="red">*</font>Sales Staff Information</td>
				<td>
					<label for="salesStaff">Sales staff</label><input type="text" id="salesStaff" value="<?php echo $user->merchant_login_ID;?>" class="inp-txt width250">
				</td>
			</tr>
			-->
			<!--
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
			-->
		</table>
		<div class="memberAgree clearfix">
			<input type="checkbox" id="agreement" name="agreement" value="Y" checked="checked"> 
			<p class="fl">
				<label for="agreement">I accept the Seller Agreement </label><a href="" target="_blank">Seller Agreement</a><br>
			</p>
		</div>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="nextStep()" value="Save & Next">
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