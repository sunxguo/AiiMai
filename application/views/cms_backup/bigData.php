<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">库存管理</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						登录日
					</td>
					<td class="value width30p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						查询条件
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">所有</option>
							<option value="T">Q库存号码</option>
							<option value="C">最高组名</option>
							<option value="G">商品代码</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						开关
					</td>
					<td class="value width10p tal">
						<select style="height: 30px;">
							<option value="">所有</option>
							<option value="01001" selected="selected">使用</option>
							<option value="01002">不使用</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">卖家代码</td>
					<td class="field width6p br">库存号码</td>
					<td class="field width6p br">库存名</td>
					<td class="field width6p br">商品类目选项数</td>
					<td class="field width6p br">总数量</td>
					<td class="field width6p br">使用地点</td>
					<td class="field width6p br">BDM_Title</td>
					<td class="field width6p">登录日</td>
				  </tr>
				  <tr>
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
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					库存详情号码
				</td>
				<td class="field width20p tac br">
					卖家代码
				</td>
				<td class="field width20p tac br">
					参考商品代码
				</td>
				<td class="field width20p tac br">
					庫存名
				</td>
				<td class="field width20p tac br">
					另一支库存管理可用性
				</td>
			  </tr>
			  <tr style="border-top:1px solid #ddd;">
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value">
					<select style="height: 30px;">
						<option value="Y">是</option>
						<option value="N" selected="selected">不</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					参考商品代码
				</td>
				<td class="value tal" colspan="4">
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择</button>
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">商品选项输入/管理(*输入想要变更的库存数量/价格数字，点击按键即可)</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
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
					<td class="field width6p br">卖家Sku代码</td>
					<td class="field width6p br">库存号码</td>
					<td class="field width6p br">库存名</td>
					<td class="field width6p br">库存数量</td>
					<td class="field width6p br">价格</td>
					<td class="field width6p br">货币</td>
					<td class="field width6p br">链接商品数</td>
					<td class="field width6p">地点数量</td>
				  </tr>
				  <tr>
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
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					库存数量
				</td>
				<td class="field width20p tac br">
					价格
				</td>
				<td class="field width20p tac br">
					基准货币
				</td>
				<td class="field width20p tac br">
					卖家Sku代码
				</td>
			  </tr>
			  <tr style="border-top:1px solid #ddd;">
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value">
					<select style="height: 30px;">
						<option value="CNY">CNY</option>
						<option value="HKD">HKD</option>
						<option value="IDR">IDR</option>
						<option value="JPY">JPY</option>
						<option value="MYR">MYR</option>
						<option value="SGD">SGD</option>
						<option value="USD">USD</option>
					</select>
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					<button onclick=";" type="button" class="km-btn km-btn-info" style="height: 28px;font-size: 12px;padding: 5px 20px;">链接商品</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>