<div class="main-floor no-border login">
	<div class="register-header">
		<h2>Login</h2>
		<span class="reg-tip">
			
		</span>
	</div>
	<div class="login-main-body">
		<div class="login-main-info fl">
		<form method="post" action="/home/loginHandler" enctype="multipart/form-data">
			<div class="login-field">
				<label>Username</label>
				<div>
					<input name="username" type="text" class="inp-txt width250">
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
			<div class="login-field" style="padding-left: 40px;">
				<a href="/home/fotgotPassword" target="_blank">Forgot Your Password?</a>
			</div>
		</form>
		</div>
		<div class="login-other-func fr">
			<div class="login-ad">
				<img src="/assets/images/home/login-ad.jpg">
			</div>
			<ul class="">
				<li><a href="">Find email or ID </a>|<a href=""> Find Password</a></li>
				<li><a href="">Guide for Problem</a></li>
				<li>
					<p class="reg-sns">
						<a href="<?php echo $loginUrl;?>" class="icon_fb">Facebook Login</a>
						<span class="txt">Sign in with your facebook account</span>
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div class="login-footer clearfix">
		<h3><img src="/assets/images/cms/icon4.jpg">Specially for AiiMai Members</h3>
		<div class="login-footer-left fl clearfix">
			<div class="login-footer-title">Everyday at AiiMai</div>
			<ul>
				<li><a href="" target="_blank" class="luck-auction">Lucky Auction</a></li>
				<li><a href="" target="_blank" class="today-sale">Today's Sale</a></li>
				<li><a href="" target="_blank" class="bestsellers">BestSellers</a></li>
			</ul>
		</div>
		<div class="login-footer-right fr clearfix">
			<div class="login-footer-title">Shopping Tips & Benefits</div>
			<ul>
				<li><a href="" target="_blank" class="club">Coupon Book<strong>A-Prime Club</strong></a></li>
				<li><a href="" target="_blank" class="chance">Everyday Enjoy your<strong>Achance</strong></a></li>
				<li><a href="" target="_blank" class="stamp">Share your review<strong>1A-Stamp</strong></a></li>
			</ul>
		</div>
	</div>
<script>
	refreshCode();
</script>