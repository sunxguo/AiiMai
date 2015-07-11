<div class="main-floor no-border panel" style="overflow:visible;">
	<?php require("personalInfoCommon.php");?>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Won Item</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="border:1px solid #ddd;">
				<tbody>
					<tr>
						<td class="field width10p br tac">
							<select id="" name="" style="width:115px;height:25px;">
								<option selected="selected" value="gd_nm">Item Title</option>
								<option value="pack_no">Cart no.</option>
							</select>
						</td>
						<td class="value width40p br">
							<input type="text" id="" class="inp-txt" style="height: 15px;">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 12px;padding: 3px 20px;">Search</button>
						</td>
						<td class="field width10p br tac">Status</td>
						<td class="value width40p">
							<select name="" id="" onchange="" style="height:25px;">
								<option value="">All</option>
								<option value="D1">Payment Pending</option>
								<option value="D2">Order Processing</option>
								<option value="DY">Order Confirmed</option>
								<option value="D3">Delivering</option>
								<option value="D4">Delivered</option>
								<option value="CD">Unconfirmed</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="field br tac">Select Date</td>
						<td class="value" colspan="3">
							<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 150px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 150px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Cart no.(Date)</td>
					<td class="field width6p br">Item</td>
					<td class="field width6p br">Qty</td>
					<td class="field width6p br">Payment</td>
					<td class="field width6p br">Shipping</td>
					<td class="field width6p br">Status</td>
					<td class="field width6p">Remarks</td>
				  </tr>
				  <!--
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				  -->
				  <tr>
					<td class="value br" colspan="7">There is no shopping list for 3 months.</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>