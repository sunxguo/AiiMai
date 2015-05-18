$(document).ready(function(){
	
});

function uploadProductImage(){
	uploadImage(addImageBeforeUpload,addImageAfterUpload);
}
function addImageBeforeUpload(){
	$("#productImg").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload(imageSrc){
/*	$("#productImg").attr("src","/assets/images/cms/appbg_ad.png");
	var new_img_item='<li onmouseover="imgover(this)" onmouseout="imgout(this)" class="img-item imagelist"><img class="thumb-src" width="77" height="77" src="'+imageSrc+'"><img onclick="delclick(this)" class="del-bt" title="删除该缩略图" src="/assets/images/cms/delete.png"></li>';
	$("#addImgList").before(new_img_item);
	if($("#imgListDivs").children(".imagelist").length>=3){
		$("#addImgList").hide();
	}*/
	$("#productImg").attr("src",imageSrc);
}
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
function productHandler(successMsg,isNew){
	if($("#MainCategory").val()==-1 || $("#stSubCategory").val()==-1 || $("#ndSubCategory").val()==-1){
		showAlert('danger','',"Please select category!");
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
	product.SellFormat = $('input[name="salesMode"]:checked').val();
	product.DeliveryType = $('input[name="shipType"]:checked').val();
	product.ItemCondition = $('input[name="goodsStatus"]:checked').val();
//	product.ItemCondition = $('input[name="goodsStatus"]:checked').val();
	product.title_english = $("#title_english").val();
	product.title_zh_cn = $("#title_zh_cn").val();
	product.title_tw_cn = $("#title_tw_cn").val();
	product.ShortTitle = $("#ShortTitle").val();
	product.SellerCode = $("#SellerCode").val();
	product.productImg = $("#productImg").attr('src');
	product.ProductionPlaceCode = $("#ProductionPlaceCode").val();
	product.ProductionPlaceDetail = $("#ProductionPlaceDetail").val();
	product.AdultItem = $('input[name="adult"]:checked').val();
	product.SellPrice = $("#SellPrice").val();
	product.Quantity = $("#Quantity").val();
	product.AvailablePeriod = $("#AvailablePeriod").val();
	product.ReferencePrice = $("#ReferencePrice").val();
	product.Displayleftavailableperiod = $("#Displayleftavailableperiod").val();
	product.description = goodsInfoEditor.html();
//	product.thumbnail = getThumb("#imgListDivs .imagelist");
	var handlerType='';
	if(isNew){
		handlerType='add';
	}else{
		product.id = $("#productId").val();
		handlerType='modify';
	}
	dataHandler(handlerType,'product',product,null,null,null,successMsg,true);
}
function productQuery(excel){
	var product = new Object();
	product.MainCategory = $("#MainCategory").val();
	product.stSubCategory = $("#stSubCategory").val();
	product.ndSubCategory = $("#ndSubCategory").val();
	product.status = $("#status").val();
	product.dateType = $("#dateType").val();
	product.beginDate = $("#beginDate").val();
	product.endDate = $("#endDate").val();
	product.SellFormat = $("#SellFormat").val();
	product.title = $("#title").val();
	if(excel) dataHandler('excel','product',product,goUrl,null,null,null,false);
	else dataHandler('get','product',product,loadProductsData,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function loadProductsData(data){
	var products='';
	for(var index in data){ 
        products+='<td class="value br"><a href="javascript:window.open(\'/cms/modifyGoods?itemId='+data[index].product_id+'\',\'Edit Item\',\'height=700,width=900,toolbar=no,menubar=no\');">Edit</a></td>'+
		'<td class="value br">'+data[index].product_id+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+data[index].product_item_title_english+'</td>'+
		'<td class="value br">'+data[index].product_reference_price+'</td>'+
		'<td class="value br">'+data[index].product_sell_price+'</td>'+
		'<td class="value br">'+data[index].product_quantity+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+data[index].product_status+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+data[index].product_sell_format+'</td>'+
		'<td class="value br">'+data[index].product_category+'</td>'+
		'<td class="value br">'+data[index].product_sub_category+'</td>'+
		'<td class="value br">'+data[index].product_sub_sub_category+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+''+'</td>'+
		'<td class="value br">'+data[index].product_time+'</td>';
    }
	$("#productsData").html(products);
}