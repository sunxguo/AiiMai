<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/admin/websiteLayout" class="current">Homepage</a>
			<a href="/admin/websiteCategory">Category</a>
		</div>
	</div>
	<ul class="km-nav km-nav-tabs clearfix" style="margin-top:20px;margin-left:20px;">
		<?php foreach($categories as $cat):?>
		<li <?php echo $currentCat->category_id==$cat->category_id?'class="active"':'';?>><a href=""><?php echo $cat->category_name;?></a></li>
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
		<div class="fl">
			<div class="clearfix">
				<div class="fl">
					<img onclick="showChangeImageDiv(this);" src="<?php echo $currentCat->category_home_img1;?>" title="<?php echo $currentCat->category_home_title1;?>" catlink="<?php echo $currentCat->category_home_link1;?>" width="370" height="327" style="cursor:pointer;">
				</div>
				<div class="fl" style="width:184px;">
					<img src="<?php echo $currentCat->category_home_img2;?>" title="<?php echo $currentCat->category_home_title2;?>" width="184" height="163" style="cursor:pointer;">
					<img src="<?php echo $currentCat->category_home_img3;?>" title="<?php echo $currentCat->category_home_title3;?>" width="184" height="163" style="cursor:pointer;">
				</div>
			</div>
			<div>
				<img src="<?php echo $currentCat->category_home_img4;?>" title="<?php echo $currentCat->category_home_title4;?>" width="184" height="163" class="fl">
				<img src="<?php echo $currentCat->category_home_img5;?>" title="<?php echo $currentCat->category_home_title5;?>" width="184" height="163" class="fl" style="margin-left: 1px;cursor:pointer;">
				<img src="<?php echo $currentCat->category_home_img6;?>" title="<?php echo $currentCat->category_home_title6;?>" width="184" height="163" class="fl" style="margin-left: 1px;cursor:pointer;">
			</div>
			<div class="km-modal-dialog width40p" id="changeHomeFeaturedImageDiv">
				<div class="km-modal-content">
					<div class="km-modal-header">
						<button type="button" class="km-close"><span>&times;</span></button>
						<h4 class="km-modal-title">Modify Featured Product</h4>
					</div>
					<div class="km-modal-body">
						<label for="titleInput" class="km-control-label">Title:</label>
						<input type="password" class="km-form-control" id="titleInput" style="width: 95%;padding: 0 5px;">
						<label for="linkInput" class="km-control-label">Link:</label>
						<input type="password" class="km-form-control" id="linkInput" style="width: 95%;padding: 0 5px;">
						<label class="km-control-label">Image:</label>
						<img src="" width="184" height="184" style="display:block;cursor:pointer;">
					</div>
					<div class="km-modal-footer">
						<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
						<button type="button" class="km-btn km-btn-primary" onclick="saveHomeFeaturedImage('Successfully saved!');"><?php echo lang('cms_sider_Savechanges');?></button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
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