<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="clearfix" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">订购国家选择</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						运送状态
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="">== All ==</option>
							<option value="CN">China</option>
							<option value="HK">Hongkong</option>
							<option value="ID">Indonesia</option>
							<option value="JP">Japan</option>
							<option value="MY">Malaysia</option>
							<option value="SG">Singapore</option>
							<option value="US">Global</option>
						</select>
					</td>
					<td class="value tal">
						* 选择‘所有’时, 以GMT+9小时(东京/首尔)为基准所查询的时间,<br>
						与订购商品所在国家的时间相比会有所不同.
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">基本查询设定</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">运送商品说明</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						运送状态
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="ALL">所有</option>
							<option value="REQW">订购处理中</option>
							<option value="REQN" selected="selected">新订购</option>
							<option value="REQY">运送准备</option>
							<option value="DELAY">运送延期</option>
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
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">卖家商品号码</td>
					<td class="field width6p br">运送状态</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">选项信息</td>
					<td class="field width6p br">选项代码</td>
					<td class="field width6p br">数量</td>
					<td class="field width6p">订购件数</td>
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
	</div>
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="javascript:void();">买家已付款（摘要查看）</a></li>
	  <li><a href="javascript:void();">买家已付款（详情查看）</a></li>
	  <li><a href="javascript:void();">运送中/交易完成</a></li>
	</ul>
	<table class="km-table bb2 bt2 mt10">
		<tbody>
		  <tr>
			<td class="value width10p br">
				订购处理中 <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				新订购 <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				运送准备 <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				运送延期 <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				取消要求/取消中（最近2周） <a href="#no">0</a>
			</td>
		  </tr>
		</tbody>
	</table>
	<table class="km-table bb2 bt2">
		<tbody>
		  <tr>
			<td class="value br">
				运送方式 <a href="#no">0</a>
			</td>
			<td class="value br">
				一般运送（追踪-X） <a href="#no">0</a>
			</td>
			<td class="value br">
				一般运送（追踪-O） <a href="#no">0</a>
			</td>
			<td class="value br">
				特送(DHL，EMS，Fedex 等) <a href="#no">0</a>
			</td>
			<td class="value br">
				<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
			</td>
		  </tr>
		</tbody>
	</table>
	<div style="overflow:auto;">
		<table class="km-table bb2" style="overflow:scroll;width:100%;">
			<tbody>
			  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
				<td class="field width6p br">选择</td>
				<td class="field width6p br">运送状态</td>
				<td class="field width6p br">订购号码</td>
				<td class="field width6p br">购物车号码</td>
				<td class="field width6p br">运送公司</td>
				<td class="field width6p br">运单号码</td>
				<td class="field width6p br">发货日</td>
				<td class="field width6p br">发货预定日</td>
				<td class="field width6p br">商品名</td>
				<td class="field width6p br">数量</td>
				<td class="field width6p br">选项信息</td>
				<td class="field width6p br">选项代码</td>
				<td class="field width6p br">收取人名</td>
				<td class="field width6p br">卖家商品号码</td>
				<td class="field width6p">订购国家</td>
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
				<td class="value br"></td>
				<td class="value br"></td>
				<td class="value br"></td>
				<td class="value"></td>
			  </tr>
			</tbody>
		</table>
	</div>
	<table class="km-table bb2 bt2">
		<tbody>
		  <tr>
			<td class="value br" rowspan="2">
				<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">所有选择</button>
			</td>
			<td class="field br">
				查询/处理
			</td>
			<td class="value tal br">
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">下载所有订单</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">下载选择订单</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">运送方式更改</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">运送费查询</button>
			</td>
		  </tr>
		  <tr>
			<td class="field br">
				打印
			</td>
			<td class="value tal br">
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">地址打印</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">打印交货单</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">订货单打印</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">打印条形码标签</button>
			</td>
		  </tr>
		</tbody>
	</table>
	<div class="km-panel km-panel-primary mt10 fl" style="width: 48%;">
		<div class="km-panel-heading">订购信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						订购号码
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field width15p tal br">
						运送状态
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						数量
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field tal br">
						赠品
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						运送方式
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						订购国家
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field tal br">
						付款方法
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						商品代码/商品名
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						选项信息
					</td>
					<td class="value tal br" colspan="3">
						选项代码<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10 fr" style="width: 48%;">
		<div class="km-panel-heading">运送信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						收取人名/电话号码
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						运送地址
					</td>
					<td class="value tal br">
						国家<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 20%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
						邮政编码<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 20%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 90%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						买家已付款要求
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						运送公司
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						希望运送时间
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>