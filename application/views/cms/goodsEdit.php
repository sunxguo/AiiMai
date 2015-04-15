<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/goodsStatistics">销售商品简要信息统计</a></li>
	  <li><a href="/cms/goodsAdd">登录新商品</a></li>
	  <li><a href="/cms/goodsCopy">复制商品登录</a></li>
	  <li class="active"><a href="/cms/goodsEdit">编辑商品信息</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">商品查询</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						分类
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;">
							<option value="">== 商品总分类 ==</option>
							<optgroup label="女装&amp;时尚">
							<option value="100000001">Women’s Clothing</option>
							<option value="100000042">Underwear &amp; Socks</option>
							<option value="100000003">Bag &amp; Wallet</option>
							<option value="100000043">Shoes</option>
							<option value="100000004">Watch &amp; Jewelry</option>
							<option value="100000005">Fashion Accessories</option>
							</optgroup>
							<optgroup label="美容&amp;减肥">
							<option value="100000006">Cosmetics</option>
							<option value="100000044">Perfume &amp; Luxury Beauty</option>
							<option value="100000007">Hair, Body &amp; Nail</option>
							<option value="100000045">Diet &amp; Tools</option>
							</optgroup>
							<optgroup label="男装&amp;运动">
							<option value="100000002">Men’s Clothing</option>
							<option value="100000046">Bags, Shoes &amp; Accessories</option>
							<option value="100000008">Athletic &amp; Outdoor Clothing</option>
							<option value="100000047">Sports Equipment</option>
							</optgroup>
							<optgroup label="家电&amp;移动电话">
							<option value="100000014">Smartphone &amp; Tablet</option>
							<option value="100000012">Home Electronics</option>
							<option value="100000011">TV, Camera &amp; Audio</option>
							<option value="100000010">Computer &amp; Game</option>
							</optgroup>
							<optgroup label="生活&amp;家居用品">
							<option value="100000048">Kitchen &amp; Dining</option>
							<option value="100000017">Furniture &amp; Deco</option>
							<option value="100000018">Bedding &amp; Rugs &amp; Household</option>
							<option value="100000040">Pet Supplies</option>
							<option value="100000041">Stationery &amp; Supplies</option>
							<option value="100000049">Tools &amp; Gardening</option>
							<option value="100000009">Automotive &amp; Industry</option>
							</optgroup>
							<optgroup label="幼儿&amp;食品">
							<option value="100000015">Baby &amp; Maternity</option>
							<option value="100000016">Kids Fashion</option>
							<option value="100000050">Toys</option>
							<option value="100000020">Groceries</option>
							<option value="100000021">Drinks &amp; Sweets</option>
							<option value="100000023">Nutritious Items</option>
							</optgroup>
							<optgroup label="休闲">
							<option value="100000035">Dining, Spa &amp; Services</option>
							<option value="100000038">Leisure &amp; Travel</option>
							<option value="100000024">Collectibles &amp; Books</option>
							<option value="100000031">CD &amp; DVD</option>
							<option value="100000036">Hotel</option>
							<option value="100000052">Q-Flier</option>
							</optgroup>
						</select>
						<select style="height: 30px;">
							<option value="">== 中分类选择 ==</option>
						</select>
						<select style="height: 30px;">
							<option value="">== 小分类选择 ==</option>
						</select>
					</td>
					<td class="field width10p tal br">
						交易状态
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="S0">未经确认</option>
							<option value="S1">交易等待</option>
							<option value="S2" selected="selected">交易可能</option>
							<option value="S4">交易删除</option>
							<option value="S3">交易中止</option>
							<option value="S5">限制商品</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="0">登录日</option>
							<option value="1">修改日</option>
						</select>
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						销售方式
					</td>
					<td class="value width17p tal">
						<select style="height: 30px;" onchange="if($(this).val()=='T6') $('#stock').show();else $('#stock').hide();">
							<option value="T6" selected="selected">公开销售</option>
							<option value="T2">拍卖</option>
							<option value="T5">自由格式</option>
							<option value="T9">预定/票</option>
						</select>
						<select style="height: 30px;" id="stock">
							<option value="" selected="selected">所有</option>
							<option value="Y">有库存</option>
							<option value="N">无库存</option>
						</select>
					</td>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="1">商品号码</option>
							<option value="2">商品名</option>
							<option value="3">卖家代码</option>
							<option value="5">全球商品号码</option>
						</select>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
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
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">卖家代码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">销售价</td>
					<td class="field width6p br">结算价</td>
					<td class="field width6p br">数量</td>
					<td class="field width6p br">高级展示</td>
					<td class="field width6p br">状态</td>
					<td class="field width6p br">全球销售</td>
					<td class="field width6p br">销售类型</td>
					<td class="field width6p br">大商品分类</td>
					<td class="field width6p br">中分类</td>
					<td class="field width6p br">小分类</td>
					<td class="field width6p br">货到付款 Y/N</td>
					<td class="field width6p br">交易市场</td>
					<td class="field width6p br">库存管理号码</td>
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