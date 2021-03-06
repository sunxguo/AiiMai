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
	public function phpinfo(){
		phpinfo();
	}
	public function checkUserLogin(){
		if(!checkLogin()) {
			$this->load->view('redirect',array("url"=>"/home/login","info"=>"Please login!"));
			return false;
		}
		$user=$this->commongetdata->getContent('user',$_SESSION['userid']);
		if($user->user_confirm_email==0){
			$_SESSION['userEmail']=$user->user_email;
			$this->load->view('redirect',array("url"=>"/home/confirmEmail?auto=no","info"=>"Please confirm your E-mail!"));
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
		$this->load->view('redirect',array("info"=>"You have successfully logged out.","url"=>'/home'));
	}
	public function homeBaseHandler($title,$view,$data,$footerData=array()){
		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
		$wishlists=array();
		if(isset($_SESSION['userid'])){
			$parameters=array(
				'table'=>'wishlist',
				'result'=>'data',
				'where'=>array("wishlist_userid"=>$_SESSION['userid']),
				'order_by'=>array('wishlist_time'=>'DESC'),
				'limit'=>array("limit"=>5,"offset"=>0)
			);
			$wishlists=$this->commongetdata->getData($parameters);
			foreach ($wishlists as $value) {
				$value->product=$this->commongetdata->getContent('product',$value->wishlist_productid);
			}
		}
		$this->load->view('home/header',
			array(
				'title' => $websiteName."-".$title,
				'pageName'=>$view,
				'websiteName'=>$websiteName,
				'wishlists'=>$wishlists,
				'categories'=>$this->commongetdata->getCategories(false),

			)
		);
		$this->load->view('home/'.$view,$data);
		$this->load->view('home/footer',$footerData);
	}
	public function index(){
		$categories=$this->commongetdata->getCategories(false);
		foreach($categories as $cat){
			$cat->featuredProducts=$this->commongetdata->getProducts(false,8,false,false,false,3,false,false,false,array("field"=>'product_modify_time',"type"=>'DESC'));
		}
		$data=array(
		//	"columns"=>$this->commongetdata->getColumns()
			"topSalesProducts"=>$this->commongetdata->getProducts(false,false,false,false,3,false,false,false,false,array("field"=>'product_modify_time',"type"=>'DESC'),false,false,false,false,2),
			'categories'=>$categories
		);
		$this->homeBaseHandler('Home','index',$data,array("showFooter"=>false));
	}
	public function register(){
		/*
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
		);*/
//		print_r($data);
//		print_r($_SESSION);
		$this->homeBaseHandler('Register','register',array());
	}
	public function confirmEmail(){
		$data=array();
		$this->homeBaseHandler('Confirm E-mail!','confirmEmail',$data);
	}
	public function registerByFB(){
		$data=array();
		$this->homeBaseHandler('Register!','registerByFB',$data);
	}
	public function login(){
		/*
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
		);*/
		$this->homeBaseHandler('Login','login',array());
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
		if(!isset($_GET['itemId']) || !is_numeric($_GET['itemId'])){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		if(!isset($item->product_id)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$merchant=$this->commongetdata->getContent('user',$item->product_merchant);
		if(!isset($merchant->user_id)){
			$this->load->view('redirect',array("info"=>"This seller does not exist!",'url'=>'/home'));
			return false;
		}
		$optionData=$this->commongetdata->getOptionData($_GET['itemId'],'data');
		$optionArray=array();
		// $itemStockArray()=array();
		// $option->product_option_stock;
		foreach($optionData as $option){
			//$optionArray[0][0]='Please select.';
			if($option->product_option_1!='' && (!isset($optionArray[0]) || !in_array($option->product_option_1,$optionArray[0]))){
				$optionArray[0][]=$option->product_option_1;
			}
			if($option->product_option_2!='' && (!isset($optionArray[1]) || !in_array($option->product_option_2,$optionArray[1]))){
				//$optionArray[1][0]='[Please choose the above option first.]';
				$optionArray[1][]=$option->product_option_2;
			}
			if($option->product_option_3!='' && (!isset($optionArray[2]) || !in_array($option->product_option_3,$optionArray[2]))){
				//$optionArray[2][0]='[Please choose the above option first.]';
				$optionArray[2][]=$option->product_option_3;
			}
		}
		//设置浏览记录
		$recentlyViewedProducts=isset($_COOKIE['recentlyViewedProducts'])?json_decode($_COOKIE['recentlyViewedProducts']):array();
		if(!in_array($_GET['itemId'],$recentlyViewedProducts)){
			array_unshift($recentlyViewedProducts,$_GET['itemId']);
		}
		setcookie('recentlyViewedProducts',json_encode($recentlyViewedProducts),time()+3600*24*60);
		$recentlyViewedProductsArray=array();
		foreach ($recentlyViewedProducts as $value) {
			$recentlyViewedProductsArray[]=$this->commongetdata->getContent('product',$value);
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
			"enquiries"=>$this->commongetdata->getEnquiries($_GET['itemId']),
			"hotItems"=>$this->commongetdata->getFocusItems($item->product_merchant),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($item->product_merchant,$_SESSION['userid']):false,
			"wishlist"=>isset($_SESSION['userid'])?$this->commongetdata->getWishList($item->product_id,$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($item->product_merchant),
			"relatedProducts"=>$this->commongetdata->getRelatedProducts($_GET['itemId'],20),
			"recentlyViewedProducts"=>$recentlyViewedProductsArray
		);
		$category=$this->commongetdata->getContent('category',$item->product_category);
		if(isset($category->category_fid)){
			$data['fCategoryId']=$category->category_fid;
		}else{
			$data['fCategoryId']=0;
		}
		$this->homeBaseHandler($item->product_item_title_english,'item',$data);
	}
	public function shop(){
		if((!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])) && (!isset($_GET['address']) || $_GET['address']=='')){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		if(isset($_GET['address'])){
			$merchant=$this->commongetdata->getContentAdvance('user',array('merchant_shop_address'=>$_GET['address']));
			$_GET['shopId']=$merchant->user_id;
		}else{
			$merchant=$this->commongetdata->getContent('user',$_GET['shopId']);
		}
		if(!isset($merchant->user_id)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$categoryId=isset($_GET['category'])?$_GET['category']:'all';
		$categoryType=$merchant->merchant_shop_category_type;//0:AiiMai Category   1: Customized Category
		$category=$this->commongetdata->getShopCategory($_GET['shopId'],$categoryType==0?false:true);
		$subCategory=$this->commongetdata->getShopSubCategory($_GET['shopId'],$categoryId,$categoryType==0?false:true);
		foreach ($subCategory as $key => $value) {
			$miniParameters=array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
//				"shopCategory"=>$categoryId,
//				"shopSubCategory"=>$value->shopcategory_id,
				"status"=>3
			);
			if($categoryType==1){
				$miniParameters['shopSubCategory']=$value->shopcategory_id;
			}
			else{
				$miniParameters['category']=$value->category_id;
			}
			if($categoryId!='all'){
				if($categoryType==1){
					$miniParameters["shopCategory"]=$categoryId;
				}else{
					$miniParameters["category"]=$value->category_id;
				}
			}
			$value->count=$this->commongetdata->getProductsAdvance($miniParameters);
		}
		$parameters=array(
			"result"=>'data',
			"merchant"=>$_GET['shopId'],
			"status"=>3
		);
		if(isset($_GET['category']) && $_GET['category']!='all'){
			if($categoryType==1){
				$parameters['shopCategory']=$_GET['category'];
			}
			// else{
			// 	$parameters['category']=$_GET['category'];
			// }
		}
		if(isset($_GET['subCategory'])){
			if($categoryType==1){
				$parameters['shopSubCategory']=$_GET['subCategory'];
			}else{
				$parameters['category']=$_GET['subCategory'];
			}
		}
		$items=$this->commongetdata->getProductsAdvance($parameters);
		$data=array(
			'merchant'=>$merchant,
			'categoryType'=>$merchant->merchant_shop_category_type,
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"items"=>$items,
			"focusItem"=>$this->commongetdata->getFocusItems($_GET['shopId']),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($_GET['shopId'],$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($_GET['shopId']),
			"category"=>$category,
//			"allCategories"=>$this->commongetdata->getCategories(false),
			"subCategory"=>$subCategory
		);
		// print_r($subCategory);
		$this->homeBaseHandler('Shop','shop',$data);
	}
	public function allItems(){
		if(!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
		}
		$merchant=$this->commongetdata->getContent('user',$_GET['shopId']);
		if(!isset($merchant->user_id)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$data=array(
			'merchant'=>$merchant,
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
		$merchant=$this->commongetdata->getContent('user',$_GET['shopId']);
		if(!isset($merchant->user_id)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$data=array(
			'merchant'=>$merchant,
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
	public function shopFaq(){
		if(!isset($_GET['shopId']) || !is_numeric($_GET['shopId'])){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
		}
		$merchant=$this->commongetdata->getContent('user',$_GET['shopId']);
		if(!isset($merchant->user_id)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$data=array(
			'merchant'=>$merchant,
			"merchantProductsAmount"=>$this->commongetdata->getProductsAdvance(array(
				"result"=>'count',
				"merchant"=>$_GET['shopId'],
				"status"=>3
			)),
			"follow"=>isset($_SESSION['userid'])?$this->commongetdata->getFollow($_GET['shopId'],$_SESSION['userid']):false,
			"followNo"=>$this->commongetdata->getFollowNo($_GET['shopId'])
		);
		$this->homeBaseHandler('shop FAQ','shopFaq',$data);
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
		$condition=array(
			'table'=>'address',
			'result'=>'data',
			'where'=>array('address_userid'=>$_SESSION['userid'],'address_type'=>6)
		);
		$addresses=$this->commongetdata->getData($condition);
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid']),
			'addresses'=>$addresses
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
	public function followingShop(){
		if(!$this->checkUserLogin()) return false;
		$parameters=array(
			'table'=>'follow',
			'result'=>'data',
			'where'=>array("follow_user_id"=>$_SESSION['userid'])
		);
		$folows=$this->commongetdata->getData($parameters);
		foreach ($folows as $value) {
			$value->merchant=$this->commongetdata->getContent('user',$value->follow_merchant_id);
		}
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid']),
			'follows'=>$folows
		);
		$this->homeBaseHandler('following Shop','followingShop',$data);
	}
	public function wishList(){
		if(!$this->checkUserLogin()) return false;
		$parameters=array(
			'table'=>'wishlist',
			'result'=>'data',
			'where'=>array("wishlist_userid"=>$_SESSION['userid'])
		);
		$wishlists=$this->commongetdata->getData($parameters);
		foreach ($wishlists as $value) {
			$value->product=$this->commongetdata->getContent('product',$value->wishlist_productid);
			$value->merchant=$this->commongetdata->getContent('user',$value->product->product_merchant);
		}
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid']),
			'wishlists'=>$wishlists
		);
		$this->homeBaseHandler('Wish List','wishList',$data);
	}
	public function enquiries(){
		if(!$this->checkUserLogin()) return false;
		$parameters=array(
			'table'=>'enquiry',
			'result'=>'data',
			'where'=>array("enquiry_user"=>$_SESSION['userid'])
		);
		$enquiries=$this->commongetdata->getData($parameters);
		foreach ($enquiries as $value) {
			$value->product=$this->commongetdata->getContent('product',$value->enquiry_product);
			$value->merchant=$this->commongetdata->getContent('user',$value->product->product_merchant);
		}
		$data=array(
			'user'=>$this->commongetdata->getContent('user',$_SESSION['userid']),
			'enquiries'=>$enquiries
		);
		$this->homeBaseHandler('My enquiries','enquiries',$data);
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
	public function search(){
		$keywords=$_GET['keywords'];
		$parameters=array(
			'result'=>'data',
			'status'=>3,
			'like'=>array('product_item_title_english'=>$keywords)
		);
		if(isset($_GET['sortBy'])){
			switch($_GET['sortBy']){
				case 'ARanking':
				break;
				case 'PriceA':
					$parameters['orderBy']=array('product_sell_price'=>'asc');
				break;
				case 'PriceD':
					$parameters['orderBy']=array('product_sell_price'=>'desc');
				break;
				case 'Popularity':
					$parameters['orderBy']=array('product_view_count'=>'desc');
				break;
				case 'Sale':
					$parameters['orderBy']=array('product_sold_count'=>'desc');
				break;
				case 'NewlyListed':
					$parameters['orderBy']=array('product_time'=>'desc');
				break;
				default:
				break;
			}
		}
		if(isset($_GET['priceRange'])){
			switch($_GET['priceRange']){
				case 0:
				break;
				case 1:
					$parameters['priceBegin']=0;
					$parameters['priceEnd']=9.00;
				break;
				case 2:
					$parameters['priceBegin']=10;
					$parameters['priceEnd']=24.99;
				break;
				case 3:
					$parameters['priceBegin']=25;
					$parameters['priceEnd']=49.99;
				break;
				case 4:
					$parameters['priceBegin']=50;
					$parameters['priceEnd']=99.99;
				break;
				case 5:
					$parameters['priceBegin']=100;
					$parameters['priceEnd']=249.00;
				break;
				case 6:
					$parameters['priceBegin']=250;
				break;
			}
		}
		$products=$this->commongetdata->getProductsAdvance($parameters);
		foreach ($products as $key => $value) {
			$value->merchant=$this->commongetdata->getContent('user',$value->product_merchant);
		}
		$data=array(
			'products'=>$products,
			'shops'=>$this->commongetdata->getMerchantsAdvance(array('result'=>'data','like'=>array('merchant_shop_name'=>$keywords)))
		);
		$this->homeBaseHandler('Search - '.$keywords,'search',$data);
	}
	public function info(){
		$key=isset($_GET['key'])?$_GET['key']:'';
		switch($key){
			case 'about':
				$key='website_about_aiimai';
			break;
			case 'userAgreement':
				$key='website_user_agreement';
			break;
			case 'help':
				$key='website_help';
			break;
			case 'sellerAgreement':
				$key='website_seller_agreement';
			break;
		}
		$info=$this->commongetdata->getContentAdvance('websiteconfig',array('key_websiteconfig'=>$key));
		if(!isset($info->key_websiteconfig)){
			$this->load->view('redirect',array("info"=>"Wrong url!",'url'=>'/home'));
			return false;
		}
		$data=array(
			'info'=>$info
		);
		$this->homeBaseHandler('Info - '.$key,'info',$data);
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