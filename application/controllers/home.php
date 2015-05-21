<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('CommonGetData');
		$this->commongetdata->language();
		$this->load->model("dbHandler");
	}
	public function checkUserLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "user")) {
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Please login!"));
			return false;
		}else return true;
	}
	public function loginHandler(){
		if(!isset($_POST["validCode"]) || strcasecmp($_POST['validCode'],$_SESSION['authcode'])!=0){
			$this->load->view('redirect',array("info"=>"Please enter the letters in the picture exactly!"));
		}
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$condition=array(
				'table'=>'user',
				'result'=>'data',
				'where'=>array('user_username'=>$_POST["username"])
			);
			$info=$this->dbHandler->selectData($condition);
			if(count($info,0)==1){
				$post_pwd=MD5("MonkeyKing".$_POST["pwd"]);
				$db_pwd=$info[0]->user_pwd;
				if($post_pwd==$db_pwd){
					$_SESSION['username']=$info[0]->user_username;
					$_SESSION['userid']=$info[0]->user_id;
					$_SESSION['usertype']="user";
					$this->load->view('redirect',array("url"=>"/home"));
				}
				else{
					$this->load->view('redirect',array("info"=>"Wrong password!"));
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
		$this->load->view('redirect',array());
	}
	public function homeBaseHandler($title,$view,$data,$footerData=array()){
		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
		$this->load->view('home/header',
			array(
				'title' => $title."-".$websiteName,
				'websiteName'=>$websiteName
			)
		);
		$this->load->view('home/'.$view,$data);
		$this->load->view('home/footer',$footerData);
	}
	public function index(){
		$data=array(
		//	"columns"=>$this->commongetdata->getColumns()
		);
		$this->homeBaseHandler('Home','index',$data,array("showFooter"=>false));
	}
	public function register(){
		$this->load->library('Facebook',array(
		  'appId'  => '705101599598980',
		  'secret' => '344d05ab622eeb60e9c72aa03c3bb7dd',
		));
		$user=$this->facebook->getUser();
		if ($user) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $this->facebook->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		  }
		}
		// Login or logout url will be needed depending on current user state.
		if ($user) {
		  $logoutUrl = $this->facebook->getLogoutUrl();
		} else {
		  $loginUrl = $this->facebook->getLoginUrl();
		}
		$data=array(
			'user'=>$user,
			'profile'=>$user?$user_profile:array(),
			'logoutUrl'=>$user?$logoutUrl:'',
			'loginUrl'=>$user?'':$loginUrl
		);
		print_r($data);
		$this->homeBaseHandler('Register','register',$data);
	}
	public function confirmEmail(){
		$data=array();
		$this->homeBaseHandler('Confirm E-mail!','confirmEmail',$data);
	}
	public function login(){
		$data=array();
		$this->homeBaseHandler('Login','login',$data);
	}
	public function category(){
		$data=array();
		$this->homeBaseHandler('Category','category',$data);
	}
	public function item(){
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		$merchant=$this->commongetdata->getContent('merchant',$item->product_merchant);
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"categoriesIndex"=>$this->commongetdata->getCategories(true),
			"item"=>$item,
			"merchant"=>$merchant
		);
		$this->homeBaseHandler('Item','item',$data);
	}
	public function shop(){
		$data=array(
			'merchant'=>$this->commongetdata->getContent('merchant',$_GET['shopId'])
		);
		$this->homeBaseHandler('Shop','shop',$data);
	}
	public function cart(){
		$data=array(
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('Cart','cart',$data);
	}
	public function placeOrder(){
		$data=array(
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('Place Order','placeOrder',$data);
	}
	public function mypanel(){
		$this->checkUserLogin();
		$data=array(
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('My Panel','panel',$data);
	}
	public function recentOrders(){
		$this->checkUserLogin();
		$data=array(
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('Recent Orders','recentOrders',$data);
	}
	public function cancelRefund(){
		$this->checkUserLogin();
		$data=array(
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('Cancel Refund','cancelRefund',$data);
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
		$this->adminBaseHandler('栏目管理','contentList',$type.'List',$data);
	}*/
}