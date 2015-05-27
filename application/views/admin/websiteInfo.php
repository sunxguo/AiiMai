<div class="padding10 formList clearfix">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/admin/websiteInfo'" class="left active" style="width:150px;">
				About AiiMai
			</div>
			<div onclick="location.href='/admin/userAgreement'" class="right" style="width:150px;">
				User Agreement
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent clearboth content">
		<div class="title" onclick="shows(2)">Content</div>
		<textarea id="infoEditor" name="description"><?php echo $about;?></textarea>
	</div>
	<input type="hidden" value="<?php //echo $content->essay_id;?>" id="essayId">
	<div class="btn-center">
		<a href="javascript:websiteInfoSave('website_about_aiimai','Successfully Saved！Refreshing...')" class="btnfa120">Save</a>
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