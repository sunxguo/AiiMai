<div class="shop search">
	<div class="items">
		<h3>Search Results</h3>
		<h4>Shops</h4>
		<ul class="search-shopList clearfix">
			<?php if(sizeof($shops)<1):?>
				No shops!
			<?php endif;?>
			<?php foreach($shops as $shop):?>
				<li>
					<a href="/home/shop?shopId=<?php echo $shop->user_id;?>" target="_blank">
						<img src="<?php echo $shop->merchant_shop_icon;?>" width="108" height="86">
						<p><?php echo $shop->merchant_shop_name;?></p>
					</a>
				</li>
			<?php endforeach;?>
		</ul>
		<h4>Products</h4>
		<ul class="itemsList clearfix">
			<?php foreach($products as $item):?>
			<li class="product bd_glr3" style="float:left;">
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