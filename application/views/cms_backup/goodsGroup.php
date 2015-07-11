<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">
			套购买组    - 这件商品能够以附加选项的形式进行设定,然后使之与其它商品一起被购买.
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -305px;width: 620px; max-width:656px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title">套购买选项</h3>
				  <div class="km-popover-content">
					<p><img src="/assets/images/cms/plus_group_option.jpg"></p>
				  </div>
				</div>
			</div>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p tac br">
						登录日
					</td>
					<td class="field width10p tac br">
						套组类型
					</td>
					<td class="field width10p tac br">
						是否现在进行
					</td>
					<td class="field width20p tac br">
						详情查询
					</td>
				  </tr>
				  <tr>
					<td class="value tac br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">所有</option>
							<option value="IT">迷你店铺商品组优惠</option>
							<option value="MN">卖家店铺(全部商品)</option>
						</select>
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">所有</option>
							<option value="Y">Y</option>
							<option value="N">N</option>
						</select>
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">所有</option>
							<option value="NM">套购买组名</option>
							<option value="GC">商品号码</option>
							<option value="SC">卖家代码</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 50%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
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
			<table class="km-table bb2" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br">选择</td>
					<td class="field width6p br">组代码</td>
					<td class="field width6p br">套购买组名</td>
					<td class="field width6p br">组类型</td>
					<td class="field width6p br">商品数</td>
					<td class="field width6p br">优惠设定</td>
					<td class="field width6p br">优惠适用</td>
					<td class="field width6p br">开始日</td>
					<td class="field width6p br">结束日</td>
					<td class="field width6p br">登录日</td>
					<td class="field width6p">修改日</td>
				  </tr>
				  <tr>
					<td class="value br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
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
				  <tr>
					<td class="field width10p tal br">
						组名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 30px;padding: 0 5px;display: inline-block;" disabled>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						打折种类
					</td>
					<td class="value tal">
						<input type="radio" name="discountType" id="discountType1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="discountType1">迷你店铺商品组优惠</label>
						<input type="radio" name="discountType" id="discountType2" style="vertical-align: middle;margin-right: 5px;">
						<label for="discountType2">卖家店铺(全部商品)</label><br>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						优惠期间
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						优惠设定
					</td>
					<td class="value tal">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						组商品
					</td>
					<td class="value tal">
						※这些商品将以附加选项的形式显示在商品网页.
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">登录多个商品</button>
						<div style="overflow:auto;">
							<table class="km-table bb2" style="overflow:scroll;width:100%;">
								<tbody>
								  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
									<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
									<td class="field width6p br">商品号码</td>
									<td class="field width6p br">商品名</td>
									<td class="field width6p br">卖家代码</td>
									<td class="field width6p br">价格</td>
									<td class="field width6p br">数量</td>
									<td class="field width6p br">基本运送费</td>
									<td class="field width6p">运费代码</td>
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
							  <tr>
								<td class="field width10p tal br">
									选择的商品
								</td>
								<td class="value tal">
									<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 30px;padding: 0 5px;display: inline-block;" disabled>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 30px;padding: 0 5px;display: inline-block;">
									<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align:top;">查询</button>
									<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;vertical-align:top;">附加</button>
									<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;vertical-align:top;">删除</button>
								</td>
							  </tr>
							  <tr class="bb2">
								<td class="field width10p tal br">
									列表类型
								</td>
								<td class="value tal">
									<input type="radio" name="listType" id="listType1" style="vertical-align: middle;margin-right: 5px;" checked>
									<label for="listType1">顺序顺序</label>
									<input type="radio" name="listType" id="listType2" style="vertical-align: middle;margin-right: 5px;">
									<label for="listType2">选项价格顺序</label>
								</td>
							  </tr>
							</tbody>
						</table>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
						<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 10px;">初始化</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>