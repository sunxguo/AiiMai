$(document).ready(function(){
	$("#groupBuyPrice").keyup(function(){
		var groupBuyPrice=parseFloat($("#groupBuyPrice").val());
		var serviceRate=parseFloat(parseFloat($("#serviceRate").val())/100);
		$("#settlePrice").val(groupBuyPrice*serviceRate);
	});
});
function groupBuyQuery(excel){
	var groupBuy = new Object();
	groupBuy.name = $("#keywords").val();
	groupBuy.merchantId = $("#merchantId").val();
	if(excel) dataHandler('excel','groupBuy',groupBuy,goUrl,null,null,null,false);
	else dataHandler('get','groupBuy',groupBuy,loadGroupBuyData,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function loadGroupBuyData(data){
	$(".groupBuyItem").remove();
	var groupBuy='';
	for(var index in data){
        groupBuy='<tr class="groupBuyItem"><td class="value br"><a href="javascript:window.open(\'/cms/modifyGroupBuy?groupBuyId='+data[index].groupbuy_id+'\',\'Edit\',\'height=700,width=900,toolbar=no,menubar=no\');">Edit</a></td>'+
		'<td class="value br">'+data[index].groupbuy_code+'</td>'+
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
        product='<tr class="productItem"><td class="value br"><a href="javascript:selectProduct(\''+data[index].product_id+'\',\''+data[index].product_item_title_english+'\',\''+data[index].product_sell_price+'\');">Select</a></td>'+
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
function selectProduct(id,title,price){
	$("#productCode").val('Product Code:'+id);
	$("#productTitle").val(title);
	$("#productPrice").val('S$ '+price);
	$(".km-close").click();
}