<div class="padding10 contentlist column-list">
<!--
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">Add New Payment</a>
		</div>
		<div class="clear">
		</div>
	</div>-->
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float:left;">
			<a href="/admin/bankadd" target="_blank" class="btn80">Add</a>
		</div>
		<!--
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectPayment('<?php echo $selectPage;?>')" class="btn80">Search</a>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectPayment('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["status"]) && $_GET["status"]==1?'selected = "selected"':'';?>>
					Normal
				</option>
                <option value="0" <?php echo isset($_GET["status"]) && $_GET["status"]==0?'selected = "selected"':'';?>>
					Unused
				</option>
            </select>
		</div>
		-->
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Bank Name</th>
				<th style="width:400px;">Bank Code</th>
				<th style="width:150px;">Length of Account Number</th>
				<th style="width:150px;">Head of Branch Code</th>
				<th style="width:150px;">Length of Branch Code in Account Number</th>
				<th style="width:150px;">Account Number retain Branch Code</th>
				<th style="width:150px;">Status</th>
				<th style="width:150px;">Order Number</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody> 
			<?php foreach($banks as $bank):?>
			<tr class="list1">
				<td><?php echo $bank->bank_name;?></td>
				<td><?php echo $bank->bank_code;?></td>
				<td><?php echo $bank->bank_accountNumberLength==0?'Varied':$bank->bank_accountNumberLength;?></td>
				<td><?php echo $bank->bank_branchCodeHead;?></td>
				<td><?php echo $bank->bank_branchCodeBodyLength;?></td>
				<td><?php echo $bank->bank_accountNumberRetainBranch==1?'Yes':'No';?></td>
				<td><?php echo $bank->bank_status==1?'Normal':'Unused';?></td>
				<td><?php echo $bank->bank_order;?></td>
				<td>
					<a href="/admin/bankedit?bankId=<?php echo $bank->bank_id;?>" target="_blank">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delBank('<?php echo $bank->bank_id;?>','Sure to delete it?<<?php echo $bank->bank_name;?>>？','Success deleted <?php echo $bank->bank_name;?>')">Delete</a>
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