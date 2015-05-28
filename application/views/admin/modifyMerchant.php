<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Merchant Modification</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/cms-common.js" type="text/javascript"></script>
	<script src="/assets/js/cms.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_sider_SellerInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p"><?php echo lang('cms_sider_UserID');?></td>
					<td class="value width17p"><?php echo $merchant->merchant_login_ID;?></td>
					<td class="field width15p"><?php echo lang('cms_sider_Seller');?></td>
					<td class="value width17p"><?php echo $merchant->merchant_username;?></td>
					<td class="field width15p"><?php echo lang('cms_sider_RegisterDate');?></td>
					<td class="value "><?php echo $merchant->merchant_reg_time;?></td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Sellertype');?></td>
					<td class="value"><?php echo $merchant->merchant_type=='1'?lang('cms_sider_Person'):'Company';?></td>
					<td class="field"><?php echo lang('cms_sider_Sellerlevel');?></td>
					<td class="value"><?php echo $merchant->merchant_grade;?><?php //echo lang('cms_sider_StandardSeller');?></td>
					<td class="field"><?php echo lang('cms_sider_Password');?></td>
					<td class="value" style="padding: 2px 0;">
					<!--
						<button onclick="modifySellerBaseInfoPwd();" type="button" class="km-btn km-btn-primary" style="height: 30px;font-size: 12px;"><?php echo lang('cms_sider_Editpassword');?></button>
					-->	<div class="km-modal-dialog width40p" id="sellerBaseInfoPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_sider_SellerInformation').'-'.lang('cms_sider_EditPassword');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label"><?php echo lang('cms_sider_CurrentPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label"><?php echo lang('cms_sider_NewPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label"><?php echo lang('cms_sider_ReenterNewPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
									<button type="button" class="km-btn km-btn-primary" onclick="saveSellerBaseInfoPwd('Successfully saved!');"><?php echo lang('cms_sider_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_sider_SettleInformation').' (* '.lang('cms_sider_SettleInformationTip').'<a href="mailto:seller_regist@aiimai.com" style="color:white;">[seller_regist@aiimai.com]</a>)';?> </div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p"><?php echo lang('cms_sider_Settledate');?></td>
					<td class="value width17p"><?php echo lang('cms_sider_SettledateMsg15');?></td>
					<td class="field width15p"><?php echo lang('cms_sider_SettlementCurrency');?></td>
					<td class="value width17p">SGD</td>
					<td class="field width15p"><?php echo lang('cms_sider_Tax');?></td>
					<td class="value "><!--税--></td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Bank');?></td>
					<td class="value" colspan="3">DBS Bank Ltd / POSB   <?php echo lang('cms_sider_BranchInfo');?>  : POSB Tampines Central</td>
					<td class="field"><?php echo lang('cms_sider_Accountnumber');?></td>
					<td class="value">194186231</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_copyofbusinesslicense');?></td>
					<td class="value" colspan="5">
						<div class="km-input-group fl">
						  <span class="km-input-group-addon" style="font-size: 12px;"><?php echo lang('cms_sider_causeofchanging');?></span>
						  <input id="BusinessLicenseMsg" type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
						</div>
						<button onclick="$('#fileBusinessLicense').click();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_Upload');?></button>
						<img src="/assets/images/cms/loading.gif" id="loadingBusinessLicense" class="hide">
						<a href="<?php echo $merchant->merchant_business_license;?>" target="_blank"><?php echo lang('cms_sider_Viewimage');?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('cms_sider_ViewimageTip');?>
						<form id="upload_BusinessLicense_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadBusinessLicense()" name="image" type="file" id="fileBusinessLicense" style="display:none;" accept="image/*">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Copyofbankaccount');?></td>
					<td class="value" colspan="5">
						<div class="km-input-group fl">
						  <span class="km-input-group-addon" style="font-size: 12px;"><?php echo lang('cms_sider_causeofchanging');?></span>
						  <input id="BankbookMsg" type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
						</div>
						<button type="button" onclick="$('#fileBankbook').click();" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px; "><?php echo lang('cms_sider_Upload');?></button>
						<img src="/assets/images/cms/loading.gif" id="loadingBankbook" class="hide">
						<a href="<?php echo $merchant->merchant_bank_account;?>" target="_blank"><?php echo lang('cms_sider_Viewimage');?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('cms_sider_ViewimageTip');?>
						<form id="upload_bankbook_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadBankbook()" name="image" type="file" id="fileBankbook" style="display:none;" accept="image/*">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Requestforapproval');?></td>
					<td class="value">
						<button onclick="requestForSettleInfo()" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_Request');?></button>
					</td>
					<td class="field"><?php echo lang('cms_sider_Processingstatus');?></td>
					<td class="value" colspan="3">
						<?php echo lang('cms_sider_ProcessingstatusTip1');?>
					</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_AaccountPassword');?></td>
					<td class="value" colspan="5">
						<button onclick="modifyAAccountPwd();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_ChangePassword');?></button>
						<div class="km-modal-dialog width40p" id="AAccountPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_sider_SettleInformation').'-'.lang('cms_sider_ChangeAaccountPassword');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label"><?php echo lang('cms_sider_CurrentPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label"><?php echo lang('cms_sider_NewPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label"><?php echo lang('cms_sider_ReenterNewPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_sider_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">GST Info</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p">Name</td>
					<td class="value width17p"><input id="gstName" value="<?php echo $merchant->merchant_gst_name;?>" type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
					<td class="field width15p">GST Registration No.</td>
					<td class="value width17p"><input id="gstNumber" value="<?php echo $merchant->merchant_gst_number;?>" type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
				  </tr>
				  <tr>
					<td class="field">Address</td>
					<td class="value" colspan="3">
						<input id="gstAddress" value="<?php echo $merchant->merchant_gst_address;?>" type="text" class="km-form-control fl" placeholder="" style="height:20px;width:80%;">
						<button onclick="saveGstInfo();" type="button" class="km-btn km-btn-primary fr" style="height: 32px;line-height:20px;font-size: 12px;">Request</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_BasicInfo');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_ContactNo');?></td>
					<td class="value width17p">
						<span class="km-label km-label-default fl"><?php echo lang('cms_myInfo_MobilephoneNo');?></span>  Singapore 9685-1921 
						<button onclick="setDivCenter('#baseInfoMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="baseInfoMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_MobilephoneNo');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_MobilephoneNo');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p" rowspan="2">
						kcheongn@gmail.com   
						<button onclick="setDivCenter('#baseContactInfoEmail',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button><br>
						<?php echo lang('cms_myInfo_EmailTip');?></td>
						<div class="km-modal-dialog width40p" id="baseContactInfoEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="baseContactInfo_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
				  </tr>
				  <tr>
					<td class="value width17p">
						<span class="km-label km-label-default fl"><?php echo lang('cms_myInfo_Phonenumber');?></span>  Singapore 9685-1921 
						<button onclick="setDivCenter('#baseInfoPhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="baseInfoPhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_Phonenumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Phonenumber');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Address');?></td>
					<td class="value width17p tal" colspan="3">
						<span class="km-label km-label-success" style="padding:0 0.6em"><?php echo lang('cms_myInfo_Display');?></span> (521168) 168A SIMEI LANE 168A Simei Lane Singapore 521168	<br>
						<span class="km-label km-label-danger" style="padding:0 0.6em"><?php echo lang('cms_myInfo_Hide');?></span> Singapore 9685-1921
						<button onclick="setDivCenter('#MyInfoCustomerViewAddress',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewAddress">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Address');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label">Address:</label>
									<input value="(521168) 168A SIMEI LANE 168A Simei Lane Singapore 521168" type="text" class="km-form-control" id="customer_view_address" style="width: 95%;padding: 0 5px;height: 30px;">
									<label for="customer_view_email" class="km-control-label">Phone:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_address_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_address_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Faxnumber');?></td>
					<td class="value width17p">
						Singapore 9685-1921
						<button onclick="setDivCenter('#MyInfoCustomerViewFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Faxnumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Faxnumber');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_CustomerCenterWorkingHour');?></td>
					<td class="value width17p" rowspan="2">周一~周五：上午9点~下午6点<br>周六： 上午9点~下午1点<br>周日，公休日：停业	
						<button onclick="setDivCenter('#MyInfoCustomerViewBusinessHours',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewBusinessHours">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_CustomerCenterWorkingHour');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_CustomerCenterWorkingHour');?>:</label>
									<textarea class="km-form-control" id="customer_view_businessHours" style="width:90%;min-height:60px;">周一~周五：上午9点~下午6点<br>周六： 上午9点~下午1点<br>周日，公休日：停业	</textarea>
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p">
						kcheongn@gmail.com
						<button onclick="modifyMyInfoCustomerViewEmail();" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="customer_view_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_SalesStaffInformationTip');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Salesstaff');?></td>
					<td class="value width17p">
						kcheongn
						<button onclick="setDivCenter('#managePrincipal',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="managePrincipal">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Salesstaff');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Name:</label>
									<input type="text" class="km-form-control" id="managePrincipal_name" value="kcheongn" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p">
						kcheongn@gmail.com   
						<button onclick="setDivCenter('#manageEmail',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button><br>
						<div class="km-modal-dialog width40p" id="manageEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="baseContactInfo_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_MobilephoneNo');?></td>
					<td class="value width17p">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#manageMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="manageMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_MobilephoneNo');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_MobilephoneNo');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_Phonenumber');?></td>
					<td class="value width17p">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#managePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="managePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Phonenumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Phonenumber');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Faxnumber');?></td>
					<td class="value width17p" colspan="3">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#manageFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="manageFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Faxnumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Faxnumber');?>:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_ShippingInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Shipfromaddress');?></td>
					<td class="value width17p">
						(521168) 168A SIMEI LANE 168A Simei Lane Singapore 521168<br>
						<?php echo lang('cms_myInfo_ShipfromaddressTip');?>
						<button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_DeliveryCompany');?></td>
					<td class="value width17p">
						<select id="sel_srch_takbae" style="height: 30px;"><option value="">Select</option><option value="100000002">Singpost normal mail</option><option value="100000003">Singpost registered mail</option><option value="100000040">Singpost Smartpac</option><option value="100000004">TAQBIN</option><option value="100000005">EMS</option><option value="100000011">Korea registered airmail</option><option value="100000012">Korea normal airmail</option><option value="100000020">Qxpress</option><option value="100000053">Qxpress normal mail</option><option value="100000017">Speedpost</option><option value="100000058">SRE</option><option value="100000063">Quantium</option><option value="100000007">Toll</option><option value="100000009">DHL</option><option value="100000025">FedEx</option><option value="100000034">UPS</option><option value="100000026">Chinapost normal airmail</option><option value="100000027">Chinapost registered airmail</option><option value="100000030">Dex-i</option><option value="100000037">HK post normal mail</option><option value="100000038">HK post registered mail</option><option value="100000047">Thailand registered mail</option><option value="100000021">Citylink</option><option value="100000013">USPS registered mail</option><option value="100000056">USPS normal mail</option><option value="100000062">Asendia</option><option value="100000023">Arrow Air Action</option><option value="100000024">Cuckoo Express</option><option value="100000035">Comone Express</option><option value="100000065">YAMATO Global</option><option value="100000019">4PX Express</option><option value="100000029">Aramex</option><option value="100000031">Japanpost registered mail</option><option value="100000036">MypostOnline</option><option value="100000043">Airpak</option><option value="100000057">POS daftar</option><option value="100000052">Pos Laju</option><option value="100000008">Others</option></select>
						<button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Orderalerttype');?></td>
					<td class="value width17p tal" colspan="3">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_myInfo_ASMAndemailnotify');?> <input type="text" class="km-form-control" id="customer_view_fax_areacode" value="XXX@gmail.com" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block; font-size:10px;"> <?php echo lang('cms_myInfo_ASMAndemailnotifyTip');?><br>
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;"> <?php echo lang('cms_myInfo_SMSreceive');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(100)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-125px; width:260px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_myInfo_Description');?></h3>

							  <div class="km-popover-content">
								<p><?php echo lang('cms_myInfo_DescriptionContent');?></p>
							  </div>
							</div>
						</div>
						<?php echo lang('cms_myInfo_MobilephoneNo');?>：Singapore 9685-1921 <button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Editmobilephonenumber');?></button>
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Sendingnotifymail');?></td>
					<td class="value width17p tal" colspan="3">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;"> <?php echo lang('cms_myInfo_Use');?> 	<?php echo lang('cms_myInfo_UseTip');?>
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">e-Ticket <?php echo lang('cms_sider_Password');?></td>
					<td class="value width17p tal" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block;">
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 22px;font-size: 10px;padding: 2px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">AiiMai<?php echo lang('cms_sider_staffAndcontactinformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width50p" style="border-right: 1px solid #ddd;"><?php echo lang('cms_sider_Salesmanager');?></td>
					<td class="field width50p"><?php echo lang('cms_sider_GeneralSellingInquiryforAiiMai');?></td>
				  </tr>
				  <tr>
					<td class="value width10p tal" style="border-right: 1px solid #ddd;">
						<?php echo lang('cms_myInfo_Name');?>: Deal offer<br>
						<?php echo lang('cms_myInfo_Email');?> : deal@aiimai.com<br>
						<?php echo lang('cms_myInfo_Phonenumber');?> : <br>
						<?php echo lang('cms_myInfo_ForpromotionofyourproductOrservices');?>
					</td>
					<td class="value width17p tal" colspan="3">
						<a href="#no">FAQs</a>    |    <a href="#no"><?php echo lang('cms_myInfo_AskaQuestion');?></a><br><?php echo lang('cms_myInfo_Formoreinformationaboutshippingsettlementetc');?>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<script src="/assets/js/cms-myInfo.js" type="text/javascript"></script>