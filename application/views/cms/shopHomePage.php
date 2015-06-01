<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li class="active"><a href="#no"><?php echo lang('cms_grade_shop_Main');?></a></li>
	  <li><a href="/cms/shopDiscount"><?php echo lang('cms_grade_shop_FeaturedEvent');?></a></li>
	  <li><a href="/cms/shopCategory"><?php echo lang('cms_grade_shop_Category');?></a></li>
	  <li><a href="/cms/shopInfo"><?php echo lang('cms_grade_shop_ShopInformation');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_grade_shop_Shopaddressmanagement');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p">*<?php echo lang('cms_grade_shop_SetyourownSellerShopaddress');?></td>
					<td class="value width17p tal">
						http://www.aiimai.com/shop/<input value="Thinkels" type="text" class="km-form-control" id="customer_view_fax_number" style="width: 25%;height: 20px;padding: 0 5px;display: inline-block;font-size:10px;"><a href="http://www.aiimai.com/shop/Thinkels">   <?php echo lang('cms_grade_shop_Go');?></a>
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Change');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
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
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>