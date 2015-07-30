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
			<input type="hidden" id="viewStyle" value="<?php echo isset($_GET['viewStyle'])?$_GET['viewStyle']:'Grid';?>">
			<input type="hidden" id="priceRange" value="<?php echo isset($_GET['priceRange'])?$_GET['priceRange']:'0';?>">
			<div class="km-btn-group fr" data-toggle="buttons" style="margin-top: 3px;margin-left:10px;">
				<label class="km-btn km-btn-primary <?php echo !isset($_GET['viewStyle']) || isset($_GET['viewStyle']) && $_GET['viewStyle']=='Grid'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#viewStyle').val('Grid');orderProducts();" type="radio" name="options" id="option1" autocomplete="off" <?php echo !isset($_GET['viewStyle']) || isset($_GET['viewStyle']) && $_GET['viewStyle']=='Grid'?'checked':'';?>> Grid
				</label>
				<label class="km-btn km-btn-primary <?php echo isset($_GET['viewStyle']) && $_GET['viewStyle']=='List'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#viewStyle').val('List');orderProducts();" type="radio" name="options" id="option2" autocomplete="off" <?php echo isset($_GET['viewStyle']) && $_GET['viewStyle']=='List'?'checked':'';?>> List
				</label>
			</div>
			<div class="fr">
				<span style="font-weight:normal;font-size:12px;">Sort by</span>
				<select id="sortBy" onchange="orderProducts();" style="height:26px;margin-top: 3px;">
					<option value="ARanking" <?php echo !isset($_GET['sortBy']) || $_GET['sortBy']=='ARanking'?'selected':'';?>>
						A·Ranking
					</option>
					<option value="PriceA" <?php echo isset($_GET['sortBy']) && $_GET['sortBy']=='PriceA'?'selected':'';?>>
						Price (Ascending)
					</option>
					<option value="PriceD" <?php echo isset($_GET['sortBy']) && $_GET['sortBy']=='PriceD'?'selected':'';?>>
						Price (Descending)
					</option>
					<option value="Popularity" <?php echo isset($_GET['sortBy']) && $_GET['sortBy']=='Popularity'?'selected':'';?>>
						Popularity
					</option>
					<option value="Sale" <?php echo isset($_GET['sortBy']) && $_GET['sortBy']=='Sale'?'selected':'';?>>
						Sale
					</option>
					<option value="NewlyListed" <?php echo isset($_GET['sortBy']) && $_GET['sortBy']=='NewlyListed'?'selected':'';?>>
						Newly Listed
					</option>
				</select>
			</div>
			<div class="km-btn-group" data-toggle="buttons" style="margin: 3px 0;">
				<label class="km-btn km-btn-default <?php echo !isset($_GET['priceRange']) || $_GET['priceRange']=='0'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('0');orderProducts();" type="radio" name="options" id="option1" autocomplete="off" <?php echo !isset($_GET['priceRange']) || $_GET['priceRange']=='0'?'checked':'';?>> All
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='1'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('1');orderProducts();" type="radio" name="options" id="option2" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='1'?'checked':'';?>> SGD0 – SGD9.00
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='2'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('2');orderProducts();" type="radio" name="options" id="option3" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='2'?'checked':'';?>> SGD10 – SGD24
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='3'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('3');orderProducts();" type="radio" name="options" id="option4" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='3'?'checked':'';?>> SGD25 – SGD49
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='4'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('4');orderProducts();" type="radio" name="options" id="option5" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='4'?'checked':'';?>> SGD50 – SGD99
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='5'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('5');orderProducts();" type="radio" name="options" id="option6" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='5'?'checked':'';?>> SGD100 – SGD249.00
				</label>
				<label class="km-btn km-btn-default <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='6'?'active':'';?>" style="font-size:10px;line-height: 1;">
					<input onclick="javascript:$('#priceRange').val('6');orderProducts();" type="radio" name="options" id="option7" autocomplete="off" <?php echo isset($_GET['priceRange']) && $_GET['priceRange']=='6'?'checked':'';?>> SGD250 & Above
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