<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li class="active"><a href="/cms/auctionGoods"><?php echo lang('cms_auctionGoods_ManageAuction');?></a></li>
	  <li><a href="/cms/auctionBid"><?php echo lang('cms_auctionGoods_AuctionBidManagement');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_auctionGoods_ManageAuction');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_RegistrationDate');?>
					</td>
					<td class="value width50p tal" colspan="2">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionStatus');?>
					</td>
					<td class="value width17p tal">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_auctionGoods_SelectAll');?></option>
							<option value="2"><?php echo lang('cms_auctionGoods_InProgress');?></option>
							<option value="1"><?php echo lang('cms_auctionGoods_Scheduled');?></option>
							<option value="4"><?php echo lang('cms_auctionGoods_Discontinued');?></option>
							<option value="3"><?php echo lang('cms_auctionGoods_Ended');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionType');?>
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_auctionGoods_All');?></option>
							<option value="A01"><?php echo lang('cms_auctionGoods_Auction');?></option>
							<option value="A03"><?php echo lang('cms_auctionGoods_LuckyAuction');?></option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_SearchType');?>
					</td>
					<td class="value width17p tal">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_auctionGoods_All');?></option>
							<option value="GD_NO"><?php echo lang('cms_auctionGoods_GDcode');?></option>
							<option value="GD_NM"><?php echo lang('cms_auctionGoods_GDTitle');?></option>
							<option value="SELLERCODE"><?php echo lang('cms_auctionGoods_SellerCode');?></option>
							<option value="AUCTION_NO"><?php echo lang('cms_auctionGoods_AuctionCode');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_SearchValue');?>
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
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_AuctionCode');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_GDcode');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_SellerCode');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_GDTitle');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_StartingPrice');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_Qty');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_TotalqtyofBids');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_Qtyavailable');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_Startingdate');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_Endingdate');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionGoods_Datediscontinued');?></td>
					<td class="field width6p"><?php echo lang('cms_auctionGoods_BuyNowItemCode');?></td>
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
		<div class="km-panel-heading"><?php echo lang('cms_auctionGoods_AuctionInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Itemcode');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_auctionGoods_Search');?> ></button>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionCode');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionType');?>
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="A01"><?php echo lang('cms_auctionGoods_Auction');?></option>
						</select>
						<?php echo lang('cms_auctionGoods_MyQcash');?> :1000, <?php echo lang('cms_auctionGoods_Mystamp');?> :3
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionStatus');?>
					</td>
					<td class="value width40p tal">
						<span class="km-label km-label-warning"><?php echo lang('cms_auctionGoods_Scheduled');?></span>
						<!--
						<span class="km-label km-label-info">进行中</span>
						<span class="km-label km-label-success">完成</span>
						<span class="km-label km-label-danger">中止</span>
						-->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Startingdate');?>
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> <?php echo lang('cms_auctionGoods_min');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_EndDate');?>
					</td>
					<td class="value width40p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> <?php echo lang('cms_auctionGoods_min');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Registrationfee');?>
					</td>
					<td class="value width40p tal">
						<input type="radio" name="commission" id="commission1" style="vertical-align: middle;margin-right: 5px;" checked><label for="commission1">100 <?php echo lang('cms_auctionGoods_Qcash');?></label>
						<input type="radio" name="commission" id="commission2" style="vertical-align: middle;margin-right: 5px;"><label for="commission2">1 <?php echo lang('cms_auctionGoods_Qstamp');?></label>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_SettlePrice');?>
					</td>
					<td class="value width40p tal">
						 92% <?php echo lang('cms_auctionGoods_winningprice');?>(<?php echo lang('cms_auctionGoods_servicefeerate');?>: 8%)
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_QuantityForAuction');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> <?php echo lang('cms_auctionGoods_Qty');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_BidUnit');?>(S$)
					</td>
					<td class="value width40p tal">
						<input value="0.01" type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> <?php echo lang('cms_auctionGoods_BidUnit');?> : (S$0.01 ~ S$5.00)
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_StartingPrice');?>(S$)
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"> <?php echo lang('cms_auctionGoods_StartingPriceTip');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_LimitQtyForABid');?>
					</td>
					<td class="value width40p tal">
						<input type="radio" name="bidGoodsNumber" id="bidGoodsNumber1" style="vertical-align: middle;margin-right: 5px;" checked><label for="bidGoodsNumber1"><?php echo lang('cms_auctionGoods_No');?></label>
						<input type="radio" name="bidGoodsNumber" id="bidGoodsNumber2" style="vertical-align: middle;margin-right: 5px;"><label for="bidGoodsNumber2"><?php echo lang('cms_auctionGoods_Yes');?></label>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">  <?php echo lang('cms_auctionGoods_QtyUnit').' '.lang('cms_auctionGoods_MaxQty');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_BuyNowLinkedItem');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<?php echo lang('cms_auctionGoods_ItemCode');?> : <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_auctionGoods_Search');?> ></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Reasonforend');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 80%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5">
					    <p class="fl">
							<?php echo lang('cms_auctionGoods_Warnning');?>
						</p>
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_auctionGoods_Add');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>