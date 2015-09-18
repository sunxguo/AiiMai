<div class="main-floor no-border panel" style="overflow:visible;">
	<?php require("personalInfoCommon.php");?>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Wish List</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="border:1px solid #ddd;">
				<tbody>
					<tr>
						<th style="width:5%"><input type="checkbox" id="allCheck"></th>
						<th style="width:65%">Product Info</th>
						<th style="width:15%">Expiring Time</th>
						<th style="width:15%">Time</th>
					</tr>
					<?php foreach ($wishlists as $value):?>
					<tr>
						<td class="tac">
							<input id="<?php echo $value->wishlist_id;?>" type="checkbox" class="checkShop">
						</td>
						<td>
							<div class="fl">
								<a target="_blank" href="/home/item?itemId=<?php echo $value->product->product_id;?>">
									<img src="<?php echo $value->product->product_image;?>" width="100">
								</a>
							</div>
							<div class="fl" style="margin-left:20px;padding-top:20px;">
								<a style="display:block;color:#337ab7;font-weight:600;" target="_blank" href="/home/item?itemId=<?php echo $value->product->product_id;?>"><?php echo $value->product->product_item_title_english;?></a>
								<p>
									<?php echo $value->product->product_sell_price;?>
								</p>
							</div>
						</td>
						<td class="tac">
							<?php 
								$leftday=$value->product->product_available_period-floor((time()-strtotime($value->product->product_time))/(3600*24));
								if($leftday<0){
									echo 'Expired';
								}elseif($leftday>500){
									echo 'Infinite';
								}else{
									echo $leftday.' days';
								}
							?>
						</td>
						<td>
							<?php echo $value->wishlist_time;?>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<button onclick="deleteBulkWishList();" type="button" class="km-btn km-btn-danger" style="height: 25px;padding: 0px 10px;font-size: 12px;margin: 10px 0 5px 10px;">Delete</button>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#allCheck").click(function(){
		$(".checkShop").prop('checked',$("#allCheck").prop('checked'));
	});
});
function deleteBulkWishList(){
	var follows=[];
	$('.checkShop').each(function(index){
		if($(this).prop('checked')==true){
			follows.push($(this).attr('id'));
		}
	});
	if(follows.length<1){
		showAlert('danger','Please select products!',"");
	}else{
		var wishlists=new Object();
		wishlists.idArray=follows;
		dataHandler('delBulk','wishlists',wishlists,afterDeleteBulk,null,null,null,false);
	}
}
function afterDeleteBulk () {
	showAlert('success','Success!',"Refreshing...");
	location.reload();
}
</script>