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
	//1.未经确认 2.交易等待 3.交易可能 4.交易删除 5.交易中止 6.限制商品
	//1.Under Review 2.On queue 3.Available 4.Deleted 5.Suspended 6.Restricted
	public function getProductStatus(){
		$status=array(
			'1'=>'Under Review',
			'2'=>'On queue',
			'3'=>'Available',
			'4'=>'Deleted',
			'5'=>'Suspended',
			'6'=>'Restricted'
		);
		return $status;
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
			'lastPage'=>($currentPage!=$pageAmount && $pageAmount!=0)?$baseUrl.'&page='.$pageAmount:'no',
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
	public function getOrdersByDay($startDate,$offset,$merchant=false,$withLabel=false){
		$data=array();
		for($i=0;$i<$offset;$i++){
			$date=date("Y-m-d",strtotime($startDate." +".$i." day"));
			$condition=array(
				'table'=>'order',
				'result'=>'data',
				'where'=>array(
					'order_time >='=>$date.' 00:00:00',
					'order_time <='=>$date.' 23:59:59'
				)
			);
			if($merchant){
				$condition['where']['order_merchant']=$merchant;
			}
			$orders=$this->getData($condition);
			if($withLabel){
				$data[$date]=0;
				foreach($orders as $o){
					$data[$date]+=$o->order_total;
				}
			}else{
				$data[$i]=0;
				foreach($orders as $o){
					$data[$i]+=$o->order_total;
				}
			}
		}
		return $data;
	}
	public function getTotalTurnover($merchant=false){
		$condition=array(
			'table'=>'order',
			'result'=>'data'
		);
		if($merchant){
			$condition['where']['order_merchant']=$merchant;
		}
		$orders=$this->getData($condition);
		$total=0;
		foreach($orders as $o){
			$total+=$o->order_total;
		}
		return $total;
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
	public function checkUniqueAdvance($type,$field,$value){
		$result=false;
		$condition=array(
			'table'=>$type,
			'result'=>'data',
			'where'=>array($field=>$value)
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
	/**
	 *  商户id（$_SESSION['userid']），1级类别，2级类别，3级类别，状态，发布时间，最后修改时间，销售方式，商品标题
	 **/
	public function getProductsAdvance($parameters){
		//,$merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order
		$condition=array('table'=>'product');
		if(isset($parameters['result'])) $condition['result']=$parameters['result'];
		if(isset($parameters['merchantId'])) $condition['where']['product_merchant']=$parameters['merchant'];
		if(isset($parameters['category'])) $condition['where']['product_category']=$parameters['category'];
		if(isset($parameters['subCategory'])) $condition['where']['product_sub_category']=$parameters['subCategory'];
		if(isset($parameters['subSubCategory'])) $condition['where']['product_sub_sub_category']=$parameters['subSubCategory'];
		if(isset($parameters['status'])) $condition['where']['product_status']=$parameters['status'];
		if(isset($parameters['sellFormat'])) $condition['where']['product_sell_format']=$parameters['sellFormat'];
		if(isset($parameters['listedTimeBegin']))$condition['where']['product_time >=']=$parameters['listedTimeBegin'].' 00:00:00';
		if(isset($parameters['listedTimeEnd']))$condition['where']['product_time <=']=$parameters['listedTimeEnd'].' 23:59:59';
		if(isset($parameters['modifyTimeBegin']))$condition['where']['product_modify_time >=']=$parameters['modifyTimeBegin'].' 00:00:00';
		if(isset($parameters['modifyTimeEnd']))$condition['where']['product_modify_time <=']=$parameters['modifyTimeEnd'].' 23:59:59';
		if(isset($parameters['like'])) $condition['like']=$parameters['like'];
		if(isset($parameters['orderBy'])) $condition['order_by']=$parameters['orderBy'];
		$products=$this->CI->dbHandler->selectData($condition);
		return $products;
	}
	public function getHotItems($merchantId){
		$condition=array(
			'table'=>'product',
			'result'=>'data',
			'where'=>array(
				'product_merchant'=>$merchantId,
				'product_shop_hot'=>1
			)
		);
		$hotItems=$this->getData($condition);
		return $hotItems;
	}
	public function getCategoryFeaturedItems($catId){
		$condition=array(
			'table'=>'product',
			'result'=>'data',
			'where'=>array(
				'product_category_featured'=>$catId
			)
		);
		$hotItems=$this->getData($condition);
		return $hotItems;
	}
	public function getFollow($merchantId,$userId){
		$condition=array(
			'table'=>'follow',
			'result'=>'data',
			'where'=>array(
				'follow_merchant_id'=>$merchantId,
				'follow_user_id'=>$userId
			)
		);
		$hotItems=$this->getData($condition);
		return sizeof($hotItems)>0?true:false;
	}
	public function getFollowNo($merchantId){
		$condition=array(
			'table'=>'follow',
			'result'=>'data',
			'where'=>array(
				'follow_merchant_id'=>$merchantId
			)
		);
		$hotItems=$this->getData($condition);
		return sizeof($hotItems);
	}
	public function getStock($itemId,$op1,$op2,$op3){
		if($op1 && $op1!=''){
			$condition=array(
				'table'=>'product_option',
				'where'=>array(
					'product_option_product_id'=>$itemId,
					'product_option_1'=>$op1
				)
			);
			if($op2 && $op2!='') $condition['where']['product_option_2']=$op2;
			if($op3 && $op3!='') $condition['where']['product_option_3']=$op3;
			$condition['result']='data';
			$option=$this->getOneData($condition);
			return $option->product_option_stock;
		}
		$condition=array(
			'table'=>'product',
			'result'=>'data',
			'where'=>array(
				'product_id'=>$itemId
			)
		);
		$product=$this->getOneData($condition);
		return $product->product_quantity;
		
	}
	public function getComments($itemId){
		$condition=array(
			'table'=>'comment',
			'where'=>array('comment_product_id'=>$itemId)
		);
		$condition['result']='count';
		$count=$this->getData($condition);
		$condition['result']='data';
		$condition['order_by']=array('comment_time'=>'DESC');
		$comments=$this->getData($condition);
		return array('count'=>$count,'data'=>$comments);
	}
	public function getOptionData($itemId,$result){
		$condition=array(
			'table'=>'product_option',
			'where'=>array('product_option_product_id'=>$itemId),
			'result'=>$result
		);
		$optionData=$this->CI->dbHandler->selectData($condition);
		return $optionData;
	}
	function _ensureCartInSession() {
		if(!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}
	}
	public function addToCart($product,$merchant_id,$amount){
		$this->_ensureCartInSession();
		$cart = $_SESSION['cart'];
		$product_id=$product['productId'];
		if(!array_key_exists($product_id, $cart)){
			$cart[$product_id] = array(
				"merchant" => $merchant_id,
				"amount" => 0
			);
		}
		$futureAmount=intval($cart[$product_id]["amount"]) + $amount;
		$stock=$this->getStock($product_id,$product['op1'],$product['op2'],$product['op3']);
		if($stock>=$futureAmount){
			$cart[$product_id]["amount"] = $futureAmount;
			$_SESSION['cart'] =($cart);
			return true;
		}else return false;
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
	public function email($to,$subject,$message){
		$this->CI->load->library('email');
		//以下设置Email参数
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = 'sunxguo@163.com';
		$config['smtp_pass'] = '19910910Mk1024';
		$config['smtp_port'] = '25';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->CI->email->initialize($config);
		//以下设置Email内容
		$this->CI->email->from('sunxguo@163.com', 'AiiMai');
		$this->CI->email->to($to); 
	//			$this->email->cc('another@another-example.com'); 
	//			$this->email->bcc('them@their-example.com'); 

		$this->CI->email->subject($subject);
		$this->CI->email->message($message); 

		$this->CI->email->send();

	//			echo $this->email->print_debugger();
	}
}

/* End of file Common.php */