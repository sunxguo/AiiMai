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
			$this->load->view('redirect',array("url"=>"/admin/login","info"=>"请先登录管理员账号"));
			return false;
		}else return true;
	}
	public function login(){
		$this->load->view('admin/login',array('title'=>"管理员登录"));
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
					$this->load->view('redirect',array("info"=>"密码错误"));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"用户名不存在"));
			}
		}else{
			$this->load->view('redirect',array("info"=>"请输入用户名和密码"));
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
		$this->adminBaseHandler('后台管理系统',array('index','none'),'index',array());
	}
	public function items(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('商品管理',array('data','items'),'items',$data);
	}
	public function merchants(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('商户管理',array('data','merchants'),'merchants',$data);
	}
	public function users(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('用户管理',array('data','users'),'users',$data);
	}
	public function orders(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('订单管理',array('data','orders'),'orders',$data);
	}
	public function shipCompany(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('运送公司管理',array('data','shipCompany'),'shipCompany',$data);
	}
	public function advertisements(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('广告管理',array('data','advertisements'),'advertisements',$data);
	}
	public function comments(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('评论管理',array('data','comments'),'comments',$data);
	}
	public function payment(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('支付方式管理',array('data','payment'),'payment',$data);
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
		$this->adminBaseHandler('报表统计-商品',array('tool','reports'),'reportsProducts',$data);
	}
	public function account(){
		$data=array(
			"columns"=>$this->commongetdata->getColumns()
		);
		$this->adminBaseHandler('账户管理',array('tool','reports'),'account',$data);
	}
	public function columnList(){
		$data=array("columns"=>$this->commongetdata->getColumns());
		$this->adminBaseHandler('栏目管理','columnList','columnList',$data);
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
		$this->adminBaseHandler('编辑栏目','columnList','editColumn',$data);
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