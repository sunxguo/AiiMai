<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/auctionGoods">拍卖商品管理</a></li>
	  <li class="active"><a href="/cms/auctionBid">拍卖投标管理</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">投标记录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						日期
					</td>
					<td class="value width50p tal" colspan="2">
						<select style="height: 30px;">
							<option value="B" selected="selected">投标日</option>
							<option value="A">中标日</option>
						</select>
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 25%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 25%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">查询</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">导出Excel</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖状态
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="2">进行中</option>
							<option value="1">等待</option>
							<option value="4">中止</option>
							<option value="3">完成</option>
						</select>
					</td>
					<td class="field width10p tal br">
						拍卖代码
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品代码
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						商品名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						投标状态
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="All" selected="selected">所有</option>
							<option value="BS1">投标进行中</option>
							<option value="AS1">中标 - 汇款等待</option>
							<option value="AS9">中标 - 不可购买</option>
							<option value="AS2">中标 - 买家已付款</option>
							<option value="AS3">运送准备</option>
							<option value="BS3">流标 </option>
							<option value="BS4">投标取消</option>
							<option value="AS4">中标取消</option>
							<option value="AS5">交易取消</option>
						</select>
					</td>
					<td class="field width10p tal br">
						投标人名
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">拍卖号码</td>
					<td class="field width6p br">投标次序</td>
					<td class="field width6p br">投标日</td>
					<td class="field width6p br">拍卖种类</td>
					<td class="field width6p br">商品代码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">投标人</td>
					<td class="field width6p br">投标价</td>
					<td class="field width6p br">投标数量</td>
					<td class="field width6p br">投标状态</td>
					<td class="field width6p br">中标可能性</td>
					<td class="field width6p br">中标日时</td>
					<td class="field width6p br">中标数量</td>
					<td class="field width6p br">中标日时</td>
					<td class="field width6p br">中标状态</td>
					<td class="field width6p br">服务费</td>
					<td class="field width6p br">中标取消者</td>
					<td class="field width6p">取消日</td>
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
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">拍卖商品详情记录</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						拍卖种类
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						拍卖状态
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品名
					</td>
					<td class="value width40p tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖期间
					</td>
					<td class="value width60p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> 时
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> 分 ~ 
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> 时
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> 分
					</td>
					<td class="field width10p tal br">
						拍卖数量
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> 个
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						总投标人数
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> 名
					</td>
					<td class="field width10p tal br">
						投标手续费
					</td>
					<td class="value width40p tal">
						<input type="radio" name="commission" id="commission1" style="vertical-align: middle;margin-right: 5px;" checked><label for="commission1">100 Q货币</label>
						<input type="radio" name="commission" id="commission2" style="vertical-align: middle;margin-right: 5px;"><label for="commission2">1 Q邮票</label>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">修改</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">投标详情</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						投标号码
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						投标人
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						投标状态
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						理由
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						中标状态
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="S1" selected="selected">中标 - 中标确认等待</option>
							<option value="S2N">中标 - 买家已付款</option>
							<option value="S2Y">运送准备</option>
							<option value="S4">中标取消</option>
							<option value="S5">交易取消</option>
						</select>
					</td>
					<td class="field width10p tal br">
						理由
					</td>
					<td class="value  tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						取消 <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						付款状态
					</td>
					<td class="value  tal">
						订购号码 <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> 
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						运送状态
					</td>
					<td class="value  tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 50%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5" style="line-height:18px;">
						<h3 style="line-height:15px;">相关投标用语</h3>
						1) 投标进行中: 拍卖进行中.<br>
						2) 中标 - 优惠等待中: 中标者确认中 付款前可取消中标.<br>
						3) 中标 - 运送中 : 中标者确认状态. 请准备运送<br>
						4) 中标失败 : 拍卖结束，但最高的价格没达到卖家的最小值。<br>
						5) 投标取消 : 拍卖结束之前取消投标<br>
						6) 中标取消 : 中标者汇款前取消中标的状态<br>
						7) 订购取消: 付款后中标者取消订购的状态
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>