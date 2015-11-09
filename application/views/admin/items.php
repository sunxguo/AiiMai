<div class="padding10 contentlist column-list">
	<div id="appDiv" class="titA tit-bot pb5" style="height:180px;">
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" class="select w100">
                <option value="-1">All</option>
				<?php foreach($status as $key=>$s):?>
                <option value="<?php echo $key;?>" <?php echo isset($_GET["status"]) && $_GET["status"]==$key?'selected = "selected"':'';?>>
					<?php echo $s;?>
				</option>
				<?php endforeach;?>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Listing Type:</span>
			<select id="listingtype" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["listingtype"]) && $_GET["listingtype"]==1?'selected = "selected"':'';?>>
					Standard Sales
				</option>
                <option value="2" <?php echo isset($_GET["listingtype"]) && $_GET["listingtype"]==2?'selected = "selected"':'';?>>
					Auction
				</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Country of Manufacture:</span>
			<select id="country" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["country"]) && $_GET["country"]==1?'selected = "selected"':'';?>>
					Domestic
				</option>
                <option value="2" <?php echo isset($_GET["country"]) && $_GET["country"]==2?'selected = "selected"':'';?>>
					Overseas
				</option>
                <!-- <option value="3" <?php echo isset($_GET["country"]) && $_GET["country"]==3?'selected = "selected"':'';?>>
					Others
				</option> -->
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Listed Date:</span>
			<input id="beginDate" type="date" value="<?php echo isset($_GET["beginDate"])?$_GET["beginDate"]:"";?>" class="km-form-control" style="width: 100px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
			 ~ 
			<input id="endDate" type="date" value="<?php echo isset($_GET["endDate"])?$_GET["endDate"]:"";?>" class="km-form-control" style="width: 100px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
		</div>
		<div style="float: right;">
			<span class="font12">Item Condition:</span>
			<select id="itemcondition" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["itemcondition"]) && $_GET["itemcondition"]==1?'selected = "selected"':'';?>>
					New Item
				</option>
                <option value="2" <?php echo isset($_GET["itemcondition"]) && $_GET["itemcondition"]==2?'selected = "selected"':'';?>>
					Used Item
				</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Price: SGD</span>
			<input id="minPrice" type="text" value="<?php echo isset($_GET["minPrice"])?$_GET["minPrice"]:"";?>" class="km-form-control" style="width: 50px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
			 ~ 
			<input id="maxPrice" type="text" value="<?php echo isset($_GET["maxPrice"])?$_GET["maxPrice"]:"";?>" class="km-form-control" style="width: 50px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Available Period:</span>
			<select class="select w100" id="availableperiod" onchange="if($(this).val()==0) $('#AvailablePeriodRange').show();else $('#AvailablePeriodRange').hide();">
				<option value="-1">All</option>
				<option value="1" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==1?'selected = "selected"':'';?>>1 day</option>  
				<option value="2" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==2?'selected = "selected"':'';?>>2 days</option> 
				<option value="3" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==3?'selected = "selected"':'';?>>3 days</option>   
				<option value="7" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==7?'selected = "selected"':'';?>>1 weeks</option>  
				<option value="14" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==14?'selected = "selected"':'';?>>2 weeks</option>
				<option value="30" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==30?'selected = "selected"':'';?>>1 month</option>
				<option value="90" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==90?'selected = "selected"':'';?>>3 months</option>
				<option value="180" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==180?'selected = "selected"':'';?>>6 months</option>
				<option value="365" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==365?'selected = "selected"':'';?>>1 year</option>
				<option value="10000" <?php echo isset($_GET["availableperiod"]) && $_GET["availableperiod"]==10000?'selected = "selected"':'';?>>Infinite</option>
				<!--<option value="0">Date Range</option>-->
			</select>
			<div id="AvailablePeriodRange" style="display:none;float:left;margin-left:10px;">
				<input id="AvailablePeriodBegin" type="date" class="inp-txt"> ~ 
				<input id="AvailablePeriodEnd" type="date" class="inp-txt">
			</div>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Adult Item:</span>
			<select id="adultitem" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["adultitem"]) && $_GET["adultitem"]==1?'selected = "selected"':'';?>>
					Yes
				</option>
                <option value="0" <?php echo isset($_GET["adultitem"]) && $_GET["adultitem"]==0?'selected = "selected"':'';?>>
					No
				</option>
            </select>
		</div>
		<div style="float: right;">
			<span class="font12">Main Category:</span>
			<select id="category" onchange="mainCategoryChange();" class="select w100">
                <option value="-1">All</option>
				<?php foreach($categories as $cat):?>
				<optgroup label="<?php echo $cat->category_name;?>">
					<?php foreach($cat->subCats as $subCat):?>
						<option value="<?php echo $subCat->category_id;?>" <?php if(isset($_GET["category"]) && $_GET["category"]==$subCat->category_id):?>selected<?php endif;?>><?php echo $subCat->category_name;?></option>
					<?php endforeach;?>
				</optgroup>
				<?php endforeach;?>
            </select>

			<span class="font12">1st Sub Category:</span>
			<select id="subcategory" onchange="stSubCategoryChange();" class="select w100">
                <option value="-1">All</option>
            </select>

			<span class="font12">2nd Sub Category:</span>
			<select id="subsubcategory" class="select w100">
                <option value="-1">All</option>
            </select>
		</div>
		<div style="float: right;margin-left:10px;position:relative;">
			<input type="text" id="keyword" placeholder="Item" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<input type="text" id="merchant" placeholder="Merchant" class="inp-txt width100" value="<?php echo isset($_GET["merchant"])?$_GET["merchant"]:"";?>">
			
			<div id="merchantDropDown" class="dropdown-list">
				<ul>
					<li>...</li>
				</ul>
			</div>
			<a href="javascript:selectItem('<?php echo $selectPage;?>')" class="btn80">Search</a>
			<button onclick="productQuery(true);" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding:0px 10px;">Excel</button>
		</div>
		<div class="clear">
		</div>
	</div>
	<input id="orderName" type="hidden" value="<?php echo isset($_GET['orderName'])?$_GET['orderName']:'';?>">
	<input id="orderPrice" type="hidden" value="<?php echo isset($_GET['orderPrice'])?$_GET['orderPrice']:'';?>">
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:30px;"><input type="checkbox" id="checkAll"></th>
				<th style="width:100px;">Thumbnail</th>
				<th style="width:200px;" class="field-order" onclick="orderItem('<?php echo $selectPage;?>','name')">Name <?php if(isset($_GET['orderName'])){if($_GET['orderName']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:150px;" class="field-order" onclick="orderItem('<?php echo $selectPage;?>','price')">Sell Price <?php if(isset($_GET['orderPrice'])){if($_GET['orderPrice']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:200px;">Retail Price</th>
				<th style="width:200px;">Main Category</th>
				<th style="width:220px;">1st Sub Category</th>
				<th style="width:220px;">2nd Sub Category</th>
				<th style="width:150px;">Listing Type</th>
				<th style="width:150px;">Available Period</th>
				<th style="width:150px;">Item Condition</th>
				<th style="width:150px;">Country of Manufacture</th>
				<th style="width:150px;">Adult Item</th>
				<th style="width:150px;">Time</th>
				<th style="width:80px;">Status</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items as $item):?>
			<tr class="list1">
				<td><input type="checkbox" name="checkedUserId" value="<?php echo $item->product_id;?>"></td>
				<td><img src="<?php echo $item->product_image;?>" width="60" height="60"></td>
				<td class="column-name"><a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank"><?php echo $item->product_item_title_english;?></a></td>
				<td><?php echo $item->product_sell_price;?></td>
				<td><?php echo $item->product_reference_price;?></td>
				<td><?php echo $item->product_category;?></td>
				<td><?php echo $item->product_sub_category;?></td>
				<td><?php echo $item->product_sub_sub_category;?></td>
				<td><?php echo $item->product_sell_format;?></td>
				<td><?php echo $item->product_available_period==10000?'Infinite':$item->product_available_period.' days';?></td>
				<td><?php echo $item->product_item_condition==1?'New Item':'Used Item';?></td>
				<td><?php echo ($item->product_production_place_code==1?'Local-Singapore':'Overseas-'.($item->product_production_place_detail));?></td>
				<td><?php echo $item->product_adult==0?'No':'Yes';?></td>
				<td><?php echo $item->product_time;?></td>
				<td>
					<span class="km-label 
						<?php if($item->product_status==1):?>km-label-primary<?php endif;?>
						<?php if($item->product_status==2):?>km-label-info<?php endif;?>
						<?php if($item->product_status==3):?>km-label-success<?php endif;?>
						<?php if($item->product_status==4):?>km-label-danger<?php endif;?>
						<?php if($item->product_status==5):?>km-label-warning<?php endif;?>
						<?php if($item->product_status==6):?>km-label-default<?php endif;?>
						"><?php echo $status[$item->product_status];?>
					</span>
				</td>
				<td>
					<a href="/home/item?itemId=<?php echo $item->product_id;?>" target="_blank">Preview</a> |
					<a href="javascript:showStatus('<?php echo $item->product_item_title_english;?>','<?php echo $item->product_id;?>','<?php echo $item->product_status;?>');">Status</a> |
					<a href="javascript:window.open('/admin/modifyItem?itemId=<?php echo $item->product_id;?>','Edit Item','height=700,width=900,toolbar=no,menubar=no');">Edit</a> |
					<a href="javascript:delItem('<?php echo $item->product_id;?>','Sure to delete <<?php echo $item->product_item_title_english;?>>？','Successfully deleted <?php echo $item->product_item_title_english;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div>
		<button onclick="deleteCheckedItems();" type="button" class="km-btn km-btn-danger" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Delete</button>
		<button onclick="setDivCenter('#statusCheckedItemsDiv',true);" type="button" class="km-btn km-btn-success" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Status</button>
		<div class="km-modal-dialog width40p" id="statusCheckedItemsDiv">
			<div class="km-modal-content">
				<div class="km-modal-header">
					<button type="button" class="km-close"><span>&times;</span></button>
					<h4 class="km-modal-title">Delete Items</h4>
				</div>
				<div class="km-modal-body">
					<select id="statusChanged" class="select w100">
						<option value="1">Under Review</option>
						<option value="2">On queue</option>
						<option value="3">Available</option>
						<option value="4">Deleted</option>
						<option value="5">Suspended</option>
						<option value="6">Rejected</option>
					</select>
				</div>
				<div class="km-modal-footer">
					<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
					<button type="button" class="km-btn km-btn-primary" onclick="statusCheckedItems();">Save</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="km-modal-dialog width40p" id="statusDialog">
		<div class="km-modal-content">
			<div class="km-modal-header">
				<button type="button" class="km-close"><span>&times;</span></button>
				<h4 class="km-modal-title"><span id="productName"></span> - Change Status</h4>
			</div>
			<div class="km-modal-body">
				<select id="productStatus" style="display:block;height: 30px;">
					<option value="1">Under Review</option>
				    <option value="2">On queue</option>
					<option value="3">Available</option>
				    <option value="4">Deleted</option>
				    <option value="5">Suspended</option>
				    <option value="6">Rejected</option>
				</select>
			</div>
			<div class="km-modal-footer">
				<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
				<button type="button" class="km-btn km-btn-primary" onclick="saveProductStatus();"><?php echo lang('cms_sider_Savechanges');?></button>
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
<script type="text/javascript">
$(document).ready(function(){
	mainCategoryChange();
	$("#merchant").focus(function(){
		$("#merchantDropDown").show();
	});
	// $("#merchant").blur(function(){
	// 	$("#merchantDropDown").hide();
	// });
	$("#merchant").on('input',function(e){
		$("#merchantDropDown ul").html('<li>...</li>');
		var merchantList = new Object();
		merchantList.likeUsername = $("#merchant").val();
		dataHandler("get","merchantList",merchantList,successGetMerchantList,null,null,null,false); 
	});
});
function selectMerchant(tag){
	$("#merchant").val($(tag).text());
	$("#merchantDropDown").hide();
}
function successGetMerchantList(data){
	$("#merchantDropDown ul").html('');
	for(var i=0;i<data.length;i++){
		//alert(data[i].user_username);
		$("#merchantDropDown ul").append("<li onclick='selectMerchant(this);'>"+data[i].user_username+"</li>");
	}
}
</script>