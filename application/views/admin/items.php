<div class="padding10 contentlist column-list">
<!--
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">Search</a>
		</div>
		<div class="clear">
		</div>
	</div>-->
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Thumbnail</th>
				<th style="width:400px;">Name</th>
				<th style="width:150px;">Price</th>
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
				<td><?php echo $item->product_status;?></td>
				<td>
					<a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank">Preview</a>
					<a href="javascript:window.open('/admin/modifyItem?itemId=1','Edit Item','height=700,width=900,toolbar=no,menubar=no');">Edit</a>
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