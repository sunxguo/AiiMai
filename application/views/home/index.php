<div class="main-floor clearfix">
	<?php foreach($categories as $cat):?>
	<div class="cat-detail">
		<dl class="sub-categories fl">
			<?php foreach($cat->subCats as $subCats):?>
				<?php if($subCats->category_featured==1):?>
				<dt><a href="/home/category?cat=<?php echo $cat->category_id;?>"><?php echo $subCats->category_name;?></a></dt>
				<?php endif;?>
				<?php foreach($subCats->subSubCats as $subSubCats):?>
				<?php if($subSubCats->category_featured==1):?>
				<dd><a href="/home/category?cat=<?php echo $cat->category_id;?>"><?php echo $subSubCats->category_name;?></a></dd>
				<?php endif;?>
				<?php endforeach;?>
			<?php endforeach;?>
		</dl>
		<div class="featured-products fl">
			<div class="fp-left fl">
				<div class="banner fp-left-top widget borderR borderB" style="width: 367px;height: 327px;min-height:327px;">
					<ul style="position:relative;">
						<?php if(isset($cat->category_home_img11) && $cat->category_home_img11!=''):?>
						<li>
							<a href="<?php echo $cat->category_home_link11;?>" title="<?php echo $cat->category_home_title11;?>">
								<img src="<?php echo $cat->category_home_img11;?>">
							</a>
						</li>
						<?php endif;?>
						<?php if(isset($cat->category_home_img12) && $cat->category_home_img12!=''):?>
						<li>
							<a href="<?php echo $cat->category_home_link12;?>" title="<?php echo $cat->category_home_title12;?>">
								<img src="<?php echo $cat->category_home_img12;?>">
							</a>
						</li>
						<?php endif;?>
						<?php if(isset($cat->category_home_img13) && $cat->category_home_img13!=''):?>
						<li>
							<a href="<?php echo $cat->category_home_link13;?>" title="<?php echo $cat->category_home_title13;?>">
								<img src="<?php echo $cat->category_home_img13;?>">
							</a>
						</li>
						<?php endif;?>
						<?php if(isset($cat->category_home_img14) && $cat->category_home_img14!=''):?>
						<li>
							<a href="<?php echo $cat->category_home_link14;?>" title="<?php echo $cat->category_home_title14;?>">
								<img src="<?php echo $cat->category_home_img14;?>">
							</a>
						</li>
						<?php endif;?>
						<?php if(isset($cat->category_home_img15) && $cat->category_home_img15!=''):?>
						<li>
							<a href="<?php echo $cat->category_home_link15;?>" title="<?php echo $cat->category_home_title15;?>">
								<img src="<?php echo $cat->category_home_img15;?>">
							</a>
						</li>
						<?php endif;?>
					</ul>
				</div>
				<div class="fp-left-bottom" style="margin-top: -4px;">
					<div class="fp-left-bottom-item widget borderR borderB fl" style="">
						<a href="<?php echo $cat->category_home_link4;?>">
							<img src="<?php echo $cat->category_home_img4;?>" style="width:185px;">
						</a>
					</div>
					<div class="fp-left-bottom-item widget borderB fl" style="margin-left: -1px;">
						<a href="<?php echo $cat->category_home_link5;?>">
							<img src="<?php echo $cat->category_home_img5;?>">
						</a>
					</div>
				</div>
			</div>
			<div class="fp-right fl" style="margin-left:-1px;">
				<div class="fp-right-item widget borderR" style="height:165px;">
					<a href="<?php echo $cat->category_home_link2;?>">
						<img src="<?php echo $cat->category_home_img2;?>">
					</a>
				</div>
				<div class="fp-right-item widget borderR borderT" style="height:165px;margin-top: -3px;">
					<a href="<?php echo $cat->category_home_link3;?>">
						<img src="<?php echo $cat->category_home_img3;?>" style="height:164px;">
					</a>
				</div>
				<div class="fp-right-item widget borderR borderB borderT" style="margin-top: -2px;">
					<a href="<?php echo $cat->category_home_link6;?>">
						<img src="<?php echo $cat->category_home_img6;?>">
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	
	<div class="groupbuy fr">
		<div class="group-title">
			<img src="/assets/images/home/groupbuy.png">
			<span>Group buy</span>
			<a href="" class="fr" target="_blank">more</a>
		</div>
		<ul>
			<!--
			<li class="clearfix">
				<div class="thumbnail fl">
					<img src="/assets/images/home/461225039.jpg">
				</div>
				<div class="p-info fr">
					<a href="" target="_blank">Spigen Thin Fit iPhone 6 Case iPhone 6 Plus Case ssssssssssssfffffffffffffffffffffffffffffffffffddddddddddddd</a>
					<span class="unit">S$</span><span class="price">9.80</span>
					<div class="group-buy-num"><div class="current-num fl" style="width:<?php $percent=(10/10)*100;echo $percent>100?100:$percent;?>%;"><?php if($percent>=100):?><span class="show-full">Purchase : 10</span><?php endif;?></div></div>
				</div>
			</li>
			<li class="clearfix">
				<div class="thumbnail fl">
					<img src="/assets/images/home/460233998.jpg">
				</div>
				<div class="p-info fr">
					<a href="" target="_blank">Spigen Thin Fit iPhone 6 Case iPhone 6 Plus Case ssssssssssssfffffffffffffffffffffffffffffffffffddddddddddddd</a>
					<span class="unit">S$</span><span class="price">9.80</span>
					<div class="group-buy-num"><div class="current-num fl" style="width:<?php $percent=(4/10)*100;echo $percent>100?100:$percent;?>%;"></div><span class="num fr">4/10</span></div>
				</div>
			</li>
			<li class="clearfix">
				<div class="thumbnail fl">
					<img src="/assets/images/home/456642643.jpg">
				</div>
				<div class="p-info fr">
					<a href="" target="_blank">Spigen Thin Fit iPhone 6 Case iPhone 6 Plus Case ssssssssssssfffffffffffffffffffffffffffffffffffddddddddddddd</a>
					<span class="unit">S$</span><span class="price">9.80</span>
					<div class="group-buy-num"><div class="current-num fl" style="width:<?php $percent=(10/10)*100;echo $percent>100?100:$percent;?>%;"><?php if($percent>=100):?><span class="show-full">Purchase : 10</span><?php endif;?></div></div>
				</div>
			</li>
			<li class="clearfix">
				<div class="thumbnail fl">
					<img src="/assets/images/home/460233998.jpg">
				</div>
				<div class="p-info fr">
					<a href="" target="_blank">Spigen Thin Fit iPhone 6 Case iPhone 6 Plus Case ssssssssssssfffffffffffffffffffffffffffffffffffddddddddddddd</a>
					<span class="unit">S$</span><span class="price">9.80</span>
					<div class="group-buy-num"><div class="current-num fl" style="width:<?php $percent=(4/10)*100;echo $percent>100?100:$percent;?>%;"></div><span class="num fr">4/10</span></div>
				</div>
			</li>
			-->
		</ul>
	</div>
