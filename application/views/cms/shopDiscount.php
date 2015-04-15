<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo">基本信息</a></li>
	  <li><a href="/cms/shopHomePage">卖家主页</a></li>
	  <li class="active"><a href="#no">卖家打折特价管理</a></li>
	  <li><a href="/cms/shopCategory">商品分类</a></li>
	  <li><a href="/cms/shopInfo">店铺信息</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">购物杂谈信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width6p">掲载期间</td>
					<td class="value width30p">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width5p">分类</td>
					<td class="value width17p">
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
					</td>
					<td class="field width8p">对象顾客组</td>
					<td class="value width10p">
						<select style="height: 30px;">
							<option selected="selected" value="-1">所有</option>
							<option value="1">Women's</option>
							<option value="2">Fashion</option>
							<option value="3">Men's</option>
							<option value="4">Beauty</option>
							<option value="5">Mobile</option>
							<option value="6">Home Appliances</option>
							<option value="7">Living</option>
							<option value="8">Kids/baby</option>
							<option value="9">Food</option>
							<option value="10">Entertainment</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field">商家企划号(SID)</td>
					<td class="value">
						<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field">标题</td>
					<td class="value ">
						<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field">开/关</td>
					<td class="value">
						<select style="height: 30px;">
							<option value="">所有</option>
							<option value="Y">是</option>
							<option value="N">关</option>
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
			<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">商家企划号(SID)</td>
					<td class="field width6p br">标题</td>
					<td class="field width6p br">开/关</td>
					<td class="field width6p br">Starting Date</td>
					<td class="field width6p br">Closing Date</td>
					<td class="field width6p br">分类</td>
					<td class="field width6p br">对象顾客组</td>
					<td class="field width6p br">MiniShop Display</td>
					<td class="field width6p br">Shopping Talk</td>
					<td class="field width6p br">Shopping Talk Display</td>
					<td class="field width6p br">保存商品目录</td>
					<td class="field width6p">修改日</td>
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
				  </tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">家企划信息 - 1 基本信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width5p">标题*</td>
					<td class="value width17p">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 95%;height: 30px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field width5p">分类*</td>
					<td class="value width17p">
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
					</td>
					<td class="field width5p">分类*</td>
					<td class="value width5p">
						<select style="height: 30px;">
							<option selected="selected" value="-1">所有</option>
							<option value="1">Women's</option>
							<option value="2">Fashion</option>
							<option value="3">Men's</option>
							<option value="4">Beauty</option>
							<option value="5">Mobile</option>
							<option value="6">Home Appliances</option>
							<option value="7">Living</option>
							<option value="8">Kids/baby</option>
							<option value="9">Food</option>
							<option value="10">Entertainment</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width5p">说明*</td>
					<td class="value width10p" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 95%;height: 30px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field width5p">开/关</td>
					<td class="value width5p">
						<select style="height: 30px;">
							<option value="Y" selected="selected">是</option>
							<option value="N">关</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width5p">URL(PC)</td>
					<td class="value width10p">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;font-size:10px;"> <a href="" target="_blank">Go</a>
					</td>
					<td class="field width10p">URL(Mobile)</td>
					<td class="value width10p" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 30px;padding: 0 5px;display: inline-block;font-size:10px;"> <a href="" target="_blank">Go</a>
					</td>
				  </tr>
				  <tr>
					<td class="field width6p">掲载期间</td>
					<td class="value width30p">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width6p">在商品详细左侧显示企划</td>
					<td class="value width30p tal" colspan="3">
						<select style="height: 30px;">
							<option value="N">否</option>
							<option value="Y">是</option>
						</select>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-286px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">显示位置</h3>

							  <div class="km-popover-content">
								<img src="/assets/images/cms/img_sellerspecialmgt.jpg">
							  </div>
							</div>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width6p">* 网上标题广告图片(610 X 280 max 100kb)</td>
					<td class="value" colspan="3">
						<div class="km-upload-img" style="width: 321px;">
							<img src="/assets/images/home/login-ad.jpg" width="321px" height="150">
							<p style="line-height: 150px;">上传图片</p>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width6p">* 网上标题广告图片(740 X 300 max 110kb)</td>
					<td class="value" colspan="2">
						<div class="km-upload-img" style="width: 370px;">
							<img src="" width="370" height="150">
							<p style="line-height: 150px;">上传图片</p>
						</div>
					</td>
					<td class="field width6p">* 缩略图像 (45 X 45 max 20kb)</td>
					<td class="value" colspan="2">
						<div class="km-upload-img" style="width: 150px;">
							<img src="" width="150" height="150">
							<p style="line-height: 150px;">上传图片</p>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="value" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 10px;">初始化</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">保存</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
		<div class="km-panel-heading">商家企划信息 - 2 页面上段HTML</div>
		<div class="km-panel-body" style="padding:5px;">
			<textarea id="layoutHtmlEditor"></textarea>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">A-Special Info - 3 购物杂谈信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width17p">Display Slideshow</td>
					<td class="value" colspan="5">
						<select style="height: 30px;">
							<option value="Y">是</option>
							<option value="N">否</option>
						</select>
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">
						Connect to ShoppingTalk (When checked, the images in the post of ShoppingTalk will be displayed in SlideShow)
					</td>
				  </tr>
				  <tr>
					<td class="field width17p">使用购物杂谈</td>
					<td class="value">
						<select style="height: 30px;">
							<option value="Y">是</option>
							<option value="N">否</option>
						</select>
					</td>
					<td class="field width17p">购物杂谈显示格式</td>
					<td class="value">
						<select style="height: 30px;">
							<option value="T">画廊式</option>
							<option value="L">目录格式</option>
						</select>
					</td>
					<td class="field width17p">展示位置</td>
					<td class="value">
						<select style="height: 30px;">
							<option value="B">页面下端</option>
							<option value="T">在页面上段显示HTML</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">保存</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">购物杂谈信息</div>
			<div class="km-panel-body" style="padding:0px;">
				<div style="overflow:auto;">
				<table class="km-table" style="overflow:scroll;width:150%;">
					<tbody>
					  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
						<td class="field width6p br">优先顺序</td>
						<td class="field width6p br">手机优先顺序</td>
						<td class="field width6p br">副题</td>
						<td class="field width6p br">标题</td>
						<td class="field width6p br">类型</td>
						<td class="field width6p br">商品</td>
						<td class="field width6p br">移动设备商品数</td>
						<td class="field width6p br">使用web与否</td>
						<td class="field width6p br">使用移动设备与否</td>
						<td class="field width6p br">使用webHtml与否</td>
						<td class="field width6p br">使用移动设备Html与否</td>
						<td class="field width6p">生成日</td>
						<td class="field width6p">修改日</td>
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
					  </tr>
					</tbody>
				</table>
				</div>
				<table class="km-table">
					<tbody>
					  <tr class="bt2 mt10">
						<td class="field width10p">标题</td>
						<td class="value">
							
						</td>
						<td class="field width10p">开/关</td>
						<td class="value">
							<select style="height: 30px;">
								<option value="Y">是</option>
								<option value="N">否</option>
							</select>
						</td>
						<td class="field width17p">使用移动设备与否</td>
						<td class="value">
							<select style="height: 30px;">
								<option value="Y">是</option>
								<option value="N">否</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td class="field width17p">类型</td>
						<td class="value">
							<select style="height: 30px;">
								<option value="J5" selected="">Display 5 Items (new)</option>
								<option value="J5" selected="">Display 5 Items (new)</option>
								<option value="J4">Display 4 Items (new)</option>
								<option value="J3">Display 3 Items (new)</option>
								<option value="J14">Display 1+4 Items (new)</option>
								<option value="LP">Lucky Price Template</option>
								<option value="MI">Sale Items (timesale + daily deal)</option>
							</select>
						</td>
						<td class="field width17p">优先顺序</td>
						<td class="value">
							<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
						<td class="field width17p">手机优先顺序</td>
						<td class="value">
							<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
					  </tr>
					  <tr>
						<td class="field">副题内最多显示商品数</td>
						<td class="value">
							<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
						<td class="field" colspan="2">在移动设备副题内最多显示商品数</td>
						<td class="value" colspan="2">
							<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
					  </tr>
					  <tr>
						<td class="value" colspan="6">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">保存</button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script>
	var layoutHtmlEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			layoutHtmlEditor = K.create('#layoutHtmlEditor', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'300px',
				resizeType:0,
				imageTabIndex:1
			});
		});
	});
</script>