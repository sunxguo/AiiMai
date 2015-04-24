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
			<div class="overview fl">
				<img src="/assets/images/cms/tmp_overview.jpg" width="402" height="706" alt="templet overview">
			</div>
			<div class="overview-edit fl">
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>