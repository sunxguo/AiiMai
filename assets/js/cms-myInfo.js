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
	var length = $("#seller_baseinfo_newpwd").val().length;
	if(length<6 || length>25){	//3-15个字符
//		alert("密码长度为6~25个字符！");
		alert('Password must be 6 to 25 characters!');
		return false;
	}
	if($("#seller_baseinfo_newpwd").val()!=$("#seller_baseinfo_confirmpwd").val()){
		alert('The two passwords you entered are different!');
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
function saveSalesStaffName(){
	var salesStaffName = new Object();
	salesStaffName.id=$("#merchantId").val();
	salesStaffName.name = $("#salesStaffName").val();
	dataHandler("modify","salesStaffName",salesStaffName,successRefresh,null,null,null,true);
}
function saveSalesStaffEmail(){
	var salesStaffEmail = new Object();
	salesStaffEmail.id=$("#merchantId").val();
	salesStaffEmail.email = $("#salesStaffEmail").val();
	dataHandler("modify","salesStaffEmail",salesStaffEmail,successRefresh,null,null,null,true);
}
function saveSalesStaffMobilePhone(){
	var salesStaffMobilePhone = new Object();
	salesStaffMobilePhone.id=$("#merchantId").val();
	salesStaffMobilePhone.salesStaffMobilePhone1 = $("#salesStaffMobilePhone1").val();
	salesStaffMobilePhone.salesStaffMobilePhone2 = $("#salesStaffMobilePhone2").val();
	salesStaffMobilePhone.salesStaffMobilePhone3 = $("#salesStaffMobilePhone3").val();
	dataHandler("modify","salesStaffMobilePhone",salesStaffMobilePhone,successRefresh,null,null,null,true);
}
function saveSalesStaffPhone(){
	var salesStaffPhone = new Object();
	salesStaffPhone.id=$("#merchantId").val();
	salesStaffPhone.salesStaffPhone1 = $("#salesStaffPhone1").val();
	salesStaffPhone.salesStaffPhone2 = $("#salesStaffPhone2").val();
	salesStaffPhone.salesStaffPhone3 = $("#salesStaffPhone3").val();
	dataHandler("modify","salesStaffPhone",salesStaffPhone,successRefresh,null,null,null,true);
}
function saveSalesStaffFax(){
	var salesStaffFax = new Object();
	salesStaffFax.id=$("#merchantId").val();
	salesStaffFax.salesStaffFax1 = $("#salesStaffFax1").val();
	salesStaffFax.salesStaffFax2 = $("#salesStaffFax2").val();
	salesStaffFax.salesStaffFax3 = $("#salesStaffFax3").val();
	dataHandler("modify","salesStaffFax",salesStaffFax,successRefresh,null,null,null,true);
}
function saveShipFromAddress(){
	var shipFromAddress = new Object();
	shipFromAddress.userId=$("#merchantId").val();
	shipFromAddress.type = 1;
	shipFromAddress.title = $("#shipFromAddressTitle").val();
	shipFromAddress.staffname = $("#shipFromAddressStaffName").val();
	shipFromAddress.country = $("#shipFromAddressCountry").val();
	shipFromAddress.area = $("#shipFromAddressArea").val();
	shipFromAddress.detail = $("#shipFromAddressDetail").val();
	shipFromAddress.mobilephone1 = $("#shipFromAddressMobilephone1").val();
	shipFromAddress.mobilephone2 = $("#shipFromAddressMobilephone2").val();
	shipFromAddress.mobilephone3 = $("#shipFromAddressMobilephone3").val();
	shipFromAddress.phone1 = $("#shipFromAddressPhone1").val();
	shipFromAddress.phone2 = $("#shipFromAddressPhone2").val();
	shipFromAddress.phone3 = $("#shipFromAddressPhone3").val();
	dataHandler("modify","address",shipFromAddress,successRefresh,null,null,null,true);
}
function saveDeliveryCompany(){
	var deliveryCompany = new Object();
	deliveryCompany.id=$("#merchantId").val();
	deliveryCompany.company = $("#deliveryCompany").val();
	dataHandler("modify","deliveryCompany",deliveryCompany,successRefresh,null,null,null,true);
}
function saveOrderAlert(){
	var orderAlert = new Object();
	orderAlert.id=$("#merchantId").val();
	orderAlert.isEmail = $("#isOrderAlertEmail").prop('checked')?1:0;
	orderAlert.isSMS = $("#isOrderAlertSMS").prop('checked')?1:0;
	orderAlert.email = $("#orderAlertEmail").val();
	dataHandler("modify","orderAlert",orderAlert,successRefresh,null,null,null,true);
}
function saveIsSendingNotifyMail(){
	var isSendingNotifyMail = new Object();
	isSendingNotifyMail.id=$("#merchantId").val();
	isSendingNotifyMail.isSendingNotifyMail = $("#isSendingNotifyMail").prop('checked')?1:0;
	dataHandler("modify","isSendingNotifyMail",isSendingNotifyMail,successRefresh,null,null,null,true);
}
function saveEticketPassword(){
	var eticketPassword = new Object();
	eticketPassword.id=$("#merchantId").val();
	eticketPassword.eticketPassword = $("#eticketPassword").val();
	dataHandler("modify","eticketPassword",eticketPassword,successRefresh,null,null,null,true);
}