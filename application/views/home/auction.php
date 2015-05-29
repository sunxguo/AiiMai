<div class="main-floor no-border panel" style="overflow:visible;">
	<nav class="navbar navbar-default" style="margin-top:10px;">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" style="color:green;"><?php echo $_SESSION['username'];?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<!--
			<li class="active"><a href="#"> <span class="sr-only">(current)</span></a></li>
			-->
			<li class="dropdown active" onmouseover="$('#ShoppingList').show();" onmouseout="$('#ShoppingList').hide();">
			  <a href="#" class="dropdown-toggle">Shopping List <span class="caret"></span></a>
			  <ul class="dropdown-menu" id="ShoppingList">
				<li class="active"><a href="/home/recentOrders">Recent Orders</a></li>
				<li><a href="/home/cancelRefund">Cancel/Refund</a></li>
				<li><a href="/home/auction">Auction</a></li>
				<li><a href="/home/viewAll">ViewAll</a></li>
			  </ul>
			</li>
			<!--
			<li class="dropdown" onmouseover="$('#aAccount').show();" onmouseout="$('#aAccount').hide();">
			  <a href="#" class="dropdown-toggle">A·account <span class="caret"></span></a>
			  <ul class="dropdown-menu" id="aAccount">
				<li><a href="#">A·money</a></li>
				<li><a href="#">A·point</a></li>
				<li><a href="#">Coupon</a></li>
				<li class="divider"></li>
				<li><a href="#">A·stamp</a></li>
				<li class="divider"></li>
				<li><a href="#">A·tocken</a></li>
				<li><a href="#">Gift Card</a></li>
				<li><a href="#">CallPoint</a></li>
				<li><a href="#">A·prime Club</a></li>
				<li><a href="#">Online Top-Up</a></li>
				<li><a href="#">Wi-Fi Ticket</a></li>
			  </ul>
			</li>
			-->
		  </ul>
		  <!--
		  <ul class="nav navbar-nav navbar-right">
			<li class="dropdown" onmouseover="$('#aList').show();" onmouseout="$('#aList').hide();">
			  <a href="#" class="dropdown-toggle">A-List <span class="caret"></span></a>
			  <ul class="dropdown-menu" id="aList">
				<li><a href="#">Viewed List</a></li>
				<li><a href="#">Viewed Qspecialsn</a></li>
				<li><a href="#">Favorite Qspecial</a></li>
				<li><a href="#">Wish List</a></li>
				<li><a href="#">Following Shop</a></li>
				<li class="divider"></li>
				<li><a href="#">My event</a></li>
				<li><a href="#">My Review</a></li>
				<li><a href="#">My Charity</a></li>
				<li><a href="#">My Inquiry & Report</a></li>
			  </ul>
			</li>
			<li class="dropdown" onmouseover="$('#Myinfo').show();" onmouseout="$('#Myinfo').hide();">
			  <a href="#" class="dropdown-toggle">My info<span class="caret"></span></a>
			  <ul class="dropdown-menu" id="Myinfo">
				<li><a href="#">Personal Info</a></li>
				<li><a href="#">Manage Themes</a></li>
			  </ul>
			</li>
		  </ul>-->
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Won Item</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table" style="border:1px solid #ddd;">
				<tbody>
					<tr>
						<td class="field width10p br tac">
							<select id="" name="" style="width:115px;height:25px;">
								<option selected="selected" value="gd_nm">Item Title</option>
								<option value="pack_no">Cart no.</option>
							</select>
						</td>
						<td class="value width40p br">
							<input type="text" id="" class="inp-txt" style="height: 15px;">
							<button onclick=";" type="button" class="km-btn km-btn-primary" style="height: 24px;font-size: 12px;padding: 3px 20px;">Search</button>
						</td>
						<td class="field width10p br tac">Status</td>
						<td class="value width40p">
							<select name="" id="" onchange="" style="height:25px;">
								<option value="">All</option>
								<option value="D1">Payment Pending</option>
								<option value="D2">Order Processing</option>
								<option value="DY">Order Confirmed</option>
								<option value="D3">Delivering</option>
								<option value="D4">Delivered</option>
								<option value="CD">Unconfirmed</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="field br tac">Select Date</td>
						<td class="value" colspan="3">
							<input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 150px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;"> ~ <input type="date" value="<?php echo date("Y-m-d");?>" class="km-form-control" style="width: 150px;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div style="overflow:auto;">
			<table class="km-table" style="overflow:scroll;width:100%;">
				<tbody>
				  <tr style="border-top:2px solid #ddd;border-bottom:2px solid #ddd;">
					<td class="field width6p br">Cart no.(Date)</td>
					<td class="field width6p br">Item</td>
					<td class="field width6p br">Qty</td>
					<td class="field width6p br">Payment</td>
					<td class="field width6p br">Shipping</td>
					<td class="field width6p br">Status</td>
					<td class="field width6p">Remarks</td>
				  </tr>
				  <!--
				  <tr>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value br"></td>
					<td class="value"></td>
				  </tr>
				  -->
				  <tr>
					<td class="value br" colspan="7">There is no shopping list for 3 months.</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>