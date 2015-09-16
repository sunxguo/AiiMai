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
<input type="hidden" id="merchantId" value="<?php echo $_SESSION['userid'];?>">
<div class="" style="padding-left:30px;">
	<input type="hidden" id="groupBuy" value="<?php echo $groupbuy->groupbuy_id;?>">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_goodsStatistics_CategoryandSellFormat');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_GroupBuyNoItem');?>
					</td>
					<td class="value width40p tal" colspan="3">
						Code: <input type="text" class="km-form-control km-input-disabled" id="productCode"  value="<?php echo $groupbuy->groupbuy_productId;?>" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="productTitle"  value="<?php echo $item->product_item_title_english;?>" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="productPrice"  value="<?php echo "S$ ".$item->product_reference_price;?>" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<?php /*
						<button onclick="setDivCenter('#searchPropductDiv',true);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_groupBuy_Search');?></button>
						<div class="km-modal-dialog" id="searchPropductDiv" style="width:800px;">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">Select Product</h4>
								</div>
								<div class="km-modal-body">
									<div class="km-panel km-panel-primary mt10" style="width: 98%;">
										<div class="km-panel-heading"><?php echo lang('cms_goodsCopy_Searchitem');?></div>
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
												  </tr>
												  <tr>
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
													<td class="value tar" colspan="4">
														<button onclick="productQuery(false);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
													</td>
												  </tr>
												</tbody>
											</table>
										</div>
										<div style="height: 300px;overflow: scroll;">
											<table class="km-table" style="overflow:scroll;width:150%;">
												<tbody id="productsData">
												  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
													<td class="field width6p br">Operation</td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_Itemcode');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_SellerCode');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_ItemTitle');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_Price');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_SettlePrice');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_Qty');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_PremiumList');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_Status');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_GlobalSales');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_DeliveryType');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_MainCat');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_1stsubCat');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_2ndsubCat');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_PayondeliveryYOrN');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_SalesFormat');?></td>
													<td class="field width6p br"><?php echo lang('cms_goodsCopy_InventoryCode');?></td>
													<td class="field width6p"><?php echo lang('cms_goodsCopy_ListedDate');?></td>
												  </tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						*/?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_GroupBuyPrice');?>
					</td>
					<td class="value width50p tal">
						<input type="text" value="<?php echo $groupbuy->groupbuy_price;?>" class="km-form-control" id="groupBuyPrice" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<!--
						<?php echo lang('cms_groupBuy_SettlePrice');?> : <input type="text" class="km-form-control km-input-disabled" id="settlePrice" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						(Service Rate : <input type="text" value="0" class="km-form-control km-input-disabled" id="serviceRate" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">%)
						-->
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_RetailPrice');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_groupBuy_RetailPrice');?></h3>
							  <div class="km-popover-content">
								<p><?php echo lang('cms_groupBuy_RetailPriceTip');?></p>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width40p tal">
						<input type="text" value="<?php echo $groupbuy->groupbuy_retailPrice;?>" class="km-form-control km-input-disabled" id="retailPrice" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_AimedMinQty2');?>
					</td>
					<td class="value width40p tal">
						<input type="text" value="<?php echo $groupbuy->groupbuy_minQty;?>" class="km-form-control" id="minQty" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						&nbsp;&nbsp;Stock: <span id="stock" class="km-label km-label-warning"><?php echo $item->product_quantity;?></span>
						<p style="display: inline-block;margin-left:20px;">
							<?php echo lang('cms_groupBuy_AimedMinQtyTip');?>
						</p>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_MaxQtyOptional2');?>
					</td>
					<td class="value width40p tal">
						<input type="text" value="<?php echo $groupbuy->groupbuy_maxQty;?>" class="km-form-control" id="maxQty" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_GroupBuyPeriod');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<!--
						<select style="height: 30px;" onchange="GroupBuyPeriodChange(this);">
							<option value="3">~3<?php echo lang('cms_groupBuy_days');?></option>
							<option value="7">~1<?php echo lang('cms_groupBuy_week');?></option>
							<option value="14">~2<?php echo lang('cms_groupBuy_weeks');?></option>
						</select>
						<input type="text" value="1000" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;" disabled="disabled">
						<?php echo lang('cms_groupBuy_Qcash');?>   
						-->
						<?php $startTime=time($groupbuy->groupbuy_startingTime);$endTime=time($groupbuy->groupbuy_endTime);?>
						<input id="startingDate" type="date" value="<?php echo date("Y-m-d",$startTime);?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select id="startingHour" style="height: 30px;" onchange="selectTime();" timeValue="<?php echo date("H",$startTime);?>">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>
						<select id="startingMinute" style="height: 30px;" timeValue="<?php echo date("i",$startTime);?>">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> <?php echo lang('cms_auctionGoods_min');?>   ~ 
						<input id="endDate" type="date" value="<?php echo date("Y-m-d",$endTime);?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select id="endHour" style="height: 30px;" onchange="selectTime();" timeValue="<?php echo date("H",$endTime);?>">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>  
						<select id="endMinute" style="height: 30px;" timeValue="<?php echo date("i",$endTime);?>">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> <?php echo lang('cms_auctionGoods_min');?>
						<script type="text/javascript">
							$("#startingHour").val($("#startingHour").attr('timeValue'));
							$("#startingMinute").val($("#startingMinute").attr('timeValue'));
							$("#endHour").val($("#endHour").attr('timeValue'));
							$("#endMinute").val($("#endMinute").attr('timeValue'));
						</script>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_AutoAchieve');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<select id="autoAchieve"style="height: 30px;" onchange="selectAutoAchieve();" val="<?php echo $groupbuy->groupbuy_autoAchieve;?>">
							<option value="Y" selected="selected"><?php echo lang('cms_groupBuy_Yes');?></option>
							<option value="N"><?php echo lang('cms_groupBuy_No');?></option>
							<option value="S"><?php echo lang('cms_groupBuy_Suspend');?></option>
						</select>
						<script type="text/javascript">
							$("#autoAchieve").val($("#autoAchieve").attr('val'));
						</script>
						<span id="txt_achieve_Y"><?php echo lang('cms_groupBuy_YesTip');?></span>
						<span id="txt_achieve_N" style="display: none;"><?php echo lang('cms_groupBuy_NoTip');?></span>
						<span id="txt_achieve_S" style="display: none;"><?php echo lang('cms_groupBuy_SuspendTip');?></span>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_BuyNowPrice');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<input id="canBuyNow"  <?php echo $groupbuy->groupbuy_canBuyNow==1?'checked':'';?> type="checkbox" style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_groupBuy_BuyNowPriceTip');?>
					</td>
				  </tr>
				  <!--
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_AvailableDate');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_groupBuy_UsingTip');?></h3>
							  <div class="km-popover-content">
								<p><?php echo lang('cms_groupBuy_UsingTipContent');?></p>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width40p tal" colspan="3">
						<select id="availableDateType" style="height: 30px;">
							<option value="1"><?php echo lang('cms_groupBuy_Shipssameday');?></option>
							<option value="2"><?php echo lang('cms_groupBuy_Preparationforitems');?></option>
							<option value="3"><?php echo lang('cms_groupBuy_Releasedate');?></option>
						</select>
						<?php echo lang('cms_groupBuy_AvailableDateTip');?>
					</td>
				  </tr>
					-->
				  <tr>
					<td class="value tal" colspan="5">
						<p class="fl">
							<?php echo lang('cms_groupBuy_GroupBuyItemInfoWarnning');?>
						</p>
						<button onclick="groupBuyHandler('Add Successfully!',false);" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
<div id="bkDiv"></div>
<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
  <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
  <strong></strong>
  <span class="km-alert-msg"></span>
</div>
<script src="/assets/js/cms-groupbuy.js" type="text/javascript"></script>
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
	window.onbeforeunload = function() {
	    //这里刷新方法有很多，具体要看你的子窗口是怎样出来的
	    window.opener.location.reload();
	    parent.location.reload();
	    self.opener.location.reload();
	    window.opener.location.href=window.opener.location.href;
	};
</script>
</body>
</html>