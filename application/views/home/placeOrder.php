<div class="main-floor no-border cart">
	<div class="order_step step1">
		<ul class="step">
			<li><span>Step 1</span>Shopping Cart </li>
			<li class="on"><span>Step 2</span>Place Order </li>
			<li class="last-child"><span>Step 3</span>Order Complete </li>
		</ul>
		<div class="mb_grd">            
			<strong>Get Q·members Coupon!(<em class="grn">Green</em>)</strong>
			<a href="#none" class="mb_cp">
				<span class="cp_basic cp_cart cp_88"><span onclick="ApplyRewardCoupon('kQZOoXK8_g_2_CA_g_3_')" class="get">S$2.00<em>Get</em></span></span>
			</a>
		</div>
	</div>
	<div class="clearfix">
		<h3 class="cart-title">Order Info</h3>
		<ul class="cart-header">
			<li style="width:10%;"><input type="checkbox">all</li>
			<li style="width:40%;">Item</li>
			<li style="width:10%;">Benefit</li>
			<li style="width:10%;">Qty.</li>
			<li style="width:10%;">Price/Option</li>
			<li style="width:10%;">Discount</li>
			<li style="width:10%;">Subtotal</li>
		</ul>
		<div class="cart-body clearfix">
			<?php foreach($cart as $merchant):?>
			<?php foreach($merchant['products'] as $product):?>
			<ul class="clearfix">
				<li style="width:10%;"><input type="checkbox"></li>
				<li style="width:40%;">
					<a href="/home/item?itemId=<?php echo $product->product_id;?>" target="_blank">
						<img src="<?php echo $product->product_image;?>" width="82" height="82">
						<?php echo $product->product_item_title_english;?>
					</a>
				</li>
				<li style="width:10%;">XX</li>
				<li style="width:10%;"><input class="inp-txt" style="width:25px;" value="<?php echo $product->amount;?>"></li>
				<li style="width:10%;">S$<?php echo $product->product_sell_price;?></li>
				<li style="width:10%;">-S$4.00</li>
				<li style="width:10%;">S$14.00</li>
			</ul>
			<?php endforeach;?>
			<?php endforeach;?>
		</div>
	</div>
	<h3 class="cart-title">Payable Amount</h3>
	<div class="clearfix payable_amount">
		<div class="count">
			<div class="price">
				<h4>Total Price</h4>
				<div><span id="">S$18.00</span></div>
			</div>
			<div class="discount">
				<em class="subtraction">subtraction(-)</em>
				<h4>Discount</h4>
				<div><span id="">S$4.00</span></div>
			</div>
			<div class="rate">
				<em class="plus">plus(+)</em>
				<h4>Shipping rate</h4>
				<div><span id="">S$3.99</span></div>
			</div>
			<div class="total">
				<em class="sum">balance(=)</em>
				<h4>Total Payment(1 items)</h4>
				<div><span id="">S$17.99</span></div>
				
			</div>
		</div>
	</div>
	<h3 class="cart-title">Shipping Information (* : Required information)</h3>
	<table style="width:100%;" class="km-table bl1 bb2 br">
		<tr>
			<td style="width:30%;" class="field br">*Recipient Name</td>
			<td style="width:70%;" ><input class="inp-txt" style="width:250px;" type="text" id="RecipientName"></td>
		</tr>
		<tr>
			<td class="field br">*Shipping Address</td>
			<td><input class="inp-txt" style="width:350px;" type="text" id="ShippingAddress"></td>
		</tr>
		<tr>
			<td class="field br">*Contacts</td>
			<td>
				<div class="gsm_phone">
					<div id="contract_no1_1_code" class="gsm_select" style="display: none;">
						<p><a href=""><img src="https://staticssl.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
					</div>
					<select id="" name="" style="width: 110px;height: 22px;" onchange="">
						<option value="" selected="">== select ==</option>
						<option value="62">Indonesia</option>
						<option value="60">Malaysia</option>
						<option value="65">Singapore</option>
						<option value="81">Japan</option>
						<option value="82">South Korea</option>
						<option value="852">Hong Kong</option>
						<option value="853">Macau</option>
						<option value="86">China</option>
						<option value="91">India</option>
						<option value="61">Australia</option>
						<option value="55">Brazil</option>
						<option value="673">Brunei Darussalam</option>
						<option value="1">Canada</option>
						<option value="86">China</option>
						<option value="45">Denmark</option>
						<option value="20">Egypt</option>
						<option value="358">Finland</option>
						<option value="33">France</option>
						<option value="49">Germany</option>
						<option value="30">Greece</option>
						<option value="852">Hong Kong</option>
						<option value="36">Hungary</option>
						<option value="91">India</option>
						<option value="62">Indonesia</option>
						<option value="972">Israel</option>
						<option value="39">Italy</option>
						<option value="81">Japan</option>
						<option value="965">Kuwait</option>
						<option value="853">Macau</option>
						<option value="60">Malaysia</option>
						<option value="52">Mexico</option>
						<option value="95">Myanma</option>
						<option value="31">Netherland</option>
						<option value="64">New Zealand</option>
						<option value="47">Norway</option>
						<option value="63">Philippines</option>
						<option value="48">Poland</option>
						<option value="351">Portugal</option>
						<option value="7">Russia</option>
						<option value="65">Singapore</option>
						<option value="82">South Korea</option>
						<option value="34">Spain</option>
						<option value="46">Sweden</option>
						<option value="41">Switzerland</option>
						<option value="886">Taiwan</option>
						<option value="66">Thailand</option>
						<option value="90">Turkey</option>
						<option value="44">United Kingdom</option>
						<option value="1">United States</option>
						<option value="84">Vietnam</option>
					</select>
					<input class="inp-txt" style="width:150px;height: 13px;vertical-align: top;" type="text" id="phonenum">
				</div>
				<div class="gsm_home">
					<div id="contract_no1_1_code" class="gsm_select" style="display: none;">
						<p><a href=""><img src="https://staticssl.image-gmkt.com/qoo10/front/cm/qsm/image/@sg.gif" width="29" height="19" alt=""></a></p>
					</div>
					<select id="" name="" style="width: 110px;height: 22px;" onchange="">
						<option value="" selected="">== select ==</option>
						<option value="62">Indonesia</option>
						<option value="60">Malaysia</option>
						<option value="65">Singapore</option>
						<option value="81">Japan</option>
						<option value="82">South Korea</option>
						<option value="852">Hong Kong</option>
						<option value="853">Macau</option>
						<option value="86">China</option>
						<option value="91">India</option>
						<option value="61">Australia</option>
						<option value="55">Brazil</option>
						<option value="673">Brunei Darussalam</option>
						<option value="1">Canada</option>
						<option value="86">China</option>
						<option value="45">Denmark</option>
						<option value="20">Egypt</option>
						<option value="358">Finland</option>
						<option value="33">France</option>
						<option value="49">Germany</option>
						<option value="30">Greece</option>
						<option value="852">Hong Kong</option>
						<option value="36">Hungary</option>
						<option value="91">India</option>
						<option value="62">Indonesia</option>
						<option value="972">Israel</option>
						<option value="39">Italy</option>
						<option value="81">Japan</option>
						<option value="965">Kuwait</option>
						<option value="853">Macau</option>
						<option value="60">Malaysia</option>
						<option value="52">Mexico</option>
						<option value="95">Myanma</option>
						<option value="31">Netherland</option>
						<option value="64">New Zealand</option>
						<option value="47">Norway</option>
						<option value="63">Philippines</option>
						<option value="48">Poland</option>
						<option value="351">Portugal</option>
						<option value="7">Russia</option>
						<option value="65">Singapore</option>
						<option value="82">South Korea</option>
						<option value="34">Spain</option>
						<option value="46">Sweden</option>
						<option value="41">Switzerland</option>
						<option value="886">Taiwan</option>
						<option value="66">Thailand</option>
						<option value="90">Turkey</option>
						<option value="44">United Kingdom</option>
						<option value="1">United States</option>
						<option value="84">Vietnam</option>
					</select>
					<input class="inp-txt" style="width:80px;height: 13px;vertical-align: top;" type="text" id="homephonenum1"> -
					<input class="inp-txt" style="width:80px;height: 13px;vertical-align: top;" type="text" id="homephonenum1">
				</div>
			</td>
		</tr>
		<tr>
			<td class="field br">*Email for Order / Shipping Info.</td>
			<td><input class="inp-txt" style="width:250px;" type="text" id="email">* You will receive order and shipping information via this email.</td>
		</tr>
		<tr>
			<td class="field br">Memo to Seller</td>
			<td><textarea id="memo" style="width:450px;height:50px;"></textarea><br>
			* Please make your item option selection at the item page when placing your order.
			Do not write it separately in the memo section as the item option you request may not be sent to you correctly.</td>
		</tr>
	</table>
	<h3 class="cart-title">Payment Information</h3>
	<table style="width:100%;" class="km-table bl1 bb2 br">
		<tr>
			<td style="width:70%;" class="br">
				<ul>
					<li><input name="Payment" id="MasterCardVISA" type="radio"> <label for="MasterCardVISA">MasterCard and VISA <img src="https://staticssl.image-gmkt.com/qoo10/front/cm/login/image/icon_masterpass.png" alt="MasterPass" style="width:90px;"></label></li>
					<li><input name="Payment" id="JCBCard" type="radio"> <label for="JCBCard">JCB Card<img src="https://staticssl.image-gmkt.com/qoo10/front/cm/common/image/icon_jcb.jpg" alt="JCB" style="width:32px;height:25px"></label></li>
					<li><input name="Payment" id="PayPal" type="radio"> <label for="PayPal">PayPal</label></li>
					<li><input name="Payment" id="ENets" type="radio"> <label for="ENets">E-Nets (Real time Bank Transfer via I-Banking)  * Please Turn Off Pop-up Blocker<img src="https://staticssl.image-gmkt.com/qoo10/front/cm/order/image/logo_enets.jpg" alt="E-Nets" style="height:21px;"></label></li>
					<li><input name="Payment" id="AXS" type="radio"> <label for="AXS">AXS</label></li>
					<li><input name="Payment" id="Cash" type="radio"> <label for="Cash">Cash payment at Convenience Store (7-Eleven only)<img src="https://staticssl.image-gmkt.com/qoo10/front/cm/order/image/logo_7eleven.jpg" alt=""></label></li>
					<li><input name="Payment" id="BillPayment" type="radio"> <label for="BillPayment">Bill Payment</label></li>
					<li><input name="Payment" id="Directcashdeposit" type="radio"> <label for="Directcashdeposit">Direct cash deposit</label></li>
				</ul>
			</td>
			<td style="width:30%;">
				<div class="infoView pay">
					<div class="pay_area amount">
						<div class="section">
							<dl class="fee">
								<dt>Total amount</dt>
								<dd id="PGPaymentAmount" class="">
									<strong>
										<span id="">S$<em>17.99</em></span>
									</strong>
								</dd>
							</dl>
						</div>
						<a href="javascript:alert('The test is successful!');" class="btn_order">Order Now&nbsp;&nbsp;&gt;</a>
						<a href="/home/cart" class="btn_previous" title="Previous Page">&lt; Previous Page</a>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>