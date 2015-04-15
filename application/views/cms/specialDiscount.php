<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">特殊折扣管理</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						优惠日期
					</td>
					<td class="value tal br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						优惠类型
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="TD">限時優惠</option>
							<option value="PD">今日促銷優惠</option>
							<option value="FW">店铺位粉丝打折</option>
							<option value="MQ">Q豆机会</option>
						</select>
					</td>
					<td class="value" rowspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">搜索</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						状态
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="S2">有效</option>
							<option value="S3">結束</option>
						</select>
					</td>
					<td class="field width10p tal br">
						搜索
					</td>
					<td class="value width30p tal br">
						<select style="height: 30px;" id="stock">
							<option value="">選擇</option>
							<option value="GD_NO">商品代碼</option>
							<option value="GD_NM">商品名</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">类型</td>
					<td class="field width6p br">商品号码</td>
					<td class="field width15p tac br">商品名</td>
					<td class="field width6p br">个</td>
					<td class="field width6p br">价格</td>
					<td class="field width6p br">优惠价格</td>
					<td class="field width6p br">购买数量限制</td>
					<td class="field width6p br">优惠日期</td>
					<td class="field width6p">时间区域</td>
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
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>