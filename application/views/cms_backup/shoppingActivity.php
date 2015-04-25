<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">搜索购物杂谈活动</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						活动日期
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
							<option value="T">活动标题</option>
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
						优先顺序
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">~
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						手机优先顺序
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">~
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar" colspan="2">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">搜索</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">购物杂谈活动编号</td>
					<td class="field width6p br">Qspecial Number(SID)</td>
					<td class="field width6p br">购物杂谈活动标题</td>
					<td class="field width6p br">Qspecial 题目</td>
					<td class="field width6p br">展示</td>
					<td class="field width6p br">活动开始日</td>
					<td class="field width6p br">活动结束日</td>
					<td class="field width6p br">优先顺序</td>
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
			设置购物杂谈活动
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -145px; max-width:656px;color: #5F7392;width: 300px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title">购物杂谈活动</h3>

				  <div class="km-popover-content">
					<p>
						可以对购物杂谈进行可用与否设置。 正在进行的购物杂谈会显示在企划展和相关商品页面下方。 为保证更高质量的文章和购物杂谈参与率，建议卖家也可参与奖励方案来吸引顾客进行购物杂谈。
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
						QSpecial展示期间
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						活动标题*
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						展示
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
						优先顺序*
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						手机优先顺序*
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
						活动展示日期*
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						购物杂谈活动面板 * <br>
						(推荐尺寸: 230X107)
					</td>
					<td class="value tal" colspan="3">
						<div class="km-upload-img" style="width: 230px;">
							<img src="" width="230" height="107">
							<p style="line-height: 107px;">上传图片</p>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">编辑</button>
						<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;">删除</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>