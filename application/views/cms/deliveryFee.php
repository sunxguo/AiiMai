<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/auctionGoods">default shipping place</a></li>
	  <li><a href="javascript:void();"><img src="/assets/images/cms/icon-plus.png" width="15"></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_ShippingCenterTitle');?>
					</td>
					<td class="value width60p tal">
						<input type="text" value="default shipping place" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value width10p bl1" rowspan="5">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_deliveryFee_Confirm');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_Shippingcenteraddress');?>
					</td>
					<td class="value width50p tal">
						<input type="text" value="168A SIMEI LANE 168A Simei Lane Singapore 521168" class="km-form-control" style="width: 70%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_deliveryFee_Editaddress');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_ReturnOrReplacementaddress');?>
					</td>
					<td class="value width50p tal">
						<input type="text" value="168A SIMEI LANE 168A Simei Lane Singapore 521168" class="km-form-control" style="width: 70%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_deliveryFee_Editaddress');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_ReturnPickupType');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_deliveryFee_ReturnPickupType');?></h3>
							  <div class="km-popover-content">
								<dl><?php echo lang('cms_deliveryFee_ReturnPickupTypeTip');?></dl>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width50p tal">
						<select style="height: 30px;">
							<option value="D"><?php echo lang('cms_deliveryFee_Directshippingbybuyer');?></option>
							<option value="P"><?php echo lang('cms_deliveryFee_PickupbySeller');?></option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_Returnshippingfee');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_deliveryFee_Returnshippingfee');?></h3>
							  <div class="km-popover-content">
								<p><?php echo lang('cms_deliveryFee_ReturnshippingfeeTip');?></p>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width50p tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_deliveryFee_ShippingRateSummary');?></div>
		<div class="km-panel-body" style="padding:0px;">
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_select');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_SRCode');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_SRType');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_ShippingMethod');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_ShippingRateTitle');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_ShippingRate');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_FreeCondition');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_Surcharge');?></td>
					<td class="field width6p br"><?php echo lang('cms_deliveryFee_DeliveryCompany');?></td>
					<td class="field width6p"><?php echo lang('cms_deliveryFee_Items');?></td>
				  </tr>
				  <tr>
					<td class="value br">
						<input type="radio" name="deliveryFee" id="deliveryFee1" style="vertical-align: middle;margin-right: 5px;">
					</td>
					<td class="value br">415926</td>
					<td class="value br">Free</td>
					<td class="value br">Standard</td>
					<td class="value br">Free</td>
					<td class="value br">0.00</td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br">4PX Express</td>
					<td class="value">0</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="margin:10px auto;">
			<?php echo lang('cms_deliveryFee_CoshippingFeeRule');?> - 	<?php echo lang('cms_deliveryFee_ChargingMethodInACart');?>
			<select style="height: 30px;">
				<option value="A"><?php echo lang('cms_deliveryFee_ahighestshippingfee');?></option>
				<option value="I"><?php echo lang('cms_deliveryFee_alowestshippingfee');?></option>
				<option value="D"><?php echo lang('cms_deliveryFee_ashippingfee');?></option>
			</select>
			<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;"><?php echo lang('cms_deliveryFee_ChargingMethodEdit');?></button>
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title"><?php echo lang('cms_groupBuy_UsingTip');?></h3>
				  <div class="km-popover-content">
					<p><?php echo lang('cms_deliveryFee_ChargingMethodEditTip');?></p>
				  </div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_deliveryFee_ShippingRateDetails');?> </div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						<?php echo lang('cms_deliveryFee_Type');?>
					</td>
					<td class="field width20p tal br">
						<?php echo lang('cms_deliveryFee_ShippingMethod');?>
					</td>
					<td class="field width20p tal br">
						<?php echo lang('cms_deliveryFee_DeliveryCompany');?>
					</td>
					<td class="field width20p tal br">
						<?php echo lang('cms_deliveryFee_Title');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_ShippingRate2');?>
					</td>
					<td class="field width15p tal br">
						<?php echo lang('cms_deliveryFee_FreeCondition2');?>
					</td>
				  </tr>
				  <tr>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="F"><?php echo lang('cms_deliveryFee_charge');?></option>
							<option value="M"><?php echo lang('cms_deliveryFee_Freeoncondition');?></option>
							<option value="R"><?php echo lang('cms_deliveryFee_Chargeondeliveryprepay');?></option>
							<option value="X"><?php echo lang('cms_deliveryFee_Free');?></option>
						</select>
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" title="请选择运送方式."><?php echo lang('cms_deliveryFee_Pleaseselectshippingmethod');?></option>
							<option value="NO" title="0"><?php echo lang('cms_deliveryFee_NonregisteredMail');?></option>
							<option value="RM" title="2" selected="selected"><?php echo lang('cms_deliveryFee_Standard');?></option>
							<option value="EX" title="3"><?php echo lang('cms_deliveryFee_Express');?></option>
						</select>
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_deliveryFee_Selectadeliverycompany');?></option>
							<option value="100000019">4PX Express</option>
							<option value="100000043">Airpak</option>
							<option value="100000029">Aramex</option>
							<option value="100000023">Arrow Air Action</option>
							<option value="100000027">Chinapost registered airmail</option>
							<option value="100000021">Citylink</option>
							<option value="100000035">Comone Express</option>
							<option value="100000024">Cuckoo Express</option>
							<option value="100000030">Dex-i</option>
							<option value="100000038">HK post registered mail</option>
							<option value="100000031">Japanpost registered mail</option>
							<option value="100000011">Korea registered airmail</option>
							<option value="100000036">MypostOnline</option>
							<option value="100000057">POS daftar</option>
							<option value="100000052">Pos Laju</option>
							<option value="100000063">Quantium</option>
							<option value="100000020">Qxpress</option>
							<option value="100000033">Sagawa Global(sgx)</option>
							<option value="100000001">Seller Delivery</option>
							<option value="100000003">Singpost registered mail</option>
							<option value="100000040">Singpost Smartpac</option>
							<option value="100000017">Speedpost</option>
							<option value="100000058">SRE</option>
							<option value="100000047">Thailand registered mail</option>
							<option value="100000007">Toll</option>
							<option value="100000013">USPS registered mail</option>
							<option value="100000065">YAMATO Global</option>
						</select>
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tal">
						<?php echo lang('cms_deliveryFee_None');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;" id="accordingWeight"><label for="accordingWeight"><?php echo lang('cms_deliveryFee_WeightOrQuantity');?></label>
					</td>
					<td class="value tal" colspan="5">
						<select style="height: 30px;">
							<option value="Q"><?php echo lang('cms_deliveryFee_byQty');?></option>
							<option value="W"><?php echo lang('cms_deliveryFee_byWeight');?></option>
						</select>
						<input type="radio" name="ccordingWeight" id="accordingWeight1" style="vertical-align: middle;margin-right: 5px;" checked>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 30px;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<label for="accordingWeight1"><?php echo lang('cms_deliveryFee_Addshippingrateonpurchaseofevery');?></label>
						<input type="radio" name="ccordingWeight" id="accordingWeight2" style="vertical-align: middle;margin-right: 5px;">
						<label for="accordingWeight2"><?php echo lang('cms_deliveryFee_EnterShippingRateSector');?></label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;" id="SetTheOverseasFreight"><label for="SetTheOverseasFreight"><?php echo lang('cms_deliveryFee_OverseasShipping');?></label>
					</td>
					<td class="value tal" colspan="5">
						<input type="radio" name="overseasFreight" id="overseasFreight1" style="vertical-align: middle;margin-right: 5px;" checked><label for="overseasFreight1"><?php echo lang('cms_deliveryFee_Qxpress');?></label>
						<input type="radio" name="overseasFreight" id="overseasFreight2" style="vertical-align: middle;margin-right: 5px;"><label for="overseasFreight2"><?php echo lang('cms_deliveryFee_sellersownoverseas');?></label>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_deliveryFee_Add');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_deliveryFee_RegisterOptionShippingFeeSet');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value width10p tal br">
						<select style="height: 30px;">
							<option value="">-----------  <?php echo lang('cms_deliveryFee_Select');?> -----------</option>
							<option value="415926">Free (S$0.00)</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 30%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
				  </tr>
				  <tr>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_deliveryFee_Makeaoptionshippingfeeset');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_deliveryFee_SearchShippingRatebyitem');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						<?php echo lang('cms_deliveryFee_SearchShippingRatebyitemType');?>
					</td>
					<td class="value width30p tal br">
						<select style="height: 30px;">
							<option value="">ALL</option>
							<optgroup label="<Shipping rate group>----------------------------------------------------"></optgroup>
							<option value="X,415926">Free</option>
							<optgroup label="<Shipping rate per each item>----------------------------------------------------"></optgroup>
							<option value="F">Charge for single item</option>
							<option value="D">charge on delivery for single item</option>
							<option value="R">charge on delivery for single (pre-pay)</option>
							<option value="M">Free on condition for single item</option>
						</select>
					</td>
					<td class="value width15p br">
						<select style="height: 30px;">
							<option value="NO" selected="selected">Item code</option>
							<option value="CD">SellerNo</option>
							<option value="NM">Item</option>
						</select>
					</td>
					<td class="value width20p br">
						<input type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table bb2" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">Itemcode</td>
					<td class="field width6p br">Item Title</td>
					<td class="field width6p br">SR Type</td>
					<td class="field width6p br">Charging Method</td>
					<td class="field width6p br">Shipping Rate Title</td>
					<td class="field width6p br">Shipping Method</td>
					<td class="field width6p br">Shipping Rate</td>
					<td class="field width6p br">Free Condition</td>
					<td class="field width6p br">Surcharge (Region)</td>
					<td class="field width6p br">Surcharge (Qty)</td>
					<td class="field width6p">Oversea Surcharge</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
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
		<div class="tar " style="margin:10px auto;">
			<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择商品一起变更</button>
			(up to 500 itemsAvailable to edit all selected items)
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>