<div class="panel-sidebar clearfix">
	<ul class="nav">
		<li>
			<a href="/cms/index" class="nav-header <?php echo array_key_exists('index',$sider)?'active':'';?>">
				<i class="icon-home"><img src="/assets/images/cms/icon/icon-home-bs.png"></i>
				<span><?php echo lang('cms_sider_ASMsHome');?></span>
			</a>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('baseInfo',$sider)?'active':'';?>">
				<i class="icon-user"><img src="/assets/images/cms/icon/icon-uc-bs.png"></i>
				<span><?php echo lang('cms_sider_BasicInformation');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('baseInfo',$sider)?'':'hide';?>">
				<li><a href="/cms/myInfo" class="<?php echo array_key_exists('myInfo',$sider)?'active':'';?>"><?php echo lang('cms_sider_MyInformation');?></a></li>
				<li><a href="/cms/grade" class="<?php echo array_key_exists('grade',$sider)?'active':'';?>"><?php echo lang('cms_sider_MyGradeAndPoint');?></a></li>
				<li><a href="/cms/shopBaseInfo" class="<?php echo array_key_exists('shop',$sider)?'active':'';?>"><?php echo lang('cms_sider_ManageSellerShop');?></a></li>
				<li><a href="/cms/permission" class="<?php echo array_key_exists('sellerPermission',$sider)?'active':'';?>"><?php echo lang('cms_sider_ASMMenuAuthority');?></a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('goodsManagement',$sider)?'active':'';?>">
				<i class="icon-th"><img src="/assets/images/cms/icon/icon-app-bs.png"></i>
				<span><?php echo lang('cms_sider_ListingAndPricing');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('goodsManagement',$sider)?'':'hide';?>">
				<li><a href="/cms/goodsStatistics" class="<?php echo array_key_exists('goods',$sider)?'active':'';?>"><?php echo lang('cms_sider_ListingAndEditing');?></a></li>
				<li><a href="/cms/auctionGoods" class="<?php echo array_key_exists('auction',$sider)?'active':'';?>"><?php echo lang('cms_sider_AuctionAndLuckyPrice');?></a></li>
				<li><a href="/cms/groupBuy" class="<?php echo array_key_exists('groupBuy',$sider)?'active':'';?>"><?php echo lang('cms_sider_ManageGroupBuy');?></a></li>
				<li><a href="/cms/price" class="<?php echo array_key_exists('price',$sider)?'active':'';?>"><?php echo lang('cms_sider_PricingAndQty');?></a></li>
				<li><a href="/cms/deliveryFee" class="<?php echo array_key_exists('deliveryFee',$sider)?'active':'';?>"><?php echo lang('cms_sider_ShippingRateOrForm');?></a></li>
				<li><a href="/cms/inventory" class="<?php echo array_key_exists('inventoryManagement',$sider)?'active':'';?>"><?php echo lang('cms_sider_Inventory');?></a></li>
				<li><a href="/cms/stockOptionQuery" class="<?php echo array_key_exists('stockOptionQuery',$sider)?'active':'';?>"><?php echo lang('cms_sider_InventoryOptionSearch');?></a></li>
				<li><a href="/cms/goodsGroup" class="<?php echo array_key_exists('goodsGroup',$sider)?'active':'';?>"><?php echo lang('cms_sider_SetSalesGroup');?></a></li>
				<li><a href="/cms/globalSales" class="<?php echo array_key_exists('globalSales',$sider)?'active':'';?>"><?php echo lang('cms_sider_ManageGlobalSales');?></a></li>
				<li><a href="/cms/bigData" class="<?php echo array_key_exists('bigData',$sider)?'active':'';?>"><?php echo lang('cms_sider_BulkDataManagement');?></a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('ad',$sider)?'active':'';?>">
				<i class="icon-th"><img src="/assets/images/cms/icon/icon-ad-bs.png"></i>
				<span><?php echo lang('cms_sider_Promotion');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('ad',$sider)?'':'hide';?>">
				<li class="nav-sub"><?php echo lang('cms_sider_ADdisplay');?></li>
				<li><a href="/cms/adPlus" class="<?php echo array_key_exists('adPlus',$sider)?'active':'';?>"><?php echo lang('cms_sider_PlusDisplay');?></a></li>
				<li><a href="/cms/specialDiscount" class="<?php echo array_key_exists('specialDiscount',$sider)?'active':'';?>"><?php echo lang('cms_sider_SpecialDealsDisplay');?></a></li>
				<li><a href="/cms/ASpecialApply" class="<?php echo array_key_exists('ASpecial',$sider)?'active':'';?>"><?php echo lang('cms_sider_ASpecialPremium');?></a></li>
				<li><a href="/cms/analytics" class="<?php echo array_key_exists('analytics',$sider)?'active':'';?>"><?php echo lang('cms_sider_AAnalytics');?></a></li>
				<li><a href="/cms/goodsSNS" class="<?php echo array_key_exists('goodsSNS',$sider)?'active':'';?>"><?php echo lang('cms_sider_ItemSNSListing');?></a></li>
				<li class="nav-sub"><?php echo lang('cms_sider_CouponAndReward');?></li>
				<li><a href="/cms/privilege" class="<?php echo array_key_exists('privilege',$sider)?'active':'';?>"><?php echo lang('cms_sider_BenefitAndPremiumListing');?></a></li>
				<li><a href="/cms/feedback" class="<?php echo array_key_exists('feedback',$sider)?'active':'';?>"><?php echo lang('cms_sider_FeedbackReward');?></a></li>
				<li><a href="/cms/shoppingActivity" class="<?php echo array_key_exists('shoppingActivity',$sider)?'active':'';?>"><?php echo lang('cms_sider_ShoppingTalkEvent');?></a></li>
				<li><a href="/cms/sellersCooperationProjects" class="<?php echo array_key_exists('sellersCooperationProjects',$sider)?'active':'';?>"><?php echo lang('cms_sider_CuratorAffiliateProgram');?></a></li>
				<li class="nav-sub"><?php echo lang('cms_sider_FellowAndPromotion');?></li>
				<li><a href="/cms/fellow" class="<?php echo array_key_exists('fellowBean',$sider)?'active':'';?>"><?php echo lang('cms_sider_FellowSummary');?></a></li>
				<li><a href="/cms/privilege" class=""><?php echo lang('cms_sider_FellowEvent');?></a></li>
				<li><a href="/cms/feedback" class=""><?php echo lang('cms_sider_PushPromotion');?></a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('deliveryManagement',$sider)?'active':'';?>">
				<i class="icon-bar"><img src="/assets/images/cms/icon/icon-data-bs.png"></i>
				<span><?php echo lang('cms_sider_ShippingAndClaim');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('deliveryManagement',$sider)?'':'hide';?>">
				<li><a href="/cms/delivery" class="<?php echo array_key_exists('delivery',$sider)?'active':'';?>"><?php echo lang('cms_sider_Shipping');?></a></li>
				<li><a href="/cms/cancel" class="<?php echo array_key_exists('cancel',$sider)?'active':'';?>"><?php echo lang('cms_sider_CancelOrReturnOrNonReceipt');?></a></li>
				<li><a href="/cms/shipCompany" class="<?php echo array_key_exists('shipCompany',$sider)?'active':'';?>"><?php echo lang('cms_sider_SearchbyshipCompany');?></a></li>
				<li><a href="/cms/branchAssign" class="<?php echo array_key_exists('branchAssign',$sider)?'active':'';?>"><?php echo lang('cms_sider_ShippingBranch');?></a></li>
				<li><a href="/cms/subbranchStock" class="<?php echo array_key_exists('subbranchStock',$sider)?'active':'';?>"><?php echo lang('cms_sider_InventoryHistoryBranch');?></a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('settlement',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-f-bs.png"></i>
				<span><?php echo lang('cms_sider_Settlement');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('settlement',$sider)?'':'hide';?>">
				<li><a href="/cms/sellingReport" class="<?php echo array_key_exists('sellingReport',$sider)?'active':'';?>"><?php echo lang('cms_sider_SalesSummary');?></a></li>
				<li><a href="/cms/sellerGBank" class="<?php echo array_key_exists('sellerGBank',$sider)?'active':'';?>"><?php echo lang('cms_sider_SellerAaccount');?></a></li>
				<li><a href="/cms/receiptDPC" class="<?php echo array_key_exists('receiptDPC',$sider)?'active':'';?>"><?php echo lang('cms_sider_OtherReceipts');?></a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('callCenter',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-msg-b2.png"></i>
				<span><?php echo lang('cms_sider_CustomerService');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('callCenter',$sider)?'':'hide';?>">
				<li><a href="/cms/message" class="<?php echo array_key_exists('message',$sider)?'active':'';?>"><?php echo lang('cms_sider_CustomerInquiry');?></a></li>
				<li><a href="/cms/Qtalk" class="<?php echo array_key_exists('Qtalk',$sider)?'active':'';?>"><?php echo lang('cms_sider_ApostOrAtalk');?></a></li>
				<li><a href="/cms/bulletin" class="<?php echo array_key_exists('bulletin ',$sider)?'active':'';?>"><?php echo lang('cms_sider_ManageNotice');?></a></li>
				<li><a href="/cms/comment" class="<?php echo array_key_exists('comment',$sider)?'active':'';?>"><?php echo lang('cms_sider_CustomerReview');?></a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('EticketMgt',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-eticket-b2.png"></i>
				<span><?php echo lang('cms_sider_eTicket');?></span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('EticketMgt',$sider)?'':'hide';?>">
				<li><a href="/cms/eticket" class=""><?php echo lang('cms_sider_ManageeTicket');?></a></li>
			</ul>
		</li>
	</ul>
</div>