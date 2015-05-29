<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/inventory">Setting Q-Inventory</a></li>
	  <li><a href="/cms/subbranchStock">Branch Inventories</a></li>
	  <li class="active"><a href="/cms/multipleDelivery">Multi Branch Delivery Management</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Branch Order Assign Priority</div>
		<div class="km-panel-body" style="padding:0px;overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">BDM Code</td>
					<td class="field width6p br">Type</td>
					<td class="field width6p">BDM Title</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="field width20p tal br">
						BDM Title
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;" disabled>
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br bl1">
						Priority Type
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">
							<option value="90001">Fixed Priority</option>
						</select>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Branch Code</td>
					<td class="field width6p br">Branch Name</td>
					<td class="field width6p">Priority</td>
				  </tr>
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="value tar" colspan="5">
					    <p class="fl tal">
							※ Insert priority of delivery assignment. <br>
							(If 1st branch does not have enough stock, the order is assigned to next priority branch.) 
						</p>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Change Branch Delivery Management at Once</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p tal br">
						BDM Title
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="">Please select</option>
						</select>
					</td>
					<td class="field tal br">
						<select style="height: 30px;">
							<option value="it">Inventory Title</option>
							<option value="ic">Inventory Code</option>
							<option value="sc">Seller Code</option>
							<option value="oi">Original Item Code</option>
							<option value="li">Linked Item Code</option>
						</select>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
					<td class="field width1p br tac"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">Seller Code</td>
					<td class="field width6p br">Q-Inventory Code</td>
					<td class="field width6p br">Q-Inventory Title</td>
					<td class="field width6p">BDM Title</td>
				  </tr>
				  <tr>
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
					Change Selected
				</td>
				<td class="value tal">
					<select style="height: 30px;">
						<option value="">Please select</option>
					</select>
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">Edit</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>