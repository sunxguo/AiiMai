<div class="" style="padding-left:30px;">
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">卖家基本信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p">用户ID</td>
					<td class="value width17p">kcheongn</td>
					<td class="field width15p">卖家名</td>
					<td class="value width17p">XXXX</td>
					<td class="field width15p">注册时间</td>
					<td class="value ">2015-01-29 11:22:56</td>
				  </tr>
				  <tr>
					<td class="field">卖家类型</td>
					<td class="value">个人卖家</td>
					<td class="field">卖家等级</td>
					<td class="value">普通卖家</td>
					<td class="field">密码</td>
					<td class="value" style="padding: 2px 0;">
						<button onclick="modifySellerBaseInfoPwd();" type="button" class="km-btn km-btn-primary" style="height: 30px;font-size: 12px;">修改密码</button>
						<div class="km-modal-dialog width40p" id="sellerBaseInfoPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">卖家基本信息-修改密码</h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label">原始密码:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label">新密码:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label">确认新密码:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
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
		<div class="km-panel-heading">结算信息 (* 结算相关的问题，请发货邮件到[seller_regist@aiimai.com])</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p">结算日</td>
					<td class="value width17p">交易完成+15日星期三将汇款至Q账户</td>
					<td class="field width15p">结算管理</td>
					<td class="value width17p">SGD</td>
					<td class="field width15p">税款</td>
					<td class="value ">税</td>
				  </tr>
				  <tr>
					<td class="field">银行名</td>
					<td class="value" colspan="3">DBS Bank Ltd / POSB    分店名 : POSB Tampines Central</td>
					<td class="field">账户号码</td>
					<td class="value">194186231</td>
				  </tr>
				  <tr>
					<td class="field">营业执照号码复印件（您是个人身份的法人，需身份证复印件）</td>
					<td class="value" colspan="5">
						<div class="km-input-group fl">
						  <span class="km-input-group-addon" style="font-size: 12px;">更改理由</span>
						  <input type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
						</div>
						<button onclick="$('#fileBusinessLicense').click();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px; margin-left:-220px;">上传</button>
						<img src="/assets/images/cms/loading.gif" id="loadingBusinessLicense" class="hide">
						<a href="">查看图片</a>&nbsp;&nbsp;&nbsp;&nbsp;(图片上传最大容量为：1.5MB)
						<form id="upload_BusinessLicense_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadBusinessLicense()" name="image" type="file" id="fileBusinessLicense" style="display:none;" accept="image/*">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="field">存折复印件</td>
					<td class="value" colspan="5">
						<div class="km-input-group fl">
						  <span class="km-input-group-addon" style="font-size: 12px;">更改理由</span>
						  <input type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
						</div>
						<button type="button" onclick="$('#fileBankbook').click();" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px; margin-left:-220px;">上传</button>
						<img src="/assets/images/cms/loading.gif" id="loadingBankbook" class="hide">
						<a href="">查看图片</a>&nbsp;&nbsp;&nbsp;&nbsp;(图片上传最大容量为：1.5MB)
						<form id="upload_bankbook_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadBankbook()" name="image" type="file" id="fileBankbook" style="display:none;" accept="image/*">
						</form>
					</td>
				  </tr>
				  <tr>
					<td class="field">更改内容确认申请</td>
					<td class="value">
						<button type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;">申请</button>
					</td>
					<td class="field">处理状态</td>
					<td class="value" colspan="3">
						正在验证中. 文件递交后 3天内会完成注册。（以营业为准）
					</td>
				  </tr>
				  <tr>
					<td class="field">A账户密码</td>
					<td class="value" colspan="5">
						<button onclick="modifyAAccountPwd();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;">密码更改</button>
						<div class="km-modal-dialog width40p" id="AAccountPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">结算信息-修改A账户密码</h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label">原始密码:</label>
									<input type="password" class="km-form-control" id="a_account_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label">新密码:</label>
									<input type="password" class="km-form-control" id="a_account_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label">确认新密码:</label>
									<input type="password" class="km-form-control" id="a_account_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
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
					<td class="value width17p"><input type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
					<td class="field width15p">GST Registration No.</td>
					<td class="value width17p"><input type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
				  </tr>
				  <tr>
					<td class="field">Address</td>
					<td class="value" colspan="3">
						<input type="text" class="km-form-control fl" placeholder="" style="height:20px;width:80%;">
						<button type="button" class="km-btn km-btn-primary fr" style="height: 32px;line-height:20px;font-size: 12px;">Request</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">基本联系信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p" rowspan="2">电话号码</td>
					<td class="value width17p">
						<span class="km-label km-label-default fl">手机号码</span>  Singapore 9685-1921 
						<button onclick="setDivCenter('#baseInfoMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="baseInfoMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">基本联系信息-手机号码</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Mobile Phone:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2">邮件</td>
					<td class="value width17p" rowspan="2">
						kcheongn@gmail.com   
						<button onclick="setDivCenter('#baseContactInfoEmail',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button><br>
						以该邮件地址收取来自Qoo10系统的信件。在此可修改地址，也可在Qoo10我的信息中进行更改。</td>
						<div class="km-modal-dialog width40p" id="baseContactInfoEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">基本联系信息-邮件</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Email:</label>
									<input type="text" class="km-form-control" id="baseContactInfo_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
				  </tr>
				  <tr>
					<td class="value width17p">
						<span class="km-label km-label-default fl">电话号码</span>  Singapore 9685-1921 
						<button onclick="setDivCenter('#baseInfoPhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="baseInfoPhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">基本联系信息-电话号码</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Mobile Phone:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
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
		<div class="km-panel-heading">客户可见的卖家信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p">地址</td>
					<td class="value width17p tal" colspan="3">
						<span class="km-label km-label-success" style="padding:0 0.6em">显示</span> (521168) 168A SIMEI LANE 168A Simei Lane Singapore 521168	<br>
						<span class="km-label km-label-danger" style="padding:0 0.6em">隐藏</span> Singapore 9685-1921
						<button onclick="setDivCenter('#MyInfoCustomerViewAddress',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewAddress">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">客户可见的卖家信息-地址</h4>
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
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">传真号码</td>
					<td class="value width17p">
						Singapore 9685-1921
						<button onclick="setDivCenter('#MyInfoCustomerViewFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">客户可见的卖家信息-传真</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Fax:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2">客户中心营业时间</td>
					<td class="value width17p" rowspan="2">周一~周五：上午9点~下午6点<br>周六： 上午9点~下午1点<br>周日，公休日：停业	
						<button onclick="setDivCenter('#MyInfoCustomerViewBusinessHours',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewBusinessHours">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">客户可见的卖家信息-客户中心营业时间</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">营业时间:</label>
									<textarea class="km-form-control" id="customer_view_businessHours" style="width:90%;min-height:60px;">周一~周五：上午9点~下午6点<br>周六： 上午9点~下午1点<br>周日，公休日：停业	</textarea>
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">邮件</td>
					<td class="value width17p">
						kcheongn@gmail.com
						<button onclick="modifyMyInfoCustomerViewEmail();" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">客户可见的卖家信息-邮件</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Email:</label>
									<input type="text" class="km-form-control" id="customer_view_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
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
		<div class="km-panel-heading">经营管理信息 (* 在Qoo10中获得信息时的相关参考。与基本信息不一致时请输入。)</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p">营业负责人</td>
					<td class="value width17p">
						kcheongn
						<button onclick="setDivCenter('#managePrincipal',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="managePrincipal">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">经营管理信息-营业负责人</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Name:</label>
									<input type="text" class="km-form-control" id="managePrincipal_name" value="kcheongn" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p">邮件</td>
					<td class="value width17p">
						kcheongn@gmail.com   
						<button onclick="setDivCenter('#manageEmail',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button><br>
						<div class="km-modal-dialog width40p" id="manageEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">基本联系信息-邮件</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Email:</label>
									<input type="text" class="km-form-control" id="baseContactInfo_email" value="kcheongn@gmail.com" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">手机号码</td>
					<td class="value width17p">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#manageMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="manageMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">经营管理信息-手机号码</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Mobile Phone:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p">电话号码</td>
					<td class="value width17p">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#managePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="managePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">经营管理信息-电话号码</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Phone:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">传真号码</td>
					<td class="value width17p" colspan="3">
						Singapore 9685-1921 
						<button onclick="setDivCenter('#manageFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
						<div class="km-modal-dialog width40p" id="manageFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">经营管理信息-传真号码</h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label">Fax:</label>
									<select id="customer_view_fax_countrycode" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="customer_view_fax_areacode" value="9685" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="customer_view_fax_number" value="1921" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
									<button type="button" class="km-btn km-btn-primary">Save changes</button>
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
		<div class="km-panel-heading">运送/付款信息</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p">发货地址</td>
					<td class="value width17p">
						(521168) 168A SIMEI LANE 168A Simei Lane Singapore 521168<br>
						*退货处所和发货处所要进行不同设置时，请使用商品管理菜单。
						<button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">修改</button>
					</td>
					<td class="field width10p">运送公司</td>
					<td class="value width17p">
						<select id="sel_srch_takbae" style="height: 30px;"><option value="">Select</option><option value="100000002">Singpost normal mail</option><option value="100000003">Singpost registered mail</option><option value="100000040">Singpost Smartpac</option><option value="100000004">TAQBIN</option><option value="100000005">EMS</option><option value="100000011">Korea registered airmail</option><option value="100000012">Korea normal airmail</option><option value="100000020">Qxpress</option><option value="100000053">Qxpress normal mail</option><option value="100000017">Speedpost</option><option value="100000058">SRE</option><option value="100000063">Quantium</option><option value="100000007">Toll</option><option value="100000009">DHL</option><option value="100000025">FedEx</option><option value="100000034">UPS</option><option value="100000026">Chinapost normal airmail</option><option value="100000027">Chinapost registered airmail</option><option value="100000030">Dex-i</option><option value="100000037">HK post normal mail</option><option value="100000038">HK post registered mail</option><option value="100000047">Thailand registered mail</option><option value="100000021">Citylink</option><option value="100000013">USPS registered mail</option><option value="100000056">USPS normal mail</option><option value="100000062">Asendia</option><option value="100000023">Arrow Air Action</option><option value="100000024">Cuckoo Express</option><option value="100000035">Comone Express</option><option value="100000065">YAMATO Global</option><option value="100000019">4PX Express</option><option value="100000029">Aramex</option><option value="100000031">Japanpost registered mail</option><option value="100000036">MypostOnline</option><option value="100000043">Airpak</option><option value="100000057">POS daftar</option><option value="100000052">Pos Laju</option><option value="100000008">Others</option></select>
						<button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">保存</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">订单通知方法</td>
					<td class="value width17p tal" colspan="3">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">ASM + 邮件提示 <input type="text" class="km-form-control" id="customer_view_fax_areacode" value="XXX@gmail.com" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block; font-size:10px;"> * 可以设置3个邮箱地址，以半角逗号(,) 分割。<br>
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;">接收短信 
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(100)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-125px; width:260px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title">使用说明</h3>

							  <div class="km-popover-content">
								<p>接收短信订购商品通知.<br>1. 当日新订购商品通知- 处于运送请求状态的订购商品总计 - 每天仅发送一次，发送时间为下午4点.<br>2. 每日运送请求剩余商品件数通知 - 新订购商品/运送准备/运送延迟商品总计 - 每日一次，上午9点发送</p>
							  </div>
							</div>
						</div>
						手机号：Singapore 9685-1921 <button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;">设置手机号</button>
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;">保存</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">发货说明电邮</td>
					<td class="value width17p tal" colspan="3">
						<input type="checkbox" style="vertical-align: middle;margin-right: 5px;"> 使用 	买家和卖家同时都可收到发货确认后的邮件。(邮件将发货到卖家基本信息上已登录的邮件地址。)
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;">保存</button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">e-Ticket 密码</td>
					<td class="value width17p tal" colspan="3">
						<input type="text" class="km-form-control" id="customer_view_fax_number" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block;">
						<button onclick="" type="button" class="km-btn km-btn-primary fr" style="height: 22px;font-size: 10px;padding: 2px 10px;">保存</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">AiiMai负责人&联系方式</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width50p" style="border-right: 1px solid #ddd;">营业负责人</td>
					<td class="field width50p">相关销售一般咨询</td>
				  </tr>
				  <tr>
					<td class="value width10p tal" style="border-right: 1px solid #ddd;">
						姓名: Deal offer<br>
						邮件 : deal@aiimai.com<br>
						电话号码 : <br>
						*宣传商品/服务
					</td>
					<td class="value width17p tal" colspan="3">
						<a href="#no">FAQs</a>    |    <a href="#no">咨询</a><br>*获取更多清算/运送等疑问等。
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="/assets/js/cms-myInfo.js" type="text/javascript"></script>