</div>
<div class="main-floor">
	<div class="floor-header">
		<div class="floor-header-title fl"><a href="" class="themeA">Top Sales Products</a></div>
		<ul class="floor-header-categories fr" id="topSaleCats">
			<li class="active"><a href="">All</a></li>
			<?php foreach ($categories as $key => $value):?>
			<li><a href=""><?php echo $value->category_name;?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="btn-prev"><img src="/assets/images/home/prev.png"></div>
	<ul class="floor-body line-slider p-style1 clearfix" id="topSale">
	</ul>
	<div class="btn-next"><img src="/assets/images/home/next.png"></div>
	<ul  id="topsale0" class="dont_display">
		<?php foreach($topSalesProducts as $product):?>
		<li>
			<a href="/home/item?itemId=<?php echo $product->product_id;?>">
				<img class="p-thumbnail" src="<?php echo $product->product_image;?>">
				<p class="p-title"><?php echo $product->product_item_title_english;?></p>
				<span class="p-price">S$ <?php echo $product->product_sell_price;?></span>
			</a>
		</li>
		<?php endforeach;?>
	</ul>
	<ul id="topsale1" class="dont_display">
		<?php foreach($topSalesProducts as $product):?>
		<li>
			<a href="/home/item?itemId=<?php echo $product->product_id;?>">
				<img class="p-thumbnail" src="<?php echo $product->product_image;?>">
				<p class="p-title"><?php echo $product->product_item_title_english;?></p>
				<span class="p-price">S$ <?php echo $product->product_sell_price;?></span>
			</a>
		</li>
		<?php endforeach;?>
	</ul>
