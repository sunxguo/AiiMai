<div class="main-floor no-border panel">
	<nav class="navbar navbar-default" style="margin-top:10px;">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" style="color:green;"><?php echo $_SESSION['username'];?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="#">Shopping List <span class="sr-only">(current)</span></a></li>
			<li><a href="#">Link</a></li>
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
			<li><a href="#">My Info</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle">Dropdown <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
<div class="main-floor no-border panelIndex">
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