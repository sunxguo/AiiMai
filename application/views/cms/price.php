<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">销售商品</div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;overflow:hidden;">
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;">一周内结束商品(0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;">商品有效期为1周 (0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;">商品有效期为1个月 (0)</button>
			  <button type="button" class="km-btn km-btn-warning" style="width:25%;">库存3个以下的商品 (0)</button>
			</div>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">销售商品信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						库存状态
					</td>
					<td class="value width30p tal" colspan="2">
						<select style="height: 30px;">			 
							<option value="A">所有</option>
							<option value="Y" selected="selected">有库存</option>
							<option value="N">无库存</option>
						</select>
						<select style="height: 30px;">
							<option value="0">所有</option>
							<option value="3">3日内到期</option>
							<option value="7">7日内到期</option>
						</select>
						<select style="height: 30px;">
							<option value="0">所有</option>
							<option value="3">库存3个以下</option>
							<option value="10">库存10个以下</option>
						</select>
					</td>
					<td class="field width10p tal br">
						查询条件
					</td>
					<td class="value width30p tal" colspan="2">
						<select style="height: 30px;">
							<option value="NO" selected="selected">商品号码</option>
							<option value="NM">商品名</option>
							<option value="CD">卖家代码</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
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
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">卖家代码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">销售价</td>
					<td class="field width6p br">结算价</td>
					<td class="field width6p br">手续费</td>
					<td class="field width6p br">数量</td>
					<td class="field width6p br">运送费</td>
					<td class="field width6p br">运送费类型</td>
					<td class="field width6p">结束日</td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">关于选择的商品可延期展示时间或删除</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="value width10p tal" colspan="2">
						<select style="height: 30px;">
							<option value="" selected="selected">Select</option>
							<option value="10">10 days</option>
							<option value="20">20 days</option>
							<option value="30">1 month</option>
							<option value="60">2 month</option>
							<option value="90">3 month</option>
							<option value="180">6 month</option>
							<option value="365">1 year</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">展示期间延期</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">卖家信息删除</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">上传Excel</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p br">是否自动延长</td>
					<td class="value tal">
						销售时间到期的商品将自动设置为
						<select style="height: 30px;"><option value="N" selected="selected">延长1月</option><option value="Y">暂时断货</option></select>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">修改</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">销售价格与数量管理(为了便于修改，请点击清单)</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br">商品号码</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p br">商品名</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br">销售价 (S$)</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="field width10p br">结算价 (S$)</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<div class="km-popover-wrapper">
							<div style="display:inline-block;cursor:pointer;" onclick="$(this).next().toggle(10)">
								服务费<img src="/assets/images/cms/questionMark.png" width="14px">
							</div>
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">我的等级&分数</h3>
							  <div class="km-popover-content">
								<p>
									
								</p>
							  </div>
							</div>
						</div>
					</td>
				  </tr>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p br">库存数量</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="field width10p br">结束日</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">Select</option>
							<option value="1">1 day</option>
							<option value="3">3 days</option>
							<option value="5">5 days</option>
							<option value="7">7 days</option>
							<option value="10">10 days</option>
							<option value="20">20 days</option>
							<option value="30">1 month</option>
							<option value="60">2 month</option>
							<option value="90">3 month</option>
							<option value="180">6 month</option>
							<option value="365">1 year</option>
						</select>
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 60%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p br">全球销售</td>
					<td class="value tar" colspan="3">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">展示期间延期</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">卖家信息删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-groupBuy.js" type="text/javascript"></script>