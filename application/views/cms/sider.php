<div class="panel-sidebar clearfix">
	<ul class="nav">
		<li>
			<a href="/cms/index" class="nav-header <?php echo array_key_exists('index',$sider)?'active':'';?>">
				<i class="icon-home"><img src="/assets/images/cms/icon/icon-home-bs.png"></i>
				<span>ASM首页</span>
			</a>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('baseInfo',$sider)?'active':'';?>">
				<i class="icon-user"><img src="/assets/images/cms/icon/icon-uc-bs.png"></i>
				<span>基本信息</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('baseInfo',$sider)?'':'hide';?>">
				<li><a href="/cms/myInfo" class="<?php echo array_key_exists('myInfo',$sider)?'active':'';?>">我的信息</a></li>
				<li><a href="/account/info" class="">我的等级&分数</a></li>
				<li><a href="/cms/shopBaseInfo" class="<?php echo array_key_exists('shop',$sider)?'active':'';?>">卖家店铺</a></li>
				<li><a href="/account/message" class="">我的卖家权限</a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('goodsManagement',$sider)?'active':'';?>">
				<i class="icon-th"><img src="/assets/images/cms/icon/icon-app-bs.png"></i>
				<span>商品管理</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('goodsManagement',$sider)?'':'hide';?>">
				<li><a href="/cms/goodsStatistics" class="<?php echo array_key_exists('goods',$sider)?'active':'';?>">商品登录&修改</a></li>
				<li><a href="/cms/auctionGoods" class="<?php echo array_key_exists('auction',$sider)?'active':'';?>">拍卖&幸运最低价</a></li>
				<li><a href="/cms/groupBuy" class="<?php echo array_key_exists('groupBuy',$sider)?'active':'';?>">集体购买管理</a></li>
				<li><a href="/cms/price" class="<?php echo array_key_exists('price',$sider)?'active':'';?>">价格/数量</a></li>
				<li><a href="/cms/deliveryFee" class="<?php echo array_key_exists('deliveryFee',$sider)?'active':'';?>">运费管理</a></li>
				<li><a href="/cms/inventory" class="<?php echo array_key_exists('inventoryManagement',$sider)?'active':'';?>">Q-库存管理</a></li>
				<li><a href="/cms/stockOptionQuery" class="<?php echo array_key_exists('stockOptionQuery',$sider)?'active':'';?>">库存选项查询</a></li>
				<li><a href="/cms/goodsGroup" class="<?php echo array_key_exists('goodsGroup',$sider)?'active':'';?>">套购买组</a></li>
				<li><a href="/cms/globalSales" class="<?php echo array_key_exists('globalSales',$sider)?'active':'';?>">全球销售商品管理</a></li>
				<li><a href="/cms/bigData" class="<?php echo array_key_exists('bigData',$sider)?'active':'';?>">大量数据管理</a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('ad',$sider)?'active':'';?>">
				<i class="icon-th"><img src="/assets/images/cms/icon/icon-ad-bs.png"></i>
				<span>广告</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('ad',$sider)?'':'hide';?>">
				<li class="nav-sub">广告及展示</li>
				<li><a href="/cms/adPlus" class="<?php echo array_key_exists('adPlus',$sider)?'active':'';?>">Plus展示</a></li>
				<li><a href="/cms/specialDiscount" class="<?php echo array_key_exists('specialDiscount',$sider)?'active':'';?>">特殊折扣管理</a></li>
				<li><a href="/cms/ASpecialApply" class="<?php echo array_key_exists('ASpecial',$sider)?'active':'';?>">QSpecial 高級</a></li>
				<li><a href="/cms/analytics" class="<?php echo array_key_exists('analytics',$sider)?'active':'';?>">Q-Analytics</a></li>
				<li><a href="/cms/goodsSNS" class="<?php echo array_key_exists('goodsSNS',$sider)?'active':'';?>">商品SNS登记管理</a></li>
				<li class="nav-sub">优惠券&奖励</li>
				<li><a href="/cms/privilege" class="<?php echo array_key_exists('privilege',$sider)?'active':'';?>">优惠管理&高级展示</a></li>
				<li><a href="/cms/feedback" class="<?php echo array_key_exists('feedback',$sider)?'active':'';?>">意见反馈奖励</a></li>
				<li><a href="/cms/shoppingActivity" class="<?php echo array_key_exists('shoppingActivity',$sider)?'active':'';?>">购物杂谈活动</a></li>
				<li><a href="/cms/sellersCooperationProjects" class="<?php echo array_key_exists('sellersCooperationProjects',$sider)?'active':'';?>">卖家合作项目</a></li>
				<li class="nav-sub">常客宣传</li>
				<li><a href="/cms/fellow" class="<?php echo array_key_exists('fellowBean',$sider)?'active':'';?>">位粉丝摘要</a></li>
				<li><a href="/cms/sdk" class="">收藏本店优惠活动</a></li>
				<li><a href="/cms/sdk" class="">推送宣传</a></li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('deliveryManagement',$sider)?'active':'';?>">
				<i class="icon-bar"><img src="/assets/images/cms/icon/icon-data-bs.png"></i>
				<span>运送/取消/未收取</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('deliveryManagement',$sider)?'':'hide';?>">
				<li><a href="/cms/delivery" class="<?php echo array_key_exists('delivery',$sider)?'active':'';?>">运送管理</a></li>
				<li><a href="/cms/cancel" class="<?php echo array_key_exists('cancel',$sider)?'active':'';?>">取消/退货/未收取</a></li>
				<li><a href="/cms/shipCompany" class="<?php echo array_key_exists('shipCompany',$sider)?'active':'';?>">运送公司</a></li>
				<li><a href="/cms/branchAssign" class="<?php echo array_key_exists('branchAssign',$sider)?'active':'';?>">分店运送管理</a></li>
				<li><a href="/cms/subbranchStock" class="<?php echo array_key_exists('subbranchStock',$sider)?'active':'';?>">分店入库/出库管理</a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('settlement',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-f-bs.png"></i>
				<span>结算管理</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('settlement',$sider)?'':'hide';?>">
				<li><a href="/cms/sellingReport" class="<?php echo array_key_exists('sellingReport',$sider)?'active':'';?>">销售记录管理</a></li>
				<li><a href="/cms/sellerGBank" class="<?php echo array_key_exists('sellerGBank',$sider)?'active':'';?>">卖家G存折</a></li>
				<li><a href="/cms/receiptDPC" class="<?php echo array_key_exists('receiptDPC',$sider)?'active':'';?>">其它发票管理</a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('callCenter',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-msg-b2.png"></i>
				<span>留言/其它</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('callCenter',$sider)?'':'hide';?>">
				<li><a href="/cms/message" class="<?php echo array_key_exists('message',$sider)?'active':'';?>">客户留言管理</a></li>
				<li><a href="/cms/Qtalk" class="<?php echo array_key_exists('Qtalk',$sider)?'active':'';?>">Qpost/Qtalk</a></li>
				<li><a href="/cms/bulletin" class="<?php echo array_key_exists('bulletin ',$sider)?'active':'';?>">公告管理</a></li>
				<li><a href="/cms/comment" class="<?php echo array_key_exists('comment',$sider)?'active':'';?>">评论查询/留言管理</a></li>
			</ul>
		</li>
		<li class="has-sub ">
			<a href="javascript:void();" class="nav-header <?php echo array_key_exists('EticketMgt',$sider)?'active':'';?>">
				<i class="icon-money"><img src="/assets/images/cms/icon/icon-eticket-b2.png"></i>
				<span>电子券</span>
				<span class="btn-right sprite-ui"></span>
			</a>
			<ul class="nav <?php echo array_key_exists('EticketMgt',$sider)?'':'hide';?>">
				<li><a href="/cms/eticket" class="">电子券管理</a></li>
			</ul>
		</li>
	</ul>
</div>