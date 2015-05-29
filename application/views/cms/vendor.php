<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/permission"><?php echo lang('cms_baseInfo_permission_MyAuthority');?></a></li>
	  <li><a href="/cms/sharePermission"><?php echo lang('cms_baseInfo_permission_UserAuthority');?></a></li>
	  <li class="active"><a href="/cms/vendor"><?php echo lang('cms_baseInfo_permission_VendorOrBranch');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Search VendorSearchExcel<!--横幅查询--></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Vendor Code<!--横幅代码--></td>
					<td class="field width6p br">Vendor Name<!--横幅名--></td>
					<td class="field width6p br">Staff ID<!--负责人ID--></td>
					<td class="field width6p br">Password<!--密码--></td>
					<td class="field width6p br">Staff Name<!--收取人名--></td>
					<td class="field width6p br">Staff Contact No.<!--负责人电话号码--></td>
					<td class="field width6p br">Mobile Phone No.<!--手机号码--></td>
					<td class="field width6p br">Service Fee Type<!--手续费类型--></td>
					<td class="field width6p br">Service Fee Rate<!--手续费--></td>
					<td class="field width6p">Currency<!--货币--></td>
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
						Vendor Code<!--横幅代码-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width15p tal br">
						Vendor Name<!--横幅名-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Staff ID<!--负责人ID-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						Password<!--密码-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Staff Name<!--收取人名-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						Staff Contact No.<!--负责人电话号码-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Mobile No.<!--手机号码-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						Vendor Commission<!--横幅手续费-->
					</td>
					<td class="value tal">
						<select style="height: 25px;">
							<option value="41001">Fixed Rate(%)<!--固定汇率 （%）--></option>
							<option value="41002">Fixed Amount<!--定额--></option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width:30%;height: 25px;padding: 0 5px;display: inline-block;">
						<select style="height: 25px;">
							<option value="CNY">CNY</option>
							<option value="HKD">HKD</option>
							<option value="IDR">IDR</option>
							<option value="JPY">JPY</option>
							<option value="MYR">MYR</option>
							<option value="SGD">SGD</option>
							<option value="USD">USD</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">Add<!--附加--></button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Edit<!--编辑--></button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">Delete<!--删除--></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Search Branch<!--地点查询--></div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Branch Code<!--分店代码--></td>
					<td class="field width6p br">Branch Name<!--分店名--></td>
					<td class="field width6p br">Branch Address Code<!--分店地址代号--></td>
					<td class="field width6p br">Branch Address<!--分店地址--></td>
					<td class="field width6p br">Staff ID<!--负责人ID--></td>
					<td class="field width6p br">Password<!--密码--></td>
					<td class="field width6p br">Staff Name<!--收取人名--></td>
					<td class="field width6p br">Staff Contact No.<!--负责人电话号码--></td>
					<td class="field width6p">Mobile Phone No.<!--手机号码--></td>
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
						Branch Code<!--分店代码-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width15p tal br">
						Branch Name<!--分店名-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Staff ID<!--负责人ID-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						Password<!--密码-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Staff Name<!--收取人名-->
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						Staff Contact No.<!--负责人电话号码-->
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Staff Contact No.<!--负责人电话号码-->
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Address<!--地址-->
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">Add<!--附加--></button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Edit<!--编辑--></button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">Delete<!--删除--></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>