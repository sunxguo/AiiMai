<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_grade_MyGradeAndPoint');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tac br">
						<?php echo lang('cms_grade_SellerGrade');?>
					</td>
					<td class="field tac br" colspan="5">
						<?php echo lang('cms_grade_Ordercountandamount');?>
					</td>
					<td class="field tac br" colspan="3">
						<?php echo lang('cms_grade_Servicepoint');?>
					</td>
					<td class="field tac" colspan="3">
						<?php echo lang('cms_grade_Shippingpoint');?>
					</td>
				  </tr>
				  <tr>
					<td class="value width10p tac br" rowspan="3">
						<?php echo lang('cms_grade_StandardSeller');?>
					</td>
					<td class="field tac br" colspan="2">
						<?php echo lang('cms_grade_Thismonth');?> <br>(4.1 ~ 4.14)
					</td>
					<td class="field tac br" colspan="2">
						<?php echo lang('cms_grade_Oneyear');?> <br>('14.5.1 ~ '15.4.14)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Lastmonth');?> <br>(3.1 ~ 3.31)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Thismonth');?> <br>(4.1 ~ 4.14)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Last30days');?> <br>(3.16 ~ 4.14)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Lastmonth');?> <br>(3.1 ~ 3.31)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Thismonth');?> <br>(4.1 ~ 4.14)
					</td>
					<td class="field tac br">
						<?php echo lang('cms_grade_Last30days');?> <br>(3.16 ~ 4.14)
					</td>
					<td class="field tac">
						<?php echo lang('cms_grade_Lastmonth');?> <br>(3.1 ~ 3.31)
					</td>
				  </tr>
				  <tr>
					<td class="value width10p tac br">
						0 <?php echo lang('cms_grade_orders');?>
					</td>
					<td class="value tac br">
						<?php echo lang('cms_grade_MoM');?> 0%
					</td>
					<td class="value tac br">
						0 <?php echo lang('cms_grade_orders');?>
					</td>
					<td class="value tac br">
						YoY 0%
					</td>
					<td class="value tac br">
						0 <?php echo lang('cms_grade_orders');?>
					</td>
					<td class="value tac br">
						0
					</td>
					<td class="value tac br">
						0
					</td>
					<td class="value tac br">
						0
					</td>
					<td class="value tac br">
						0
					</td>
					<td class="value tac br">
						0
					</td>
					<td class="value tac">
						0
					</td>
				  </tr>
				  <tr>
					<td class="value width10p tac br">
						S$0.00
					</td>
					<td class="value tac br">
						<?php echo lang('cms_grade_MoM');?> 0%
					</td>
					<td class="value tac br">
						S$0.00
					</td>
					<td class="value tac br">
						YoY 0%
					</td>
					<td class="value tac br">
						S$0.00
					</td>
					<td class="value tac" colspan="6">
						
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_grade_ItemPointofthismonth').'-'.lang('cms_grade_ItemPointofthismonthTip');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p tal br">
						<?php echo lang('cms_grade_Category');?>
					</td>
					<td class="value tal" colspan="3">
						<select style="height: 30px;">
							<option value="">== <?php echo lang('cms_common_MainCategory');?> ==</option>
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
							<option value="">== <?php echo lang('cms_common_1stSubCategory');?> ==</option>
						</select>
						<select style="height: 30px;">
							<option value="">== <?php echo lang('cms_common_2ndSubCategory');?> ==</option>
						</select>
						<select style="height: 30px;">
							<option value=""><?php echo lang('cms_common_ItemCodeOrItemName');?></option>
							<option value="gd_no"><?php echo lang('cms_common_Itemcode');?></option>
							<option value="gd_nm"><?php echo lang('cms_common_Itemname');?></option>
						</select>
						<input type="text" class="km-form-control" id="customer_view_fax_areacode" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;">
					</td>
					<td class="field width10p tal br">
						<?php echo lang('cms_common_SearchDate');?>
					</td>
					<td class="value tal br">
						<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 60%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="value tar">
						<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;"><?php echo lang('cms_common_Search');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:300%;border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
				<tbody>
				  <tr style="border-bottom:2px solid #ddd;">
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Itemcode');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Itemimage');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Itemname');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Ordercount');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Ordervalue');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_Totalservice');?></td>
					<td class="field tac br" colspan="15"><?php echo lang('cms_common_Shippingpoint');?></td>
					<td class="field tac br" colspan="3"><?php echo lang('cms_common_Claimpoint');?></td>
					<td class="field tac br" colspan="4"><?php echo lang('cms_common_Feedbackpoint');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_MainCategory');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_1stSubCategory');?></td>
					<td class="field tac br" rowspan="2"><?php echo lang('cms_common_2ndSubCategory');?></td>
				  </tr>
				  <tr>
					<td class="field br">Local+2</td>
					<td class="field br">Local+1</td>
					<td class="field br">Local+0.5</td>
					<td class="field br">Local+0</td>
					<td class="field br">Local-1</td>
					<td class="field br">Local-2</td>
					<td class="field br">Local(auto complete)-0.2</td>
					<td class="field br">Oversea+2</td>
					<td class="field br">Oversea+1</td>
					<td class="field br">Oversea+0.5</td>
					<td class="field br">Oversea0</td>
					<td class="field br">Oversea-1</td>
					<td class="field br">Oversea-2</td>
					<td class="field br">Oversea(auto complete)-0.2</td>
					<td class="field br"><?php echo lang('cms_common_Totalshippingpoint');?></td>
					<td class="field br"><?php echo lang('cms_common_CancelOrReturned');?>-3</td>
					<td class="field br"><?php echo lang('cms_common_Nonreceiptreport');?>-2</td>
					<td class="field br"><?php echo lang('cms_common_Totalclaimpoint');?></td>
					<td class="field br"><?php echo lang('cms_common_highlyrecommend');?>+1</td>
					<td class="field br"><?php echo lang('cms_common_recommend');?>0</td>
					<td class="field br"><?php echo lang('cms_common_Notrecommend');?>-1</td>
					<td class="field br"><?php echo lang('cms_common_Total');?></td>
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