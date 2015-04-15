<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/shopBaseInfo">基本信息</a></li>
	  <li><a href="/cms/shopHomePage">卖家主页</a></li>
	  <li><a href="/cms/shopDiscount">卖家打折特价管理</a></li>
	  <li><a href="/cms/shopCategory">商品分类</a></li>
	  <li><a href="/cms/shopInfo">店铺信息</a></li>
	</ul>
	<div id="baseInfo">
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">卖家店铺信息</div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p">卖家店铺名</td>
						<td class="value width17p tal">
							ThinKel's <a href="">去卖家店铺</a>
							<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						</td>
					  </tr>
					  <tr>
						<td class="field width10p">迷你店铺介绍及欢迎短信（移动）</td>
						<td class="value width17p tal" colspan="3">
							Welcome to ThinKel's!
							<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">卖家店铺商标管理</div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p">迷你店铺商标
							<div class="km-popover-wrapper">
								<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
								<div class="km-popover km-bottom" style="top: 25px;left:-323px; max-width:656px;">
								  <div class="km-arrow"></div>
								  <h3 class="km-popover-title">图片位置</h3>

								  <div class="km-popover-content">
									<img src="/assets/images/cms/minishop_infoLayer02.jpg">
								  </div>
								</div>
							</div>
						</td>
						<td class="value width17p br">
							<img src="/assets/temp/shopicon.png" width="108" height="86">
						</td>
						<td class="value width5p br">
							大小 108*86
						</td>
						<td class="value width10p br">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;">上传新图片</button>
						</td>
						<td class="value width10p">
							<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;">删除</button>
						</td>
					  </tr>
					  <tr>
						<td class="field width10p">迷你店铺小商标
							<div class="km-popover-wrapper">
								<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
								<div class="km-popover km-bottom" style="top: 25px;left:-323px; max-width:656px;">
								  <div class="km-arrow"></div>
								  <h3 class="km-popover-title">图片位置</h3>

								  <div class="km-popover-content">
									<img src="/assets/images/cms/minishop_infoLayer03.jpg">
								  </div>
								</div>
							</div>
						</td>
						<td class="value width17p br">
							<img src="/assets/temp/shopiconmini.png" width="57" height="15">
						</td>
						<td class="value width5p br">
							大小 57x15
						</td>
						<td class="value width10p br">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 10px;">上传新图片</button>
						</td>
						<td class="value width10p">
							<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;">删除</button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">迷你店铺及Astore 地址管理</div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p">*卖家店铺地址</td>
						<td class="value width17p tal">
							http://www.aiimai.com/shop/<input value="Thinkels" type="text" class="km-form-control" id="customer_view_fax_number" style="width: 25%;height: 20px;padding: 0 5px;display: inline-block;font-size:10px;"><a href="http://www.aiimai.com/shop/Thinkels">   访问</a>
							<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">保存修改</button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">A联盟项目</div>
			<div class="km-panel-body" style="padding:0px;">
				<table class="km-table">
					<tbody>
					  <tr>
						<td class="field width10p">A联盟项目</td>
						<td class="value width17p tal">
							卖家也可以成为A联盟项目会员。<br>
							A联盟项目是通过在博客，网页，社交网站上投放广告或者共享等方式获得收益。<br>
							AiiMai的店铺链接或者商品链接共享在博客，脸书等。<br>
							若通过共享的链接形成的订单，将会获得订单价格的2%的报酬。<br><br>
							<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">同意Q联盟项目使用条款并<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;">免费加入</button>
						</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>