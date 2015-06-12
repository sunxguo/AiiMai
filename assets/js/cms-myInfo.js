$(document).ready(function(){
	$("#baseInfoAddress").click(function(){
		var baseInfoAddressDisplay = new Object();
		baseInfoAddressDisplay.id=$("#merchantId").val();
		baseInfoAddressDisplay.display = $("#baseInfoAddress").prop("checked");
		dataHandler("modify","baseInfoAddressDisplay",baseInfoAddressDisplay,successRefresh,null,null,null,true);
	});
	$("#baseInfoPhone").click(function(){
		var baseInfoPhoneDisplay = new Object();
		baseInfoPhoneDisplay.id=$("#merchantId").val();
		baseInfoPhoneDisplay.display = $("#baseInfoPhone").prop("checked");
		dataHandler("modify","baseInfoPhoneDisplay",baseInfoPhoneDisplay,successRefresh,null,null,null,true);
	});
});
function modifyMyInfoCustomerViewEmail(){
	setDivCenter('#MyInfoCustomerViewEmail',true);
}
function modifySellerBaseInfoPwd(){
	setDivCenter('#sellerBaseInfoPwd',true);
}
function saveSellerBaseInfoPwd(successMsg){
	if($("#seller_baseinfo_oldpwd").val()==""){
		alert('Old password can not be empty!');
		return false;
	}
	if($("#seller_baseinfo_newpwd").val()==""){
		alert('New password can not be empty!');
		return false;
	}
	if($("#seller_baseinfo_newpwd").val()!=$("#seller_baseinfo_confirmpwd").val()){
		alert('The two password don`t match!');
		return false;
	}
	var pwd = new Object();
	pwd.oldpwd = $("#seller_baseinfo_oldpwd").val();
	pwd.newpwd = $("#seller_baseinfo_newpwd").val();
	dataHandler("modify","merchantpwd",pwd,null,null,null,successMsg,true);
}
function modifyAAccountPwd(){
	setDivCenter('#AAccountPwd',true);
}
function uploadBusinessLicense(){
	uploadImageAdvance("#upload_BusinessLicense_form",addBusinessLicenseBeforeUpload,addBusinessLicenseAfterUpload)
}
function addBusinessLicenseBeforeUpload(){
	$("#loadingBusinessLicense").show();
}
function addBusinessLicenseAfterUpload(imageSrc){
	//update database
	$("#loadingBusinessLicense").hide();
	var merchantBusinessLicense = new Object(); 
	merchantBusinessLicense.src = imageSrc;
	merchantBusinessLicense.Msg = $("#BusinessLicenseMsg").val();
	dataHandler("modify","merchantBusinessLicense",merchantBusinessLicense,successBusinessLicense,null,null,null,true);
}
function successBusinessLicense(){
	showAlert('success','Successfully Uploaded!','Refreshing...');
}
function uploadBankbook(){
	uploadImageAdvance("#upload_bankbook_form",addBankbookBeforeUpload,addBankbookAfterUpload)
}
function addBankbookBeforeUpload(){
	$("#loadingBankbook").show();
}
function addBankbookAfterUpload(imageSrc){
	//update database
	$("#loadingBankbook").hide();
	var merchantBankbook = new Object(); 
	merchantBankbook.src = imageSrc;
	merchantBankbook.Msg = $("#BankbookMsg").val();
	dataHandler("modify","merchantBankbook",merchantBankbook,successBankbook,null,null,null,true);
}
function successBankbook(){
	showAlert('success','Successfully Uploaded!','Refreshing...');
}
function requestForSettleInfo(){
	showAlert('success','Successfully Requested!','Please Wait...');
}
function saveGstInfo(){
	var GST = new Object();
	GST.gstName = $("#gstName").val();
	GST.gstNumber = $("#gstNumber").val();
	GST.gstAddress = $("#gstAddress").val();
	dataHandler("modify","GstInfo",GST,successGstInfo,null,null,null,true);
}
function successGstInfo(){
	showAlert('success','Successfully Saved!','Refreshing...');
}
function saveMyInfoMobilephoneNo(){
	var myInfoMobilephoneNo = new Object();
	myInfoMobilephoneNo.id=$("#merchantId").val();
	myInfoMobilephoneNo.merchant_phone1 = $("#merchant_phone1").val();
	myInfoMobilephoneNo.merchant_phone2 = $("#merchant_phone2").val();
	myInfoMobilephoneNo.merchant_phone3 = $("#merchant_phone3").val();
	dataHandler("modify","myInfoMobilephoneNo",myInfoMobilephoneNo,successRefresh,null,null,null,true);
}
function successRefresh(){
	showAlert('success','Success!','Refreshing...');
}
function saveMyInfoPhonenumber(){
	var myInfoPhonenumber = new Object();
	myInfoPhonenumber.id=$("#merchantId").val();
	myInfoPhonenumber.merchant_homephone1 = $("#merchant_homephone1").val();
	myInfoPhonenumber.merchant_homephone2 = $("#merchant_homephone2").val();
	myInfoPhonenumber.merchant_homephone3 = $("#merchant_homephone3").val();
	dataHandler("modify","myInfoPhonenumber",myInfoPhonenumber,successRefresh,null,null,null,true);
}
function saveMyInfoEmail(){
	var myInfoEmail = new Object();
	myInfoEmail.id=$("#merchantId").val();
	myInfoEmail.merchant_email = $("#merchant_email").val();
	dataHandler("modify","myInfoEmail",myInfoEmail,successRefresh,null,null,null,true);
}
function savebaseInfo(){
	var baseInfo = new Object();
	baseInfo.id=$("#merchantId").val();
	baseInfo.address = $("#baseInfoAddressContent").val();
	baseInfo.phone1 = $("#baseInfoPhoneContent1").val();
	baseInfo.phone2 = $("#baseInfoPhoneContent2").val();
	baseInfo.phone3 = $("#baseInfoPhoneContent3").val();
	dataHandler("modify","baseInfo",baseInfo,successRefresh,null,null,null,true);
}
function saveBaseInfoFaxnumber(){
	var baseInfoFaxnumber = new Object();
	baseInfoFaxnumber.id=$("#merchantId").val();
	baseInfoFaxnumber.phone1 = $("#baseInfoFaxnumber1").val();
	baseInfoFaxnumber.phone2 = $("#baseInfoFaxnumber2").val();
	baseInfoFaxnumber.phone3 = $("#baseInfoFaxnumber3").val();
	dataHandler("modify","baseInfoFaxnumber",baseInfoFaxnumber,successRefresh,null,null,null,true);
}
function saveBaseInfoWorkinghour(){
	var businessHours = new Object();
	businessHours.id=$("#merchantId").val();
	businessHours.businessHours = $("#customer_view_businessHours").val();
	dataHandler("modify","businessHours",businessHours,successRefresh,null,null,null,true);
}
function saveDisplayedInfoEmail(){
	var displayedInfoEmail = new Object();
	displayedInfoEmail.id=$("#merchantId").val();
	displayedInfoEmail.email = $("#displayedInfoEmail").val();
	dataHandler("modify","displayedInfoEmail",displayedInfoEmail,successRefresh,null,null,null,true);
}