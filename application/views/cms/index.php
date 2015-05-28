<div class="" style="padding-left:30px;">
	<ul class="summary-card row-fluid clearfix">
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_todaysturnover');?></h2>
			<p class="summary-today-income">S$<?php echo $turnover[sizeof($turnover)-1];?></p>
		</li>
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_yesterdaysturnover');?></h2>
			<p class="summary-yesterday-income">S$<?php echo $turnover[sizeof($turnover)-1];?></p>
		</li>
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_totalturnover');?></h2>
			<p class="summary-total-income">S$<?php echo $totalTurnover;?></p>
		</li>
		<li class="span3 text-center">
			<h2>Products Sold</h2>
			<p class="summary-balance">0</p>
		</li>
	</ul>
	<div class="clearfix">
		<h2 class="pull-left list-caption list-income list-report" style="width: 250px;">
			<i class="icon-stats"><img src="/assets/images/cms/icon/icon-income.png"></i>
			<?php echo lang('cms_index_totalturnovertrend');?>
		</h2>
		<!--
		<div class="pull-right wrap-more-detail">
			<a class="more-detail dib" href="/data/summary"><?php echo lang('cms_index_moredetails');?></a>
		</div>
		-->
		<div class="clearfix pull-right wrap-query">
			<ul id="day" class="pull-right nav nav-tabs ymnav btn-group ym-btn-group align-middle">
				<li id="day7" class="text-center day-btn" onclick="getTurnover(7);"><a href="javascript:void();"><?php echo lang('cms_index_within7days');?></a></li>
				<li id="day30" class="text-center day-btn" onclick="getTurnover(30);"><a href="javascript:void();"><?php echo lang('cms_index_within30days');?></a></li>
				<li id="day60" class="text-center day-btn" onclick="getTurnover(60);"><a href="javascript:void();"><?php echo lang('cms_index_within60days');?></a></li>
			</ul>
		</div>
	</div>
	<div id='canvasDiv'></div>
	<table id="summary_table" class="app-list table ymtable table-striped">
        <caption class="clearfix">
            <h2 class="pull-left list-income" style="width: 250px;text-align: left;">
				<i class="icon-list-1"><img src="/assets/images/cms/icon/icon-list.png"></i>
				<?php echo lang('cms_index_turnoverlistindetail');?>
			</h2>
        </caption>
        <thead>
            <tr>
                <th><?php echo lang('cms_common_Date');?></th>
                <th><?php echo lang('cms_index_totalturnover');?></th>
                <th><?php echo lang('cms_index_numberofgoodssold');?></th>
            </tr>
        </thead>
        <tbody>
			<tr>
				<td>2015-04-07</td>
				<td>￥110.00</td>
				<td>88</td>
			</tr>
	</table>
	<table id="summary_table" class="app-list table ymtable table-striped">
        <caption class="clearfix">
            <h2 class="pull-left list-income" style="width: 250px;text-align: left;">
				<i class="icon-list-1"><img src="/assets/images/cms/icon/icon-list.png"></i>
				<?php echo lang('cms_common_ASM').'  '.lang('cms_index_notice');?>
			</h2>
        </caption>
        <thead>
            <tr>
                <th><?php echo lang('cms_common_Type');?></th>
                <th><?php echo lang('cms_common_Title');?></th>
                <th><?php echo lang('cms_common_Date');?></th>
            </tr>
        </thead>
        <tbody>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">Changes to policy of requesting DailyDeal Premium</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">Changes to policy of requesting DailyDeal Premium</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">Changes to policy of requesting DailyDeal Premium</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">Changes to policy of requesting DailyDeal Premium</a></td>
				<td>2015-04-07</td>
			</tr>
	</table>
	<div class="qsm-ad"><a href="" target="_blank"><img src="/assets/temp/cms-ad-english.jpg"></a></div>
</div>
<script src="/assets/js/ichart/ichart.1.2.min.js" type="text/javascript"></script>
<script>
$(function(){
	getTurnover(7);
});
function getTurnover(days){
	$("#day li").removeClass('active');
	$("#day"+days).addClass('active');
	var turnover = new Object();
	turnover.days = days;
	$.post(
		"/common/getInfo",
		{
			'info_type':'merchantTurnover',
			'data':JSON.stringify(turnover)
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				var data=result.message;
				var flow=[];
				var labels = [];
				for(var label in data){
					flow.push(data[label]);
					labels.push(label);
				}
				drawChart(flow,labels);
			}else{
				alert(result.message);
			}
		});
}
function drawChart(flow,labels){
/*		for(var i=0;i<7;i++){
			flow.push(0);
		}*/
		
		var data = [
					{
						name : 'S$',
						value:flow,
						color:'#ffb600',
						line_width:1
					}
				 ];
		 
		
		var line = new iChart.LineBasic2D({
			render : 'canvasDiv',
			data: data,
			align:'center',
			title : 'Total Turnover',
			subtitle:{
				text:'Unit: SGD',//利用副标题设置单位信息  单位:万件
				fontsize:14,
				color:'#000000',
				textAlign:'left',
				padding:'0 40',
				height:20
			},
			footnote : 'Source: Website database',
			width : 143*(labels.length),
			height : 600,
			sub_option:{
				smooth : true,//平滑曲线
				point_size:10
			},
			tip:{
				enable:true,
				shadow:true
			},
			legend : {
				enable : false
			},
			crosshair:{
				enable:true,
				line_color:'#ffb600'
			},
			coordinate:{
				width:114*(labels.length),
				valid_width:100*(labels.length),
				height:460,
				axis:{
					color:'#9f9f9f',
					width:[0,0,2,2]
				},
				grids:{
					vertical:{
						way:'share_alike',
						value:12
					}
				},
				scale:[{
					 position:'left',	
					 start_scale:0,
					 end_scale:100,
					 scale_space:10,
					 scale_size:2,
					 scale_color:'#9f9f9f'
				},{
					 position:'bottom',	
					 labels:labels
				}]
			}
		});
	//开始画图
	line.draw();
}
</script>