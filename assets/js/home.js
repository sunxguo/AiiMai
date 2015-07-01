$(document).ready(function(){
	$("#categoriesList").css("border-bottom-color",$("#categoriesList li:eq(1)").css("background-color"));
	$(".cat-detail:eq(0)").show();
	$("#categoriesList li").hover(function(){
		if($(this).index()==0) return false;
		$("#categoriesList li").removeClass("active");
		$("#categoriesList li a").removeClass("active");
		$(this).addClass("active");
		$(this).find("a").addClass("active");
		$("#categoriesList").css("border-bottom-color",$(this).css("background-color"));
		$(".cat-detail").hide();
		$(".cat-detail:eq("+($(this).index()-1)+")").show();
	});
	$("#topSale").html($("#topsale0").html());
	$("#topSaleCats li").hover(function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var destObj=$(this).parent().parent().next().next();
		destObj.html($("#topsale"+$(this).index()).html());
		destObj.css('margin-left',"0px");
	});
	$("#bestDiscounts").html($("#bestDiscounts0").html());
	$("#bestDiscountsCats li").hover(function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var destObj=$(this).parent().parent().next();
		destObj.html($("#bestDiscounts"+$(this).index()).html());
		destObj.css('margin-left',"0px");
	});
	$("#recommendedShops").html($("#recommendedShops0").html());
	$("#recommendedShopsCats li").hover(function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var destObj=$(this).parent().parent().next().next();
		destObj.html($("#recommendedShops"+$(this).index()).html());
		destObj.css('margin-left',"0px");
	});
	$(".line-slider").hover(function(){
		$(this).prev().show();
		$(this).next().show();
	},function(){
		$(this).prev().hide();
		$(this).next().hide();
	});
	$(".btn-prev").hover(function(){
		$(this).show();
		$(this).next().next().show();
	},function(){
		$(this).hide();
		$(this).next().next().hide();
	});
	$(".btn-next").hover(function(){
		$(this).show();
		$(this).prev().prev().show();
	},function(){
		$(this).hide();
		$(this).prev().prev().hide();
	});
	$(".btn-prev").click(function(){
		var amount=$(this).next().find("li").length;
		var group=Math.ceil(amount/5);
		var ml=parseInt($(this).next().css('margin-left'));
		var destMl=(ml==0)?(-976*(group-1)):(ml+976);
		$(this).next().animate({'margin-left':destMl+'px'});
	});
	$(".btn-next").click(function(){
		var amount=$(this).prev().find("li").length;
		var group=Math.ceil(amount/5);
		var ml=parseInt($(this).prev().css('margin-left'));
		var destMl=(ml==-976*(group-1))?0:(ml-976);
		$(this).prev().animate({'margin-left':destMl+'px'});
	});
});
function checkPwd(){
	var length = $("#password").val().length;
	if(length<6 || length>25){	//3-15个字符
//		alert("密码长度为6~25个字符！");
		showAlert('danger','Password',' must be 6 to 25 characters!');
		return false;
	}else{
		
		return true;
	}
}
function checkCfmPwd(){
	var pwd = $("#password").val();
	var confirmpwd = $("#repassword").val();
	if(pwd!=confirmpwd){	//3-15个字符
//		alert("两次密码不一致！");
		showAlert('danger','The two passwords',' you entered are different!');
		return false;
	}else{
		
		return true;
	}
}
function checkCode(){
	var checkResult=false;
	if($("#validCode").val().length==4){
//		dataHandler(funcType,dataType,postDataObj,callBack,confirmMsg,cancelCallBack,successMsg,refresh)
		$.ajax({
		  type : "post",
		  url : "/common/checkCode",
		  data : 'code='+$("#validCode").val(),
		  async : false,
		  success : function(data){
			var result=$.parseJSON(data);
			if(result.result=="failed"){
				showAlert('danger','','Please enter the letters in the picture exactly!');
				checkResult=false;
			}else{
				checkResult=true;
			}
		  }
		});
	}else{
		showAlert('danger','','Please enter the letters in the picture exactly!');
	}
	return checkResult;
}
function checkUserEmail(ifShowAlert){
	if ($("#email").val() == "") {
		showAlert('danger','E-mail',' can not be empty!');
		$("#email").focus(); 
		return false; 
	}
	if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) { 
		showAlert('danger','E-mail format ','is incorrect!');
		$("#email").focus();
		return false; 
	}
	var checkResult=false;
	$.ajax({
	  type : "post",
	  url : "/common/checkEmail",
	  data : 'email='+$("#email").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="notunique"){
			showAlert('danger','[Error]','With this email, an account is already created!');
			checkResult=false;
		}else{
			if(ifShowAlert) showAlert('success','Congratulation!','Available!');
			checkResult=true;
		}
	  }
	});
	return checkResult; 
}
/*
function checkuserName(){
	var length = $("#username").val().length;
	if(length<3 || length>15){	//3-15个字符
//		alert("账号长度为3~15个字符！");
		showAlert('danger','Username',' must be 3 to 15 characters!');
		return false;
	}else{
		
		return true;
	}
}*/
function checkuserName(ifShowAlert){
	var length = $("#username").val().length;
	if(length<3 || length>15){	//3-15个字符
//		alert("账号长度为3~15个字符！");
		showAlert('danger','Username',' must be 3 to 15 characters!');
		return false;
	}
	var checkResult=false;
	$.ajax({
	  type : "post",
	  url : "/common/checkUsername",
	  data : 'username='+$("#username").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="notunique"){
			showAlert('danger','[Error]',result.message);
			checkResult=false;
		}else{
			if(ifShowAlert) showAlert('success','Congratulation!','Available!');
			checkResult=true;
		}
	  }
	});
	return checkResult; 
}
/*
function checkMerchantEmail(){
	if ($("#email").val() == "") {
		showAlert('danger','E-mail',' can not be empty!');
		$("#email").focus(); 
		return false; 
	}
	if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) { 
		showAlert('danger','E-mail format ','is incorrect!');
		$("#email").focus();
		return false; 
	}
	var checkResult=false;
	$.ajax({
	  type : "post",
	  url : "/common/checkMerchantEmail",
	  data : 'email='+$("#email").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="notunique"){
			showAlert('danger','[Error]','With this email, an account is already created!');
			checkResult=false;
		}else{
			showAlert('success','Congratulation!','Available!');
			checkResult=true;
		}
	  }
	});
	return checkResult; 
}*/
function sendEmail(){
	$.ajax({
	  type : "post",
	  url : "/common/sendEmail",
	  data : 'email='+$("#email").text(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showAlert('success','Email ','sent successfully!');
		}else{
			showAlert('danger','Failed!',result.message);
		}
	  }
	});
}
function sendMerchantEmail(){
	$.ajax({
	  type : "post",
	  url : "/common/sendEmail",
	  data : 'email=ok',
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showAlert('success','Email ','sent successfully!');
		}else{
			showAlert('danger','Failed!','Please send e-mail again!');
		}
	  }
	});
}
function checkAll(){
	if(checkuserName() && checkPwd() && checkCfmPwd() && checkCode() && checkUserEmail(false)){
		validation();
		return true;
	}else{
		invalidation();
		return false;
	}
}
function invalidation(){
	$('#btnRegister').attr("style","cursor:default;background:#687685")
}
function validation(){
	$("#btnRegister").attr("style","");
}
function register(){
	if(checkAll()){
//		dataHandler('add','user',postDataObj,callBack,confirmMsg,cancelCallBack,successMsg,refresh);
		var user = new Object();
		user.email = $("#email").val();
		user.username = $("#username").val();
		user.gender = $('input[name="gender"]:checked').val();
		user.password = $("#password").val();
//		user.repassword = $('#repassword').val();
		user.country = $('#country').val();
		
//		dataHandler('add',"user",user,null,null,null,successMsg,true);
		$.post("/common/addInfo",
		{
			'info_type':'register',
			'data':JSON.stringify(user)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				showAlert('success','Register success! ','Please Login');
				location.href="/home/confirmEmail";
			}else if(result.result=="notunique"){
				showAlert('danger','Not unique',result.message);
			}else{
				showAlert('danger','Sorry,',' registration failed! Please try again later!');
			}
		});
	}
}
function sellerRegister(){
	if(checkAll()){
//		dataHandler('add','user',postDataObj,callBack,confirmMsg,cancelCallBack,successMsg,refresh);
		var merchant = new Object();
		merchant.email = $("#email").val();
		merchant.username = $("#username").val();
		merchant.gender = $('input[name="gender"]:checked').val();
		merchant.password = $("#password").val();
//		user.repassword = $('#repassword').val();
		merchant.country = $('#country').val();
		
//		dataHandler('add',"user",user,null,null,null,successMsg,true);
		$.post("/common/addInfo",
		{
			'info_type':'merchant',
			'data':JSON.stringify(merchant)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				showAlert('success','Register success! ','Please fill in the details');
				//Please fill in the details
				location.href="/cms/registerInformation";
			}else if(result.result=="notunique"){
				showAlert('danger','Not unique',result.message);
			}else{
				showAlert('danger','Sorry,',' registration failed! Please try again later!');
			}
		});
	}
}
function checkName(){
	var length = $("#name").val().length;
	if(length<1){	
		showAlert('danger','Name ','cannot be empty!');
		return false;
	}else{
		
		return true;
	}
}
function checkContactInfo(){
	var lengthPhone1 = $("#phone1").val().length;
	var lengthPhone3 = $("#phone3").val().length;
	var lengthHomePhone1 = $("#homephone1").val().length;
	var lengthHomePhone3 = $("#homephone3").val().length;
	if(lengthPhone1<1 || lengthPhone3<1 || lengthHomePhone1<1 || lengthHomePhone3<1){
		showAlert('danger','Phone Or Home ','cannot be empty!');
		return false;
	}
	if(lengthPhone3<8){
		showAlert('danger','Mobile Phone',' is too short!');
		return false;
	}
	/*
	if(lengthHomePhone2+lengthHomePhone3<8){
		showAlert('danger','Phone',' is too short!');
		return false;
	}*/
	return true;
}
function checkAddress(){
	var length = $("#address2").val().length;
	if(length<1){
		showAlert('danger','Address ','cannot be empty!');
		return false;
	}else{
		
		return true;
	}
}
function checkSalesStaffName(){
	var length = $("#salesStaff").val().length;
	if(length<1){
		showAlert('danger','Sales Staff Name ','cannot be empty!');
		return false;
	}else{
		
		return true;
	}
}
function checkFile(){
	var length = $('#fileSrc').val().length;
	if(length<1){
		showAlert('danger','You must upload a document with datails!','');
		return false;
	}else{
		
		return true;
	}
}
function checkBusinessLicense(){
	if($("#businessLicenseImage").attr('src')==''){
		showAlert('danger','You must upload the copy of business license!','');
		return false;
	}else{
		
		return true;
	}
}
function checkBankAccount(){
	if($("#bankAccountImage").attr('src')==''){
		showAlert('danger','You must upload the copy of bank account!','');
		return false;
	}else{
		
		return true;
	}
}
function checkAllInfo(){
	if(checkName() && checkContactInfo() && checkAddress() && checkSalesStaffName() && checkBusinessLicense() && checkBankAccount()){
		validation();
		return true;
	}else{
		invalidation();
		return false;
	}
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
	$("#businessLicenseImage").attr('src',imageSrc);
}
function uploadBankAccount(){
	uploadImageAdvance("#upload_BankAccount_form",addBankAccountBeforeUpload,addBankAccountAfterUpload)
}
function addBankAccountBeforeUpload(){
	$("#loadingBankAccount").show();
}
function addBankAccountAfterUpload(imageSrc){
	//update database
	$("#loadingBankAccount").hide();
	$("#bankAccountImage").attr('src',imageSrc);
}
function sellerInformation(){
	if(checkAllInfo()){
		var merchantInfo = new Object();
		var merchantType=$('input[name="merchantType"]:checked').val();
		merchantInfo.merchantType = merchantType;
		merchantInfo.name = $("#name").val();
		merchantInfo.ID = $("#ID").val();
		merchantInfo.phone1 = $("#phone1").val();
		merchantInfo.phone2 = $("#phone2").val();
		merchantInfo.phone3 = $('#phone3').val();
		merchantInfo.homephone1 = $('#homephone1').val();
		merchantInfo.homephone2 = $('#homephone2').val();
		merchantInfo.homephone3 = $('#homephone3').val();
		merchantInfo.address1 = $('#address1').val();
		merchantInfo.address2 = $('#address2').val();
		merchantInfo.salesStaff = $('#salesStaff').val();
		merchantInfo.salesStaffEmail = $('#salesStaffEmail').val();
		merchantInfo.salesStaffPhone1 = $('#salesStaffPhone1').val();
		merchantInfo.salesStaffPhone2 = $('#salesStaffPhone2').val();
		merchantInfo.salesStaffPhone3 = $('#salesStaffPhone3').val();
		merchantInfo.salesStaffMobilePhone1 = $('#salesStaffMobilePhone1').val();
		merchantInfo.salesStaffMobilePhone2 = $('#salesStaffMobilePhone2').val();
		merchantInfo.salesStaffMobilePhone3 = $('#salesStaffMobilePhone3').val();
		merchantInfo.doc = $('#fileSrc').val();
		merchantInfo.businessLicense = $("#businessLicenseImage").attr('src');
		merchantInfo.bankAccount = $("#bankAccountImage").attr('src');
		
		$.post("/common/modifyInfo",
		{
			'info_type':'merchantInfo',
			'data':JSON.stringify(merchantInfo)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				showAlert('success','Success!','Please wait for confirmation!');
				//Please fill in the details
				location.href="/cms/waitConfirm";
			}else if(result.result=="notunique"){
				showAlert('danger','Not unique',result.message);
			}else{
				showAlert('danger','Sorry,',' Failed! Please try again later!');
			}
		});
	}
}
function reloadEmail(){
	$.ajax({
	  type : "post",
	  url : "/common/reloadEmail",
	  data : 'email=ok',
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showAlert('success','Successfully ','Confirmed E-mail!');
			$("#gsm_mail_wrapper").hide();
			$("#confirmEmail").show();
		}else{
			showAlert('danger','Failed! Please confirm on the email, and reload again!','');
		}
	  }
	});
}
function refreshCode(){
	$("#validCodeImg").attr("src","/common/createVeriCode");
}
function plusOrderCnt(){
	$("#order_cnt").val(parseInt($("#order_cnt").val(),10)+1);
}
function minusOrderCnt(){
	if(parseInt($("#order_cnt").val(),10)>1)
	$("#order_cnt").val(parseInt($("#order_cnt").val(),10)-1);
}
function addToCart(product_id,merchant_id){
	var op1=$("#op1").length>0?$("#op1").val():'';
	var op2=$("#op2").length>0?$("#op2").val():'';
	var op3=$("#op3").length>0?$("#op3").val():'';
	$.post(
	"/common/addToCart",
	{
		'product_id':product_id,
		'merchant_id':merchant_id,
		'amount':$("#order_cnt").val(),
		'op1':op1,
		'op2':op2,
		'op3':op3
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert('Success Add to cart!');
		}else{
			alert(result.message);
		}
	});
}
function removeFromCart(){
	var productIdArray=getCheckValue();
	if(productIdArray.length==0){
		alert('You have not selected any content!');
		return false;
	}
	$.post(
	"/common/removeFromCart",
	{
		'productIdArray':JSON.stringify(productIdArray)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert('Success remove from cart!');
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function getCheckValue(){
	var productIdArray =[]; 
	$('input[name="cartItem"]:checked').each(function(){ 
		productIdArray.push($(this).val()); 
	});
	return productIdArray;
}
function checkAllCart(tag){
	var isCheck=$(tag).prop('checked');
	$("input[name='cartItem']").prop("checked",isCheck);
	$("input[name='checkAllCartButton']").prop("checked",isCheck);
	$.post(
	"/common/checkAllCartProduct",
	{
		'isCheck':isCheck
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function checkItem(tag,itemId){
	$.post(
	"/common/checkCartProduct",
	{
		'productId':itemId,
		'isCheck':$(tag).prop('checked')
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function checkID(){
	if ($("#ID").val() == "") {
		showAlert('danger','ID Login',' can not be empty!');
		$("#ID").focus(); 
		return false; 
	}
	var checkResult=false;
	$.ajax({
	  type : "post",
	  url : "/common/checkID",
	  data : 'ID='+$("#ID").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="notunique"){
			showAlert('danger','['+$("#ID").val()+']','already exists!');
			checkResult=false;
		}else{
			showAlert('success','Congratulation!','Available!');
			checkResult=true;
		}
	  }
	});
	return checkResult; 
}
function findPasswordConfirm(){
	if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) { 
		showAlert('danger','E-mail format ','is incorrect!');
		$("#email").focus();
		return false; 
	}
	if(!checkCode()) return false;
	$.ajax({
	  type : "post",
	  url : "/common/checkEmailExist",
	  data : 'email='+$("#email").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="notunique"){
			location.href="/home/confirmOwner?email="+$("#email").val();
		}else{
			showAlert('danger','Email',' does not exist!');
		}
	  }
	});
}
function sendConfirmEmail(){
	$.ajax({
	  type : "post",
	  url : "/common/sendConfirmEmail",
	  data : 'userEmail='+$("#email").text(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showAlert('success','Email ','sent successfully!');
		}else{
			showAlert('danger','Failed!','Please send e-mail again!');
		}
	  }
	});
}
function saveNewPassword(){
	var newpwd=$("#newpwd").val();
	var renewpwd=$("#renewpwd").val();
	if(newpwd==""||renewpwd==""){
		showAlert('danger','Failed!','Password can not be empty！');
		return false;
	}
	if(newpwd.length<6 || newpwd.length>25){	//3-15个字符
//		alert("密码长度为6~25个字符！");
		showAlert('danger','Password',' must be 6 to 25 characters!');
		return false;
	}
	if(newpwd!=renewpwd){
		showAlert('danger','Failed!','The two new password are different!');
		return false;
	}
	var userNewPwd = new Object();
	userNewPwd.newpwd = newpwd;
	userNewPwd.verify = $("#verify").val();
//	dataHandler("modify","userNewPwd",userNewPwd,newPwdSuccess,null,closeWait(),'Success!',true);	
	
	$.post(
	"/common/modifyInfo",
	{
		'info_type':'userNewPwd',
		'data':JSON.stringify(userNewPwd)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert('Success!');
			location.href="/home/login";
		}else{
			alert(result.message);
		}
	});
}
function follow(merchantId){
	var follow = new Object();
	follow.merchantId = merchantId;
	$("#a_follow").hide();
	$("#a_following").show();
	$.post(
	"/common/addInfo",
	{
		'info_type':'follow',
		'data':JSON.stringify(follow)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert('Success!');
			location.reload();
		}else{
			$("#a_follow").show();
			$("#a_following").hide();
			alert(result.message);
		}
	});
}
function report(){
	showAlert('danger','The two passwords',' you entered are different!');
}
function uploadFile(){
	uploadImage(addFileBeforeUpload,addFileAfterUpload);
}
function addFileBeforeUpload(){
	$("#loading").show();
}
function addFileAfterUpload(src){
	$("#loading").hide();
	$("#fileSrc").val(src);
}

function savePersonalInfoPwd(successMsg){
	if($("#personalInfoOldpwd").val()==""){
		alert('Old password can not be empty!');
		return false;
	}
	if($("#personalInfoNewpwd").val()==""){
		alert('New password can not be empty!');
		return false;
	}
	var length = $("#personalInfoNewpwd").val().length;
	if(length<6 || length>25){	//3-15个字符
//		alert("密码长度为6~25个字符！");
		alert('Password must be 6 to 25 characters!');
		return false;
	}
	if($("#personalInfoNewpwd").val()!=$("#personalInfoConfirmpwd").val()){
		alert('The two passwords you entered are different!');
		return false;
	}
	var pwd = new Object();
	pwd.oldpwd = $("#personalInfoOldpwd").val();
	pwd.newpwd = $("#personalInfoNewpwd").val();
	dataHandler("modify","merchantpwd",pwd,null,null,null,successMsg,true);
}
function successRefresh(){
	showAlert('success','Success!','Refreshing...');
}
function modifyPersonalGender(gender){
	var personalGender = new Object();
	personalGender.gender = gender;
	dataHandler("modify","personalGender",personalGender,successRefresh,null,null,null,true);
}
function savePersonalInfoContactsPhone(){
	var personalContactsPhone = new Object();
	personalContactsPhone.contactsMobilephone1 = $("#contactsMobilephone1").val();
	personalContactsPhone.contactsMobilephone2 = $("#contactsMobilephone2").val();
	personalContactsPhone.contactsMobilephone3 = $("#contactsMobilephone3").val();
	personalContactsPhone.contactsPhone1 = $("#contactsPhone1").val();
	personalContactsPhone.contactsPhone2 = $("#contactsPhone2").val();
	personalContactsPhone.contactsPhone3 = $("#contactsPhone3").val();
	dataHandler("modify","personalContactsPhone",personalContactsPhone,successRefresh,null,null,null,true);
}
function savePersonalInfoBirthday(){
	var personalBirthday = new Object();
	personalBirthday.birthday = $("#birthday").val();
	dataHandler("modify","personalBirthday",personalBirthday,successRefresh,null,null,null,true);
}
function selectAddress(){
	var address = new Object();
	address.userId = $("#userId").val();
	address.type = $("#addressType").val();
	if($("#addressType").val()=='0'){
		 $("#addressTitle").val('');
		 $("#addressStaffName").val('');
		 $("#addressCountry").val('');
		 $("#addressArea").val('');
		 $("#addressDetail").val('');
		 $("#addressMobilephone1").val('');
		 $("#addressMobilephone2").val('');
		 $("#addressMobilephone3").val('');
		 $("#addressPhone1").val('');
		 $("#addressPhone2").val('');
		 $("#addressPhone3").val('');
		 return false;
	}
	if($("#addressType").val()=='6'){
		address.id = $("#addressType").find("option:selected").attr('addressId');
	}
	dataHandler("get","address",address,getAddressHandler,null,null,null,false);
}
function getAddressHandler(data){
	 $("#addressTitle").val(data.address_title);
	 $("#addressStaffName").val(data.address_staffname);
	 $("#addressCountry").val(data.address_country);
	 $("#addressArea").val(data.address_area);
	 $("#addressDetail").val(data.address_detail);
	 $("#addressMobilephone1").val(data.address_mobilephone1);
	 $("#addressMobilephone2").val(data.address_mobilephone2);
	 $("#addressMobilephone3").val(data.address_mobilephone3);
	 $("#addressPhone1").val(data.address_phone1);
	 $("#addressPhone2").val(data.address_phone2);
	 $("#addressPhone3").val(data.address_phone3);
}
function saveAddress(){
	var address = new Object();
	address.userId = $("#userId").val();
	address.type = $("#addressType").val();
	address.title = $("#addressTitle").val();
	address.staffname = $("#addressStaffName").val();
	address.country = $("#addressCountry").val();
	address.area = $("#addressArea").val();
	address.detail = $("#addressDetail").val();
	address.mobilephone1 = $("#addressMobilephone1").val();
	address.mobilephone2 = $("#addressMobilephone2").val();
	address.mobilephone3 = $("#addressMobilephone3").val();
	address.phone1 = $("#addressPhone1").val();
	address.phone2 = $("#addressPhone2").val();
	address.phone3 = $("#addressPhone3").val();
	if($("#addressType").val()=='6')
		dataHandler("add","address",address,successRefresh,null,null,null,true);
	else
		dataHandler("modify","address",address,successRefresh,null,null,null,true);
}
function savePersonalInfoMobilePhone(){
	var mobilePhone = new Object();
	mobilePhone.id = $("#userId").val();
	mobilePhone.nation = $("#personalInfoMobilePhoneNation").val();
	mobilePhone.mobile = $("#personalInfoMobilePhoneNumber").val();
	dataHandler("modify","mobilePhone",mobilePhone,successRefresh,null,null,null,true);
}
function reportAbuse(productId){
	var report = new Object();
	report.productId = productId;
	report.reason = $("#reportReason").val();
	report.details = $("#reportDetails").val();
	dataHandler("add","report",report,successRefresh,null,null,null,true);
}
function sendSMS(successMsg){
	if($("#personalInfoMobilePhoneNumber").val().length<8){
		alert('Mobile Phone can`t be empty!');
		return false;
	}
	var mobilePhone = new Object();
	mobilePhone.mobile = $("#personalInfoMobilePhoneNation").val()+$("#personalInfoMobilePhoneNumber").val();
	$.post(
	"/common/sendSMSForChangeMobile",
	{
		'data':JSON.stringify(mobilePhone)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert(successMsg);
		}else{
			alert(result.message);
		}
	});
}