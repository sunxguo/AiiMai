<div class="padding10 contentlist column-list">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectItem('<?php echo $selectPage;?>')" class="btn80">Search</a>
			<button onclick="productQuery(true);" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding:0px 10px;">Excel</button>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectItem('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
				<?php foreach($status as $key=>$s):?>
                <option value="<?php echo $key;?>" <?php echo isset($_GET["status"]) && $_GET["status"]==$key?'selected = "selected"':'';?>>
					<?php echo $s;?>
				</option>
				<?php endforeach;?>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Main Category:</span>
			<select id="category" onchange="selectItem('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
				<?php foreach($categories as $cat):?>
				<optgroup label="<?php echo $cat->category_name;?>">
					<?php foreach($cat->subCats as $subCat):?>
						<option value="<?php echo $subCat->category_id;?>" <?php if(isset($_GET["category"]) && $_GET["category"]==$subCat->category_id):?>selected<?php endif;?>><?php echo $subCat->category_name;?></option>
					<?php endforeach;?>
				</optgroup>
				<?php endforeach;?>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Thumbnail</th>
				<th style="width:300px;">Name</th>
				<th style="width:150px;">Price</th>
				<th style="width:150px;">Reference Price</th>
				<th style="width:150px;">Main Category</th>
				<th style="width:220px;">1st Sub Category</th>
				<th style="width:220px;">2nd Sub Category</th>
				<th style="width:150px;">Time</th>
				<th style="width:150px;">Status</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items as $item):?>
			<tr class="list1">
				<td><img src="<?php echo $item->product_image;?>" width="60" height="60"></td>
				<td class="column-name"><a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank"><?php echo $item->product_item_title_english;?></a></td>
				<td><?php echo $item->product_sell_price;?></td>
				<td><?php echo $item->product_reference_price;?></td>
				<td><?php echo $item->product_category;?></td>
				<td><?php echo $item->product_sub_category;?></td>
				<td><?php echo $item->product_sub_sub_category;?></td>
				<td><?php echo $item->product_time;?></td>
				<td>
					<span class="km-label 
						<?php if($item->product_status==1):?>km-label-primary<?php endif;?>
						<?php if($item->product_status==2):?>km-label-info<?php endif;?>
						<?php if($item->product_status==3):?>km-label-success<?php endif;?>
						<?php if($item->product_status==4):?>km-label-danger<?php endif;?>
						<?php if($item->product_status==5):?>km-label-warning<?php endif;?>
						<?php if($item->product_status==6):?>km-label-default<?php endif;?>
						"><?php echo $status[$item->product_status];?>
					</span>
				</td>
				<td>
					<a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank">Preview</a>
					<a href="javascript:window.open('/admin/modifyItem?itemId=<?php echo $item->product_id;?>','Edit Item','height=700,width=900,toolbar=no,menubar=no');">Edit</a>
					<a href="javascript:delItem('<?php echo $item->product_id;?>','Sure to delete <<?php echo $item->product_item_title_english;?>>？','Successfully deleted <?php echo $item->product_item_title_english;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<nav>
	  Total <?php echo $amount;?>
	  <ul class="km-pagination">
		<li <?php if($firstPage=="no"):?>class="disabled"<?php endif;?>>
			<a href="<?php echo $firstPage=="no"?"#":$firstPage;?>"><span>«</span></a>
		</li>
		<?php for($i=1;$i<=$pageAmount;$i++):?>
		<li <?php if($currentPage==$i):?>class="active"<?php endif;?>>
			<a href="<?php echo $jumpPage.$i;?>"><?php echo $i;?></a>
		</li>
		<?php endfor;?>
		<li <?php if($lastPage=="no"):?>class="disabled"<?php endif;?>>
			<a href="<?php echo $lastPage=="no"?"#":$lastPage;?>"><span>»</span></a>
		</li>
	  </ul>
	</nav>
</div>
<div id="msg_content" class="showinfo">
	<div class="dialog-hd">信息内容</div>
	<div class="itemPar" id="msgwait"><img src="/assets/images/cms/loading.gif" width="60" height="60"></div>
	<div class="itemPar" id="msgdata"></div>
</div>
<script src="/assets/js/admin.js" type="text/javascript"></script>