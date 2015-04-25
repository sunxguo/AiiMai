<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/permission">我的权限记录</a></li>
	  <li><a href="/cms/sharePermission">管理者（共享使用者）权限</a></li>
	  <li class="active"><a href="/cms/vendor">Vendor/分店管理</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">横幅查询</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">导出Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">横幅代码</td>
					<td class="field width6p br">横幅名</td>
					<td class="field width6p br">负责人ID</td>
					<td class="field width6p br">密码</td>
					<td class="field width6p br">收取人名</td>
					<td class="field width6p br">负责人电话号码</td>
					<td class="field width6p br">手机号码</td>
					<td class="field width6p br">手续费类型</td>
					<td class="field width6p br">手续费</td>
					<td class="field width6p">货币</td>
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
						横幅代码
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width15p tal br">
						横幅名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						负责人ID
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						密码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						收取人名
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						负责人电话号码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						手机号码
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						横幅手续费
					</td>
					<td class="value tal">
						<select style="height: 25px;">
							<option value="41001">固定汇率 （%）</option>
							<option value="41002">定额</option>
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
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">附加</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">编辑</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">地点查询</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">分店代码</td>
					<td class="field width6p br">分店名</td>
					<td class="field width6p br">分店地址代号</td>
					<td class="field width6p br">分店地址</td>
					<td class="field width6p br">负责人ID</td>
					<td class="field width6p br">密码</td>
					<td class="field width6p br">收取人名</td>
					<td class="field width6p br">负责人电话号码</td>
					<td class="field width6p">手机号码</td>
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
						分店代码
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width15p tal br">
						分店名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						负责人ID
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						密码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						收取人名
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field tal br">
						负责人电话号码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						负责人电话号码
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						地址
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">附加</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">编辑</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>