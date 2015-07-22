<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo 'Edit ['.$item->product_item_title_english.']';?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/cms-common.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<input type="hidden" id="productId" value="<?php echo $item->product_id;?>">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_goodsStatistics_CategoryandSellFormat');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_common_Category');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;" onchange="mainCategoryChange()" id="MainCategory">
							<option value="-1">== <?php echo lang('cms_common_MainCategory');?> ==</option>
							<?php foreach($categories as $cat):?>
							<optgroup label="<?php echo $cat->category_name;?>">
								<?php foreach($cat->subCats as $subCat):?>
									<option value="<?php echo $subCat->category_id;?>" <?php if($subCat->category_id==$item->product_category):?>selected<?php endif;?>><?php echo $subCat->category_name;?></option>
								<?php endforeach;?>
							</optgroup>
							<?php endforeach;?>
						</select>
						<select style="height: 30px;" onchange="stSubCategoryChange()" id="stSubCategory">
							<option value="-1">== <?php echo lang('cms_common_1stSubCategory');?> ==</option>
							<?php foreach($subCatList->subCats as $subCat):?>
								<option value="<?php echo $subCat->category_id;?>" <?php if($subCat->category_id==$item->product_sub_category):?>selected<?php endif;?>><?php echo $subCat->category_name;?></option>
							<?php endforeach;?>
						</select>
						<select style="height: 30px;"id="ndSubCategory">
							<option value="-1">== <?php echo lang('cms_common_2ndSubCategory');?> ==</option>
							<?php foreach($subSubCatList->subCats as $subSubCat):?>
								<option value="<?php echo $subSubCat->category_id;?>" <?php if($subSubCat->category_id==$item->product_sub_sub_category):?>selected<?php endif;?>><?php echo $subSubCat->category_name;?></option>
							<?php endforeach;?>
						</select>
						<!--
						<input type="text" placeholder="<?php echo lang('cms_baseInfo_goodsStatistics_Categorycode');?>" class="km-form-control" style="width: 30%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						-->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_SellFormat');?>
					</td>
					<td class="value tal">
						<input type="radio" name="salesMode" id="salesMode1" value="1" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_sell_format==1):?>checked<?php endif;?>><label for="salesMode1"><?php echo lang('cms_baseInfo_goodsStatistics_SellFormat_Buynow');?></label>
						<input type="radio" name="salesMode" id="salesMode2" value="2" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_sell_format==2):?>checked<?php endif;?>><label for="salesMode2"><?php echo lang('cms_baseInfo_goodsStatistics_SellFormat_AuctionAndLuckyPrice');?></label>
						<input type="radio" name="salesMode" id="salesMode3" value="3" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_sell_format==3):?>checked<?php endif;?>><label for="salesMode3"><?php echo lang('cms_baseInfo_goodsStatistics_SellFormat_FreeFormat');?></label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_DeliveryType');?>
					</td>
					<td class="value tal">
						<input type="radio" name="shipType" id="shipType1" value="1" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_delivery_type==1):?>checked<?php endif;?>><label for="shipType1"><?php echo lang('cms_baseInfo_goodsStatistics_Delivery');?></label>
						<input type="radio" name="shipType" id="shipType2" value="2" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_delivery_type==2):?>checked<?php endif;?>><label for="shipType2"><?php echo lang('cms_baseInfo_goodsStatistics_eTicket');?></label>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">e-Ticket</h3>
							  <div class="km-popover-content">
								<p><?php echo lang('cms_baseInfo_goodsStatistics_eTicketTip');?></p>
							  </div>
							</div>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_ItemCondition');?>
					</td>
					<td class="value tal">
						<input type="radio" name="goodsStatus" id="goodsStatus1" value="1" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_item_condition==1):?>checked<?php endif;?>><label for="goodsStatus1"><?php echo lang('cms_baseInfo_goodsStatistics_NewItem');?></label>
						<input type="radio" name="goodsStatus" id="goodsStatus2" value="2" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_item_condition==2):?>checked<?php endif;?>><label for="goodsStatus2"><?php echo lang('cms_baseInfo_goodsStatistics_UsedItem');?></label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_ItemTitle');?>
					</td>
					<td class="value tal">
						<span class="km-label km-label-default"> English </span><input id="title_english" value="<?php echo $item->product_item_title_english;?>" type="text" placeholder="Please enter the correct trade name (up to 200 words)" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br><br>
						<span class="km-label km-label-default">简体中文</span><input id="title_zh_cn" value="<?php echo $item->product_item_title_zh_cn;?>" type="text" placeholder="请输入正确的型号名（最多200字）" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br><br>
						<span class="km-label km-label-default">繁體中文</span><input id="title_tw_cn" value="<?php echo $item->product_item_title_tw_cn;?>" type="text" placeholder="請輸入正確的型號名（最多200字）" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_ShortTitle');?>
					</td>
					<td class="value tal">
						<input id="ShortTitle" value="<?php echo $item->product_short_title;?>" type="text" placeholder="<?php echo lang('cms_baseInfo_goodsStatistics_ShortTitleTip');?>" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_SellerCode');?>
					</td>
					<td class="value tal">
						<input id="SellerCode" value="<?php echo $item->product_seller_code;?>" type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<?php echo lang('cms_baseInfo_goodsStatistics_SellerCodeTip');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_goodsStatistics_ItemImageOrType');?>
					</td>
					<td class="value tal">
						<div class="km-upload-img" style="width: 400px;" onclick="$('#file').click();">
							<img src="<?php echo $item->product_image;?>" width="400" height="400" id="productImg">
							<p style="line-height: 400px;">Upload Image</p>
						</div>
						<form id="upload_image_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadProductImage('#uploadImgThumb')" name="image" type="file" id="file" style="display:none;" accept="image/*">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Country of Manufacture
					</td>
					<td class="value tal">
						<select style="height: 30px;" id="ProductionPlaceCode">
							<option value="-1">====<?php echo lang('cms_baseInfo_goodsStatistics_select');?>=====</option>
							<option value="1" <?php if($item->product_production_place_code==1):?>selected<?php endif;?>><?php echo lang('cms_baseInfo_goodsStatistics_Domestic');?></option>
							<option value="2" <?php if($item->product_production_place_code==2):?>selected<?php endif;?>><?php echo lang('cms_baseInfo_goodsStatistics_Overseas');?></option>
						</select>
						<input id="ProductionPlaceDetail" value="<?php echo $item->product_production_place_detail;?>" type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_goodsAdd_AdultItem');?>？
					</td>
					<td class="value tal">
						<input type="radio" name="adult" id="adult1" value="0" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_adult==0):?>checked<?php endif;?>><label for="adult1"><?php echo lang('cms_goodsAdd_No');?></label>
						<input type="radio" name="adult" id="adult2" value="1" style="vertical-align: middle;margin-right: 5px;" <?php if($item->product_adult==1):?>checked<?php endif;?>><label for="adult2"><?php echo lang('cms_goodsAdd_Yes');?><?php echo lang('cms_goodsAdd_YesExample');?></label>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_goodsAdd_PricingandQuantity');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						<?php echo lang('cms_goodsAdd_SellPrice');?> (S$)
					</td>
					<td class="value tal">
						<input id="SellPrice" value="<?php echo $item->product_sell_price;?>" type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> (<?php echo lang('cms_goodsAdd_SettlePrice');?>: <span class="km-label km-label-danger">90.00</span>)
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-496px; max-width:1000px;width:1000px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_goodsAdd_ServiceFee');?></h3>

							  <div class="km-popover-content">
								<?php echo lang('cms_goodsAdd_Detail');?>
							  </div>
							</div>
						</div>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_goodsAdd_Quantity');?>
					</td>
					<td class="value tal">
						<input id="Quantity" value="<?php echo $item->product_quantity;?>" type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						<?php echo lang('cms_goodsAdd_AvailablePeriod');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;" id="AvailablePeriod">
							<option value="">Select</option>  
							<option value="1" <?php if($item->product_available_period=='1'):?>selected<?php endif;?>>1 day</option>  
							<option value="3" <?php if($item->product_available_period=='3'):?>selected<?php endif;?>>3 days</option>  
							<option value="5" <?php if($item->product_available_period=='5'):?>selected<?php endif;?>>5 days</option>  
							<option value="7" <?php if($item->product_available_period=='7'):?>selected<?php endif;?>>7 days</option>  
							<option value="10" <?php if($item->product_available_period=='10'):?>selected<?php endif;?>>10 days</option>  
							<option value="20" <?php if($item->product_available_period=='20'):?>selected<?php endif;?>>20 days</option>  
							<option value="30" <?php if($item->product_available_period=='30'):?>selected<?php endif;?>>1 month</option>  
							<option value="60" <?php if($item->product_available_period=='60'):?>selected<?php endif;?>>2 months</option>  
							<option value="90" <?php if($item->product_available_period=='90'):?>selected<?php endif;?>>3 months</option>  
							<option value="180" <?php if($item->product_available_period=='180'):?>selected<?php endif;?>>6 months</option>  
							<option value="365" <?php if($item->product_available_period=='365'):?>selected<?php endif;?>>1 year</option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_goodsAdd_ReferencePrice');?> (S$)
					</td>
					<td class="value tal">
						<input id="ReferencePrice" value="<?php echo $item->product_reference_price;?>" type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						<?php echo lang('cms_goodsAdd_Displayleftavailableperiod');?>
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;" id="Displayleftavailableperiod">
							<option value="1" <?php if($item->product_display_left=='1'):?>selected<?php endif;?>>1 <?php echo lang('cms_goodsAdd_days');?></option>
							<option value="2" <?php if($item->product_display_left=='2'):?>selected<?php endif;?>>2 <?php echo lang('cms_goodsAdd_days');?></option>
							<option value="3" <?php if($item->product_display_left=='3'):?>selected<?php endif;?>>3 <?php echo lang('cms_goodsAdd_days');?></option>
							<option value="0" <?php if($item->product_display_left=='0'):?>selected<?php endif;?>selected="selected">Not use</option>
						</select>
						<?php echo lang('cms_goodsAdd_DisplayleftavailableperiodTip');?>
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						<?php echo lang('cms_goodsAdd_AInventory');?>
					</td>
					<td class="value tal" colspan="3">
						
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_goodsAdd_ShippingInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						<?php echo lang('cms_goodsAdd_ShippingAddress');?>
					</td>
					<td class="value tal">
						521168  168A SIMEI LANE168A Simei Lane Singapore 521168 <br>
						<?php echo lang('cms_goodsAdd_ShippingAddressTip');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						<?php echo lang('cms_goodsAdd_ShippingRate');?> (S$)
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-right" style="top: -443px;left: 26px; max-width:900px;width:900px;height:900px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_goodsAdd_ShippingRate');?></h3>

							  <div class="km-popover-content" style="overflow:scroll;height: 851px;">
								运费计算详情...
							  </div>
							</div>
						</div>
					</td>
					<td class="value tal">
						
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						<?php echo lang('cms_goodsAdd_ShippingRateOption');?>
					</td>
					<td class="value tal">
						
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_goodsAdd_ItemDescription');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<textarea id="goodsInfoEditor" style="600px">
			<?php echo $item->product_description;?>
			</textarea>
		</div>
	</div>
	<button onclick="productHandler('This product was saved successfully',false);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script>
	var goodsInfoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			goodsInfoEditor = K.create('#goodsInfoEditor', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'600px',
				resizeType:0,
				imageTabIndex:1,
				langType : '<?php echo $_SESSION['language']=="english"?'en':'zh_CN';?>'
			});
		});
	});
</script>
</body>
</html>