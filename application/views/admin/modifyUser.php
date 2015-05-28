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
						<input type="radio" name="gender" value="male" id="male" <?php echo $user->user_gender==0?'checked':'';?>><label for="male">Male</label>
						<input type="radio" name="gender" value="female" id="female" <?php echo $user->user_gender==1?'checked':'';;?>><label for="female">Female</label>
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
					<td class="field width15p br">Status</td>
					<td class="value width17p"><input id="birthday" type="date" class="inp-txt" value="<?php echo $user->user_birthday;?>"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<button onclick="userHandler('This user was saved successfully',false);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
</div>
</body>
</html>