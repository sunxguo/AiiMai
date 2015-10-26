<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Bank</title>
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
			Add Bank
		</div>
		<div id="Div1">
			<div class="item itemLeft">
				<span class="label">Bank Name:</span>
				<input type="text" id="bankname" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
				<span class="label" style="margin-left:20px;">Bank Code:</span>
				<input type="text" id="bankCode" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label" style="width:200px !important;">The Length of Account Number:</span>
				<input type="text" id="accountNumberLength" class="inp-txt" style="width:250px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label" style="width:200px !important;">The Head of Branch Code:</span>
				<input type="text" id="branchCodeHead" class="inp-txt" style="width:250px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label">The Length of Branch Code in Account Number:</span>
				<input type="text" id="branchCodeBodyLength" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
			<div class="item itemLeft">
				<span class="label">Order Number:</span>
				<input type="text" id="bankname" class="inp-txt" style="width:150px;">
				<span style="color: red;">*</span>
			</div>
		</div>
	</div>
	<div class="btn-center">
		<a href="javascript:bankHandler(0,'发布成功！正在刷新...',true)" class="btnfa120">Save</a>
	</div>
</div>
	<!-- <div class="footer" style="background:rgb(40,75,110);width:100%;color:#F0F0F0">
		AiiMai
	</div> -->
	<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
	<div id="bkDiv"></div>
</body>
</html>