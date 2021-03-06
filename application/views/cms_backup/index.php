<div class="" style="padding-left:30px;">
	<ul class="summary-card row-fluid clearfix">
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_todaysturnover');?></h2>
			<p class="summary-today-income">S$0.000</p>
		</li>
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_yesterdaysturnover');?></h2>
			<p class="summary-yesterday-income">S$1.200</p>
		</li>
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_totalturnover');?></h2>
			<p class="summary-total-income">S$188.575</p>
		</li>
		<li class="span3 text-center">
			<h2><?php echo lang('cms_index_inventoryofemergency');?></h2>
			<p class="summary-balance">88</p>
		</li>
	</ul>
	<div class="clearfix">
		<h2 class="pull-left list-caption list-income list-report" style="width: 250px;">
			<i class="icon-stats"><img src="/assets/images/cms/icon/icon-income.png"></i>
			<?php echo lang('cms_index_totalturnovertrend');?>
		</h2>
		<div class="pull-right wrap-more-detail">
			<a class="more-detail dib" href="/data/summary"><?php echo lang('cms_index_moredetails');?></a>
		</div>
		<div class="clearfix pull-right wrap-query">
			<ul id="day" class="pull-right nav nav-tabs ymnav btn-group ym-btn-group align-middle">
				<li class="text-center day-btn active"><a id="day-7" href="#tab-wall-callback"><?php echo lang('cms_index_within7days');?></a></li>
				<li class="text-center day-btn "><a id="day-30" href="#tab-wall-callback"><?php echo lang('cms_index_within30days');?></a></li>
				<li class="text-center day-btn "><a id="day-60" href="#tab-wall-callback"><?php echo lang('cms_index_within60days');?></a></li>
			</ul>
		</div>
	</div>
	<div id="chartCanvas" class="chart"><script src="/assets/js/index.js"></script></div>
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
				<td><a href="" target="_blank">关于中国-广州Qxpress 集散中心采取施行等级制度的通知</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">关于中国-广州Qxpress 集散中心采取施行等级制度的通知</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">关于中国-广州Qxpress 集散中心采取施行等级制度的通知</a></td>
				<td>2015-04-07</td>
			</tr>
			<tr>
				<td><?php echo lang('cms_index_General');?></td>
				<td><a href="" target="_blank">关于中国-广州Qxpress 集散中心采取施行等级制度的通知</a></td>
				<td>2015-04-07</td>
			</tr>
	</table>
	<div class="qsm-ad"><a href="" target="_blank"><img src="/assets/temp/cms-ad.jpg"></a></div>
</div>