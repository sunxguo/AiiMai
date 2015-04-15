<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="GD_NO">商品代码</option>
							<option value="GD_CD">卖家代码</option>
						</select>
					</td>
					<td class="value width20p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						选项代码
					</td>
					<td class="value width20p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">下载所有商品CSV</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">卖家代码</td>
					<td class="field width6p br">Data Type</td>
					<td class="field width6p br">选项1</td>
					<td class="field width6p br">详情1</td>
					<td class="field width6p br">选项2</td>
					<td class="field width6p br">详情2</td>
					<td class="field width6p br">选项3</td>
					<td class="field width6p br">详情3</td>
					<td class="field width6p br">价格</td>
					<td class="field width6p br">数量</td>
					<td class="field width6p">选项代码</td>
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
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="field width10p tal br">
						上传库存选项文件
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="A">AiiMai</option>
						</select>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">选择文件</button>
					</td>
					<td class="field width10p tal br bl1" rowspan="2">
						选项保存Type
					</td>
					<td class="value width20p tal" rowspan="2">
						<input type="radio" name="saveType" id="saveType1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="saveType1">Default (Next Engine)</label><br>
						<input type="radio" name="saveType" id="saveType2" style="vertical-align: middle;margin-right: 5px;">
						<label for="saveType2">SAVAWAY,CROSSMall Type (选项代码 = 卖家代码 + 详细1 + 详细2)</label>
					</td>
				  </tr>
				  <tr class="bt2">
					<td class="field tal br">
						Excel数据输入
					</td>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">确认有效性</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">保存</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save Correct Data Only</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>