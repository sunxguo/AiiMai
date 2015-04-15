<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/auctionGoods">拍卖商品管理</a></li>
	  <li><a href="/cms/auctionBid">拍卖投标管理</a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">拍卖管理</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						登录日
					</td>
					<td class="value width50p tal" colspan="2">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
					<td class="value width17p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="2">进行中</option>
							<option value="1">等待</option>
							<option value="4">中止</option>
							<option value="3">完成</option>
						</select>
					</td>
					<td class="field width10p tal br">
						拍卖种类
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="A01">普通拍卖</option>
							<option value="A03">幸运拍卖</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						查询种类
					</td>
					<td class="value width17p tal">
						<select style="height: 30px;">
							<option value="" selected="selected">所有</option>
							<option value="GD_NO">商品号码</option>
							<option value="GD_NM">商品名</option>
							<option value="SELLERCODE">卖家代码</option>
							<option value="AUCTION_NO">拍卖号码</option>
						</select>
					</td>
					<td class="field width10p tal br">
						详细查询
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" style="width: 90%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">卖家代码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">起价</td>
					<td class="field width6p br">库存</td>
					<td class="field width6p br">总投标数</td>
					<td class="field width6p br">可投标数量</td>
					<td class="field width6p br">开始日</td>
					<td class="field width6p br">结束日</td>
					<td class="field width6p br">终止日</td>
					<td class="field width6p">立刻购买商品代码</td>
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
		<div class="km-panel-heading">拍卖信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						商品代码
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择 ></button>
					</td>
					<td class="field width10p tal br">
						拍卖号码
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖种类
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="A01">普通拍卖</option>
						</select>
						我的Q货币 :1000, 我的邮票 :3
					</td>
					<td class="field width10p tal br">
						拍卖状态
					</td>
					<td class="value width40p tal">
						<span class="km-label km-label-warning">等待</span>
						<!--
						<span class="km-label km-label-info">进行中</span>
						<span class="km-label km-label-success">完成</span>
						<span class="km-label km-label-danger">中止</span>
						-->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						开始日
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> 时
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> 分
					</td>
					<td class="field width10p tal br">
						结束日
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
						商品登录手续费
					</td>
					<td class="value width40p tal">
						<input type="radio" name="commission" id="commission1" style="vertical-align: middle;margin-right: 5px;" checked><label for="commission1">100 Q货币</label>
						<input type="radio" name="commission" id="commission2" style="vertical-align: middle;margin-right: 5px;"><label for="commission2">1 Q邮票</label>
					</td>
					<td class="field width10p tal br">
						结算价
					</td>
					<td class="value width40p tal">
						中标价 92% (销售手续费: 8%)
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖数量
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> 个
					</td>
					<td class="field width10p tal br">
						投标单位(S$)
					</td>
					<td class="value width40p tal">
						<input value="0.01" type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> 投标单位 : (S$0.01 ~ S$5.00)
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						起价(S$)
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> (可能中标的最低价格)
					</td>
					<td class="field width10p tal br">
						1次可投标商品数
					</td>
					<td class="value width40p tal">
						<input type="radio" name="bidGoodsNumber" id="bidGoodsNumber1" style="vertical-align: middle;margin-right: 5px;" checked><label for="bidGoodsNumber1">没有</label>
						<input type="radio" name="bidGoodsNumber" id="bidGoodsNumber2" style="vertical-align: middle;margin-right: 5px;"><label for="bidGoodsNumber2">是</label>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">  个 每次最多可投标一次
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						立刻购买链接商品
					</td>
					<td class="value width40p tal" colspan="3">
						商品代码 : <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择 ></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖中止原因
					</td>
					<td class="value width40p tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5">
					    <p class="fl">
							*已经投标的拍卖无法更改 <br>
							*拍卖订购中，选择添加商品类型为‘立刻购买’的情况时，添加拍卖商品时，现存商品数量将被扣除。（这里的商品数量是指库存商品被设定时的库存数量）
						</p>
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">添加</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>