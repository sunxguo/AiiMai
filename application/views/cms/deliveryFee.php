<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/auctionGoods">default shipping place</a></li>
	  <li><a href="javascript:void();"><img src="/assets/images/cms/icon-plus.png" width="15"></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						运送地址名
					</td>
					<td class="value width60p tal">
						<input type="text" value="default shipping place" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value width10p bl1" rowspan="5">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">确认</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						商品运送地址
					</td>
					<td class="value width50p tal">
						<input type="text" value="168A SIMEI LANE 168A Simei Lane Singapore 521168" class="km-form-control" style="width: 70%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">地址变更</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						退货/交换地址
					</td>
					<td class="value width50p tal">
						<input type="text" value="168A SIMEI LANE 168A Simei Lane Singapore 521168" class="km-form-control" style="width: 70%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 20px;">地址变更</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						退货收回方式
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">退货收回方式</h3>
							  <div class="km-popover-content">
								<dl>
									<dt><strong>卖家直接发送</strong></dt>
									<dd>卖家已处理发送至卖家退货地址的商品。</dd>
									<dt><strong>卖家收回</strong></dt>
									<dd>如有指定的运送公司或需直接收回商品时的地址，将按照买家地址收回商品</dd>
								</dl>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width50p tal">
						<select style="height: 30px;">
							<option value="D">卖家直接发送</option>
							<option value="P">卖家收回</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						退货费用
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">退货费用</h3>
							  <div class="km-popover-content">
								<p>
									买家原因退货时，退货费用应由买家承担。<br>
									可设定商品购买金额限制数额以内的费用，<br>
									退货确认/收取时可删除或更改退货费用。<br>
									(退货费用包含在退货完成后的清算金额中。)
								</p>
							  </div>
							</div>
						</div>
					</td>
					<td class="value width50p tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">运送简要信息</div>
		<div class="km-panel-body" style="padding:0px;">
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:150%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">选择</td>
					<td class="field width6p br">运送费代码</td>
					<td class="field width6p br">运送费类型</td>
					<td class="field width6p br">运送方式</td>
					<td class="field width6p br">运送费名</td>
					<td class="field width6p br">运送费</td>
					<td class="field width6p br">免费条件</td>
					<td class="field width6p br">附加运送费</td>
					<td class="field width6p br">运送公司</td>
					<td class="field width6p">使用商品数（个）</td>
				  </tr>
				  <tr>
					<td class="value br">
						<input type="radio" name="deliveryFee" id="deliveryFee1" style="vertical-align: middle;margin-right: 5px;">
					</td>
					<td class="value br">415926</td>
					<td class="value br">免费</td>
					<td class="value br">一般运送（追踪-O）</td>
					<td class="value br">Free</td>
					<td class="value br">0.00</td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br">4PX Express</td>
					<td class="value">0</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="margin:10px auto;">
			* 打包计算方式 - 	同一购物车中打包运送费的计算方式
			<select style="height: 30px;">
				<option value="A">最大运送费1次附加</option>
				<option value="I">最少运送费1次附加</option>
				<option value="D">担负单独运送费合计</option>
			</select>
			<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;vertical-align: top;">付款方式变更</button>
			<div class="km-popover-wrapper">
				<img onclick="$(this).next().toggle(10)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
				<div class="km-popover km-bottom" style="top: 25px;left: -146px;width: 300px; max-width:656px;">
				  <div class="km-arrow"></div>
				  <h3 class="km-popover-title">使用说明</h3>
				  <div class="km-popover-content">
					<p>
						<ul>    <li><strong>一次担负最大运送费</strong> 一次担负购物车内最大运送费 </li>    <li><strong>1次担负最小运送费</strong> 一次担负购物车内最小运送费 </li>    <li><strong>担负个别运送费合算:</strong> 担负购物款内各商品运送费的总和 </li>   </ul>
					</p>
				  </div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">运送费信息详情 *选择邮编（追踪-X）后如发生运送事故后，应卖家解释说明一切。</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p tal br">
						运送费种类
					</td>
					<td class="field width20p tal br">
						运送方式
					</td>
					<td class="field width20p tal br">
						运送公司
					</td>
					<td class="field width20p tal br">
						运送费名
					</td>
					<td class="field width10p tal br">
						基本运费
					</td>
					<td class="field width15p tal br">
						运送费免费条件
					</td>
				  </tr>
				  <tr>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="F">收费</option>
							<option value="M">有条件免费</option>
							<option value="R">货到付款(先付款)</option>
							<option value="X">免费</option>
						</select>
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" title="请选择运送方式.">请选择运送方式.</option>
							<option value="NO" title="0">一般（追踪-X)</option>
							<option value="RM" title="2" selected="selected">一般运送（追踪-O）</option>
							<option value="EX" title="3">特送(DHL，EMS，Fedex 等)</option>
						</select>
					</td>
					<td class="value tal br">
						<select style="height: 30px;">
							<option value="" selected="selected">请选择运送公司</option>
							<option value="100000019">4PX Express</option>
							<option value="100000043">Airpak</option>
							<option value="100000029">Aramex</option>
							<option value="100000023">Arrow Air Action</option>
							<option value="100000027">Chinapost registered airmail</option>
							<option value="100000021">Citylink</option>
							<option value="100000035">Comone Express</option>
							<option value="100000024">Cuckoo Express</option>
							<option value="100000030">Dex-i</option>
							<option value="100000038">HK post registered mail</option>
							<option value="100000031">Japanpost registered mail</option>
							<option value="100000011">Korea registered airmail</option>
							<option value="100000036">MypostOnline</option>
							<option value="100000057">POS daftar</option>
							<option value="100000052">Pos Laju</option>
							<option value="100000063">Quantium</option>
							<option value="100000020">Qxpress</option>
							<option value="100000033">Sagawa Global(sgx)</option>
							<option value="100000001">Seller Delivery</option>
							<option value="100000003">Singpost registered mail</option>
							<option value="100000040">Singpost Smartpac</option>
							<option value="100000017">Speedpost</option>
							<option value="100000058">SRE</option>
							<option value="100000047">Thailand registered mail</option>
							<option value="100000007">Toll</option>
							<option value="100000013">USPS registered mail</option>
							<option value="100000065">YAMATO Global</option>
						</select>
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tal br">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
					<td class="value tal">
					没有
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;" id="accordingWeight"><label for="accordingWeight">根据重量/数量设定</label>
					</td>
					<td class="value tal" colspan="5">
						<select style="height: 30px;">
							<option value="Q">按照數量增加</option>
							<option value="W">按照重量增加</option>
						</select>
						<input type="radio" name="ccordingWeight" id="accordingWeight1" style="vertical-align: middle;margin-right: 5px;" checked>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 30px;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<label for="accordingWeight1">根据个数不同运送费将反复附加</label>
						<input type="radio" name="ccordingWeight" id="accordingWeight2" style="vertical-align: middle;margin-right: 5px;">
						<label for="accordingWeight2">请直接输入运送费区间</label>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;" id="SetTheOverseasFreight"><label for="SetTheOverseasFreight">海外运费设定</label>
					</td>
					<td class="value tal" colspan="5">
						<input type="radio" name="overseasFreight" id="overseasFreight1" style="vertical-align: middle;margin-right: 5px;" checked><label for="overseasFreight1">使用Qxpress运送</label>
						<input type="radio" name="overseasFreight" id="overseasFreight2" style="vertical-align: middle;margin-right: 5px;"><label for="overseasFreight2">直接设定海外运费</label>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="6">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">新登录</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">选项运费组设定 -如果设置了多个运费组，在商品登录&编辑菜单中，选择主要运费时，已设置的运费组将一同添加在该选项中。</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value width10p tal br">
						<select style="height: 30px;">
							<option value="">-----------  选择 -----------</option>
							<option value="415926">Free (S$0.00)</option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 30%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;">
					</td>
				  </tr>
				  <tr>
					<td class="value tal">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;">设定为运费组</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">各类商品运送费查询与设定</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						运送费类型
					</td>
					<td class="value width30p tal br">
						<select style="height: 30px;">
							<option value="">所有</option>
							<optgroup label="<运送费组>----------------------------------------------------"></optgroup>
							<option value="X,415926">Free</option>
							<optgroup label="<各单一商品运送费단일상품별 배송비>----------------------------------------------------"></optgroup>
							<option value="F">单品收费</option>
							<option value="D">单品货到付款</option>
							<option value="R">单品货到付款（也可先付）</option>
							<option value="M">单品免费（有条件）</option>
						</select>
					</td>
					<td class="value width15p br">
						<select style="height: 30px;">
							<option value="NO" selected="selected">商品号码</option>
							<option value="CD">卖家代码</option>
							<option value="NM">商品名</option>
						</select>
					</td>
					<td class="value width20p br">
						<input type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
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
			<table class="km-table bb2" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">商品号码</td>
					<td class="field width6p br">商品名</td>
					<td class="field width6p br">运送费类型</td>
					<td class="field width6p br">付款方式</td>
					<td class="field width6p br">运送费名</td>
					<td class="field width6p br">运送方式</td>
					<td class="field width6p br">基本运送费</td>
					<td class="field width6p br">免费条件</td>
					<td class="field width6p br">地域附加运送费</td>
					<td class="field width6p br">根据数量确定附加运送费</td>
					<td class="field width6p">国外添加运送费</td>
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
		<div class="tar " style="margin:10px auto;">
			<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">选择商品一起变更</button>
			(最多可选择50个商品同时变更)
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>