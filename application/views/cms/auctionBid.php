<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<ul class="km-nav km-nav-tabs clearfix">
	  <li><a href="/cms/auctionGoods"><?php echo lang('cms_auctionGoods_ManageAuction');?></a></li>
	  <li class="active"><a href="/cms/auctionBid"><?php echo lang('cms_auctionGoods_AuctionBidManagement');?></a></li>
	</ul>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_auctionBid_BidHistory');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Date');?>
					</td>
					<td class="value width50p tal" colspan="2">
						<select style="height: 30px;">
							<option value="B" selected="selected"><?php echo lang('cms_auctionBid_BidDate');?></option>
							<option value="A"><?php echo lang('cms_auctionBid_WinningDate');?></option>
						</select>
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 25%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 25%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_Excel');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						拍卖状态<?php echo lang('cms_auctionBid_Auctionstatus');?>
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="" selected="selected"><?php echo lang('cms_auctionBid_SelectAll');?></option>
							<option value="2"><?php echo lang('cms_auctionBid_Inprogress');?></option>
							<option value="1"><?php echo lang('cms_auctionBid_Scheduled');?></option>
							<option value="4"><?php echo lang('cms_auctionBid_Discontinued');?></option>
							<option value="3"><?php echo lang('cms_auctionBid_Ended');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Auctioncode');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Itemcode');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Item');?>
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_BidStatus');?>
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="All" selected="selected"><?php echo lang('cms_auctionBid_All');?></option>
							<option value="BS1"><?php echo lang('cms_auctionBid_BidinProgress');?></option>
							<option value="AS1"><?php echo lang('cms_auctionBid_WinningbidAwaitingConfirmation');?></option>
							<option value="AS9"><?php echo lang('cms_auctionBid_WinningbidsPurchaseUnavailable');?></option>
							<option value="AS2"><?php echo lang('cms_auctionBid_WinningbidsOnrequest');?></option>
							<option value="AS3"><?php echo lang('cms_auctionBid_PreparingShipping');?></option>
							<option value="BS3"><?php echo lang('cms_auctionBid_FailedBid');?> </option>
							<option value="BS4"><?php echo lang('cms_auctionBid_BiddingCancelled');?></option>
							<option value="AS4"><?php echo lang('cms_auctionBid_WinningBidCancelled');?></option>
							<option value="AS5"><?php echo lang('cms_auctionBid_TransactionCancelled');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_BidderName');?>
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
					<td class="field width6p br"><?php echo lang('cms_auctionBid_Auctioncode');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_BidNo');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_BidDate');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_AuctionType');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_Itemcode');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_GDTitle');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_Bidder');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_BidPrice');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_BidQty');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_BidStatus');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningChance');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningBidPrice');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningQty');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningDate');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningBidStatus');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_Servicefee');?></td>
					<td class="field width6p br"><?php echo lang('cms_auctionBid_WinningBidCancelledBy');?></td>
					<td class="field width6p"><?php echo lang('cms_auctionBid_CancelDate');?></td>
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
		<div class="km-panel-heading"><?php echo lang('cms_auctionBid_AuctionItemDetails');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_AuctionType');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Auctionstatus');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_Item');?>
					</td>
					<td class="value width40p tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionBid_AuctionPeriod');?>
					</td>
					<td class="value width60p tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select>  ~ <?php echo lang('cms_auctionGoods_min');?>
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 20%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select> <?php echo lang('cms_auctionGoods_Hr');?>
						<select style="height: 30px;">
							<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select> <?php echo lang('cms_auctionGoods_min');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_AuctionQty');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> <?php echo lang('cms_auctionGoods_Qty');?>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Totalbids');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> <?php echo lang('cms_auctionGoods_ bidder');?>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Savedbidfee');?>
					</td>
					<td class="value width40p tal">
						<input type="radio" name="commission" id="commission1" style="vertical-align: middle;margin-right: 5px;" checked><label for="commission1">100 <?php echo lang('cms_auctionGoods_Qcash');?></label>
						<input type="radio" name="commission" id="commission2" style="vertical-align: middle;margin-right: 5px;"><label for="commission2">1 <?php echo lang('cms_auctionGoods_Qstamp');?></label>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5">
						<button onclick=";" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Edit');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_auctionGoods_BidDetail');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_BidNo');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Bidder');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_BidStatus');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Reason');?>
					</td>
					<td class="value width40p tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_WinningBidStatus');?>
					</td>
					<td class="value width40p tal">
						<select style="height: 30px;">
							<option value="S1" selected="selected"><?php echo lang('cms_auctionGoods_WinningbidAwaitingConfirmation');?></option>
							<option value="S2N"><?php echo lang('cms_auctionGoods_WinningbidsOnrequest');?></option>
							<option value="S2Y"><?php echo lang('cms_auctionGoods_PreparingShipping');?></option>
							<option value="S4"><?php echo lang('cms_auctionGoods_WinningBidCancelled');?></option>
							<option value="S5"><?php echo lang('cms_auctionGoods_Transactioncanceled');?></option>
						</select>
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Reason');?>
					</td>
					<td class="value  tal" colspan="3">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
						<?php echo lang('cms_auctionGoods_Cancelledby');?> <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_Paymentstatus');?>
					</td>
					<td class="value  tal">
						<?php echo lang('cms_auctionGoods_OrderNo');?> <input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled"> 
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_auctionGoods_ShippingStatus');?>
					</td>
					<td class="value  tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 50%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="5" style="line-height:18px;">
						<h3 style="line-height:15px;"><?php echo lang('cms_auctionGoods_GlossaryofBiddingTerms');?></h3>
						<?php echo lang('cms_auctionGoods_GlossaryofBiddingTermsContent');?>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>