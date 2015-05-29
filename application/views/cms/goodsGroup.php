<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">
			Set Sales Groups    - This function help customers purchase other items as options buying this item.
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -305px;width: 620px; max-width:656px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title">Set Sales Option</h3>
				  <div class="km-popover-content">
					<p><img src="/assets/images/cms/plus_group_option.jpg"></p>
				  </div>
				</div>
			</div>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p tac br">
						Register Date
					</td>
					<td class="field width10p tac br">
						Plus Group Type
					</td>
					<td class="field width10p tac br">
						in progress
					</td>
					<td class="field width20p tac br">
						Detail Search
					</td>
				  </tr>
				  <tr>
					<td class="value tac br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">all</option>
							<option value="IT">Set Item</option>
							<option value="MN">Seller shop (All items)</option>
						</select>
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">all</option>
							<option value="Y">Y</option>
							<option value="N">N</option>
						</select>
					</td>
					<td class="value tac br">
						<select style="height: 30px;">
							<option value="" selected="">all</option>
							<option value="NM">Set Sales Group Title</option>
							<option value="GC">Item Code</option>
							<option value="SC">Seller Code</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 50%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
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
			<table class="km-table bb2" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br">Select</td>
					<td class="field width6p br">Group Code</td>
					<td class="field width6p br">Set Sales Group Title</td>
					<td class="field width6p br">Set Group Type</td>
					<td class="field width6p br">No. of Items</td>
					<td class="field width6p br">Set Discount</td>
					<td class="field width6p br">Discount Available</td>
					<td class="field width6p br">Start Date</td>
					<td class="field width6p br">End Date</td>
					<td class="field width6p br">Register Date</td>
					<td class="field width6p">Change Date</td>
				  </tr>
				  <tr>
					<td class="value br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
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
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Group Title
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 30px;padding: 0 5px;display: inline-block;" disabled>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Discount Type
					</td>
					<td class="value tal">
						<input type="radio" name="discountType" id="discountType1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="discountType1">Set Item </label>
						<input type="radio" name="discountType" id="discountType2" style="vertical-align: middle;margin-right: 5px;">
						<label for="discountType2"> Seller shop (All items)</label><br>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Discount Period
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Discount 
					</td>
					<td class="value tal">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Items in the group
					</td>
					<td class="value tal">
						※These items will be sold as additional options in each item page.
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Add Multi Items</button>
						<div style="overflow:auto;">
							<table class="km-table bb2" style="overflow:scroll;width:100%;">
								<tbody>
								  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
									<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
									<td class="field width6p br">Item Code</td>
									<td class="field width6p br">Item Title</td>
									<td class="field width6p br">Seller Code</td>
									<td class="field width6p br">Price</td>
									<td class="field width6p br">Qty.</td>
									<td class="field width6p br">shipping rate</td>
									<td class="field width6p">Shipping code</td>
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
							  <tr>
								<td class="field width10p tal br">
									Selected Item
								</td>
								<td class="value tal">
									<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 30px;padding: 0 5px;display: inline-block;" disabled>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 30px;padding: 0 5px;display: inline-block;">
									<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align:top;">Search</button>
									<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;vertical-align:top;">Add</button>
									<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 10px;vertical-align:top;">Delete</button>
								</td>
							  </tr>
							  <tr class="bb2">
								<td class="field width10p tal br">
									Listing type
								</td>
								<td class="value tal">
									<input type="radio" name="listType" id="listType1" style="vertical-align: middle;margin-right: 5px;" checked>
									<label for="listType1">Ordered by Rank </label>
									<input type="radio" name="listType" id="listType2" style="vertical-align: middle;margin-right: 5px;">
									<label for="listType2">Ordered by Price</label>
								</td>
							  </tr>
							</tbody>
						</table>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Add</button>
						<button onclick=";" type="button" class="km-btn km-btn-default" style="height: 28px;font-size: 12px;padding: 5px 10px;">Renew</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>