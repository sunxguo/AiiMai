<div class="main-floor no-border panel" style="overflow:visible;">
	<?php require("personalInfoCommon.php");?>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">My enquiries</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="border:1px solid #ddd;">
				<tbody>
					<tr>
						<th style="width:5%"><input type="checkbox" id="allCheck"></th>
						<th style="width:25%">Product Info</th>
						<th style="width:40%">Question</th>
						<th style="width:15%">Answer</th>
						<th style="width:15%">Time</th>
					</tr>
					<?php foreach ($enquiries as $value):?>
					<tr>
						<td class="tac">
							<input id="<?php echo $value->enquiry_id;?>" type="checkbox" class="checkShop">
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
									S$ <?php echo $value->product->product_sell_price;?>
								</p>
							</div>
						</td>
						<td class="tac">
							<div>
								Subject: <?php echo $value->enquiry_subject;?>
							</div>
							<div>
								Content: <?php echo $value->enquiry_content;?>
							</div>
						</td>
						<td class="tac">
							<?php echo $value->enquiry_answer;?>
						</td>
						<td>
							<?php echo $value->enquiry_time;?>
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