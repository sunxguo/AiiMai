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
				<div class="shop-top-img" onclick="shopFrontClick(this,'#shopBanner');">
					Shop Banner
				</div>
				<form id="upload_top_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopTopImage()" name="image" type="file" id="topFile" style="display:none;" accept="image/*">
				</form>
				<!--middle image-->
				<div class="shop-middle-img" onclick="shopFrontClick(this,'#shopMainAdvertisement');">
					Shop Main Advertisement
				</div>
				<form id="upload_middle_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopMiddleImage()" name="image" type="file" id="middleFile" style="display:none;" accept="image/*">
				</form>
				<!--bottom image-->
				<div class="shop-bottom-img" onclick="shopFrontClick(this,'#shopSecondaryAdvertisement');">
					Shop Secondary Advertisement
				</div>
				<form id="upload_bottom_image_form" method="post" enctype="multipart/form-data">
					<input onchange="return uploadShopBottomImage()" name="image" type="file" id="bottomFile" style="display:none;" accept="image/*">
				</form>
				
				<div class="shop-focus-items" onclick="shopFrontClick(this,'#shopFocusItemList');">
					Focus Item
				</div>
				<div class="shop-items-list" onclick="shopFrontClick(this,'#shopItemList');">
					Item List
				</div>
			</div>
			<div class="overview-edit fl" style="position:relative;margin-left:20px;border:1px solid #ccc;">
				<div id="shopBanner" class="shop-preview-top-old-img clearfix" style="padding:0 10px;display:none;">
					<h3 style="line-height:20px;">Shop Banner</h3>
					<div class="" style="margin-top:10px;">
						On / Off 
						<select id="shopBannerOnOff" style="height:30px;margin-left:10px;" onchange="changeShopBannerOn();">
							<option value="1" <?php echo $merchant->merchant_shop_banner_on==1?'selected':'';?>>On</option>
							<option value="0" <?php echo $merchant->merchant_shop_banner_on==0?'selected':'';?>>Off</option>
						</select>
					</div>
					<div style="margin-top:10px;border-bottom:1px dashed #CCC;">
						<span>Resolution: 995 * 150 pixels</span><span style="margin-left:20px;">File Type: jpeg, png, gif</span><br><span>File Size Limit: 1MB</span>
					</div>
					<img id="shopTopImage" src="<?php echo $merchant->merchant_shop_topimg;?>" width="402" height="62" alt="Shop Banner" style="margin:10px 0;">
					<button onclick="deleteShopTopImage()" type="button" class="km-btn km-btn-danger fr" style="height: 20px;font-size: 12px;padding: 0px 5px;">Delete</button>
					<button onclick="$('#topFile').click();" type="button" class="km-btn km-btn-primary fr" style="height: 20px;font-size: 12px;padding: 0px 5px;margin-right:10px;">Upload</button>
				</div>
				<div id="shopMainAdvertisement" class="shop-preview-middle-old-img" style="padding:0 10px;display:none;">
					<h3 style="line-height:20px;">Shop Main Advertisement</h3>
					<div class="" style="margin-top:10px;">
						On / Off 
						<select id="shopMainAdvertisementOnOff" style="height:30px;margin-left:10px;" onchange="changeShopMainAdvertisementOn();">
							<option value="1" <?php echo $merchant->merchant_shop_mainAdvertisement_on==1?'selected':'';?>>On</option>
							<option value="0" <?php echo $merchant->merchant_shop_mainAdvertisement_on==0?'selected':'';?>>Off</option>
						</select>
					</div>				
					<div style="margin-top:10px;border-bottom:1px dashed #CCC;">
						<span>Resolution: 995 * 320 pixels</span><span style="margin-left:20px;">File Type: jpeg, png, gif</span><br><span>File Size Limit: 1MB</span>
					</div>
					<img id="shopMiddleImage" src="<?php echo $merchant->merchant_shop_middleimg;?>" width="402" height="133" alt="Shop Banner" style="margin:10px 0;">
					<button onclick="deleteShopMiddleImage()" type="button" class="km-btn km-btn-danger fr" style="height: 20px;font-size: 12px;padding: 0px 5px;">Delete</button>
					<button onclick="$('#middleFile').click();" type="button" class="km-btn km-btn-primary fr" style="height: 20px;font-size: 12px;padding: 0px 5px;margin-right:10px;">Upload</button>
				
				</div>
				<div id="shopSecondaryAdvertisement" class="shop-preview-bottom-old-img" style="padding:0 10px;display:none;">
					<h3 style="line-height:20px;">Shop Secondary Advertisement</h3>
					<div class="" style="margin-top:10px;">
						On / Off 
						<select id="shopSecondaryAdvertisementOnOff" style="height:30px;margin-left:10px;" onchange="changeShopSecondaryAdvertisement();">
							<option value="1" <?php echo $merchant->merchant_shop_secondaryAdvertisement_on==1?'selected':'';?>>On</option>
							<option value="0" <?php echo $merchant->merchant_shop_secondaryAdvertisement_on==0?'selected':'';?>>Off</option>
						</select>
					</div>		
					<div style="margin-top:10px;border-bottom:1px dashed #CCC;">
						<span>Resolution: 995 * 160 pixels</span><span style="margin-left:20px;">File Type: jpeg, png, gif</span><br><span>File Size Limit: 1MB</span>
					</div>
					<img id="shopBottomImage" src="<?php echo $merchant->merchant_shop_bottomimg;?>" width="402" height="67" alt="Shop Secondary Advertisement" style="margin:10px 0;">
					<button onclick="deleteShopBottomImage()" type="button" class="km-btn km-btn-danger fr" style="height: 20px;font-size: 12px;padding: 0px 5px;">Delete</button>
					<button onclick="$('#bottomFile').click();" type="button" class="km-btn km-btn-primary fr" style="height: 20px;font-size: 12px;padding: 0px 5px;margin-right:10px;">Upload</button>
				
				</div>
				<div id="shopFocusItemList" class="shopFocusItemList" style="display:none;padding:0 10px;">
					<h3 style="line-height:20px;">Focus Item List</h3>
					<div class="" style="margin-top:10px;">
						On / Off 
						<select id="focusOnOff" style="height:30px;margin-left:10px;" onchange="changeFocusOn();">
							<option value="1" <?php echo $merchant->merchant_shop_focus_on==1?'selected':'';?>>On</option>
							<option value="0" <?php echo $merchant->merchant_shop_focus_on==0?'selected':'';?>>Off</option>
						</select>
					</div>
					<p style="clear:both;margin:5px 0;"> You can select up to 4 items to be displayed in your Focus Item area.</p>
					<button onclick="setDivCenter('#setFocusItemsDiv',true);" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">Set Focus Items</button>
				</div>
				<div id="shopItemList" class="shopItemList" style="padding: 0px 10px;display:none;">
					<h3 style="line-height:20px;">Use All Item List</h3>
					<div style="margin-top:10px;">
						On / Off 
						<select id="itemListOnOff" style="height:30px;margin-left:10px;" onchange="changeItemListOn();">
							<option value="1" <?php echo $merchant->merchant_shop_itemlist_on==1?'selected':'';?>>On</option>
							<option value="0" <?php echo $merchant->merchant_shop_itemlist_on==0?'selected':'';?>>Off</option>
						</select>
					</div>
					<div style="margin-top:10px;">
						Show Category Group Bar
						<input type="radio" value="1" name="showCategoryGroupBar" id="showCategoryGroupBarUse" style="vertical-align: middle;margin-left:10px;" onclick="showCategoryGroupBar();" <?php echo $merchant->merchant_showCategoryGroupBar==1?'checked':'';?>>
						<label for="showCategoryGroupBarUse">Use</label>
						<input type="radio" value="0" name="showCategoryGroupBar" id="showCategoryGroupBarNotUse" style="vertical-align: middle;" onclick="showCategoryGroupBar();" <?php echo $merchant->merchant_showCategoryGroupBar==0?'checked':'';?>>
						<label for="showCategoryGroupBarNotUse">Not Use</label>
						
					</div>
					<div style="margin-top:10px;">
						Show sub categories
						<input type="radio" value="1" name="showSubCategories" id="showSubCategoriesUse" style="vertical-align: middle;margin-left:10px;" onclick="showSubCategories();" <?php echo $merchant->merchant_showSubCategories==1?'checked':'';?>>
						<label for="showSubCategoriesUse">Use</label>
						<input type="radio" value="0" name="showSubCategories" id="showSubCategoriesNotUse" style="vertical-align: middle;" onclick="showSubCategories();" <?php echo $merchant->merchant_showSubCategories==0?'checked':'';?>>
						<label for="showSubCategoriesNotUse">Not Use</label>
						
					</div>
				</div>
			</div>
			<div class="km-modal-dialog" style="width:60%;" id="setFocusItemsDiv">
				<div class="km-modal-content">
					<div class="km-modal-header">
						<button type="button" class="km-close"><span>&times;</span></button>
						<h4 class="km-modal-title">Set Focus Item</h4>
					</div>
					<div class="km-modal-body" style="height: 300px;overflow-y: scroll;overflow-x: hidden;">
						<table class="list-table" style="width:100%;">
							<thead>
								<tr class="table-head">
									<th style="width:10%;">Select</th>
									<th style="width:40%;">Item Title</th>
									<th style="width:10%;">Image</th>
									<th style="width:10%;">Sell Price</th>
									<th style="width:20%;">Reg.Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item):?>
								<tr>
									<td><input type="checkbox" name="checkedItemId" value="<?php echo $item->product_id;?>" <?php echo $item->product_focus==1?'checked':'';?>></td>
									<td><?php echo $item->product_item_title_english;?></td>
									<td><img style="width:100%;" src="<?php echo $item->product_image;?>"></td>
									<td><?php echo $item->product_sell_price;?></td>
									<td><?php echo $item->product_time;?></td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<div class="km-modal-footer">
						<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
						<button onclick="focusCheckedItems()" type="button" class="km-btn km-btn-primary km-btn-close">Save</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>
