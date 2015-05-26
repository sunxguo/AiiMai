<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('CommonGetData');
		$this->commongetdata->language('admin');
		$this->load->model("dbHandler");
	}
	public function checkAdminLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "admin")) {
			$this->load->view('redirect',array("url"=>"/admin/login","info"=>"Please login administrator account!"));
			return false;
		}else return true;
	}
	public function login(){
		$this->load->view('admin/login',array('title'=>"Login Administrator"));
	}
	public function login_handler(){
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
					$_SESSION['username']=$info[0]->mkadmin_username;
					$_SESSION['userid']=$info[0]->mkadmin_id;
					$_SESSION['usertype']="admin";
					$this->load->view('redirect',array("url"=>"/admin/index"));
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
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('Backend Panel',array('index','none'),'index',$data);
	}
	public function items(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='product';
		$baseUrl=$selectUrl='/admin/items';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('product_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['adult'])&& is_numeric($_GET['adult'])){
			$condition['where']=array('product_adult'=>$_GET['adult']);
			$baseUrl.='&adult='.$_GET['adult'];
		}
		if(isset($_GET['category'])&& is_numeric($_GET['category'])){
			$condition['where']=array('product_category'=>$_GET['category']);
			$baseUrl.='&category='.$_GET['category'];
		}
		if(isset($_GET['subCategory'])&& is_numeric($_GET['subCategory'])){
			$condition['where']=array('product_sub_category'=>$_GET['subCategory']);
			$baseUrl.='&subCategory='.$_GET['subCategory'];
		}
		if(isset($_GET['subSubCategory'])&& is_numeric($_GET['subSubCategory'])){
			$condition['where']=array('product_sub_sub_category'=>$_GET['subSubCategory']);
			$baseUrl.='&subSubCategory='.$_GET['subSubCategory'];
		}
		if(isset($_GET['search'])){
			$condition['like']=array('product_item_title_english'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('product_modify_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"items"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('Items',array('data','items'),'items',$data);
	}
	public function merchants(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='merchant';
		$baseUrl=$selectUrl='/admin/merchants';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('merchant_status'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['gender'])&& is_numeric($_GET['gender'])){
			$condition['where']=array('merchant_gender'=>$_GET['gender']);
			$baseUrl.='&gender='.$_GET['gender'];
		}
		if(isset($_GET['search'])){
			$condition['like']=array('merchant_username'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('merchant_reg_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"merchants"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('merchants',array('data','merchants'),'merchants',$data);
	}
	public function users(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='user';
		$baseUrl=$selectUrl='/admin/users';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('user_state'=>$_GET['status']);
			$baseUrl.='?status='.$_GET['status'];
		}else{
			$baseUrl.='?status=0';
		}
		if(isset($_GET['gender'])&& is_numeric($_GET['gender'])){
			$condition['where']=array('user_gender'=>$_GET['gender']);
			$baseUrl.='&gender='.$_GET['gender'];
		}
		if(isset($_GET['search'])){
			$condition['like']=array('user_username'=>$_GET['search']);
			$baseUrl.='&search='.$_GET['search'];
		}
		$condition['result']="count";
		$amount=$this->commongetdata->getData($condition);
		$condition['result']="data";
		$condition['order_by']=array('user_reg_time'=>'DESC');
		$pageInfo=$this->commongetdata->getPageLink($baseUrl,$selectUrl,$page,$amountPerPage,$amount);
		$condition['limit']=$pageInfo['limit'];
		$data=array(
			"columns"=>$this->commongetdata->getColumns(),
			"users"=>$this->commongetdata->getData($condition)
		);
		$data=array_merge($data,$pageInfo);
		$this->adminBaseHandler('users',array('data','users'),'users',$data);
	}
	public function orders(){
		if(isset($_GET['page'])&& is_numeric($_GET['page'])) $page=$_GET['page'];
		else $page=1;
		$amountPerPage=20;
		$condition['table']='order';
		$baseUrl=$selectUrl='/admin/orders';
		if(isset($_GET['status'])&& is_numeric($_GET['status'])){
			$condition['where']=array('order_status'=>$_GET['status']);
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
		$baseUrl=$selectUrl='/admin/shipCompany';
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
		$baseUrl=$selectUrl='/admin/advertisements';
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
		$baseUrl=$selectUrl='/admin/comments';
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
		$baseUrl=$selectUrl='/admin/payment';
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
			"columns"=>$this->commongetdata->getColumns()
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
	public function websiteInfo(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('websiteInfo',array('setting','websiteInfo'),'websiteInfo',$data);
	}
	public function userAgreement(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('userAgreement',array('setting','websiteInfo'),'userAgreement',$data);
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