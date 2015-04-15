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
	  <li class="active"><a href="#no">商品分类</a></li>
	  <li><a href="/cms/shopInfo">店铺信息</a></li>
	</ul>
	<div id="baseInfo">
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">A．分类构成选项</div>
			<div class="km-panel-body" style="padding:10px;">
				<input type="radio" name="category" style="vertical-align: middle;margin-right: 5px;" checked> AiiMai商品分类
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="category" style="vertical-align: middle;margin-right: 5px;"> 编辑分类
				<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">保存</button>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">B. 类别结构选项</div>
			<div class="km-panel-body" style="padding:10px;">
				<select style="height: 30px;">
					<option value="main">总分类 – 大分类</option>
					<option value="sub">总分类 – 中分类</option>
				</select>
				若更改总分类，将应用于总分类 – 大分类和总分类 – 中分类的结构。
				<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">保存</button>
			</div>
		</div>
		
		<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
			<div class="km-panel-heading">C. 编辑分类</div>
			<div class="km-panel-body" style="padding:10px;">
				<div>
					<div class="fl width40p">
						<h3 style="line-height:20px;">总分类</h3>
						<div>
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10">
						  <a href="#no" class="km-list-group-item active">Women's Fashion</a>
						  <a href="#no" class="km-list-group-item">Beauty & Diet</a>
						  <a href="#no" class="km-list-group-item">Men & Sports</a>
						  <a href="#no" class="km-list-group-item">Digital & Mobile</a>
						  <a href="#no" class="km-list-group-item">Home & Living</a>
						  <a href="#no" class="km-list-group-item">Baby & Food</a>
						  <a href="#no" class="km-list-group-item">Deal & Entertain</a>
						</div>
					</div>
					<div class="fl" style="margin:150px 10px;">
						<img src="/assets/images/cms/icon-to.png">
					</div>
					<div class="fl width40p">
						<h3 style="line-height:20px;">大分类</h3>
						<div>
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10">
						  <a href="#no" class="km-list-group-item active">Women's Fashion</a>
						  <a href="#no" class="km-list-group-item">Beauty & Diet</a>
						  <a href="#no" class="km-list-group-item">Men & Sports</a>
						  <a href="#no" class="km-list-group-item">Digital & Mobile</a>
						  <a href="#no" class="km-list-group-item">Home & Living</a>
						  <a href="#no" class="km-list-group-item">Baby & Food</a>
						  <a href="#no" class="km-list-group-item">Deal & Entertain</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>