<div class="padding10 contentlist column-list">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectMerchant('<?php echo $selectPage;?>')" class="btn80">Search</a>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectMerchant('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["status"]) && $_GET["status"]==0?'selected = "selected"':'';?>>
					Imperfect Information
				</option>
                <option value="1" <?php echo isset($_GET["status"]) && $_GET["status"]==1?'selected = "selected"':'';?>>
					Pending Verify
				</option>
                <option value="2" <?php echo isset($_GET["status"]) && $_GET["status"]==2?'selected = "selected"':'';?>>
					Success
				</option>
                <option value="3" <?php echo isset($_GET["status"]) && $_GET["status"]==3?'selected = "selected"':'';?>>
					Failed
				</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Gender:</span>
			<select id="gender" onchange="selectMerchant('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["gender"]) && $_GET["gender"]==0?'selected = "selected"':'';?>>
					Male
				</option>
                <option value="1" <?php echo isset($_GET["gender"]) && $_GET["gender"]==1?'selected = "selected"':'';?>>
					Female
				</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Logo</th>
				<th style="width:200px;">Seller Shop Title</th>
				<th style="width:100px;">Avatar</th>
				<th style="width:200px;">Username</th>
				<th style="width:200px;">Email</th>
				<th style="width:100px;">Gender</th>
				<th style="width:150px;">Vip</th>
				<th style="width:100px;">Status</th>
				<th style="width:200px;">Last Login Time</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($merchants as $merchant):?>
			<tr class="list1">
				<td><img src="<?php echo $merchant->merchant_shop_icon;?>" width="54" height="43"></td>
				<td class="column-name"><a href="/home/shop?shopId=<?php echo $merchant->merchant_id;?>" target="_blank"><?php echo $merchant->merchant_shop_name;?></a></td>
				<td><img src="<?php echo $merchant->merchant_avatar;?>" width="54" height="43"></td>
				<td><?php echo $merchant->merchant_username;?></td>
				<td><?php echo $merchant->merchant_email;?></td>
				<td><?php echo $merchant->merchant_gender==0?'Male':'Female';//0:male 1:female 2:unknown?></td>
				<td><?php echo $merchant->merchant_vip_grade;?></td>
				<td><?php echo $merchant->merchant_status;//状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过 4:冻结?></td>
				<td><?php echo $merchant->merchant_lastlogin_time;?></td>
				<td>
					<a href="/home/shop?shopId=<?php echo $merchant->merchant_id;?>" target="_blank">Go</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:window.open('/admin/modifyMerchant?merchantId=<?php echo $merchant->merchant_id;?>','Edit Merchant','height=700,width=900,toolbar=no,menubar=no');">Edit</a>&nbsp;&nbsp;&nbsp;
					<?php if($merchant->merchant_status!=2):?>
					<a href="javascript:confirmMerchant('<?php echo $merchant->merchant_id;?>','Sure to confirm <<?php echo $merchant->merchant_username;?>>？','Successfully Confirmed <?php echo $merchant->merchant_username;?>')">Confirm</a>&nbsp;&nbsp;&nbsp;
					<?php else:?>
					<a href="javascript:doNotConfirmMerchant('<?php echo $merchant->merchant_id;?>','Do not confirm <<?php echo $merchant->merchant_username;?>>？','Successfully did not confirm <?php echo $merchant->merchant_username;?>')">Do Not Confirm</a>&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					<a href="javascript:delMerchant('<?php echo $merchant->merchant_id;?>','Sure to delete <<?php echo $merchant->merchant_username;?>>？','Successfully Deleted <?php echo $merchant->merchant_username;?>')">Delete</a>
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