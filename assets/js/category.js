$(document).ready(function(){
	setInterval("rankList()",3000);
});
function rankList(){
	$("#dl_hot_trend").removeClass("rank-popup");
	$("#ol_hot_keyword li.js-1-5").toggle();
	$("#ol_hot_keyword li.js-6-10").toggle();
}
function showAllRankList(){
//	$("#dl_hot_trend").addClass("rank-popup");
//	$("#ol_hot_keyword li").show();
}