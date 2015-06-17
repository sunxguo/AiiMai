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
		if (!checkLogin() || (isset($_SESSION["usertype"]) && !strcmp($_SESSION["usertype"],"admin"))) {
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Please login!"));
			return false;
		}
		$user=$this->commongetdata->getContent('user',$_SESSION['userid']);
		if($user->user_confirm_email==0){
			$_SESSION['userEmail']=$user->user_email;
			$this->load->view('redirect',array("url"=>"/home/confirmEmail","info"=>"Please confirm your E-mail!"));
			return false;
		}
		return true;
	}
	public function loginHandler(){
		if(!isset($_POST["validCode"]) || strcasecmp($_POST['validCode'],$_SESSION['authcode'])!=0){
			$this->load->view('redirect',array("info"=>"Please enter the letters in the picture exactly!",'url'=>'/home/login?username='.$_POST["username"]));
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
					$_SESSION['userEmail']=$info[0]->user_email;
					if(!$this->checkUserLogin()) return false;
					$this->load->view('redirect',array("url"=>"/home"));
				}
				else{
					$this->load->view('redirect',array("info"=>"Wrong password!",'url'=>'/home/login?username='.$_POST["username"]));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"Username does not exist!",'url'=>'/home/login'));
			}
		}else{
			$this->load->view('redirect',array("info"=>"Please enter your username and password!",'url'=>'/home/login'));
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
				'websiteName'=>$websiteName,
				'categories'=>$this->commongetdata->getCategories(false)
			)
		);
		$this->load->view('home/'.$view,$data);
		$this->load->view('home/footer',$footerData);
	}
	public function index(){
		$categories=$this->commongetdata->getCategories(false);
		foreach($categories as $cat){
			$cat->featuredProducts=$this->commongetdata->getProducts(false,8,false,false,false,false,false,false,false,array("field"=>'product_modify_time',"type"=>'DESC'));
		}
		$data=array(
		//	"columns"=>$this->commongetdata->getColumns()
			"topSalesProducts"=>$this->commongetdata->getProducts(false,false,false,false,false,false,false,false,false,array("field"=>'product_modify_time',"type"=>'DESC')),
			'categories'=>$categories
		);
		$this->homeBaseHandler('Home','index',$data,array("showFooter"=>false));
	}
	public function register(){
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$this->load->library('Facebook',array(
		  'appId'  => '705101599598980',//835653329821020
		  'secret' => '344d05ab622eeb60e9c72aa03c3bb7dd',//db8ff82c09c285d593dde540b7e50f08
		));
		$user=$this->facebook->getUser();
//		print_r($user);
		if ($user) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $this->facebook->api('/me');
//			print_r($user_profile);
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
//		print_r($data);
//		print_r($_SESSION);
		$this->homeBaseHandler('Register','register',$data);
	}
	public function confirmEmail(){
		$data=array();
		$this->homeBaseHandler('Confirm E-mail!','confirmEmail',$data);
	}
	public function login(){
		$this->load->library('Facebook',array(
		  'appId'  => '835653329821020',
		  'secret' => 'db8ff82c09c285d593dde540b7e50f08',
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
		$this->homeBaseHandler('Login','login',$data);
	}
	public function category(){
		$catId=isset($_GET['cat'])?$_GET['cat']:1;
		$data=array(
			"catId"=>$catId,
			"categories"=>$this->commongetdata->getCategories(true),
		);
		$this->homeBaseHandler('Category','category',$data);
	}
	public function item(){
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		$merchant=$this->commongetdata->getContent('user',$item->product_merchant);
		$optionData=$this->commongetdata->getOptionData($_GET['itemId'],'data');
		$optionArray=array();
		foreach($optionData as $option){
			if($option->product_option_1!='' && (!isset($optionArray[0]) || !in_array($option->product_option_1,$optionArray[0])))
				$optionArray[0][]=$option->product_option_1;
			if($option->product_option_2!='' && (!isset($optionArray[1]) || !in_array($option->product_option_2,$optionArray[1])))
				$optionArray[1][]=$option->product_option_2;
			if($option->product_option_3!='' && (!isset($optionArray[2]) || !in_array($option->product_option_3,$optionArray[2])))
				$optionArray[2][]=$option->product_option_3;
		}
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"categoriesIndex"=>$this->commongetdata->getCategories(true),
			"item"=>$item,
			"itemOptionData"=>$optionData,
			"optionType"=>$optionArray,
			"merchant"=>$merchant,
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$item->product_merchant,
				"status"=>3
			)),
			"comments"=>$this->commongetdata->getComments($_GET['itemId']),
			"hotItems"=>$this->commongetdata->getHotItems($item->product_merchant),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($item->product_merchant,$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($item->product_merchant)
		);
		$this->homeBaseHandler('Item','item',$data);
	}
	public function shop(){
		if((!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])) && !isset($_GET['address'])) {
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		if(isset($_GET['address'])){
			$merchant=$this->commongetdata->getContentAdvance('user',array('merchant_shop_address'=>$_GET['address']));
			$_GET['shopId']=$merchant->user_id;
		}else{
			$merchant=$this->commongetdata->getContent('user',$_GET['shopId']);
		}
		$data=array(
			'merchant'=>$merchant,
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"hotItems"=>$this->commongetdata->getHotItems($_GET['shopId']),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($_GET['shopId'],$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($_GET['shopId'])
		);
		$this->homeBaseHandler('Shop','shop',$data);
	}
	public function allItems(){
		if(!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
		}
		$data=array(
			'merchant'=>$this->commongetdata->getContent('user',$_GET['shopId']),
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"merchantProducts"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'data',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($_GET['shopId'],$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($_GET['shopId'])
		);
		$this->homeBaseHandler('All Items','allItems',$data);
	}
	public function shopInfo(){
		if(!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
		}
		$data=array(
			'merchant'=>$this->commongetdata->getContent('user',$_GET['shopId']),
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($_GET['shopId'],$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($_GET['shopId'])
		);
		$this->homeBaseHandler('Shop Info','shopInfo',$data);
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
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid']),
			'cart'=>$this->commongetdata->getCartListByMerchants()
		);
		$this->homeBaseHandler('My Panel','panel',$data);
	}
	public function personalInfo(){
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('Personal Info','personalInfo',$data);
	}
	public function recentOrders(){
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('Recent Orders','recentOrders',$data);
	}
	public function auction(){
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('auction','auction',$data);
	}
	public function viewAll(){
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('viewAll','viewAll',$data);
	}
	public function cancelRefund(){
		if(!$this->checkUserLogin()) return false;
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('Cancel Refund','cancelRefund',$data);
	}
	public function forgotPassword(){
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid'])
		);
		$this->homeBaseHandler('Forgot Your Password','forgotPassword',$data);
	}
	public function confirmOwner(){
		$data=array(
			
		);
		$this->homeBaseHandler('Confirm Owner','confirmOwner',$data);
	}
	public function createNewPassword(){
		$data=array(
			
		);
		$this->homeBaseHandler('Create New Password','createNewPassword',$data);
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