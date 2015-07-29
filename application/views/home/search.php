<div class="shop search">
	<ol class="breadcrumb" style="margin-top:10px;">
		<li class="active" style="font-weight:600;color:#555;margin-right:10px;">Keyword Search</li>
		<span class="km-label km-label-default" style="font-weight:normal;"><?php echo $_GET['keywords'];?></span>
	</ol>
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
		<h4>
			Products
			<div class="km-btn-group fr" data-toggle="buttons" style="margin-top: 3px;">
				<label class="km-btn km-btn-primary <?php echo !isset($_GET['viewStyle']) || isset($_GET['viewStyle']) && $_GET['viewStyle']=='Grid'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:location.href='/home/search?keywords=<?php echo $_GET['keywords'];?>&viewStyle=Grid'" type="radio" name="options" id="option1" autocomplete="off" <?php echo !isset($_GET['viewStyle']) || isset($_GET['viewStyle']) && $_GET['viewStyle']=='Grid'?'checked':'';?>> Grid
				</label>
				<label class="km-btn km-btn-primary <?php echo isset($_GET['viewStyle']) && $_GET['viewStyle']=='List'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:location.href='/home/search?keywords=<?php echo $_GET['keywords'];?>&viewStyle=List'" type="radio" name="options" id="option2" autocomplete="off" <?php echo isset($_GET['viewStyle']) && $_GET['viewStyle']=='List'?'checked':'';?>> List
				</label>
			</div>
		</h4>
		<?php if(!isset($_GET['viewStyle']) || isset($_GET['viewStyle']) && $_GET['viewStyle']=='Grid'):?>"
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
		<?php endif;?>
		<?php if(isset($_GET['viewStyle']) && $_GET['viewStyle']=='List'):?>
		<ul class="itemsListStyleList clearfix">
			<li class="productListHeader" style="line-height: 25px;">
				<div style="width:560px;text-align:center;display:inline-block;">
					Item
				</div>
				<div style="width:100px;text-align:center;display:inline-block;">
					Price
				</div>
				<div style="width:100px;text-align:center;display:inline-block;">
					Shipping/Origin
				</div>
				<div style="width:100px;text-align:center;display:inline-block;">
					Seller
				</div>
				<div style="width:100px;text-align:center;display:inline-block;">
					Rating
				</div>
			</li>
			<?php foreach($products as $item):?>
			<li class="productList clearfix">
				<div style="width:100px;">
					<a href="/home/item?itemId=<?php echo $item->product_id;?>">
						<img src="<?php echo $item->product_image;?>" width="100" height="100">
					</a>
				</div>
				<div style="width:460px;padding-left:10px;line-height:20px;">
					<div style="height:70px;display:block;float: none;line-height: 50px;">
						<a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank" style="font-size: 16px;">
							<?php echo $item->product_item_title_english;?>
						</a>
					</div>
					<p style="height:30px;">
						<a href="/home/item?itemId=<?php echo $item->product_id;?>#CustomerReview" target="_blank">Review</a>
					</p>
				</div>
				<div style="width:100px;text-align:center;line-height:20px;">
					<p style="color:#CCC;text-decoration:line-through;margin-top: 30px;">S$ <?php echo $item->product_reference_price;?></p>
					<p style="color:#337ab7;">S$ <?php echo $item->product_sell_price;?></p>
				</div>
				<div style="width:100px;text-align:center;line-height:50px;">
					<p>
						<?php echo $item->product_shipping_fee;?>
					</p>
					<p>
						<?php echo $item->product_shipping_address;?>
					</p>
				</div>
				<div style="width:100px;text-align:center;line-height:20px;">
					<a href="/home/shop?shopId=<?php echo $item->product_merchant;?>" target="_blank" style="margin-top:30px;display: block;">
						<?php echo $item->merchant->merchant_shop_name;?>
					</a>
					<a href="/home/shop?shopId=<?php echo $item->product_merchant;?>" target="_blank">
						<img src="<?php echo $item->merchant->merchant_shop_smallicon;?>" width="57" height="15">
					</a>
				</div>
				<div style="width:100px;text-align:center;line-height:100px;">
					<div class="item-rating" style="width: 80px;height: 15px;margin: 40px 20px;">
						
					</div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</div>
</div>