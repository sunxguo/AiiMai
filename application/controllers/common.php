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
					"product_merchant"=>$_SESSION['userid'],
					"product_time"=>date("Y-m-d H:i:s"),
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "register":
				$table="user";
				if(!$this->commongetdata->checkUniqueAdvance("user","user_username",$data->username)){
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
					"user_reg_time"=>date("Y-m-d H:i:s")
				);
				$_SESSION['userEmail']=$data->email;
			break;
			case "merchant":
				$table="merchant";
				if(!$this->commongetdata->checkUniqueAdvance("merchant","merchant_username",$data->username)){
					echo json_encode(array("result"=>"notunique","message"=>"This username already exists!"));
					return false;
				}
				$info=array(
					"merchant_username"=>$data->username,
					"merchant_pwd"=>MD5("MonkeyKing".$data->password),
					"merchant_grade"=>1,
					"merchant_gender"=>$data->gender,
					"merchant_email"=>$data->email,
					"merchant_country"=>$data->country,
					"merchant_confirm_email"=>0,
					"merchant_status"=>0,
					"merchant_reg_time"=>date("Y-m-d H:i:s")
				);
				$_SESSION['merchantEmail']=$data->email;
			break;
		}
		$result=$this->dbHandler->insertData($table,$info);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
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
					"product_modify_time"=>date("Y-m-d H:i:s")
				);
			break;
			case "merchantInfo":
				$condition['table']="merchant";
				$condition['where']=array("merchant_email"=>$_SESSION['merchantEmail']);
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
					"merchant_status"=>1
				);
			break;
			case 'merchantpwd':
				$condition['table']="merchant";
				$condition['where']=array("merchant_id"=>$_SESSION['userid']);
				$condition['result']="data";
				$merchantInfo=$this->commongetdata->getOneData($condition);
				if($merchantInfo->merchant_pwd!=MD5("MonkeyKing".$data->oldpwd)){
					echo json_encode(array("result"=>"failed","message"=>"Wrong password！"));
					return false;
				}
				$condition['data']=array(
					"merchant_pwd"=>MD5("MonkeyKing".$data->newpwd)
				);
			break;
			case 'merchantBusinessLicense':
				$condition['table']="merchant";
				$condition['where']=array("merchant_id"=>$_SESSION['userid']);
				$condition['data']=array(
					"merchant_business_license"=>$data->src,
					"merchant_business_license_msg"=>$data->Msg,
				);
			break;
		}
		$result=$this->dbHandler->updateData($condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息修改成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息修改失败"));
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
		}
		echo json_encode(array("result"=>"success","message"=>$url));
	}
	public function addToCart(){
		$this->commongetdata->addToCart($_POST['product_id'],$_POST['merchant_id'],$_POST['amount']);
		echo json_encode(array("result"=>"success","message"=>''));
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
			echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("user","user_email",$_POST['email'])){
			echo json_encode(array("result"=>"notunique","message"=>"该用户名已经存在"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkMerchantEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("merchant","merchant_email",$_POST['email'])){
			echo json_encode(array("result"=>"notunique","message"=>"该用户名已经存在"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkID(){
		if(!$this->commongetdata->checkUniqueAdvance("merchant","merchant_login_ID",$_POST['ID'])){
			echo json_encode(array("result"=>"notunique","message"=>"该用户名已经存在"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function confirmEmail(){
		!$this->commongetdata->checkUniqueAdvance("user","user_email",$_GET['email']);
		$condition['table']="user";
		$condition['where']=array("user_email"=>$_GET['email']);
		$condition['data']=array(
			"user_confirm_email"=>1
		);
		$result=$this->dbHandler->updateData($condition);
		if($result==1) {
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Success!"));
		}
		else{
			$this->load->view('redirect',array("info"=>"failed!"));
		}
	}
	public function confirmMerchantEmail(){
		!$this->commongetdata->checkUniqueAdvance("merchant","merchant_email",$_GET['email']);
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
		$this->commongetdata->email($_SESSION['userEmail'],'Successfully Registered. | Confirm E-mail!','<a href="aiimai.coolkeji.com/common/confirmEmail?email='.$_SESSION['userEmail'].'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		/*		if(){
			echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}*/
	}
	public function sendMerchantEmail(){
		$this->commongetdata->email($_SESSION['merchantEmail'],'Successfully Registered. | Confirm E-mail!','<a href="aiimai.coolkeji.com/common/confirmMerchantEmail?email='.$_SESSION['merchantEmail'].'">Confirm</a>');
		echo json_encode(array("result"=>"success","message"=>"success"));
	}
	public function reloadEmail(){
		$condition=array(
			'table'=>'merchant',
			'result'=>'data',
			'where'=>array('merchant_email'=>$_SESSION['merchantEmail'])
		);
		$merchant=$this->commongetdata->getOneData($condition);
		if($merchant->merchant_confirm_email==1)
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