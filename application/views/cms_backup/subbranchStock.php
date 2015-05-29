<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/inventory">库存登录/编辑</a></li>
	  <li class="active"><a href="/cms/subbranchStock">分店入库/出库管理</a></li>
	  <li><a href="/cms/multipleDelivery">多重发货地点配送分配</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">库存目录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						查询条件
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">== 所有 ==</option>
							<option value="S">卖家商品目录代码</option>
							<option value="O">商品类目选项名</option>
							<option value="I">商品目录</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						分店
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">==Select==</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
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
					<td class="field width6p br">卖家商品目录代码</td>
					<td class="field width6p br">商品类目选项名</td>
					<td class="field width6p br">商品目录</td>
					<td class="field width6p br">库存数量</td>
					<td class="field width6p br">价格</td>
					<td class="field width6p br">通货</td>
					<td class="field width6p br">商品目录代号</td>
					<td class="field width6p br">商品目录号码</td>
					<td class="field width6p">分店</td>
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
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">物流地点的入库/出库信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						商品类目选项
					</td>
					<td class="value tal" colspan="7">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="R" selected="selected">要求日期</option>
							<option value="C">完成日</option>
						</select>
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						要求类型
					</td>
					<td class="value width10p tal">
						<select style="height: 30px;">
							<option value="">== 所有 ==</option>
							<option value="80001">入库</option>
							<option value="80002">出库</option>
						</select>
					</td>
					<td class="field width10p tal br">
						现状
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="">== 所有 ==</option>
							<option value="02005">处理等待</option>
							<option value="02004">Cancelled</option>
							<option value="02002">验证</option>
						</select>
					</td>
					<td class="field width10p tal br">
						分店
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="">==Select==</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="8">
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
					<td class="field width6p br">卖家商品目录代码</td>
					<td class="field width6p br">商品类目选项名</td>
					<td class="field width6p br">要求类型</td>
					<td class="field width6p br">总数量</td>
					<td class="field width6p br">分店</td>
					<td class="field width6p br">要求理由</td>
					<td class="field width6p br">要求状态</td>
					<td class="field width6p br">购物车号码</td>
					<td class="field width6p br">说明</td>
					<td class="field width6p br">完成日</td>
					<td class="field width6p br">完成日</td>
					<td class="field width6p br">分店代码</td>
					<td class="field width6p br">商品目录代号</td>
					<td class="field width6p">入库/出库号码</td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					入库/出库号码
				</td>
				<td class="value br">
					<input type="text" class="km-form-control km-input-disabled" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
				</td>
				<td class="field width20p tac br">
					卖家商品目录代码
				</td>
				<td class="value br">
					<input type="text" class="km-form-control km-input-disabled" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
				</td>
			  </tr>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					库存信息
				</td>
				<td class="value br" colspan="3">
					<input type="text" class="km-form-control km-input-disabled" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 10%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
				</td>
			  </tr>
			  <tr>
				<td class="field width20p tac br">
					要求类型
				</td>
				<td class="value br">
					<select style="height: 30px;">
						<option value="">== 所有 ==</option>
						<option value="80001">入库</option>
						<option value="80002">出库</option>
						<option value="79002">地点间移动</option>
					</select>
				</td>
				<td class="field width20p tac br">
					处理数量
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					分店
				</td>
				<td class="value tal" colspan="3">
					<select style="height: 30px;">
						<option value="">==Select==</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					要求状态
				</td>
				<td class="value tal" colspan="3">
					<select style="height: 30px;">
						<option value="">== 所有 ==</option>
						<option value="02005">入库/出库要求</option>
						<option value="02004">Cancelled</option>
						<option value="02002">验证</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					说明
				</td>
				<td class="value tal" colspan="3">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">入库/出库要求</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">入库/出库取消</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>