<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Group Buy Item Info</div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;">
			  <button type="button" class="km-btn km-btn-warning" style="width:33%;"><?php echo lang('cms_groupBuy_InPreparation');?>(<?php echo $inPreparationAmount;?>/<?php echo $amount;?>)</button>
			  <button type="button" class="km-btn km-btn-success" style="width:34%;"><?php echo lang('cms_groupBuy_InProgress');?>(<?php echo $inProgressAmount;?>/<?php echo $amount;?>)</button>
			  <button type="button" class="km-btn km-btn-danger" style="width:33%;"><?php echo lang('cms_groupBuy_Ended');?>(<?php echo $endedAmount;?>/<?php echo $amount;?>)</button>
			</div>
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_Condition');?>
					</td>
					<td class="value width50p tal" colspan="2">
						<select style="height: 30px;">
						<!--
							<option value="" selected="selected"><?php echo lang('cms_groupBuy_All');?></option>
							<option value="group_buy_no"><?php echo lang('cms_groupBuy_GroupBuyNo');?></option>
							<option value="gd_no"><?php echo lang('cms_groupBuy_ItemCode');?></option>
							-->
							<option value="gd_nm"><?php echo lang('cms_groupBuy_ItemTitle');?></option>
						</select>
						<input id="keywords" type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick="groupBuyQuery(false);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick="groupBuyQuery(true);" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody id="groupBuyData">
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Operation</td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_GroupBuyNo2');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_ItemCode');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_ItemTitle');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_Price');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_SettlePrice');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_AimedMinQty');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_MaxQtyOptional');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_OrderedQty');?></td>
					<!--
					<td class="field width6p br"><?php echo lang('cms_groupBuy_AchieveDeal');?></td>
					-->
					<td class="field width6p br"><?php echo lang('cms_groupBuy_StartingDate');?></td>
					<td class="field width6p br"><?php echo lang('cms_groupBuy_EndDate');?></td>
					<td class="field width6p"><?php echo lang('cms_groupBuy_RegisteredDate');?></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_GroupBuyNoItem');?>
				</td>
				<td class="value width40p tal" colspan="3">
					<input type="text" class="km-form-control km-input-disabled" id="productCode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<input type="text" class="km-form-control km-input-disabled" id="productTitle" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<input type="text" class="km-form-control km-input-disabled" id="productPrice" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<button onclick="setDivCenter('#searchPropductDiv',true);" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_groupBuy_Search');?></button>
					<div class="km-modal-dialog width40p" id="searchPropductDiv">
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
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_GroupBuyPrice');?>
				</td>
				<td class="value width50p tal">
					<input type="text" class="km-form-control" id="groupBuyPrice" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					<?php echo lang('cms_groupBuy_SettlePrice');?> : <input type="text" class="km-form-control km-input-disabled" id="settlePrice" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					(Service Rate : <input type="text" value="0" class="km-form-control km-input-disabled" id="serviceRate" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">%)
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
					<input type="text" class="km-form-control" id="retailPrice" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_AimedMinQty2');?>
				</td>
				<td class="value width40p tal">
					<input type="text" class="km-form-control" id="minQty" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					<p style="display: inline-block;margin-left:20px;">
						<?php echo lang('cms_groupBuy_AimedMinQtyTip');?>
					</p>
				</td>
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_MaxQtyOptional2');?>
				</td>
				<td class="value width40p tal">
					<input type="text" class="km-form-control" id="maxQty" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_GroupBuyPeriod');?>
				</td>
				<td class="value width40p tal" colspan="3">
					<select style="height: 30px;">
						<option value="3">~3<?php echo lang('cms_groupBuy_days');?></option>
						<option value="7">~1<?php echo lang('cms_groupBuy_week');?></option>
						<option value="14">~2<?php echo lang('cms_groupBuy_weeks');?></option>
					</select>
					<!--
					<input type="text" value="1000" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;" disabled="disabled">
					<?php echo lang('cms_groupBuy_Qcash');?>   
					-->
					<input id="startingDate" type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					<select id="startingHour" style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
					</select> <?php echo lang('cms_auctionGoods_Hr');?>  
					<select id="startingMinute" style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
					</select> <?php echo lang('cms_auctionGoods_min');?>   ~ 
					<input id="endDate" type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					<select id="endHour" style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
					</select> <?php echo lang('cms_auctionGoods_Hr');?>  
					<select id="endMinute" style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
					</select> <?php echo lang('cms_auctionGoods_min');?>  
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					<?php echo lang('cms_groupBuy_AutoAchieve');?>
				</td>
				<td class="value width40p tal" colspan="3">
					<select id="autoAchieve"style="height: 30px;" onchange="selectAutoAchieve();">
						<option value="Y" selected="selected"><?php echo lang('cms_groupBuy_Yes');?></option>
						<option value="N"><?php echo lang('cms_groupBuy_No');?></option>
						<option value="S"><?php echo lang('cms_groupBuy_Suspend');?></option>
					</select>
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
					<input id="canBuyNow" type="checkbox" style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_groupBuy_BuyNowPriceTip');?>
				</td>
			  </tr>
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
			  <tr>
				<td class="value tal" colspan="5">
					<p class="fl">
						<?php echo lang('cms_groupBuy_GroupBuyItemInfoWarnning');?>
					</p>
					<button onclick="groupBuyHandler('Add Successfully!',true);" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_groupBuy_Add');?></button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_groupBuy_OrderInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;">
			  <button type="button" class="km-btn km-btn-warning" style="width:33%;"><?php echo lang('cms_groupBuy_Paid');?>(0/0) : <?php echo lang('cms_groupBuy_Qty');?>(0/0)</button>
			  <button type="button" class="km-btn km-btn-success" style="width:34%;"><?php echo lang('cms_groupBuy_Paymentinprogress');?>(0/0) : <?php echo lang('cms_groupBuy_Qty');?>(0/0)</button>
			  <button type="button" class="km-btn km-btn-danger" style="width:33%;"><?php echo lang('cms_groupBuy_Cancelled');?>(0/0)</button>
			</div>
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_Condition');?>
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_groupBuy_All');?></option>
							<option value="order_no"><?php echo lang('cms_groupBuy_OrderNo');?></option>
							<option value="gd_no"><?php echo lang('cms_groupBuy_ItemCode');?></option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
			<div style="overflow:auto;">
				<table class="km-table" style="overflow:scroll;width:100%;">
					<tbody>
					  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
						<td class="field width6p br"><?php echo lang('cms_groupBuy_OrderNo');?></td>
						<td class="field width6p br"><?php echo lang('cms_groupBuy_OrderedQty');?></td>
						<td class="field width6p br"><?php echo lang('cms_groupBuy_Payment');?></td>
						<td class="field width6p br"><?php echo lang('cms_groupBuy_PaymentStatus');?></td>
						<td class="field width6p br"><?php echo lang('cms_groupBuy_Paymentmethod');?></td>
						<td class="field width6p"><?php echo lang('cms_groupBuy_ShippingStatus');?></td>
					  </tr>
					  <tr>
						<td class="value br"></td>
						<td class="value br"></td>
						<td class="value br"></td>
						<td class="value br"></td>
						<td class="value br"></td>
						<td class="value"></td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-groupBuy.js" type="text/javascript"></script>