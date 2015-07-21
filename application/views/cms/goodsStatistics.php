<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/goodsStatistics"><?php echo lang('cms_baseInfo_goodsStatistics_ItemListSummary');?></a></li>
	  <li><a href="/cms/goodsAdd"><?php echo lang('cms_baseInfo_goodsStatistics_NewItemListing');?></a></li>
	  <li><a href="/cms/goodsCopy"><?php echo lang('cms_baseInfo_goodsStatistics_CopyListing');?></a></li>
	  <li><a href="/cms/goodsEdit">Item Management</a></li>
	  <li><a href="/cms/bigData">Bulk Item Upload</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_goodsStatistics_ItemListSummary');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<p style="height:30px;line-height:30px;font-size:14px;padding:10px;">
				<?php echo lang('cms_baseInfo_goodsStatistics_Total');?> <span class="km-badge"><?php echo $total;?></span> 
				<?php echo lang('cms_baseInfo_goodsStatistics_items');?>, <span class="km-badge km-badge-success"><?php echo $onSale;?></span>
				<?php echo lang('cms_baseInfo_goodsStatistics_itemsonsale');?>
			</p>
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="value width50p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_Registeredtoday');?>: <span class="km-badge km-badge-info"><?php echo $registeredToday;?></span> 
						<a href="/cms/goodsEdit?RT=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
					<td class="value width50p tal">
						<?php echo lang('cms_baseInfo_goodsStatistics_Soldouttoday');?>: <span class="km-badge km-badge-info">0</span> 
						<a href="/cms/goodsEdit?SOT=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
				  </tr>
				  <tr>
					<td class="value width50p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_GroupBuyinProgress');?>: <span class="km-badge km-badge-info"><?php echo $groupBuy;?></span>  
						<a href="/cms/goodsEdit?GB=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
					<td class="value width50p tal">
						<?php echo lang('cms_baseInfo_goodsStatistics_AuctioninProgress');?>: <span class="km-badge km-badge-info"><?php echo $auction;?></span> 
						<a href="/cms/goodsEdit?AIP=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
				  </tr>
				  <tr>
					<td class="value width50p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_Underreviewbeforelisting');?>: <span class="km-badge km-badge-info"><?php echo $underReview;?></span>  
						<a href="/cms/goodsEdit?URBL=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
					<td class="value width50p tal">
						<?php echo lang('cms_baseInfo_goodsStatistics_ListingRejected');?>: <span class="km-badge km-badge-info"><?php echo $rejected;?></span> 
						<a href="/cms/goodsEdit?LR=true" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">Go</a>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>