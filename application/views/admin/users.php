<div class="padding10 contentlist column-list">
<!--
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">添加栏目</a>
		</div>
		<div class="clear">
		</div>
	</div>
	-->
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Avatar</th>
				<th style="width:400px;">Username</th>
				<th style="width:150px;">Birthday</th>
				<th style="width:150px;">Vip</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user):?>
			<tr class="list1">
				<td><img src="<?php echo $user->user_avatar;?>" width="54"></td>
				<td class="column-name"><a href="" target="_blank"><?php echo $user->user_username;?></a></td>
				<td><?php echo $user->user_birthday;?></td>
				<td><?php echo $user->user_vip_grade;?></td>
				<td>
					<a href="/admin/contentList?column=<?php echo $user->user_id;?>">Details</a>&nbsp;&nbsp;&nbsp;
<!--					<a href="/admin/editColumn?column=<?php echo $user->user_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;-->
					<?php if($user->user_state==0):?>
					<a href="javascript:freezeUser('<?php echo $user->user_id;?>','Sure to freeze <<?php echo $user->user_username;?>>？','Successfully froze <?php echo $user->user_username;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<?php else:?>
					<a href="javascript:unfreeze('<?php echo $user->user_id;?>','Sure to unfreeze <<?php echo $user->user_username;?>>？','Successfully unfroze <?php echo $user->user_username;?>')">unfreeze</a>&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					<a href="javascript:delUser('<?php echo $user->user_id;?>','Sure to delete <<?php echo $user->user_username;?>>？','Successfully deleted <?php echo $user->user_username;?>')">Delete</a>
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