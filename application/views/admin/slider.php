<div class="slider" style="position: absolute;">
<h3 <?php echo isset($index) && $index?'class="current"':'';?>>
	<a href="/admin" id="menu_portal">
		<span class="ico ico-sy"></span>
		<?php echo lang('admin_sider_Dashboard');?>
	</a>
</h3>
<!--
<h3>
	<a href="" id="menu_promotionManage">
		<span class="ico ico-tggl"></span>
		推广管理
	</a>
</h3>
-->
<h3 <?php echo isset($data) && $data?'class="current"':'';?>>
	<a href="/admin/items" id="menu_manageApp">
		<span class="ico ico-jbgl"></span>
		<?php echo lang('admin_sider_Data');?>
	</a>
</h3>
<ul style="display: block;">
	<li><a href="/admin/websiteLayout" <?php echo isset($websiteLayout) && $websiteLayout?'class="current"':'';?>>Website Layout</a></li>
	<li><a href="/admin/items" <?php echo isset($items) && $items?'class="current"':'';?>><?php echo lang('admin_sider_Items');?></a></li>
	<li><a href="/admin/merchants" <?php echo isset($merchants) && $merchants?'class="current"':'';?>><?php echo lang('admin_sider_Merchants');?></a></li>
	<li><a href="/admin/users" <?php echo isset($users) && $users?'class="current"':'';?>><?php echo lang('admin_sider_Users');?></a></li>
	<li><a href="/admin/orders" <?php echo isset($orders) && $orders?'class="current"':'';?>><?php echo lang('admin_sider_Orders');?></a></li>
	<li><a href="/admin/shipCompany" <?php echo isset($shipCompany) && $shipCompany?'class="current"':'';?>><?php echo lang('admin_sider_ShipCompany');?></a></li>
	<li><a href="/admin/advertisements" <?php echo isset($advertisements) && $advertisements?'class="current"':'';?>><?php echo lang('admin_sider_Advertisements');?></a></li>
	<li><a href="/admin/comments" <?php echo isset($comments) && $comments?'class="current"':'';?>><?php echo lang('admin_sider_Comments');?></a></li>
	<li><a href="/admin/payment" <?php echo isset($payment) && $payment?'class="current"':'';?>><?php echo lang('admin_sider_Payment');?></a></li>
</ul>
<h3 <?php echo isset($reports) && $reports?'class="current"':'';?>>
	<a href="/admin/reportsTurnover" id="menu_portal">
		<span class="ico ico-shgl"></span>
		<?php echo lang('admin_sider_Tools');?>
	</a>
</h3>
<!--
<h3 <?php echo isset($content) && $content?'class="current"':'';?>>
	<a href="/admin/contentList" id="menu_portal">
		<span class="ico ico-tsxx"></span>
		内容管理
	</a>
</h3>
-->
<ul style="display: block;">
	<li><a href="/admin/reportsTurnover" <?php echo isset($reports) && $reports?'class="current"':'';?>><?php echo lang('admin_sider_Reports');?></a></li>
	<li><a href="/admin/account" <?php echo isset($account) && $account?'class="current"':'';?>><?php echo lang('admin_sider_Account');?></a></li>
	<li><a href="/admin/searchStatistics" <?php echo isset($searchStatistics) && $searchStatistics?'class="current"':'';?>><?php echo lang('admin_sider_SearchStatistics');?></a></li>
	<li><a href="/admin/sendMessage" <?php echo isset($sendMessage) && $sendMessage?'class="current"':'';?>><?php echo lang('admin_sider_SendMessage');?></a></li>
</ul>
<h3 <?php echo isset($setting) && $setting?'class="current"':'';?>>
	<a href="/admin/basicParameter">
		<span class="ico ico-yygl"></span>
		<?php echo lang('admin_sider_SystemSettings');?>
	</a>
</h3>
<ul style="display: block;">
	<li><a href="/admin/basicParameter" <?php echo isset($basicParameter) && $basicParameter?'class="current"':'';?>><?php echo lang('admin_sider_BasicParameter');?></a></li>
	<li><a href="/admin/database" <?php echo isset($database) && $database?'class="current"':'';?>><?php echo lang('admin_sider_Database');?></a></li>
	<li><a href="/admin/securityCenter" <?php echo isset($securityCenter) && $securityCenter?'class="current"':'';?>><?php echo lang('admin_sider_SecurityCenter');?></a></li>
<!--	<li><a href="/admin/template" <?php echo isset($template) && $template?'class="current"':'';?>><?php echo lang('admin_sider_Template');?></a></li>
	<li><a href="/admin/emergencyContacts" <?php echo isset($emergencyContacts) && $emergencyContacts?'class="current"':'';?>><?php echo lang('admin_sider_EmergencyContacts');?></a></li>-->
	<li><a href="/admin/websiteInfo" <?php echo isset($websiteInfo) && $websiteInfo?'class="current"':'';?>>websiteInfo</a></li>
</ul>
<!--
<h3 <?php echo isset($account) && $account?'class="current"':'';?>>
	<a href="/admin/account" id="menu_accountInfo">
		<span class="ico ico-zhxx"></span>
		账户信息
	</a>
</h3>
-->
</div>