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
				<th style="width:100px;">Logo</th>
				<th style="width:400px;">Seller Shop Title</th>
				<th style="width:200px;">Username</th>
				<th style="width:150px;">Vip</th>
				<th style="width:150px;">Last Login Time</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($merchants as $merchant):?>
			<tr class="list1">
				<td><img src="<?php echo $merchant->merchant_avatar;?>" width="54" height="43"></td>
				<td class="column-name"><a href="/home/shop?shopId=<?php echo $merchant->merchant_id;?>" target="_blank"><?php echo $merchant->merchant_shop_name;?></a></td>
				<td><?php echo $merchant->merchant_username;?></td>
				<td><?php echo $merchant->merchant_vip_grade;?></td>
				<td><?php echo $merchant->merchant_lastlogin_time;?></td>
				<td>
					<a href="/home/shop?shopId=<?php echo $merchant->merchant_id;?>" target="_blank">Go</a>&nbsp;&nbsp;&nbsp;
					<a href="/admin/editColumn?column=<?php echo $merchant->merchant_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $merchant->merchant_id;?>','Sure to freeze it?<<?php echo $merchant->merchant_username;?>>？','成功删除 <?php echo $merchant->merchant_username;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $merchant->merchant_id;?>','Sure to delete it?<<?php echo $merchant->merchant_username;?>>？','成功删除 <?php echo $merchant->merchant_username;?>')">Delete</a>
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