<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Special Discount</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Discount Date
					</td>
					<td class="value tal br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Discount Type
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" selected="selected">All</option>
							<option value="TD">Time Sale</option>
							<option value="PD">Promotion Discount</option>
							<option value="FW">Shop Fellow Discount</option>
							<option value="MQ">MameQ·chance</option>
						</select>
					</td>
					<td class="value" rowspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Status
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="S2">Available</option>
							<option value="S3">Finished</option>
						</select>
					</td>
					<td class="field width10p tal br">
						Search
					</td>
					<td class="value width30p tal br">
						<select style="height: 30px;" id="stock">
							<option value="">Select</option>
							<option value="GD_NO">Item Code</option>
							<option value="GD_NM">Item Title</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Type</td>
					<td class="field width6p br">Item No</td>
					<td class="field width15p tac br">Item Title</td>
					<td class="field width6p br">Qty</td>
					<td class="field width6p br">Price</td>
					<td class="field width6p br">Discounted Price</td>
					<td class="field width6p br">Discount Limit</td>
					<td class="field width6p br">Discount Date</td>
					<td class="field width6p">Time Zone</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>