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
		<button onclick="modifyCategory(this,'<?php echo $currentCat->category_id;?>');" categoryName="<?php echo $currentCat->category_name;?>" type="button" class="km-btn km-btn-primary" style="height: 28px; padding: 0px 12px;font-size: 12px;">Edit</button>
		<button onclick="deleteCategory(this,'<?php echo $currentCat->category_id;?>');" categoryName="<?php echo $currentCat->category_name;?>" type="button" class="km-btn km-btn-danger" style="height: 28px; padding: 0px 12px;font-size: 12px;">Delete</button>
		<div class="km-btn-group-vertical" style="margin-top:10px;">
			<?php foreach($currentCat->subCats as $subCats):?>
			<button type="button" class="km-btn km-btn-default" style="color: #000;font-size: 12px;font-weight: 600;text-align:left;">
				<?php echo $subCats->category_name;?>
				<a onclick="deleteCategory(this,'<?php echo $subCats->category_id;?>');" categoryName="<?php echo $subCats->category_name;?>" class="km-btn km-btn-danger fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;">Delete</a>
				<a onclick="modifyCategory(this,'<?php echo $subCats->category_id;?>');" categoryName="<?php echo $subCats->category_name;?>" class="km-btn km-btn-primary fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;margin-right:10px;">Edit</a>
			</button>
				<?php foreach($subCats->subSubCats as $subSubCats):?>
				<button type="button" class="km-btn km-btn-default" style="color: #434343;font-size: 10px;text-align:left;">
					-- <?php echo $subSubCats->category_name;?>
					<a onclick="deleteCategory(this,'<?php echo $subSubCats->category_id;?>');" categoryName="<?php echo $subSubCats->category_name;?>" class="fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;">Delete</a>
					<a onclick="modifyCategory(this,'<?php echo $subSubCats->category_id;?>');" categoryName="<?php echo $subSubCats->category_name;?>" class="fr" style="height: 20px;padding: 0px 8px;line-height: 20px;font-size: 12px;margin-right:10px;">Edit</a>
				</button>
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
	<!--
	<div class="titA">Modify Password</div>-->
	<div class="featured-products fl">
			<div class="fp-left fl">
				<div class="fp-left-top widget borderR borderB">
					<?php if(isset($featuredProducts[0])):?>
					<a href="/home/item?itemId=<?php echo $featuredProducts[0]->product_id;?>">
						<img src="<?php echo $featuredProducts[0]->product_image;?>">
					</a>
					<?php endif;?>
				</div>
				<div class="fp-left-bottom">
					<div class="fp-left-bottom-item widget borderR borderB fl">
						<?php if(isset($featuredProducts[1])):?>
						<a href="/home/item?itemId=<?php echo $featuredProducts[1]->product_id;?>">
							<img src="<?php echo $featuredProducts[1]->product_image;?>">
						</a>
						<?php endif;?>
					</div>
					<div class="fp-left-bottom-item widget borderR borderB fl">
						<?php if(isset($featuredProducts[2])):?>
						<a href="/home/item?itemId=<?php echo $featuredProducts[2]->product_id;?>">
							<img src="<?php echo $featuredProducts[2]->product_image;?>">
						</a>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="fp-right fl">
				<div class="fp-right-item widget borderR">
					<?php if(isset($featuredProducts[3])):?>
					<a href="/home/item?itemId=<?php echo $featuredProducts[3]->product_id;?>">
						<img src="<?php echo $featuredProducts[3]->product_image;?>">
					</a>
					<?php endif;?>
				</div>
				<div class="fp-right-item widget borderR borderT">
					<?php if(isset($featuredProducts[4])):?>
					<a href="/home/item?itemId=<?php echo $featuredProducts[4]->product_id;?>">
						<img src="<?php echo $featuredProducts[4]->product_image;?>">
					</a>
					<?php endif;?>
				</div>
				<div class="fp-right-item widget borderR borderB borderT">
					<?php if(isset($featuredProducts[5])):?>
					<a href="/home/item?itemId=<?php echo $featuredProducts[5]->product_id;?>">
						<img src="<?php echo $featuredProducts[5]->product_image;?>">
					</a>
					<?php endif;?>
				</div>
			</div>
		</div>
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>