$(document).ready(function(){
});

function uploadProductImage(){
	uploadImage(addImageBeforeUpload,addImageAfterUpload);
}
function addImageBeforeUpload(){
	$("#productImg").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload(imageSrc){
	$("#productImg").attr("src",imageSrc);
}
//--begin >>
function uploadSecondaryImage1(formId){
	uploadImageAdvance(formId,addImageBeforeUpload1,addImageAfterUpload1);
}
function addImageBeforeUpload1(){
	$("#productImgS1").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload1(imageSrc){
	$("#productImgS1").attr("src",imageSrc);
}
//--end <<
//--begin >>
function uploadSecondaryImage2(formId){
	uploadImageAdvance(formId,addImageBeforeUpload2,addImageAfterUpload2);
}
function addImageBeforeUpload2(){
	$("#productImgS2").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload2(imageSrc){
	$("#productImgS2").attr("src",imageSrc);
}
//--end <<
//--begin >>
function uploadSecondaryImage3(formId){
	uploadImageAdvance(formId,addImageBeforeUpload3,addImageAfterUpload3);
}
function addImageBeforeUpload3(){
	$("#productImgS3").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload3(imageSrc){
	$("#productImgS3").attr("src",imageSrc);
}
//--end <<
//--begin >>
function uploadSecondaryImage4(formId){
	uploadImageAdvance(formId,addImageBeforeUpload4,addImageAfterUpload4);
}
function addImageBeforeUpload4(){
	$("#productImgS4").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload4(imageSrc){
	$("#productImgS4").attr("src",imageSrc);
}
//--end <<
function column(handleType,nameNullMsg,successMsg){
	if($("#name").val()==""){
		alert(nameNullMsg);
		return false;
	}
	if($("#name").val()=="") $("#name").val("50");
	var column = new Object(); 
	column.fid = $("#fatherlevel").val();
	column.name = $("#name").val();
	column.display = $('input[name="display"]:checked').val();
	column.type = $("#type").val();
	column.order_num = $('#orderNum').val();
	if(handleType=="modify") column.id = $("#column_id").val();
	dataHandler(handleType,"column",column,null,null,null,successMsg,true);
}
function delColumn(currentId,confirmMsg,successMsg){
	showWait();
	var column = new Object(); 
	column.id = currentId;
	dataHandler("del","column",column,null,confirmMsg,closeWait(),successMsg,true);
}
function selectEssay(baseUrl){
	var extUrl="";
	if($("#state").val()!=-1) extUrl+="&state="+$("#state").val();
	if($("#column").val()!=0) extUrl+="&column="+$("#column").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function uploadContentThumb(){
	uploadImage(addThumbBeforeUpload,addThumbAfterUpload);
}
function addThumbBeforeUpload(){
	$("#addImgList div img").attr("src","/assets/images/cms/loading.gif");
}
function addThumbAfterUpload(imageSrc){
	$("#addImgList div img").attr("src","/assets/images/cms/appbg_ad.png");
	var new_img_item='<li onmouseover="imgover(this)" onmouseout="imgout(this)" class="img-item imagelist"><img class="thumb-src" width="77" height="77" src="'+imageSrc+'"><img onclick="delclick(this)" class="del-bt" title="删除该缩略图" src="/assets/images/cms/delete.png"></li>';
	$("#addImgList").before(new_img_item);
	if($("#imgListDivs").children(".imagelist").length>=3){
		$("#addImgList").hide();
	}
}
function imgout(obj){
	$(obj).find('.del-bt').hide();
}
function imgover(obj){
	$(obj).find('.del-bt').show();
}
function delclick(obj){
	$(obj).parent('.imagelist').remove();
	$("#file").val("");
	$("#addImgList").show();
}
var productSuccessMsg='';
function productHandler(successMsg,isNew){
	productSuccessMsg=successMsg;
	if($("#MainCategory").val()==-1){
		showAlert('danger','',"Please select 1st category!");
		return false;
	}
	if($("#title_english").val()=="" && $("#title_zh_cn").val()=="" && $("#title_tw_cn").val()==""){
		showAlert('danger','',"Please enter a product name!");
		return false;
	}
	if($("#productImg").attr('src')==""){
		showAlert('danger','',"Please upload a Picture!");
		return false;
	}
	if($("#ProductionPlaceCode").val()==-1){
		showAlert('danger','',"Please select Production Place!");
		return false;
	}
	if($("#ProductionPlaceCode").val()==2 && $("#ProductionPlaceDetail").val()==''){
		showAlert('danger','',"Please enter the detail of Production Place!");
		return false;
	}
	if($("#SellPrice").val()=='' || isNaN($("#SellPrice").val())){
		showAlert('danger','',"Please enter the correct price!");
		return false;
	}
	if($("#Quantity").val()=='' || isNaN($("#Quantity").val())){
		showAlert('danger','',"Please enter the correct Quantity!");
		return false;
	}
/*	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}*/
	var product = new Object();
	product.MainCategory = $("#MainCategory").val();
	product.stSubCategory = $("#stSubCategory").val();
	product.ndSubCategory = $("#ndSubCategory").val();
	product.shopCategory = $("#shopMainCategory").val();
	product.shopSubCategory = $("#shopStSubCategory").val();
	product.SellFormat = $('input[name="salesMode"]:checked').val();
	product.DeliveryType = $('input[name="shipType"]:checked').val();
	product.ItemCondition = $('input[name="goodsStatus"]:checked').val();
//	product.ItemCondition = $('input[name="goodsStatus"]:checked').val();
	product.title_english = $("#title_english").val();
	product.title_zh_cn = $("#title_zh_cn").val();
	product.title_tw_cn = $("#title_tw_cn").val();
	product.ShortTitle = '';
	product.SellerCode = $("#SellerCode").val();
	product.productImg = $("#productImg").attr('src');
	product.productImgS1 = $("#productImgS1").attr('src');
	product.productImgS2 = $("#productImgS2").attr('src');
	product.productImgS3 = $("#productImgS3").attr('src');
	product.productImgS4 = $("#productImgS4").attr('src');
	product.ProductionPlaceCode = $("#ProductionPlaceCode").val();
	product.ProductionPlaceDetail = $("#ProductionPlaceDetail").val();
	product.AdultItem = $('input[name="adult"]:checked').val();
	product.SellPrice = $("#SellPrice").val();
	product.Quantity = $("#Quantity").val();
	product.AvailablePeriod = $("#AvailablePeriod").val();
	product.ReferencePrice = $("#ReferencePrice").val();
	product.shippingAddress = $("#shippingAddress").val();
	product.Displayleftavailableperiod = $("#Displayleftavailableperiod").val();
	product.description = goodsInfoEditor.html();
//	product.thumbnail = getThumb("#imgListDivs .imagelist");
	var optionTypes = [];
	$("#applyOptionData .optionName").each(function(index){
		optionTypes.push($(this).text());
	});
	product.optionTypes = optionTypes;
	var optionItems = [];
	$("#applyOptionData .resultDataItem").each(function(index){
		if($("#applyOptionData .optionName").length==1){
			var resultDataItem = {'op1':$(this).children().eq(1).text(),'price':$(this).find(".optionPrice").val(),'stock':$(this).find(".optionStock").val()}; 
			optionItems.push(resultDataItem);
		}
		if($("#applyOptionData .optionName").length==2){
			var resultDataItem = {'op1':$(this).children().eq(1).text(),'op2':$(this).children().eq(2).text(),'price':$(this).find(".optionPrice").val(),'stock':$(this).find(".optionStock").val()}; 
			optionItems.push(resultDataItem);
		}
		if($("#applyOptionData .optionName").length==3){
			var resultDataItem = {'op1':$(this).children().eq(1).text(),'op2':$(this).children().eq(2).text(),'op3':$(this).children().eq(3).text(),'price':$(this).find(".optionPrice").val(),'stock':$(this).find(".optionStock").val()}; 
			optionItems.push(resultDataItem);
		}
	});
	product.optionsData = optionItems;
	var handlerType='';
	if(isNew){
		handlerType='add';
		dataHandler(handlerType,'product',product,addRedirect,null,null,null,false);
	}else{
		product.id = $("#productId").val();
		handlerType='modify';
		dataHandler(handlerType,'product',product,modifyRedirect,null,null,null,false);
	}
}
function addRedirect(){
	alert(productSuccessMsg);
	location.href="/cms/goodsStatistics";
}
function modifyRedirect(){
	alert(productSuccessMsg);
	location.reload();
	window.opener.location.reload();
	window.close();
}
function orderProduct(tag,field){
	$("#directionIconUp").remove();
	$("#directionIconDown").remove();
	var iconUp='<span id="directionIconUp">↑</span>';
	var iconDown='<span id="directionIconDown">↓</span>';
	var direction=$("#direction").val();
	var newDirection='';
	if(direction=='DESC'){
		newDirection='ASC';
		$(tag).append(iconDown);
	}else{
		newDirection='DESC';
		$(tag).append(iconUp);
	}
	$("#orderField").val(field);
	$("#direction").val(newDirection);
	productQuery(false);
}
function productQuery(excel){
	var product = new Object();
	product.MainCategory = $("#MainCategory").val();
	product.stSubCategory = $("#stSubCategory").val();
	product.ndSubCategory = $("#ndSubCategory").val();
	product.shopMainCategory = $("#shopMainCategory").val();
	product.shopStSubCategory = $("#shopStSubCategory").val();
	product.status = $("#status").val();
	product.dateType = $("#dateType").val();
	product.beginDate = $("#beginDate").val();
	product.endDate = $("#endDate").val();
	product.SellFormat = $("#SellFormat").val();
	product.title = $("#title").val();
	product.groupbuy = $('input[name="groupbuy"]:checked').val();
	product.stock = $("#stock").val();
	product.orderField = $("#orderField").val();
	product.direction = $("#direction").val();
	if(excel) dataHandler('excel','product',product,goUrl,null,null,null,false);
	else dataHandler('get','product',product,loadProductsData,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function loadProductsData(data){
	$(".productItem").remove();
	var product='';
	for(var index in data){
        product='<tr class="productItem">'+
		'<td class="value br"><input type="checkbox" class="item" id="'+data[index].product_id+'"></td>'+
		'<td class="value br"><a href="javascript:window.open(\'/cms/modifyGoods?itemId='+data[index].product_id+'\',\'Edit Item\',\'height=700,width=900,toolbar=no,menubar=no\');">Edit</a></td>'+
		'<td class="value br">'+data[index].product_id+'</td>'+
		'<td class="value br">'+data[index].product_item_title_english+'</td>'+
		'<td class="value br">'+data[index].product_reference_price+'</td>'+
		'<td class="value br">'+data[index].product_sell_price+'</td>'+
		'<td class="value br">'+data[index].product_quantity+'</td>'+
		'<td class="value br">'+data[index].product_status+'</td>'+
		'<td class="value br">'+data[index].product_sell_format+'</td>'+
		'<td class="value br">'+data[index].product_delivery_type+'</td>'+
		'<td class="value br">'+data[index].product_category+'</td>'+
		'<td class="value br">'+data[index].product_sub_category+'</td>'+
		'<td class="value br">'+data[index].product_sub_sub_category+'</td>'+
		'<td class="value br">'+data[index].product_time+'</td></tr>';
		$("#productsData").append(product);
    }
}
function addOption(){
	if($("#optionWrapper .optionItem").size()<3){
		var newItem=' '+
			'  <tr class="optionItem"> '+
			'	<td class="value width15p tal br"> '+
			'		<select style="height: 20px;" name="OptionType" onchange="selectOptionType(this)"> '+
			'			<option value="T" selected="selected">Type</option> '+
			'			<option value="C">Color</option> '+
			'			<option value="S">Size</option> '+
			'			<option value="I">Direct Input</option> '+
			'		</select> '+
			'		<input name="OptionName" value="Type" type="text" class="km-form-control" style="width: 80%;height: 20px;padding: 0px 5px;display: inline-block;font-size:12px;font-weight:bold;margin-top:5px;">  '+
			'	</td> '+
			'	<td class="value tal"> '+
			'		<div class="optionValueWrapper"><input placeholder="select1,select2,select3" name="OptionVaule" type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;margin-top:5px;"></div>  '+
			'		<img onclick="removeOption(this)" src="/assets/images/cms/icon-minus.png" width="14px" style="cursor:pointer;margin-left:10px;border:2px solid #FF0000;border-radius:2px;float:right;"> '+
			'	</td> '+
			' </tr> ';
		$("#optionWrapper").append(newItem);
	}else{
		showAlert('danger','',"Up to three options!");
	}
}
function removeOption(tag){
	$(tag).parent().parent(".optionItem").remove();
}
function selectOptionType(tag){
	$(tag).next().val($(tag).find("option:selected").text());
	if($(tag).find("option:selected").val()=='C'){
		if(!checkOptionUnique()){
			$(tag).val('T');
			return false;
		}else{
			var colorOption=''+
			'	<ul class="selectColorBigWrapper clearfix"> '+
			'		<li title="Black" class="selectColorBig" onclick="selectColor(\'#000\',\'Black\');"><span style="background-color:#000;"></span></li> '+
			'		<li title="Gray" class="selectColorBig" onclick="selectColor(\'#b2b2b2\',\'Gray\');"><span style="background-color:#b2b2b2;"></span></li> '+
			'		<li title="White" class="selectColorBig" onclick="selectColor(\'#fff\',\'White\');"><span style="background-color:#fff;"></span></li> '+
			'		<li title="Beige" class="selectColorBig" onclick="selectColor(\'#f5ecc3\',\'Beige\');"><span style="background-color:#f5ecc3;"></span></li> '+
			'		<li title="Yellow" class="selectColorBig" onclick="selectColor(\'#ffec00\',\'Yellow\');"><span style="background-color:#ffec00;"></span></li> '+
			'		<li title="Mustard" class="selectColorBig" onclick="selectColor(\'#f2ba0c\',\'Mustard\');"><span style="background-color:#f2ba0c;"></span></li> '+
			'		<li title="Orange" class="selectColorBig" onclick="selectColor(\'#ff6a18\',\'Orange\');"><span style="background-color:#ff6a18;"></span></li> '+
			'		<li title="Red" class="selectColorBig" onclick="selectColor(\'#d30002\',\'Red\');"><span style="background-color:#d30002;"></span></li> '+
			'		<li title="Brown" class="selectColorBig" onclick="selectColor(\'#a76100\',\'Brown\');"><span style="background-color:#a76100;"></span></li> '+
			'		<li title="Khaki" class="selectColorBig" onclick="selectColor(\'#6d7400\',\'Khaki\');"><span style="background-color:#6d7400;"></span></li> '+
			'		<li title="Green" class="selectColorBig" onclick="selectColor(\'#21ba21\',\'Green\');"><span style="background-color:#21ba21;"></span></li> '+
			'		<li title="Mint" class="selectColorBig" onclick="selectColor(\'#13c8af\',\'Mint\');"><span style="background-color:#13c8af;"></span></li> '+
			'		<li title="Blue" class="selectColorBig" onclick="selectColor(\'#08b7e9\',\'Blue\');"><span style="background-color:#08b7e9;"></span></li> '+
			'		<li title="Navy" class="selectColorBig" onclick="selectColor(\'#014192\',\'Navy\');"><span style="background-color:#014192;"></span></li> '+
			'		<li title="Purple" class="selectColorBig" onclick="selectColor(\'#840092\',\'Purple\');"><span style="background-color:#840092;"></span></li> '+
			'		<li title="Pink" class="selectColorBig" onclick="selectColor(\'#f248ae\',\'Pink\');"><span style="background-color:#f248ae;"></span></li> '+
			'	</ul> '+
			'	<ul id="selectedColorWrapper"> '+
			'	</ul> '+
			'<input id="colorOptionValue" type="hidden">'+
			'<input id="colorOptionName" type="hidden">';
			$(tag).parent().parent(".optionItem").find(".optionValueWrapper").html(colorOption);
			return true;
		}
	}else{
		var textOption=''+
		'<input placeholder="select1,select2,select3" name="OptionVaule" type="text" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;margin-top:5px;">';
		$(tag).parent().parent(".optionItem").find(".optionValueWrapper").html(textOption);
		return true;
	}
}
function selectColor(colorValue,colorName){
	var colorOptionValue=$("#colorOptionValue").val();
	var colorValueArray = colorOptionValue.split(',');
	for(var index in colorValueArray){
		if(colorValueArray[index]==colorValue){
			showAlert('danger','This color'," has been already added!");
			return false;
		}
	}
	var newColorItem=''+
	'	<li title="Black" class="selectedColorBig"> '+
	'		<span class="selectedColorBigColor" style="background-color:'+colorValue+';"></span> '+
	'		<span class="selectedColorBigName">'+colorName+'</span> '+
	'		<span class="selectedColorBigClose" onclick="removeColor(this,\''+colorValue+'\',\''+colorName+'\')">X</span> '+
	'	</li>';
	$("#selectedColorWrapper").append(newColorItem);
	$("#colorOptionValue").val($("#colorOptionValue").val()==''?colorValue:$("#colorOptionValue").val()+','+colorValue);
	$("#colorOptionName").val($("#colorOptionName").val()==''?colorName:$("#colorOptionName").val()+','+colorName);
}
function removeColor(tag,colorValue,colorName){
	$(tag).parent().remove();
	var colorValueArray = $("#colorOptionValue").val().split(',');
	for(var index in colorValueArray){
		if(colorValueArray[index]==colorValue){
			colorValueArray.splice(index, 1);
		}
	}
	$("#colorOptionValue").val(colorValueArray.join(","));
	var colorOptionName = $("#colorOptionName").val().split(',');
	for(var index in colorOptionName){
		if(colorOptionName[index]==colorName){
			colorOptionName.splice(index, 1);
		}
	}
	$("#colorOptionName").val(colorOptionName.join(","));
}
function checkOptionUnique(){
	var unique=true;
	var count=0;
	$("#optionWrapper .optionItem").each(function(index){
//		alert($(this).find("select[name='OptionType']").val());
		if($(this).find("select[name='OptionType']").val()=='C'){
			count++;
		}
		if(count>1){
			showAlert('danger','Color type'," already exists!");
			unique=false;
		}
	});
	return unique;
}
function applyOption(){
	if($("#optionWrapper .optionItem").length<1){
		showAlert('danger','',"No Option Type!");
		return false;
	}
	$("#optionWrapper .optionItem").each(function(index){
		if($(this).find("input[name='OptionName']").val()==''){
			showAlert('danger','Option Name',"can not be empty!");
			return false;
		}
	});
	$(".optionName").remove();
	var optionItems = new Array();
	$("#optionWrapper .optionItem").each(function(index){
		$("#optionPricePos").before('<td class="field width6p br optionName">'+$(this).find("input[name='OptionName']").val()+'</td>');
		var data=$(this).find("select[name='OptionType']").val()=='C'?$(this).find("#colorOptionName").val():$(this).find("input[name='OptionVaule']").val();
		if(data==''){
			showAlert('danger','Option Vaule',"can not be empty!");
			return false;
		}
		var dataArray = data.split(',');
		optionItems[index] = dataArray;
	});
	var resultData='';
	var optionItemsLength=optionItems.length;
	for(var index in optionItems[0]){
		if(optionItemsLength==3){
			for(var ind in optionItems[1]){
				for(var i in optionItems[2]){
					resultData+='<tr class="resultDataItem">';//<td class="value br"><input type="checkbox"></td>
					resultData+='<td class="value br">'+optionItems[0][index]+'</td>';
					resultData+='<td class="value br">'+optionItems[1][ind]+'</td>';
					resultData+='<td class="value br">'+optionItems[2][i]+'</td>';
					resultData+='<td class="value br"><input type="text" class="inp-txt optionPrice"></td>';
					resultData+='<td class="value br"><input type="text" class="inp-txt optionStock"></td>';
				}
			}
		}else if(optionItemsLength==2){
			for(var ind in optionItems[1]){
				resultData+='<tr class="resultDataItem">';//<td class="value br"><input type="checkbox"></td>
				resultData+='<td class="value br">'+optionItems[0][index]+'</td>';
				resultData+='<td class="value br">'+optionItems[1][ind]+'</td>';
				resultData+='<td class="value br"><input type="text" class="inp-txt optionPrice"></td>';
				resultData+='<td class="value br"><input type="text" class="inp-txt optionStock"></td>';
			}
		}else{
			resultData+='<tr class="resultDataItem">';//<td class="value br"><input type="checkbox"></td>
			resultData+='<td class="value br">'+optionItems[0][index]+'</td>';
			resultData+='<td class="value br"><input type="text" class="inp-txt optionPrice"></td>';
			resultData+='<td class="value br"><input type="text" class="inp-txt optionStock"></td>';
		}
	}
	/*
	for(var index in optionItems){
		var optionItems2=optionItems[index];
		for(var i in optionItems2){
//			resultData.push(optionItems2[i]);
			resultData+='<td class="value br">'+optionItems2[i]+'</td>';
		}
	}
	resultData+='<td class="value br"><input type="text"></td>';*/
	resultData+=''+
	'<script>$(document).ready(function(){	$(".optionPrice,.optionStock").on("input",function(e){ '+
	'		if(!$.isNumeric($(this).val())){ '+
	'			showAlert("danger","Error!","Can only have numeric characters!"); '+
	'			$(this).val(""); '+
	'			return false; '+
	'		}else{ '+
	'			var amount=0; '+
	'			var quantity=0; '+
	'			$(".optionPrice").each(function(index){ '+
	'				amount+=Number($(this).val()); '+
	'			}); '+
	'			$(".optionStock").each(function(index){ '+
	'				quantity+=Number($(this).val()); '+
	'			}); '+
	'			$("#SellPrice").val(amount);	 '+
	'			$("#Quantity").val(quantity);	 '+
	'		} '+
	'	});})</script>';
	$(".resultDataItem").remove();
	$("#applyOptionData").append(resultData);
	$("#applyOptionWrapper").show();
}
function copyProduct () {
	// body...
	var items=[];
	$('.item').each(function(index){
		if($(this).prop('checked')==true){
			items.push($(this).attr('id'));
		}
	});
	var product = new Object();
	product.items = items;
	dataHandler('add','copyProduct',product,afterCopyProduct,null,null,null,false);
}
function afterCopyProduct () {
	// body...
	showAlert('success','Success!',"");
	productQuery(false);
}
function deleteBulkProducts () {
	var items=[];
	$('.item').each(function(index){
		if($(this).prop('checked')==true){
			items.push($(this).attr('id'));
		}
	});
	if(items.length<1){
		showAlert('danger','Please select product!',"");
	}else{
		var products=new Object();
		products.idArray=items;
		dataHandler('delBulk','items',products,afterDeleteBulkProduct,'Sure to delete these items?',null,null,false);
	}
}
function afterDeleteBulkProduct () {
	showAlert('success','Success!',"Refreshing...");
	productQuery(false);
}
function availablePeriodBulkProducts () {
	var items=[];
	$('.item').each(function(index){
		if($(this).prop('checked')==true){
			items.push($(this).attr('id'));
		}
	});
	if(items.length<1){
		showAlert('danger','Please select product!',"");
	}else{
		var products=new Object();
		products.idArray=items;
		products.availablePeriod=$("#bulkAvailablePeriod").val();
		dataHandler('updateBulk','items_available_period',products,afterDeleteBulkProduct,null,null,null,false);
	}
}
function expiringBulkProducts () {
	var items=[];
	$('.item').each(function(index){
		if($(this).prop('checked')==true){
			items.push($(this).attr('id'));
		}
	});
	if(items.length<1){
		showAlert('danger','Please select product!',"");
	}else{
		var products=new Object();
		products.idArray=items;
		products.displayleft=$("#bulkDisplayleftavailableperiod").val();
		dataHandler('updateBulk','items_displayleft',products,afterDeleteBulkProduct,null,null,null,false);
	}
}
function statusBulkProducts () {
	var items=[];
	$('.item').each(function(index){
		if($(this).prop('checked')==true){
			items.push($(this).attr('id'));
		}
	});
	if(items.length<1){
		showAlert('danger','Please select product!',"");
	}else{
		var products=new Object();
		products.idArray=items;
		products.status=$("#bulkStatus").val();
		dataHandler('updateBulk','items_status',products,afterDeleteBulkProduct,null,null,null,false);
	}
}
function resetFilters () {
	$("#MainCategory").val(-1);
	$("#stSubCategory").val(-1);
	$("#ndSubCategory").val(-1);
	$("#status").val(3);
	$("#shopMainCategory").val(-1);
	$("#shopStSubCategory").val(-1);
	$("#dateType").val(0);
	var oDate = new Date(); //实例一个时间对象
	$("#endDate").val(dateFormat ('YYYY-MM-DD',oDate));
	oDate.setDate(oDate.getDate()-30);
	$("#beginDate").val(dateFormat ('YYYY-MM-DD',oDate));
	$("#SellFormat").val(1);
	$("#title").val('');
	$("#stock").val(1);
	$("#groupBuyNo").prop('checked',true);
}
function dateFormat (formatStr,time){   
    var str = formatStr;   
    var Week = ['日','一','二','三','四','五','六'];  
  	
    str=str.replace(/yyyy|YYYY/,time.getFullYear());   
    str=str.replace(/yy|YY/,(time.getYear() % 100)>9?(time.getYear() % 100).toString():'0' + (time.getYear() % 100));   
  	var month=time.getMonth()+1;
    str=str.replace(/MM/,month>9?month.toString():'0' + month);   
    str=str.replace(/M/g,month);   
  
    str=str.replace(/w|W/g,Week[time.getDay()]);   
  
    str=str.replace(/dd|DD/,time.getDate()>9?time.getDate().toString():'0' + time.getDate());   
    str=str.replace(/d|D/g,time.getDate());   
  
    str=str.replace(/hh|HH/,time.getHours()>9?time.getHours().toString():'0' + time.getHours());   
    str=str.replace(/h|H/g,time.getHours());   
    str=str.replace(/mm/,time.getMinutes()>9?time.getMinutes().toString():'0' + time.getMinutes());   
    str=str.replace(/m/g,time.getMinutes());   
  
    str=str.replace(/ss|SS/,time.getSeconds()>9?time.getSeconds().toString():'0' + time.getSeconds());   
    str=str.replace(/s|S/g,time.getSeconds());   
  
    return str;   
}   