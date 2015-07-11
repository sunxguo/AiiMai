$(document).ready(function(){
	$("#bkDiv").click(function(){
		$(".km-modal-dialog").hide();
		$(".km-alert").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
	$(".km-close").click(function(){
		$(".km-modal-dialog").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
	$(".km-btn-close").click(function(){
		$(".km-modal-dialog").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
});
/**
 * 让指定的DIV始终显示在屏幕正中间
 */
function setDivCenter(divId,bk){
	var top = ($(window).height() > $(divId).height())?($(window).height() - $(divId).height())/2:0;   
	var left = ($(window).width() - $(divId).width())/2;   
	var scrollTop = $(document).scrollTop();   
	var scrollLeft = $(document).scrollLeft();   
	$(divId).css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show(100);
	if(bk) $("#bkDiv").show();
	$("body").addClass('km-modal-open');
}
function removeDiv(divId){
	$(divId).hide(100);
	$("#bkDiv").hide(100);
}
function showWait(){
	setDivCenter("#waitDiv",true);
}
function closeWait(){
	removeDiv("#waitDiv");
}
function showMsg(msg){
	$("#msgBox").show();
	$("#newMsg").text(msg);
	var d = new Date();
	var timeStr = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
	$("#msgTime").text(timeStr);
	setTimeout(closeMsg,2500);
}
function closeMsg(){
	$("#msgBox").hide();
}
function show(divId){
	$(divId).show();
}
function hide(divId){
	$(divId).hide();
}
/**
 * type:success,warning,info,danger
 */
function showAlert(type,strong,msg){
	$('#messageAlert').children('strong').text(strong);
	$('#messageAlert').children('.km-alert-msg').text(msg);
	$('#messageAlert').addClass('km-alert-'+type);
	setDivCenter('#messageAlert',true);
	setTimeout(closeAlert,2500);
}
function closeAlert(){
	$(".km-modal-dialog").hide();
	$(".km-alert").hide();
	$("#bkDiv").hide();
	$("body").removeClass('km-modal-open');
	$('#messageAlert').removeClass('km-alert-success','km-alert-warning','km-alert-info','km-alert-danger');
}
function jumpPage(url){
	var pageNum=$('#page_num').val();
	if(pageNum!=null && pageNum>0)
		location.href=url+pageNum;
	else
		alert("请输入正确页数!");
}
function getThumb(wraperId){
	var objJson = [];
	$(wraperId).each(function(index){
		objJson.push(jQuery.parseJSON('{"src":"' + $(this).find('.thumb-src').attr("src") + '"}')); 
	})
	return objJson;
}
/**
 * 数据与后台交互
 * (object)postData
 * 默认值：callBack="NoCallBack",confirmMsg="NoConfirmation",refresh=false
 */
function dataHandler(funcType,dataType,postDataObj,callBack,confirmMsg,cancelCallBack,successMsg,refresh){
	if(confirmMsg && !confirm(confirmMsg)){
		if(cancelCallBack) cancelCallBack();
		return false;
	}
	$.post(
	"/common/"+funcType+"Info",
	{
		'info_type':dataType,
		'data':JSON.stringify(postDataObj)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			if(successMsg) showMsg(successMsg);
			if(callBack) callBack(result.message);
			if(refresh) location.reload();
		}else{
			alert(result.message);
		}
	});
}
function addImage(){
	$("#file").click();
}
function uploadImage(beforeUpload,successHandler){
	$("#upload_image_form").ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				successHandler(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/common/uploadImage",
		data: $("#upload_image_form").formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			beforeUpload();
		}
	});
	return false;
}
function uploadImageAdvance(formId,beforeUpload,successHandler){
	$(formId).ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				successHandler(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/common/uploadImage",
		data: $(formId).formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			beforeUpload();
		}
	});
	return false;
}
function language(language){
	$.post(
	"/common/setLanguage",
	{
		'language':language
	},
	function(data){
		location.reload();
	});
}