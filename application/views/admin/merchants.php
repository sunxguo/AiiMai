<div class="padding10 contentlist column-list">
	<div id="appDiv" class="titA tit-bot pb5" style="height: 90px;">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectMerchant('<?php echo $selectPage;?>')" class="btn80">Search</a>
			<button onclick="merchantQuery(true);" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding:0px 10px;">Excel</button>
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
		<div style="float: right;margin-right:10px;">
			<span class="font12">Grade:</span>
			<select id="grade" onchange="selectMerchant('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["grade"]) && $_GET["grade"]==0?'selected = "selected"':'';?>>
					Platinum
				</option>
                <option value="1" <?php echo isset($_GET["grade"]) && $_GET["grade"]==1?'selected = "selected"':'';?>>
					Gold
				</option>
                <option value="2" <?php echo isset($_GET["grade"]) && $_GET["grade"]==2?'selected = "selected"':'';?>>
					Silver
				</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Country:</span>
			<select id="country" onchange="selectMerchant('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
				<option value="SG" <?php echo isset($_GET["country"]) && $_GET["country"]=='SG'?'selected = "selected"':'';?>>Singapore</option>
				<option value="AU" <?php echo isset($_GET["country"]) && $_GET["country"]=='AU'?'selected = "selected"':'';?>>Australia</option>
				<option value="BR" <?php echo isset($_GET["country"]) && $_GET["country"]=='BR'?'selected = "selected"':'';?>>Brazil</option>
				<option value="BN" <?php echo isset($_GET["country"]) && $_GET["country"]=='BN'?'selected = "selected"':'';?>>Brunei Darussalam</option>
				<option value="CA" <?php echo isset($_GET["country"]) && $_GET["country"]=='CA'?'selected = "selected"':'';?>>Canada</option>
				<option value="CN" <?php echo isset($_GET["country"]) && $_GET["country"]=='CN'?'selected = "selected"':'';?>>China</option>
				<option value="DK" <?php echo isset($_GET["country"]) && $_GET["country"]=='DK'?'selected = "selected"':'';?>>Denmark</option>
				<option value="EG" <?php echo isset($_GET["country"]) && $_GET["country"]=='EG'?'selected = "selected"':'';?>>Egypt</option>
				<option value="FI" <?php echo isset($_GET["country"]) && $_GET["country"]=='FI'?'selected = "selected"':'';?>>Finland</option>
				<option value="FR" <?php echo isset($_GET["country"]) && $_GET["country"]=='FR'?'selected = "selected"':'';?>>France</option>
				<option value="DE" <?php echo isset($_GET["country"]) && $_GET["country"]=='DE'?'selected = "selected"':'';?>>Germany</option>
				<option value="GR" <?php echo isset($_GET["country"]) && $_GET["country"]=='GR'?'selected = "selected"':'';?>>Greece</option>
				<option value="HK" <?php echo isset($_GET["country"]) && $_GET["country"]=='HK'?'selected = "selected"':'';?>>Hong Kong</option>
				<option value="HU" <?php echo isset($_GET["country"]) && $_GET["country"]=='HU'?'selected = "selected"':'';?>>Hungary</option>
				<option value="IN" <?php echo isset($_GET["country"]) && $_GET["country"]=='IN'?'selected = "selected"':'';?>>India</option>
				<option value="ID" <?php echo isset($_GET["country"]) && $_GET["country"]=='ID'?'selected = "selected"':'';?>>Indonesia</option>
				<option value="IL" <?php echo isset($_GET["country"]) && $_GET["country"]=='IL'?'selected = "selected"':'';?>>Israel</option>
				<option value="IT" <?php echo isset($_GET["country"]) && $_GET["country"]=='IT'?'selected = "selected"':'';?>>Italy</option>
				<option value="JP" <?php echo isset($_GET["country"]) && $_GET["country"]=='JP'?'selected = "selected"':'';?>>Japan</option>
				<option value="KW" <?php echo isset($_GET["country"]) && $_GET["country"]=='KW'?'selected = "selected"':'';?>>Kuwait</option>
				<option value="MO" <?php echo isset($_GET["country"]) && $_GET["country"]=='MO'?'selected = "selected"':'';?>>Macau</option>
				<option value="MY" <?php echo isset($_GET["country"]) && $_GET["country"]=='MY'?'selected = "selected"':'';?>>Malaysia</option>
				<option value="MX" <?php echo isset($_GET["country"]) && $_GET["country"]=='MX'?'selected = "selected"':'';?>>Mexico</option>
				<option value="MM" <?php echo isset($_GET["country"]) && $_GET["country"]=='MM'?'selected = "selected"':'';?>>Myanma</option>
				<option value="NL" <?php echo isset($_GET["country"]) && $_GET["country"]=='NL'?'selected = "selected"':'';?>>Netherlands</option>
				<option value="NZ" <?php echo isset($_GET["country"]) && $_GET["country"]=='NZ'?'selected = "selected"':'';?>>New Zealand</option>
				<option value="NO" <?php echo isset($_GET["country"]) && $_GET["country"]=='NO'?'selected = "selected"':'';?>>Norway</option>
				<option value="PH" <?php echo isset($_GET["country"]) && $_GET["country"]=='PH'?'selected = "selected"':'';?>>Philippines</option>
				<option value="PL" <?php echo isset($_GET["country"]) && $_GET["country"]=='PL'?'selected = "selected"':'';?>>Poland</option>
				<option value="PT" <?php echo isset($_GET["country"]) && $_GET["country"]=='PT'?'selected = "selected"':'';?>>Portugal</option>
				<option value="RU" <?php echo isset($_GET["country"]) && $_GET["country"]=='RU'?'selected = "selected"':'';?>>Russia</option>
				<option value="SG" <?php echo isset($_GET["country"]) && $_GET["country"]=='SG'?'selected = "selected"':'';?>>Singapore</option>
				<option value="KR" <?php echo isset($_GET["country"]) && $_GET["country"]=='KR'?'selected = "selected"':'';?>>South Korea</option>
				<option value="ES" <?php echo isset($_GET["country"]) && $_GET["country"]=='ES'?'selected = "selected"':'';?>>Spain</option>
				<option value="SE" <?php echo isset($_GET["country"]) && $_GET["country"]=='SE'?'selected = "selected"':'';?>>Sweden</option>
				<option value="CH" <?php echo isset($_GET["country"]) && $_GET["country"]=='CH'?'selected = "selected"':'';?>>Switzerland</option>
				<option value="TW" <?php echo isset($_GET["country"]) && $_GET["country"]=='TW'?'selected = "selected"':'';?>>Taiwan</option>
				<option value="TH" <?php echo isset($_GET["country"]) && $_GET["country"]=='TH'?'selected = "selected"':'';?>>Thailand</option>
				<option value="TR" <?php echo isset($_GET["country"]) && $_GET["country"]=='TR'?'selected = "selected"':'';?>>Turkey</option>
				<option value="GB" <?php echo isset($_GET["country"]) && $_GET["country"]=='GB'?'selected = "selected"':'';?>>United Kingdom</option>
				<option value="US" <?php echo isset($_GET["country"]) && $_GET["country"]=='US'?'selected = "selected"':'';?>>United States</option>
				<option value="VN" <?php echo isset($_GET["country"]) && $_GET["country"]=='VN'?'selected = "selected"':'';?>>Vietnam</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<input id="orderShopTitle" type="hidden" value="<?php echo isset($_GET['orderShopTitle'])?$_GET['orderShopTitle']:'';?>">
	<input id="orderUser" type="hidden" value="<?php echo isset($_GET['orderUser'])?$_GET['orderUser']:'';?>">
	<input id="orderEmail" type="hidden" value="<?php echo isset($_GET['orderEmail'])?$_GET['orderEmail']:'';?>">
	<input id="orderGrade" type="hidden" value="<?php echo isset($_GET['orderGrade'])?$_GET['orderGrade']:'';?>">
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:30px;"><input type="checkbox" id="checkAll"></th>
				<th style="width:100px;">Logo</th>
				<th style="width:200px;" class="field-order" onclick="orderMerchant('<?php echo $selectPage;?>','shop')">Seller Shop Title <?php if(isset($_GET['orderShopTitle'])){if($_GET['orderShopTitle']=='desc') echo '↑';else echo '↓';}?></th>
				<!-- <th style="width:100px;">Avatar</th> -->
				<th style="width:150px;" class="field-order" onclick="orderMerchant('<?php echo $selectPage;?>','username')">Username <?php if(isset($_GET['orderUser'])){if($_GET['orderUser']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:160px;" class="field-order" onclick="orderMerchant('<?php echo $selectPage;?>','email')">Email <?php if(isset($_GET['orderEmail'])){if($_GET['orderEmail']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:100px;">Country</th>
				<th style="width:100px;">Gender</th>
				<th style="width:80px;" class="field-order" onclick="orderMerchant('<?php echo $selectPage;?>','grade')">Grade <?php if(isset($_GET['orderGrade'])){if($_GET['orderGrade']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:100px;">Status</th>
				<th style="width:200px;">Registration Time</th>
				<th style="width:200px;">Total Sales (Last 14 days)</th>
				<th style="width:200px;">Total Sales (Last 30 days)</th>
				<th style="width:200px;">Total Items</th>
				<th style="width:200px;">Total Available Items</th>
				<th style="width:280px;">Contact</th>
				<th style="width:150px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($merchants as $merchant):?>
			<tr class="list1">
				<td><input type="checkbox" name="checkedUserId" value="<?php echo $merchant->user_id;?>"></td>
				<td><img src="<?php echo $merchant->merchant_shop_icon;?>" width="54" height="43"></td>
				<td class="column-name"><a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank"><?php echo $merchant->merchant_shop_name;?></a></td>
				<!-- <td><img src="<?php echo $merchant->user_avatar;?>" width="54" height="43"></td> -->
				<td><?php echo $merchant->user_username;?></td>
				<td><?php echo $merchant->user_email;?></td>
				<td><?php echo $merchant->country;?></td>
				<td><?php echo $merchant->user_gender==0?'Male':'Female';//0:male 1:female 2:unknown?></td>
				<td><?php echo $merchant->user_grade;?></td>
				<td>
					<?php //echo $merchant->merchant_status;状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过 4:冻结?>
					<span class="km-label 
						<?php if($merchant->merchant_status==0):?>km-label-info<?php endif;?>
						<?php if($merchant->merchant_status==1):?>km-label-warning<?php endif;?>
						<?php if($merchant->merchant_status==2):?>km-label-success<?php endif;?>
						<?php if($merchant->merchant_status==3):?>km-label-danger<?php endif;?>
						<?php if($merchant->merchant_status==4):?>km-label-default<?php endif;?>
						"><?php echo $status[$merchant->merchant_status];?>
					</span>
				</td>
				<td><?php echo $merchant->user_reg_time;?></td>
				<td><?php echo $merchant->total14;?></td>
				<td><?php echo $merchant->total30;?></td>
				<td><?php echo $merchant->allitemsnumber;?></td>
				<td><?php echo $merchant->availableitemsnumber;?></td>
				<td>
					<div class="gsm_phone">
						Mobile:<?php echo $merchant->merchant_phone1.'-'.$merchant->merchant_phone2.'-'.$merchant->merchant_phone3;?>
					</div>
					<div class="gsm_home">
						Phone:<?php echo $merchant->merchant_homephone1.'-'.$merchant->merchant_homephone2.'-'.$merchant->merchant_homephone3;?>
					</div>
				</td>
				<td>
					<a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank">Go</a> |
					<a href="javascript:window.open('/admin/modifyMerchant?merchantId=<?php echo $merchant->user_id;?>','Edit Merchant','height=700,width=900,toolbar=no,menubar=no');">Edit</a> |
					<a href="javascript:showMerchantStatus('<?php echo $merchant->user_username;?>','<?php echo $merchant->user_id;?>','<?php echo $merchant->merchant_status;?>');">Status</a> |
					<a href="javascript:delMerchant('<?php echo $merchant->user_id;?>','Sure to delete <<?php echo $merchant->user_username;?>>？The products in this shop will be deleted too.','Successfully Deleted <?php echo $merchant->user_username;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div>
		<button onclick="deleteCheckedMerchants();" type="button" class="km-btn km-btn-danger" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Delete</button>
		<button onclick="setDivCenter('#statusCheckedMerchantsDiv',true);" type="button" class="km-btn km-btn-success" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Status</button>
		<div class="km-modal-dialog width40p" id="statusCheckedMerchantsDiv">
			<div class="km-modal-content">
				<div class="km-modal-header">
					<button type="button" class="km-close"><span>&times;</span></button>
					<h4 class="km-modal-title">Change Status</h4>
				</div>
				<div class="km-modal-body">
					<select id="statusChanged" class="select w100">
						<option value="0">Need More Info.</option>
						<option value="1">Under Review</option>
						<option value="2">Pass</option>
						<option value="3">No Pass</option>
						<option value="4">Frozen</option>
					</select>
				</div>
				<div class="km-modal-footer">
					<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
					<button type="button" class="km-btn km-btn-primary" onclick="statusCheckedMerchants();">Save</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="km-modal-dialog width40p" id="statusDialog">
		<div class="km-modal-content">
			<div class="km-modal-header">
				<button type="button" class="km-close"><span>&times;</span></button>
				<h4 class="km-modal-title"><span id="userName"></span> - Change Status</h4>
			</div>
			<div class="km-modal-body">
				<select id="merchantStatus" style="height: 30px;">
					<option value="0">Need More Info.</option>
					<option value="1">Under Review</option>
				    <option value="2">Pass</option>
					<option value="3">No Pass</option>
				    <option value="4">Frozen</option>
				</select>
				<input type="checkbox" id="notifySellerStatus" style="vertical-align: middle;" checked><label for="notifySellerStatus" style="font-weight:normal;margin-left:5px;">Notify the seller by email.</label>
			</div>
			<div class="km-modal-footer">
				<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
				<button type="button" class="km-btn km-btn-primary" onclick="saveMerchantStatus();"><?php echo lang('cms_sider_Savechanges');?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
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