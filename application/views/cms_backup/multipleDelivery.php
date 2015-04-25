<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/inventory">库存登录/编辑</a></li>
	  <li><a href="/cms/subbranchStock">分店入库/出库管理</a></li>
	  <li class="active"><a href="/cms/multipleDelivery">多重发货地点配送分配</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">发货地点分配优先级</div>
		<div class="km-panel-body" style="padding:0px;overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">发货地点分配编码</td>
					<td class="field width6p br">类型</td>
					<td class="field width6p">发货地点分配规则名称</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="field width20p tal br">
						发货地点分配规则名称
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br bl1">
						优先级类型
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="90001">固定优先顺序</option>
						</select>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">分店代码</td>
					<td class="field width6p br">分点名</td>
					<td class="field width6p">优先顺序</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="value tar" colspan="5">
					    <p class="fl tal">
							※请输入发货地点的配送优先级 <br>
							(若最高优先级的发货地点库存不足时，将安排下一优先级的地点进行配送) 
						</p>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">批量更改发货地点分配规则</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p tal br">
						发货地点分配规则名称
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">请选择</option>
						</select>
					</td>
					<td class="field tal br">
						<select style="height: 30px;">
							<option value="it">商品目录</option>
							<option value="ic">商品目录号码</option>
							<option value="sc">卖家商品代码</option>
							<option value="oi">商品原代碼</option>
							<option value="li">链接商品代码</option>
						</select>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
					<td class="field width1p br tac"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">卖家商品代码</td>
					<td class="field width6p br">库存号码</td>
					<td class="field width6p br">库存名</td>
					<td class="field width6p">发货地点分配规则名称</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					一起变更
				</td>
				<td class="value tal">
					<select style="height: 30px;">
						<option value="">请选择</option>
					</select>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">修改</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>