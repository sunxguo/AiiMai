<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/admin/websiteLayout" class="current">Homepage</a>
			<a href="/admin/websiteCategory">Category</a>
		</div>
	</div>
	<ul class="km-nav km-nav-tabs clearfix" style="margin-top:20px;margin-left:20px;">
		<?php foreach($categories as $cat):?>
		<li <?php echo $currentCat->category_id==$cat->category_id?'class="active"':'';?>><a href="/admin/websiteLayout?cat=<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></a></li>
		<?php endforeach;?>
	</ul>
	<div class="clearfix" style="padding:50px 0 0 20px;">
		<div class="fl" style="width:150px;">
			<div class="km-btn-group-vertical">
				<?php foreach($currentCat->subCats as $subCats):?>
				<button type="button" class="km-btn km-btn-default" style="color: #000;font-size: 12px;font-weight: 600;">
					<input onclick="showCat('<?php echo $subCats->category_id;?>','<?php echo $subCats->category_featured==1?0:1;?>')" type="checkbox" style="float:left;" <?php if($subCats->category_featured==1):?>checked<?php endif;?>>
					<?php echo $subCats->category_name;?>
				</button>
					<?php foreach($subCats->subSubCats as $subSubCats):?>
					<button type="button" class="km-btn km-btn-default" style="color: #434343;font-size: 10px;">
						<input onclick="showCat('<?php echo $subSubCats->category_id;?>','<?php echo $subSubCats->category_featured==1?0:1;?>')" type="checkbox" style="float:left;" <?php if($subSubCats->category_featured==1):?>checked<?php endif;?>>
						<?php echo $subSubCats->category_name;?>
					</button>
					<?php endforeach;?>
				<?php endforeach;?>
			</div>
		</div>
		<div class="fl" style="margin-left: 20px;">
			<div class="clearfix">
				<div class="fl">
					<img onclick="showChangeImageDiv(this,'1','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img1;?>" title="<?php echo $currentCat->category_home_title1;?>" catlink="<?php echo $currentCat->category_home_link1;?>" width="370" height="327" style="cursor:pointer;">
				</div>
				<div class="fl" style="width:184px;">
					<img onclick="showChangeImageDiv(this,'2','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img2;?>" title="<?php echo $currentCat->category_home_title2;?>" catlink="<?php echo $currentCat->category_home_link2;?>" width="184" height="163" style="cursor:pointer;">
					<img onclick="showChangeImageDiv(this,'3','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img3;?>" title="<?php echo $currentCat->category_home_title3;?>" catlink="<?php echo $currentCat->category_home_link3;?>" width="184" height="163" style="cursor:pointer;">
				</div>
			</div>
			<div>
				<img onclick="showChangeImageDiv(this,'4','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img4;?>" title="<?php echo $currentCat->category_home_title4;?>" catlink="<?php echo $currentCat->category_home_link4;?>" width="184" height="163" class="fl" style="cursor:pointer;">
				<img onclick="showChangeImageDiv(this,'5','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img5;?>" title="<?php echo $currentCat->category_home_title5;?>" catlink="<?php echo $currentCat->category_home_link5;?>" width="184" height="163" class="fl" style="margin-left: 1px;cursor:pointer;">
				<img onclick="showChangeImageDiv(this,'6','<?php echo $currentCat->category_id;?>');" src="<?php echo $currentCat->category_home_img6;?>" title="<?php echo $currentCat->category_home_title6;?>" catlink="<?php echo $currentCat->category_home_link6;?>" width="184" height="163" class="fl" style="margin-left: 1px;cursor:pointer;">
			</div>
			<div class="km-modal-dialog width40p" id="changeHomeFeaturedImageDiv">
				<div class="km-modal-content">
					<div class="km-modal-header">
						<button type="button" class="km-close"><span>&times;</span></button>
						<h4 class="km-modal-title">Modify Featured Product</h4>
					</div>
					<div class="km-modal-body">
						<label for="titleInput" class="km-control-label">Title:</label>
						<input type="text" class="km-form-control" id="titleInput" style="width: 95%;padding: 0 5px;">
						<label for="linkInput" class="km-control-label">Link:</label>
						<input type="text" class="km-form-control" id="linkInput" style="width: 95%;padding: 0 5px;" value="http://" placeholder="http://">
						<label class="km-control-label">Image:</label>
						<img id="featuredImage" onclick="$('#fileFeaturedImage').click();" src="" width="184" height="184" style="display:block;cursor:pointer;">
						<input type="hidden" id="postionNo">
						<input type="hidden" id="catId">
						<form id="upload_featuredImage_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadFeaturedImage()" name="image" type="file" id="fileFeaturedImage" style="display:none;" accept="image/*">
						</form>
					</div>
					<div class="km-modal-footer">
						<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
						<button type="button" class="km-btn km-btn-primary" onclick="saveHomeFeaturedImage('Successfully saved!');"><?php echo lang('cms_sider_Savechanges');?></button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>