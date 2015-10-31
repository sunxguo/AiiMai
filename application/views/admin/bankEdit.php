<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Bank</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/bk.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/admin-common.js" type="text/javascript"></script>
	<script src="/assets/js/admin.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
	<style type="text/css">
	.label{
		width: inherit !important;
		text-align: left !important;
	}
	</style>
</head>
<body>
<div class="padding10 formList clearfix" style="min-height:800px;">
	<div class="partContent" style="width:55%;margin: 0 auto;">
		<div class="title">
			Edit Bank
		</div>
		<input type="hidden" id="bankId" value="<?php echo $_GET['bankId'];?>">
		<div id="Div1">
			<div class="item itemLeft">
				<span class="label">Bank Name:</span>
				<input type="text" id="bankname" value="<?php echo $bank->bank_name;?>" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
				<span class="label" style="margin-left:20px;">Bank Code:</span>
				<input type="text" id="bankcode" value="<?php echo $bank->bank_code;?>" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label" style="width:200px !important;">The Length of Account Number:</span>
				<input type="text" id="accountNumberLength" value="<?php echo $bank->bank_accountNumberLength;?>" class="inp-txt" style="width:250px;">
				<span style="color: red;">If is varied,please enter 0</span>
			</div>
			<div class="item itemLeft">
				<span class="label" style="width:200px !important;">The Head of Branch Code:</span>
				<input type="text" id="branchCodeHead" value="<?php echo $bank->bank_branchCodeHead;?>" class="inp-txt" style="width:250px;">
			</div>
			<div class="item itemLeft">
				<span class="label">The Length of Branch Code in Account Number:</span>
				<input type="text" id="branchCodeBodyLength" value="<?php echo $bank->bank_branchCodeBodyLength;?>" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label">Account Number retain Branch Code:</span>
				<select id="accountNumberRetainBranch" class="inp-txt" style="width:80px;">
					<option value="1" <?php if($bank->bank_accountNumberRetainBranch==1):?>selected<?php endif;?>>
						Yes
					</option>
					<option value="0" <?php if($bank->bank_accountNumberRetainBranch==0):?>selected<?php endif;?>>
						No
					</option>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label">Order Number:</span>
				<input type="text" id="ordernumber" value="<?php echo $bank->bank_order;?>" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
		</div>
	</div>
	<div class="btn-center">
		<a href="javascript:bankHandler(false,'Success saved,Refreshing...')" class="btnfa120">Save</a>
	</div>
</div>
	<!-- <div class="footer" style="background:rgb(40,75,110);width:100%;color:#F0F0F0">
		AiiMai
	</div> -->
	<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
	<div id="bkDiv"></div>
	<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
      <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
      <strong></strong>
	  <span class="km-alert-msg"></span>
    </div>
</body>
</html>