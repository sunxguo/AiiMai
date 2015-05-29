<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_groupBuy_SalesItems');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;overflow:hidden;">
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;"><?php echo lang('cms_groupBuy_Expiringin1week');?> (0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;"><?php echo lang('cms_groupBuy_Expiredin1week');?> (0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;"><?php echo lang('cms_groupBuy_Expiredin1month');?> (0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;"><?php echo lang('cms_groupBuy_Qtylessthan3');?> (0)</button>
			</div>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_groupBuy_SalesInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						<?php echo lang('cms_groupBuy_StockStatus');?>
					</td>
					<td class="value width30p tal" colspan="2">
						<select style="height: 30px;">			 
							<option value="A"><?php echo lang('cms_price_All');?></option>
							<option value="Y" selected="selected"><?php echo lang('cms_price_Instock');?></option>
							<option value="N"><?php echo lang('cms_price_Outofstock');?></option>
						</select>
						<select style="height: 30px;">
							<option value="0"><?php echo lang('cms_price_All');?></option>
							<option value="3"><?php echo lang('cms_price_within3daysbeforeexpire');?></option>
							<option value="7"><?php echo lang('cms_price_within7daysbeforeexpire');?></option>
						</select>
						<select style="height: 30px;">
							<option value="0"><?php echo lang('cms_price_All');?></option>
							<option value="3"><?php echo lang('cms_price_remain3orless');?></option>
							<option value="10"><?php echo lang('cms_price_remain10orless');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_price_SearchOption');?>
					</td>
					<td class="value width30p tal" colspan="2">
						<select style="height: 30px;">
							<option value="NO" selected="selected"><?php echo lang('cms_price_GDcode');?></option>
							<option value="NM"><?php echo lang('cms_price_ItemTitle');?></option>
							<option value="CD"><?php echo lang('cms_price_SellerCode');?></option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br"><?php echo lang('cms_price_Itemcode');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_SellerCode');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_ItemTitle');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_Price');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_SettlePrice');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_Servicefee');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_Qty');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_ShippingRate');?></td>
					<td class="field width6p br"><?php echo lang('cms_price_SRType');?></td>
					<td class="field width6p"><?php echo lang('cms_price_ExpireDate');?></td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_price_Extendexpiredate');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="value width10p tal" colspan="2">
						<select style="height: 30px;">
							<option value="" selected="selected">Select</option>
							<option value="10">10 days</option>
							<option value="20">20 days</option>
							<option value="30">1 month</option>
							<option value="60">2 month</option>
							<option value="90">3 month</option>
							<option value="180">6 month</option>
							<option value="365">1 year</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_price_Extenddisplayduration');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_price_Deletesalesinfo');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_price_UploadExcelfile');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p br"><?php echo lang('cms_price_AutoExtension');?></td>
					<td class="value tal">
						<?php echo lang('cms_price_hadexpiredautomatically');?>
						<select style="height: 30px;">
							<option value="N" selected="selected"><?php echo lang('cms_price_extendthemfor1month');?></option>
							<option value="Y"><?php echo lang('cms_price_makethemsoldout');?></option>
						</select>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;"><?php echo lang('cms_common_Edit');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_price_Sellpriceandinventorymanagement');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br"><?php echo lang('cms_price_GDcode');?></td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p br"><?php echo lang('cms_price_ItemTitle');?></td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br"><?php echo lang('cms_price_SellPrice');?> (S$)</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="field width10p br"><?php echo lang('cms_price_SettleAmount');?> (S$)</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<div class="km-popover-wrapper">
							<div style="display:inline-block;cursor:pointer;" onclick="$(this).next().toggle(10)">
								<?php echo lang('cms_price_ServiceFee');?><img src="/assets/images/cms/questionMark.png" width="14px">
							</div>
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_price_ServiceFee');?></h3>
							  <div class="km-popover-content">
								<p>
									
								</p>
							  </div>
							</div>
						</div>
					</td>
				  </tr>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br"><?php echo lang('cms_price_AvailableStock');?></td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="field width10p br"><?php echo lang('cms_price_ExpireDate');?></td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">Select</option>
							<option value="1">1 day</option>
							<option value="3">3 days</option>
							<option value="5">5 days</option>
							<option value="7">7 days</option>
							<option value="10">10 days</option>
							<option value="20">20 days</option>
							<option value="30">1 month</option>
							<option value="60">2 month</option>
							<option value="90">3 month</option>
							<option value="180">6 month</option>
							<option value="365">1 year</option>
						</select>
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p br"><?php echo lang('cms_price_GlobalSales');?></td>
					<td class="value tar" colspan="3">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_price_EditPriceOrInventory');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_price_Deletesalesinfo');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-groupBuy.js" type="text/javascript"></script>