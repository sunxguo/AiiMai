<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Shopping Talk Event Search</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Event Period
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Options
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="">==选择==</option>
							<option value="S">SID</option>
							<option value="T">Event Title</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Display
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="">All</option>
							<option value="Y">Y</option>
							<option value="N">N</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Priority
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">~
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Mobile Priority
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">~
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
					<td class="field width6p br">Shopping Talk Event No.</td>
					<td class="field width6p br">Qspecial Number(SID)</td>
					<td class="field width6p br">Shopping Talk Event Title</td>
					<td class="field width6p br">Qspecial Title</td>
					<td class="field width6p br">Display</td>
					<td class="field width6p br">Event Starting Day</td>
					<td class="field width6p br">Event Closing Date</td>
					<td class="field width6p br">Priority</td>
					<td class="field width6p br">M.Priority</td>
					<td class="field width6p br">Reg Date</td>
					<td class="field width6p br">Chg Date</td>
					<td class="field width6p br">Qspecial Start Day</td>
					<td class="field width6p">Qspecial End Day</td>
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
					<td class="value"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">
			Shopping Talk Event Setting
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -145px; max-width:656px;color: #5F7392;width: 300px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title">Shopping Talk Event</h3>

				  <div class="km-popover-content">
					<p>
						Shopping Talk Event is only available if the Shopping Talk setting is on. On-going Shopping Talk Event is displayed at the bottom of the item page and the Qspecial page. To achieve high participants’rate and quality posts, we recommend sellers to set attractive reward options for participants.
					</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						QSpecial*
					</td>
					<td class="value tal">
						
					</td>
					<td class="field width10p tal br">
						QSpecial Display Period
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Event Title*
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Display
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="Y" selected="selected">ON</option>
							<option value="N">OFF</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Priority*
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						Mobile Priority*
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						URL
					</td>
					<td class="value tal">
						
					</td>
					<td class="field width10p tal br">
						Event Display Period*
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Shopping Talk Event Banner * <br>
						(Recommended Size: 230X107)
					</td>
					<td class="value tal" colspan="3">
						<div class="km-upload-img" style="width: 230px;">
							<img src="" width="230" height="107">
							<p style="line-height: 107px;">Upload Image</p>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">Add</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Edit</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">Delete</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>