</div>
<div class="main-floor">
	<div class="floor-header">
		<div class="floor-header-title fl"><a href="" class="themeA">Best Discounts</a></div>
		<ul class="floor-header-categories fr" id="bestDiscountsCats">
			<li class="active"><a href="">All</a></li>
			<?php foreach ($categories as $key => $value):?>
			<li><a href=""><?php echo $value->category_name;?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<ul class="floor-body p-style2 clearfix" id="bestDiscounts">
	</ul>
	<ul  id="bestDiscounts0" class="dont_display">
		<?php foreach($topSalesProducts as $key=>$product):?>
		<li>
			<div class="p-header">
				<div class="p-num fl"><?php echo ($key+1);?></div>
				<div class="p-shipping fr"><span class="shipping-icon"></span>S$ <?php echo $product->product_shipping_fee;?></div>
			</div>
			<a href="/home/item?itemId=<?php echo $product->product_id;?>">
				<img class="p-thumbnail" src="<?php echo $product->product_image;?>">
				<p class="p-title"><?php echo $product->product_item_title_english;?></p>
				<span class="p-price">S$ <?php echo $product->product_sell_price;?></span>
			</a>
		</li>
		<?php endforeach;?>
	</ul>
	<ul  id="bestDiscounts1" class="dont_display">
		<?php for($i=10;$i>0;$i--):?>
		<li>
			<div class="p-header">
				<div class="p-num fl"><?php echo $i;?></div>
				<div class="p-shipping fr"><span class="shipping-icon"></span>S$3.90</div>
			</div>
			<a href="/home/item?itemId=1">
				<img class="p-thumbnail" src="/assets/images/home/fp<?php echo $i;?>.jpg">
				<p class="p-title">[Free Shipping] Made in Japan MTG ReFa CARAT PEC-L1706</p>
				<span class="p-price">US$19.00</span>
			</a>
		</li>
		<?php endfor;?>
	</ul>
</div>
<div class="main-floor">
	<div class="floor-header">
		<div class="floor-header-title fl"><a href="" class="themeA">Recommended Shops</a></div>
		<ul class="floor-header-categories fr" id="recommendedShopsCats">
			<li class="active"><a href="">All</a></li>
			<?php foreach ($categories as $key => $value):?>
			<li><a href=""><?php echo $value->category_name;?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="btn-prev recommendedShopsBtn"><img src="/assets/images/home/prev.png"></div>
	<ul class="floor-body p-style3 line-slider clearfix" id="recommendedShops">
	</ul>
	<div class="btn-next recommendedShopsBtn"><img src="/assets/images/home/next.png"></div>
	<ul id="recommendedShops0" class="dont_display">
		<?php for($i=10;$i>0;$i--):?>
		<li>
			<a href="/home/item?itemId=1">
				<img class="p-thumbnail" src="/assets/images/home/fp<?php echo $i;?>.jpg">
			</a>
		</li>
		<?php endfor;?>
	</ul>
	<ul id="recommendedShops1" class="dont_display">
		<?php for($i=1;$i<11;$i++):?>
		<li>
			<a href="/home/item?itemId=1">
				<img class="p-thumbnail" src="/assets/images/home/fp<?php echo $i;?>.jpg">
			</a>
		</li>
		<?php endfor;?>
	</ul>
