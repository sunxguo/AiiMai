<style>
.cms-main{
	background-color:#FFF;
}
</style>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Search item</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr style="border-top:2px solid #ddd;">
					<td class="field width10p tal br">
						Sales Nation/Sales(Y/N)
					</td>
					<td class="value width20p tal">
						<select style="height: 30px;">	
                        	<option value="US">Hub Site(Qoo10.com)</option>
		                </select>
						<select style="height: 30px;">			 
							<option value="" selected="">all</option>
							<option value="Y">Selling</option>
							<option value="N">No-Selling</option>
						</select>
					</td>
					<td class="field width10p tal br">
						Category
					</td>
					<td class="value width40p tal">
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
				</tr>
				<tr>
					<td class="field tal br">
						Inventory
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="" selected="selected">all</option>
							<option value="Y">In stock</option>
							<option value="N">Out of stock</option>
						</select>
					</td>
					<td class="field tal br">
						Condition Search
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="1">Item Code</option>
							<option value="2">GD Title</option>
							<option value="3">Seller Code</option>
							<option value="N">None</option>
						</select>
						<input type="text" class="km-form-control" style="width: 50%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				</tr>
				<tr>
					<td class="field tal br">
						Status
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="S1">On queue</option>
							<option value="S2" selected="selected">Available</option>
							<option value="S3">Suspended</option>
							<option value="S4">Deleted</option>
							<option value="S5">Restricted</option>
						</select>
					</td>
					<td class="field tal br">
						<select style="height: 30px;">
							<option value="0" selected="selected">List Date</option>
							<option value="1">Change Date</option>
						</select>
					</td>
					<td class="value tal">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 40%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				</tr>
				<tr>
					<td class="value tar" colspan="4">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Search</button>
						<button onclick=";" type="button" class="km-btn km-btn-success" style="height: 28px;font-size: 12px;padding: 5px 10px;">Excel</button>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width1p br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
					<td class="field width6p br">Item Code</td>
					<td class="field width6p br">Seller Code</td>
					<td class="field width6p br">GD Title</td>
					<td class="field width6p br">Sales Nation</td>
					<td class="field width6p br">Global Sales</td>
					<td class="field width6p br">Link Availablity</td>
					<td class="field width6p br">Status</td>
					<td class="field width6p br">Sell Price</td>
					<td class="field width6p br">Stock</td>
					<td class="field width6p br">Main Cat</td>
					<td class="field width6p br">1st sub Cat</td>
					<td class="field width6p">2nd sub Cat</td>
				  </tr>
				  <tr>
					<td class="value br"><input type="checkbox" style="vertical-align: middle;margin-right: 5px;"></td>
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
		<div class="km-panel-heading">Register Global Sales Item in bulk</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						Sales Nation
					</td>
					<td class="value tal">
						<input type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 40%;height: 26px;padding: 0 5px;display: inline-block;vertical-align: bottom;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
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
							</optgroup></select>
						<select style="height: 30px;">
							<option value="">== 1st Sub Category ==</option>
						</select>	
						<select style="height: 30px;">
							<option value="">== 2nd Sub Category ==</option>
						</select>
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">Automatic Category Matching
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Global Item Status
					</td>
					<td class="value tal">
						<input type="radio" name="globalGoodsStatus" id="globalGoodsStatus1" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="globalGoodsStatus1">  Register as the status "Available"</label>
						<input type="radio" name="globalGoodsStatus" id="globalGoodsStatus2" style="vertical-align: middle;margin-right: 5px;" checked>
						<label for="globalGoodsStatus2"> Register as the status "On Queue"</label>
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Price
					</td>
					<td class="value tal">
						Price is calculated by the Qoo10 exchange rate. Settlement currency is USD.( 1  SGD =<input value="1" type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20px;height: 16px;padding: 0 5px;display: inline-block;vertical-align: bottom;font-size: 10px;" disabled="disabled"> SGD )     Price Mutiplier  : <input value="1" type="text" class="km-form-control km-input-disabled" id="customer_view_fax_areacode" style="width: 20px;height: 16px;padding: 0 5px;display: inline-block;vertical-align: bottom;font-size: 10px;" disabled="disabled">
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Shipping Rate
					</td>
					<td class="value tal">
						<select style="height: 30px;">
							<option value="0"> ---- Select ---- </option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field tal br">
						Auto Translate
					</td>
					<td class="value tal">
						<input type="checkbox" id="basicDeliveryCosts" style="vertical-align: middle;margin-right: 5px;">
						<label for="basicDeliveryCosts"> Translate item title, short title, production place, gift, and option.</label>
						<select style="height: 30px;">
							<option value="">Source Language</option>
							<option value="en">ENGLISH</option>
							<option value="ja">JAPANESE</option>
							<option value="ko">KOREAN</option>
							<option value="zh">CHINESE</option>
							<option value="id">INDONESIAN</option>
							<option value="ms">MALAY</option>
						</select>>>
						<select style="height: 30px;">
							<option value="">Target Language</option>
							<option value="en">ENGLISH</option>
							<option value="ja">JAPANESE</option>
							<option value="ko">KOREAN</option>
							<option value="zh">CHINESE</option>
							<option value="zh-TW">CHINESE_TRADITIONAL</option>
							<option value="id">INDONESIAN</option>
							<option value="ms">MALAY</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="value tal" colspan="2">
					    <p class="fl">
							* Item Price will be [(Price)x(Price Mutiplier)].  (You can see the default exchage rate managed by Qoo10)<br>
							* Selling Qty and Period will be followed to the original Nation.<br>
							* Shipping Rate will be set "Free". you can set shipping rate at all once on the menu "QSM>>Price/Listing >> Shipping Rate Mgt."
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Register the Selected</button>
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Delete Global Items</button>
						</p>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-groupBuy.js" type="text/javascript"></script>