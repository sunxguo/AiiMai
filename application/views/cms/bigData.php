<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Q-Inventory Management</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Register Date
					</td>
					<td class="value width30p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Search Condition
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">All</option>
							<option value="T">Q-Inventory Code</option>
							<option value="C">Master Title</option>
							<option value="G">Item Code</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						ON/OFF
					</td>
					<td class="value width10p tal">
						<select style="height: 30px;">
							<option value="">All</option>
							<option value="01001" selected="selected">Use</option>
							<option value="01002">No Use</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Seller Code</td>
					<td class="field width6p br">Q-Inventory Code</td>
					<td class="field width6p br">Q-Inventory Title</td>
					<td class="field width6p br">No. of Inventory</td>
					<td class="field width6p br">Total Qty</td>
					<td class="field width6p br">Use Branch</td>
					<td class="field width6p br">BDM_Title</td>
					<td class="field width6p">Register Date</td>
				  </tr>
				  <tr>
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
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					Q-Inventory Code
				</td>
				<td class="field width20p tac br">
					Seller Code
				</td>
				<td class="field width20p tac br">
					Reference Item Code
				</td>
				<td class="field width20p tac br">
					Q-Inventory Title
				</td>
				<td class="field width20p tac br">
					Use Branch
				</td>
			  </tr>
			  <tr style="border-top:1px solid #ddd;">
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value">
					<select style="height: 30px;">
						<option value="Y">Yes</option>
						<option value="N" selected="selected">No</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					Authorized Seller
				</td>
				<td class="value tal" colspan="4">
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Select</button>
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">Register</button>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">EDIT</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">DELETE</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Manage Inventory Option Info.(*Please press Enter Key after modifying Qty/Price in the cell.)</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">Seller Sku Code</td>
					<td class="field width6p br">Q-Inventory Code</td>
					<td class="field width6p br">Q-Inventory Sub Code</td>
					<td class="field width6p br">Qty</td>
					<td class="field width6p br">Price</td>
					<td class="field width6p br">Currency</td>
					<td class="field width6p br">No. of Linked Items</td>
					<td class="field width6p">Branch Qty</td>
				  </tr>
				  <tr>
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
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					Qty
				</td>
				<td class="field width20p tac br">
					Price
				</td>
				<td class="field width20p tac br">
					Currency
				</td>
				<td class="field width20p tac br">
					Seller Sku Code
				</td>
			  </tr>
			  <tr style="border-top:1px solid #ddd;">
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
				<td class="value">
					<select style="height: 30px;">
						<option value="CNY">CNY</option>
						<option value="HKD">HKD</option>
						<option value="IDR">IDR</option>
						<option value="JPY">JPY</option>
						<option value="MYR">MYR</option>
						<option value="SGD">SGD</option>
						<option value="USD">USD</option>
					</select>
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">ADD</button>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">EDIT</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">DELETE</button>
					<button onclick=";" type="button" class="km-btn km-btn-info" style="height: 28px;font-size: 12px;padding: 5px 20px;">Linked Items</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>