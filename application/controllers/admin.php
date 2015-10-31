<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('CommonGetData');
		$this->commongetdata->language('admin');
		$this->commongetdata->language('cms');
		$this->load->model("dbHandler");
	}
	public function checkAdminLogin(){
		if (!isset($_SESSION['usernameAdmin'])) {
			$this->load->view('redirect',array("url"=>"/admin/login","info"=>"Please login administrator account!"));
			return false;
		}else return true;
	}
	public function login(){
		$this->load->view('admin/login',array('title'=>"Login Administrator"));
	}
	public function login_handler(){
		if(!isset($_POST['securitycode']) || strcasecmp($_POST['securitycode'],$_SESSION['authcode'])!=0){
			$this->load->view('redirect',array("info"=>"Wrong Security Code!","url"=>"/admin/login?username=".$_POST["username"]));
			return false;
		}
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$condition=array(
				'table'=>'mkadmin',
				'result'=>'data',
				'where'=>array('mkadmin_username'=>$_POST["username"])
			);
			$info=$this->dbHandler->selectData($condition);
			if(count($info,0)==1){
				$post_pwd=MD5("MonkeyKing".$_POST["pwd"]);
				$db_pwd=$info[0]->mkadmin_pwd;
				if($post_pwd==$db_pwd){
					$_SESSION['usernameAdmin']=$info[0]->mkadmin_username;
					$_SESSION['useridAdmin']=$info[0]->mkadmin_id;
					$_SESSION['usertypeAdmin']="admin";
					$this->load->view('redirect',array("url"=>"/admin/index"));
				}
				else{
					$this->load->view('redirect',array("info"=>"Wrong Password!","url"=>"/admin/login?username=".$_POST["username"]));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"Username does not exist!","url"=>"/admin/login"));
			}
		}else{
			$this->load->view('redirect',array("info"=>"Please enter your username and password!","url"=>"/admin/login"));
		}
	}
	public function logout(){
		unset($_SESSION["usernameAdmin"]);
		unset($_SESSION["useridAdmin"]);
		unset($_SESSION["usertypeAdmin"]);
		$this->load->view('redirect',array("url"=>"/admin/login"));
	}
	public function adminBaseHandler($title,$sider,$view,$data){
		$this->checkAdminLogin();
		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
//		$websiteName=$this->commongetdata->getWebsiteConfig("website_name");
		$this->load->view('admin/header',
			array(
				'title' => $title."-".$websiteName,
				'showSlider' => true,
				$sider[0] => true,
				$sider[1] => true,
				'websiteName'=>$websiteName
			)
		);
		$this->load->view('admin/'.$view,$data);
		$this->load->view('admin/footer');
	}
	public function index(){
		$condition=array(
			'table'=>'user',
			'result'=>"count",
			'where'=>array('user_is_merchant'=>1)
		);
		$merchantAmount=$this->commongetdata->getData($condition);
		$condition['where']=array('user_is_merchant'=>0);
		$userAmount=$this->commongetdata->getData($condition);
		$condition['where']=array('user_is_merchant'=>1,'merchant_status'=>1);
		$requiringMerchants=$this->commongetdata->getData($condition);
		$data=array(
			"merchantAmount"=>$merchantAmount,
			"userAmount"=>$userAmount,
			"requiringMerchants"=>$requiringMerchants,
			"requiringItems"=>$this->commongetdata->getProductsAdvance(array('result'=>'count','status'=>1))
		);
		$this->adminBaseHandler('Backend Panel',array('index','none'),'index',$data);
	}
	public function websiteLayout(){
		$categories=$this->commongetdata->getCategories(false);
		$categoriesById=$this->commongetdata->getCategories(true);
		$currentCat=isset($_GET['cat'])?$categoriesById[$_GET['cat']]:$categories[0];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"categories"=>$this->commongetdata->getCategories(false),
			"currentCat"=>$currentCat,
//			"featuredProducts"=>$this->commongetdata->getProducts(false,$currentCat,false,false,false,false,false,false,false,array("field"=>'product_modify_time',"type"=>'DESC'))
		);
		$this->adminBaseHandler('Website Layout',array('data','websiteLayout'),'websiteLayout',$data);
	}
	public function websiteCategory(){
		$categories=$this->commongetdata->getCategories(false);
		$categoriesById=$this->commongetdata->getCategories(true);
		$currentCat=isset($_GET['cat']) && isset($categoriesById[$_GET['cat']])?$categoriesById[$_GET['cat']]:$categories[0];
		$data=array(
			"categories"=>$categories,
			"currentCat"=>$currentCat,
		);
		$this->adminBaseHandler('Categories',array('data','websiteLayout'),'websiteCategory',$data);
	}
	public function items(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='product';
		$baseUrl=$selectUrl='/admin/items?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']['product_status']=$_GET['status'];
			$baseUrl.='&status='.$_GET['status'];
		}
		if(isset($_GET['listingtype'])&& is_numeric($_GET['listingtype'])){
			$condition['where']['product_sell_format']=$_GET['listingtype'];
			$baseUrl.='&listingtype='.$_GET['listingtype'];
		}
		if(isset($_GET['itemcondition'])&& is_numeric($_GET['itemcondition'])){
			$condition['where']['product_item_condition']=$_GET['itemcondition'];
			$baseUrl.='&itemcondition='.$_GET['itemcondition'];
		}
		if(isset($_GET['country'])&& is_numeric($_GET['country'])){
			$condition['where']['product_production_place_code']=$_GET['country'];
			$baseUrl.='&country='.$_GET['country'];
		}
		if(isset($_GET['adultitem'])&& is_numeric($_GET['adultitem'])){
			$condition['where']['product_adult']=$_GET['adultitem'];
			$baseUrl.='&adultitem='.$_GET['adultitem'];
		}
		if(isset($_GET['availableperiod'])&& is_numeric($_GET['availableperiod'])){
			$condition['where']['product_available_period']=$_GET['availableperiod'];
			$baseUrl.='&availableperiod='.$_GET['availableperiod'];
		}
		if(isset($_GET['beginDate'])){
			$condition['where']['product_time >=']=$_GET['beginDate'].' 00:00:00';
			$baseUrl.='&beginDate='.$_GET['beginDate'];
		}
		if(isset($_GET['endDate'])){
			$condition['where']['product_time <=']=$_GET['endDate'].' 23:59:59';
			$baseUrl.='&endDate='.$_GET['endDate'];
		}
		if(isset($_GET['minPrice'])&& is_numeric($_GET['minPrice'])){
			$condition['where']['product_sell_price >=']=$_GET['minPrice'];
			$baseUrl.='&minPrice='.$_GET['minPrice'];
		}
		if(isset($_GET['maxPrice'])&& is_numeric($_GET['maxPrice'])){
			$condition['where']['product_sell_price <=']=$_GET['maxPrice'];
			$baseUrl.='&maxPrice='.$_GET['maxPrice'];
		}
		if(isset($_GET['category'])&& is_numeric($_GET['category'])){
			$condition['where']['product_category']=$_GET['category'];
			$baseUrl.='&category='.$_GET['category'];
		}
		if(isset($_GET['subCategory'])&& is_numeric($_GET['subCategory'])){
			$condition['where']['product_sub_category']=$_GET['subCategory'];
			$baseUrl.='&subCategory='.$_GET['subCategory'];
		}
		if(isset($_GET['subSubCategory'])&& is_numeric($_GET['subSubCategory'])){
			$condition['where']['product_sub_sub_category']=$_GET['subSubCategory'];
			$baseUrl.='&subSubCategory='.$_GET['subSubCategory'];
		}
		if(isset($_GET['merchant'])){
			$merchant=$this->commongetdata->getContentAdvance('user',array('user_username'=>$_GET['merchant']));
			$condition['where']['product_merchant']=isset($merchant->user_id)?$merchant->user_id:0;
			$baseUrl.='&merchant='.$_GET['merchant'];
		}
		if(isset($_GET['search'])){
			$condition['like']['product_item_title_english']=$_GET['search'];
			$baseUrl.='&search='.$_GET['search'];
		}
		if(isset($_GET['orderName'])){
			if($_GET['orderName']=='asc')
				$condition['order_by']['product_item_title_english']='ASC';
			if($_GET['orderName']=='desc')
				$condition['order_by']['product_item_title_english']='DESC';
		}
		if(isset($_GET['orderPrice'])){
			if($_GET['orderPrice']=='asc')
				$condition['order_by']['product_sell_price']='ASC';
			if($_GET['orderPrice']=='desc')
				$condition['order_by']['product_sell_price']='DESC';
		}
		if(!isset($condition['order_by'])){
			$condition['order_by']=array('product_modify_time'=>'DESC');
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$items=$this->commongetdata->getData($condition);

		$categories=$this->commongetdata->getCategories(true);
		$status=$this->commongetdata->getProductStatus();
		$listingType=$this->commongetdata->getProductListingType();
		$deliveryType=$this->commongetdata->getProductDeliveryType();

		foreach ($items as $key => $value) {
			$value->product_category=isset($categories[$value->product_category])?$categories[$value->product_category]->category_name:'Deleted';
			$value->product_sub_category=isset($categories[$value->product_sub_category])?$categories[$value->product_sub_category]->category_name:'Deleted';
			$value->product_sub_sub_category=isset($categories[$value->product_sub_sub_category])?$categories[$value->product_sub_sub_category]->category_name:'Deleted';
			$value->product_sell_format=$listingType[$value->product_sell_format];
			$value->product_delivery_type=$deliveryType[$value->product_delivery_type];
		}
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"items"=>$items,
			"status"=>$status,
			"categories"=>$this->commongetdata->getCategories(false)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('Items',array('data','items'),'items',$data);
	}
	public function modifyItem(){
		$item=$this->commongetdata->getContent('product',$_GET['itemId']);
		$data=array(
			"categories"=>$this->commongetdata->getCategories(false),
			"item"=>$item,
			"subCatList"=>$this->commongetdata->getSubCat($item->product_category),
			"subSubCatList"=>$this->commongetdata->getSubCat($item->product_sub_category),
			"shopCategory"=>$this->commongetdata->getShopCategory($item->product_merchant)
		);
		$this->load->view('admin/modifyItem',$data);
	}
	public function modifyMerchant(){
		$merchant=$this->commongetdata->getContent('user',$_GET['merchantId']);
		$bankList=$this->commongetdata->getData(array(
				'table'=>'bank',
				'result'=>'data',
				'where'=>array('bank_status'=>1),
				'order_by'=>array('bank_order'=>'ASC'))
		);
		$data=array(
//			"categories"=>$this->commongetdata->getCategories(false),
			"merchant"=>$merchant,
			"bankList"=>$bankList
//			"subCatList"=>$this->commongetdata->getSubCat($merchant->product_category),
//			"subSubCatList"=>$this->commongetdata->getSubCat($merchant->product_sub_category),
		);
		$this->load->view('admin/modifyMerchant',$data);
	}
	public function modifyUser(){
		$user=$this->commongetdata->getContent('user',$_GET['userId']);
		$data=array(
			"user"=>$user,
		);
		$this->load->view('admin/modifyUser',$data);
	}
	public function merchants(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='user';
		$baseUrl=$selectUrl='/admin/merchants?placeholder=yes';
		$condition['where']['user_is_merchant']=1;
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']['merchant_status']=$_GET['status'];
			$baseUrl.='&status='.$_GET['status'];
		}
		if(isset($_GET['gender'])&& is_numeric($_GET['gender'])){
			$condition['where']['user_gender']=$_GET['gender'];
			$baseUrl.='&gender='.$_GET['gender'];
		}
		if(isset($_GET['country'])){
			$condition['where']['user_country']=$_GET['country'];
			$baseUrl.='&country='.$_GET['country'];
		}
		if(isset($_GET['search'])){
			$condition['like']['user_username']=$_GET['search'];
			$baseUrl.='&search='.$_GET['search'];
		}
		if(isset($_GET['orderShopTitle'])){
			if($_GET['orderShopTitle']=='asc')
				$condition['order_by']['merchant_shop_name']='ASC';
			if($_GET['orderShopTitle']=='desc')
				$condition['order_by']['merchant_shop_name']='DESC';
		}
		if(isset($_GET['orderUser'])){
			if($_GET['orderUser']=='asc')
				$condition['order_by']['user_username']='ASC';
			if($_GET['orderUser']=='desc')
				$condition['order_by']['user_username']='DESC';
		}
		if(isset($_GET['orderEmail'])){
			if($_GET['orderEmail']=='asc')
				$condition['order_by']['user_email']='ASC';
			if($_GET['orderEmail']=='desc')
				$condition['order_by']['user_email']='DESC';
		}
		if(isset($_GET['orderGrade'])){
			if($_GET['orderGrade']=='asc')
				$condition['order_by']['user_grade']='ASC';
			if($_GET['orderGrade']=='desc')
				$condition['order_by']['user_grade']='DESC';
		}
		if(isset($_GET['order14Sales'])){
			// if($_GET['order14Sales']=='asc'){
			// 	$condition['sum']='order.order_total';
			// 	$condition['group_by']='order.order_merchant';
			// 	$condition['order_by']['order_total']='ASC';
			// }
			// if($_GET['order14Sales']=='desc'){
			// 	$condition['sum']='order.order_total';
			// 	$condition['group_by']='order.order_merchant';
			// 	$condition['order_by']['order.order_total']='DESC';
			// }
		}
		if(!isset($condition['order_by'])){
			$condition['order_by']=array('user_reg_time'=>'DESC');
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$merchants=$this->commongetdata->getData($condition);
		foreach ($merchants as $key => $value) {
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
			$value->total14=$total14;
			$value->total30=$total30;

			$value->allitemsnumber=$this->commongetdata->getData(
				array(
					'table'=>'product',
					'result'=>'count',
					'where'=>array(
						'product_merchant'=>$value->user_id
					)
				)
			);
			$value->availableitemsnumber=$this->commongetdata->getData(
				array(
					'table'=>'product',
					'result'=>'count',
					'where'=>array(
						'product_merchant'=>$value->user_id,
						'product_status'=>3
					)
				)
			);
			$value->country=$this->commongetdata->getCountry($value->user_country);
		}
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"status"=>$this->commongetdata->getMerchantStatus(),
			"merchants"=>$merchants
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('merchants',array('data','merchants'),'merchants',$data);
	}
	public function users(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='user';
		$baseUrl=$selectUrl='/admin/users?placeholder=yes';
		$condition['where']['user_is_merchant']=0;
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']['user_state']=$_GET['status'];
			$baseUrl.='&status='.$_GET['status'];
		}
		if(isset($_GET['gender'])&& is_numeric($_GET['gender'])){
			$condition['where']['user_gender']=$_GET['gender'];
			$baseUrl.='&gender='.$_GET['gender'];
		}
		if(isset($_GET['country'])){
			$condition['where']['user_country']=$_GET['country'];
			$baseUrl.='&country='.$_GET['country'];
		}
		if(isset($_GET['search'])){
			$condition['like']['user_username']=$_GET['search'];
			$baseUrl.='&search='.$_GET['search'];
		}
		if(isset($_GET['orderUser'])){
			if($_GET['orderUser']=='asc')
				$condition['order_by']['user_username']='ASC';
			if($_GET['orderUser']=='desc')
				$condition['order_by']['user_username']='DESC';
		}
		if(isset($_GET['orderEmail'])){
			if($_GET['orderEmail']=='asc')
				$condition['order_by']['user_email']='ASC';
			if($_GET['orderEmail']=='desc')
				$condition['order_by']['user_email']='DESC';
		}
		if(!isset($condition['order_by'])){
			$condition['order_by']=array('user_reg_time'=>'DESC');
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$users=$this->commongetdata->getData($condition);
		foreach ($users as $value) {
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
			$value->total14=$total14;
			$value->total30=$total30;
		}
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"users"=>$users
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('users',array('data','users'),'users',$data);
	}
	public function orders(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='order';
		$baseUrl=$selectUrl='/admin/orders?placeholder=yes';
//		$condition['where']['order_merchant']=$_SESSION['userid'];
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']['order_status']=$_GET['status'];
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('order_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"orders"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('orders',array('data','orders'),'orders',$data);
	}
	public function shipCompany(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='shipcompany';
		$baseUrl=$selectUrl='/admin/shipCompany?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('shipcompany_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['search'])){
			$condition['like']=array('shipcompany_name'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('shipcompany_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"shipCompanys"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('shipCompany',array('data','shipCompany'),'shipCompany',$data);
	}
	public function advertisements(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='advertisement';
		$baseUrl=$selectUrl='/admin/advertisements?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('advertisement_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['search'])){
			$condition['like']=array('advertisement_description'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('advertisement_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"advertisements"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('advertisements',array('data','advertisements'),'advertisements',$data);
	}
	public function comments(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='comment';
		$baseUrl=$selectUrl='/admin/comments?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('comment_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['search'])){
			$condition['like']=array('comment_title'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('comment_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"comments"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('comments',array('data','comments'),'comments',$data);
	}
	public function payment(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='payment';
		$baseUrl=$selectUrl='/admin/payment?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('payment_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['search'])){
			$condition['like']=array('payment_name'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('payment_id'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"payments"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('payment',array('data','payment'),'payment',$data);
	}
	public function banklist(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='bank';
		$baseUrl=$selectUrl='/admin/bank?placeholder=yes';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('bank_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['search'])){
			$condition['like']=array('bank_name'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('bank_order'=>'ASC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			//"columns"=>$this->commongetdata->getColumns(),
			"banks"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('bank',array('data','bank'),'banklist',$data);
	}
	public function bankadd(){
		$data=array();
		$this->load->view('admin/bankAdd');
	}
	public function bankedit(){
		$bank=$this->commongetdata->getContent('bank',$_GET['bankId']);
		$data=array(
			"bank"=>$bank,
		);
		$this->load->view('admin/bankEdit',$data);
	}
	public function reportsTurnover(){
//		date("Y-m-d",strtotime('-11 day'));
		$startDate=isset($_POST['startDate'])?$_POST['startDate']:date("Y-m-d",strtotime('-11 day'));
		$endDate=isset($_POST['endDate'])?$_POST['endDate']:date("Y-m-d");
		$Date_List_start=explode("-",$startDate);
		$Date_List_end=explode("-",$endDate);
		$d1=mktime(0,0,0,$Date_List_start[1],$Date_List_start[2],$Date_List_start[0]);
		$d2=mktime(0,0,0,$Date_List_end[1],$Date_List_end[2],$Date_List_end[0]);
		$Days=round(($d2-$d1)/3600/24);
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"categories"=>$this->commongetdata->getCategories(false),
			"data"=>$this->commongetdata->getOrdersByDay($startDate,$Days+1)
		);
		$this->adminBaseHandler('Reports-Turnover',array('tool','reports'),'reportsTurnover',$data);
	}
	public function reportsProducts(){
		$startDate=isset($_POST['startDate'])?$_POST['startDate']:date("Y-m-d",strtotime('-11 day'));
		$endDate=isset($_POST['endDate'])?$_POST['endDate']:date("Y-m-d");
		$Date_List_start=explode("-",$startDate);
		$Date_List_end=explode("-",$endDate);
		$d1=mktime(0,0,0,$Date_List_start[1],$Date_List_start[2],$Date_List_start[0]);
		$d2=mktime(0,0,0,$Date_List_end[1],$Date_List_end[2],$Date_List_end[0]);
		$Days=round(($d2-$d1)/3600/24);
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"categories"=>$this->commongetdata->getCategories(false),
			"data"=>$this->commongetdata->getOrdersByDay($startDate,$Days+1)
		);
		$this->adminBaseHandler('reportsProducts',array('tool','reports'),'reportsProducts',$data);
	}
	public function account(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('account',array('tool','account'),'account',$data);
	}
	public function sendMessage(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('send Message',array('tool','sendMessage'),'sendmsg',$data);
	}
	public function asmNotice(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$baseUrl=$selectUrl='/admin/users?placeholder=yes';
		$condition['table']='notice';
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$data=array(
			"notices"=>$this->commongetdata->getData($condition)
		);
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('ASM Notice',array('tool','asmNotice'),'asmNotice',$data);
	}
	public function asmNoticeModification(){
		$notice=$this->commongetdata->getContent('notice',$_GET['noticeId']);
		$data=array(
			"notice"=>$notice,
		);
		$this->load->view('admin/asmNoticeModification',$data);
	}
	public function searchStatistics(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('search Statistics',array('tool','searchStatistics'),'searchStatistics',$data);
	}
	public function accountSetting(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('account',array('tool','account'),'accountconfig',$data);
	}
	public function basicParameter(){
		$data=array(
			"websiteConfig"=>$this->commongetdata->getWebsiteConfig("ALLINFO")
		);
		$this->adminBaseHandler('basic Parameter',array('setting','basicParameter'),'basicParameter',$data);
	}
	public function database(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('database',array('setting','database'),'database',$data);
	}
	public function securityCenter(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('security Center',array('setting','securityCenter'),'securityCenter',$data);
	}
	public function template(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('template',array('setting','template'),'template',$data);
	}
	public function emergencyContacts(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('emergency Contacts',array('setting','emergencyContacts'),'emergencyContacts',$data);
	}
	public function websiteInfoList(){
		$data=array(
			//"about"=>$this->commongetdata->getWebsiteConfig('website_about_aiimai')
		);
		$this->adminBaseHandler('websiteInfoList',array('data','websiteInfo'),'websiteInfoList',$data);
	}
	public function websiteInfo(){
		$data=array(
			"about"=>$this->commongetdata->getWebsiteConfig('website_about_aiimai')
		);
//		$this->adminBaseHandler('websiteInfo',array('data','websiteInfo'),'websiteInfo',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/websiteInfo',$data);
	}
	public function userAgreement(){
		$data=array(
			"userAgreement"=>$this->commongetdata->getWebsiteConfig('website_user_agreement')
		);
//		$this->adminBaseHandler('userAgreement',array('data','websiteInfo'),'userAgreement',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/userAgreement',$data);
	}
	public function sellerAgreement(){
		$data=array(
			"sellerAgreement"=>$this->commongetdata->getWebsiteConfig('website_seller_agreement')
		);
//		$this->adminBaseHandler('sellerAgreement',array('data','websiteInfo'),'sellerAgreement',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/sellerAgreement',$data);
	}
	public function help(){
		$data=array(
			"help"=>$this->commongetdata->getWebsiteConfig('website_help')
		);
//		$this->adminBaseHandler('help',array('data','websiteInfo'),'help',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/help',$data);
	}
	public function emailComfirmation(){
		$data=array(
			"emailComfirmationTitle"=>$this->commongetdata->getWebsiteConfig('website_confirm_email_title'),
			"emailComfirmationContent"=>$this->commongetdata->getWebsiteConfig('website_confirm_email_content'),
		);
//		$this->adminBaseHandler('emailComfirmation',array('data','websiteInfo'),'emailComfirmation',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/emailComfirmation',$data);
	}
	public function emailUserAccountRegisteredSuccessfully(){
		$data=array(
			"emailUserSuccessfullyTitle"=>$this->commongetdata->getWebsiteConfig('website_user_success_email_title'),
			"emailUserSuccessfullyContent"=>$this->commongetdata->getWebsiteConfig('website_user_success_email_content'),
		);
//		$this->adminBaseHandler('Email of UserAccount Registered Successfully',array('data','websiteInfo'),'emailUserAccountRegisteredSuccessfully',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/emailUserAccountRegisteredSuccessfully',$data);
	}
	public function emailMerchantAccountApproval(){
		//状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过 4:冻结
		$status=isset($_GET['status'])?$_GET['status']:0;
		$data=array(
			"emailMerchantApprovalTitle"=>$this->commongetdata->getWebsiteConfig('website_seller_approval_email_title'.$status),
			"emailMerchantApprovalContent"=>$this->commongetdata->getWebsiteConfig('website_seller_approval_email_content'.$status),
		);
//		$this->adminBaseHandler('Email of Merchant Account Approval',array('data','websiteInfo'),'emailMerchantAccountApproval',$data);
		$this->checkAdminLogin();
		$this->load->view('admin/emailMerchantAccountApproval',$data);
	}
	public function columnList(){
		$data=array("columns"=>$this->commongetdata->getColumns());
		$this->adminBaseHandler('columnList','columnList','columnList',$data);
	}
	public function addColumn(){
		$data=array("columns"=>$this->commongetdata->getColumns());
		$this->adminBaseHandler('添加栏目','columnList','addColumn',$data);
	}
	public function editColumn(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"currentColumn"=>$this->commongetdata->getColumn($_GET['column']),
			);
		$this->adminBaseHandler('editColumn','columnList','editColumn',$data);
	}
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
	}
	public function addContent(){
		$type=isset($_GET['type'])?$_GET['type']:"essay";//默认为文章
		$typeArray=array();
		switch($type){
			case 'essay':
				$typeArray=array('essayList','essay');
			break;
			case 'image':
				$typeArray=array('imageList');
			break;
			default:
				$typeArray=array('essayList','essay');
			break;
		}
		$data=array(
			"columns"=>$this->commongetdata->getColumns($typeArray)
		);
		$this->adminBaseHandler('添加内容','addContent','add'.ucfirst($type),$data);
	}
	public function editContent(){
		$type=isset($_GET['type'])?$_GET['type']:"essay";//默认为文章
		$typeArray=array();
		switch($type){
			case 'essay':
				$typeArray=array('essayList','essay');
			break;
			case 'image':
				$typeArray=array('imageList');
			break;
			default:
				$typeArray=array('essayList','essay');
			break;
		}
		$data=array(
			"columns"=>$this->commongetdata->getColumns($typeArray),
			"content"=>$this->commongetdata->getContent($type,$_GET[$type])
		);
		$this->adminBaseHandler('编辑内容','contentList','edit'.ucfirst($type),$data);
	}
}