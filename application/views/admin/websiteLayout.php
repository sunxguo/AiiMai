<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/admin/websiteLayout" class="current">Homepage</a>
			<a href="/admin/websiteCategory">Category</a>
		</div>
	</div>
	<ul class="km-nav km-nav-tabs clearfix" style="margin-top:20px;margin-left:20px;">
		<?php foreach($categories as $cat):?>
		<li <?php echo $currentCat==$cat->category_id?'class="active"':'';?>><a href=""><?php echo $cat->category_name;?></a></li>
		<?php endforeach;?>
	</ul>
	
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