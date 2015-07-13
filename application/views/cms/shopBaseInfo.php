<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li><a href="/cms/shopHomePage">Shop Front</a></li>
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
							<span class="km-label km-label-info fl"><?php echo isset($merchant->merchant_shop_name)?$merchant->merchant_shop_name:'Null';?></span>   
							<a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank"><?php echo lang('cms_grade_shop_GoSellerShop');?></a>
							<button onclick="setDivCenter('#sellerShopTitle',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Edit');?></button>
							<div class="km-modal-dialog width40p" id="sellerShopTitle">
								<div class="km-modal-content">
									<div class="km-modal-header">
										<button type="button" class="km-close"><span>&times;</span></button>
										<h4 class="km-modal-title">Seller Shop Information - Title</h4>
									</div>
									<div class="km-modal-body">
										<label for="sellerShopTitleInput" class="km-control-label">Seller Shop Title:</label>
										<input type="text" class="km-form-control" id="sellerShopTitleInput" value="<?php echo $merchant->merchant_shop_name;?>" style="width: 95%;padding: 0 5px;">
									</div>
									<div class="km-modal-footer">
										<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
										<button type="button" class="km-btn km-btn-primary" onclick="saveSellerShopTitle();"><?php echo lang('cms_myInfo_Savechanges');?></button>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</td>
					  </tr>
					  <!--
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_Introductionandwelcomemessage');?></td>
						<td class="value width17p tal" colspan="3">
							<?php echo isset($merchant->merchant_shop_welcome)?$merchant->merchant_shop_welcome:'Null';?>
							<button onclick="setDivCenter('#sellerShopWelcome',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Edit');?></button>
							<div class="km-modal-dialog width40p" id="sellerShopWelcome">
								<div class="km-modal-content">
									<div class="km-modal-header">
										<button type="button" class="km-close"><span>&times;</span></button>
										<h4 class="km-modal-title">Seller Shop Information - Welcome Message</h4>
									</div>
									<div class="km-modal-body">
										<label for="sellerShopWelcomeInput" class="km-control-label">Introduction:</label>
										<input type="text" class="km-form-control" id="sellerShopWelcomeInput" value="<?php echo $merchant->merchant_shop_welcome;?>" style="width: 95%;padding: 0 5px;">
									</div>
									<div class="km-modal-footer">
										<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
										<button type="button" class="km-btn km-btn-primary" onclick="saveSellerShopWelcome();"><?php echo lang('cms_myInfo_Savechanges');?></button>
									</div>
								</div><!-- /.modal-content -->
						<!--	</div><!-- /.modal-dialog -->
						<!--</td>
					  </tr>
					  -->
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">Seller Shop Logo Management</div>
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
							<img src="<?php echo $merchant->merchant_shop_icon;?>" width="108" height="86" id="mainLogoImage">
						</td>
						<td class="value width5p br">
							<?php echo lang('cms_grade_shop_Size');?>: 108 * 86 pixels
						</td>
						<td class="value width5p br">
							<form id="upload_mainLogo_form" method="post" enctype="multipart/form-data">
								<input onchange="return uploadMainLogo()" name="image" type="file" id="fileMainLogo" style="display:none;" accept="image/*">
							</form>
							<button onclick="$('#fileMainLogo').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Upload');?></button>
						</td>
						<td class="value width5p">
							<button onclick="deleteMainLogo();" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Delete');?></button>
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
							<img src="<?php echo $merchant->merchant_shop_smallicon;?>" width="57" height="15" id="smallLogoImage">
						</td>
						<td class="value width5p br">
							<?php echo lang('cms_grade_shop_Size');?>: 57 * 15 pixels
						</td>
						<td class="value width5p br">
							<form id="upload_smallLogo_form" method="post" enctype="multipart/form-data">
								<input onchange="return uploadSmallLogo()" name="image" type="file" id="fileSmallLogo" style="display:none;" accept="image/*">
							</form>
							<button onclick="$('#fileSmallLogo').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_grade_shop_Upload');?></button>
						</td>
						<td class="value width5p">
							<button onclick="deleteSmallLogo();" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Delete');?></button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">Shop Address Management</div>
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
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading"><?php echo lang('cms_grade_shop_ShareAffiliateProgram');?></div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p"><?php echo lang('cms_grade_shop_ShareAffiliateProgram');?></td>
						<td class="value width17p tal">
							<?php echo lang('cms_grade_shop_ShareAffiliateProgramDescription');?>
							<?php if($merchant->merchant_shop_affiliate_program!=1):?>
							<input id="ifAccept" type="checkbox" style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_grade_shop_ShareAffiliateProgramCondition');?>
							<button onclick="joinAffiliateProgram('1')" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_grade_shop_JoinFree');?></button>
							<?php else:?>
							<span class="km-label km-label-success fl">You have joined this Program.</span>
							<?php endif;?>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>