</div>
<div class="main-floor">
	<div class="floor-header">
		<div class="floor-header-title fl"><a href="" class="themeA">Top Brands</a></div>
	</div>
	<ul class="floor-body p-style4 clearfix">
		<?php for($i=1;$i<17;$i++):?>
		<li>
			<a href="/home/item?itemId=1">
				<img class="p-thumbnail" src="/assets/images/home/b<?php echo $i;?>.jpg">
			</a>
		</li>
		<?php endfor;?>
	</ul>
</div>
<div class="main-floor footer-navs">
	<dl>
		<dt>Buy on AiiMai</dt>
		
		<dd><a href="/home/register">Member Register</a></dd>
		<dd><a href="#">Bestsellers</a></dd>
		<dd><a href="#">Hot Deals</a></dd>
		<dd><a href="#">Last week's best hits</a></dd>
		<dd><a href="#">Qoopon &amp; event</a></dd>
		<dd><a href="#">Weekly Specials</a></dd>
		<dd><a href="#">Lucky Auction</a></dd>
	</dl>
		
	<dl>
		<dt>Sell on AiiMai</dt>
		
		<dd><a href="/cms/register">Seller Register</a></dd>
		<dd><a href="">Secrets to success</a></dd>
		<dd><a href="#">Partnership</a></dd>
		<dd><a href="">Join Curator Program</a></dd>
		<dd><a href="">Selling Inquiry</a></dd>
	</dl>
		
	<dl>
		<dt>Customer Service</dt>
		
		<dd><a href="">My Inquiries</a></dd>
		<dd><a href="">FAQ</a></dd>
		<dd><a href="">Help Topics</a></dd>
		<dd><a href="">User Agreement</a></dd>
		<dd><a href="">Privacy Policy</a></dd>
		<dd><a href="">Contact us</a></dd>
		<dd><a href="">Security &amp; Resolution Center</a></dd>
		
		<dd><a href="">Qsafe Program</a></dd>
	</dl>
		
	<dl>
		<dt>About AiiMai</dt>
		
		<dd><a href="">About us</a></dd>
		<dd><a href="" target="_blank">AiiMai on Facebook</a></dd>
		<dd><a href="" target="_blank">AiiMai on Instagram</a></dd>
		<dd><a href="">Press Release</a></dd>
		<dd><a href="">AiiMai Notice</a></dd>
	</dl>
	
	<dl>
	<!--
		<dt>Tools</dt>
		
		<dd><a href="" target="_blank">QSM (Seller Tool)</a></dd>
		<dd><a href="" target="_blank">Qpost (CS Tool)</a></dd>
		<dd><a href="">Mobile App</a></dd>
		<dd><a href="">Qtalk</a></dd>
		<dd><a href="" target="_blank">iQphone</a></dd>
	-->
		<dt>EZ Shopping</dt>
		
		<dd><a href="">Shopping Cart</a></dd>
		<dd><a href="">Wish List &amp; Viewed Today</a></dd>
	</dl>
		
	<dl>
		<dt>Family Sites</dt>
		
		<dd class="us"><a href="" target="_blank">Global Hub</a></dd>
		<dd class="sg"><a href="">Singapore</a></dd>
		<dd class="jp"><a href="" target="_blank">Japan</a></dd>
		<dd class="id"><a href="" target="_blank">Indonesia</a></dd>
		<dd class="my"><a href="" target="_blank">Malaysia</a></dd>
		<dd class="cn"><a href="" target="_blank">China</a></dd>
		<dd class="hk"><a href="" target="_blank">Hong kong</a></dd>
	</dl>
</div>
<script src="/assets/js/unslider.min.js"></script>
<script>
$(function() {
    $('.banner').unslider({
//		speed: 500,               //  The speed to animate each slide (in milliseconds)
//		delay: 3000,              //  The delay between slide animations (in milliseconds)
//		complete: function() {},  //  A function that gets called after every slide animation
//		keys: true,               //  Enable keyboard (left, right) arrow shortcuts
		dots: true,               //  Display dot navigation
//		fluid: false              //  Support responsive design. May break non-responsive designs
	});
});
</script>