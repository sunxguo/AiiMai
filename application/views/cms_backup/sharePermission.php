<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/permission"><?php echo lang('cms_baseInfo_permission_MyAuthority');?></a></li>
	  <li class="active"><a href="/cms/sharePermission"><?php echo lang('cms_baseInfo_permission_UserAuthority');?></a></li>
	  <li><a href="/cms/vendor"><?php echo lang('cms_baseInfo_permission_VendorOrBranch');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_sharePermission_ASMUserAuthoritySetting');?></div>
		<div class="km-panel-body" style="padding:10px;">
			<?php echo lang('cms_baseInfo_sharePermission_ASMUserAuthoritySettingContent');?>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_sharePermission_SetUserAuthority');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_SettingAuth');?>
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="Y"><?php echo lang('cms_baseInfo_sharePermission_use');?></option>
							<option value="N"><?php echo lang('cms_baseInfo_sharePermission_notuse');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_PrimaryID');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_baseInfo_sharePermission_SubID');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr>
					<td class="value tar" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
					</td>
				  </tr>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Employee ID</td>
					<td class="field width6p br">Name</td>
					<td class="field width6p br">TelNo</td>
					<td class="field width6p br">Mobile</td>
					<td class="field width6p br">Memo</td>
					<td class="field width6p">Last Login Date</td>
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
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table bt2">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_SubID');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_Name');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_Phonenumber');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_Mobile');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_baseInfo_sharePermission_Memo');?>
					</td>
					<td class="value tal" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table bt2">
				<tbody>
				  <tr>
					<td class="field width45p tac br">
						<?php echo lang('cms_baseInfo_sharePermission_AllMenu');?>
					</td>
					<td class="field width10p tac br">
						
					</td>
					<td class="field width45p tac br">
						<?php echo lang('cms_baseInfo_sharePermission_AuthorizedMenu');?>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" style="vertical-align:top;">
						<div style="overflow:auto;">
							<table class="km-table" style="overflow:scroll;width:100%;border:1px solid #ddd;">
								<tbody>
								  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
									<td class="field width1p tac br">Select</td>
									<td class="field width6p tac br">Main Menu Name</td>
									<td class="field width6p tac">Sub Menu Name</td>
								  </tr>
								  <tr>
									<td class="value br">
										<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
									</td>
									<td class="value br"><?php echo lang('cms_baseInfo_sharePermission_AD');?></td>
									<td class="value"><?php echo lang('cms_baseInfo_sharePermission_ADPlusBidHistory');?></td>
								  </tr>
								  <tr>
									<td class="value br">
										<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
									</td>
									<td class="value br"><?php echo lang('cms_baseInfo_sharePermission_AD');?></td>
									<td class="value"><?php echo lang('cms_baseInfo_sharePermission_ADPlusCategoryPlus');?></td>
								  </tr>
								  <tr>
									<td class="value br">
										<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
									</td>
									<td class="value br"><?php echo lang('cms_baseInfo_sharePermission_AD');?></td>
									<td class="value"><?php echo lang('cms_baseInfo_sharePermission_ManageGlobalSales');?></td>
								  </tr>
								</tbody>
							</table>
						</div>
					</td>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_baseInfo_sharePermission_Add');?></button><br><br>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_baseInfo_sharePermission_Delete');?></button>
					</td>
					<td class="value tal" style="vertical-align:top;">
						<div style="overflow:auto;">
							<table class="km-table" style="overflow:scroll;width:100%;border:1px solid #ddd;">
								<tbody>
								  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
									<td class="field width1p tac br">Select</td>
									<td class="field width6p tac br">Main Menu Name</td>
									<td class="field width6p tac">Sub Menu Name</td>
								  </tr>
								  
								</tbody>
							</table>
						</div>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>