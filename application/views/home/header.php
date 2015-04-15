<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/home.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/home.js" type="text/javascript"></script>
</head>
<body>
	<div class="top">
		<div class="top-content homePosi">
			<div class="language fl">
				<select id="language">
					<option value="english" <?php echo $_SESSION['language']=='english'?"selected":"";?>>English</option>
					<option value="zh_cn" <?php echo $_SESSION['language']=='zh_cn'?"selected":"";?>>简体中文</option>
				</select>
			</div>
			<div class="my-func fr">
				<ul>
					<li><a href="/home/login">Log In</a></li>
					<li>|</li>
					<li><a href="/home/register">Register</a></li>
					<li>|</li>
					<li><a href="">MyPanel</a></li>
					<li>|</li>
					<li><a href="">My Cart</a></li>
					<li>|</li>
					<li><a href="">Help</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="header homePosi">
		<div class="header-top">
			<div class="logo fl">
				<a href="/">
					<img src="/assets/images/home/<?php echo $_SESSION['language'];?>/aiimai_logo.png">
				</a>
			</div>
			<div class="search fr">
				<form method="post" action="/home/search" autocomplete="off" enctype="multipart/form-data">
					<input type="text" name="keywords" placeholder="">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>
		<div class="header-bottom categories clearfix clearboth">
			<ul id="categoriesList" class="clearfix">
				<li><a href="/"><img src="/assets/images/home/home.png"></a></li>
				<li class="active"><a href="" class="active">Fashion</a></li>
				<li><a href="">Electronics</a></li>
				<li><a href="">Home & Living</a></li>
				<li><a href="">Health & Beauty</a></li>
				<li><a href="">Sports & Outdoor</a></li>
				<li><a href="">Baby & Kids</a></li>
				<li><a href="">Deals & Services</a></li>
			</ul>
		</div>
	</div>
	<div class="home-main homePosi">