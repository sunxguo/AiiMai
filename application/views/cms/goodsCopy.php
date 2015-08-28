<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/goodsStatistics"><?php echo lang('cms_baseInfo_goodsStatistics_ItemListSummary');?></a></li>
	  <li><a href="/cms/goodsAdd"><?php echo lang('cms_baseInfo_goodsStatistics_NewItemListing');?></a></li>
	  <li class="active"><a href="/cms/goodsCopy"><?php echo lang('cms_baseInfo_goodsStatistics_CopyListing');?></a></li>
	  <li><a href="/cms/goodsEdit">Item Management</a></li>
	  <li><a href="/cms/bigData">Bulk Item Upload</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_goodsCopy_Searchitem');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_common_Category');?>
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;" onchange="mainCategoryChange()" id="MainCategory">
							<option value="-1">== <?php echo lang('cms_common_MainCategory');?> ==</option>
							<?php foreach($categories as $cat):?>
							<optgroup label="<?php echo $cat->category_name;?>">
								<?php foreach($cat->subCats as $subCat):?>
									<option value="<?php echo $subCat->category_id;?>"><?php echo $subCat->category_name;?></option>
								<?php endforeach;?>
							</optgroup>
							<?php endforeach;?>
						</select>
						<select style="height: 30px;" onchange="stSubCategoryChange()" id="stSubCategory">
							<option value="-1">== <?php echo lang('cms_common_1stSubCategory');?> ==</option>
						</select>
						<select style="height: 30px;"id="ndSubCategory">
							<option value="-1">== <?php echo lang('cms_common_2ndSubCategory');?> ==</option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_goodsCopy_Status');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;" id="status">
							<option value="1"><?php echo lang('cms_goodsCopy_UnderReview');?></option>
							<option value="2"><?php echo lang('cms_goodsCopy_Onqueue');?></option>
							<option value="3" selected="selected"><?php echo lang('cms_goodsCopy_Available');?></option>
							<option value="4"><?php echo lang('cms_goodsCopy_Deleted');?></option>
							<option value="5"><?php echo lang('cms_goodsCopy_Suspended');?></option>
							<option value="6">Rejected</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Shop Category
					</td>
					<td class="value tal" colspan="5">
						<select style="height: 30px;" onchange="shopMainCategoryChange()" id="shopMainCategory">
							<option value="-1">== <?php echo lang('cms_common_MainCategory');?> ==</option>
							<?php foreach($shopCategory as $cat):?>
								<option value="<?php echo $cat->shopcategory_id;?>"><?php echo $cat->shopcategory_name;?></option>
							<?php endforeach;?>
						</select>
						<select style="height: 30px;" id="shopStSubCategory">
							<option value="-1">== <?php echo lang('cms_common_1stSubCategory');?> ==</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;" id="dateType">
							<option value="0"><?php echo lang('cms_goodsCopy_ListedDate');?></option>
							<option value="1"><?php echo lang('cms_goodsCopy_ChangeDate');?></option>
						</select>
					</td>
					<td class="value tal" style="width: 290px;">
						<input id="beginDate" type="date" value="<?php echo date("Y-m-d",strtotime(date("Y-m-d")." -30 day"));?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input id="endDate" type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_goodsCopy_SellFormat');?>
					</td>
					<td class="value width17p tal" style="width: 200px;">
						<select id="SellFormat" style="height: 30px;width: 80px;" onchange="if($(this).val()=='1') $('#stock').show();else $('#stock').hide();">
							<option value="1" selected="selected"><?php echo lang('cms_goodsCopy_BuyNow');?></option>
							<option value="2"><?php echo lang('cms_goodsCopy_Auction');?></option>
							<option value="3"><?php echo lang('cms_goodsCopy_FreeFormat');?></option>
							<option value="4"><?php echo lang('cms_goodsCopy_ReservationOrTicket');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="2"><?php echo lang('cms_goodsCopy_ItemTitle');?></option>
							<!--
							<option value="1"><?php echo lang('cms_goodsCopy_Itemcode');?></option>
							<option value="3"><?php echo lang('cms_goodsCopy_SellerCode');?></option>
							<option value="5"><?php echo lang('cms_goodsCopy_GlobalItemCode');?></option>
							-->
						</select>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="title" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Stock
					</td>
					<td class="value tal" style="width: 290px;">
						<select style="height: 30px;width: 110px;" id="stock">
						<!--
							<option value="-1" selected="selected"><?php echo lang('cms_goodsCopy_all');?></option>-->
							<option value="1"><?php echo lang('cms_goodsCopy_Instock');?></option>
							<option value="0"><?php echo lang('cms_goodsCopy_Outofstock');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						GroupBuy
					</td>
					<td class="value tal" style="width: 200px;">
						<input id="groupBuyYes" type="radio" value="1" name="groupbuy" style="vertical-align:middle;">
						<label for="groupBuyYes">Yes</label>
						<input id="groupBuyNo" type="radio" value="0" name="groupbuy" style="vertical-align:middle;" checked>
						<label for="groupBuyNo">No</label>
					</td>
					<td class="value tar" colspan="2">
						<button onclick="productQuery(false);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick="productQuery(true);" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<input id="orderField" type="hidden" value="product_modify_time">
		<input id="direction" type="hidden" value="ASC">
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody id="productsData">
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br tac" style="text-align:center;">
						<input type="checkbox" id="checkAllItems" >
					</td>
					<td class="field width6p br tac">Operation</td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_Itemcode');?></td>
					<td class="field width6p br tac" style="cursor:pointer;" onclick="orderProduct('itemTitle');">
						<?php echo lang('cms_goodsCopy_ItemTitle');?>
					</td>
					<td class="field width6p br tac">Retail Price</td>
					<td class="field width6p br tac">Sell Price</td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_Qty');?></td>
					<!--
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_PremiumList');?></td>
					-->
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_Status');?></td>
					<td class="field width6p br tac">Listing Type</td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_DeliveryType');?></td>
					<!--
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_GlobalSales');?></td>
					-->
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_MainCat');?></td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_1stsubCat');?></td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_2ndsubCat');?></td>
					<!--
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_PayondeliveryYOrN');?></td>
					<td class="field width6p br tac"><?php echo lang('cms_goodsCopy_InventoryCode');?></td>
					-->
					<td class="field width6p tac"><?php echo lang('cms_goodsCopy_ListedDate');?></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="margin:10px 0;">
			<button onclick="copyProduct();" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;margin-left:10px;">Copy</button>
			<button onclick="" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;">Delete</button>
			<button onclick="" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Available Period</button>
			<button onclick="" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;">Display Expiring Item Alert</button>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#checkAllItems").click(function(){
		$(".item").prop('checked',$("#checkAllItems").prop('checked'));
	});
	<?php if(isset($_GET['RT']) && $_GET['RT']):?>
	var today = new Date();
    today.setDate(today.getDate());
    var y = today.getFullYear();
    var m = today.getMonth()+1;//获取当前月份
	m=(m<10?'0':'')+m;
    var d = today.getDate();
	$("#beginDate").val(y+'-'+m+'-'+d);
	<?php endif;?>
	<?php if(isset($_GET['LR']) && $_GET['LR']):?>
	$("#status").val(6);
	<?php endif;?>
	<?php if(isset($_GET['SOT']) && $_GET['SOT']):?>
	$("#stock").val(0);
	<?php endif;?>
	<?php if(isset($_GET['URBL']) && $_GET['URBL']):?>
	$("#status").val(1);
	<?php endif;?>
	<?php if(isset($_GET['GB']) && $_GET['GB']):?>
	$('#groupBuyYes').attr('checked',true);
	<?php endif;?>
	<?php if(isset($_GET['AIP']) && $_GET['AIP']):?>
	$('#SellFormat').val(2);
	<?php endif;?>
	productQuery(false);
});
</script>