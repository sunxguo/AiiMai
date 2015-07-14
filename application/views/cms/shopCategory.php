<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/shopBaseInfo"><?php echo lang('cms_grade_shop_BasicInfo');?></a></li>
	  <li><a href="/cms/shopHomePage">Shop Front</a></li>
	  <li><a href="/cms/shopDiscount"><?php echo lang('cms_grade_shop_FeaturedEvent');?></a></li>
	  <li class="active"><a href="#no"><?php echo lang('cms_grade_shop_Category');?></a></li>
	  <li><a href="/cms/shopInfo"><?php echo lang('cms_grade_shop_ShopInformation');?></a></li>
	</ul>
	<div id="baseInfo">
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">A．<?php echo lang('cms_baseInfo_shop_shopCategory_SelectCategoryFormat');?></div>
			<div class="km-panel-body" style="padding:10px;">
				<input type="radio" name="category" style="vertical-align: middle;margin-right: 5px;" checked> <?php echo lang('cms_baseInfo_shop_shopCategory_AiiMaiCategory');?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="category" style="vertical-align: middle;margin-right: 5px;"> <?php echo lang('cms_baseInfo_shop_shopCategory_CustomizedCategory');?>
				<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 25px;font-size: 12px;padding: 0px 10px;"><?php echo lang('cms_common_save');?></button>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">B. <?php echo lang('cms_baseInfo_shop_shopCategory_SelectCategoryTarget');?></div>
			<div class="km-panel-body" style="padding:10px;">
				<select style="height: 30px;">
					<option value="main"><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?> – <?php echo lang('cms_baseInfo_shop_shopCategory_MainCategory');?></option>
					<option value="sub"><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?> – <?php echo lang('cms_baseInfo_shop_shopCategory_SubCategory');?></option>
				</select>
				<?php echo lang('cms_baseInfo_shop_shopCategory_SelectCategoryTargetTip');?>
				<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 25px;font-size: 12px;padding: 0px 10px;">Save</button>
			</div>
		</div>
		
		<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
			<div class="km-panel-heading">C. <?php echo lang('cms_baseInfo_shop_shopCategory_CustomizeCategories');?></div>
			<div class="km-panel-body" style="padding:10px;">
				<div>
					<div class="fl width40p">
						<h3 style="line-height:20px;"><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?></h3>
						<div>
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10" id="sortableGroup">
							<li><a href="#no" class="km-list-group-item active">Women's Fashion</a></li>
							<li><a href="#no" class="km-list-group-item">Beauty & Diet</a></li>
						    <li><a href="#no" class="km-list-group-item">Men & Sports</a></li>
						    <li><a href="#no" class="km-list-group-item">Digital & Mobile</a></li>
						    <li><a href="#no" class="km-list-group-item">Home & Living</a></li>
						    <li><a href="#no" class="km-list-group-item">Baby & Food</a></li>
						    <li><a href="#no" class="km-list-group-item">Deal & Entertain</a></li>
						</div>
					</div>
					<div class="fl" style="margin:150px 10px;">
						<img src="/assets/images/cms/icon-to.png">
					</div>
					<div class="fl width40p">
						<h3 style="line-height:20px;"><?php echo lang('cms_baseInfo_shop_shopCategory_MainCategory');?></h3>
						<div>
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order">
							<img src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10" id="sortableCategory">
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
<script src="/assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<link href="/assets/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>
$( "#sortableGroup" ).sortable({
	delay : 1,  
    stop :function(){
		var postData = new Object();
		postData.topId = $("#categoryId").val();
		postData.idList = $("#sortableGroup").sortable('toArray');
		$.post(
		"/common/modifyInfo",
		{
			'info_type':'categoryDrag',
			'data':JSON.stringify(postData)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				
			}else{
				alert(result.message);
			}
		});
	}
});
$( "#sortableCategory" ).sortable({
	delay : 1,  
    stop :function(){
		var postData = new Object();
		postData.topId = $("#categoryId").val();
		postData.idList = $("#sortableCategory").sortable('toArray');
		$.post(
		"/common/modifyInfo",
		{
			'info_type':'categoryDrag',
			'data':JSON.stringify(postData)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				
			}else{
				alert(result.message);
			}
		});
	}
});
</script>