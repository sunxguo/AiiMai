<div class="shop">
	<div>
		<img src="<?php echo $merchant->merchant_shop_topimg;?>">
	</div>
	<div class="mshop_bar">
		<div class="info">
			<div class="thumb">
				<a href="/home/shop?shopId=1" target="_blank">
					<img src="<?php echo $merchant->merchant_shop_icon;?>">
				</a>
			</div>
			<div class="name"><a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank"><?php echo $merchant->merchant_shop_name;?></a></div>	
			<div class="num">
				<a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank">
					<em><?php echo $merchantProductsAmount;?></em> items on sale/&nbsp;<em><?php echo $followNo;?></em> Fellow
				</a>
			</div>
			<div class="etc" style="margin-top:10px;">
				<span class="mshop_rate"><dfn style="width:80%;">MINISHOP RATE 80%</dfn></span>
				<input id="input_EncryptSellerCustNo" type="hidden" value="qdbK5Jo397f1rG/8u8LpPA==">
				<input id="input_login_cust_no_enc" type="hidden" value="">
				<a id="a_follow" onclick="follow('<?php echo $merchant->user_id;?>');" class="btn_follow" style="<?php echo $follow?'display:none':'';?>"><span>Follow</span></a>
				<a id="a_following" class="btn_follow ing" style="<?php echo $follow?'':'display:none';?>"><span>Following</span></a>
			</div>
			<div class="vwd_items">
				<div class="menu">
					<ul>
						<li><a href="/home/allItems?shopId=<?php echo $_GET['shopId'];?>" class=""><span>All Items</span></a></li>
<!--						<li><a href="/home/shopSpecial?shopId=<?php echo $_GET['shopId'];?>"><span>Shop Specials</span></a></li>-->
						<li><a href="/home/shopFaq?shopId=<?php echo $_GET['shopId'];?>"><span>Q&amp;A·FAQ</span></a></li>
						<li><a href="/home/shopInfo?shopId=<?php echo $_GET['shopId'];?>"><span>Shop Info</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="">
		<img src="<?php echo $merchant->merchant_shop_middleimg;?>">
		<img src="<?php echo $merchant->merchant_shop_bottomimg;?>">
	</div>
	<div class="items">
		<h3>Hot Items</h3>
		<ul class="clearfix">
			<?php foreach($hotItems as $item):?>
			<li class="product bd_glr3">
				<a href="/home/item?itemId=<?php echo $item->product_id;?>">
					<img src="<?php echo $item->product_image;?>" width="306" height="306">
					<p><?php echo $item->product_item_title_english;?></p>
				</a>
				<div class="info">
					<!--
					<div class="info_lt">
						<div class="dc fs_11"><strong>80</strong>%<br>Off</div>
						<div class="shipping">
							<span class="icon_sp os fs_11">Free</span>
						</div>
					</div>
					-->
					<div class="price">	<del>S$<?php echo $item->product_reference_price;?></del><br><strong>S$<?php echo $item->product_sell_price;?></strong></div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>