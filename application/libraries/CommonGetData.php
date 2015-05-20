<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class CommonGetData{
	var $CI;
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model("dbHandler");
	}
	/**
	 * 获取网站配置信息
	 * return array or string
	 */
	public function getWebsiteConfig($info="ALLINFO"){
		$condition=array(
			'table'=>'websiteconfig',
			'result'=>'data'
		);
		if($info!="ALLINFO") $condition['where']=array('key_websiteconfig'=>$info);
		$result=$this->CI->dbHandler->selectData($condition);
		if($info!="ALLINFO") return $result[0]->value_websiteconfig;
		else {
			$newArray=array();
			foreach($result as $value){
				$newArray[$value->key_websiteconfig]=$value->value_websiteconfig;
			}
			return $newArray;
		}
	}
	public function language($type='home'){
		$this->CI->load->helper('language');
		if(isset($_SESSION['language'])){
			if($_SESSION['language']=="english"){
				$this->CI->config->set_item('language', 'english');
				$this->CI->load->language($type,'english');
				return true;
			}elseif($_SESSION['language']=="tw_cn"){
				$this->CI->config->set_item('language', 'tw_cn');
				$this->CI->load->language($type,'tw_cn');
				return true;
			}else{
				$this->CI->config->set_item('language', 'zh_cn');
				$this->CI->load->language($type,'zh_cn');
				return true;
			}
		}
		//判断浏览器语言
		$default_lang_arr = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$strarr = explode(",",$default_lang_arr);
		$default_lang = $strarr[0];
//		echo '1'.$default_lang;
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); //只取前4位，这样只判断最优先的语言。如果取前5位，可能出现en,zh的情况，影响判断。  
		if (preg_match("/en/i", $lang)){ 
			$this->CI->config->set_item('language', 'english');
			// 根据设置的语言类型加载语言包
			$this->CI->load->language($type,'english');
			$_SESSION['language']='english';
		}
		elseif (preg_match("/zh-c/i", $lang)){
			$this->CI->config->set_item('language', 'zh_cn');
			$this->CI->load->language($type,'zh_cn');
			$_SESSION['language']='zh_cn';
		}
		elseif (preg_match("/zh/i", $lang)){ 
			$this->CI->config->set_item('language', 'tw_cn');
			$this->CI->load->language($type,'tw_cn');
			$_SESSION['language']='tw_cn';
		}else{
			$this->CI->config->set_item('language', 'zh_cn');
			$this->CI->load->language($type,'zh_cn');
			$_SESSION['language']='zh_cn';
		}
