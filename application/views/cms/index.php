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
	<table id="summary_table" class="app-list table ymtable table-striped">
        <caption class="clearfix">
            <h2 class="pull-left list-income" style="width: 250px;text-align: left;">
				<i class="icon-list-1"><img src="/assets/images/cms/icon/icon-list.png"></i>
				Alerts
			</h2>
        </caption>
        <thead>
            <tr>
                <th>Requested Order Cancellation / Return / Refund</th>
                <th>Unanswered Inquiries</th>
                <th>Low Stock Products (> 3 pieces)</th>
                <th>Orders Pending Delivery Confirmation</th>
            </tr>
        </thead>
        <tbody>
			<tr>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
	</table>
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
	</div>
	<div class="clearfix wrap-query" style="margin:0 auto;width:700px;">
		<ul id="day" class="pull-right nav nav-tabs ymnav btn-group ym-btn-group align-middle">
			<li id="day7" class="text-center day-btn" onclick="getTurnover(7);"><a href="javascript:void();"><?php echo lang('cms_index_within7days');?></a></li>
			<li id="day30" class="text-center day-btn" onclick="getTurnover(30);"><a href="javascript:void();"><?php echo lang('cms_index_within30days');?></a></li>
			<li id="day60" class="text-center day-btn" onclick="getTurnover(60);"><a href="javascript:void();"><?php echo lang('cms_index_within60days');?></a></li>
		</ul>
	</div>
	<div id='canvasDiv' style="margin:0 auto;width:900px;"></div>
	<table id="summary_table" class="app-list table ymtable table-striped">
        <caption class="clearfix">
            <h2 class="pull-left list-income" style="width: 250px;text-align: left;">
				<i class="icon-list-1"><img src="/assets/images/cms/icon/icon-list.png"></i>
				Recent Transactions
			</h2>
        </caption>
        <thead>
            <tr>
				<th class="width17p">Order Number</th>
                <th style="width:22%;">Products</th>
                <th class="width17p">Buyer</th>
                <th class="width17p">Total</th>
                <th class="width10p">Status</th>
                <th class="width17p">Time</th>
            </tr>
        </thead>
        <tbody>
			<!--
			<tr>
				<td><a href="">T-shirt (1)</a></td>
				<td>Username</td>
				<td>S$110.00</td>
				<td>2015-04-07 11:20:09</td>
			</tr>
			-->
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
<div id="canvasDiv2" style="width:100%;height:100%;"></div>
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
			footnote : '',
			width : 900,
			height : 500,
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
				width:750,
				valid_width:700,
				height:360,
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
function getTurnover2(days){
	setDivCenter("#canvasDiv2",true);
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
				drawChart2(flow,labels);
			}else{
				alert(result.message);
			}
		});
}
function drawChart2(flow,labels){
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
			render : 'canvasDiv2',
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
			footnote : '',
			width : document.body.clientWidth,
			height : document.body.clientHeight,
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
				width:document.body.clientWidth-100,
				valid_width:document.body.clientWidth-200,
				height:document.body.clientHeight/2,
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