<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Common extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("upload");
		$this->load->library('CommonGetData');
		$this->load->library('PHPExcel');
		$this->load->model("dbHandler");
	}
	public function addInfo(){
		$table="";
		$data=json_decode($_POST['data']);
		$info=array();
		switch($_POST['info_type']){
			case "column":
				$table="column";
				$info=array(
					"column_fid"=>$data->fid,
					"column_name"=>$data->name,
					"column_display"=>$data->display,
					"column_type"=>$data->type,
					"column_ordernum"=>$data->order_num
				);
			break;
			case "essay":
				$table="essay";
				$info=array(
					"essay_column"=>$data->column_id,
					"essay_title"=>$data->title,
					"essay_summary"=>$data->summary,
					"essay_content"=>$data->content,
					"essay_thumbnail"=>json_encode($data->thumbnail),
					"essay_state"=>$data->draft,
					"essay_create_time"=>date("Y-m-d H:i:s"),
					"essay_visits"=>0,
					"essay_author_type"=>$this->commongetdata->getUserType($_SESSION['usertype']),
					"essay_author_id"=>$_SESSION['userid'],
					"essay_lastmodify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "message":
				$table="message";
				$info=array(
					"message_type"=>$data->type,
					"message_from"=>$_SESSION['userid'],
					"message_to"=>0,
					"message_title"=>$data->title,
					"message_content"=>$data->content,
					"message_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "product":
				$table="product";
				$info=array(
					"product_category"=>$data->MainCategory,
					"product_sub_category"=>$data->stSubCategory,
					"product_sub_sub_category"=>$data->ndSubCategory,
					"product_sell_format"=>$data->SellFormat,
					"product_delivery_type"=>$data->DeliveryType,
					"product_item_condition"=>$data->ItemCondition,
					"product_item_title_zh_cn"=>$data->title_zh_cn,
					"product_item_title_tw_cn"=>$data->title_tw_cn,
					"product_item_title_english"=>$data->title_english,
					"product_short_title"=>$data->ShortTitle,
					"product_sell_price"=>$data->SellPrice,
					"product_reference_price"=>$data->ReferencePrice,
					"product_seller_code"=>$data->SellerCode,
					"product_adult"=>$data->AdultItem,
					"product_image"=>$data->productImg,
					"product_production_place_code"=>$data->ProductionPlaceCode,
					"product_production_place_detail"=>$data->ProductionPlaceDetail,
					"product_quantity"=>$data->Quantity,
					"product_available_period"=>$data->AvailablePeriod,
					"product_display_left"=>$data->Displayleftavailableperiod,
					"product_shipping_rate"=>1,
					"product_description"=>$data->description,
					"product_shipping_address"=>$data->shippingAddress,
					"product_merchant"=>$_SESSION['userid'],
					"product_time"=>date("Y-m-d H:i:s"),
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
				foreach($data->optionTypes as $key=>$optionType){
					$info['product_option'.($key+1)]=$optionType;
				}
			break;
			case "register":
				$table="user";
				if(!$this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$data->username))){
					echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
					return false;
				}
				$info=array(
					"user_username"=>$data->username,
					"user_pwd"=>MD5("MonkeyKing".$data->password),
					"user_grade"=>1,
					"user_gender"=>$data->gender,
					"user_email"=>$data->email,
					"user_country"=>$data->country,
					"user_is_merchant"=>0,
					"user_reg_time"=>date("Y-m-d H:i:s")
				);
				$_SESSION['userEmail']=$data->email;
			break;
			case "merchant":
				$table="user";
				if(!$this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$data->username))){
					echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
					return false;
				}
				$time=date("Y-m-d H:i:s");
				$info=array(
					"user_username"=>$data->username,
					"user_pwd"=>MD5("MonkeyKing".$data->password),
					"user_grade"=>1,
					"user_gender"=>$data->gender,
					"user_email"=>$data->email,
					"user_country"=>$data->country,
					"user_confirm_email"=>0,
					"merchant_status"=>0,
					"user_reg_time"=>$time
				);
				$_SESSION['userEmail']=$data->email;
			break;
			case 'follow':
				if(!isset($_SESSION['userid'])){
					echo json_encode(array("result"=>"failed","message"=>"Not Login!"));
					return false;
				}
				$table="follow";
				$info=array(
					"follow_merchant_id"=>$data->merchantId,
					"follow_user_id"=>$_SESSION['userid'],
					"follow_time"=>date("Y-m-d H:i:s")
				);
			break;
		}
		if($_POST['info_type']=="product"){
			$productId=$this->dbHandler->insertDataReturnId($table,$info);
			foreach($data->optionsData as $optionData){
				$this->dbHandler->insertData('product_option',array(
					"product_option_product_id"=>$productId,
					"product_option_1"=>$optionData->op1,
					"product_option_2"=>isset($optionData->op2)?$optionData->op2:'',
					"product_option_3"=>isset($optionData->op3)?$optionData->op3:'',
					"product_option_price"=>$optionData->price,
					"product_option_stock"=>$optionData->stock
				));
			}
			if($productId!='') echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
			else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
			return true;
		}
		$result=$this->dbHandler->insertData($table,$info);
		if($result==1)echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function delInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'column':
				$condition['table']="column";
				$condition['where']=array("column_id"=>$data->id);
			break;
			case 'item':
				$condition['table']="product";
				$condition['where']=array("product_id"=>$data->id);
			break;
			case 'user':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
			break;
			case 'merchant':
				$condition['table']="merchant";
				$condition['where']=array("merchant_id"=>$data->id);
			break;
			case 'order':
				$condition['table']="order";
				$condition['where']=array("order_id"=>$data->id);
			break;
			case 'comment':
				$condition['table']="comment";
				$condition['where']=array("comment_id"=>$data->id);
			break;
		}
		$result=$this->dbHandler->deleteData($condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息删除失败"));
	}
	public function modifyInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'column':
				$condition['table']="column";
				$condition['where']=array("column_id"=>$data->id);
				$condition['data']=array(
					"column_fid"=>$data->fid,
					"column_name"=>$data->name,
					"column_display"=>$data->display,
					"column_type"=>$data->type,
					"column_ordernum"=>$data->order_num
				);
			break;
			case "essay":
				$condition['table']="essay";
				$condition['where']=array("essay_id"=>$data->id);
				$condition['data']=array(
					"essay_column"=>$data->column_id,
					"essay_title"=>$data->title,
					"essay_summary"=>$data->summary,
					"essay_content"=>$data->content,
					"essay_thumbnail"=>json_encode($data->thumbnail),
					"essay_state"=>$data->draft,
					"essay_lastmodify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "product":
				$condition['table']="product";
				$condition['where']=array("product_id"=>$data->id);
				$condition['data']=array(
					"product_category"=>$data->MainCategory,
					"product_sub_category"=>$data->stSubCategory,
					"product_sub_sub_category"=>$data->ndSubCategory,
					"product_sell_format"=>$data->SellFormat,
					"product_delivery_type"=>$data->DeliveryType,
					"product_item_condition"=>$data->ItemCondition,
					"product_item_title_zh_cn"=>$data->title_zh_cn,
					"product_item_title_tw_cn"=>$data->title_tw_cn,
					"product_item_title_english"=>$data->title_english,
					"product_short_title"=>$data->ShortTitle,
					"product_sell_price"=>$data->SellPrice,
					"product_reference_price"=>$data->ReferencePrice,
					"product_seller_code"=>$data->SellerCode,
					"product_adult"=>$data->AdultItem,
					"product_image"=>$data->productImg,
					"product_production_place_code"=>$data->ProductionPlaceCode,
					"product_production_place_detail"=>$data->ProductionPlaceDetail,
					"product_quantity"=>$data->Quantity,
					"product_available_period"=>$data->AvailablePeriod,
					"product_display_left"=>$data->Displayleftavailableperiod,
					"product_shipping_rate"=>1,
					"product_description"=>$data->description,
					"product_shipping_address"=>$data->shippingAddress,
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "merchantInfo":
				$condition['table']="user";
				$condition['where']=array("user_email"=>$_SESSION['userEmail']);
				$condition['data']=array(
					"merchant_type"=>$data->merchantType,
					"merchant_name"=>$data->name,
					"merchant_login_ID"=>$data->ID,
					"merchant_phone1"=>$data->phone1,
					"merchant_phone2"=>$data->phone2,
					"merchant_phone3"=>$data->phone3,
					"merchant_homephone1"=>$data->homephone1,
					"merchant_homephone2"=>$data->homephone2,
					"merchant_homephone3"=>$data->homephone3,
					"merchant_address1"=>$data->address1,
					"merchant_address2"=>$data->address2,
					"merchant_salesStaff"=>$data->salesStaff,
					"merchant_doc"=>$data->doc,
					"user_is_merchant"=>1,
					"merchant_status"=>1
				);
			break;
			case 'merchantpwd':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['result']="data";
				$merchantInfo=$this->commongetdata->getOneData($condition);
				if($merchantInfo->user_pwd!=MD5("MonkeyKing".$data->oldpwd)){
					echo json_encode(array("result"=>"failed","message"=>"Wrong password！"));
					return false;
				}
				if($merchantInfo->user_pwd==MD5("MonkeyKing".$data->newpwd)){
					echo json_encode(array("result"=>"failed","message"=>"Failed. You cannot re-use an old password！"));
					return false;
				}
				$condition['data']=array(
					"user_pwd"=>MD5("MonkeyKing".$data->newpwd)
				);
			break;
			case 'merchantBusinessLicense':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_business_license"=>$data->src,
					"merchant_business_license_msg"=>$data->Msg,
				);
			break;
			case 'merchantBankbook':
				$condition['table']="merchant";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_bank_account"=>$data->src,
					"merchant_bank_account_msg"=>$data->Msg,
				);
			break;
			case 'GstInfo':
				$condition['table']="merchant";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_gst_name"=>$data->gstName,
					"merchant_gst_number"=>$data->gstNumber,
					"merchant_gst_address"=>$data->gstAddress
				);
			break;
			case 'userStatus':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"user_state"=>$data->status
				);
			break;
			case 'merchantStatus':
				$condition['table']="merchant";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_status"=>$data->status
				);
			break;
			case 'websiteInfo':
				$condition['table']="websiteconfig";
				$condition['where']=array("key_websiteconfig"=>$data->key);
				$condition['data']=array(
					"value_websiteconfig"=>$data->value
				);
			break;
			case 'adminPwd':
				$condition['table']="mkadmin";
				$condition['where']=array("mkadmin_id"=>$_SESSION['userid']);
				$condition['result']="data";
				$adminInfo=$this->commongetdata->getOneData($condition);
				if($adminInfo->mkadmin_pwd!=MD5("MonkeyKing".$data->oldpwd)){
					echo json_encode(array("result"=>"failed","message"=>"Wrong password！"));
					return false;
				}
				$condition['data']=array(
					"mkadmin_pwd"=>MD5("MonkeyKing".$data->newpwd)
				);
			break;
			case 'userNewPwd':
				$condition=array(
					'table'=>'user',
					'result'=>'data',
					'where'=>array(
						'token'=>$data->verify
					)
				);
				$user=$this->commongetdata->getData($condition);
				if(sizeof($user)<1){
//					$this->load->view('redirect',array("url"=>"/home/login","info"=>"This token is error!"));
					echo json_encode(array("result"=>"failed","message"=>"This token is error!"));
					return false;
				}
				$user=$user[0];
				if(time()>$user->token_exptime){ //24hour 
					$msg = 'You activate the validity period is over, please login your account to resend the activation email.';
					echo json_encode(array("result"=>"failed","message"=>$msg));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("token"=>$data->verify);
				$condition['data']=array(
					"user_pwd"=>MD5("MonkeyKing".$data->newpwd),
					"user_confirm_email"=>1
				);
				$result=$this->dbHandler->updateData($condition);
				if($result==1){
					$this->commongetdata->email($user->user_email,$this->commongetdata->getWebsiteConfig("website_reset_password_success_subject"),$this->commongetdata->getWebsiteConfig("website_reset_password_success_content"));
//					$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
					echo json_encode(array("result"=>"success","message"=>'Password is changed successfully!'));
				}
				else{
					echo json_encode(array("result"=>"failed","message"=>'Failed. You cannot re-use an old password'));
				}
				/*
				$condition['table']="user";
				$condition['where']=array("user_email"=>$_SESSION['userEmail']);
				$condition['result']="data";
				$merchantInfo=$this->commongetdata->getOneData($condition);
				$condition['data']=array(
					"user_pwd"=>MD5("MonkeyKing".$data->newpwd)
				);
				*/
			break;
			case 'myInfoMobilephoneNo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_phone1"=>$data->merchant_phone1,
					"merchant_phone2"=>$data->merchant_phone2,
					"merchant_phone3"=>$data->merchant_phone3,
				);
			break;
			case 'myInfoPhonenumber':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_homephone1"=>$data->merchant_homephone1,
					"merchant_homephone2"=>$data->merchant_homephone2,
					"merchant_homephone3"=>$data->merchant_homephone3,
				);
			break;
			case 'myInfoEmail':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"user_email"=>$data->merchant_email
				);
			break;
			case 'shopImg':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_shop_".$data->position."img"=>$data->image
				);
			break;
			case 'shopInfo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_shop_info"=>$data->info
				);
			break;
			case 'baseInfoAddressDisplay':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_address_address_display"=>$data->display
				);
			break;
			case 'baseInfoPhoneDisplay':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_address_phone_display"=>$data->display
				);
			break;
			case 'baseInfo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_address_address_content"=>$data->address,
					"merchant_displayed_address_phone_content1"=>$data->phone1,
					"merchant_displayed_address_phone_content2"=>$data->phone2,
					"merchant_displayed_address_phone_content3"=>$data->phone3,
				);
			break;
			case 'baseInfoFaxnumber':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_faxnumber1"=>$data->phone1,
					"merchant_displayed_faxnumber2"=>$data->phone2,
					"merchant_displayed_faxnumber3"=>$data->phone3,
				);
			break;
			case 'businessHours':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_workinghour"=>$data->businessHours
				);
			break;
			case 'displayedInfoEmail':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_displayed_email"=>$data->email
				);
			break;
		}
		if($_POST['info_type']!='userNewPwd'){
			$result=$this->dbHandler->updateData($condition);
			if($result==1) echo json_encode(array("result"=>"success","message"=>"Successfully Modify!"));
			else echo json_encode(array("result"=>"failed","message"=>"Failed to modify"));
		}
	}
	public function getInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		$result=array();
		switch($_POST['info_type']){
			case 'subCat':
				$result=$this->commongetdata->getSubCat($data->id);
			break;
			case 'product':
				$cat=$data->MainCategory==-1?false:$data->MainCategory;
				$sCat=$data->stSubCategory==-1?false:$data->stSubCategory;
				$ssCat=$data->ndSubCategory==-1?false:$data->ndSubCategory;
				$title=$data->title==''?false:$data->title;
				$status=$data->status;
				if($data->dateType==0){
					$listedTime=array(
						"begin"=>$data->beginDate,
						"end"=>$data->endDate
					);
					$modifyTime=false;
				}else{
					$modifyTime=array(
						"begin"=>$data->beginDate,
						"end"=>$data->endDate
					);
					$listedTime=false;
				}
				$sellFormat=$data->SellFormat;
				$order=array("field"=>"product_modify_time","type"=>'DESC');
				$result=$this->commongetdata->getProducts($_SESSION['userid'],$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order);
			break;
			case 'turnover':
				$startDate=$data->startDate;
				$days=$data->days;
				$merchant=isset($data->merchant)?$data->merchant:false;
				$result=$this->commongetdata->getOrdersByDay($startDate,$days,$merchant);
			break;
			case 'merchantTurnover':
				$days=$data->days;
				$startDate=date("Y-m-d",strtotime(date("Y-m-d")." -".$days." day"));
				$merchant=isset($data->merchant)?$data->merchant:$_SESSION['userid'];
				$result=$this->commongetdata->getOrdersByDay($startDate,$days,$merchant,true);
			break;
		}
		echo json_encode(array("result"=>"success","message"=>$result));
	}
	public function excelInfo(){
		$data=json_decode($_POST['data']);
		$result=array();
		$url='';
		switch($_POST['info_type']){
			case 'subCat':
				$result=$this->commongetdata->getSubCat($data->id);
			break;
			case 'product':
				$categories=$this->commongetdata->getCategories(true);
				$field=array('Item code','Seller Code','Item Title','Price','Settle Price','Qty','Premium List','Status','Global Sales','Delivery Type','Main Cat','1st subCat','2nd subCat','Pay on delivery Y/N','Sales Format','Inventory Code','Listed Date');
				$cat=$data->MainCategory==-1?false:$data->MainCategory;
				$sCat=$data->stSubCategory==-1?false:$data->stSubCategory;
				$ssCat=$data->ndSubCategory==-1?false:$data->ndSubCategory;
				$title=$data->title==''?false:$data->title;
				$status=$data->status;
				if($data->dateType==0){
					$listedTime=array(
						"begin"=>$data->beginDate,
						"end"=>$data->endDate
					);
					$modifyTime=false;
				}else{
					$modifyTime=array(
						"begin"=>$data->beginDate,
						"end"=>$data->endDate
					);
					$listedTime=false;
				}
				$sellFormat=$data->SellFormat;
				$order=array("field"=>"product_modify_time","type"=>'DESC');
				$result=$this->commongetdata->getProducts($_SESSION['userid'],$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order);
				$dataArray=array();
				foreach($result as $value){
					$dataArray[]=array(
						$value->product_id,
						'',
						$value->product_item_title_english,
						$value->product_reference_price,
						$value->product_sell_price,
						$value->product_quantity,
						'',
						$value->product_status,
						'',
						$value->product_sell_format,
						$categories[$value->product_category]->category_name,
						$categories[$value->product_sub_category]->category_name,
						$categories[$value->product_sub_sub_category]->category_name,
						'',
						'',
						'',
						$value->product_time
					);
				}
				$url=$this->exportExcel('products','subject','description',$field,$dataArray);
			break;
			case 'productSimple':
				$categories=$this->commongetdata->getCategories(true);
				$field=array('Item code','Seller Code','Item Title','Price','Settle Price','Qty','Premium List','Status','Global Sales','Delivery Type','Main Cat','1st subCat','2nd subCat','Pay on delivery Y/N','Sales Format','Inventory Code','Listed Date');
				$cat=$data->MainCategory==-1?false:$data->MainCategory;
				$sCat=false;
				$ssCat=false;
				$title=$data->title==''?false:$data->title;
				$status=$data->status==-1?false:$data->status;
				$modifyTime=false;
				$listedTime=false;
				$sellFormat=false;
				$order=array("field"=>"product_modify_time","type"=>'DESC');
				$result=$this->commongetdata->getProducts(false,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order);
				$dataArray=array();
				foreach($result as $value){
					$dataArray[]=array(
						$value->product_id,
						'',
						$value->product_item_title_english,
						$value->product_reference_price,
						$value->product_sell_price,
						$value->product_quantity,
						'',
						$value->product_status,
						'',
						$value->product_sell_format,
						$categories[$value->product_category]->category_name,
						$categories[$value->product_sub_category]->category_name,
						$categories[$value->product_sub_sub_category]->category_name,
						'',
						'',
						'',
						$value->product_time
					);
				}
				$url=$this->exportExcel('products','subject','description',$field,$dataArray);
			break;
			case 'merchant':
				$categories=$this->commongetdata->getCategories(true);
				$field=array('Logo','Seller Shop Title','Avatar','Username','Email','Gender','Vip','Status','Last Login Time');
				$parameters=array(
					'result'=>'data',
					''=>
				);
				
				$result=$this->commongetdata->getMerchantsAdvance($parameters);
				$dataArray=array();
				foreach($result as $value){
					$dataArray[]=array(
						$value->product_id,
						'',
						$value->product_item_title_english,
						$value->product_reference_price,
						$value->product_sell_price,
						$value->product_quantity,
						'',
						$value->product_status,
						'',
						$value->product_sell_format,
						$categories[$value->product_category]->category_name,
						$categories[$value->product_sub_category]->category_name,
						$categories[$value->product_sub_sub_category]->category_name,
						'',
						'',
						'',
						$value->product_time
					);
				}
				$url=$this->exportExcel('products','subject','description',$field,$dataArray);
			break;
		}
		echo json_encode(array("result"=>"success","message"=>$url));
	}
	public function addToCart(){
		$result=$this->commongetdata->addToCart(array(
			"productId"=>$_POST['product_id'],
			"op1"=>isset($_POST['op1'])?$_POST['op1']:'',
			"op2"=>isset($_POST['op2'])?$_POST['op2']:'',
			"op3"=>isset($_POST['op3'])?$_POST['op3']:''
		),$_POST['merchant_id'],$_POST['amount']);
		if($result)
			echo json_encode(array("result"=>"success","message"=>''));
		else
			echo json_encode(array("result"=>"failed","message"=>'Stocks do not have so many goods!'));
	}
	public function removeFromCart(){
		$produts=json_decode($_POST['productIdArray']);
		foreach($produts as $p){
			$this->commongetdata->removeFromCart($p);
		}
		echo json_encode(array("result"=>"success","message"=>''));
	}
	public function uploadImage(){
		$result=upload("image");
		echo json_encode($result);
	}
	public function set_language(){
		$_SESSION['language']=$_POST['language'];
	}
	public function setLanguage(){
		$_SESSION['language']=$_POST['language'];
	}
	public function createVeriCode(){
		veri_code();
	}
	public function checkCode(){
		if(isset($_POST['code']) && strcasecmp($_POST['code'],$_SESSION['authcode'])==0){
			echo json_encode(array("result"=>"success","message"=>"Right Security code!"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"Wrong Security code!"));
		}
	}
	public function checkEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_email"=>$_POST['email'],"user_confirm_email"=>1))){
			echo json_encode(array("result"=>"notunique","message"=>"The email already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkEmailExist(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_email"=>$_POST['email']))){
			echo json_encode(array("result"=>"notunique","message"=>"The email already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	/*
	public function checkMerchantEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("merchant",array("merchant_email"=>$_POST['email']))){
			echo json_encode(array("result"=>"notunique","message"=>"该用户名已经存在"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}*/
	public function checkID(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("merchant_login_ID"=>$_POST['ID']))){
			echo json_encode(array("result"=>"notunique","message"=>"The user name already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function confirmEmail(){
//		!$this->commongetdata->checkUniqueAdvance("user","user_email",$_GET['email']);
		$condition['table']="user";
		$condition['where']=array("user_email"=>$_GET['email']);
		$condition['data']=array(
			"user_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result==1){
			$this->commongetdata->email($_GET['email'],$this->commongetdata->getWebsiteConfig("website_user_register_success_email_subject"),$this->commongetdata->getWebsiteConfig("website_user_register_success_email_message"));
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
		}
		else{
			$this->load->view('redirect',array("info"=>"failed!"));
		}
	}
	public function active(){
//		!$this->commongetdata->checkUniqueAdvance("user","user_email",$_GET['email']);
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array(
				'token'=>$_GET['verify'],
				'user_confirm_email'=>0
			)
		);
		$user=$this->commongetdata->getData($condition);
		if(sizeof($user)<1){
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"This token is error or this email has been verified!"));
			return false;
		}
		$user=$user[0];
		if(time()>$user->token_exptime){ //24hour 
			$msg = 'You activate the validity period is over, please login your account to resend the activation email.'; 
//			echo json_encode(array("result"=>"failed","message"=>$msg));
			$this->load->view('redirect',array("url"=>"/home/login","info"=>$msg));
			return false;
		}
		$condition['table']="user";
		$condition['where']=array("token"=>$_GET['verify']);
		$condition['data']=array(
			"user_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result==1){
			$this->commongetdata->email($user->user_email,$this->commongetdata->getWebsiteConfig("website_user_register_success_email_subject"),$this->commongetdata->getWebsiteConfig("website_user_register_success_email_message"));
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
		}
		else{
			$this->load->view('redirect',array("info"=>"failed!"));
		}
	}
	public function confirmMerchantEmail(){
//		!$this->commongetdata->checkUniqueAdvance("merchant","merchant_email",$_GET['email']);
		$condition['table']="merchant";
		$condition['where']=array("merchant_email"=>$_GET['email']);
		$condition['data']=array(
			"merchant_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"success"));
		else echo json_encode(array("result"=>"failed","message"=>"failed"));
	}
	public function sendEmail(){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array(
				'user_email'=>$_SESSION['userEmail'],
				'user_confirm_email'=>0
			)
		);
		$user=$this->commongetdata->getData($condition);
		if(sizeof($user)<1){
			echo json_encode(array("result"=>"failed","message"=>"This email doesn't exist or has been verified!"));
			return false;
		}
		$user=$user[0];
		$token=md5(($user->user_username).($user->user_pwd).time()); //创建用于激活识别码 
		$token_exptime = time()+60*60*24;//过期时间为24小时后
		$condition['table']="user";
		$condition['where']=array(
			"user_email"=>$_SESSION['userEmail']
		);
		$condition['data']=array(
			"token"=>$token,
			"token_exptime"=>$token_exptime
		);
		$result=$this->dbHandler->updateData($condition);
		$emailTitle=$this->commongetdata->getWebsiteConfig('website_confirm_email_title');
		$emailContent=$this->commongetdata->getWebsiteConfig('website_confirm_email_content');
		$this->commongetdata->email($_SESSION['userEmail'],$emailTitle,$emailContent.'<a href="aiimai.coolkeji.com/common/active?verify='.$token.'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		/*		if(){
			echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}*/
	}
	public function sendConfirmEmail(){
//		$this->commongetdata->email($_POST['userEmail'],,);
//		$_SESSION['userEmail']=$_POST['userEmail'];
//		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array(
				'user_email'=>$_POST['userEmail']
			)
		);
		$user=$this->commongetdata->getData($condition);
		if(sizeof($user)<1){
			echo json_encode(array("result"=>"failed","message"=>"This email doesn't exist!"));
			return false;
		}
		$user=$user[0];
		$token=md5(($user->user_username).($user->user_pwd).time()); //创建用于激活识别码 
		$token_exptime = time()+60*60*24;//过期时间为24小时后
		$condition['table']="user";
		$condition['where']=array(
			"user_email"=>$_POST['userEmail']
		);
		$condition['data']=array(
			"token"=>$token,
			"token_exptime"=>$token_exptime
		);
		$result=$this->dbHandler->updateData($condition);
		$emailTitle=$this->commongetdata->getWebsiteConfig('website_reset_password_title');
		$emailContent=$this->commongetdata->getWebsiteConfig('website_reset_password_content');
		$this->commongetdata->email($_POST['userEmail'],$emailTitle,$emailContent.'<br><a href="aiimai.coolkeji.com/home/createNewPassword?verify='.$token.'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
	}
	public function sendMerchantEmail(){
		$this->commongetdata->email($_SESSION['merchantEmail'],'Successfully Registered. | Confirm E-mail!','<a href="aiimai.coolkeji.com/common/confirmMerchantEmail?email='.$_SESSION['merchantEmail'].'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"success"));
	}
	public function reloadEmail(){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array('user_email'=>$_SESSION['merchantEmail'])
		);
		$merchant=$this->commongetdata->getOneData($condition);
		if($merchant->user_confirm_email==1)
			echo json_encode(array("result"=>"success","message"=>"Successfully Confirmed E-mail!"));
		else
			echo json_encode(array("result"=>"failed","message"=>"Failed Confirmed E-mail!"));
	}
	/*
	public function getSubCat(){
		$subCatId=$_POST['catId'];
		$subCats=$this->commongetdata->getSubSubCat($subCatId);
		echo json_encode($subCats);
	}*/
	public function exportExcel($title,$subject,$description,$header,$data){
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("AiiMai");
		$objPHPExcel->getProperties()->setLastModifiedBy("AiiMai");
		$objPHPExcel->getProperties()->setTitle($title);
		$objPHPExcel->getProperties()->setSubject($subject);
		$objPHPExcel->getProperties()->setDescription($description);
		$objPHPExcel->setActiveSheetIndex(0);
		//设值
		$letterArray=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		foreach($header as $index=>$field){
			$objPHPExcel->getActiveSheet()->setCellValue($letterArray[$index].'1',$field);
		}
		foreach($data as $key=>$value){
			foreach($value as $k=>$v){
				$objPHPExcel->getActiveSheet()->setCellValue($letterArray[$k].($key+2),$v);
			}
		}
		// Save Excel 2007 file
		//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		$fileName='uploads/'.$title.date("Ymd").'.xls';
		$objWriter->save($fileName);
//		$this->load->view('redirect',array("url"=>"/uploads/".$title.date("Ymd").".xls"));
		return '/'.$fileName;
	}
}