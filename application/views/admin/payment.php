<div class="padding10 contentlist column-list">
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">添加栏目</a>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">No.</th>
				<th style="width:400px;">Name</th>
				<th style="width:150px;">On/Off</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($columns as $col):?>
			<tr class="list1">
				<td><img src="" width="54" height="43"></td>
				<td class="column-name"><a href="" target="_blank"><?php echo $col->column_name;?></a></td>
				<td><?php echo $col->column_display;?></td>
				<td>
					<a href="/admin/contentList?column=<?php echo $col->column_id;?>">Details</a>&nbsp;&nbsp;&nbsp;
					<a href="/admin/editColumn?column=<?php echo $col->column_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $col->column_id;?>','Sure to freeze it?<<?php echo $col->column_name;?>>？','成功删除 <?php echo $col->column_name;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $col->column_id;?>','Sure to delete it?<<?php echo $col->column_name;?>>？','成功删除 <?php echo $col->column_name;?>')">Delete</a>
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