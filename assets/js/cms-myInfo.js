$(document).ready(function(){
	
});
function modifyMyInfoCustomerViewEmail(){
	setDivCenter('#MyInfoCustomerViewEmail',true);
}
function modifySellerBaseInfoPwd(){
	setDivCenter('#sellerBaseInfoPwd',true);
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
	showAlert('success','修改成功!',imageSrc+'正在刷新...');
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
	showAlert('success','修改成功!',imageSrc+'正在刷新...');
}