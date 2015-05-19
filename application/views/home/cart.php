<div class="main-floor no-border cart">
	<div class="order_step step1">
		<ul class="step">
			<li class="on"><span>Step 1</span>Shopping Cart </li>
			<li><span>Step 2</span>Place Order </li>
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
		<h3 class="cart-title">Shopping List</h3>
		<ul class="cart-header">
			<li style="width:10%;"><input type="checkbox" name="checkAllCartButton" checked> all</li>
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
				<li style="width:10%;"><input type="checkbox" name="cartItem"></li>
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
		<ul class="cart-header">
			<li style="width:6%;"><input type="checkbox" name="checkAllCartButton"> all</li>
			<li style="width:94%;">
				<button onclick=";" type="button" class="km-btn km-btn-danger" style="height: 22px;font-size: 12px;padding: 2px 20px;">Delete from Cart</button>
			</li>
		</ul>
	</div>
	<div class="order_inf">
		<div class="pay_inf">
			<dl>
				<dt>Item Price(1)</dt>
				<dd><span id="">S$14.00</span></dd>
			</dl>
			<dl>
				<dt>Shop/Cart Coupon(0) <a href="javascript:goMyCartCoupon();" class="btn_mycp">Use My Coupons</a></dt>
				<dd><span id="">S$0.00</span></dd>
			</dl>
			<dl>
				<dt>Shipping rate <a href="javascript:openShippingDetail()" class="icon_dtl">see detail</a></dt>
				<dd><span id="">S$3.99</span></dd>
			</dl>
			<dl class="total">
				<dt>total price</dt>
				<dd>
					<span id="" class="exchange">S$17.99</span> <strong class="exchange"></strong>
				</dd>
			</dl>
		</div>
	</div>
	<div class="processBtn">
		<a href="/home/placeOrder" class="btn_order"><span><em>Place an Order</em>(For selected items)</span></a>
	</div>
</div>