<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/permission"><?php echo lang('cms_baseInfo_permission_MyAuthority');?></a></li>
	  <li><a href="/cms/sharePermission"><?php echo lang('cms_baseInfo_permission_UserAuthority');?></a></li>
	  <li><a href="/cms/vendor"><?php echo lang('cms_baseInfo_permission_VendorOrBranch');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_permission_MyAuthority');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_RequestStatus');?>
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;">
							<option value=""><?php echo lang('cms_baseInfo_permission_All');?></option>
							<option value="S1"><?php echo lang('cms_baseInfo_permission_Onrequest');?></option>
							<option value="S2"><?php echo lang('cms_baseInfo_permission_Approval');?></option>
							<option value="S3"><?php echo lang('cms_baseInfo_permission_Refusal');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_RequestType');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value=""> --select--</option>
							<option value="1144"><?php echo lang('cms_baseInfo_permission_RequestType_excel');?></option>
							<option value="992"><?php echo lang('cms_baseInfo_permission_RequestType_Shipment');?></option>
							<option value="1098"><?php echo lang('cms_baseInfo_permission_RequestType_CancelNotificationAPI');?></option>
							<option value="1113"><?php echo lang('cms_baseInfo_permission_RequestType_BulkData');?></option>
							<option value="1139"><?php echo lang('cms_baseInfo_permission_RequestType_StoreTalk');?></option>
							<option value="1160"><?php echo lang('cms_baseInfo_permission_RequestType_FlierItemMng');?></option>
							<option value="1094"><?php echo lang('cms_baseInfo_permission_RequestType_InquiryNotificationAPI');?></option>
							<option value="1137"><?php echo lang('cms_baseInfo_permission_RequestType_LuckyPriceReg');?></option>
							<option value="1001"><?php echo lang('cms_baseInfo_permission_RequestType_OrderNotifyCallback');?></option>
							<option value="1161"><?php echo lang('cms_baseInfo_permission_RequestType_AiiMaiCategoryUse');?></option>
							<option value="1159"><?php echo lang('cms_baseInfo_permission_RequestType_AiiMaireturncenterRequest');?></option>
							<option value="1096"><?php echo lang('cms_baseInfo_permission_RequestType_Setavailabledate');?></option>
							<option value="1151"><?php echo lang('cms_baseInfo_permission_RequestType_SetSettleAmount');?></option>
							<option value="883"><?php echo lang('cms_baseInfo_permission_RequestType_ShippingNotifyCallback');?></option>
							<option value="885"><?php echo lang('cms_baseInfo_permission_RequestType_SuspendCancellation');?></option>
							<option value="884"><?php echo lang('cms_baseInfo_permission_RequestType_UseStorePickup');?></option>
						</select>
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br"><?php echo lang('cms_baseInfo_permission_RequestNo');?></td>
					<td class="field width6p br"><?php echo lang('cms_baseInfo_permission_RequestType');?></td>
					<td class="field width6p br"><?php echo lang('cms_baseInfo_permission_RequestStatus');?></td>
					<td class="field width6p br"><?php echo lang('cms_baseInfo_permission_Note');?></td>
					<td class="field width6p br"><?php echo lang('cms_baseInfo_permission_RegisteredDate');?></td>
					<td class="field width6p"><?php echo lang('cms_baseInfo_permission_EditedDate');?></td>
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
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_permission_AuthorityManagement');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_RequestType');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value=""> --select--</option>
							<option value="992"><?php echo lang('cms_baseInfo_permission_RequestType_Shipment');?></option>
							<option value="1098"><?php echo lang('cms_baseInfo_permission_RequestType_CancelNotificationAPI');?></option>
							<option value="1113"><?php echo lang('cms_baseInfo_permission_RequestType_BulkData');?></option>
							<option value="1139"><?php echo lang('cms_baseInfo_permission_RequestType_StoreTalk');?></option>
							<option value="1160"><?php echo lang('cms_baseInfo_permission_RequestType_FlierItemMng');?></option>
							<option value="1094"><?php echo lang('cms_baseInfo_permission_RequestType_InquiryNotificationAPI');?></option>
							<option value="1137"><?php echo lang('cms_baseInfo_permission_RequestType_LuckyPriceReg');?></option>
							<option value="1001"><?php echo lang('cms_baseInfo_permission_RequestType_OrderNotifyCallback');?></option>
							<option value="1096"><?php echo lang('cms_baseInfo_permission_RequestType_Setavailabledate');?></option>
							<option value="1151"><?php echo lang('cms_baseInfo_permission_RequestType_SetSettleAmount');?></option>
							<option value="883"><?php echo lang('cms_baseInfo_permission_RequestType_ShippingNotifyCallback');?></option>
							<option value="885"><?php echo lang('cms_baseInfo_permission_RequestType_SuspendCancellation');?></option>
							<option value="884"><?php echo lang('cms_baseInfo_permission_RequestType_UseStorePickup');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_RequestStatus');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value=""><?php echo lang('cms_baseInfo_permission_Possibletorequest');?></option>
							<option value="S1"><?php echo lang('cms_baseInfo_permission_Onrequest');?></option>
							<option value="S2"><?php echo lang('cms_baseInfo_permission_Approval');?></option>
							<option value="S3"><?php echo lang('cms_baseInfo_permission_Refusal');?></option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_RequestDate');?>
					</td>
					<td class="value tal">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_EditDate');?>
					</td>
					<td class="value tal">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_permission_Note');?>
					</td>
					<td class="value tal" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Edit');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-info" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_baseInfo_permission_Apply');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>