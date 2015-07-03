<div class="padding10 formList clearfix modify_main">
	<div class="tabs-box" style="margin-bottom:10px;">
		<div class="tabs-top">
			<a href="/admin/websiteInfo">About AiiMai</a>
			<a href="/admin/userAgreement">User Agreement</a>
			<a href="/admin/sellerAgreement">Seller Agreement</a>
			<a href="/admin/help">Help</a>
			<a href="/admin/emailComfirmation" class="current">Email Comfirmation</a>
			<a href="/admin/emailUserAccountRegisteredSuccessfully">Email of User Account Registered Successfully</a>
			<a href="/admin/emailMerchantAccountApproval">Email of Merchant Account approval</a>
		</div>
	</div>
	
	<div class="partContent clearboth content">
		<div class="title">Subject</div>
		Subject: <input type="text" id="emailComfirmationTitle" class="inp-txt" value="<?php echo $emailComfirmationTitle;?>" style="width:80%;margin:20px 0;">
	</div>
	<div class="partContent clearboth content">
		<div class="title">Content</div>
		<textarea id="infoEditor" name="description"><?php echo $emailComfirmationContent;?></textarea>
	</div>
	<input type="hidden" value="<?php //echo $content->essay_id;?>" id="essayId">
	<div class="btn-center">
		<a href="javascript:websiteInfoEmailComfirmationSave('Successfully Saved！Refreshing...')" class="btnfa120">Save</a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script>
	var infoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			infoEditor = K.create('#infoEditor', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'600px',
				resizeType:0,
				imageTabIndex:1,
				langType : '<?php echo $_SESSION['language']=="english"?'en':'zh_CN';?>'
			});
		});
	});
</script>