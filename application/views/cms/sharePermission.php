<style>
.cms-main{
	background-color:#FFF;
}QSM用户权限基本设定
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/permission">我的权限记录</a></li>
	  <li class="active"><a href="/cms/sharePermission">管理者（共享使用者）权限</a></li>
	  <li><a href="/cms/vendor">Vendor/分店管理</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">ASM用户权限基本设定</div>
		<div class="km-panel-body" style="padding:10px;">
			· 用户权限设定是指？<br>
			- 这个功能允许你自定义共享QSM ID的用户使用QSM权限<br>
			- 这是给共享QSM ID用户们设置QSM菜单使用权限的功能<br>
			- 各用户根究设定的权限不同可使用的菜单也不同。<br>
			<br>
			· 用户权限设定是指？<br>
			- 想给特定的用户公开结算管理菜单时<br>
			- 当您想委托运送公司实行运送任务时<br>
			<br>
			· 如何设置用户权限呢？<br>
			- 通过‘用户登录’登录共享QSM ID的所有用户。<br>
			- 给各用户指定辅助 ID设定个别权限。<br>
			- 共享用户在登录gsm时通过确认辅助用户名可进行用户验证，使他们可以访问允许使用的菜单。<br>
			- 主页用户验证 主要 ID后，即可使用全部菜单<br>
			- 通过下端服务状态更改，可使用或中止用户权限设定服务。
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">管理者（共享用户）权限设定</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						权限设定
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="Y">使用</option>
							<option value="N">未使用</option>
						</select>
					</td>
					<td class="field width10p tal br">
						主要 ID
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
		<div class="km-panel-heading">辅助 ID</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr>
					<td class="value tar" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
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
						辅助 ID
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						姓名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						电话号码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						手机
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						留言
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
						菜单
					</td>
					<td class="field width10p tac br">
						
					</td>
					<td class="field width45p tac br">
						可使用的菜单
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
									<td class="value br">广告</td>
									<td class="value">AD Plus(投标历史记录)</td>
								  </tr>
								  <tr>
									<td class="value br">
										<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
									</td>
									<td class="value br">广告</td>
									<td class="value">AD Plus(分类推荐)</td>
								  </tr>
								  <tr>
									<td class="value br">
										<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
									</td>
									<td class="value br">广告</td>
									<td class="value">全球销售商品管理</td>
								  </tr>
								</tbody>
							</table>
						</div>
					</td>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">附加</button><br><br>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
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