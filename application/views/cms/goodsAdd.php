<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/goodsStatistics">销售商品简要信息统计</a></li>
	  <li class="active"><a href="/cms/goodsAdd">登录新商品</a></li>
	  <li><a href="/cms/goodsCopy">复制商品登录</a></li>
	  <li><a href="/cms/goodsEdit">编辑商品信息</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">分类与商品种类</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						分类
					</td>
					<td class="value tal">
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
						<input type="text" placeholder="商品目录代码" class="km-form-control" style="width: 30%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						销售方式
					</td>
					<td class="value tal">
						<input type="radio" name="salesMode" id="salesMode1" style="vertical-align: middle;margin-right: 5px;" checked><label for="salesMode1">立刻购买商品登录（可添加竞卖商品）</label>
						<input type="radio" name="salesMode" id="salesMode2" style="vertical-align: middle;margin-right: 5px;"><label for="salesMode2">拍卖&幸运最低价</label>
						<input type="radio" name="salesMode" id="salesMode3" style="vertical-align: middle;margin-right: 5px;"><label for="salesMode3">自由格式</label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						船舶类型
					</td>
					<td class="value tal">
						<input type="radio" name="shipType" id="shipType1" style="vertical-align: middle;margin-right: 5px;" checked><label for="shipType1">一般运送（运送需要）</label>
						<input type="radio" name="shipType" id="shipType2" style="vertical-align: middle;margin-right: 5px;"><label for="shipType2">e-Ticket</label>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">e-Ticket</h3>
							  <div class="km-popover-content">
								<p>
									1. e-Ticket 商品是指?<br>
									- 一般运送不可进行销售的服务(ex. 餐饮,咖啡等)可进行网上销售的销售方式<br>
									- 客户在购买 e-Ticket之后，进入不在线的店铺时，卖家进行简单的认证程序后提供服务即可<br>
									2. e-Ticket 商品的优点<br>
									- 为了使客户访问<br>
								</p>
							  </div>
							</div>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品状态
					</td>
					<td class="value tal">
						<input type="radio" name="goodsStatus" id="goodsStatus1" style="vertical-align: middle;margin-right: 5px;" checked><label for="goodsStatus1">新商品</label>
						<input type="radio" name="goodsStatus" id="goodsStatus2" style="vertical-align: middle;margin-right: 5px;"><label for="goodsStatus2">二手商品</label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品名
					</td>
					<td class="value tal">
						<span class="km-label km-label-default"> English </span><input type="text" placeholder="Please enter the correct trade name (up to 200 words)" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br><br>
						<span class="km-label km-label-default">简体中文</span><input type="text" placeholder="请输入正确的型号名（最多200字）" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br><br>
						<span class="km-label km-label-default">繁體中文</span><input type="text" placeholder="請輸入正確的型號名（最多200字）" class="km-form-control" style="width: 80%;height: 30px;margin-left:10px;padding: 0px 5px;display: inline-block;font-size:12px;"><br>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						缩短商品名
					</td>
					<td class="value tal">
						<input type="text" placeholder="SMS和手机专用商品名（20字以内）" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						卖家代码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						(卖家代码名简称便于识别）
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品图片/图片类型
					</td>
					<td class="value tal">
						
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						原产地
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="selected">====选择=====</option>
							<option value="K">国内</option>
							<option value="F">海外</option>
							<option value="U">其它</option>
						</select>
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						成人商品？
					</td>
					<td class="value tal">
						<input type="radio" name="adult" id="adult1" style="vertical-align: middle;margin-right: 5px;" checked><label for="adult1">否</label>
						<input type="radio" name="adult" id="adult2" style="vertical-align: middle;margin-right: 5px;"><label for="adult2">是(例：成人电影，酒类等)</label>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">输入价格数量</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						销售价 (S$)
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> (结算价: <span class="km-label km-label-danger">90.00</span>)
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-496px; max-width:1000px;width:1000px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">手续费</h3>

							  <div class="km-popover-content">
								详情
							  </div>
							</div>
						</div>
					</td>
					<td class="field width10p tal br">
						商品数量
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						有效期间
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="">Select</option>  
							<option value="1">1 day</option>  
							<option value="3">3 days</option>  
							<option value="5">5 days</option>  
							<option value="7">7 days</option>  
							<option value="10">10 days</option>  
							<option value="20">20 days</option>  
							<option value="30">1 month</option>  
							<option value="60">2 months</option>  
							<option value="90">3 months</option>  
							<option value="180">6 months</option>  
							<option value="365" selected="">1 year</option>
						</select>
					</td>
					<td class="field width10p tal br">
						参考价格 (S$)
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						显示剩余有效期
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;">
							<option value="1">1 日</option>
							<option value="2">2 日</option>
							<option value="3">3 日</option>
							<option value="0" selected="selected">Not use</option>
						</select>
						当接近商品到期日时，您可以显示剩余有效期。
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						A库存管理
					</td>
					<td class="value tal" colspan="3">
						
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">运送信息登录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						发货地址
					</td>
					<td class="value tal">
						521168  168A SIMEI LANE168A Simei Lane Singapore 521168 <br>
						※发送商品国是指可运送商品的国家. 注意：请输入正确的地址.(不向买家显示发送商品地址)
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						运送费 (S$)
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-right" style="top: -443px;left: 26px; max-width:900px;width:900px;height:900px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">运送费</h3>

							  <div class="km-popover-content" style="overflow:scroll;height: 851px;">
								运费计算详情...
							  </div>
							</div>
						</div>
					</td>
					<td class="value tal">
						
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						选项运费
					</td>
					<td class="value tal">
						
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">商品详情</div>
		<div class="km-panel-body" style="padding:0px;">
			<textarea id="goodsInfoEditor" style="600px">
			</textarea>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script>
	var goodsInfoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			goodsInfoEditor = K.create('#goodsInfoEditor', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'600px',
				resizeType:0,
				imageTabIndex:1
			});
		});
	});
</script>