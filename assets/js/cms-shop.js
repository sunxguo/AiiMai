$(document).ready(function(){
	
});

function successRefresh(){
	showAlert('success','Success!','Refreshing...');
}
function successUploadedRefresh(){
	showAlert('success','Successfully Uploaded!','Refreshing...');
}
function saveSellerShopTitle(){
	var sellerShopTitle = new Object();
	sellerShopTitle.id=$("#merchantId").val();
	sellerShopTitle.title = $("#sellerShopTitleInput").val();
	dataHandler("modify","sellerShopTitle",sellerShopTitle,successRefresh,null,null,null,true);
}
function saveSellerShopWelcome(){
	var sellerShopWelcome = new Object();
	sellerShopWelcome.id=$("#merchantId").val();
	sellerShopWelcome.welcome = $("#sellerShopWelcomeInput").val();
	dataHandler("modify","sellerShopWelcome",sellerShopWelcome,successRefresh,null,null,null,true);
}
function uploadMainLogo(){
	uploadImageAdvance("#upload_mainLogo_form",addMainLogoBeforeUpload,addMainLogoAfterUpload);
}
function addMainLogoBeforeUpload(){
	$("#mainLogoImage").attr('src','/assets/images/cms/loading.gif');
}
function addMainLogoAfterUpload(imageSrc){
	//update database
	$("#mainLogoImage").attr('src',imageSrc);
	var mainLogo = new Object(); 
	mainLogo.id=$("#merchantId").val();
	mainLogo.src = imageSrc;
	dataHandler("modify","mainLogo",mainLogo,successUploadedRefresh,null,null,null,true);
}
function deleteMainLogo(){
	$("#mainLogoImage").attr('src','');
	var mainLogo = new Object(); 
	mainLogo.id=$("#merchantId").val();
	mainLogo.src = '';
	dataHandler("modify","mainLogo",mainLogo,successRefresh,null,null,null,true);
}
function uploadSmallLogo(){
	uploadImageAdvance("#upload_smallLogo_form",addSmallLogoBeforeUpload,addSmallLogoAfterUpload);
}
function addSmallLogoBeforeUpload(){
	$("#smallLogoImage").attr('src','/assets/images/cms/loading.gif');
}
function addSmallLogoAfterUpload(imageSrc){
	//update database
	$("#smallLogoImage").attr('src',imageSrc);
	var smallLogo = new Object(); 
	smallLogo.id=$("#merchantId").val();
	smallLogo.src = imageSrc;
	dataHandler("modify","smallLogo",smallLogo,successUploadedRefresh,null,null,null,true);
}
function deleteSmallLogo(){
	$("#smallLogoImage").attr('src','');
	var smallLogo = new Object(); 
	smallLogo.id=$("#merchantId").val();
	smallLogo.src = '';
	dataHandler("modify","smallLogo",smallLogo,successRefresh,null,null,null,true);
}
function saveShopAddress(){
	var shopAddress = new Object(); 
	shopAddress.id=$("#merchantId").val();
	shopAddress.address = $("#shopAddress").val();
	dataHandler("modify","shopAddress",shopAddress,successRefresh,null,null,null,true);
}
function joinAffiliateProgram(ifJoin){
	if(!$("#ifAccept").prop('checked')){
		showAlert('danger','Please accept the agreement first!','');
		return false;
	}
	var affiliateProgram = new Object();
	affiliateProgram.id=$("#merchantId").val();
	affiliateProgram.join = ifJoin;
	dataHandler("modify","affiliateProgram",affiliateProgram,successRefresh,null,null,null,true);
}