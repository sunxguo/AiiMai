<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/ASpecialApply">A·Special Premium Request</a></li>
	  <li><a href="/cms/ASpecialRecord">ASpecial History</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Status</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width17p tal br">
						See Promotion Calander
					</td>
					<td class="value tal">
						50 rounds remaining (0 rounds used -> approved:0, finished:0)
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">See Promotion Calander</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">ASpecial Search</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Premium Display Period	
					</td>
					<td class="value tal br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						SID
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						CTG
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="0">All</option>
							<option value="1">Women's</option>
							<option value="2">Fashion</option>
							<option value="3">Men's</option>
							<option value="4">Beauty</option>
							<option value="5">Mobile</option>
							<option value="6">Home Appliances</option>
							<option value="7">Living</option>
							<option value="8">Kids/baby</option>
							<option value="9">Food</option>
							<option value="10">Entertainment</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Title
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						ONOFF
					</td>
					<td class="value width17p tal br">
						<select style="height: 30px;">
							<option value="">ALL</option>
							<option value="Y">Y</option>
							<option value="N">N</option>
						</select>
					</td>
					<td class="value tar" colspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">SID</td>
					<td class="field width6p br">Title</td>
					<td class="field width6p br">Category</td>
					<td class="field width6p br">CTG</td>
					<td class="field width6p br">CTGName</td>
					<td class="field width6p br">USEYN</td>
					<td class="field width6p br">Start Date</td>
					<td class="field width6p br">End Date</td>
					<td class="field width6p br">bannerno</td>
					<td class="field width6p">img_banner</td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">ASpecial Detail</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width17p tal br">
						SID
					</td>
					<td class="value tal" colspan="2">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width17p tal br">
						Title
					</td>
					<td class="value tal" colspan="2">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width17p tal br">
						CTG
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width17p tal br">
						Category
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width17p tal br">
						Number of items in this special
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				  <tr>
					<td class="field width17p tal br">
						Premium Display Period
					</td>
					<td class="value tal" colspan="5">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 120px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 120px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width17p tal br">
						Aspecial URL
					</td>
					<td class="value tal" colspan="5">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 90%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>