/*		// 根据浏览器类型设置语言
		if($default_lang == 'en-us' || $default_lang == 'en'){
			$this->CI->config->set_item('language', 'english');
			// 根据设置的语言类型加载语言包
			$this->CI->load->language('cms','english');
		}elseif( $default_lang == 'en-us' || $default_lang=='zh-CN'){
			$this->CI->config->set_item('language', 'zh_cn');
			$this->CI->load->language('cms','zh_cn');
		}
		// 当前语言
		echo $this->CI->config->item('language');*/
	}
	/**
	 * 按格式获取栏目信息
	 * 指定某些类型的栏目$typeArray=array(),是否按id做索引 $index=false
	 * return array
	 */
	public function getColumns($typeArray=array(),$index=false){
		$condition=array(
			'table'=>'column',
			'result'=>'data',
			'where'=>array('column_fid'=>'0'),
			'order_by'=>array('column_ordernum'=>'ASC')
		);
		$typeArray=$this->getColumnTypeArray($typeArray);
		if(sizeof($typeArray)>0) $condition['where_in']['column_type']=$typeArray;
		$columns=$this->CI->dbHandler->selectData($condition);
		foreach($columns as $col){
			$condition=array(
				'table'=>'column',
				'result'=>'data',
				'where'=>array('column_fid'=>$col->column_id),
				'order_by'=>array('column_ordernum'=>'ASC')
			);
			if(sizeof($typeArray)>0) $condition['where_in']['column_type']=$typeArray;
			$col->subColumns=$this->CI->dbHandler->selectData($condition);
		}
		if($index){
			$indexColumn=array();
			foreach($columns as $col){
				$indexColumn[$col->column_id]=$col;
				foreach($col->subColumns as $subCol){
					$indexColumn[$subCol->column_id]=$subCol;
				}
			}
			$columns=$indexColumn;
		}
		return $columns;
	}
	/**
	 * 按格式获取分类信息
	 * 指定某些类型的栏目$typeArray=array(),是否按id做索引 $index=false
	 * return array
	 */
	public function getCategories($index=false){
		$condition=array(
			'table'=>'category',
			'result'=>'data',
			'where'=>array('category_fid'=>'0'),
			'order_by'=>array('category_order'=>'ASC')
		);
		$categories=$this->CI->dbHandler->selectData($condition);
		foreach($categories as $cat){
			$condition=array(
				'table'=>'category',
				'result'=>'data',
				'where'=>array('category_fid'=>$cat->category_id),
				'order_by'=>array('category_order'=>'ASC')
			);
			$cat->subCats=$this->CI->dbHandler->selectData($condition);
			foreach($cat->subCats as $subCat){
				$condition=array(
					'table'=>'category',
					'result'=>'data',
					'where'=>array('category_fid'=>$subCat->category_id),
					'order_by'=>array('category_order'=>'ASC')
				);
				$subCat->subSubCats=$this->CI->dbHandler->selectData($condition);
				foreach($subCat->subSubCats as $subSubCat){
					$condition=array(
						'table'=>'category',
						'result'=>'data',
						'where'=>array('category_fid'=>$subSubCat->category_id),
						'order_by'=>array('category_order'=>'ASC')
					);
					$subSubCat->subSubSubCats=$this->CI->dbHandler->selectData($condition);
				}
			}
		}
		if($index){
			$indexCategory=array();
			foreach($categories as $cat){
				$indexCategory[$cat->category_id]=$cat;
				foreach($cat->subCats as $subCat){
					$indexCategory[$subCat->category_id]=$subCat;
					foreach($subCat->subSubCats as $subSubCats){
						$indexCategory[$subSubCats->category_id]=$subSubCats;
						foreach($subSubCats->subSubSubCats as $subSubSubCats){
							$indexCategory[$subSubSubCats->category_id]=$subSubSubCats;
						}
					}
				}
			}
			$categories=$indexCategory;
		}
		return $categories;
	}
	public function getSubCat($catId){
		$condition=array(
			'table'=>'category',
			'result'=>'data',
			'where'=>array('category_id'=>$catId)
		);
		$category=$this->getOneData($condition);
		$condition=array(
			'table'=>'category',
			'result'=>'data',
			'where'=>array('category_fid'=>$category->category_id),
			'order_by'=>array('category_order'=>'ASC')
		);
		$category->subCats=$this->CI->dbHandler->selectData($condition);
		return $category;
	}
	/**
	 * 根据名称获取类型号
	 * 0:文章列表1:商品列表2:文章3：商品 4:图片集
	 */
	public function getColumnTypeArray($type_text_array){
		$NoArray=array();
		foreach($type_text_array as $value){
			$NoArray[]=$this->getColumnTypeNo($value);
		}
		return $NoArray;
	}
	public function getColumnTypeNo($typeText){
		$type_No=0;
		switch($typeText){
			case 'essayList':
				$type_No=0;
			break;
			case 'productList':
				$type_No=1;
			break;
			case 'essay':
				$type_No=2;
			break;
			case 'product':
				$type_No=3;
			break;
			case 'imageList':
				$type_No=4;
			break;
		}
		return $type_No;
	}
	public function getUserType($typeText){
		$typeNo=0;
		switch($typeText){
			case 'admin':
				$typeNo=0;
			break;
			case 'merchant':
				$typeNo=0;
			break;
			case 'user':
				$typeNo=0;
			break;
		}
		return $typeNo;
	}
	//0:发布1:草稿2:删除
	public function getContentState($contentId=null){
		$stateArray=array(
			'0'=>'已发布',
			'1'=>'草稿箱',
			'2'=>'已删除'
		);
		if(isset($contentId)) return $stateArray[$contentId];
		else return $stateArray;
	}
	public function getColumn($columnId){
		$condition=array(
			'table'=>'column',
			'result'=>'data',
			'where'=>array('column_id'=>$columnId)
		);
		return $this->getOneData($condition);
	}
	public function getContent($type,$contentId){
		$condition=array(
			'table'=>$type,
			'result'=>'data',
			'where'=>array($type.'_id'=>$contentId)
		);
		return $this->getOneData($condition);
	}
	public function getData($condition){
		return $this->CI->dbHandler->selectData($condition);
	}
	/**
	 * 获取一条信息
	 * return object
	 */
	public function getOneData($condition){
		$data=$this->CI->dbHandler->selectData($condition);
		return $data[0];
	}
	public function getPageLink($baseUrl,$selectUrl,$currentPage,$amountPerPage,$amount){
		$pageAmount=ceil($amount/$amountPerPage);
		$page=array(
			'firstPage'=>($currentPage!=1)?$baseUrl.'&page=1':'no',
			'lastPage'=>($currentPage!=$pageAmount)?$baseUrl.'&page='.$pageAmount:'no',
			'prevPage'=>($currentPage>1)?$baseUrl.'&page='.($currentPage-1):'no',
			'nextPage'=>($currentPage<$pageAmount)?$baseUrl.'&page='.($currentPage+1):'no',
			'jumpPage'=>$baseUrl.'&page=',
			'selectPage'=>$selectUrl,
			'currentPage'=>$currentPage,
			'pageAmount'=>$pageAmount,
			'amount'=>$amount,
			'limit'=>array('offset'=>$amountPerPage*($currentPage-1),'limit'=>$amountPerPage)
		);
		return $page;
	}
	public function checkUnique($type,$value){
		$result=false;
		$condition=array(
			'table'=>$type,
			'result'=>'data',
			'where'=>array($type.'_id'=>$value)
		);
		$data=$this->getData($condition);
		if(sizeof($data)<1){
			$result=true;
		}
		return $result;
	}
	/**
	 *  商户id（$_SESSION['userid']），1级类别，2级类别，3级类别，状态，发布时间，最后修改时间，销售方式，商品标题
	 **/
	public function getProducts($merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order){
		$condition=array(
			'table'=>'product',
			'result'=>'data',
			'order_by'=>array('product_modify_time'=>'DESC')
		);
		if($merchantId) $condition['where']['product_merchant']=$merchantId;
		if($cat) $condition['where']['product_category']=$cat;
		if($sCat) $condition['where']['product_sub_category']=$sCat;
		if($ssCat) $condition['where']['product_sub_sub_category']=$ssCat;
		if($status) $condition['where']['product_status']=$status;
		if($sellFormat) $condition['where']['product_sell_format']=$sellFormat;
		if($listedTime){
			$condition['where']['product_time >=']=$listedTime['begin'].' 00:00:00';
			$condition['where']['product_time <=']=$listedTime['end'].' 23:59:59';
		}
		if($modifyTime){
			$condition['where']['product_modify_time >=']=$modifyTime['begin'].' 00:00:00';
			$condition['where']['product_modify_time <=']=$modifyTime['end'].' 23:59:59';
		}
		if($title) $condition['like']['product_item_title_english']=$title;
		if($order) $condition['order_by'][$order['field']]=$order['type'];
		$products=$this->CI->dbHandler->selectData($condition);
		return $products;
	}
	
	function _ensureCartInSession() {
		if(!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}
	}
	public function addToCart($product_id,$merchant_id,$amount){
		$this->_ensureCartInSession();
		$cart = $_SESSION['cart'];
		if(!array_key_exists($product_id, $cart)){
			$cart[$product_id] = array(
				"merchant" => $merchant_id,
				"amount" => 0
			);
		}
		$cart[$product_id]["amount"] = intval($cart[$product_id]["amount"]) + $amount;

		$_SESSION['cart'] =($cart);
		return true;
	}
	
	/**
	 * 从购物车中删除商品
	 * @param string $product_id
	 * @return bool success
	 */
	function removeFromCart($product_id){
		$this->_ensureCartInSession();

		unset($_SESSION["cart"][$product_id]);
		return true;
	}
	/**
	 * 获得购物车里面的商品列表，而且是根据商家组织好的
	 * @return array return
	 */
	function getCartListByMerchants() {
		$this->_ensureCartInSession();
		$cart = ($_SESSION['cart']);
		// var_dump($cart);
		$result = array();
		foreach($cart as $product_id => $item) {
			$merchant_id = $item["merchant"];
			$amount = intval($item["amount"]);
			if(!array_key_exists($merchant_id, $result)) {
				// getMerchantInfo
				$merchant_info = $this->getContent('merchant',$merchant_id);
				$result[$merchant_id] = array(
					"merchant_info" => $merchant_info,
					"products" => array(),
				);
			}
			// getProductInfo
			$product_info = $this->getContent('product',$product_id); //TODO
			$product_info->amount = $amount;
			$result[$merchant_id]["products"][$product_id] = $product_info;
		}
		return $result;
	}
}

/* End of file Common.php */