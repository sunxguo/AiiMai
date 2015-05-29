<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li><a href="/cms/shopHomePage"><?php echo lang('cms_grade_shop_Main');?></a></li>
	  <li><a href="/cms/shopDiscount"><?php echo lang('cms_grade_shop_FeaturedEvent');?></a></li>
	  <li><a href="/cms/shopCategory"><?php echo lang('cms_grade_shop_Category');?></a></li>
	  <li><a href="/cms/shopInfo"><?php echo lang('cms_grade_shop_ShopInformation');?></a></li>
	</ul>
	<div id="baseInfo">
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading"><?php echo lang('cms_grade_shop_SellerShopInformation');?></div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_SellerShopTitle');?></td>
						<td class="value width17p tal">
							ThinKel's <a href=""><?php echo lang('cms_grade_shop_GoSellerShop');?></a>
							<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Edit');?></button>
						</td>
					  </tr>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_Introductionandwelcomemessage');?></td>
						<td class="value width17p tal" colspan="3">
							Welcome to ThinKel's!
							<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Edit');?></button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading"><?php echo lang('cms_grade_shop_SellerShoplogomanagement');?></div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_MainLogo');?>
							<div class="km-popover-wrapper">
								<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
								<div class="km-popover km-bottom" style="top: 25px;left:-323px; max-width:656px;">
								  <div class="km-arrow"></div>
								  <h3 class="km-popover-title"><?php echo lang('cms_grade_shop_MainLogo');?></h3>

								  <div class="km-popover-content">
									<img src="/assets/images/cms/minishop_infoLayer02.jpg">
								  </div>
								</div>
							</div>
						</td>
						<td class="value width17p br">
							<img src="/assets/temp/shopicon.png" width="108" height="86">
						</td>
						<td class="value width5p br">
							<?php echo lang('cms_grade_shop_Size');?> 108*86
						</td>
						<td class="value width10p br">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Upload');?></button>
						</td>
						<td class="value width10p">
							<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Delete');?></button>
						</td>
					  </tr>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_SmallLogo');?>
							<div class="km-popover-wrapper">
								<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
								<div class="km-popover km-bottom" style="top: 25px;left:-323px; max-width:656px;">
								  <div class="km-arrow"></div>
								  <h3 class="km-popover-title"><?php echo lang('cms_grade_shop_SmallLogo');?></h3>

								  <div class="km-popover-content">
									<img src="/assets/images/cms/minishop_infoLayer03.jpg">
								  </div>
								</div>
							</div>
						</td>
						<td class="value width17p br">
							<img src="/assets/temp/shopiconmini.png" width="57" height="15">
						</td>
						<td class="value width5p br">
							<?php echo lang('cms_grade_shop_Size');?> 57x15
						</td>
						<td class="value width10p br">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Upload');?></button>
						</td>
						<td class="value width10p">
							<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Delete');?></button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
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
			<div class="km-panel-heading"><?php echo lang('cms_grade_shop_ShareAffiliateProgram');?></div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_ShareAffiliateProgram');?></td>
						<td class="value width17p tal">
							<?php echo lang('cms_grade_shop_ShareAffiliateProgramDescription');?>
							
							<input type="checkbox" style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_grade_shop_ShareAffiliateProgramCondition');?><button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_grade_shop_JoinFree');?></button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>