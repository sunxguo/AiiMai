<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Cms extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('CommonGetData');
		$this->commongetdata->language('cms');
		$this->load->model("dbHandler");
	}
	public function checkMerchantLoginCommon(){
		if(isset($_SESSION['merchant_username'])){
			return true;
		} else {
			if (isset($_COOKIE["merchant_userid"])) {
				$_SESSION["merchant_userid"] = $_COOKIE["merchant_userid"];
				$_SESSION["merchant_username"] = $_COOKIE["merchant_username"];
				$_SESSION["useremail"] = $_COOKIE["useremail"];
				return true;
			}
			return false;
		}
	}
	public function checkMerchantSimpleLogin(){
		// if (!checkLogin() || !isset($_SESSION["usertype"]) || strcmp($_SESSION["usertype"],"merchant")) {
		// 	$this->load->view('redirect',array("url"=>"/cms/login","info"=>"Please login merchant account!"));
		// 	return false;
		// }else return true;

		if(isset($_SESSION['merchant_username'])){
			return true;
		} else {
			if (isset($_COOKIE["merchant_userid"])) {
				$_SESSION["merchant_userid"] = $_COOKIE["merchant_userid"];
				$_SESSION["merchant_username"] = $_COOKIE["merchant_username"];
				$_SESSION["useremail"] = $_COOKIE["useremail"];
				return true;
			}
			$this->load->view('redirect',array("url"=>"/cms/login","info"=>"Please login merchant account!"));
			return false;
		}
	}
	// public function checkMerchantLogin(){
	// 	// || strcmp($_SESSION["usertype"], "merchant")
	// 	if (!checkLogin() || !isset($_SESSION["usertype"]) || strcmp($_SESSION["usertype"],"merchant")) {
	// 		$this->load->view('redirect',array("url"=>"/cms/login","info"=>"Please login merchant account!"));
	// 		return false;
	// 	}else{
	// 		$condition=array(
	// 			'table'=>'user',
	// 			'result'=>'data',
	// 			'where'=>array('user_username'=>$_SESSION["username"])
	// 		);
	// 		$info=$this->dbHandler->selectData($condition);
	// 		//状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过
	// 		switch($info[0]->merchant_status){
	// 			case 0:
	// 				$this->load->view('redirect',array("url"=>"/cms/registerInformation"));
	// 			break;
	// 			case 1:
	// 				$this->load->view('redirect',array("url"=>"/cms/waitConfirm"));
	// 			break;
	// 			case 2:
	// 				$this->load->view('redirect',array("url"=>"/cms/index"));
	// 			break;
	// 			case 3:
	// 				$this->load->view('redirect',array("url"=>"/cms/confirmFailed"));
	// 			break;
	// 		}
	// 		return true;
	// 	}
	// }
	public function login(){
		$this->load->view('cms/login',array('title'=>"Login ASM"));
	}
	public function loginHandler(){
		if(!isset($_POST['validCode']) || strcasecmp($_POST['validCode'],$_SESSION['authcode'])!=0){
			$this->load->view('redirect',array("info"=>"Wrong Security Code!","url"=>"/cms/login?username=".$_POST["username"]));
			return false;
		}
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$condition=array(
				'table'=>'user',
				'result'=>'data'
			);
			if(!$this->commongetdata->checkEmail($_POST["username"])){
				$condition['where']=array('user_username'=>$_POST["username"]);
			}else{
				$condition['where']=array('user_email'=>$_POST["username"]);
			}
			$info=$this->dbHandler->selectData($condition);
			if(count($info,0)==1){
				$post_pwd=MD5("MonkeyKing".$_POST["pwd"]);
				$db_pwd=$info[0]->user_pwd;
				if($post_pwd==$db_pwd){
					$_SESSION['merchant_username']=$info[0]->user_username;
					$_SESSION['merchant_userid']=$info[0]->user_id;
					$_SESSION['usertype']="merchant";
					$_SESSION['userEmail']=$info[0]->user_email;
					//状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过
					switch($info[0]->merchant_status){
						case 0:
							$this->load->view('redirect',array("url"=>"/cms/registerInformation"));
						break;
						case 1:
							$this->load->view('redirect',array("url"=>"/cms/waitConfirm"));
						break;
						case 2:
							$this->load->view('redirect',array("url"=>"/cms/index"));
						break;
						case 3:
							$this->load->view('redirect',array("url"=>"/cms/confirmFailed"));
						break;
					}
				}
				else{
					$this->load->view('redirect',array("info"=>"Wrong Password!","url"=>"/cms/login?username=".$_POST["username"]));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"Username does not exist!","url"=>"/cms/login"));
			}
		}else{
			$this->load->view('redirect',array("info"=>"Please enter your username and password!","url"=>"/cms/login"));
		}
	}
	public function logout(){
		unset($_SESSION["merchant_username"]);
		unset($_SESSION["merchant_userid"]);
		unset($_SESSION["usertype"]);
		$this->load->view('redirect',array("url"=>"/cms/login"));
	}
	public function cmsBaseHandler($title,$sider,$view,$data){
		if(!$this->checkMerchantSimpleLogin()) return false;
		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
		$products=$this->commongetdata->getProductsAdvance(array(
				"result"=>'data',
				"merchant"=>$_SESSION["merchant_userid"],
				"status"=>3
			));
		$expiringProducts=$this->commongetdata->getExpiringProducts($products,true);
		$this->load->view('cms/header',
			array(
				'title' => $websiteName."-",
				'showSider' => true,
				'sider' => $sider,
				'websiteName'=>$websiteName,
				'expiringItemsNum'=>sizeof($expiringProducts)
			)
		);
		$this->load->view('cms/'.$view,$data);
		$this->load->view('cms/footer');
	}
	public function register(){
		$data=array();
		$this->load->view('home/header',
			array(
				'title' => "Seller Register-AiiMai",
				'websiteName'=>"AiiMai",
				'categories'=>$this->commongetdata->getCategories(false)
			)
		);
		$this->load->view('home/sellerregister',$data);
		$this->load->view('home/footer',array());
	}
	public function registerInformation(){
		if(!$this->checkMerchantSimpleLogin()) return false;
		$data=array();
		$this->load->view('home/header',
			array(
				'title' => "Seller Information-AiiMai",
				'websiteName'=>"AiiMai",
				'categories'=>$this->commongetdata->getCategories(false),
				'user'=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid'])
			)
		);
		$this->load->view('home/sellerInformation',$data);
		$this->load->view('home/footer',array());
	}
	public function sellerRegStep3(){
		if(!$this->checkMerchantSimpleLogin()) return false;
		$bankList=$this->commongetdata->getData(array(
				'table'=>'bank',
				'result'=>'data',
				'where'=>array('bank_status'=>1),
				'order_by'=>array('bank_order'=>'ASC'))
		);
		$data=array('bankList'=>$bankList);
		$this->load->view('home/header',
			array(
				'title' => "Seller Information-AiiMai",
				'websiteName'=>"AiiMai",
				'categories'=>$this->commongetdata->getCategories(false),
				'user'=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid'])
			)
		);
		$this->load->view('home/sellerRegStep3',$data);
		$this->load->view('home/footer',array());
	}
	public function waitConfirm(){
		if(!$this->checkMerchantSimpleLogin()) return false;
		$data=array();
		$this->load->view('home/header',
			array(
				'title' => "wait Confirmation-AiiMai",
				'websiteName'=>"AiiMai",
				'categories'=>$this->commongetdata->getCategories(false)
			)
		);
		$this->load->view('home/waitConfirm',$data);
		$this->load->view('home/footer',array());
	}
	public function index(){
		$notices=$this->commongetdata->getData(array('table'=>'notice','result'=>"data"));
		$startDate=isset($_POST['startDate'])?$_POST['startDate']:date("Y-m-d",strtotime('-11 day'));
		$days=isset($_POST['days'])?$_POST['days']:7;
		$data=array(
			"turnover"=>$this->commongetdata->getOrdersByDay($startDate,$days,true),
			"totalTurnover"=>$this->commongetdata->getTotalTurnover($_SESSION['merchant_userid']),
			"notices"=>$notices
		);
		$this->cmsBaseHandler('ASM Management',array('index'=>true),'index',$data);
	}
	public function myInfo(){
		if(!$this->checkMerchantSimpleLogin()) return false;
		$bankList=$this->commongetdata->getData(array(
				'table'=>'bank',
				'result'=>'data',
				'where'=>array('bank_status'=>1),
				'order_by'=>array('bank_order'=>'ASC'))
		);
		$data=array(
			"merchant"=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid']),
			"shipAddress"=>$this->commongetdata->getContentAdvance('address',array("address_type"=>1,"address_userid"=>$_SESSION['merchant_userid'])),
			"bankList"=>$bankList
		);
		$this->cmsBaseHandler('My Info',array('baseInfo'=>true,'myInfo'=>true),'myInfo',$data);
	}
	public function grade(){
		$this->cmsBaseHandler('Grade',array('baseInfo'=>true,'grade'=>true),'grade',array());
	}
	public function permission(){
		$this->cmsBaseHandler('Permission',array('baseInfo'=>true,'sellerPermission'=>true,'permission'=>true),'permission',array());
	}
	public function sharePermission(){
		$this->cmsBaseHandler('share Permission',array('baseInfo'=>true,'sellerPermission'=>true,'sharePermission'=>true),'sharePermission',array());
	}
	public function vendor(){
		$this->cmsBaseHandler('vendor',array('baseInfo'=>true,'sellerPermission'=>true,'vendor'=>true),'vendor',array());
	}
	public function shopBaseInfo(){
		$data=array(
			"merchant"=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid'])
		);
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopBaseInfo'=>true),'shopBaseInfo',$data);
	}
	public function shopHomePage(){
		$data=array(
			'merchant'=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid']),
			'items'=>$this->commongetdata->getProductsAdvance(array('result'=>'data','merchant'=>$_SESSION['merchant_userid'],'status'=>3))
		);
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopHomePage'=>true),'shopHomePage',$data);
	}
	public function shopDiscount(){
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopDiscount'=>true),'shopDiscount',array());
	}
	public function shopCategory(){
		$categoryGroup=$this->commongetdata->getData(array('table'=>'shopcategory','result'=>'data','where'=>array('shopcategory_merchant'=>$_SESSION['merchant_userid'],'shopcategory_fid'=>0),'order_by'=>array('shopcategory_order'=>'ASC')));
		$data=array(
			"categoryGroup"=>$categoryGroup,
			'merchant'=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid'])
		);
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopCategory'=>true),'shopCategory',$data);
	}
	public function shopInfo(){
		$data=array(
			'merchant'=>$this->commongetdata->getContent('user',$_SESSION['merchant_userid'])
		);
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopInfo'=>true),'shopInfo',$data);
	}
	public function goodsStatistics(){
		$parameters=array(
			"result"=>'count',
			"merchant"=>$_SESSION['merchant_userid']
		);
		$data=array(
			'total'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'])),
			'onSale'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"status"=>3)),
			'registeredToday'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"listedTimeBegin"=>date("Y-m-d"),"listedTimeEnd"=>date("Y-m-d"))),
			
			'groupBuy'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"groupBuy"=>1)),
			'auction'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"sellFormat"=>2,"status"=>3)),
			'underReview'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"status"=>1)),
			'rejected'=>$this->commongetdata->getProductsAdvance(array("result"=>'count',"merchant"=>$_SESSION['merchant_userid'],"status"=>4)),
		);
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsStatistics'=>true),'goodsStatistics',$data);
	}
	public function goodsAdd(){
		$categories=$this->commongetdata->getCategories(false);
		$shopCategory=$this->commongetdata->getShopCategory($_SESSION['merchant_userid']);
		$this->cmsBaseHandler('Item List/Edit',array(
			'goodsManagement'=>true,
			'goods'=>true,'goodsAdd'=>true
		),'goodsAdd',array('categories'=>$categories,'shopCategory'=>$shopCategory));
	}
	public function goodsCopy(){
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false)
		);
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsCopy'=>true),'goodsCopy',$data);
	}
	public function goodsEdit(){
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			'shopCategory'=>$this->commongetdata->getShopCategory($_SESSION['merchant_userid'])
		);
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsEdit'=>true),'goodsEdit',$data);
	}
	public function modifyGoods(){
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"item"=>$item,
			"subCatList"=>$this->commongetdata->getSubCat($item->product_category),
			"subSubCatList"=>$this->commongetdata->getSubCat($item->product_sub_category),
			"shopCategory"=>$this->commongetdata->getShopCategory($_SESSION['merchant_userid']),
			"shopSubCategory"=>$this->commongetdata->getShopSubCategory($_SESSION['merchant_userid'],$item->product_shopCategory)
		);
		$this->load->view('cms/modifyGoods',$data);
	}
	public function copyGood(){
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"item"=>$item,
			"subCatList"=>$this->commongetdata->getSubCat($item->product_category),
			"subSubCatList"=>$this->commongetdata->getSubCat($item->product_sub_category),
			"shopCategory"=>$this->commongetdata->getShopCategory($_SESSION['merchant_userid']),
			"shopSubCategory"=>$this->commongetdata->getShopSubCategory($_SESSION['merchant_userid'],$item->product_shopCategory)
		);
		$this->load->view('cms/copyGood',$data);
	}
	public function modifyGroupBuy(){
		$groupbuy=$this->commongetdata->getContent('groupbuy',$_GET['groupBuyId']);
		$item=$this->commongetdata->getContent('product',$groupbuy->groupbuy_productId);
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"groupbuy"=>$groupbuy,
			"item"=>$item,
			"subCatList"=>$this->commongetdata->getSubCat($item->product_category),
			"subSubCatList"=>$this->commongetdata->getSubCat($item->product_sub_category),
			"shopCategory"=>$this->commongetdata->getShopCategory($_SESSION['merchant_userid'])
		);
		$this->load->view('cms/modifyGroupBuy',$data);
	}
	public function auctionGoods(){
		$this->cmsBaseHandler('auction',array('goodsManagement'=>true,'auction'=>true,'auctionGoods'=>true),'auctionGoods',array());
	}
	public function auctionBid(){
		$this->cmsBaseHandler('auction',array('goodsManagement'=>true,'auction'=>true,'auctionBid'=>true),'auctionBid',array());
	}
	public function groupBuy(){
		$inPreparationAmount=$this->commongetdata->getGroupBuyAdvance(array('result'=>'count','merchant'=>$_SESSION['merchant_userid'],'inPreparation'=>array('startingTime'=>date("Y-m-d H:i:s"))));
		$inProgressAmount=$this->commongetdata->getGroupBuyAdvance(array('result'=>'count','merchant'=>$_SESSION['merchant_userid'],'inProgress'=>array('startingTime'=>date("Y-m-d H:i:s"),'endTime'=>date("Y-m-d H:i:s"))));
		$endedAmount=$this->commongetdata->getGroupBuyAdvance(array('result'=>'count','merchant'=>$_SESSION['merchant_userid'],'ended'=>array('endTime'=>date("Y-m-d H:i:s"))));
		$amount=$inPreparationAmount+$inProgressAmount+$endedAmount;
		$data=array(
			'amount'=>$amount,
			'inPreparationAmount'=>$inPreparationAmount,
			'inProgressAmount'=>$inProgressAmount,
			'endedAmount'=>$endedAmount,
			'categories'=>$this->commongetdata->getCategories(false)
		);
		$this->cmsBaseHandler('groupBuy',array('goodsManagement'=>true,'groupBuy'=>true),'groupBuy',$data);
	}
	public function price(){
		$this->cmsBaseHandler('Price',array('goodsManagement'=>true,'price'=>true),'price',array());
	}
	public function deliveryFee(){
		$this->cmsBaseHandler('Delivery Fee',array('goodsManagement'=>true,'deliveryFee'=>true),'deliveryFee',array());
	}
	public function inventory(){
		$this->cmsBaseHandler('inventory',array('goodsManagement'=>true,'inventoryManagement'=>true,'inventory'=>true),'inventory',array());
	}
	public function subbranchStock(){
		$this->cmsBaseHandler('inventory',array('goodsManagement'=>true,'inventoryManagement'=>true,'subbranchStock'=>true),'subbranchStock',array());
	}
	public function multipleDelivery(){
		$this->cmsBaseHandler('inventory',array('goodsManagement'=>true,'inventoryManagement'=>true,'multipleDelivery'=>true),'multipleDelivery',array());
	}
	public function stockOptionQuery(){
		$this->cmsBaseHandler('Stock Option Query',array('goodsManagement'=>true,'stockOptionQuery'=>true),'stockOptionQuery',array());
	}
	public function goodsGroup(){
		$this->cmsBaseHandler('goodsGroup',array('goodsManagement'=>true,'goodsGroup'=>true),'goodsGroup',array());
	}
	public function globalSales(){
		$this->cmsBaseHandler('global Sales',array('goodsManagement'=>true,'globalSales'=>true),'globalSales',array());
	}
	public function bigData(){
		$this->cmsBaseHandler('bigData',array('goodsManagement'=>true,'goods'=>true),'bigData',array());
	}
	public function adPlus(){
		$this->cmsBaseHandler('adPlus',array('ad'=>true,'adPlus'=>true),'adPlus',array());
	}
	public function specialDiscount(){
		$this->cmsBaseHandler('special Discount',array('ad'=>true,'specialDiscount'=>true),'specialDiscount',array());
	}
	public function ASpecialApply(){
		$this->cmsBaseHandler('ASpecial Apply',array('ad'=>true,'ASpecial'=>true,'ASpecialApply'=>true),'ASpecialApply',array());
	}
	public function ASpecialRecord(){
		$this->cmsBaseHandler('ASpecial Record',array('ad'=>true,'ASpecial'=>true,'ASpecialRecord'=>true),'ASpecialRecord',array());
	}
	public function analytics(){
		$this->cmsBaseHandler('analytics',array('ad'=>true,'analytics'=>true),'analytics',array());
	}
	public function goodsSNS(){
		$this->cmsBaseHandler('goods SNS',array('ad'=>true,'goodsSNS'=>true),'goodsSNS',array());
	}
	public function privilege(){
		$this->cmsBaseHandler('privilege',array('ad'=>true,'privilege'=>true),'privilege',array());
	}
	public function feedback(){
		$this->cmsBaseHandler('feedback',array('ad'=>true,'feedback'=>true),'feedback',array());
	}
	public function shoppingActivity(){
		$this->cmsBaseHandler('shopping Activity',array('ad'=>true,'shoppingActivity'=>true),'shoppingActivity',array());
	}
	public function sellersCooperationProjects(){
		$this->cmsBaseHandler('sellers Cooperation',array('ad'=>true,'sellersCooperation'=>true,'sellersCooperationProjects'=>true),'sellersCooperationProjects',array());
	}
	public function affiliate(){
		$this->cmsBaseHandler('Affiliate',array('ad'=>true,'sellersCooperation'=>true,'affiliate'=>true),'affiliate',array());
	}
	public function fellow(){
		$this->cmsBaseHandler('Fellow',array('ad'=>true,'fellowBean'=>true,'fellow'=>true),'fellow',array());
	}
	public function bean(){
		$this->cmsBaseHandler('bean',array('ad'=>true,'fellowBean'=>true,'bean'=>true),'bean',array());
	}
	public function delivery(){
		$this->cmsBaseHandler('delivery',array('deliveryManagement'=>true,'delivery'=>true),'delivery',array());
	}
	public function cancel(){
		$this->cmsBaseHandler('cancel',array('deliveryManagement'=>true,'cancel'=>true),'cancel',array());
	}
	public function shipCompany(){
		$this->cmsBaseHandler('shipCompany',array('deliveryManagement'=>true,'shipCompany'=>true),'shipCompany',array());
	}
	public function branchAssign(){
		$this->cmsBaseHandler('Branch Assign',array('deliveryManagement'=>true,'branchAssign'=>true),'branchAssign',array());
	}
	public function sellingReport(){
		$this->cmsBaseHandler('selling Report',array('settlement'=>true,'sellingReport'=>true),'sellingReport',array());
	}
	public function sellerGBank(){
		$this->cmsBaseHandler('sellerGBank',array('settlement'=>true,'sellerGBank'=>true),'sellerGBank',array());
	}
	public function receiptDPC(){
		$this->cmsBaseHandler('receipt DPC',array('settlement'=>true,'receiptDPC'=>true),'receiptDPC',array());
	}
	public function receiptACurrency(){
		$this->cmsBaseHandler('receipt A Currency',array('settlement'=>true,'receiptACurrency'=>true),'waitingforonline',array());
	}
	public function receiptQexpress(){
		$this->cmsBaseHandler('receipt Qexpress',array('settlement'=>true,'receiptQexpress'=>true),'waitingforonline',array());
	}
	public function message(){
		$this->cmsBaseHandler('message',array('callCenter'=>true,'message'=>true),'message',array());
	}
	public function Qtalk(){
		$this->cmsBaseHandler('Qtalk',array('callCenter'=>true,'Qtalk'=>true),'qtalk',array());
	}
	public function bulletin(){
		$this->cmsBaseHandler('bulletin',array('callCenter'=>true,'bulletin'=>true),'bulletin',array());
	}
	public function comment(){
		$this->cmsBaseHandler('comment',array('callCenter'=>true,'comment'=>true),'comment',array());
	}
	public function eticket(){
		$this->cmsBaseHandler('e-ticket',array('EticketMgt'=>true,'eticket'=>true),'eticket',array());
	}
/*
	public function contentList(){
		$type=isset($_GET['type'])?$_GET['type']:"essay";//默认为文章
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']=$type;
		$baseUrl=$selectUrl='/admin/contentList?type='.$type;
		if(isset($_GET['column'])&& is_numeric($_GET['column'])){
			$condition['where']=array($type.'_column'=>$_GET['column']);
			$baseUrl.='&column='.$_GET['column'];
		}
		if(isset($_GET['state'])&& is_numeric($_GET['state'])){
			$condition['where']=array($type.'_state'=>$_GET['state']);
			$baseUrl.='&state='.$_GET['state'];
		}
		if(isset($_GET['search'])){
			$condition['like']=array($type.'_title'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['result']="data";
		$condition['limit']=$pageInfo['limit'];
		$condition['order_by']=array($type.'_lastmodify_time'=>'DESC');
		$data=array(
			"columns"=>$this->commongetdata->getColumns(array($type.'List'),true),
			"contents"=>$this->commongetdata->getData($condition),
			"contentState"=>$this->commongetdata->getContentState()
		);
		$data=array_merge($data,$pageInfo);
		$this->cmsBaseHandler('栏目管理','contentList',$type.'List',$data);
	}
*/
}