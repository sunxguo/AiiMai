<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/sellersCooperationProjects">ShoppingTalk Affiliate Reward Program</a></li>
	  <li><a href="/cms/affiliate">Affiliate结算</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Shop Standard Affiliate Program</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value width80p tal br">
						You can promote shop items by giving
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40px;height: 30px;padding: 0 5px;display: inline-block;">
						<select style="height: 30px;">
							<option value="R">%</option>
							<option value="M">S$</option>
						</select>
						of the order payment to Curators who display your items at shopping talk or Q·special.(max 10%, S$100.00 program fee per order)
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Affiliate Order List</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Delivered Date
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="" selected="selected">All</option>
							<option value="AFFILIATE_FEE_SEQNO">Program Code</option>
							<option value="GD_NO">Item Code</option>
							<option value="CONTR_NO">Order No</option>
						</select>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="value tar">
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
					<td class="field width6p br">Cart No</td>
					<td class="field width6p br">Order No</td>
					<td class="field width6p br">Item Code</td>
					<td class="field width6p br">Payment</td>
					<td class="field width6p br">Fee Type</td>
					<td class="field width6p br">Fee Rate</td>
					<td class="field width6p br">Amount</td>
					<td class="field width6p br">Delivered Date</td>
					<td class="field width6p br">Post No</td>
					<td class="field width6p br">Specials No.</td>
					<td class="field width6p br">Link</td>
					<td class="field width6p">Program Code</td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>