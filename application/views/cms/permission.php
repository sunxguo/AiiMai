<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/permission">我的权限记录</a></li>
	  <li><a href="/cms/sharePermission">管理者（共享使用者）权限</a></li>
	  <li><a href="/cms/vendor">Vendor/分店管理</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">我的权限记录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						申请状态
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;">
							<option value="">所有</option>
							<option value="S1">申请中</option>
							<option value="S2">验证</option>
							<option value="S3">拒绝</option>
						</select>
					</td>
					<td class="field width10p tal br">
						权限种类
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value=""> --select--</option>
							<option value="1144">Excel超大容量文件登录免费</option>
							<option value="992">添加发货地址</option>
							<option value="1098">取消连动API</option>
							<option value="1113">大量数据管理</option>
							<option value="1139">购买话说展览</option>
							<option value="1160">Flier Item Mng</option>
							<option value="1094">問議連動API</option>
							<option value="1137">幸运最低价权限</option>
							<option value="1001">订购API权限</option>
							<option value="1161">Qoo10 Category Use</option>
							<option value="1159">Qoo10退貨中心使用</option>
							<option value="1096">商品准备日设定</option>
							<option value="1151">结算价设定</option>
							<option value="883">订货API权限</option>
							<option value="885">取消验证权限</option>
							<option value="884">现场领取使用</option>
						</select>
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">申请号码</td>
					<td class="field width6p br">权限种类</td>
					<td class="field width6p br">申请状态</td>
					<td class="field width6p br">备注</td>
					<td class="field width6p br">登录日</td>
					<td class="field width6p">更改日</td>
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
		<div class="km-panel-heading">权限管理</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						权限种类
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value=""> --select--</option>
							<option value="992">添加发货地址</option>
							<option value="1098">取消连动API</option>
							<option value="1113">大量数据管理</option>
							<option value="1139">购买话说展览</option>
							<option value="1160">Flier Item Mng</option>
							<option value="1094">問議連動API</option>
							<option value="1137">幸运最低价权限</option>
							<option value="1001">订购API权限</option>
							<option value="1096">商品准备日设定</option>
							<option value="1151">结算价设定</option>
							<option value="883">订货API权限</option>
							<option value="885">取消验证权限</option>
							<option value="884">现场领取使用</option>
						</select>
					</td>
					<td class="field width10p tal br">
						申请状态
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="">申请可行</option>
							<option value="S1">申请中</option>
							<option value="S2">验证</option>
							<option value="S3">拒绝</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						申请日
					</td>
					<td class="value tal">
					</td>
					<td class="field width10p tal br">
						修改日
					</td>
					<td class="value tal">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						备注
					</td>
					<td class="value tal" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
						<button onclick=";" type="button" class="km-btn km-btn-info" style="height: 28px;font-size: 12px;padding: 5px 20px;">申请</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>