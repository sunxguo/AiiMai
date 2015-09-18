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
					<?php if(!isset($_SESSION['username'])):?>
					<li><a href="/home/login">Log In</a></li>
					<li>|</li>
					<li><a href="/home/register">Register</a></li>
					<li>|</li>
					<?php else:?>
					<li><a href="/home/mypanel"><?php echo $_SESSION['username'];?></a></li>
					<li>|</li>
					<li><a href="/home/logout">Log Out</a></li>
					<li>|</li>
					<?php endif;?>
					<li><a href="/home/mypanel">MyPanel</a></li>
					<li>|</li>
					<li><a href="/home/cart">My Cart</a></li>
					<li>|</li>
					<li style="position:relative;">
						<a href="javascript:void();" onclick="$(this).next().toggle(10)">Wishlist</a>
						<div class="km-popover km-bottom" style="top: 35px;left: -100px;width: 250px; max-width:656px;">
							<div class="km-arrow"></div>
							<h3 class="km-popover-title">Wishlist<a href="/home/wishlist" target="_blank" style="display:inline-block;float:right;font-size:12px;">More>></a></h3>
							<div class="km-popover-content clearfix" style="padding-top:0px;padding-bottom:5px;">
								<ul id="miniwishlist" class="mini-wishlist">
									<?php foreach ($wishlists as $key => $value):?>
									<li>
										<div style="width:40px;text-align:center;">
											<a target="_blank" href="/home/item?itemId=<?php echo $value->product->product_id;?>">
												<img src="<?php echo $value->product->product_image;?>" width="40">
											</a>
										</div>
										<div style="width:100px;padding:0 5px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
											<a target="_blank" href="/home/item?itemId=<?php echo $value->product->product_id;?>">
												<?php echo $value->product->product_item_title_english;?>
											</a>
										</div>
										<div style="width:60px;text-align:center;color:red;font-weight:600;">
											S$ <?php echo $value->product->product_sell_price;?>
										</div>
									</li>
									<?php endforeach;?>
									<?php if(sizeof($wishlists)<1):?>
									<li><div>Empty!</div></li>
									<?php endif;?>
								</ul>
							</div>
						</div>
						
					</li>
					<li>|</li>
					<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=="merchant"):?>
					<li><a href="/cms/login">ASM</a></li>
					<li>|</li>
					<?php endif;?>
					<li><a href="/home/info?key=help">Help</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="header homePosi">
		<div class="header-top">
			<div class="logo fl">
				<a href="/">
					<img src="/assets/images/home/<?php echo $_SESSION['language'];?>/aiimai-logo.png">
				</a>
			</div>
			<div class="search fr">
				<form method="get" action="/home/search" autocomplete="off" enctype="multipart/form-data">
					<input id="keywords" type="text" name="keywords" value="<?php echo isset($_GET['keywords'])?$_GET['keywords']:'';?>">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>
		<div class="header-bottom categories clearfix clearboth">
			<ul id="categoriesList" class="clearfix">
				<li><a href="/"><img src="/assets/images/home/home.png"></a></li>
				<?php foreach($categories as $key=>$cat):?>
				<li style="position:relative;" class="categoryItem <?php if((isset($_GET['cat']) && $_GET['cat']==$cat->category_id) || (!isset($_GET['cat']) && $key==0)):?>active<?php endif;?>">
					<a href="/home/category" class="category <?php if((isset($_GET['cat']) && $_GET['cat']==$cat->category_id) || (!isset($_GET['cat']) && $key==0)):?>active<?php endif;?>"><?php echo $cat->category_name;?></a>
					<?php if(!isset($pageName) || $pageName!='index'):?>
					<div class="category-wrap">
						<dl>
							<?php foreach ($cat->subCats as $subCat):?>
							<dd class="sub1"><a href="/home/category"><?php echo $subCat->category_name;?></a></dd>
							<?php foreach ($subCat->subSubCats as $subSubCat):?>
							<dd class="sub2"><a href="/home/category">· <?php echo $subSubCat->category_name;?></a></dd>
							<?php /*foreach ($subSubCat->subSubSubCats as $subSubSubCat):?>
							<dd class="sub3">· <?php echo $subSubSubCat->category_name;?></dd>
							<?php endforeach;*/?>
							<?php endforeach;?>
							<?php endforeach;?>
						</dl>
					</div>
					<?php endif;?>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
	$(".categoryItem").hover(function(){
		$(this).children('.category-wrap').show();
	},function(){
		$(this).children('.category-wrap').hide();
	});
	</script>
	<div class="home-main homePosi">