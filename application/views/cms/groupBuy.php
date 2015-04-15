<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">A-团购商品信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;">
			  <button type="button" class="km-btn km-btn-warning" style="width:33%;">进行等待(0/0)</button>
			  <button type="button" class="km-btn km-btn-success" style="width:34%;">进行中(0/0)</button>
			  <button type="button" class="km-btn km-btn-danger" style="width:33%;">结束(0/0)</button>
			</div>
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						查询条件
					</td>
					<td class="value width50p tal" colspan="2">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="gd_no">商品代码</option>
							<option value="gd_nm">商品名</option>
							<option value="group_buy_no">集体购买号码</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">A-团购号码</td>
					<td class="field width6p br">商品代码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">价格</td>
					<td class="field width6p br">结算价</td>
					<td class="field width6p br">最小目标数量</td>
					<td class="field width6p br">最大销售数量（自选）</td>
					<td class="field width6p br">订购数量</td>
					<td class="field width6p br">达成目标数量</td>
					<td class="field width6p br">开始日</td>
					<td class="field width6p br">结束日</td>
					<td class="field width6p">登录日</td>
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
		<table class="km-table">
			<tbody>
			  <tr style="border-top:2px solid #ddd;">
				<td class="field width10p tal br">
					A-团购号码/商品*
				</td>
				<td class="value width40p tal" colspan="3">
					<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择</button>
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					目标最低值*
				</td>
				<td class="value width50p tal">
					<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					结算价 : <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					(Service Rate : <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">%)
				</td>
				<td class="field width10p tal br">
					零售价格
					<div class="km-popover-wrapper">
						<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
						<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
						  <div class="km-arrow"></div>
						  <h3 class="km-popover-title">参考价格</h3>
						  <div class="km-popover-content">
							<p>参考价不是商品的团购价.</p>
						  </div>
						</div>
					</div>
				</td>
				<td class="value width40p tal">
					<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					最小目标数量*
				</td>
				<td class="value width40p tal">
					<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					<p style="display: inline-block;margin-left:20px;">
						未能达到最小数量购买总数时，团购将自动取消. <br>
						取消时的汇款手续费需由卖家承担.
					</p>
				</td>
				<td class="field width10p tal br">
					最大销售数量(自选)
				</td>
				<td class="value width40p tal">
					<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					集体购买期间*
				</td>
				<td class="value width40p tal" colspan="3">
					<select style="height: 30px;">
						<option value="3">~三日</option>
						<option value="7">~1周</option>
						<option value="14">~2周</option>
					</select>
					<input type="text" value="1000" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 10%;height: 26px;padding: 0 5px;display: inline-block;" disabled="disabled">
					G·货币   
					<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					<select style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
					</select> 时
					<select style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
					</select> 分 ~ 
					<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 15%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					<select style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
					</select> 时
					<select style="height: 30px;">
						<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
					</select> 分
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					达成自动数量
				</td>
				<td class="value width40p tal" colspan="3">
					<select style="height: 30px;" onchange="if($(this).val()=='Y') $('#txt_achieve_suspend_Y').show();">
						<option value="Y" selected="selected">是的</option>
						<option value="N">无</option>
						<option value="S">持有</option>
					</select>
					<span id="txt_achieve_suspend_Y">无论是否达成团购，都将发送订购商品（此时，团购成立数量为1）</span>
					<span id="txt_achieve_suspend_N" style="display: none;">未达成共同购买时，订购将自动取消。取消时的汇款手续费需由卖家承担.</span>
					<span id="txt_achieve_suspend_S" style="display: none;">未達到最小數量時，結束訂單取消/發送處理功能後，3日內可決定。</span>
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					立刻购买价
				</td>
				<td class="value width40p tal" colspan="3">
					<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">以原有的销售价格可立刻购买.
				</td>
			  </tr>
			  <tr>
				<td class="field width10p tal br">
					可发货日期
					<div class="km-popover-wrapper">
						<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
						<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
						  <div class="km-arrow"></div>
						  <h3 class="km-popover-title">使用说明</h3>
						  <div class="km-popover-content">
							<p>
								上市日设定<br>
									- 上市日登录预约购买商品时使用<br>
								商品准备日设定<br>
									- 为了准备商品，需要一定时间进行商品设定<br>
									- 为准备商品限制时间为1日
							</p>
						  </div>
						</div>
					</div>
				</td>
				<td class="value width40p tal" colspan="3">
					<select style="height: 30px;">
						<option value="0">现在发货（1天内）</option>
						<option value="1">商品准备日设定</option>
						<option value="2">上市日设定</option>
					</select>
					*需要延长发送时，请联系AiiMai负责人. shipping@aiimai.com
				</td>
			  </tr>
			  <tr>
				<td class="value tal" colspan="5">
					<p class="fl">
						※ 卖出数量达到最低限量以上才可送货。 当无法及时发货时，请设置可发货日期。
					</p>
					<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">订购信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<div class="km-btn-group" style="width:100%;margin:10px auto;">
			  <button type="button" class="km-btn km-btn-warning" style="width:33%;">买家已付款(0/0) : 数量(0/0)</button>
			  <button type="button" class="km-btn km-btn-success" style="width:34%;">付款处理中(0/0) : 数量(0/0)</button>
			  <button type="button" class="km-btn km-btn-danger" style="width:33%;">结束(0/0)</button>
			</div>
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						查询条件
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="order_no">订购号码</option>
							<option value="gd_no">商品代码</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
					</td>
				  </tr>
				</tbody>
			</table>
			<div style="overflow:auto;">
				<table class="km-table" style="overflow:scroll;width:100%;">
					<tbody>
					  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
						<td class="field width6p br">订购号码</td>
						<td class="field width6p br">订购数量</td>
						<td class="field width6p br">买家付款金额</td>
						<td class="field width6p br">付款状态</td>
						<td class="field width6p br">付款方法</td>
						<td class="field width6p">运送状态</td>
					  </tr>
					  <tr>
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
</div>
<script src="/assets/js/cms-groupBuy.js" type="text/javascript"></script>