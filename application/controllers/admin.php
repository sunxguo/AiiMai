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
		$this->adminBaseHandler('Backend Panel',array('index','none'),'index',array());
	}
	public function items(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('Items',array('data','items'),'items',$data);
	}
	public function merchants(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('merchants',array('data','merchants'),'merchants',$data);
	}
	public function users(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('users',array('data','users'),'users',$data);
	}
	public function orders(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('orders',array('data','orders'),'orders',$data);
	}
	public function shipCompany(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('shipCompany',array('data','shipCompany'),'shipCompany',$data);
	}
	public function advertisements(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('advertisements',array('data','advertisements'),'advertisements',$data);
	}
	public function comments(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('comments',array('data','comments'),'comments',$data);
	}
	public function payment(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('payment',array('data','payment'),'payment',$data);
	}
	public function reportsTurnover(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('Reports-Turnover',array('tool','reports'),'reportsTurnover',$data);
	}
	public function reportsProducts(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
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