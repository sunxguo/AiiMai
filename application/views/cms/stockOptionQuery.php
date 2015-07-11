<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<select style="height: 30px;">
							<option value="GD_NO">Item Code</option>
							<option value="GD_CD">Seller Code</option>
						</select>
					</td>
					<td class="value width20p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						Option Code
					</td>
					<td class="value width20p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Excel</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">All-Item Download(CSV)</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div class="km-panel-body" style="padding:0px;overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Item Code</td>
					<td class="field width6p br">Seller Code</td>
					<td class="field width6p br">Data Type</td>
					<td class="field width6p br">Option1</td>
					<td class="field width6p br">Detail1</td>
					<td class="field width6p br">Option2</td>
					<td class="field width6p br">Detail2</td>
					<td class="field width6p br">Option3</td>
					<td class="field width6p br">Detail3</td>
					<td class="field width6p br">Price</td>
					<td class="field width6p br">Qty</td>
					<td class="field width6p">Option Code</td>
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
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="field width10p tal br">
						Excel Data Upload
					</td>
					<td class="value width30p tal">
						<select style="height: 30px;">
							<option value="A">AiiMai</option>
						</select>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">Find</button>
					</td>
					<td class="field width10p tal br bl1" rowspan="2">
						Option Save Type
					</td>
					<td class="value width20p tal" rowspan="2">
						<input type="radio" name="saveType" id="saveType1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="saveType1">Default (Next Engine)</label><br>
						<input type="radio" name="saveType" id="saveType2" style="vertical-align: middle;margin-right: 5px;">
						<label for="saveType2">SAVAWAY,CROSSMall Type (Option Code = Seller Code + Option Code)</label>
					</td>
				  </tr>
				  <tr class="bt2">
					<td class="field tal br">
						Register Excel Data
					</td>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Validity Check</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save Correct Data Only</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>