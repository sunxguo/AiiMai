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
				<input type="radio" name="category" value="0" style="vertical-align: middle;margin-right: 5px;" <?php echo $merchant->merchant_shop_category_type==0?'checked':'';?>> <?php echo lang('cms_baseInfo_shop_shopCategory_AiiMaiCategory');?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="category" value="1" style="vertical-align: middle;margin-right: 5px;" <?php echo $merchant->merchant_shop_category_type==1?'checked':'';?>> <?php echo lang('cms_baseInfo_shop_shopCategory_CustomizedCategory');?>
				<button onclick="saveCategoryFormat();" type="button" class="km-btn km-btn-primary fr" style="height: 25px;font-size: 12px;padding: 0px 10px;"><?php echo lang('cms_common_save');?></button>
			</div>
		</div>
		<div class="km-panel km-panel-primary mt10" style="width: 98%;">
			<div class="km-panel-heading">B. <?php echo lang('cms_baseInfo_shop_shopCategory_SelectCategoryTarget');?></div>
			<div class="km-panel-body" style="padding:10px;">
				<select style="height: 30px;" id="categoryTarget">
					<option value="0" <?php echo $merchant->merchant_shop_category_target==0?'selected':'';?>><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?> – <?php echo lang('cms_baseInfo_shop_shopCategory_MainCategory');?></option>
					<option value="1" <?php echo $merchant->merchant_shop_category_target==1?'selected':'';?>><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?> – <?php echo lang('cms_baseInfo_shop_shopCategory_SubCategory');?></option>
				</select>
				<?php echo lang('cms_baseInfo_shop_shopCategory_SelectCategoryTargetTip');?>
				<button onclick="saveCategoryTarget();" type="button" class="km-btn km-btn-primary fr" style="height: 25px;font-size: 12px;padding: 0px 10px;">Save</button>
			</div>
		</div>
		
		<div class="km-panel km-panel-primary mt10 clearfix" style="width: 98%;">
			<div class="km-panel-heading">C. <?php echo lang('cms_baseInfo_shop_shopCategory_CustomizeCategories');?></div>
			<div id="alertMessage" class="alert-message">
				<p>Save Successfully!</p>
			</div>
			<div class="km-panel-body" style="padding:10px;">
				<div>
					<div class="fl width40p">
						<h3 style="line-height:20px;"><?php echo lang('cms_baseInfo_shop_shopCategory_CategoryGroup');?></h3>
						<div>
							
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order" style="visibility:hidden;">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order" style="visibility:hidden;">
							<img onclick="openEditCategoryGroup();" src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img onclick="delCategoryGroup();" src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img onclick="setDivCenter('#addCategoryGroupDiv',true);" src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10" id="sortableGroup">
							<?php foreach($categoryGroup as $catGroup):?>
							<a href="#no" id="<?php echo $catGroup->shopcategory_id;?>" class="km-list-group-item" cgname="<?php echo $catGroup->shopcategory_name;?>"><?php echo $catGroup->shopcategory_name;?></a>
							<?php endforeach;?>
						</div>
					</div>
					<div class="fl" style="margin:150px 10px;">
						<img src="/assets/images/cms/icon-to.png">
					</div>
					<div class="fl width40p">
						<h3 style="line-height:20px;"><?php echo lang('cms_baseInfo_shop_shopCategory_MainCategory');?></h3>
						<div>
							<img src="/assets/images/cms/icon-up.png" width="22" class="icon-order" style="visibility:hidden;">
							<img src="/assets/images/cms/icon-down.png" width="22" class="icon-order" style="visibility:hidden;">
							<img onclick="openEditMainCategory();" src="/assets/images/cms/icon-edit.png" width="22" class="icon-order fr">
							<img onclick="delMainCategory();" src="/assets/images/cms/icon-minus.png" width="22" class="icon-order fr">
							<img onclick="addMainCategoryShow();" src="/assets/images/cms/icon-plus.png" width="22" class="icon-order fr">
						</div>
						<div class="km-list-group mt10" id="sortableCategory">
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="km-modal-dialog" style="width:500px;" id="addCategoryGroupDiv">
	<div class="km-modal-content">
		<div class="km-modal-header">
			<button type="button" class="km-close"><span>&times;</span></button>
			<h4 class="km-modal-title">Add Category Group</h4>
		</div>
		<div class="km-modal-body" style="">
			<label for="newCategoryGroupName">Name:</label>
			<input type="text" id="newCategoryGroupName" class="km-form-control" style="width:70%;height: 30px; margin-left: 10px; padding: 0px 5px;font-size:12px;display: inline-block;">
		</div>
		<div class="km-modal-footer">
			<button type="button" class="km-btn km-btn-default km-btn-close">Cancel</button>
			<button onclick="addCategoryGroup()" type="button" class="km-btn km-btn-primary km-btn-close">Add</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<div class="km-modal-dialog" style="width:500px;" id="editCategoryGroupDiv">
	<div class="km-modal-content">
		<div class="km-modal-header">
			<button type="button" class="km-close"><span>&times;</span></button>
			<h4 class="km-modal-title">Edit Category Group</h4>
		</div>
		<div class="km-modal-body" style="">
			<label for="editCategoryGroupName">Name:</label>
			<input type="text" id="editCategoryGroupName" class="km-form-control" style="width:70%;height: 30px; margin-left: 10px; padding: 0px 5px;font-size:12px;display: inline-block;">
		</div>
		<div class="km-modal-footer">
			<button type="button" class="km-btn km-btn-default km-btn-close">Cancel</button>
			<button onclick="saveCategoryGroup()" type="button" class="km-btn km-btn-primary km-btn-close">Save</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<div class="km-modal-dialog" style="width:500px;" id="addMainCategoryDiv">
	<div class="km-modal-content">
		<div class="km-modal-header">
			<button type="button" class="km-close"><span>&times;</span></button>
			<h4 class="km-modal-title">Add Main Category</h4>
		</div>
		<div class="km-modal-body" style="">
			<label for="newMainCategoryName">Name:</label>
			<input type="text" id="newMainCategoryName" class="km-form-control" style="width:70%;height: 30px; margin-left: 10px; padding: 0px 5px;font-size:12px;display: inline-block;">
		</div>
		<div class="km-modal-footer">
			<button type="button" class="km-btn km-btn-default km-btn-close">Cancel</button>
			<button onclick="addMainCategory()" type="button" class="km-btn km-btn-primary km-btn-close">Add</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<div class="km-modal-dialog" style="width:500px;" id="editMainCategoryDiv">
	<div class="km-modal-content">
		<div class="km-modal-header">
			<button type="button" class="km-close"><span>&times;</span></button>
			<h4 class="km-modal-title">Edit Main Category</h4>
		</div>
		<div class="km-modal-body" style="">
			<label for="editMainCategoryName">Name:</label>
			<input type="text" id="editMainCategoryName" class="km-form-control" style="width:70%;height: 30px; margin-left: 10px; padding: 0px 5px;font-size:12px;display: inline-block;">
		</div>
		<div class="km-modal-footer">
			<button type="button" class="km-btn km-btn-default km-btn-close">Cancel</button>
			<button onclick="saveMainCategory()" type="button" class="km-btn km-btn-primary km-btn-close">Save</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script src="/assets/js/cms-shop.js" type="text/javascript"></script>
