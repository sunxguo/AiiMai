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
			<li class="dropdown" onmouseover="$('#ShoppingList').show();" onmouseout="$('#ShoppingList').hide();">
			  <a href="#" class="dropdown-toggle">Shopping List <span class="caret"></span></a>
			  <ul class="dropdown-menu" id="ShoppingList">
				<li><a href="#">Recent Orders</a></li>
				<li><a href="#">Cancel/Refund</a></li>
				<li><a href="#">Auction</a></li>
				<li><a href="#">ViewAll</a></li>
			  </ul>
			</li>
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
		  </ul>
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
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="panelIndex">
		<table class="km-table b1" style="width: 100%;">
			<tr>
				<td class="field" width="20%">Order/Shipping</td>
				<td class="value tac arrowTd" width="16%">
					Payment Pending<br>
					0
				</td>
				<td class="value tac arrowTd" width="16%">
					Shipping requested<br>
					0
				</td>
				<td class="value tac arrowTd" width="16%">
					Shipping scheduled<br>
					0
				</td>
				<td class="value tac arrowTd" width="16%">
					Shipping on delivery<br>
					0
				</td>
				<td class="value tac" width="16%">
					Shipping delivered<br>
					0
				</td>
			</tr>
			<tr>
				<td class="field" width="20%">Cancel/Refund</td>
				<td class="value tac" width="16%">
					Cancelling<br>
					0
				</td>
				<td class="value tac" width="16%">
					Returning<br>
					0
				</td>
				<td class="value tac" width="16%">
					Refund hold<br>
					0
				</td>
				<td class="value tac" width="16%">
					Refunded<br>
					0
				</td>
				<td class="value tac" width="16%">
					
				</td>
			</tr>
		</table>
	</div>
</div>