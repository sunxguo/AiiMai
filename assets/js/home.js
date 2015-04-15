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

function refreshCode(){
	$("#validCodeImg").attr("src","/common/createVeriCode");
}