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
				<th style="width:100px;">商品缩略图</th>
				<th style="width:400px;">商品名称</th>
				<th style="width:150px;">价格</th>
				<th style="width:150px;">是否上架</th>
				<th style="width:150px;">排序</th>
				<th style="width:280px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($columns as $col):?>
			<tr class="list1">
				<td><img src="" width="60" height="60"></td>
				<td class="column-name"><?php echo $col->column_name;?></td>
				<td><?php echo $col->column_display;?></td>
				<td><?php echo $col->column_type;?></td>
				<td><?php echo $col->column_ordernum;?></td>
				<td>
					<a href="/admin/contentList?column=<?php echo $col->column_id;?>">内容</a>
					<a href="/admin/editColumn?column=<?php echo $col->column_id;?>">编辑</a>
					<a href="javascript:delColumn('<?php echo $col->column_id;?>','确定删除<<?php echo $col->column_name;?>>？','成功删除 <?php echo $col->column_name;?>')">删除</a>
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