<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/admin/websiteLayout">Homepage</a>
			<a href="/admin/websiteCategory" class="current">Category</a>
		</div>
	</div>
	<ul class="km-nav km-nav-tabs clearfix" style="margin-top:20px;margin-left:20px;">
		<?php foreach($categories as $cat):?>
		<li <?php echo $currentCat->category_id==$cat->category_id?'class="active"':'';?>><a href="/admin/websiteCategory?cat=<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></a></li>
		<?php endforeach;?>
		<li><a href="javascript:setDivCenter('#addCategoryDiv',true);"><img src="/assets/images/cms/icon-plus.png" width="15"></a></li>
	</ul>
	<div style="margin-left:20px;margin-top:10px;">
		<?php echo $currentCat->category_name;?>
		<input id="categoryId" type="hidden" value="<?php echo $currentCat->category_id;?>">
		<button onclick="modifyCategory(this,'<?php echo $currentCat->category_id;?>');" categoryName="<?php echo $currentCat->category_name;?>" type="button" class="km-btn km-btn-primary" style="height: 28px; padding: 0px 12px;font-size: 12px;">Edit</button>
		<button onclick="deleteCategory(this,'<?php echo $currentCat->category_id;?>');" categoryName="<?php echo $currentCat->category_name;?>" type="button" class="km-btn km-btn-danger" style="height: 28px; padding: 0px 12px;font-size: 12px;">Delete</button>
		<ul id="sortable" class="km-btn-group-vertical" style="margin-top:10px;width:100%;">
			<?php $subAmount=sizeof($currentCat->subCats);
			foreach($currentCat->subCats as $key=>$subCats):?>
			<a id="<?php echo $subCats->category_id;?>" type="button" class="km-btn km-btn-default category" style="color: #000;font-size: 12px;font-weight: 600;text-align:left;">
				<?php echo $subCats->category_name;?>
				<span onclick="deleteCategory(this,'<?php echo $subCats->category_id;?>');" categoryName="<?php echo $subCats->category_name;?>" class="km-btn km-btn-danger fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;">Delete</span>
				<span onclick="modifyCategory(this,'<?php echo $subCats->category_id;?>');" categoryName="<?php echo $subCats->category_name;?>" class="km-btn km-btn-primary fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;margin-right:10px;">Edit</span>
				<?php if($key!=$subAmount-1):?>
				<span onclick="orderCategory('<?php echo $subCats->category_id;?>','down')" class="fr" style="margin-right:10px;"><img src="/assets/images/cms/icon-down.png" width="15"></span>
				<?php endif;?>
				<?php if($key!=0):?>
				<span onclick="orderCategory('<?php echo $subCats->category_id;?>','up')" class="fr" style="margin-right:10px;"><img src="/assets/images/cms/icon-up.png" width="15"></span>
				<?php endif;?>
			</a>
				<?php $subSubAmount=sizeof($subCats->subSubCats);
				foreach($subCats->subSubCats as $k=>$subSubCats):?>
				<a id="<?php echo $subSubCats->category_id;?>" type="button" class="km-btn km-btn-default category" style="color: #434343;font-size: 10px;text-align:left;">
					-- <?php echo $subSubCats->category_name;?>
					<span onclick="deleteCategory(this,'<?php echo $subSubCats->category_id;?>');" categoryName="<?php echo $subSubCats->category_name;?>" class="fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;">Delete</span>
					<span onclick="modifyCategory(this,'<?php echo $subSubCats->category_id;?>');" categoryName="<?php echo $subSubCats->category_name;?>" class="fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;margin-right:10px;">Edit</span>
					<?php if($k!=$subSubAmount-1):?>
					<span onclick="orderCategory('<?php echo $subSubCats->category_id;?>','down')" class="fr" style="margin-right:10px;"><img src="/assets/images/cms/icon-down.png" width="15"></span>
					<?php endif;?>
					<?php if($k!=0):?>
					<span onclick="orderCategory('<?php echo $subSubCats->category_id;?>','up')" class="fr" style="margin-right:10px;"><img src="/assets/images/cms/icon-up.png" width="15"></span>
					<?php endif;?>
				</a>
				<?php endforeach;?>
			<?php endforeach;?>
		</div>
	</div>
	<div class="km-modal-dialog width40p" id="changeCategoryDiv">
		<div class="km-modal-content">
			<div class="km-modal-header">
				<button type="button" class="km-close"><span>&times;</span></button>
				<h4 class="km-modal-title">Modify Category</h4>
			</div>
			<div class="km-modal-body">
				<label for="nameInput" class="km-control-label">Name:</label>
				<input type="text" class="km-form-control" id="nameInput" style="width: 95%;padding: 0 5px;">
				<input type="hidden" id="categoryId">
			</div>
			<div class="km-modal-footer">
				<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
				<button type="button" class="km-btn km-btn-primary" onclick="saveCategory('Successfully saved!');"><?php echo lang('cms_sider_Savechanges');?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	<div class="km-modal-dialog width40p" id="addCategoryDiv">
		<div class="km-modal-content">
			<div class="km-modal-header">
				<button type="button" class="km-close"><span>&times;</span></button>
				<h4 class="km-modal-title">Add Category</h4>
			</div>
			<div class="km-modal-body">
				<label for="fid" class="km-control-label">Upper level:</label>
				<select id="fid" style="display:block;">
					<option value="0">-- Top --</option>
					<?php foreach($categories as $cat):?>
					<option value="<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></option>
					<?php foreach($cat->subCats as $subCat):?>
					<option value="<?php echo $subCat->category_id;?>">-- <?php echo $subCat->category_name;?></option>
					<?php endforeach;?>
					<?php endforeach;?>
				</select>
				<label for="newCatNameInput" class="km-control-label">Name:</label>
				<input type="text" class="km-form-control" id="newCatNameInput" style="width: 95%;padding: 0 5px;">
			</div>
			<div class="km-modal-footer">
				<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
				<button type="button" class="km-btn km-btn-primary" onclick="addCategory('Successfully saved!');">Add</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>
<script src="/assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<link href="/assets/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>
// $( "#sortable" ).sortable({
// 	delay : 1,  
//     stop :function(){
// 		var postData = new Object();
// 		postData.topId = $("#categoryId").val();
// 		postData.idList = $("#sortable").sortable('toArray');
// 		$.post(
// 		"/common/modifyInfo",
// 		{
// 			'info_type':'categoryDrag',
// 			'data':JSON.stringify(postData)
// 		},
// 		function(data){
// 			var result=$.parseJSON(data);
// 			if(result.result=="success"){
				
// 			}else{
// 				alert(result.message);
// 			}
// 		});
// 	}
// });
$(document).ready(function(){
	$("#sortable a").click(function(){
		$("#sortable a").removeClass('active');
		$(this).addClass('active');
		categoryGroupId=$(this).attr('id');
		categoryGroupName=$(this).attr('cgname');
		getMainCategory(categoryGroupId);
	});
	$( "#sortable" ).sortable({
		delay : 1,
		items: "> a",
		stop :function(){
			var postData = new Object();
			postData.idList = $("#sortable").sortable('toArray');
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
});
</script>