<script>

function shopFrontClick(tag,showId){
	initAll();
	$(showId).show();
	$(tag).css('opacity','0.5');
}
function initAll(){
	$('#shopFocusItemList').hide();
	$('#shopItemList').hide();
	$('#shopBanner').hide();
	$('#shopMainAdvertisement').hide();
	$('#shopSecondaryAdvertisement').hide();
	$('.shop-items-list').css('opacity','0.7');
	$('.shop-focus-items').css('opacity','0.7');
	$('.shop-top-img').css('opacity','0.7');
	$('.shop-middle-img').css('opacity','0.7');
	$('.shop-bottom-img').css('opacity','0.7');
}
$(document).ready(function(){
});
function focusCheckedItems(){
	var itemsArray = new Array();
	$("input[name='checkedItemId']:checked").each(function(){
		itemsArray.push($(this).val()); 
	});
	if(itemsArray.length>4){
		alert("You can select up to 4 items to be displayed in your Focus Item area!");
		return false;
	}
	var items = new Object();
	items.idArray = itemsArray;
	dataHandler("modifyBulk","itemsFocus",items,successShowCat,'Sure to modify?',null,null,true);
}
function successShowCat(){
	alert('Successfully saved!');
}
function changeFocusOn(){
	var shopFocusOn = new Object();
	shopFocusOn.id = $("#merchantId").val();
	shopFocusOn.on = $("#focusOnOff").val();
	dataHandler("modify","shopFocusOn",shopFocusOn,successShowCat,'Sure to modify?',null,null,true);
}
function changeShopBannerOn(){
	var shopBannerOn = new Object();
	shopBannerOn.id = $("#merchantId").val();
	shopBannerOn.on = $("#shopBannerOnOff").val();
	dataHandler("modify","shopBannerOn",shopBannerOn,successShowCat,'Sure to modify?',null,null,true);
}
function changeShopMainAdvertisementOn(){
	var shopMainAdvertisementOn = new Object();
	shopMainAdvertisementOn.id = $("#merchantId").val();
	shopMainAdvertisementOn.on = $("#shopMainAdvertisementOnOff").val();
	dataHandler("modify","shopMainAdvertisementOn",shopMainAdvertisementOn,successShowCat,'Sure to modify?',null,null,true);
}
function changeShopSecondaryAdvertisement(){
	var shopSecondaryAdvertisementOn = new Object();
	shopSecondaryAdvertisementOn.id = $("#merchantId").val();
	shopSecondaryAdvertisementOn.on = $("#shopSecondaryAdvertisementOnOff").val();
	dataHandler("modify","shopSecondaryAdvertisementOn",shopSecondaryAdvertisementOn,successShowCat,'Sure to modify?',null,null,true);
}
function changeItemListOn(){
	var shopItemListOn = new Object();
	shopItemListOn.id = $("#merchantId").val();
	shopItemListOn.on = $("#itemListOnOff").val();
	dataHandler("modify","shopItemListOn",shopItemListOn,successShowCat,'Sure to modify?',null,null,true);
}
function showCategoryGroupBar(){
	var categoryGroupBar = new Object();
	categoryGroupBar.id = $("#merchantId").val();
	categoryGroupBar.show = $('input[name="showCategoryGroupBar"]:checked').val();
	dataHandler("modify","categoryGroupBar",categoryGroupBar,successShowCat,'Sure to modify?',null,null,true);
}
function showSubCategories(){
	var subCategories = new Object();
	subCategories.id = $("#merchantId").val();
	subCategories.show = $('input[name="showSubCategories"]:checked').val();
	dataHandler("modify","subCategories",subCategories,successShowCat,'Sure to modify?',null,null,true);
}
</script>