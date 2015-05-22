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
	public function checkMerchantLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "merchant")) {
			$this->load->view('redirect',array("url"=>"/cms/login","info"=>"Please login merchant account!"));
			return false;
		}else return true;
	}
	public function login(){
		$this->load->view('cms/login',array('title'=>"Login ASM"));
	}
	public function loginHandler(){
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$condition=array(
				'table'=>'merchant',
				'result'=>'data',
				'where'=>array('merchant_username'=>$_POST["username"])
			);
			$info=$this->dbHandler->selectData($condition);
			if(count($info,0)==1){
				$post_pwd=MD5("MonkeyKing".$_POST["pwd"]);
				$db_pwd=$info[0]->merchant_pwd;
				if($post_pwd==$db_pwd){
					$_SESSION['username']=$info[0]->merchant_username;
					$_SESSION['userid']=$info[0]->merchant_id;
					$_SESSION['usertype']="merchant";
					$this->load->view('redirect',array("url"=>"/cms/index"));
				}
				else{
					$this->load->view('redirect',array("info"=>"Wrong Password!"));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"Username does not exist!"));
			}
		}else{
			$this->load->view('redirect',array("info"=>"Please enter your username and password!"));
		}
	}
	public function logout(){
		unset($_SESSION["username"]);
		unset($_SESSION["userid"]);
		unset($_SESSION["usertype"]);
		$this->load->view('redirect',array("url"=>"/cms/login"));
	}
	public function cmsBaseHandler($title,$sider,$view,$data){
		$this->checkMerchantLogin();
		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
		$this->load->view('cms/header',
			array(
				'title' => $websiteName."-",
				'showSider' => true,
				'sider' => $sider,
				'websiteName'=>$websiteName
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
				'websiteName'=>"AiiMai"
			)
		);
		$this->load->view('home/sellerregister',$data);
		$this->load->view('home/footer',array());
	}
	public function registerInformation(){
		$data=array();
		$this->load->view('home/header',
			array(
				'title' => "Seller Information-AiiMai",
				'websiteName'=>"AiiMai"
			)
		);
		$this->load->view('home/sellerInformation',$data);
		$this->load->view('home/footer',array());
	}
	public function index(){
		$this->cmsBaseHandler('ASM Management',array('index'=>true),'index',array());
	}
	public function myInfo(){
		$this->cmsBaseHandler('My Info',array('baseInfo'=>true,'myInfo'=>true),'myInfo',array());
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
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopBaseInfo'=>true),'shopBaseInfo',array());
	}
	public function shopHomePage(){
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopHomePage'=>true),'shopHomePage',array());
	}
	public function shopDiscount(){
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopDiscount'=>true),'shopDiscount',array());
	}
	public function shopCategory(){
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopCategory'=>true),'shopCategory',array());
	}
	public function shopInfo(){
		$this->cmsBaseHandler('Shop',array('baseInfo'=>true,'shop'=>true,'shopInfo'=>true),'shopInfo',array());
	}
	public function goodsStatistics(){
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsStatistics'=>true),'goodsStatistics',array());
	}
	public function goodsAdd(){
		$categories=$this->commongetdata->getCategories(false);
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsAdd'=>true),'goodsAdd',array('categories'=>$categories));
	}
	public function goodsCopy(){
		$this->cmsBaseHandler('Item List/Edit',array('goodsManagement'=>true,'goods'=>true,'goodsCopy'=>true),'goodsCopy',array());
	}
	public function goodsEdit(){
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false)
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
		);
		$this->load->view('cms/modifyGoods',$data);
	}
	public function auctionGoods(){
		$this->cmsBaseHandler('auction',array('goodsManagement'=>true,'auction'=>true,'auctionGoods'=>true),'auctionGoods',array());
	}
	public function auctionBid(){
		$this->cmsBaseHandler('auction',array('goodsManagement'=>true,'auction'=>true,'auctionBid'=>true),'auctionBid',array());
	}
	public function groupBuy(){
		$this->cmsBaseHandler('groupBuy',array('goodsManagement'=>true,'groupBuy'=>true),'groupBuy',array());
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
		$this->cmsBaseHandler('bigData',array('goodsManagement'=>true,'bigData'=>true),'bigData',array());
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
		$this->cmsBaseHandler('selling Report',array('settlement'=>true,'sellingReport'=>true),'waitingforonline',array());
	}
	public function sellerGBank(){
		$this->cmsBaseHandler('sellerGBank',array('settlement'=>true,'sellerGBank'=>true),'waitingforonline',array());
	}
	public function receiptDPC(){
		$this->cmsBaseHandler('receipt DPC',array('settlement'=>true,'receiptDPC'=>true),'waitingforonline',array());
	}
	public function receiptACurrency(){
		$this->cmsBaseHandler('receipt A Currency',array('settlement'=>true,'receiptACurrency'=>true),'waitingforonline',array());
	}
	public function receiptQexpress(){
		$this->cmsBaseHandler('receipt Qexpress',array('settlement'=>true,'receiptQexpress'=>true),'waitingforonline',array());
	}
	public function message(){
		$this->cmsBaseHandler('message',array('callCenter'=>true,'message'=>true),'waitingforonline',array());
	}
	public function Qtalk(){
		$this->cmsBaseHandler('Qtalk',array('callCenter'=>true,'Qtalk'=>true),'waitingforonline',array());
	}
	public function bulletin(){
		$this->cmsBaseHandler('bulletin',array('callCenter'=>true,'bulletin'=>true),'waitingforonline',array());
	}
	public function comment(){
		$this->cmsBaseHandler('comment',array('callCenter'=>true,'comment'=>true),'waitingforonline',array());
	}
	public function eticket(){
		$this->cmsBaseHandler('e-ticket',array('EticketMgt'=>true,'eticket'=>true),'waitingforonline',array());
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