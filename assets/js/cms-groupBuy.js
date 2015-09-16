$(document).ready(function(){
	$("#groupBuyPrice").keyup(function(){
		if(!$.isNumeric($("#groupBuyPrice").val())){
			showAlert('danger','Error!',' Group Buy Price (S$) can only have numeric characters!');
			$("#groupBuyPrice").val('');
			$("#settlePrice").val('');
			return false;
		}else if(Number($("#groupBuyPrice").val())>Number($("#retailPrice").val())){
			showAlert('danger','Error!',' Group Buy Price (S$) can not be higher than Retail Price!');
			$("#groupBuyPrice").val('');
			$("#settlePrice").val('');
		}else{
			var groupBuyPrice=parseFloat($("#groupBuyPrice").val());
			var serviceRate=parseFloat(parseFloat(100-$("#serviceRate").val())/100);
			$("#settlePrice").val(groupBuyPrice*serviceRate);
		}
	});
	$("#minQty").keyup(function (argument) {
		if(!$.isNumeric($("#minQty").val())){
			showAlert('danger','Error!',' Aimed(Min) Qty can only have numeric characters!');
			$("#minQty").val('');
			return false;
		}else if(Number($("#minQty").val())>Number($("#stock").text())){
			showAlert('danger','Error!',' Aimed(Min) Qty can not be higher than stock!');
			$("#minQty").val('');
		}
	});

});
function groupBuyQuery(excel){
	var groupBuy = new Object();
	groupBuy.name = $("#keywords").val();
	groupBuy.merchantId = $("#merchantId").val();
	if(excel) dataHandler('excel','groupBuy',groupBuy,goUrl,null,null,null,false);
	else dataHandler('get','groupBuy',groupBuy,loadGroupBuyData,null,null,null,false);
}
function groupBuyQueryStatus (status) {
	var groupBuy = new Object();
	groupBuy.name = $("#keywords").val();
	groupBuy.merchantId = $("#merchantId").val();
	groupBuy.status = status;
	dataHandler('get','groupBuy',groupBuy,loadGroupBuyData,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function loadGroupBuyData(data){
	$(".groupBuyItem").remove();
	var groupBuy='';
	for(var index in data){
        groupBuy='<tr class="groupBuyItem"><td class="value br"><a href="javascript:window.open(\'/cms/modifyGroupBuy?groupBuyId='+data[index].groupbuy_id+'\',\'Edit\',\'height=500,width=900,toolbar=no,menubar=no\');">Edit</a></td>'+
		'<td class="value br">'+data[index].groupbuy_id+'</td>'+
		'<td class="value br">'+data[index].groupbuy_productId+'</td>'+
		'<td class="value br">'+data[index].groupbuy_productName+'</td>'+
		'<td class="value br">'+data[index].groupbuy_price+'</td>'+
		'<td class="value br">'+data[index].groupbuy_settlePrice+'</td>'+
		'<td class="value br">'+data[index].groupbuy_minQty+'</td>'+
		'<td class="value br">'+data[index].groupbuy_maxQty+'</td>'+
		'<td class="value br">'+data[index].groupbuy_orderedQty+'</td>'+
		'<td class="value br">'+data[index].groupbuy_startingTime+'</td>'+
		'<td class="value br">'+data[index].groupbuy_endTime+'</td>'+
		'<td class="value br">'+data[index].groupbuy_registeredTime+'</td></tr>';
		$("#groupBuyData").append(groupBuy);
    }
}
function productQuery(excel){
	var product = new Object();
	product.merchantId = $("#merchantId").val();
	if($("#MainCategory").val()!=-1) product.MainCategory = $("#MainCategory").val();
	if($("#stSubCategory").val()!=-1) product.stSubCategory = $("#stSubCategory").val();
	if($("#ndSubCategory").val()!=-1) product.ndSubCategory = $("#ndSubCategory").val();
	if($("#title").val()!='') product.title = $("#title").val();
	if(excel) dataHandler('excel','products',product,goUrl,null,null,null,false);
	else dataHandler('get','products',product,loadProductsData,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function loadProductsData(data){
	$(".productItem").remove();
	var product='';
	for(var index in data){
        product='<tr class="productItem"><td class="value br"><a href="javascript:selectProduct(\''+data[index].product_id+'\',\''+data[index].product_item_title_english+'\',\''+data[index].product_sell_price+'\',\''+data[index].product_reference_price+'\',\''+data[index].product_quantity+'\');">Select</a></td>'+
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
		'<td class="value br">'+data[index].product_time+'</td></tr>';
		$("#productsData").append(product);
    }
}
function selectProduct(id,title,price,retailPrice,stock){
	$("#productCode").val(id);
	$("#productTitle").val(title);
	$("#productPrice").val('S$ '+price);
	$("#retailPrice").val(retailPrice);
	$("#stock").text(stock);
	$(".km-close").click();
}
function groupBuyHandler(successMsg,isNew){
	if($("#productCode").val()==''){
		showAlert('danger','',"Please select product!");
		return false;
	}
	if($("#groupBuyPrice").val()=="" || isNaN($("#groupBuyPrice").val())){
		showAlert('danger','',"Please enter Group Buy Price!");
		return false;
	}
	if($("#retailPrice").val()=="" || isNaN($("#retailPrice").val())){
		showAlert('danger','',"Please enter Retail Price!");
		return false;
	}
	if($("#minQty").val()=='' || isNaN($("#minQty").val())){
		showAlert('danger','',"Please enter the correct Min Qty!");
		return false;
	}
/*	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}*/
	var groupBuy = new Object();
	groupBuy.merchantId = $("#merchantId").val();
	groupBuy.productCode = $("#productCode").val();
	groupBuy.productName = $("#productTitle").val();
	groupBuy.groupBuyPrice = $("#groupBuyPrice").val();
	groupBuy.retailPrice = $("#retailPrice").val();
	groupBuy.settlePrice = $("#settlePrice").val();
	groupBuy.minQty = $("#minQty").val();
	groupBuy.maxQty = $("#maxQty").val();
	groupBuy.canBuyNow = $('#canBuyNow').prop('checked');
	groupBuy.availableDateType=$("#availableDateType").val();
	groupBuy.autoAchieve=$("#autoAchieve").val();
	groupBuy.startingTime=$("#startingDate").val()+' '+$("#startingHour").val()+':'+$("#startingMinute").val()+':00';
	groupBuy.endTime=$("#endDate").val()+' '+$("#endHour").val()+':'+$("#endMinute").val()+':00';
	var handlerType='';
	if(isNew){
		handlerType='add';
		dataHandler(handlerType,'groupBuy',groupBuy,null,null,null,successMsg,true);
	}else{
		groupBuy.id = $("#groupBuy").val();
		handlerType='modify';
		dataHandler(handlerType,'groupBuy',groupBuy,modifyRedirect,null,null,successMsg,true);
	}
}
function modifyRedirect(){
	alert('Success!');
	location.reload();
	window.opener.location.reload();
	window.close();
}
function selectAutoAchieve(){
	if($("#autoAchieve").val()=='Y'){
		$('#txt_achieve_Y').show();
		$('#txt_achieve_N').hide();
		$('#txt_achieve_S').hide();
	}
	else if($("#autoAchieve").val()=='N'){
		$('#txt_achieve_Y').hide();
		$('#txt_achieve_N').show();
		$('#txt_achieve_S').hide();
	}
	else{
		$('#txt_achieve_Y').hide();
		$('#txt_achieve_N').hide();
		$('#txt_achieve_S').show();
	}
}
function GroupBuyPeriodChange (tag) {
	var day=$(tag).val();
	var oDate = new Date(); //实例一个时间对象
	$("#startingDate").val(dateFormat ('YYYY-MM-DD',oDate));
	oDate.setDate(oDate.getDate()+Number(day));
	$("#endDate").val(dateFormat ('YYYY-MM-DD',oDate));
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
function selectTime () {
	if(Number($("#endHour").val())-Number($("#startingHour").val())<2){
		showAlert('danger','',"A GroupBuy event must at least last for 2 hours.");
		$("#startingHour").val('00');
		$("#endHour").val('02');
	}
}