<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li class="active"><a href="#no">Shop Front</a></li>
	  <li><a href="/cms/shopDiscount"><?php echo lang('cms_grade_shop_FeaturedEvent');?></a></li>
	  <li><a href="/cms/shopCategory"><?php echo lang('cms_grade_shop_Category');?></a></li>
	  <li><a href="/cms/shopInfo"><?php echo lang('cms_grade_shop_ShopInformation');?></a></li>
	</ul>
	<!--
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_grade_shop_Shopaddressmanagement');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p">*<?php echo lang('cms_grade_shop_SetyourownSellerShopaddress');?></td>
					<td class="value width17p tal">
						http://aiimai.coolkeji.com/home/shop?address= <input value="<?php echo $merchant->merchant_shop_address;?>" type="text" class="km-form-control" id="shopAddress" style="width: 25%;height: 20px;padding: 0 5px;display: inline-block;font-size:10px;">
						<a href="http://aiimai.coolkeji.com/home/shop?address=<?php echo $merchant->merchant_shop_address;?>" target="_blank">   <?php echo lang('cms_grade_shop_Go');?></a>
						<button onclick="saveShopAddress();" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Change');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	-->
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">A.<?php echo lang('cms_baseInfo_shop_shopHomePage_SelectLayout');?></div>
		<div class="km-panel-body" style="padding:10px;">
			<?php echo lang('cms_baseInfo_shop_shopHomePage_Yoursellershopcanuse');?>
			<select style="height: 30px; width:80px;">
				<option>A-<?php echo lang('cms_baseInfo_shop_shopHomePage_Template');?></option>
			</select>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
		<div class="km-panel-heading">B.<?php echo lang('cms_baseInfo_shop_shopHomePage_OverallElementOverview');?></div>
		<div class="km-panel-body" style="padding:10px;">
			<div class="overview fl" style="position:relative;">
				<img src="/assets/images/cms/tmp_overview.jpg" width="402" height="706" alt="templet overview">
				<!--top image-->
				<div class="shop-top-img" onclick="$('#topFile').click();">
					Upload Image(width:995 pixel)
				</div>
				<form id="upload_top_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopTopImage()" name="image" type="file" id="topFile" style="display:none;" accept="image/*">
				</form>
				<!--middle image-->
				<div class="shop-middle-img" onclick="$('#middleFile').click();">
					Upload Image(width:995 pixel)
				</div>
				<form id="upload_middle_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopMiddleImage()" name="image" type="file" id="middleFile" style="display:none;" accept="image/*">
				</form>
				<!--bottom image-->
				<div class="shop-bottom-img" onclick="$('#bottomFile').click();">
					Upload Image(width:995 pixel)
				</div>
				<form id="upload_bottom_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopBottomImage()" name="image" type="file" id="bottomFile" style="display:none;" accept="image/*">
				</form>
				
				<div class="shop-focus-items" onclick="$('#shopFocusItemList').show();$('#shopItemList').hide();$(this).css('opacity','0.5');$('.shop-items-list').css('opacity','0.7');">
					Focus Item
				</div>
				<div class="shop-items-list" onclick="$('#shopFocusItemList').hide();$('#shopItemList').show();$(this).css('opacity','0.5');$('.shop-focus-items').css('opacity','0.7');">
					Item List
				</div>
			</div>
			<div class="overview-edit fl" style="position:relative;margin-left:20px;border:1px solid #ccc;">
				<div class="shop-preview-top-old-img">
					<img id="shopTopImage" src="<?php echo $merchant->merchant_shop_topimg;?>" width="402" height="40">
				</div>
				<div class="shop-preview-middle-old-img">
					<img id="shopMiddleImage" src="<?php echo $merchant->merchant_shop_middleimg;?>" width="402" height="120">
				</div>
				<div class="shop-preview-bottom-old-img">
					<img id="shopBottomImage" src="<?php echo $merchant->merchant_shop_bottomimg;?>" width="402" height="50">
				</div>
				<div id="shopFocusItemList" class="shopFocusItemList" style="display:none;padding:0 10px;">
					<h3 style="line-height:20px;">Focus Item List</h3>
					<div class="fl">
						On / Off <select id="focusOnOff" style="height:30px;margin-left:10px;"><option value="1">On</option><option value="0">Off</option></select>
					</div>
					<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">Set Focus Items</button>
				</div>
				<div id="shopItemList" class="shopItemList" style="display:none;">
					<h3>Use All Item List</h3>
				</div>
			</div>
			<div id="setFocusItemsDiv">
				<h3>Set Focus Item</h3>
				<table>
					<tr>
						<th>Select</th>
						<th>Item Title</th>
						<th>Sell Price</th>
						<th>Reg.Date</th>
					</tr>
					<?php foreach($items as $item):?>
					<tr>
						<td><input type="checkbox" name=""></td>
						<td><?php echo $item->product_item_title_english;?></td>
						<td><?php echo $item->product_sell_price;?></td>
						<td><?php echo $item->product_time;?></td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>