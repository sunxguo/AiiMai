<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li><a href="/cms/shopHomePage"><?php echo lang('cms_grade_shop_Main');?></a></li>
	  <li><a href="/cms/shopDiscount"><?php echo lang('cms_grade_shop_FeaturedEvent');?></a></li>
	  <li><a href="/cms/shopCategory"><?php echo lang('cms_grade_shop_Category');?></a></li>
	  <li class="active"><a href="#no"><?php echo lang('cms_grade_shop_ShopInformation');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
		<div class="km-panel-heading">Shop Info</div>
		<div class="km-panel-body" style="padding:10px;">
			<textarea id="shopInfoEditor">
				<?php echo $merchant->merchant_shop_info;?>
			</textarea>
			<button onclick="saveShopInfo()" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;margin-top:20px;">Save</button>
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
				imageTabIndex:1,
				langType : '<?php echo $_SESSION['language']=="english"?'en':'zh_CN';?>'
			});
		});
	});
</script>