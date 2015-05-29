<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/sellersCooperationProjects">卖家合作项目</a></li>
	  <li><a href="/cms/affiliate">Affiliate结算</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">店铺基本合伙程序</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value width80p tal br">
						Q管理者通过购物杂谈和卖家企划展推广卖家商品Q。将通过Q管理者订购的订单金额的 
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40px;height: 30px;padding: 0 5px;display: inline-block;">
						<select style="height: 30px;">
							<option value="R">%</option>
							<option value="M">S$</option>
						</select>
						为手续费。 设定合作手续费之后请Q管理者推广商品吧！（最多为每个订单10％，S$100.00）
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">保存</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">合伙订购记录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						交易完成日
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="AFFILIATE_FEE_SEQNO">程序代码</option>
							<option value="GD_NO">商品代码</option>
							<option value="CONTR_NO">订购号码</option>
						</select>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
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
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">购物筐号码</td>
					<td class="field width6p br">订购号码</td>
					<td class="field width6p br">商品代码</td>
					<td class="field width6p br">付款金额</td>
					<td class="field width6p br">手续费类型</td>
					<td class="field width6p br">手续费</td>
					<td class="field width6p br">金额</td>
					<td class="field width6p br">交易完成日</td>
					<td class="field width6p br">文章号码</td>
					<td class="field width6p br">专题号码</td>
					<td class="field width6p br">链接</td>
					<td class="field width6p">程序代码</td>
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
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>