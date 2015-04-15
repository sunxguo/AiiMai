<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo">基本信息</a></li>
	  <li><a href="/cms/shopHomePage">卖家主页</a></li>
	  <li><a href="/cms/shopDiscount">卖家打折特价管理</a></li>
	  <li><a href="/cms/shopCategory">商品分类</a></li>
	  <li class="active"><a href="#no">店铺信息</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
		<div class="km-panel-heading">卖家店铺信息网页设定</div>
		<div class="km-panel-body" style="padding:10px;">
			<textarea id="shopInfoEditor">
				<p>&nbsp;</p>
				<div class="g_likeShop">
				<h2>Shop Info</h2>
				<ul style="width: 590px;">
				<li>Address: (521168)  168A SIMEI LANE168A Simei Lane Singapore 521168</li>
				<li>Management staff: Cheong Zhi Rong</li>
				<li><a>Seller shop address: http://www.AiiMai.com/Thinkels</a></li>
				<li>Employees: </li>
				<li>Starting Capital: </li>
				</ul>
				<h2 class="gsm_contact">Contact</h2>
				<ul>
				<li>E-mail :kcheongn@gmail.com</li>
				<li>Phone number: +65--9685-1921</li>
				<li>available during: </li>
				<li>E-mail is always availaable and more recommended.</li>
				</ul>
				<h2 class="gsm_faq">FAQ</h2>
				<dl><dt>EX) Q1. I've put items in cart. Later, I tried to order but I couldn't because they say it's sold out. Why is it for?</dt><dd>
				<p>A.</p>
				</dd><dt>EX) Q2. Can I order by telephone or e-mail?</dt><dd>
				<p>A.</p>
				</dd><dt>EX) Q3. What am I supposed to do if item doesn't arrive?</dt><dd>
				<p>A.</p>
				</dd></dl>
				<h2 class="gsm_shipping">Shipping</h2>
				<ul>
				<li>Major Shipping company : </li>
				<li>Usual Shipping period: </li>
				<li>Shipping rate : Shipping rate can differ from item to item. Please see individual item page.</li>
				<li>if you have any question about shipping,please e-mail us.</li>
				<li><span>E-mail :</span>kcheongn@gmail.com</li>
				</ul>
				<h2 class="gsm_refund">Refund/Return</h2>
				<ul>
				<li>
				<p>If you want to get refund or return item you received,please cantact us.</p>
				<ul>
				<li><span>E-mail :</span><a>kcheongn@gmail.com</a></li>
				<li><span>Phone number: </span>+65--9685-1921</li>
				<li><span>Return address：</span>(521168)  168A SIMEI LANE168A Simei Lane Singapore 521168</li>
				</ul>
				</li>
				<li>
				<p>We don't accept the cases below:</p>
				<ul>
				<li>- ex1) over 7days from receiving item</li>
				<li>- ex2) if items are open/used or damaged</li>
				<li>- ex3) sending item without prior contact</li>
				</ul>
				</li>
				</ul>
				</div><!-- Edit By Editor -->
			</textarea>
		</div>
	</div>
	
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script>
	var shopInfoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			shopInfoEditor = K.create('#shopInfoEditor', {
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