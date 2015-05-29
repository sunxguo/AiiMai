<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="clearfix" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Payment Nation</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Shipping status
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="">== All ==</option>
							<option value="CN">China</option>
							<option value="HK">Hongkong</option>
							<option value="ID">Indonesia</option>
							<option value="JP">Japan</option>
							<option value="MY">Malaysia</option>
							<option value="SG">Singapore</option>
							<option value="US">Global</option>
						</select>
					</td>
					<td class="value tal">
						* If you choose 'All' type,the results make a little difference by local time. <br>(Applied GMT+9 hours)
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Default search settings</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Item Summary</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Shipping status	
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="ALL">All</option>
							<option value="REQW">Awaiting Payment</option>
							<option value="REQN" selected="selected">New orders</option>
							<option value="REQY">Order Confirmed</option>
							<option value="DELAY">Shipping delay</option>
						</select>
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Item code</td>
					<td class="field width6p br">Seller code</td>
					<td class="field width6p br">Shipping status</td>
					<td class="field width6p br">Item</td>
					<td class="field width6p br">Options</td>
					<td class="field width6p br">Option Code</td>
					<td class="field width6p br">Qty.</td>
					<td class="field width6p">Orders</td>
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
	</div>
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="javascript:void();">On Request(brief view)</a></li>
	  <li><a href="javascript:void();">On Request(detail view)</a></li>
	  <li><a href="javascript:void();">On Delivery/Delivered</a></li>
	</ul>
	<table class="km-table bb2 bt2 mt10">
		<tbody>
		  <tr>
			<td class="value width10p br">
				Awaiting Payment <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				New orders <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				Order Confirmed <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				Shipping delay <a href="#no">0</a>
			</td>
			<td class="value width10p br">
				Cancelling(last 2 weeks) <a href="#no">0</a>
			</td>
		  </tr>
		</tbody>
	</table>
	<table class="km-table bb2 bt2">
		<tbody>
		  <tr>
			<td class="value br">
				Shipping Method <a href="#no">0</a>
			</td>
			<td class="value br">
				Non-registered Mail <a href="#no">0</a>
			</td>
			<td class="value br">
				Standard  <a href="#no">0</a>
			</td>
			<td class="value br">
				Express(DHL,EMS,Fedex,etc.) <a href="#no">0</a>
			</td>
			<td class="value br">
				<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
			</td>
		  </tr>
		</tbody>
	</table>
	<div style="overflow:auto;">
		<table class="km-table bb2" style="overflow:scroll;width:100%;">
			<tbody>
			  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
				<td class="field width6p br">Select</td>
				<td class="field width6p br">Shipping status</td>
				<td class="field width6p br">Order no.</td>
				<td class="field width6p br">Cart no.</td>
				<td class="field width6p br">Delivery company</td>
				<td class="field width6p br">Tracking no.</td>
				<td class="field width6p br">Shipping date</td>
				<td class="field width6p br">Estimated shipping date</td>
				<td class="field width6p br">Item</td>
				<td class="field width6p br">Qty.</td>
				<td class="field width6p br">Options</td>
				<td class="field width6p br">Option Code</td>
				<td class="field width6p br">Recipient</td>
				<td class="field width6p br">Seller code</td>
				<td class="field width6p">Payment Nation</td>
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
				<td class="value br"></td>
				<td class="value"></td>
			  </tr>
			</tbody>
		</table>
	</div>
	<table class="km-table bb2 bt2">
		<tbody>
		  <tr>
			<td class="value br" rowspan="2">
				<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">All</button>
			</td>
			<td class="field br">
				Search/Download
			</td>
			<td class="value tal br">
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Download All</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Download selected</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Shipping Option Change</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search for Shipping Rate</button>
			</td>
		  </tr>
		  <tr>
			<td class="field br">
				Print
			</td>
			<td class="value tal br">
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Print address</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Print shipping statement </button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Print　Order</button>
				<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 20px;">Print Bar code label</button>
			</td>
		  </tr>
		</tbody>
	</table>
	<div class="km-panel km-panel-primary mt10 fl" style="width: 48%;">
		<div class="km-panel-heading">Order Information</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						Order no.
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field width15p tal br">
						Shipping status	
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Qty.
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field tal br">
						Gift
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Shipping Method
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Payment Nation
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
					<td class="field tal br">
						Payment method
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Item code/Item
					</td>
					<td class="value tal br" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Options
					</td>
					<td class="value tal br" colspan="3">
						Option Code<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10 fr" style="width: 48%;">
		<div class="km-panel-heading">Shipping information</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						Recipient/Information
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						Shipping address
					</td>
					<td class="value tal br">
						Country<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 20%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
						Postal Code<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 20%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 90%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						Memo to Seller
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						Delivery company
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width15p tal br">
						Desired Shipping Date
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 80%;height: 25px;padding: 0 5px;display: inline-block;font-size:10px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>