<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">[Register/Edit] Upload file</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Type
					</td>
					<td class="value width30p tal br">
						<input type="radio" id="typeRegister" name="type" style="vertical-align: middle;" checked>
						<label for="typeRegister" class="km-control-label">Register items</label>
						<!--
						<input type="radio" id="typeEdit" name="type" style="vertical-align: middle;">
						<label for="typeEdit" class="km-control-label">Edit items</label>
						-->
					</td>
					<td class="field width10p tal br">
						Format
					</td>
					<td class="value width30p tal br">
						<input type="radio" id="formatAiimai" name="format" style="vertical-align: middle;" checked>
						<label for="formatAiimai" class="km-control-label">AiiMail</label>
					</td>
					<td class="field width10p tal br">
						Upload file
					</td>
					<td class="value width10p tal">
						<button onclick="$('#file').click();" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Upload</button>
						<form id="upload_csv_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadCSV('#upload_csv_form')" name="image" type="file" id="file" style="display:none;">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Request</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>