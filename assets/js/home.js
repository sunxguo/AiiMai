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
function checkuserName(){
	var length = $("#username").val().length;
	if(length<3 || length>15){	//3-15个字符
//		alert("账号长度为3~15个字符！");
		showAlert('danger','Username',' must be 3 to 15 characters!');
		return false;
	}else{
		
		return true;
	}
}
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
function checkUserEmail(){
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
			showAlert('success','Congratulation!','Available!');
			checkResult=true;
		}
	  }
	});
	return checkResult; 
}
function sendEmail(){
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
function sendMerchantEmail(){
	$.ajax({
	  type : "post",
	  url : "/common/sendMerchantEmail",
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
	if(checkuserName() && checkPwd() && checkCfmPwd() && checkCode()){
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
				showAlert('danger','Register success! ','Please Login');
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
				showAlert('danger','Register success! ','Please fill in the details');
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
function addToCart(product_id,merchant_id,amount){
	$.post(
	"/common/addToCart",
	{
		'product_id':product_id,
		'merchant_id':merchant_id,
		'amount':amount
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
var isCheck=true;
function checkAllCart(){
	isCheck=!isCheck;
	$("input[name='cartItem']").attr("checked",isCheck);
	$("input[name='checkAllCartButton']").attr("checked",isCheck);
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