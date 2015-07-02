<div class="main-floor no-border">
	<div class="titKeyType">
		<img src="/assets/images/home/sellerregistertop.png">
		<p>You want to be a seller?</p>
	</div>
	<div class="sllr_step">
		<ul style="width: 100%;" style="border:none;">
            <li class="" style="padding-right: 0px;margin-right: 20px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-right: none;border-radius: 6px 0 0 6px;">01. Account Information</span>
			</li>
            <li class="" style="margin-right: 40px;border-radius: 6px 0 0 6px;">
				<span style="height: 36px; display: inline-block;border: 1px solid #d9d9d9;padding: 0 10px 0 20px;margin-right: 20px;border-right: none;border-radius: 6px 0 0 6px;">02. Seller's Information</span>
			</li>
            <li class="on last-child" style="padding-right: 10px;padding-left: 10px;border-radius:6px;">
				03. Complete Registration
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
	<div class="register-main-body">
		<table>
			<tr>
				<td><font color="red"></font>Bank Details</td>
				<td>
					<select id="bank" style="height:30px;margin-bottom:10px;">
						<option value="0">-- Select Bank --</option>
					</select>
					<select id="bankBranch" style="height:30px;">
						<option value="0">-- Select Bank Branch --</option>
					</select><br>
					<input type="text" id="accountNumber" style="width: 275px;" value="<?php echo $user->merchant_bank_account_number;?>" class="inp-txt width250" placeholder="Account Number">
				</td>
			</tr>
			<tr>
				<td><font color="red"></font>GST Info</td>
				<td>
					<input type="text" id="GSTName" style="width: 200px;" value="<?php echo $user->merchant_gst_name;?>" class="inp-txt width250" placeholder="Name">
					<input type="text" id="GSTRegistrationNo" style="width: 200px;" value="<?php echo $user->merchant_gst_number;?>" class="inp-txt width250" placeholder="GST Registration No."><br>
					<input type="text" id="GSTAddress" style="width: 415px;margin-top:10px;" value="<?php echo $user->merchant_gst_address;?>" class="inp-txt width250" placeholder="Address">
				</td>
			</tr>
		</table>
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
	checkEmailIsConfirm();
</script>