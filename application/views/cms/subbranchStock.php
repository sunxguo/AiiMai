<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/inventory">Setting Q-Inventory</a></li>
	  <li class="active"><a href="/cms/subbranchStock">Branch Inventories</a></li>
	  <li><a href="/cms/multipleDelivery">Multi Branch Delivery Management</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Inventory Option List</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Search Condition
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">== All ==</option>
							<option value="S">Seller Inven Code</option>
							<option value="O">Inventory Option</option>
							<option value="I">Inventory Title</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Branch
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">==Select==</option>
						</select>
						<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
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
					<td class="field width6p br">Seller Inven Code</td>
					<td class="field width6p br">Inventory Option</td>
					<td class="field width6p br">Inventory Title</td>
					<td class="field width6p br">Stock</td>
					<td class="field width6p br">Price</td>
					<td class="field width6p br">Currency</td>
					<td class="field width6p br">Inventory Code</td>
					<td class="field width6p br">Inventory Code</td>
					<td class="field width6p">Branch</td>
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
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Inventory History(Branch)</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Inventory Option
					</td>
					<td class="value tal" colspan="7">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<input type="text" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="R" selected="selected">Request Date</option>
							<option value="C">End Date</option>
						</select>
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Request Type
					</td>
					<td class="value width10p tal">
						<select style="height: 30px;">
							<option value="">== All ==</option>
							<option value="80001">In</option>
							<option value="80002">Out</option>
						</select>
					</td>
					<td class="field width10p tal br">
						Status
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="">== All ==</option>
							<option value="02005">Awaiting</option>
							<option value="02004">Cancelled</option>
							<option value="02002">Confirmed</option>
						</select>
					</td>
					<td class="field width10p tal br">
						Branch
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="">==Select==</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="8">
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
					<td class="field width6p br">Seller Inven Code</td>
					<td class="field width6p br">Inventory Option</td>
					<td class="field width6p br">Request Type</td>
					<td class="field width6p br">Total Qty</td>
					<td class="field width6p br">Branch</td>
					<td class="field width6p br">Reason</td>
					<td class="field width6p br">Request Status</td>
					<td class="field width6p br">Cart no.</td>
					<td class="field width6p br">Description</td>
					<td class="field width6p br">Request Date</td>
					<td class="field width6p br">End Date</td>
					<td class="field width6p br">Branch Code</td>
					<td class="field width6p br">Inventory Code</td>
					<td class="field width6p">Request No.</td>
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
					Request No.
				</td>
				<td class="value br">
					<input type="text" class="km-form-control km-input-disabled" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
				</td>
				<td class="field width20p tac br">
					Seller Inven Code
				</td>
				<td class="value br">
					<input type="text" class="km-form-control km-input-disabled" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
				</td>
			  </tr>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width20p tac br">
					Q-Inventory Info
				</td>
				<td class="value br" colspan="3">
					<input type="text" class="km-form-control km-input-disabled" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 10%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<input type="text" class="km-form-control km-input-disabled" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
				</td>
			  </tr>
			  <tr>
				<td class="field width20p tac br">
					Request Type
				</td>
				<td class="value br">
					<select style="height: 30px;">
						<option value="">== All ==</option>
						<option value="80001">In</option>
						<option value="80002">Out</option>
						<option value="79002">Branch To Branch</option>
					</select>
				</td>
				<td class="field width20p tac br">
					Qty Requested
				</td>
				<td class="value br">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					Branch
				</td>
				<td class="value tal" colspan="3">
					<select style="height: 30px;">
						<option value="">==Select==</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					Request Status
				</td>
				<td class="value tal" colspan="3">
					<select style="height: 30px;">
						<option value="">== All ==</option>
						<option value="02005">Request</option>
						<option value="02004">Cancelled</option>
						<option value="02002">Confirmed</option>
					</select>
				</td>
			  </tr>
			  <tr class="bt1">
				<td class="field width20p tac br">
					Description
				</td>
				<td class="value tal" colspan="3">
					<input type="text" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
				</td>
			  </tr>
			  <tr>
				<td class="value tar" colspan="5">
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Request</button>
					<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">Cancel</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>