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
    <div class="header-cms">
		<a  class="km-logo" href="">
            <img title="<?php echo $websiteName;?>" class="logo-cms" src="/assets/images/cms/aiimai-logo.png" alt="网站logo" />
            <img src="/assets/images/cms/aiimai-cms-new-logo.png" alt="网站logo" class="logo-asm"/>
		</a>
        <ul class="menu-cms">
        	<?php if($expiringItemsNum>0):?>
        	<li class="expiring-items">
        		<a href="/cms/goodsEdit">Alert:Expiring Items(<?php echo $expiringItemsNum;?>)</a>
        	</li>
        	<?php endif;?>
			<li class="language">
				<a href="javascript:language('zh_cn')" class="<?php echo (!isset($_SESSION['language']) || $_SESSION['language']=="zh_cn")?"active":""?>" title="切换简体中文版">简中</a> <span>|</span>
				<a href="javascript:language('tw_cn')" class="<?php echo ($_SESSION['language']=="tw_cn")?"active":""?>" title="切換繁體中文版">繁中</a> <span>|</span>
				<a href="javascript:language('english')" class="<?php echo ($_SESSION['language']=="english")?"active":""?>" title="Switch to the English version">English</a>
			</li>
            <li class="name">
                <img id="userPhoto" src="/assets/images/cms/defaulthead.png" width="35" height="35">
				<span id="userShowName"><?php echo $_SESSION['merchant_username'];?></span>
			</li>
			<li class="message">
				<a href="/cms/message" title="Messages" id="js-openmsg">
					<img src="/assets/images/cms/ico_mail.png" width="24" height="24">
					<span class="message-num">0</span>
				</a>
				<span id="unreadMesNumber"></span>
			</li>
			<li class="logout">
				<a href="/cms/logout" title="<?php echo lang('cms_common_Logout');?>"><?php echo lang('cms_common_Logout');?></a>
			</li>
        </ul>
		<input id="merchantId" type="hidden" value="<?php echo $_SESSION['merchant_userid'];?>">
    </div>
	<div class="cms-main">
	<?php
		if(isset($showSider) && $showSider){
			require("sider.php");
		}
	?>
	<div id="msgBox" class="msg-box">
		<a href="javascript:closeMsg()" class="close" title="Close">Close</a>
		<div class="msg-in">
			<ul>
				<li>
					<a href="#" id="newMsg">Message-content</a>
					<span class="messagetime" id="msgTime">2015-2-13 19:00</span>
				</li>
			</ul>
		</div>
	</div>