<script src="/assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<link href="/assets/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>
var categoryGroupId=0;
var mainCategoryId=0;
var categoryGroupName='';
var mainCategoryName='';
$(document).ready(function(){
	$("#sortableGroup a").click(function(){
		$("#sortableGroup a").removeClass('active');
		$(this).addClass('active');
		categoryGroupId=$(this).attr('id');
		categoryGroupName=$(this).attr('cgname');
		getMainCategory(categoryGroupId);
	});
	$( "#sortableGroup" ).sortable({
		delay : 1,
		items: "> a",
		stop :function(){
			var postData = new Object();
			postData.idList = $("#sortableGroup").sortable('toArray');
			$.post(
			"/common/dragItemInfo",
			{
				'info_type':'shopCategoryDrag',
				'data':JSON.stringify(postData)
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					showMessage('Save Successfully!');
				}else{
					showMessage(result.message);
				}
			});
		}
	});
	$( "#sortableCategory" ).sortable({
		delay : 1,  
		items: "> a",
		stop :function(){
			var postData = new Object();
			postData.idList = $("#sortableCategory").sortable('toArray');
			$.post(
			"/common/dragItemInfo",
			{
				'info_type':'shopMainCategoryDrag',
				'data':JSON.stringify(postData)
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					showMessage('Save Successfully!');
				}else{
					alert(result.message);
				}
			});
		}
	});
});
function showMessage(msg){
	$("#alertMessage p").text(msg);
	$("#alertMessage").fadeIn();
	setTimeout(closeMessage,2000);
}
function closeMessage(){
	$("#alertMessage").fadeOut();
}
function addCategoryGroup(){
	var categoryGroup = new Object();
	categoryGroup.id = $("#merchantId").val();
	categoryGroup.name = $("#newCategoryGroupName").val();
	dataHandler("add","categoryGroup",categoryGroup,successAddCategoryGroup,null,null,null,true);
}
function addMainCategory(){
	var mainCategory = new Object();
	mainCategory.id = $("#merchantId").val();
	mainCategory.fid = categoryGroupId;
	mainCategory.name = $("#newMainCategoryName").val();
	dataHandler("add","mainCategory",mainCategory,successAddMainCategory,null,null,null,false);
}
function successAddMainCategory(){
	getMainCategory(categoryGroupId);
	successAddCategoryGroup();
}
function getMainCategory(categoryGroupId){
	var mainCategory = new Object();
	mainCategory.merchantId = $("#merchantId").val();
	mainCategory.fid = categoryGroupId;
	dataHandler("get","mainCategory",mainCategory,getMainCategoryHandler,null,null,null,false);
}
function getMainCategoryHandler(data){
	var list='';
	for(var i=0;i<data.length;i++){
		item = '<a href="#no" id="'+data[i].shopcategory_id+'" class="km-list-group-item" cgname="'+data[i].shopcategory_name+'">'+data[i].shopcategory_name+'</a>';
		list+=item;
	}
	$("#sortableCategory").html(list);
	mainCategoryId=0;
	$("#newMainCategoryName").val('');
	$("#editMainCategoryName").val('');
	$(document).on('click', "#sortableCategory a", function () {
		$('#sortableCategory a').removeClass('active');
		$(this).addClass('active');
		mainCategoryId=$(this).attr('id');
		mainCategoryName=$(this).attr('cgname');
	});
}
function successAddCategoryGroup(){
	showMessage('Save Successfully!');
}
function openEditCategoryGroup(){
	if(categoryGroupId==0){
		showMessage('Please select category group!');
		return false;
	}
	setDivCenter('#editCategoryGroupDiv',true);
	$("#editCategoryGroupName").val(categoryGroupName);
}
function openEditMainCategory(){
	if(categoryGroupId==0 || mainCategoryId==0){
		showMessage('Please select category!');
		return false;
	}
	setDivCenter('#editMainCategoryDiv',true);
	$("#editMainCategoryName").val(mainCategoryName);
}
function saveCategoryGroup(){
	var categoryGroup = new Object();
	categoryGroup.id = categoryGroupId;
	categoryGroup.name = $("#editCategoryGroupName").val();
	dataHandler("modify","categoryGroup",categoryGroup,successAddCategoryGroup,null,null,null,true);
}
function saveMainCategory(){
	var mainCategory = new Object();
	mainCategory.id = mainCategoryId;
	mainCategory.name = $("#editMainCategoryName").val();
	dataHandler("modify","mainCategory",mainCategory,successAddMainCategory,null,null,null,false);
}
function delCategoryGroup(){
	if(categoryGroupId==0){
		showMessage('Please select category group!');
		return false;
	}
	if(!confirm('Sure to delete this category group?')){
		return false;
	}
	var categoryGroup = new Object();
	categoryGroup.id = categoryGroupId;
	dataHandler("del","categoryGroup",categoryGroup,successAddMainCategory,null,null,null,true);
}
function delMainCategory(){
	if(categoryGroupId==0 || mainCategoryId==0){
		showMessage('Please select category!');
		return false;
	}
	if(!confirm('Sure to delete this category?')){
		return false;
	}
	var mainCategory = new Object();
	mainCategory.id = mainCategoryId;
	dataHandler("del","mainCategory",mainCategory,successAddMainCategory,null,null,null,false);
}
function addMainCategoryShow(){
	if(categoryGroupId==0){
		showMessage('Please select category group!');
		return false;
	}
	setDivCenter('#addMainCategoryDiv',true);
}
function saveCategoryFormat(){
	var categoryFormat = new Object();
	categoryFormat.id =$("#merchantId").val();
	categoryFormat.type = $("input[name='category']:checked").val();
	dataHandler("modify","categoryFormat",categoryFormat,successSaveCategoryFormat,null,null,null,true);
}
function saveCategoryTarget(){
	var categoryTarget = new Object();
	categoryTarget.id =$("#merchantId").val();
	categoryTarget.type = $("#categoryTarget").val();
	dataHandler("modify","categoryTarget",categoryTarget,successSaveCategoryFormat,null,null,null,true);
}
function successSaveCategoryFormat(){
	showAlert('success','Save Successfully!','');
}
</script>