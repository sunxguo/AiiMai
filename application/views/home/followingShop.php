<div class="main-floor no-border panel" style="overflow:visible;">
	<?php require("personalInfoCommon.php");?>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Following Shop</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="border:1px solid #ddd;">
				<tbody>
					<tr>
						<th style="width:5%"><input type="checkbox" id="allCheck"></th>
						<th style="width:80%">Shop Info</th>
						<th style="width:15%">Time</th>
					</tr>
					<?php foreach ($follows as $value):?>
					<tr>
						<td class="tac">
							<input id="<?php echo $value->follow_id;?>" type="checkbox" class="checkShop">
						</td>
						<td>
							<div class="fl">
								<a href="/home/shop?shopId=<?php echo $value->merchant->user_id;?>" target="_blank">
									<img src="<?php echo $value->merchant->merchant_shop_icon;?>" width="100">
								</a>
							</div>
							<div class="fl" style="margin-left:20px;padding-top:20px;">
								<a style="display:block;color:#337ab7;font-weight:600;" target="_blank" href="/home/shop?shopId=<?php echo $value->merchant->user_id;?>"><?php echo $value->merchant->merchant_shop_name;?></a>
								<p>
									<?php echo $value->merchant->merchant_shop_welcome;?>
								</p>
							</div>
						</td>
						<td>
							<?php echo $value->follow_time;?>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<button onclick="deleteBulkFollowShop();" type="button" class="km-btn km-btn-danger" style="height: 25px;padding: 0px 10px;font-size: 12px;margin: 10px 0 5px 10px;">Delete</button>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#allCheck").click(function(){
		$(".checkShop").prop('checked',$("#allCheck").prop('checked'));
	});
});
function deleteBulkFollowShop(){
	var follows=[];
	$('.checkShop').each(function(index){
		if($(this).prop('checked')==true){
			follows.push($(this).attr('id'));
		}
	});
	if(follows.length<1){
		showAlert('danger','Please select shops!',"");
	}else{
		var followShops=new Object();
		followShops.idArray=follows;
		dataHandler('delBulk','follows',followShops,afterDeleteBulk,null,null,null,false);
	}
}
function afterDeleteBulk () {
	showAlert('success','Success!',"Refreshing...");
	location.reload();
}
</script>