<div class="padding10 contentlist column-list">
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">Search</a>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Thumbnail</th>
				<th style="width:400px;">Name</th>
				<th style="width:150px;">Price</th>
				<th style="width:150px;">Shelf</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items as $item):?>
			<tr class="list1">
				<td><img src="<?php echo $item->product_image;?>" width="60" height="60"></td>
				<td class="column-name"><?php echo $item->product_item_title_english;?></td>
				<td><?php echo $item->product_sell_price;?></td>
				<td><?php echo $item->product_status;?></td>
				<td>
					<a href="/admin/contentList?column=<?php echo $item->product_id;?>">Preview</a>
					<a href="/admin/editColumn?column=<?php echo $item->product_id;?>">Edit</a>
					<a href="javascript:delColumn('<?php echo $item->product_id;?>','确定删除<<?php echo $item->product_item_title_english;?>>？','成功删除 <?php echo $item->product_item_title_english;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<nav>
	  <ul class="km-pagination">
		<li class="disabled">
			<a href="#"><span>«</span></a>
		</li>
		<li class="active">
			<a href="#">1</a>
		</li>
		<li>
			<a href="#">2</a>
		</li>
		<li>
			<a href="#">3</a>
		</li>
		<li>
			<a href="#">4</a>
		</li>
		<li>
			<a href="#">5</a>
		</li>
		<li>
			<a href="#"><span>»</span></a>
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