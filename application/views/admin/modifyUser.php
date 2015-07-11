<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/admin-common.js" type="text/javascript"></script>
	<script src="/assets/js/admin.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="" style="padding-left:30px;">
	<input id="userId" type="hidden" value="<?php echo $user->user_id;?>">
	<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
		<div class="km-panel-heading">Step 01</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p">Email</td>
					<td class="value bl1"><input id="email" type="text" value="<?php echo $user->user_email;?>" class="inp-txt" style="width:90%"></td>
					<td class="field width20p bl1">Username</td>
					<td class="value bl1"><input id="username" type="text" value="<?php echo $user->user_username;?>" class="inp-txt" style="width:90%"></td>
				  </tr>
				  <tr>
					<td class="field width20p">Gender</td>
					<td class="value bl1">
						<input id="genderMale" type="radio" name="gender" value="0" <?php echo $user->user_gender==0?'checked':'';?> style="vertical-align: middle;">
						<label for="genderMale">Male</label>
						<input id="genderFemale" type="radio" name="gender" value="1" <?php echo $user->user_gender==1?'checked':'';?> style="vertical-align: middle;">
						<label for="genderFemale">Female</label>
					</td>
					<td class="field width20p bl1">Country</td>
					<td class="value bl1">
						<select class="select" id="country">
							<option value="">Choose Country</option>
							<option value="SG" <?php echo $user->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="AU" <?php echo $user->user_country=='AU'?'selected':'';?>>Australia</option>
							<option value="BR" <?php echo $user->user_country=='BR'?'selected':'';?>>Brazil</option>
							<option value="BN" <?php echo $user->user_country=='BN'?'selected':'';?>>Brunei Darussalam</option>
							<option value="CA" <?php echo $user->user_country=='CA'?'selected':'';?>>Canada</option>
							<option value="CN" <?php echo $user->user_country=='CN'?'selected':'';?>>China</option>
							<option value="DK" <?php echo $user->user_country=='DK'?'selected':'';?>>Denmark</option>
							<option value="EG" <?php echo $user->user_country=='EG'?'selected':'';?>>Egypt</option>
							<option value="FI" <?php echo $user->user_country=='FI'?'selected':'';?>>Finland</option>
							<option value="FR" <?php echo $user->user_country=='FR'?'selected':'';?>>France</option>
							<option value="DE" <?php echo $user->user_country=='DE'?'selected':'';?>>Germany</option>
							<option value="GR" <?php echo $user->user_country=='GR'?'selected':'';?>>Greece</option>
							<option value="HK" <?php echo $user->user_country=='HK'?'selected':'';?>>Hong Kong</option>
							<option value="HU" <?php echo $user->user_country=='HU'?'selected':'';?>>Hungary</option>
							<option value="IN" <?php echo $user->user_country=='IN'?'selected':'';?>>India</option>
							<option value="ID" <?php echo $user->user_country=='ID'?'selected':'';?>>Indonesia</option>
							<option value="IL" <?php echo $user->user_country=='IL'?'selected':'';?>>Israel</option>
							<option value="IT" <?php echo $user->user_country=='IT'?'selected':'';?>>Italy</option>
							<option value="JP" <?php echo $user->user_country=='JP'?'selected':'';?>>Japan</option>
							<option value="KW" <?php echo $user->user_country=='KW'?'selected':'';?>>Kuwait</option>
							<option value="MO" <?php echo $user->user_country=='MO'?'selected':'';?>>Macau</option>
							<option value="MY" <?php echo $user->user_country=='MY'?'selected':'';?>>Malaysia</option>
							<option value="MX" <?php echo $user->user_country=='MX'?'selected':'';?>>Mexico</option>
							<option value="MM" <?php echo $user->user_country=='MM'?'selected':'';?>>Myanma</option>
							<option value="NL" <?php echo $user->user_country=='NL'?'selected':'';?>>Netherlands</option>
							<option value="NZ" <?php echo $user->user_country=='NZ'?'selected':'';?>>New Zealand</option>
							<option value="NO" <?php echo $user->user_country=='NO'?'selected':'';?>>Norway</option>
							<option value="PH" <?php echo $user->user_country=='PH'?'selected':'';?>>Philippines</option>
							<option value="PL" <?php echo $user->user_country=='PL'?'selected':'';?>>Poland</option>
							<option value="PT" <?php echo $user->user_country=='PT'?'selected':'';?>>Portugal</option>
							<option value="RU" <?php echo $user->user_country=='RU'?'selected':'';?>>Russia</option>
							<option value="SG" <?php echo $user->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="KR" <?php echo $user->user_country=='KR'?'selected':'';?>>South Korea</option>
							<option value="ES" <?php echo $user->user_country=='ES'?'selected':'';?>>Spain</option>
							<option value="SE" <?php echo $user->user_country=='SE'?'selected':'';?>>Sweden</option>
							<option value="CH" <?php echo $user->user_country=='CH'?'selected':'';?>>Switzerland</option>
							<option value="TW" <?php echo $user->user_country=='TW'?'selected':'';?>>Taiwan</option>
							<option value="TH" <?php echo $user->user_country=='TH'?'selected':'';?>>Thailand</option>
							<option value="TR" <?php echo $user->user_country=='TR'?'selected':'';?>>Turkey</option>
							<option value="GB" <?php echo $user->user_country=='GB'?'selected':'';?>>United Kingdom</option>
							<option value="US" <?php echo $user->user_country=='US'?'selected':'';?>>United States</option>
							<option value="VN" <?php echo $user->user_country=='VN'?'selected':'';?>>Vietnam</option>
						</select>
					</td>
				  </tr>
				  <tr style="border-top: 1px dashed #337ab7 !important;">
					<td class="field width20p">Date of Birth</td>
					<td class="value bl1">
						<input id="birthday" type="date" value="<?php echo $user->user_birthday;?>" class="inp-txt">
					</td>
					<td class="field width20p bl1">Address</td>
					<td class="value bl1">
						<button onclick="" type="button" class="km-btn km-btn-primary" style=" height: 23px;font-size: 10px;padding: 0px 10px;">Address Book</button>
					</td>
				  </tr>
				  <tr style="border-top: 1px dashed #337ab7 !important;">
					<td class="field width20p">Contacts</td>
					<td class="value bl1" colspan="3">
						<div class="gsm_phone" style="width: 290px;margin: 5px auto;">
							<input type="text" id="phone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="phone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="phone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone3;?>" title="Number" placeholder="Number">
						</div>
						<div class="gsm_home" style="width: 290px;margin: 5px auto;">
							<input type="text" id="homephone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="homephone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="homephone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone3;?>" title="Number" placeholder="Number">
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p">Status</td>
					<td class="value bl1">
						<select id="status" style="height: 30px;">
							<option value="0" <?php echo $user->user_state==0?'selected':'';?>>Normal</option>
							<option value="1" <?php echo $user->user_state==1?'selected':'';?>>Frozen</option>
						</select>
					</td>
					<td class="field width20p bl1">Register Time</td>
					<td class="value bl1">
						<?php echo $user->user_reg_time;?>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<!--
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">User Infomation</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p br">Avatar</td>
					<td class="value width17p tac br">
						<div class="km-upload-img" style="width: 100px;  margin: 0 auto;" onclick="$('#file').click();">
							<img src="<?php echo $user->user_avatar;?>" width="100" height="100" id="avatar">
							<p style="line-height: 100px;font-size:13px;">Upload Image</p>
						</div>
						<form id="upload_image_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadAvatarImage('#uploadImgThumb')" name="image" type="file" id="file" style="display:none;" accept="image/*">
						</form>
					</td>
					<td class="field width15p br">Username</td>
					<td class="value width17p"><input id="username" type="text" class="inp-txt width100p" value="<?php echo $user->user_username;?>"></td>
					</tr>
				  <tr>
					<td class="field width15p br">Email</td>
					<td class="value width17p br"><input id="email" type="text" class="inp-txt" value="<?php echo $user->user_email;?>"></td>
					<td class="field width15p br">Phone</td>
					<td class="value width17p"><input id="phone" type="text" class="inp-txt" value="<?php echo $user->user_phone;?>"></td>
				  </tr>
				  <tr>
					<td class="field width15p br">Gender</td>
					<td class="value width17p br">
						<input type="radio" name="gender" value="0" id="male" <?php echo $user->user_gender==0?'checked':'';?>><label for="male">Male</label>
						<input type="radio" name="gender" value="1" id="female" <?php echo $user->user_gender==1?'checked':'';;?>><label for="female">Female</label>
					</td>
					<td class="field width15p br">Status</td>
					<td class="value width17p">
						<select id="status" style="height: 30px;">
							<option value="0" <?php echo $user->user_state==0?'selected':'';?>>Normal</option>
							<option value="1" <?php echo $user->user_state==1?'selected':'';?>>Frozen</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width15p br">Register Time</td>
					<td class="value width17p br">
						<?php echo $user->user_reg_time;?>
					</td>
					<td class="field width15p br">Birthday</td>
					<td class="value width17p"><input id="birthday" type="date" class="inp-txt" value="<?php echo $user->user_birthday;?>"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	-->
	<button onclick="userHandler('This user was saved successfully');" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
</div>
<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
<div id="bkDiv"></div>
<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
  <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
  <strong></strong>
  <span class="km-alert-msg"></span>
</div>
</body>
</html>