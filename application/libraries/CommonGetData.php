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
		if (isset($category->category_id)) {
			$condition=array(
				'table'=>'category',
				'result'=>'data',
				'where'=>array('category_fid'=>$category->category_id),
				'order_by'=>array('category_order'=>'ASC')
			);
			$category->subCats=$this->CI->dbHandler->selectData($condition);
		}
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
			'6'=>'Rejected'
		);
		return $status;
	}
	//1.Standard Sales 2.  Auction (For approved items)
	public function getProductListingType(){
		$listingType=array(
			'1'=>'Standard Sales',
			'2'=>'Auction (For approved items)'
		);
		return $listingType;
	}
	//1.Delivery 2.  e-Ticket
	public function getProductDeliveryType(){
		$deliveryType=array(
			'1'=>'Delivery',
			'2'=>'e-Ticket'
		);
		return $deliveryType;
	}
	public function getMerchantStatus(){
		////状态：0：注册完成但没有完善信息 1：完善信息等待审核 2：审核通过 3：审核不通过 4:冻结
		$status=array(
			'0'=>'Need More Info.',
			'1'=>'Under Review',
			'2'=>'Passed',
			'3'=>'No Pass',
			'4'=>'Frozen'
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
	public function getContentAdvance($type,$where){
		$condition=array(
			'table'=>$type,
			'result'=>'data',
			'where'=>$where
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
		if(sizeof($data)>0)
			return $data[0];
		else
			return array();
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
	public function getOrdersByDay($startDate,$offset,$merchant=false,$withLabel=false,$dateType='normal',$day=10000){
		$data=array();
		$step=$offset>$day?ceil($offset/15):1;
		for($i=0;$i<$offset;$i=$step+$i){
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
				if($dateType=='normal') $data[$date]=0;
				else $data[date("m/d",strtotime($startDate." +".$i." day"))]=0;
				foreach($orders as $o){
					if($dateType=='normal') $data[$date]+=$o->order_total;
					else $data[date("m/d",strtotime($startDate." +".$i." day"))]+=$o->order_total;
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
	public function checkUniqueAdvance($type,$where){
		$result=false;
		$condition=array(
			'table'=>$type,
			'result'=>'data',
			'where'=>$where
		);
		$data=$this->getData($condition);
		if(sizeof($data)<1){
			$result=true;
		}
		return $result;
	}
	public function checkProductSeller($merchantId){
		if($this->checkUnique('user',$merchantId)) return false;
		else return true;
	}
	/**
	 *  商户id（$_SESSION['userid']），1级类别，2级类别，3级类别，状态，发布时间，最后修改时间，销售方式，商品标题
	 **/
	public function getProducts($merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order,$groupBuy=false,$outStock=false,$shopMainCat=false,$shopStSubCat=false,$expired=3){
		$condition=array(
			'table'=>'product',
			'result'=>'data'
		);
		if($merchantId) $condition['where']['product_merchant']=$merchantId;
		if($cat) $condition['where']['product_category']=$cat;
		if($sCat) $condition['where']['product_sub_category']=$sCat;
		if($ssCat) $condition['where']['product_sub_sub_category']=$ssCat;
		if($status!=0){
			$condition['where']['product_status']=$status;
		}
		if($sellFormat) $condition['where']['product_sell_format']=$sellFormat;
		if($groupBuy) $condition['where']['product_groupbuy']=1;
		if($outStock) $condition['where']['product_quantity']=0;
		if($shopMainCat) $condition['where']['product_shopCategory']=$shopMainCat;
		if($shopStSubCat) $condition['where']['product_shopSubCategory']=$shopStSubCat;
		if($listedTime){
			$condition['where']['product_time >=']=$listedTime['begin'].' 00:00:00';
			$condition['where']['product_time <=']=$listedTime['end'].' 23:59:59';
		}
		if($modifyTime){
			$condition['where']['product_modify_time >=']=$modifyTime['begin'].' 00:00:00';
			$condition['where']['product_modify_time <=']=$modifyTime['end'].' 23:59:59';
		}
		if($title) $condition['like']['product_item_title_english']=$title;
		if($order){
			$condition['order_by'][$order['field']]=$order['type'];
		}else{
			$condition['order_by']=array('product_modify_time'=>'DESC');
		}
		$products=$this->CI->dbHandler->selectData($condition);
		$returnData=array();
		if(is_array($products) && sizeof($products)>0){
			foreach($products as $key=>$pro){
				if(!$this->checkProductSeller($pro->product_merchant)){
					array_splice($products,$key,1);
				}elseif($this->isExpiredProduct($pro)){//1:expired 2:unexpired 3:all
					if($expired==1 || $expired==3){
						$returnData[]=$pro;
					}
				}else{
					if($expired==2 || $expired==3){
						$returnData[]=$pro;
					}
				}
			}
		}else{
			$returnData=$products;
		}
		return $returnData;
	}

	function getTimeDay($second){
		$day = floor($second/(3600*24));
		return $day;
	}
	public function getExpiringProducts($products,$expired){
		$productsArray=array();
		foreach ($products as $key => $value) {
			$second=time()-strtotime($value->product_time);
			$days=$this->getTimeDay($second);
			if($expired){
				if($days>$value->product_available_period){
					$productsArray[]=$value;
				}
			}
			else{
				if($days<=$value->product_available_period){
					$productsArray[]=$value;
				}
			}
		}
		return $productsArray;
	}
	public function isExpiredProduct($product){
		$second=time()-strtotime($product->product_time);
		$days=$this->getTimeDay($second);
		if($days>$product->product_available_period){
			return true;
		}else{
			return false;
		}
	}
	/**
	 *  商户id（$_SESSION['userid']），1级类别，2级类别，3级类别，状态，发布时间，最后修改时间，销售方式，商品标题
	 **/
	public function getProductsAdvance($parameters){
		//,$merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order
		$pCondition=array('table'=>'product');
		if(isset($parameters['result'])) $pCondition['result']=$parameters['result'];
		if(isset($parameters['merchant'])) $pCondition['where']['product_merchant']=$parameters['merchant'];
		if(isset($parameters['category'])) $pCondition['where']['product_category']=$parameters['category'];
		if(isset($parameters['subCategory'])) $pCondition['where']['product_sub_category']=$parameters['subCategory'];
		if(isset($parameters['subSubCategory'])) $pCondition['where']['product_sub_sub_category']=$parameters['subSubCategory'];

		if(isset($parameters['shopCategory'])) $pCondition['where']['product_shopCategory']=$parameters['shopCategory'];
		if(isset($parameters['shopSubCategory'])) $pCondition['where']['product_shopSubCategory']=$parameters['shopSubCategory'];

		if(isset($parameters['status'])) $pCondition['where']['product_status']=$parameters['status'];
		if(isset($parameters['groupBuy'])) $pCondition['where']['product_groupbuy']=$parameters['groupBuy'];
		if(isset($parameters['sellFormat'])) $pCondition['where']['product_sell_format']=$parameters['sellFormat'];
		if(isset($parameters['listedTimeBegin']))$pCondition['where']['product_time >=']=$parameters['listedTimeBegin'].' 00:00:00';
		if(isset($parameters['listedTimeEnd']))$pCondition['where']['product_time <=']=$parameters['listedTimeEnd'].' 23:59:59';
		if(isset($parameters['modifyTimeBegin']))$pCondition['where']['product_modify_time >=']=$parameters['modifyTimeBegin'].' 00:00:00';
		if(isset($parameters['modifyTimeEnd']))$pCondition['where']['product_modify_time <=']=$parameters['modifyTimeEnd'].' 23:59:59';
		if(isset($parameters['priceBegin']))$pCondition['where']['product_sell_price >=']=$parameters['priceBegin'];
		if(isset($parameters['priceEnd']))$pCondition['where']['product_sell_price <=']=$parameters['priceEnd'];
		if(isset($parameters['like'])) $pCondition['like']=$parameters['like'];
		if(isset($parameters['orderBy'])) $pCondition['order_by']=$parameters['orderBy'];
		if(isset($parameters['limit'])) $pCondition['limit']=array('limit'=>$parameters['limit'],'offset'=>$parameters['offset']);
		if(isset($parameters['expired'])) $expired=$parameters['expired']; else $expired=3;
		$products=$this->CI->dbHandler->selectData($pCondition);
		$returnData=array();
		if(is_array($products) && sizeof($products)>0){
			foreach($products as $key=>$pro){
				if(!$this->checkProductSeller($pro->product_merchant)){
					array_splice($products,$key,1);
				}elseif($this->isExpiredProduct($pro)){//1:expired 2:unexpired 3:all
					if($expired==1 || $expired==3){
						$returnData[]=$pro;
					}
				}else{
					if($expired==2 || $expired==3){
						$returnData[]=$pro;
					}
				}
			}
		}else{
			$returnData=$products;
		}
		return $returnData;
	}
	/**
	 *  
	 **/
	public function getMerchantsAdvance($parameters){
		//,$merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order
		$condition=array('table'=>'user','where'=>array('user_is_merchant'=>1));
		if(isset($parameters['result'])) $condition['result']=$parameters['result'];
		if(isset($parameters['gender'])) $condition['where']['user_gender']=$parameters['gender'];
		if(isset($parameters['status'])) $condition['where']['merchant_status']=$parameters['status'];
		if(isset($parameters['country'])) $condition['where']['user_country']=$parameters['country'];
		if(isset($parameters['like'])) $condition['like']=$parameters['like'];
		if(isset($parameters['orderBy'])) $condition['order_by']=$parameters['orderBy'];
		$merchants=$this->CI->dbHandler->selectData($condition);
		return $merchants;
	}
	/**
	 *  
	 **/
	public function getUsersAdvance($parameters){
		//,$merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order
		$condition=array('table'=>'user','where'=>array('user_is_merchant'=>0));
		if(isset($parameters['result'])) $condition['result']=$parameters['result'];
		if(isset($parameters['gender'])) $condition['where']['user_gender']=$parameters['gender'];
		if(isset($parameters['status'])) $condition['where']['user_state']=$parameters['status'];
		if(isset($parameters['country'])) $condition['where']['user_country']=$parameters['country'];
		if(isset($parameters['like'])) $condition['like']=$parameters['like'];
		if(isset($parameters['orderBy'])) $condition['order_by']=$parameters['orderBy'];
		$users=$this->CI->dbHandler->selectData($condition);
		return $users;
	}
	/**
	 *  
	 **/
	public function getGroupBuyAdvance($parameters){
		//,$merchantId,$cat,$sCat,$ssCat,$status,$listedTime,$modifyTime,$sellFormat,$title,$order
		$condition=array('table'=>'groupbuy');
		if(isset($parameters['result'])) $condition['result']=$parameters['result'];
		if(isset($parameters['merchant'])) $condition['where']['groupbuy_merchantId']=$parameters['merchant'];
		if(isset($parameters['inPreparation'])){
			$condition['where']['groupbuy_startingTime >']=$parameters['inPreparation']['startingTime'];
		}
		if(isset($parameters['inProgress'])){
			$condition['where']['groupbuy_startingTime <=']=$parameters['inProgress']['startingTime'];
			$condition['where']['groupbuy_endTime >=']=$parameters['inProgress']['endTime'];
		}
		if(isset($parameters['ended'])){
			$condition['where']['groupbuy_endTime <']=$parameters['ended']['endTime'];
		}
		if(isset($parameters['like'])) $condition['like']=$parameters['like'];
		if(isset($parameters['orderBy'])) $condition['order_by']=$parameters['orderBy'];
		$results=$this->CI->dbHandler->selectData($condition);
		return $results;
	}
	public function getFocusItems($merchantId){
		$condition=array(
			'table'=>'product',
			'result'=>'data',
			'where'=>array(
				'product_merchant'=>$merchantId,
				'product_focus'=>1
			)
		);
		$focusItems=$this->getData($condition);
		return $focusItems;
	}
	public function getShopCategory($merchantId,$shopCategory=true){
		if($shopCategory){
			$condition=array(
				'table'=>'shopcategory',
				'result'=>'data',
				'where'=>array(
					'shopcategory_merchant'=>$merchantId,
					'shopcategory_fid'=>0
				)
			);
			$category=$this->getData($condition);
		}else{
			$category=$this->getCategories();
		}
		return $category;
	}
	public function getShopSubCategory($merchantId,$fcategory,$shopCategory=true){
		if($shopCategory){
			$condition=array(
				'table'=>'shopcategory',
				'result'=>'data'
			);
			if($fcategory=="all"){
				$condition['where']=array(
					'shopcategory_merchant'=>$merchantId,
					'shopcategory_fid !='=>0
				);
			}else{
				$condition['where']=array(
					'shopcategory_merchant'=>$merchantId,
					'shopcategory_fid'=>$fcategory
				);
			}
			$category=$this->getData($condition);
		}else{
			$category=$this->getSubCategory2($fcategory);
		}
		return $category;
	}
	public function getSubCategory2($fcategory){
		$condition=array(
			'table'=>'category',
			'result'=>'data'
		);
		$category=array();
		if($fcategory=="all"){
			$condition['where']=array('category_fid'=>0);
			$categories=$this->getData($condition);
			foreach ($categories as $value) {
				$newCat=$this->getSubCategory($value->category_id);
				$category=array_merge($category,$newCat);
			}
		}else{
			$condition['where']=array('category_fid'=>$fcategory);
			$category=$this->getData($condition);
		}
		return $category;
	}
	public function getSubCategory($fcategory){
		$condition=array(
			'table'=>'category',
			'result'=>'data'
		);
		if($fcategory=="all"){
			$condition['where']=array('category_fid !='=>0);
		}else{
			$condition['where']=array('category_fid'=>$fcategory);
		}
		$category=$this->getData($condition);
		return $category;
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
	public function getWishList($productId,$userId){
		$condition=array(
			'table'=>'wishlist',
			'result'=>'data',
			'where'=>array(
				'wishlist_productid'=>$productId,
				'wishlist_userid'=>$userId
			)
		);
		$wishlist=$this->getData($condition);
		return sizeof($wishlist)>0?true:false;
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
		foreach ($comments as $key => $value) {
			$value->user=$this->getContent('user',$value->comment_author);
		}
		return array('count'=>$count,'data'=>$comments);
	}
	public function getEnquiries($itemId){
		$condition=array(
			'table'=>'enquiry',
			'where'=>array('enquiry_product'=>$itemId)
		);
		$condition['result']='count';
		$count=$this->getData($condition);
		$condition['result']='data';
		$condition['order_by']=array('enquiry_time'=>'DESC');
		$enquiries=$this->getData($condition);
		foreach ($enquiries as $key => $value) {
			$value->user=$this->getContent('user',$value->enquiry_user);
		}
		return array('count'=>$count,'data'=>$enquiries);
	}
	public function getRelatedProducts($itemId,$number){
		$product=$this->getContent('product',$itemId);
		$likeArray=explode(" ",$product->product_item_title_english);
		$parameters=array(
			'result' => 'data' ,
			'orderBy'=> array('product_sold_count'=>'desc')
		);
		$allProductsTemp=array();
		$allProducts=array();
		foreach ($likeArray as $value) {
			$parameters['like']=array('product_item_title_english' =>$value);
			$allProductsTemp=array_merge($allProductsTemp,$this->getProductsAdvance($parameters));
		}
		foreach ($allProductsTemp as $value) {
			$allProducts[$value->product_id]=$value;
		}
		$allProductsTemp=array();
		if(sizeof($allProducts)>=$number){
			$allProducts=array_slice($allProducts, 0, $number);
		}else{
			$parameters=array(
				'result' => 'data' ,
//				'limit'=>$number-sizeof($allProducts),
//				'offset'=>0,
				'status'=>3,
				'orderBy'=> array('product_view_count'=>'desc')
			);
			$allProductsTemp=$this->getProductsAdvance($parameters);
		}
		foreach ($allProductsTemp as $value) {
			$allProducts[$value->product_id]=$value;
		}
		return $allProducts;
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
		if(!array_key_exists($product_id,$cart)){
			$cart[$product_id] = array(
				"merchant" => $merchant_id,
				"checked"=>true,
				"amount" => 0
			);
		}
		$futureAmount=intval($cart[$product_id]["amount"]) + $amount;
		$stock=$this->getStock($product_id,$product['op1'],$product['op2'],$product['op3']);
		if($stock>=$futureAmount){
			$cart[$product_id]["amount"] = $futureAmount;
			$_SESSION['cart'] =($cart);
			$result=$this->CI->dbHandler->deleteData(array('table'=>'wishlist','where'=>array('wishlist_userid'=>$_SESSION['userid'],'wishlist_productid'=>$product_id)));//Remove from wishlist
			return true;
		}else return false;
	}
	public function setCartProductNumber($product,$amount){
		$this->_ensureCartInSession();
		$cart = $_SESSION['cart'];
		$product_id=$product['productId'];
		if(!array_key_exists($product_id,$cart)){
			return false;
		}
		if(!is_numeric($amount)){
			return false;
		}
		$stock=$this->getStock($product_id,$product['op1'],$product['op2'],$product['op3']);
		if($stock>=$amount){
			$cart[$product_id]["amount"] = $amount;
			$_SESSION['cart'] =($cart);
			return true;
		}else return false;
	}
	public function checkCartProduct($productId,$isCheck){
		$this->_ensureCartInSession();
		$cart = $_SESSION['cart'];
		if(!array_key_exists($productId,$cart)){
			return false;
		}
		$cart[$productId]["checked"] = $isCheck;
		$_SESSION['cart'] =($cart);
		return true;
	}
	public function checkAllCartProduct($isCheck){
		$this->_ensureCartInSession();
		$cart = $_SESSION['cart'];
		foreach($cart as $key=>$product){
			$cart[$key]["checked"] = $isCheck;
//			echo $product["checked"];
		}
//		print_r($cart);
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
			$checked = $item["checked"];
			$amount = intval($item["amount"]);
			if(!array_key_exists($merchant_id, $result)) {
				// getMerchantInfo
				$merchant_info = $this->getContent('user',$merchant_id);
				$result[$merchant_id] = array(
					"merchant_info" => $merchant_info,
					"products" => array(),
				);
			}
			// getProductInfo
			$product_info = $this->getContent('product',$product_id); //TODO
			$product_info->amount = $amount;
			$product_info->checked = $checked;
			$result[$merchant_id]["products"][$product_id] = $product_info;
		}
		return $result;
	}
	public function checkEmail($email){
		$regex = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[-_a-z0-9][-_a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i';
		if (preg_match($regex, $email)) return true;
		else return false;
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
	public function SMS($phoneNumber,$text){
		$url='http://sms.webchinese.cn/web_api/';
		$param=array(
			'Uid'=>'MonkeyKing',
			'Key'=>'916befe64d458c759a3a',
			'smsMob'=>$phoneNumber,
			'smsText'=>$text
		);
		return httpGet($url,$param,array());
	}
	public function globalSMS($phoneNumber,$text){
		$param = array (
			'src' => 'MonkeyKing', // 用户名
			'pwd' => '19910910Mk1024', // 你的密码
			'ServiceID' => 'SEND',
			'dest' => $phoneNumber, // 你的目的号码
			'sender' => '1370138', // 你的原号码
			'codec' => '8', // 编码
			'msg' => $this->encodeHexStr(8,$text)
		);
		$uri = "http://210.51.190.233:8085/mt/mt3.ashx";
		return httpPost($url,$param,array());
	}
	public function encodeHexStr($dataCoding, $realStr){
		if ($dataCoding == 15){
			return strtoupper(bin2hex(iconv('UTF-8', 'GBK', $realStr)));               
		}
		else if ($dataCoding == 3){
			return strtoupper(bin2hex(iconv('UTF-8', 'ISO-8859-1', $realStr)));               
		}
		else if ($dataCoding == 8){
			return strtoupper(bin2hex(iconv('UTF-8', 'UCS-2', $realStr)));   
		}
		else{
			return strtoupper(bin2hex(iconv('UTF-8', 'ASCII', $realStr)));
		}
	}

	public function sortProductImage($productImgS1,$productImgS2,$productImgS3,$productImgS4){
		$imageArray=array($productImgS1,$productImgS2,$productImgS3,$productImgS4);
		foreach ($imageArray as $key => $value) {
			if($value==''){
				array_splice($imageArray, $key, 1);
			}
		}
		for ($i=0; $i < 4; $i++) { 
			if(!isset($imageArray[$i])){
				$imageArray[$i]='';
			}
		}
		$imagesObject=new stdClass();
		$imagesObject->productImgS1=$imageArray[0];
		$imagesObject->productImgS2=$imageArray[1];
		$imagesObject->productImgS3=$imageArray[2];
		$imagesObject->productImgS4=$imageArray[3];
		return $imagesObject;
	}
	public function getCountry($abbreviation){
		$country='';
		switch ($abbreviation) {
			case 'SG':
				$country='Singapore';
			break;
			case 'AU':
				$country='Australia';
			break;
			case 'BR':
				$country='Brazil';
			break;
			case 'BN':
				$country='Brunei Darussalam';
			break;
			case 'CA':
				$country='Canada';
			break;
			case 'CN':
				$country='China';
			break;
			case 'DK':
				$country='Denmark';
			break;
			case 'EG':
				$country='Egypt';
			break;
			case 'FI':
				$country='Finland';
			break;
			case 'FR':
				$country='France';
			break;
			case 'DE':
				$country='Germany';
			break;
			case 'GR':
				$country='Greece';
			break;
			case 'HK':
				$country='Hong Kong';
			break;
			case 'HU':
				$country='Hungary';
			break;
			case 'IN':
				$country='India';
			break;
			case 'ID':
				$country='Indonesia';
			break;
			case 'IL':
				$country='Israel';
			break;
			case 'IT':
				$country='Italy';
			break;
			case 'JP':
				$country='Japan';
			break;
			case 'KW':
				$country='Kuwait';
			break;
			case 'MO':
				$country='Macau';
			break;
			case 'MY':
				$country='Malaysia';
			break;
			case 'MX':
				$country='Mexico';
			break;
			case 'MM':
				$country='Myanma';
			break;
			case 'NL':
				$country='Netherlands';
			break;
			case 'NZ':
				$country='New Zealand';
			break;
			case 'MM':
				$country='Myanma';
			break;
			case 'NO':
				$country='Norway';
			break;
			case 'PH':
				$country='Philippines';
			break;
			case 'PL':
				$country='Poland';
			break;
			case 'PT':
				$country='Portugal';
			break;
			case 'RU':
				$country='Russia';
			break;
			case 'KR':
				$country='South Korea';
			break;
			case 'ES':
				$country='Spain';
			break;
			case 'SE':
				$country='Sweden';
			break;
			case 'CH':
				$country='Switzerland';
			break;
			case 'TW':
				$country='Taiwan';
			break;
			case 'TH':
				$country='Thailand';
			break;
			case 'TR':
				$country='Turkey';
			break;
			case 'GB':
				$country='United Kingdom';
			break;
			case 'US':
				$country='United States';
			break;
			case 'VN':
				$country='Vietnam';
			break;
			default:
				$country=$abbreviation;
				break;
		}
		return $country;
	}
}

/* End of file Common.php */