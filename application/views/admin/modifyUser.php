<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/cms-common.js" type="text/javascript"></script>
	<script src="/assets/js/cms.js" type="text/javascript"></script>
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
					<td class="field width15p">Avatar</td>
					<td class="value width17p"><img src="<?php echo $user->user_avatar;?>" width="60"></td>
					<td class="field width15p">Username</td>
					<td class="value width17p"><input id="username" type="text" class="inp-txt width100p" value="<?php echo $user->user_username;?>"></td>
					</tr>
				  <tr>
					<td class="field width15p">Email</td>
					<td class="value width17p"><input id="email" type="text" class="inp-txt" value="<?php echo $user->user_email;?>"></td>
					<td class="field width15p">Phone</td>
					<td class="value width17p"><input id="phone" type="text" class="inp-txt" value="<?php echo $user->user_phone;?>"></td>
					
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<script src="/assets/js/cms-myInfo.js" type="text/javascript"></script>