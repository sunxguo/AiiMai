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
	public function getBranch($bankId,$accountNumber){
		$bank=$this->commongetdata->getContent('bank',$bankId);
		if($bank->bank_accountNumberLength!=0 && strlen($accountNumber)!=$bank->bank_accountNumberLength){
			return false;
		}
		$branchCode=$bank->bank_branchCodeHead;
		$branchCode.=substr($accountNumber,0,$bank->bank_branchCodeBodyLength);
		$branchCode.=$bank->bank_branchCodeFoot;
		if($bank->bank_accountNumberRetainBranch==0){
			$accountNumber=substr($accountNumber,$bank->bank_branchCodeBodyLength+1);
		}
		$data=array(
			'branchCode'=>$branchCode,
			'accountNumber'=>$accountNumber
		);
		return $data;
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
			case "wishlist":
				if(!isset($_SESSION['userid'])){
					echo json_encode(array("result"=>"failed","message"=>"Please login first!"));
					return false;
				}
				$table="wishlist";
				$info=array(
					"wishlist_userid"=>$_SESSION['userid'],
					"wishlist_productid"=>$data->productId,
					"wishlist_time"=>date("Y-m-d H:i:s")
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
			case "bank":
				$table="bank";
				$info=array(
					"bank_name"=>$data->bankname,
					"bank_code"=>$data->bankcode,
					"bank_accountNumberLength"=>$data->accountNumberLength,
					"bank_branchCodeHead"=>$data->branchCodeHead,
					"bank_branchCodeBodyLength"=>$data->branchCodeBodyLength,
					"bank_accountNumberRetainBranch"=>$data->accountNumberRetainBranch,
					"bank_branchCodeFoot"=>'',
					"bank_order"=>$data->ordernumber,
					"bank_status"=>1,
					"bank_time"=>date("Y-m-d H:i:s")
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
			case "notice":
				$table="notice";
				$info=array(
					"notice_type"=>$data->type,
					"notice_title"=>$data->title,
					"notice_content"=>$data->content,
					"notice_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "comment":
				if(!isset($_SESSION['userid'])){
					echo json_encode(array("result"=>"failed","message"=>"Please login first!"));
					return false;
				}
				$table="comment";
				$info=array(
					"comment_author"=>$_SESSION['userid'],
					"comment_product_id"=>$data->productId,
					"comment_title"=>$data->title,
					"comment_content"=>$data->content,
					"comment_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "categoryGroup":
				$selectCondition=array(
					'table'=>'shopcategory',
					'result'=>'count',
					'where'=>array('shopcategory_merchant'=>$data->id,'shopcategory_fid'=>0)
				);
				$amount=$this->dbHandler->selectData($selectCondition);
				$table="shopcategory";
				$info=array(
					"shopcategory_merchant"=>$data->id,
					"shopcategory_fid"=>0,
					"shopcategory_name"=>$data->name,
					"shopcategory_order"=>$amount+1
				);
			break;
			case "mainCategory":
				$selectCondition=array(
					'table'=>'shopcategory',
					'result'=>'count',
					'where'=>array('shopcategory_merchant'=>$data->id,'shopcategory_fid'=>$data->fid)
				);
				$amount=$this->dbHandler->selectData($selectCondition);
				$table="shopcategory";
				$info=array(
					"shopcategory_merchant"=>$data->id,
					"shopcategory_fid"=>$data->fid,
					"shopcategory_name"=>$data->name,
					"shopcategory_order"=>$amount+1
				);
			break;
			case "product":
				$table="product";
				$imagesObject=$this->commongetdata->sortProductImage($data->productImgS1,$data->productImgS2,$data->productImgS3,$data->productImgS4);
				$info=array(
					"product_category"=>$data->MainCategory,
					"product_sub_category"=>$data->stSubCategory,
					"product_sub_sub_category"=>$data->ndSubCategory,
					"product_shopCategory"=>$data->shopCategory,
					"product_shopSubCategory"=>$data->shopSubCategory,
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
					"product_image_s1"=>$imagesObject->productImgS1,
					"product_image_s2"=>$imagesObject->productImgS2,
					"product_image_s3"=>$imagesObject->productImgS3,
					"product_image_s4"=>$imagesObject->productImgS4,
					"product_production_place_code"=>$data->ProductionPlaceCode,
					"product_production_place_detail"=>$data->ProductionPlaceDetail,
					"product_quantity"=>$data->Quantity,
					"product_available_period"=>$data->AvailablePeriod,
					"product_display_left"=>$data->Displayleftavailableperiod,
					"product_shipping_rate"=>1,
					"product_description"=>$data->description,
					"product_shipping_address"=>$data->shippingAddress,
					"product_merchant"=>$_SESSION['merchant_userid'],
					"product_time"=>date("Y-m-d H:i:s"),
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
				foreach($data->optionTypes as $key=>$optionType){
					$info['product_option'.($key+1)]=$optionType;
				}
			break;
			case "copyProduct":
				//查找商品
				foreach ($data->items as $value) {
					$product=$this->commongetdata->getContent('product',$value);
					$info=array(
						"product_category"=>$product->product_category,
						"product_sub_category"=>$product->product_sub_category,
						"product_sub_sub_category"=>$product->product_sub_sub_category,
						"product_shopCategory"=>$product->product_shopCategory,
						"product_shopSubCategory"=>$product->product_shopSubCategory,
						"product_sell_format"=>$product->product_sell_format,
						"product_delivery_type"=>$product->product_delivery_type,
						"product_item_condition"=>$product->product_item_condition,
						"product_item_title_zh_cn"=>$product->product_item_title_zh_cn,
						"product_item_title_tw_cn"=>$product->product_item_title_tw_cn,
						"product_item_title_english"=>$product->product_item_title_english,
						"product_short_title"=>$product->product_short_title,
						"product_sell_price"=>$product->product_sell_price,
						"product_reference_price"=>$product->product_reference_price,
						"product_seller_code"=>$product->product_seller_code,
						"product_adult"=>$product->product_adult,
						"product_image"=>$product->product_image,
						"product_image_s1"=>$product->product_image_s1,
						"product_image_s2"=>$product->product_image_s2,
						"product_image_s3"=>$product->product_image_s3,
						"product_image_s4"=>$product->product_image_s4,
						"product_production_place_code"=>$product->product_production_place_code,
						"product_production_place_detail"=>$product->product_production_place_detail,
						"product_quantity"=>$product->product_quantity,
						"product_available_period"=>$product->product_available_period,
						"product_display_left"=>$product->product_display_left,
						"product_shipping_rate"=>$product->product_shipping_rate,
						"product_description"=>$product->product_description,
						"product_shipping_address"=>$product->product_shipping_address,
						"product_merchant"=>$product->product_merchant,
						"product_time"=>date("Y-m-d H:i:s"),
						"product_modify_time"=>date("Y-m-d H:i:s")
					);
					$result=$this->dbHandler->insertData('product',$info);
				}
				echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
				return true;
				//添加商品
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
					"user_is_merchant"=>0,
					"user_reg_time"=>$time
				);
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
			case 'report':
				if(!isset($_SESSION['userid'])){
					echo json_encode(array("result"=>"failed","message"=>"Please login first!"));
					return false;
				}
				$table="report";
				$info=array(
					"report_product_id"=>$data->productId,
					"report_user_id"=>$_SESSION['userid'],
					"report_reason"=>$data->reason,
					"report_details"=>$data->details,
					"report_time"=>date("Y-m-d H:i:s")
				);
			break;
			case 'enquiry':
				if(!isset($_SESSION['userid'])){
					echo json_encode(array("result"=>"failed","message"=>"Please login first!"));
					return false;
				}
				$table="enquiry";
				$info=array(
					"enquiry_category"=>$data->category,
					"enquiry_product"=>$data->productId,
					"enquiry_user"=>$_SESSION['userid'],
					"enquiry_seller"=>$data->merchantId,
					"enquiry_subject"=>$data->subject,
					"enquiry_content"=>$data->content,
					"enquiry_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "category":
				$table="category";
				$selectCondition=array(
					'table'=>'category',
					'result'=>'count',
					'where'=>array('category_fid'=>$data->fid)
				);
				$amount=$this->dbHandler->selectData($selectCondition);
				$info=array(
					"category_fid"=>$data->fid,
					"category_name"=>$data->name,
					"category_order"=>$amount+1
				);
			break;
			case "groupBuy":
				$table="groupbuy";
				$info=array(
					"groupbuy_productId"=>$data->productCode,
					"groupbuy_productName"=>$data->productName,
					"groupbuy_price"=>$data->groupBuyPrice,
					"groupbuy_settlePrice"=>$data->settlePrice,
					"groupbuy_retailPrice"=>$data->retailPrice,
					"groupbuy_minQty"=>$data->minQty,
					"groupbuy_maxQty"=>$data->maxQty,
					"groupbuy_orderedQty"=>0,
					"groupbuy_startingTime"=>$data->startingTime,
					"groupbuy_endTime"=>$data->endTime,
					"groupbuy_registeredTime"=>date("Y-m-d H:i:s"),
					"groupbuy_canBuyNow"=>$data->canBuyNow,
					"groupbuy_availableDateType"=>$data->availableDateType,
					"groupbuy_merchantId"=>$data->merchantId,
					"groupbuy_autoAchieve"=>$data->autoAchieve
				);
			break;
			case 'address':
			/*	$notExist=$this->commongetdata->checkUniqueAdvance("address",array("address_userid"=>$data->userId,"address_type"=>$data->type));
				if($notExist){
					$table="address";
					$info=array("address_userid"=>$data->userId,"address_type"=>$data->type);
					$result=$this->dbHandler->insertData($table,$info);
				}*/
				$table="address";
				$info=array(
					"address_userid"=>$data->userId,
					"address_title"=>$data->title,
					"address_staffname"=>$data->staffname,
					"address_country"=>$data->country,
//					"address_area"=>$data->area,
					"address_detail"=>$data->detail,
					"address_mobilephone1"=>$data->mobilephone1,
					"address_mobilephone2"=>$data->mobilephone2,
					"address_mobilephone3"=>$data->mobilephone3,
					"address_type"=>$data->type,
					"address_phone1"=>$data->phone1,
					"address_phone2"=>$data->phone2,
					"address_phone3"=>$data->phone3
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
		if($_POST['info_type']=="merchant"){
			$userId=$this->dbHandler->insertDataReturnId($table,$info);
			$_SESSION['merchant_username']=$data->username;
			$_SESSION['merchant_userid']=$userId;
			$_SESSION['userEmail']=$data->email;
			$_SESSION['usertype']="merchant";
			if($userId!='') echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
			else echo json_encode(array("result"=>"failed","message"=>"Failed!"));
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
			$this->commongetdata->email($_SESSION['userEmail'],$emailTitle,$emailContent.'<a href="aiimai.coolkeji.com/common/active?verify='.$token.'">Confirm</a><br>If the button is invalid, please copy the following link to your browser\'s address bar!<br><span style="color:blue;">aiimai.coolkeji.com/common/active?verify='.$token.'</span>');
			
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
			case 'bank':
				$condition['table']="bank";
				$condition['where']=array("bank_id"=>$data->id);
			break;
			case 'item':
				$condition['table']="product";
				$condition['where']=array("product_id"=>$data->id);
			break;
			case 'categoryGroup':
				$condition['table']="shopcategory";
				$condition['where']=array("shopcategory_id"=>$data->id);
			break;
			case 'mainCategory':
				$condition['table']="shopcategory";
				$condition['where']=array("shopcategory_id"=>$data->id);
			break;
			case 'user':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
			break;
			case 'notice':
				$condition['table']="notice";
				$condition['where']=array("notice_id"=>$data->id);
			break;
			case 'address':
				$condition['table']="address";
				$condition['where']=array("address_id"=>$data->id);
			break;
			case 'merchant':
				$this->dbHandler->deleteData(array('table'=>'product','where'=>array('product_merchant'=>$data->id)));
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
			break;
			case 'order':
				$condition['table']="order";
				$condition['where']=array("order_id"=>$data->id);
			break;
			case 'comment':
				$condition['table']="comment";
				$condition['where']=array("comment_id"=>$data->id);
			break;
			case 'category':
				$selectCondition=array(
					'table'=>'category',
					'result'=>'data',
					'where'=>array('category_id'=>$data->id)
				);
				$currentCategory=$this->commongetdata->getOneData($selectCondition);
				$selectCondition=array(
					'table'=>'category',
					'result'=>'amount',
					'where'=>array('category_fid'=>$currentCategory->category_fid)
				);
				$amount=$this->dbHandler->selectData($selectCondition);
				for($i=$currentCategory->category_order+1;$i<=$amount;$i++){
					$updateCondition=array(
						'table'=>'category',
						'where'=>array('category_fid'=>$currentCategory->category_fid,'category_order'=>$i),
						'data'=>array('category_order'=>($i-1))
					);
					$result=$this->dbHandler->updateData($updateCondition);
				}
				
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->id);
			break;
		}
		$result=$this->dbHandler->deleteData($condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息删除失败"));
	}
	public function delBulkInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'users':
				$table="user";
				$where="user_id";
			break;
			case 'merchants':
				$table="user";
				$where="user_id";
			break;
			case 'items':
				$table="product";
				$where="product_id";
			break;
			case 'follows':
				$table="follow";
				$where="follow_id";
			break;
			case 'wishlists':
				$table="wishlist";
				$where="wishlist_id";
			break;
		}
		foreach($data->idArray as $id){
			$result=$this->dbHandler->deleteData(array("table"=>$table,"where"=>array($where=>$id)));
		}
		echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
	}
	public function updateBulkInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'items_available_period':
				$table="product";
				$where="product_id";
				$info=array(
					'product_available_period'=>$data->availablePeriod
				);
			break;
			case 'items_displayleft':
				$table="product";
				$where="product_id";
				$info=array(
					'product_display_left'=>$data->displayleft
				);
			break;
			case 'items_status':
				$table="product";
				$where="product_id";
				$info=array(
					'product_status'=>$data->status
				);
			break;
		}
		foreach($data->idArray as $id){
			$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array($where=>$id),"data"=>$info));
		}
		echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
	}
			
	public function modifyBulkDisplayCategoriesInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'itemsFocus':
				$table="product";
				$where="product_merchant";
				$this->dbHandler->updateData(array("table"=>$table,"where"=>array("product_merchant"=>$_SESSION['merchant_userid']),"data"=>array("product_focus"=>0)));
				foreach($data->idArray as $id){
					$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array("product_id"=>$id),"data"=>array("product_focus"=>1)));
				}
			break;
			case 'displayCategories':
				$table="category";
				$where="category_id";
				foreach ($data->displayCategoriesArray as $id) {
					$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array($where=>$id),"data"=>array("category_featured"=>1)));
				}
				foreach ($data->notDisplaycategoriesArray as $id) {
					$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array($where=>$id),"data"=>array("category_featured"=>0)));
				}
			break;
		}
		echo json_encode(array("result"=>"success","message"=>"Success"));
	}
	public function modifyBulkInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'itemsFocus':
				$table="product";
				$where="product_merchant";
				$this->dbHandler->updateData(array("table"=>$table,"where"=>array("product_merchant"=>$_SESSION['merchant_userid']),"data"=>array("product_focus"=>0)));
				foreach($data->idArray as $id){
					$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array("product_id"=>$id),"data"=>array("product_focus"=>1)));
				}
			break;
		}
		echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
	}
	/*
	public function orderInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'category':
				$table="category";
				$currentOrder=$data->orderNO;
				$direction=$data->orderDirection;
				$where=array("category_id"=>$data->id);
			break;
		}
		$selectCondition=array(
			'table'=>'category',
			'result'=>'count',
			'where'=>array('category_fid'=>$data->fid)
		);
		$amount=$this->dbHandler->selectData($selectCondition);
		foreach($data->idArray as $id){
			$result=$this->dbHandler->deleteData(array("table"=>$table,"where"=>array($where=>$id)));
		}
		echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
			
	}*/
	public function statusBulkInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($_POST['info_type']){
			case 'users':
				$table="user";
				$where="user_id";
				$statusField="user_state";
			break;
			case 'items':
				$table="product";
				$where="product_id";
				$statusField="product_status";
			break;
			case 'merchants':
				$table="user";
				$where="user_id";
				$statusField="merchant_status";
			break;
		}
		foreach($data->idArray as $id){
			$result=$this->dbHandler->updateData(array("table"=>$table,"where"=>array($where=>$id),"data"=>array($statusField=>$data->status)));
		}
		echo json_encode(array("result"=>"success","message"=>"信息修改成功"));
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
			case "bank":
				$condition['table']="bank";
				$condition['where']=array("bank_id"=>$data->id);
				$condition['data']=array(
					"bank_name"=>$data->bankname,
					"bank_code"=>$data->bankcode,
					"bank_accountNumberLength"=>$data->accountNumberLength,
					"bank_branchCodeHead"=>$data->branchCodeHead,
					"bank_branchCodeBodyLength"=>$data->branchCodeBodyLength,
					"bank_accountNumberRetainBranch"=>$data->accountNumberRetainBranch,
					"bank_order"=>$data->ordernumber,
					//"bank_status"=>1,
					"bank_time"=>date("Y-m-d H:i:s")
				);
			break;		
			case "notice":
				$condition['table']="notice";
				$condition['where']=array("notice_id"=>$data->id);
				$condition['data']=array(
					"notice_type"=>$data->type,
					"notice_title"=>$data->title,
					"notice_content"=>$data->content,
					"notice_time"=>date("Y-m-d H:i:s")
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
				$imagesObject=$this->commongetdata->sortProductImage($data->productImgS1,$data->productImgS2,$data->productImgS3,$data->productImgS4);
				$condition['table']="product";
				$condition['where']=array("product_id"=>$data->id);
				$condition['data']=array(
					"product_category"=>$data->MainCategory,
					"product_sub_category"=>$data->stSubCategory,
					"product_sub_sub_category"=>$data->ndSubCategory,
					"product_shopCategory"=>$data->shopCategory,
					"product_shopSubCategory"=>$data->shopSubCategory,
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
					"product_image_s1"=>$imagesObject->productImgS1,
					"product_image_s2"=>$imagesObject->productImgS2,
					"product_image_s3"=>$imagesObject->productImgS3,
					"product_image_s4"=>$imagesObject->productImgS4,
					"product_production_place_code"=>$data->ProductionPlaceCode,
					"product_production_place_detail"=>$data->ProductionPlaceDetail,
					"product_quantity"=>$data->Quantity,
					"product_available_period"=>$data->AvailablePeriod,
					"product_display_left"=>$data->Displayleftavailableperiod,
					"product_shipping_rate"=>1,
					"product_description"=>$data->description,
//					"product_shipping_address"=>$data->shippingAddress,
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "merchantInfo":
				$merchant=$this->commongetdata->getOneData(array(
					'table'=>'user',
					'result'=>'data',
					'where'=>array("user_username"=>$_SESSION['merchant_username'])
				));
				if($merchant->user_confirm_email!=1){
					echo json_encode(array("result"=>"notConfirmEmail","message"=>"Failed Confirmed E-mail!"));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("user_username"=>$_SESSION['merchant_username']);
				$condition['data']=array(
					"merchant_type"=>$data->merchantType,
					"merchant_name"=>$data->name,
//					"merchant_login_ID"=>$data->ID,
					"merchant_phone1"=>$data->phone1,
					"merchant_phone2"=>$data->phone2,
					"merchant_phone3"=>$data->phone3,
					"merchant_homephone1"=>$data->homephone1,
					"merchant_homephone2"=>$data->homephone2,
					"merchant_homephone3"=>$data->homephone3,
					"merchant_address1"=>$data->address1,
					"merchant_address2"=>$data->address2,
					"merchant_salesStaff"=>$data->salesStaff,
					"merchant_salesStaff_email"=>$data->salesStaffEmail,
					"merchant_salesStaff_phone1"=>$data->salesStaffPhone1,
					"merchant_salesStaff_phone2"=>$data->salesStaffPhone2,
					"merchant_salesStaff_phone3"=>$data->salesStaffPhone3,
					"merchant_salesStaff_mobilephone1"=>$data->salesStaffMobilePhone1,
					"merchant_salesStaff_mobilephone2"=>$data->salesStaffMobilePhone2,
					"merchant_salesStaff_mobilephone3"=>$data->salesStaffMobilePhone3,
					"merchant_business_license"=>$data->businessLicense,
					"merchant_business_license_msg"=>'Register',
					"merchant_bank_account"=>$data->bankAccount,
					"merchant_bank_account_msg"=>'Register',
//					"merchant_doc"=>$data->doc,
					"user_is_merchant"=>0,
					"merchant_status"=>0
				);
			break;
			case 'merchantInfoStep3':
				$branch=$this->getBranch($data->bank,$data->accountNumber);
				if(!$branch){
					echo json_encode(array("result"=>"failed","message"=>"The account number does not match the chosen Bank’s specifications.\nPlease review the following;\n•	Choose the correct Bank\n•	Check the account number entered is correct\nIf uncertain if your account belongs to DBS / POSBank, please contact contact DBS for assistance. POSBank accounts have 9 digits, and DBS accounts usually have 10 digits."));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("user_username"=>$_SESSION['merchant_username']);
				$condition['data']=array(
					"merchant_bank"=>$data->bank,
					"merchant_bank_branch"=>$branch['branchCode'],
					"merchant_bank_account_number"=>$branch['accountNumber'],
					"merchant_gst_name"=>$data->GSTName,
					"merchant_gst_number"=>$data->GSTRegistrationNo,
					"merchant_gst_address"=>$data->GSTAddress,
					"user_is_merchant"=>1,
					"merchant_status"=>1
				);
			break;
			case "merchantAllInfo":
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"user_email"=>$data->email,
					"user_username"=>$data->username,
					"user_gender"=>$data->gender,
					"user_country"=>$data->country,
					"user_birthday"=>$data->birthday,
					"merchant_name"=>$data->name,
					"merchant_type"=>$data->merchantType,
					"merchant_phone1"=>$data->phone1,
					"merchant_phone2"=>$data->phone2,
					"merchant_phone3"=>$data->phone3,
					"merchant_homephone1"=>$data->homephone1,
					"merchant_homephone2"=>$data->homephone2,
					"merchant_homephone3"=>$data->homephone3,
					"merchant_address1"=>$data->address1,
					"merchant_address2"=>$data->address2,
					"merchant_salesStaff"=>$data->salesStaff,
					"merchant_salesStaff_email"=>$data->salesStaffEmail,
					"merchant_salesStaff_phone1"=>$data->salesStaffPhone1,
					"merchant_salesStaff_phone2"=>$data->salesStaffPhone2,
					"merchant_salesStaff_phone3"=>$data->salesStaffPhone3,
					"merchant_salesStaff_mobilephone1"=>$data->salesStaffMobilePhone1,
					"merchant_salesStaff_mobilephone2"=>$data->salesStaffMobilePhone2,
					"merchant_salesStaff_mobilephone3"=>$data->salesStaffMobilePhone3,
					"merchant_business_license"=>$data->businessLicense,
					"merchant_bank_account"=>$data->bankAccount,
//					"merchant_bank"=>$data->bank,
//					"merchant_bank_branch"=>$data->bankBranch,
//					"merchant_bank_account_number"=>$data->accountNumber,
					"merchant_gst_name"=>$data->GSTName,
					"merchant_gst_number"=>$data->GSTRegistrationNo,
					"merchant_gst_address"=>$data->GSTAddress,
				);
				if(isset($data->bank)) {
					$branch=$this->getBranch($data->bank,$data->accountNumber);
					if(!$branch){
						echo json_encode(array("result"=>"failed","message"=>"The account number does not match the chosen Bank’s specifications.\nPlease review the following;\n•	Choose the correct Bank\n•	Check the account number entered is correct\nIf uncertain if your account belongs to DBS / POSBank, please contact contact DBS for assistance. POSBank accounts have 9 digits, and DBS accounts usually have 10 digits."));
						return false;
					}
					$condition['data']["merchant_bank"]=$data->bank;
					$condition['data']["merchant_bank_branch"]=$branch['branchCode'];
					$condition['data']["merchant_bank_account_number"]=$branch['accountNumber'];
				}
			break;
			case 'merchantpwd':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
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
			case 'facebookMerchantpwd':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
				$condition['result']="data";
				$merchantInfo=$this->commongetdata->getOneData($condition);
				$condition['data']=array(
					"user_pwd"=>MD5("MonkeyKing".$data->newpwd)
				);
			break;
			case 'merchantBusinessLicense':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
				$condition['data']=array(
					"merchant_business_license"=>$data->src,
					"merchant_business_license_msg"=>$data->Msg,
				);
			break;
			case 'merchantBankbook':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
				$condition['data']=array(
					"merchant_bank_account"=>$data->src,
					"merchant_bank_account_msg"=>$data->Msg,
				);
			break;
			case 'GstInfo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
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
			case 'categoryFormat':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_category_type"=>$data->type
				);
			break;
			case 'categoryTarget':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_category_target"=>$data->type
				);
			break;
			case 'categoryGroup':
				$condition['table']="shopcategory";
				$condition['where']=array("shopcategory_id"=>$data->id);
				$condition['data']=array(
					"shopcategory_name"=>$data->name
				);
			break;
			case 'mainCategory':
				$condition['table']="shopcategory";
				$condition['where']=array("shopcategory_id"=>$data->id);
				$condition['data']=array(
					"shopcategory_name"=>$data->name
				);
			break;
			case 'userInfo':
				$user=$this->commongetdata->getOneData(array("table"=>'user',"result"=>'data',"where"=>array("user_username"=>$data->username)));
				if(isset($user->user_id) && $user->user_id!=$data->id){
					echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"user_avatar"=>$data->avatar,
					"user_username"=>$data->username,
					"user_email"=>$data->email,
					"user_phone"=>$data->phone,
					"user_state"=>$data->status,
					"user_birthday"=>$data->birthday,
					"user_gender"=>$data->gender
				);
			break;
			case 'userInfoByAdmin':
				$user=$this->commongetdata->getOneData(array("table"=>'user',"result"=>'data',"where"=>array("user_username"=>$data->username)));
				if(isset($user->user_id) && $user->user_id!=$data->id){
					echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
//					"user_avatar"=>$data->avatar,
					"user_username"=>$data->username,
					"user_email"=>$data->email,
					"user_country"=>$data->country,
					"user_state"=>$data->status,
					"user_birthday"=>$data->birthday,
					"user_gender"=>$data->gender,
					"merchant_phone1"=>$data->phone1,
					"merchant_phone2"=>$data->phone2,
					"merchant_phone3"=>$data->phone3,
					"merchant_homephone1"=>$data->homephone1,
					"merchant_homephone2"=>$data->homephone2,
					"merchant_homephone3"=>$data->homephone3
				);
			break;
			case 'merchantStatus':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_status"=>$data->status
				);
			break;
			case 'shopFocusOn':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_focus_on"=>$data->on
				);
			break;
			case 'shopBannerOn':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_banner_on"=>$data->on
				);
			break;
			case 'shopMainAdvertisementOn':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_mainAdvertisement_on"=>$data->on
				);
			break;
			case 'shopSecondaryAdvertisementOn':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_secondaryAdvertisement_on"=>$data->on
				);
			break;
			
			case 'shopItemListOn':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_itemlist_on"=>$data->on
				);
			break;

			case "mainAdvertisementHyperlink":
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_mainAdvertisementHyperlink"=>$data->link,
					"merchant_shop_mainAdvertisementHyperlink_on"=>$data->on
				);
			break;
			case "secondaryAdvertisementHyperlink":
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_secondaryAdvertisementHyperlink"=>$data->link,
					"merchant_shop_secondaryAdvertisementHyperlink_on"=>$data->on
				);
			break;
			case 'categoryGroupBar':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_showCategoryGroupBar"=>$data->show
				);
			break;
			case 'subCategories':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_showSubCategories"=>$data->show
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
				$newCondition=array();
				$newCondition['table']="user";
				$newCondition['where']=array("token"=>$data->verify);
				$newCondition['data']=array(
					"user_pwd"=>MD5("MonkeyKing".$data->newpwd),
					"user_confirm_email"=>1
				);
				$result=$this->dbHandler->updateData($newCondition);
				if($result>0){
					$this->commongetdata->email($user->user_email,$this->commongetdata->getWebsiteConfig("website_reset_password_success_subject"),$this->commongetdata->getWebsiteConfig("website_reset_password_success_content"));
//					$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
					echo json_encode(array("result"=>"success","message"=>'Password is changed successfully!'));
				}
				else{
					echo json_encode(array("result"=>"failed","message"=>'Failed. You cannot re-use an old password or your email has not been verified!'));
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
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
				$condition['data']=array(
					"merchant_shop_".$data->position."img"=>$data->image
				);
			break;
			case 'shopInfo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$_SESSION['merchant_userid']);
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
			case 'proStatus':
				$condition['table']="product";
				$condition['where']=array("product_id"=>$data->id);
				$condition['data']=array(
					"product_status"=>$data->status
				);
			break;
			case 'personalGender':
				$condition['table']="user";
				$userId='';
				if(isset($_SESSION['userid'])){
					$userId==$_SESSION['userid'];
				}else{
					$userId==$_SESSION['merchant_userid'];
				}
				$condition['where']=array("user_id"=>$userId);
				$condition['data']=array(
					"user_gender"=>$data->gender
				);
			break;
			case 'personalContactsPhone':
				$condition['table']="user";
				$userId='';
				if(isset($_SESSION['userid'])){
					$userId==$_SESSION['userid'];
				}else{
					$userId==$_SESSION['merchant_userid'];
				}
				$condition['where']=array("user_id"=>$userId);
				$condition['data']=array(
					"merchant_homephone1"=>$data->contactsPhone1,
					"merchant_homephone2"=>$data->contactsPhone2,
					"merchant_homephone3"=>$data->contactsPhone3,
					"merchant_phone1"=>$data->contactsMobilephone1,
					"merchant_phone2"=>$data->contactsMobilephone2,
					"merchant_phone3"=>$data->contactsMobilephone3,
				);
			break;
			case 'personalBirthday':
				$condition['table']="user";
				$userId='';
				if(isset($_SESSION['userid'])){
					$userId==$_SESSION['userid'];
				}else{
					$userId==$_SESSION['merchant_userid'];
				}
				$condition['where']=array("user_id"=>$userId);
				$condition['data']=array(
					"user_birthday"=>$data->birthday
				);
			break;
			case 'sellerShopTitle':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_name"=>$data->title
				);
			break;
			case 'sellerShopWelcome':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_welcome"=>$data->welcome
				);
			break;
			case 'mainLogo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_icon"=>$data->src
				);
			break;
			case 'smallLogo':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_smallicon"=>$data->src
				);
			break;
			case 'shopAddress':
				$isUnique=$this->commongetdata->checkUniqueAdvance('user',array("merchant_shop_address"=>$data->address));
				if(!$isUnique){
					echo json_encode(array("result"=>"failed","message"=>"This address already exists！"));
					return false;
				}
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_address"=>$data->address
				);
			break;
			case 'affiliateProgram':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_shop_affiliate_program"=>$data->join
				);
			break;
			case 'salesStaffName':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_salesStaff"=>$data->name
				);
			break;
			case 'salesStaffEmail':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_salesStaff_email"=>$data->email
				);
			break;
			case 'salesStaffMobilePhone':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_salesStaff_mobilephone1"=>$data->salesStaffMobilePhone1,
					"merchant_salesStaff_mobilephone2"=>$data->salesStaffMobilePhone2,
					"merchant_salesStaff_mobilephone3"=>$data->salesStaffMobilePhone3
				);
			break;
			case 'salesStaffPhone':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_salesStaff_phone1"=>$data->salesStaffPhone1,
					"merchant_salesStaff_phone2"=>$data->salesStaffPhone2,
					"merchant_salesStaff_phone3"=>$data->salesStaffPhone3
				);
			break;
			case 'salesStaffFax':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_salesStaff_faxnumber1"=>$data->salesStaffFax1,
					"merchant_salesStaff_faxnumber2"=>$data->salesStaffFax2,
					"merchant_salesStaff_faxnumber3"=>$data->salesStaffFax3
				);
			break;
			case 'deliveryCompany':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_delivery_company"=>$data->company
				);
			break;
			case 'mobilePhone':
				$condition['table']='user';
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"user_phoneNation"=>$data->nation,
					"user_phone"=>$data->mobile
				);
			break;
			case 'orderAlert':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_order_alert_isemail"=>$data->isEmail,
					"merchant_order_alert_issms"=>$data->isSMS,
					"merchant_order_alert_email"=>$data->email
				);
			break;
			case 'isSendingNotifyMail':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_is_sending_notify_mail"=>$data->isSendingNotifyMail
				);
			break;
			case 'eticketPassword':
				$condition['table']="user";
				$condition['where']=array("user_id"=>$data->id);
				$condition['data']=array(
					"merchant_eticket_password"=>$data->eticketPassword
				);
			break;
			case 'displayCat':
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->id);
				$condition['data']=array(
					"category_featured"=>$data->display
				);
			break;
			case 'featuredProduct':
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->catId);
				$condition['data']=array(
					"category_home_title".$data->position=>$data->title,
					"category_home_link".$data->position=>$data->link,
					"category_home_img".$data->position=>$data->image,
				);
			break;
			case 'category':
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->id);
				$condition['data']=array(
					"category_name"=>$data->name
				);
			break;
			case 'movecategory':
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->id);
				$condition['data']=array(
					"category_fid"=>$data->fid
				);
				//更新之下的商品

			break;
			case 'categoryOrder':
				$selectCondition=array(
					'table'=>'category',
					'result'=>'data',
					'where'=>array('category_id'=>$data->id)
				);
				$currentCategory=$this->commongetdata->getOneData($selectCondition);
				$order=$currentCategory->category_order;
				
				$condition['table']="category";
				$condition['where']=array("category_id"=>$data->id);
				$condition['data']=array(
					"category_order"=>$data->direction=='up'?($order-1):($order+1)
				);
				
				$updateCondition=array(
					'table'=>'category',
					'result'=>'data',
					'where'=>array(
						'category_fid'=>$currentCategory->category_fid,
						'category_order'=>$data->direction=='up'?$order-1:$order+1
					),
					'data'=>array('category_order'=>$order)
				);
				$result=$this->dbHandler->updateData($updateCondition);
			break;
			case 'categoryDragbk':
				$idList=$data->idList;
				$category=$this->commongetdata->getContent('category',$idList[0]);
				$fCategory=$this->commongetdata->getContent('category',$category->category_fid);
				if(!isset($fCategory->category_id) || $fCategory->category_fid!=0){
					echo json_encode(array("result"=>"failed","message"=>"Failed to modify.The first category is error !"));
					return false;
				}
				$subCatOrder=1;
				$subCatId=0;
				$subSubCatOrder=1;
				foreach($idList as $key=>$categoryId){
					$category=$this->commongetdata->getContent('category',$categoryId);
					$category=get_object_vars($category);
					$fCategory=$this->commongetdata->getContent('category',$category['category_fid']);
					unset($category['category_id']);
					//insert new catgory
					if($fCategory->category_fid==0){
						$category['category_order']=$subCatOrder;
						$subCatOrder++;
						$subSubCatOrder=1;
					}else{
						$category['category_order']=$subSubCatOrder;
						$category['category_fid']=$subCatId;
						$subSubCatOrder++;
					}
					
					$newCategoryId=$this->dbHandler->insertDataReturnId('category',$category);
					if($fCategory->category_fid==0) $subCatId=$newCategoryId;
					//delete old category
					$this->dbHandler->deleteData(array('table'=>'category','where'=>array('category_id'=>$categoryId)));
					
					//move products in old category to new category
					
/*					if(isset($fCategory->category_id)){
						if($fCategory->category_fid==0){
							$categoryName=;
						}
						else{
							
						}
					}else{
						
					}
					if(){
						$categoryName=;
					}
					$this->dbHandler->updateData(array('table'=>'product','where'=>array('product_sub_category'=>$data->topId,'product_category'=>)));*/
				}
				return true;
			break;
			case 'categoryDrag':
				$idList=$data->idList;
				// $fatherCategoryId=$data->topId;
				// $fCategory=$this->commongetdata->getContent('category',$fatherCategoryId);
				foreach($idList as $key=>$categoryId){
					$condition['table']="category";
					$condition['where']=array("category_id"=>$categoryId);
					$condition['data']=array(
						"category_order"=>$key
					);
					$result=$this->dbHandler->updateData($condition);
				}
				return true;
			break;
			case 'address':
				$condition['table']="address";
				$condition['where']=array("address_id"=>$data->id);
				$condition['data']=array(
					"address_title"=>$data->title,
					"address_staffname"=>$data->staffname,
					"address_country"=>$data->country,
//					"address_area"=>$data->area,
					"address_detail"=>$data->detail,
					"address_type"=>$data->type,
					"address_mobilephone1"=>$data->mobilephone1,
					"address_mobilephone2"=>$data->mobilephone2,
					"address_mobilephone3"=>$data->mobilephone3,
					"address_phone1"=>$data->phone1,
					"address_phone2"=>$data->phone2,
					"address_phone3"=>$data->phone3
				);
			break;
			
			case "groupBuy":
				$condition['table']="groupbuy";
				$condition['where']=array("groupbuy_id"=>$data->id);
				$condition['data']=array(
					"groupbuy_productId"=>$data->productCode,
					"groupbuy_productName"=>$data->productName,
					"groupbuy_price"=>$data->groupBuyPrice,
//					"groupbuy_settlePrice"=>$data->settlePrice,
					"groupbuy_retailPrice"=>$data->retailPrice,
					"groupbuy_minQty"=>$data->minQty,
					"groupbuy_maxQty"=>$data->maxQty,
					"groupbuy_startingTime"=>$data->startingTime,
					"groupbuy_endTime"=>$data->endTime,
					"groupbuy_canBuyNow"=>$data->canBuyNow,
//					"groupbuy_availableDateType"=>$data->availableDateType,
					"groupbuy_merchantId"=>$data->merchantId,
					"groupbuy_autoAchieve"=>$data->autoAchieve
				);
			break;
		}
		if($_POST['info_type']!='userNewPwd'){
			$result=$this->dbHandler->updateData($condition);
			if($result==1){
				echo json_encode(array("result"=>"success","message"=>"Successfully Modify!"));
				if($_POST['info_type']=='merchantStatus' && $data->ifSendEmail==true){
					$merchant=$this->commongetdata->getContent('user',$data->id);
					/*$statusArray=$this->commongetdata->getMerchantStatus();
					$statusArray[$data->status]*/
					$subject=$this->commongetdata->getWebsiteConfig('website_seller_approval_email_title'.$data->status);
					$subject=str_replace("{USERNAME}",$merchant->user_username,$subject);
					$content=$this->commongetdata->getWebsiteConfig('website_seller_approval_email_content'.$data->status);
					$content=str_replace("{USERNAME}",$merchant->user_username,$content);
					$this->commongetdata->email($merchant->user_email,$subject,$content);
				}
			}
			else echo json_encode(array("result"=>"failed","message"=>"Failed to modify.May be because some fields is the same as the before!"));
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
			case 'shopSubCat':
				$result=$this->commongetdata->getShopSubCategory($data->merchantid,$data->fid);
			break;
			case 'product':
				$cat=$data->MainCategory==-1?false:$data->MainCategory;
				$sCat=$data->stSubCategory==-1?false:$data->stSubCategory;
				$ssCat=$data->ndSubCategory==-1?false:$data->ndSubCategory;
				$shopMainCat=$data->shopMainCategory==-1?false:$data->shopMainCategory;
				$shopStSubCat=$data->shopStSubCategory==-1?false:$data->shopStSubCategory;
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
				if($data->orderField!=''){
					$order=array("field"=>$data->orderField,"type"=>$data->direction);
				}else{
					$order=array("field"=>"product_modify_time","type"=>'DESC');
				}
				
				$groupBuy=$data->groupbuy==1?true:false;
				$outStock=$data->stock==0?true:false;
				$result=$this->commongetdata->getProducts($_SESSION['merchant_userid'],$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order,$groupBuy,$outStock,$shopMainCat,$shopStSubCat);


				$categories=$this->commongetdata->getCategories(true);
				$status=$this->commongetdata->getProductStatus();
				$listingType=$this->commongetdata->getProductListingType();
				$deliveryType=$this->commongetdata->getProductDeliveryType();


				foreach ($result as $key => $value) {
					$value->product_category=isset($categories[$value->product_category])?$categories[$value->product_category]->category_name:'Deleted';
					$value->product_sub_category=isset($categories[$value->product_sub_category])?$categories[$value->product_sub_category]->category_name:'Deleted';
					$value->product_sub_sub_category=isset($categories[$value->product_sub_sub_category])?$categories[$value->product_sub_sub_category]->category_name:'Deleted';
					$value->product_status=$status[$value->product_status];
					$value->product_sell_format=$listingType[$value->product_sell_format];
					$value->product_delivery_type=$deliveryType[$value->product_delivery_type];
				}
			break;
			case 'products':
				$parameters=array(
					'result'=>'data',
					'merchant'=>$data->merchantId,
					'orderBy'=>array('product_modify_time'=>'DESC')
				);
				if(isset($data->MainCategory)) $parameters['category']=$data->MainCategory;
				if(isset($data->stSubCategory)) $parameters['subCategory']=$data->stSubCategory;
				if(isset($data->ndSubCategory)) $parameters['subSubCategory']=$data->ndSubCategory;
				if(isset($data->title)) $parameters['like']=array('product_item_title_english'=>$data->title);
				
				$result=$this->commongetdata->getProductsAdvance($parameters);
			break;
			case 'merchantList':
				$parameters=array(
					'result'=>'data',
					'like'=>array('user_username'=>$data->likeUsername)
				);
				$result=$this->commongetdata->getMerchantsAdvance($parameters);
			break;
			case 'groupBuy':
				$parameters=array(
					'result'=>'data',
					'merchant'=>$data->merchantId,
					'orderBy'=>array('groupbuy_registeredTime'=>'DESC')
				);
				if($data->name!='') $parameters['like']=array('groupbuy_productName'=>$data->name);
				if(isset($data->status)){
					switch ($data->status) {
						case 'inPreparation':
							$parameters['inPreparation']=array('startingTime'=>date("Y-m-d H:i:s"));
							break;
						case 'inProgress':
							$parameters['inProgress']=array('startingTime'=>date("Y-m-d H:i:s"),'endTime'=>date("Y-m-d H:i:s"));
							break;
						case 'ended':
							$parameters['ended']=array('endTime'=>date("Y-m-d H:i:s"));
							break;
						
						default:
							# code...
							break;
					}
					
				} 
				$result=$this->commongetdata->getGroupBuyAdvance($parameters);
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
				$merchant=isset($data->merchant)?$data->merchant:$_SESSION['merchant_userid'];
				$result=$this->commongetdata->getOrdersByDay($startDate,$days,$merchant,true,'short',29);
			break;
			case 'addressList':
				$condition=array(
					'table'=>'address',
					'result'=>'data',
					'where'=>array(
						'address_userid'=>$data->userId,
						'address_type'=>$data->type
					));
				$result=$this->commongetdata->getData($condition);
				
			break;
			case 'address':
				$condition=array(
					'table'=>'address',
					'result'=>'data',
					'where'=>array(
						'address_id'=>$data->id
					));
				$result=$this->commongetdata->getOneData($condition);
				
			break;
			case 'mainCategory':
				$condition=array(
					'table'=>'shopcategory',
					'result'=>'data',
					'where'=>array(
						'shopcategory_merchant'=>$data->merchantId,
						'shopcategory_fid'=>$data->fid
					),
					'order_by'=>array('shopcategory_order'=>'ASC')
				);
				$result=$this->commongetdata->getData($condition);
			break;
			case 'optionData':
				$condition=array(
					'table'=>'product_option',
					'result'=>'data',
					'where'=>array(
						'product_option_product_id'=>$data->productId
					)
				);
				if(property_exists($data, 'option1')){
					$condition['where']['product_option_1'] = $data->option1;
				}
				if(property_exists($data, 'option2')){
					$condition['where']['product_option_2'] = $data->option2;
				}
				if(property_exists($data, 'option3')){
					$condition['where']['product_option_3'] = $data->option3;
				}
				$result=$this->commongetdata->getData($condition);
			break;
			case 'optionStock':
				$condition=array(
					'table'=>'product_option',
					'result'=>'data',
					'where'=>array(
						'product_option_product_id'=>$data->productId
					)
				);
				if(property_exists($data, 'option1')){
					$condition['where']['product_option_1'] = $data->option1;
				}
				if(property_exists($data, 'option2')){
					$condition['where']['product_option_2'] = $data->option2;
				}
				$optionData=$this->commongetdata->getData($condition);
				$optionArray=array();
				foreach($optionData as $option){
					if($option->product_option_3!=''){
						$optionArray[$option->product_option_3]=$option->product_option_stock;
					}else if($option->product_option_2!=''){
						$optionArray[$option->product_option_2]=$option->product_option_stock;
					}else if($option->product_option_1!=''){
						$optionArray[$option->product_option_1]=$option->product_option_stock;
					}
				}
				$result = $optionArray;
			break;
		}
		echo json_encode(array("result"=>"success","message"=>$result));
	}
	/*
	Array
	(
		[0] => Array
			(
				[0] => Main Category
				[1] => 1st Sub Category
				[2] => 2nd Sub Category
				[3] => Sell Format
				[4] => Delivery Type
				[5] => Item Condition
				[6] => Item Title
				[7] => Seller Code
				[8] => Country of Manufacture
				[9] => Country of Manufacture Detail
				[10] => Adult Item
				[11] => Sell Price (S$)
				[12] => Quantity
				[13] => Available Period
				[14] => Retail Price (S$)
				[15] => Display Expiring Alert
				[16] => Shipping Address
			)

		[1] => Array
			(
				[0] => 1
				[1] => 1
				[2] => 1
				[3] => 1
				[4] => 1
				[5] => 1
				[6] => Test Product Tile
				[7] => 
				[8] => 1
				[9] => 
				[10] => 
				[11] => 12
				[12] => 100
				[13] => 100
				[14] => 22
				[15] => 0
				[16] => 
			)

	)*/
	public function uploadInfo(){
		$data=json_decode($_POST['data']);
		$result=array();
		switch($_POST['info_type']){
			case 'csv':
				$websiteUrl=$this->commongetdata->getWebsiteConfig('website_url');
				$file = fopen($websiteUrl.$data->src,'r'); 
				$itemList=array();
				$head=fgetcsv($file);
				while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
					//print_r($data); //此为一个数组，要获得每一个数据，访问数组下标即可
					$table="product";
					$info=array(
						"product_category"=>$data[0],
						"product_sub_category"=>$data[1],
						"product_sub_sub_category"=>$data[2],
						"product_sell_format"=>$data[3],
						"product_delivery_type"=>$data[4],
						"product_item_condition"=>$data[5],
						"product_item_title_zh_cn"=>'',
						"product_item_title_tw_cn"=>'',
						"product_item_title_english"=>$data[6],
						"product_short_title"=>'',
						"product_sell_price"=>$data[11],
						"product_reference_price"=>$data[14],
						"product_seller_code"=>$data[7],
						"product_adult"=>$data[10],
						"product_image"=>$data[17],
						"product_image_s1"=>$data[18],
						"product_image_s2"=>$data[19],
						"product_image_s3"=>$data[20],
						"product_image_s4"=>$data[21],
						"product_production_place_code"=>$data[8],
						"product_production_place_detail"=>$data[9],
						"product_quantity"=>$data[12],
						"product_available_period"=>$data[13],
						"product_display_left"=>$data[15],
						"product_shipping_rate"=>1,
						"product_description"=>$data[22],
						"product_shipping_address"=>$data[16],
						"product_merchant"=>$_SESSION['merchant_userid'],
						"product_time"=>date("Y-m-d H:i:s"),
						"product_modify_time"=>date("Y-m-d H:i:s")
					);
					$result=$this->dbHandler->insertData($table,$info);
				 }
				 fclose($file);
			break;
		}
		if($result==1)echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function dragItemInfo(){
		$data=json_decode($_POST['data']);
		$result=array();
		switch($_POST['info_type']){
			case 'shopCategoryDrag':
				foreach($data->idList as $key=>$id){
					$condition['table']="shopcategory";
					$condition['where']=array("shopcategory_id"=>$id);
					$condition['data']=array(
						"shopcategory_order"=>($key+1)
					);
					$result=$this->dbHandler->updateData($condition);
				}
			break;
			case 'shopMainCategoryDrag':
				foreach($data->idList as $key=>$id){
					$condition['table']="shopcategory";
					$condition['where']=array("shopcategory_id"=>$id);
					$condition['data']=array(
						"shopcategory_order"=>($key+1)
					);
					$result=$this->dbHandler->updateData($condition);
				}
			break;
			case 'categories':
				foreach($data->idList as $key=>$id){
					$condition['table']="shopcategory";
					$condition['where']=array("shopcategory_id"=>$id);
					$condition['data']=array(
						"shopcategory_order"=>($key+1)
					);
					$result=$this->dbHandler->updateData($condition);
				}
			break;
		}
		echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
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
				$shopMainCat=$data->shopMainCategory==-1?false:$data->shopMainCategory;
				$shopStSubCat=$data->shopStSubCategory==-1?false:$data->shopStSubCategory;
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
				
				if($data->orderField!=''){
					$order=array("field"=>$data->orderField,"type"=>$data->direction);
				}else{
					$order=array("field"=>"product_modify_time","type"=>'DESC');
				}
				$result=$this->commongetdata->getProducts($_SESSION['merchant_userid'],$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order,false,false,$shopMainCat,$shopStSubCat);
				$categories=$this->commongetdata->getCategories(true);
				$status=$this->commongetdata->getProductStatus();
				$listingType=$this->commongetdata->getProductListingType();
				$deliveryType=$this->commongetdata->getProductDeliveryType();

				$dataArray=array();
				foreach($result as $value){
					if(isset($categories[$value->product_category])){
						$categoryName=$categories[$value->product_category]->category_name;
					}else{
						$categoryName='Deleted';
					}
					if(isset($categories[$value->product_sub_category])){
						$subCategoryName=$categories[$value->product_sub_category]->category_name;
					}else{
						$subCategoryName='Deleted';
					}
					if(isset($categories[$value->product_sub_sub_category])){
						$subSubCategoryName=$categories[$value->product_sub_sub_category]->category_name;
					}else{
						$subSubCategoryName='Deleted';
					}

					$dataArray[]=array(
						$value->product_id,
						'',
						$value->product_item_title_english,
						$value->product_reference_price,
						$value->product_sell_price,
						$value->product_quantity,
						'',
						$status[$value->product_status],
						'',
						$listingType[$value->product_sell_format],
						$categoryName,
						$subCategoryName,
						$subSubCategoryName,
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
				$field=array('Url','Item code','Seller Code','Item Title','Price','Settle Price','Qty','Available Period','Item Condition','Country of Manufacture','Adult Item','Status','Delivery Type','Main Cat','1st subCat','2nd subCat','List Type','Listed Date');
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
				
				$status=$this->commongetdata->getProductStatus();
				$listingType=$this->commongetdata->getProductListingType();
				$deliveryType=$this->commongetdata->getProductDeliveryType();
				$websiteUrl=$this->commongetdata->getWebsiteConfig('website_url');
				$dataArray=array();
				foreach($result as $value){
					$dataArray[]=array(
						$websiteUrl.'/home/item?itemId='.$value->product_id,
						$value->product_id,
						$value->product_merchant,
						$value->product_item_title_english,
						$value->product_reference_price,
						$value->product_sell_price,
						$value->product_quantity,
						$value->product_available_period==10000?'Infinite':$value->product_available_period.' days',
						$value->product_item_condition==1?'New Item':'Used Item',
						($value->product_production_place_code==1?'Domestic':'Overseas').'-'.($value->product_production_place_detail),
						$value->product_adult==0?'No':'Yes',
						$status[$value->product_status],
						$deliveryType[$value->product_delivery_type],
						isset($categories[$value->product_category])?$categories[$value->product_category]->category_name:'',
						isset($categories[$value->product_sub_category])?$categories[$value->product_sub_category]->category_name:'',
						isset($categories[$value->product_sub_sub_category])?$categories[$value->product_sub_sub_category]->category_name:'',
						$listingType[$value->product_sell_format],
						$value->product_time
					);
				}
				$url=$this->exportExcel('products','subject','description',$field,$dataArray);
			break;
			case 'merchant':
				$field=array(
					'Logo',
					'Seller Shop Title',
					'Username',
					'Email',
					'Country',
					'Gender',
					'Grade',
					'Status',
					'Registeration Time',
					'Total Sales(Last 14 days)',
					'Total Sales(Last 30 days)',
					'Total Items',
					'Total Available Items',
					'Contact'
				);
				$parameters=array( 
					'result'=>'data'
				);
				if(isset($data->gender) && $data->gender!='') $parameters['gender']=$data->gender;
				if(isset($data->status) && $data->status!='') $parameters['status']=$data->status;
				if(isset($data->country) && $data->country!='') $parameters['country']=$data->country;
				if(isset($data->keywords) && $data->keywords!='') $parameters['like']=array('user_username'=>$data->keywords);
				if(isset($data->orderShopTitle)){
					if($data->orderShopTitle=='asc')
						$parameters['order_by']['merchant_shop_name']='ASC';
					if($data->orderShopTitle=='desc')
						$parameters['order_by']['merchant_shop_name']='DESC';
				}
				$result=$this->commongetdata->getMerchantsAdvance($parameters);
				$dataArray=array();
				$websiteUrl=$this->commongetdata->getWebsiteConfig('website_url');
				foreach($result as $value){
					$orders=$this->commongetdata->getData(
						array(
							'table'=>'order',
							'result'=>'data',
							'where'=>array(
								'order_merchant'=>$value->user_id
							)
						)
					);
					$total14=0;
					$total30=0;
					foreach ($orders as $order) {
						if($order->order_time >=date("Y-m-d",strtotime("-14 day")).'00:00:00'){
							$total14+=$order->order_total;
						}
						if($order->order_time >=date("Y-m-d",strtotime("-30 day")).'00:00:00'){
							$total30+=$order->order_total;
						}
					}
					$allitemsnumber=$this->commongetdata->getData(
						array(
							'table'=>'product',
							'result'=>'count',
							'where'=>array(
								'product_merchant'=>$value->user_id
							)
						)
					);
					$availableitemsnumber=$this->commongetdata->getData(
						array(
							'table'=>'product',
							'result'=>'count',
							'where'=>array(
								'product_merchant'=>$value->user_id,
								'product_status'=>3
							)
						)
					);
					$country=$this->commongetdata->getCountry($value->user_country);
					$status=$this->commongetdata->getMerchantStatus();
					$dataArray[]=array(
						$websiteUrl.'/'.($value->merchant_shop_icon),
						$value->merchant_shop_name,
						$value->user_username,
						$value->user_email,
						$country,
						$value->user_gender==0?'Male':'Female',
						$value->user_grade==3?'Platinum':$value->user_grade==2?'Gold':'Silver',
						$status[$value->merchant_status],
						$value->user_reg_time,
						$total14,
						$total30,
						$allitemsnumber,
						$availableitemsnumber,
						'Mobile:'.$value->merchant_phone1.'-'.$value->merchant_phone2.'-'.$value->merchant_phone3.'Phone:'.$value->merchant_homephone1.'-'.$value->merchant_homephone2.'-'.$value->merchant_homephone3
					);
				}
				$url=$this->exportExcel('Sellers','subject','description',$field,$dataArray);
			break;
			case 'user':
				$field=array(
					'Username',
					'Email',
					'Phone',
					'Gender',
					'Status',
					'Grade',
					'Country',
					'Birthday',
					'Registeration Time',
					'Total Purchases(Last 14 days)',
					'Total Purchases(Last 30 days)'
				);
				$parameters=array( 
					'result'=>'data'
				);
				if(isset($data->gender) && $data->gender!='') $parameters['gender']=$data->gender;
				if(isset($data->status) && $data->status!='') $parameters['status']=$data->status;
				if(isset($data->country) && $data->country!='') $parameters['country']=$data->country;
				if(isset($data->keywords) && $data->keywords!='') $parameters['like']=array('user_username'=>$data->keywords);
				$result=$this->commongetdata->getUsersAdvance($parameters);
				$dataArray=array();
				$websiteUrl=$this->commongetdata->getWebsiteConfig('website_url');
				foreach($result as $value){
					$orders=$this->commongetdata->getData(
						array(
							'table'=>'order',
							'result'=>'data',
							'where'=>array(
								'order_user'=>$value->user_id
							)
						)
					);
					$total14=0;
					$total30=0;
					foreach ($orders as $order) {
						if($order->order_time >=date("Y-m-d",strtotime("-14 day")).'00:00:00'){
							$total14+=$order->order_total;
						}
						if($order->order_time >=date("Y-m-d",strtotime("-30 day")).'00:00:00'){
							$total30+=$order->order_total;
						}
					}
					$country=$this->commongetdata->getCountry($value->user_country);
					$dataArray[]=array(
						$value->user_username,
						$value->user_email,
						$value->merchant_phone1.'-'.$value->merchant_phone2.'-'.$value->merchant_phone3,
						$value->user_gender==1?'Female':'Male',
						$value->user_state==0?'Normal':'Frozen',
						$value->user_grade==3?'Platinum':$value->user_grade==2?'Gold':'Silver',
						$country,
						$value->user_birthday,
						$value->user_reg_time,
						$total14,
						$total30
					);
				}
				$url=$this->exportExcel('Users','subject','description',$field,$dataArray);
			break;
			case 'groupBuy':
				$field=array(
					'Group Buy No.',
					'Item Code',
					'Item Title',
					'Price',
					'Settle Price',
					'Aimed(Min) Qty',
					'Max Qty (Optional)',
					'Ordered Qty',
					'Starting Date',
					'End Date',
					'Registered Date'
				);
				$parameters=array(
					'result'=>'data',
					'merchant'=>$data->merchantId,
					'orderBy'=>array('groupbuy_registeredTime'=>'DESC')
				);
				if($data->name!='') $parameters['like']=array('groupbuy_productName'=>$data->name);
				$result=$this->commongetdata->getGroupBuyAdvance($parameters);
				$dataArray=array();
				$websiteUrl=$this->commongetdata->getWebsiteConfig('website_url');
				foreach($result as $value){
					$dataArray[]=array(
						$value->groupbuy_code,
						$value->groupbuy_productId,
						$value->groupbuy_productName,
						$value->groupbuy_price,
						$value->groupbuy_settlePrice,
						$value->groupbuy_minQty,
						$value->groupbuy_maxQty,
						$value->groupbuy_orderedQty,
						$value->groupbuy_startingTime,
						$value->groupbuy_endTime,
						$value->groupbuy_registeredTime,
					);
				}
				$url=$this->exportExcel('GroupBuy','subject','description',$field,$dataArray);
			break;
			/*
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
			break;*/
		}
		echo json_encode(array("result"=>"success","message"=>$url));
	}
	public function getOptionsData(){
		
	}
	public function checkUserLogin(){
		if (!checkLogin() || (isset($_SESSION["usertype"]) && !strcmp($_SESSION["usertype"],"admin"))) {
//			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Please login!"));
			echo json_encode(array("result"=>"failed","message"=>'Please login first!'));
			return false;
		}
		$user=$this->commongetdata->getContent('user',$_SESSION['userid']);
		if($user->user_confirm_email==0){
			$_SESSION['userEmail']=$user->user_email;
//			$this->load->view('redirect',array("url"=>"/home/confirmEmail","info"=>"Please confirm your E-mail!"));
			echo json_encode(array("result"=>"failed","message"=>'Please confirm your E-mail!'));
			return false;
		}
		return true;
	}
	public function addToCart(){
		if(!$this->checkUserLogin()) return false;
		$result=$this->commongetdata->addToCart(array(
			"productId"=>$_POST['product_id'],
			"op1"=>isset($_POST['op1'])?$_POST['op1']:'',
			"op2"=>isset($_POST['op2'])?$_POST['op2']:'',
			"op3"=>isset($_POST['op3'])?$_POST['op3']:''
		),$_POST['merchant_id'],$_POST['amount']);
		if($result)
			echo json_encode(array("result"=>"success","message"=>''));
		else
			echo json_encode(array("result"=>"failed","message"=>'Sorry. Your quantity has exceeded the available stocks.'));
	}
	public function setCartProductNumber(){
		if(!$this->checkUserLogin()) return false;
		$result=$this->commongetdata->setCartProductNumber(array(
			"productId"=>$_POST['product_id'],
			"op1"=>isset($_POST['op1'])?$_POST['op1']:'',
			"op2"=>isset($_POST['op2'])?$_POST['op2']:'',
			"op3"=>isset($_POST['op3'])?$_POST['op3']:''
		),$_POST['amount']);
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
	public function checkCartProduct(){
		$result=$this->commongetdata->checkCartProduct($_POST['productId'],$_POST['isCheck']);
		if($result)
			echo json_encode(array("result"=>"success","message"=>''));
		else
			echo json_encode(array("result"=>"failed","message"=>'Failed to check this product!'));
	}
	public function checkAllCartProduct(){
		$result=$this->commongetdata->checkAllCartProduct($_POST['isCheck']);
		if($result)
			echo json_encode(array("result"=>"success","message"=>''));
		else
			echo json_encode(array("result"=>"failed","message"=>'Failed to check this product!'));
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
	public function checkMobileCode(){
		if(isset($_POST['code']) && strcasecmp($_POST['code'],$_SESSION['mobilecode'])==0){
			echo json_encode(array("result"=>"success","message"=>"Right Security code!"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"Wrong Security code!"));
		}
	}
	public function checkEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_email"=>$_POST['email']))){
			echo json_encode(array("result"=>"notunique","message"=>"The email already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkUsername(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$_POST['username']))){
			echo json_encode(array("result"=>"notunique","message"=>"The username already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"success","message"=>"Success!"));
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
		$user=$this->commongetdata->getContentAdvance('user',array('merchant_login_ID'=>$_POST['ID']));
		if(sizeof($user)>0 && $user->user_id!=$_SESSION['merchant_userid']){
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
			"user_confirm_email"=>1,
			"user_facebook_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		$condition['result']="data";
		$user=$this->dbHandler->selectData($condition);
		if($result==1){
			$subject=$this->commongetdata->getWebsiteConfig("website_user_register_success_email_subject");
			$subject=str_replace("{USERNAME}",$user[0]->user_username,$subject);
			$content=$this->commongetdata->getWebsiteConfig("website_user_register_success_email_message");
			$content=str_replace("{USERNAME}",$user[0]->user_username,$content);
			
			$this->commongetdata->email($_GET['email'],$subject,$content);
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
		}
		else{
			$this->load->view('redirect',array("info"=>"failed!"));
		}
	}
	public function registerWithFB(){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array('user_email'=>$_POST["email"],'user_confirm_email'=>1)
		);
		$info=$this->dbHandler->selectData($condition);
		if(sizeof($info)<1){
			if(!$this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$_POST["username"]))){
				echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
				return false;
			}
			$facebookUserInfo=array(
				"user_username"=>$_POST["username"],
				"user_grade"=>1,
				"user_gender"=>$_POST["gender"],
				"user_email"=>$_POST["email"],
				"user_is_merchant"=>0,
				"user_reg_time"=>date("Y-m-d H:i:s")
			);
			$result=$this->dbHandler->insertData("user",$facebookUserInfo);
			$_SESSION['userEmail']=$_POST["email"];
			$_SESSION['username']=$_POST["username"];
			echo json_encode(array("result"=>"notRegister","message"=>"The email has not been registered!Please register with this email!"));			
			return false;
		}
		/*
		if($info[0]->user_facebook_confirm_email!=1){
			$this->sendFacebookEmail($_POST["email"]);
			echo json_encode(array("result"=>"failed","message"=>"The email with facebook has not been confirmed!This email has been sent!"));
			return false;
		}*/
		
		$subject=$this->commongetdata->getWebsiteConfig("website_facebook_success_title");
		$subject=str_replace("{USERNAME}",$_POST["username"],$subject);
		$content=$this->commongetdata->getWebsiteConfig("website_facebook_success_content");
		$content=str_replace("{USERNAME}",$_POST["username"],$content);
			
		$this->commongetdata->email($_POST["email"],$subject,$content);
		$_SESSION['username']=$info[0]->user_username;
		$_SESSION['userid']=$info[0]->user_id;
		$_SESSION['usertype']="user";
		$_SESSION['userEmail']=$info[0]->user_email;
		echo json_encode(array("result"=>"success","message"=>"Login with Facebook successfully!"));
		return false;
	}
	public function downloadImage(){
		if(isset($_GET['filename'])){
			// $filename="http://localhost/".$_GET[filename];//获取参数 
			// header('Content-type: image/jpeg'); 
			// header("Content-Disposition: attachment; filename='$filename'"); 
			// //注意：header函数前确保没有任何输出 
			// exit;//结束程序 
			$filename=$_GET['filename'];
			$localhostPath = str_replace("\\","/",$_SERVER['DOCUMENT_ROOT']);  //这里要引用绝对路径  
		    $imageUrl = $localhostPath.$filename;   //合并成一个完整的路径  
		    $imageUrl = iconv('utf-8', 'gbk', $imageUrl);              //这里可以防止中文名文件乱码,我的机器环境是utf-8  
		      
		    header('Content-type: application/octet-stream');  
		    header('Content-Disposition: attachment; filename='.$filename);
		      
		    ob_clean();  
		    flush();  
		    readfile($imageUrl); 
		}
	}
	public function loginWithFB(){//user_confirm_email
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array('user_email'=>$_POST["email"])
		);
		$info=$this->dbHandler->selectData($condition);
		if(sizeof($info)<1){
			if($this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$_POST["username"]))){
				echo json_encode(array("result"=>"notexist","message"=>"This account does'not exist!"));
				return false;
			}
		}
		$_SESSION['username']=$info[0]->user_username;
		$_SESSION['userid']=$info[0]->user_id;
		$_SESSION['usertype']="user";
		$_SESSION['userEmail']=$info[0]->user_email;
		
		if($info[0]->user_facebook_confirm_email!=1){
			//$this->sendFacebookEmail($_POST["email"]);
			echo json_encode(array("result"=>"failed","message"=>"Please confirm your E-mail!"));
			return false;
		}
		/*
		$subject=$this->commongetdata->getWebsiteConfig("website_facebook_success_title");
		$subject=str_replace("{USERNAME}",$_POST["username"],$subject);
		$content=$this->commongetdata->getWebsiteConfig("website_facebook_success_content");
		$content=str_replace("{USERNAME}",$_POST["username"],$content);
			
		$this->commongetdata->email($_POST["email"],$subject,$content);*/
		echo json_encode(array("result"=>"success","message"=>"Login with Facebook successfully!"));
		return false;
	}
	public function activeFacebook(){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array(
				'token'=>$_GET['verify'],
				'user_facebook_confirm_email'=>0
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
			"user_facebook_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result>0){
			$subject=$this->commongetdata->getWebsiteConfig("website_user_register_success_email_subject");
			$subject=str_replace("{USERNAME}",$user->user_username,$subject);
			$content=$this->commongetdata->getWebsiteConfig("website_user_register_success_email_message");
			$content=str_replace("{USERNAME}",$user->user_username,$content);
			$this->commongetdata->email($user->user_email,$subject,$content);
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
			"user_confirm_email"=>1,
			"user_facebook_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result>0){
			$subject=$this->commongetdata->getWebsiteConfig("website_user_success_email_title");
			$subject=str_replace("{USERNAME}",$user->user_username,$subject);
			$content=$this->commongetdata->getWebsiteConfig("website_user_success_email_content");
			$content=str_replace("{USERNAME}",$user->user_username,$content);

			unset($_SESSION["username"]);
			unset($_SESSION["userid"]);
			unset($_SESSION["usertype"]);

			$this->commongetdata->email($user->user_email,$subject,$content);
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
		
		$subject=str_replace("{USERNAME}",$user->user_username,$emailTitle);
		
		$content=str_replace("{USERNAME}",$user->user_username,$emailContent);
		
		$contentEnd='<a href="aiimai.coolkeji.com/common/active?verify='.$token.'" class="confirmBt"><img src="http://aiimai.coolkeji.com/assets/images/home/confirmbt.png" alt="Confirm"></a><br>If the button is invalid, please copy the following link to your browser\'s address bar!<br><span style="color:blue;">http://aiimai.coolkeji.com/common/active?verify='.$token.'</span></body></html>';
		$content='<!doctype html><html><head><meta charset="utf-8"><style>body{font-family:Microsoft Yahei;} .confirmBt{display: inline-block;margin-bottom: 10px;}</style></head><body>'.$emailContent.$contentEnd;
		$this->commongetdata->email($_SESSION['userEmail'],$emailTitle,$content);
		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		/*		if(){
			echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}*/
	}
	public function sendFacebookEmail($email){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array(
				'user_email'=>$email,
				'user_facebook_confirm_email'=>0
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
			"user_email"=>$email
		);
		$condition['data']=array(
			"token"=>$token,
			"token_exptime"=>$token_exptime
		);
		$result=$this->dbHandler->updateData($condition);
		$emailTitle=$this->commongetdata->getWebsiteConfig('website_confirm_email_title');
		$emailContent=$this->commongetdata->getWebsiteConfig('website_confirm_email_content');
		
		$subject=str_replace("{USERNAME}",$user->user_username,$emailTitle);
		
		$content=str_replace("{USERNAME}",$user->user_username,$emailContent);
		$this->commongetdata->email($email,$emailTitle,$emailContent.'<a href="aiimai.coolkeji.com/common/activeFacebook?verify='.$token.'">Confirm</a><br>If the button is invalid, please copy the following link to your browser\'s address bar!<br><span style="color:blue;">aiimai.coolkeji.com/common/activeFacebook?verify='.$token.'</span>');
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
		
		$subject=str_replace("{USERNAME}",$user->user_username,$emailTitle);
		
		$content=str_replace("{USERNAME}",$user->user_username,$emailContent);
		$this->commongetdata->email($_POST['userEmail'],$emailTitle,$emailContent.'<br><a href="aiimai.coolkeji.com/home/createNewPassword?verify='.$token.'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
	}
	public function sendMerchantEmail(){
		$this->commongetdata->email($_SESSION['userEmail'],'Successfully Registered. | Confirm E-mail!','<a href="aiimai.coolkeji.com/common/confirmMerchantEmail?email='.$_SESSION['merchantEmail'].'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"success"));
	}
	public function reloadEmail(){
		$condition=array(
			'table'=>'user',
			'result'=>'data',
			'where'=>array('user_email'=>$_SESSION['userEmail'])
		);
		$merchant=$this->commongetdata->getOneData($condition);
		if($merchant->user_confirm_email==1)
			echo json_encode(array("result"=>"success","message"=>"Successfully Confirmed E-mail!"));
		else
			echo json_encode(array("result"=>"failed","message"=>"Failed Confirmed E-mail!"));
	}
	public function sendSMSForChangeMobile(){
		$data=json_decode($_POST['data']);
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_phone"=>$data->mobile))){
			echo json_encode(array("result"=>"notunique","message"=>"Your mobile number is already confirmed and log-in available!"));
			return false;
		}
		$result=$this->commongetdata->globalSMS($data->mobile,mobileCode());
		if ($result>0) {
			echo json_encode(array("result"=>"success", "message"=>"发送验证码成功"));
		} else {
			echo json_encode(array("result"=>"failed", "message"=>"发送失败，请稍后再试"));
			unset($_SESSION["mobilecode"]);
		}
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