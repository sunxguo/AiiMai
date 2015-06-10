<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/home.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/home-common.js" type="text/javascript"></script>
	<script src="/assets/js/home.js" type="text/javascript"></script>
</head>
<body>
<div class="main-floor no-border login">
	<div class="register-header">
		<h2>Login ASM</h2>
		<span class="reg-tip">
			
		</span>
	</div>
	<div class="login-main-body">
		<div class="login-main-info fl">
		<form method="post" action="/cms/loginHandler" enctype="multipart/form-data">
			<div class="login-field">
				<label>Username</label>
				<div>
					<input name="username" type="text" class="inp-txt width250" value="<?php echo isset($_GET['username'])?$_GET['username']:'';?>">
				</div>
			</div>
			<div class="login-field">
				<label>Password</label>
				<div>
					<input name="pwd" type="password" class="inp-txt width250">
				</div>
			</div>
			<div class="login-field">
				<label>Security</label>
				<div class="veri-code">
					<img id="validCodeImg" src="" onclick="refreshCode()"> 
                    <a href="javascript:refreshCode()">Refresh</a>
                    <input name="validCode" type="text" class="inp-txt width100">
				</div>
			</div>
			<div class="login-btn-div">
				<input type="submit" class="login-btn" id="btnRegister" onclick="" value="Log In">
			</div>
		</form>
		</div>
		<div class="login-other-func fr">
			<h3>What is ASM?</h3>
			<p style="line-height:20px;">
				ASM (AiiMai Sales Manager) is a program for sellers to manage their listed items in convenient ways.
				This program is distrubuted by AiiMai that if you’ve already registered as a seller, you may directly log-in QSM using same AiiMai ID and password.
			</p>
		</div>
	</div>
	<div class="login-footer clearfix">
		
	</div>
<script>
	refreshCode();
</script>
</body>
</html>