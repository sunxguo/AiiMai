<div class="padding10 formList msglist clearfix">
	<table>
		<thead>
			<tr class="table-head">
			<!--
				<th style="width:100px;">Avatar</th>-->
				<th style="width:30px;"><input type="checkbox" id="checkAll"></th>
				<th style="width:100px;" onclick="orderNotice('<?php echo $selectPage;?>','username')">Title <?php if(isset($_GET['orderUser'])){if($_GET['orderUser']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:100px;">Type</th>
				<th style="width:100px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($notices as $notice):?>
			<tr class="list1">
				<td><input type="checkbox" name="checkedUserId" value="<?php echo $notice->notice_id;?>"></td>
				<td><?php echo $notice->notice_title;?></td>
				<td><?php echo $notice->notice_type==1?'<span class="km-label km-label-success" style="display: inline-block;">General</span>':'<span class="km-label km-label-danger" style="display: inline-block;">Emergency</span>';?></td>
				<td>
					<a href="javascript:window.open('/admin/modifyNotice?userId=<?php echo $notice->notice_id;?>','Edit User','height=500,width=900,toolbar=no,menubar=no')">Edit</a>&nbsp;&nbsp;&nbsp;
<!--					<a href="/admin/editColumn?column=<?php echo $notice->notice_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;-->
					<a href="javascript:delNotice('<?php echo $notice->notice_id;?>','Sure to delete this notice？','Successfully deleted this notice!')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="partContent baseInfo" style="width: 581px;margin: 10px auto; float:none;">
		<div class="title">
			<?php echo lang("cms_content_baseinfo");?>Title<span style="color: red;">*</span>
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="<?php echo lang("cms_sendmsg_msgtitlelengthtip");?>">
			</div>
		</div>
	</div>
	<div class="partContent clearboth content" style="width: 581px !important;margin: 10px auto !important;">
		<div class="title" onclick="shows(2)">Content<span style="color: red;">*</span></div>
		<textarea id="msg_content" name="description" style="width: 90%;height: 70px;margin: 10px 0 10px 23px;"></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:pubNotice('Successfully Published!')" class="btnfa120">Publish</a>
	</div>
</div>
<script src="/assets/js/cms.js" type="text/javascript"></script>