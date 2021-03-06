<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">analytics</div>
		<div class="km-panel-body" style="padding:0px;">
			<p style="padding:10px;">
				* There may be 1-2 hours difference between the actual data. [Sold/Expired/Deleted]: sold/expired/deleted items' within 1 month.
			</p>
			<table class="km-table">
				<tbody>
				  <tr class="bt2">
					<td class="field width10p tal br">
						Item Status
					</td>
					<td class="value tal br" colspan="3">
						<input type="radio" name="goods" id="goods1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="goods1">All</label> 
						<input type="radio" name="goods" id="goods2" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="goods2">On Sale</label> 
						<input type="radio" name="goods" id="goods3" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="goods3">Expire Soon</label> 
						<input type="radio" name="goods" id="goods4" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="goods4"> Sold Out & Expired & Deleted </label>
						(
						<input type="checkbox" id="goods41" style="vertical-align: middle;margin-right: 5px;">
						<label for="goods41">Sold Out</label>
						<input type="checkbox" id="goods42" style="vertical-align: middle;margin-right: 5px;">
						<label for="goods42">Expired</label>
						<input type="checkbox" id="goods43" style="vertical-align: middle;margin-right: 5px;">
						<label for="goods43">Deleted</label>
						)
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Category
					</td>
					<td class="value tal">
						<select style="height: 30px;">	
							<option value="">== Main Category ==</option>
							<optgroup label="女装&amp;时尚">
							<option value="100000001">Women’s Clothing</option>
							<option value="100000042">Underwear &amp; Socks</option>
							<option value="100000003">Bag &amp; Wallet</option>
							<option value="100000043">Shoes</option>
							<option value="100000004">Watch &amp; Jewelry</option>
							<option value="100000005">Fashion Accessories</option>
							</optgroup>
							<optgroup label="美容&amp;减肥">
							<option value="100000006">Cosmetics</option>
							<option value="100000044">Perfume &amp; Luxury Beauty</option>
							<option value="100000007">Hair, Body &amp; Nail</option>
							<option value="100000045">Diet &amp; Tools</option>
							</optgroup>
							<optgroup label="男装&amp;运动">
							<option value="100000002">Men’s Clothing</option>
							<option value="100000046">Bags, Shoes &amp; Accessories</option>
							<option value="100000008">Athletic &amp; Outdoor Clothing</option>
							<option value="100000047">Sports Equipment</option>
							</optgroup>
							<optgroup label="家电&amp;移动电话">
							<option value="100000014">Smartphone &amp; Tablet</option>
							<option value="100000012">Home Electronics</option>
							<option value="100000011">TV, Camera &amp; Audio</option>
							<option value="100000010">Computer &amp; Game</option>
							</optgroup>
							<optgroup label="生活&amp;家居用品">
							<option value="100000048">Kitchen &amp; Dining</option>
							<option value="100000017">Furniture &amp; Deco</option>
							<option value="100000018">Bedding &amp; Rugs &amp; Household</option>
							<option value="100000040">Pet Supplies</option>
							<option value="100000041">Stationery &amp; Supplies</option>
							<option value="100000049">Tools &amp; Gardening</option>
							<option value="100000009">Automotive &amp; Industry</option>
							</optgroup>
							<optgroup label="幼儿&amp;食品">
							<option value="100000015">Baby &amp; Maternity</option>
							<option value="100000016">Kids Fashion</option>
							<option value="100000050">Toys</option>
							<option value="100000020">Groceries</option>
							<option value="100000021">Drinks &amp; Sweets</option>
							<option value="100000023">Nutritious Items</option>
							</optgroup>
							<optgroup label="休闲">
							<option value="100000035">Dining, Spa &amp; Services</option>
							<option value="100000038">Leisure &amp; Travel</option>
							<option value="100000024">Collectibles &amp; Books</option>
							<option value="100000031">CD &amp; DVD</option>
							<option value="100000036">Hotel</option>
							<option value="100000052">Q-Flier</option>
							</optgroup>
						</select>
						<select style="height: 30px;">
							<option value="">== 1st Sub Category ==</option>
						</select>	
						<select style="height: 30px;">
							<option value="">== 2nd Sub Category ==</option>
						</select>
					</td>
					<td class="field width6p tal br">
						Listed Date
					</td>
					<td class="value tal br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width10p tal br">
						Keyword
					</td>
					<td class="value tal" colspan="3">
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">GDcode</td>
					<td class="field width6p br">Item</td>
					<td class="field width6p br">Price</td>
					<td class="field width6p br">Shipping</td>
					<td class="field width6p br">Benefit</td>
					<td class="field width6p br">Sales</td>
					<td class="field width6p br">Page view</td>
					<td class="field width6p">Rating</td>
				  </tr>
				  <tr>
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
</div>
<script src="/assets/js/cms-goods.js" type="text/javascript"></script>