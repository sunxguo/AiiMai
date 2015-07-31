<div class="mshop_bar">
	<div class="info">
		<div class="thumb">
			<a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank">
				<img src="<?php echo $merchant->merchant_shop_icon;?>">
			</a>
		</div>
		<div class="name"><a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank"><?php echo $merchant->merchant_shop_name;?></a></div>	
		<div class="etc">
			<span class="mshop_rate"><dfn style="width:80%;">MINISHOP RATE 80%</dfn></span>
			<input id="input_EncryptSellerCustNo" type="hidden" value="qdbK5Jo397f1rG/8u8LpPA==">
			<input id="input_login_cust_no_enc" type="hidden" value="">
			<a id="a_follow" onclick="follow('<?php echo $item->product_merchant;?>');" class="btn_follow" style="<?php echo $follow?'display:none':'';?>"><span>Follow</span></a>
			<a id="a_following" class="btn_follow ing" style="<?php echo $follow?'':'display:none';?>"><span>Following</span></a>
		</div>
		<div class="num">
			<a href="/home/shop?shopId=<?php echo $merchant->user_id;?>" target="_blank">
				<em><?php echo $merchantProductsAmount;?></em> items on sale/&nbsp;<em><?php echo $followNo;?></em> Fellow
			</a>
		</div>
		<div class="menu">
			<ul>
				<li><a href="/home/allItems?shopId=<?php echo $merchant->user_id;?>" class=""><span>All Items</span></a></li>
<!--						<li><a href="/home/shopSpecial?shopId=<?php echo $_GET['shopId'];?>"><span>Shop Specials</span></a></li>-->
				<li><a href="/home/shopFaq?shopId=<?php echo $merchant->user_id;?>"><span>Q&amp;A·FAQ</span></a></li>
				<li><a href="/home/shopInfo?shopId=<?php echo $merchant->user_id;?>"><span>Shop Info</span></a></li>
			</ul>
		</div>
		<div class="vwd_items">
			<strong class="tit" style="">Hot Items</strong>
			
			<div class="total_item">
				<span class="counting" style=""><?php echo sizeof($hotItems);?></span>
			</div>
			
			<div class="thumb_list" id="goods_minishop_bar_thumb_list">
			<!--
				<a class="btn_prv" style="-webkit-user-select: none;">prev</a>
				<a class="btn_nxt" style="-webkit-user-select: none;">next</a>-->
				<div id="slide" class="slide">								
					<ul id="view_gd_Item" style="width:296px">
						<?php foreach($hotItems as $hi):?>
						<li>
							<a href="/home/item?itemId=<?php echo $hi->product_id;?>">
								<img src="<?php echo $hi->product_image;?>" title="<?php echo $hi->product_item_title_english;?>">
							</a>
							<p>S$<?php echo $hi->product_sell_price;?></p>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="goodsDetailWrap goods_wrap clearfix">
<div id="ctl00_ctl00_MainContentHolder_MainContentHolderNoForm_CategoryPanel">
	
    <div class="goods_navi ">
        <!-- Category -->
        

	<dl class="category">
		<dt class="home">home</dt>
		
		<?php if(isset($categoriesIndex[$item->product_category])):?>
		<dd id="depMenu1" onmouseout="hide('#MainCategory');">
			<a href="" class="menuName" onmouseover="show('#MainCategory');">
				<span><?php echo $categoriesIndex[$item->product_category]->category_name;?></span>
			</a>
			<!--
			<ul class="fs_11 disNone" id="MainCategory">
				<?php foreach($categoriesIndex as $cat):?>
				<li><a href=""><?php echo $cat->category_name;?></a></li>
				<?php endforeach;?>
			</ul>-->
		</dd>
		<?php endif;?>
		<?php if(isset($categoriesIndex[$item->product_sub_category])):?>
		<dd id="depMenu2">
			<a href="" class="menuName">
				<span><?php echo $categoriesIndex[$item->product_sub_category]->category_name;?></span>
			</a>
			<ul class="fs_11 disNone">
				<li><a href="">Dresses</a></li>
			</ul>
		</dd>
		<?php endif;?>
		<?php if(isset($categoriesIndex[$item->product_sub_sub_category])):?>
		<dd id="depMenu3">
			<a href="" class="menuName current">
				<span><?php echo $categoriesIndex[$item->product_sub_sub_category]->category_name;?></span>
			</a>
			<ul class="fs_11 disNone">
				<li><a href="">Mini Dress</a></li>
			</ul>
			
		</dd>
		<?php endif;?>
	</dl>

  
        <!-- END : Category -->
        
        <div class="code"><em>Item code</em> : <?php echo $_GET['itemId'];?> <!--<span class="bul_bt"><a href="javascript:dispUrl(424457714);" class="bt bt32 navy fs_11"><span id="CopyURL_nm">COPY URL</span></a></span>-->
        </div>
        
    </div>
    
</div>
<div class="goods_info clearfix">
		<!-- 왼쪽 상품이미지 영역 -->
        <div class="goods_img">
		<div id="div_Default_Image">
			<div class="thumb">
				<ul style="position:relative;">
					<li>
						<a title="<?php echo $item->product_item_title_english;?>">
							<img id="showProductImage" src="<?php echo $item->product_image;?>" width="400" height="400">
						</a>
					</li>
					
				</ul>
				<!--
				<a id="GoodsImageurl" onclick="ViewEnlargedImage('424457714');"><img id="GoodsImage" alt="<?php echo $item->product_item_title_english;?>" src="<?php echo $item->product_image;?>" width="400" height="400" onerror="javascript:this.src='/gmkt.inc/Img/no_image.gif'" style="height: 400px; width: 400px; position: absolute; left: 0px; top: 0px;"></a><div class="ly_opt_clicked" id="Img_option_title" style="display:none;"></div>
				-->
			</div>
			<ul id="newThumb" class="new-thumb clearfix">
				<li>
					<img src="<?php echo $item->product_image;?>" onclick="setProductImage('<?php echo $item->product_image;?>')">
				</li>
				<?php if(isset($item->product_image_s1) && $item->product_image_s1!=''):?>
				<li>
					<img src="<?php echo $item->product_image_s1;?>" onclick="setProductImage('<?php echo $item->product_image_s1;?>')">
				</li>
				<?php endif;?>
				<?php if(isset($item->product_image_s2) && $item->product_image_s2!=''):?>
				<li>
					<img src="<?php echo $item->product_image_s2;?>" onclick="setProductImage('<?php echo $item->product_image_s2;?>')">
				</li>
				<?php endif;?>
				<?php if(isset($item->product_image_s3) && $item->product_image_s3!=''):?>
				<li>
					<img src="<?php echo $item->product_image_s3;?>" onclick="setProductImage('<?php echo $item->product_image_s3;?>')">
				</li>
				<?php endif;?>
				<?php if(isset($item->product_image_s4) && $item->product_image_s4!=''):?>
				<li>
					<img src="<?php echo $item->product_image_s4;?>" onclick="setProductImage('<?php echo $item->product_image_s4;?>')">
				</li>
				<?php endif;?>
			</ul>
			<div class="fctn_area">
				
				<div class="fctn">
					<ul>
						<li class="bul_share">
							<a href="#none" onclick="javascript:$('#div_share_sns_layer').toggle(); return false;">
								<span>Share</span>
							</a>
							<div class="ly_share" id="div_share_sns_layer">
								<span>
									<a href="javascript:window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(location.href),'Share','height=500,width=600,toolbar=no,menubar=no' );">
										<i class="ic_fb"></i>
										<span>Facebook</span>
									</a>
									<a href="javascript:window.open('http://twitter.com/home/?status='+encodeURIComponent(document.title)+' '+encodeURIComponent(location.href),'Share','height=500,width=600,toolbar=no,menubar=no' );" onclick="">
										<i class="ic_tw"></i>
										<span>Twitter</span>
									</a>
								</span>
							</div>
						</li>
						<li class="bul_report" onclick="setDivCenter('#reportDiv',true);">
							<a>Report!</a>
						</li>
						<!--
						<li class="bul_size"><a href="javascript:ViewExplainSize();">Size Guide</a></li>
						-->
					</ul>
				</div>
			</div>
		</div>
        </div>
        <!-- //왼쪽 상품이미지 영역 -->
        <!-- 우측 상품정보 영역 -->
        <div class="goods_detail">
			<h2 class="name"><?php echo $item->product_item_title_english;?></h2>
                    <ul class="infoArea">
                        <li class="infoData">
                            
                        <div id="">
	
                                <dl class="detailsArea">
                                    <dt>Retail Price</dt>
                                    <dd>S$<?php echo $item->product_reference_price;?></dd>
                                </dl>
                            
</div>
							<dl class="detailsArea lsprice" id="dl_sell_price">
								<dt><strong>AiiMai-Price</strong></dt>
								<dd>
									<strong >S$<?php echo $item->product_sell_price;?></strong>
								</dd>
							</dl>
                            <!-- 할인정보 -->
							<?php if($item->product_time_sale==1):?>
							<span>
								<dl class="detailsArea q_dcprice">
									<dt><strong>Time Sale Price</strong></dt>
									<dd><strong>S$<?php echo $item->product_time_sale_price;?></strong></dd>
								</dl>
								<dl class="detailsArea dsc_txt">
									<dt>.</dt>
									<dd>
										<p class="fs_11">Discount available period 17:00 ~ 00:00</p>
										<a href="" target="_blank" class="more fs_11">more time sale items</a>
									</dd>
								</dl>
							</span>
							<?php endif;?>
                        </li>

                         <!-- 배송 -->
						<li class="infoData">
                        <!-- 일반 배송비 관련 -->
                        
                            <!-- Global Q샵 / qoo10.com 상품일 경우에만 보여줍니다. -->
                            
                            <dl class="detailsArea">
                                <dt>
									<a name="calculator" class="btn_shrate">
										Shipping Rate<span class="ic_os">Overseas</span>
									</a> 
                                </dt>
                                <dd>
								<div class="shpp_opt" onmouseover="if(window.showinfoShipping) showinfoShipping('0')" onmouseout="if(window.hideinfoShipping) hideinfoShipping('0')"> 
									<p class="sh_option2" name="delivery_option_no" id="delivery_option_no_0" option_delivery_fee="0" option_code="RM" data-fee="3.9900" data-basis-money="30.0000" data-target-currency="SGD" data-delivery-fee-cond="M">
										Qxpress  - <em id="delivery_option_fee_0"> S$3.99</em></p>
									<p class="clear colBlue" id="dd_delivery_condition_0" style="">Free shipping over S$30.00 purchase.</p>
									
								</div>
								</dd>
                            </dl>
                    </li>                    
                    <!-- 수량 -->
                    <li class="infoData quantity" style="display:">
                        <dl class="detailsArea">
                            <dt>
                                <strong>Item Qty</strong>
                            </dt>
                            <dd class="clearSelf">
                                <div class="ctrlArea">
                                    <input type="text" name="order_cnt" id="order_cnt" value="1" class="textType" style="width:28px;" onchange="javascript:checkOrderCnt();">
                                    <a href="javascript:plusOrderCnt();" class="up"></a>
                                    <a href="javascript:minusOrderCnt();" class="down"></a>
                                </div>
                            </dd>
                        </dl>
                        
                    </li>
                    <!-- 재고 -->
					<?php if(isset($item->product_option1)):?>
                    <li class="infoData" style="border-bottom : none;">
                        <div id="">
							<dl class="detailsArea">
                                <dt>
									<strong>Item Type</strong>  
                                </dt>
                            </dl>
							<?php foreach($optionType as $key=>$ot):?>
							<dl class="detailsArea stock">
								<dt>∙ 
									<?php 
										if($key==0) echo $item->product_option1;
										elseif($key==1) echo $item->product_option2;
										elseif($key==2) echo $item->product_option3;
									?>
								</dt>
								<dd>
									<select id="op<?php echo ($key+1);?>">
										<?php foreach($ot as $o):?>
										<option><?php echo $o;?></option>
										<?php endforeach;?>
									</select>
								</dd>
							</dl>
							<?php endforeach;?>
						</div>
                    </li>
					<?php endif;?>
                    <li class="infoData last" style="display:;">				
                        <div class="process_btn">
                            <span id="ProcessBtn_cart" class="btn" style="  float: none;">
								<a href="javascript:addToCart('<?php echo $item->product_id;?>','<?php echo $item->product_merchant;?>');" class="btn_cart" id="CartOrderBtn">
									<i class="ic_cart"></i>
									Add to Cart [Buy]
								</a>
                            </span>
						</div>
                    </li>
                    </ul>
        </div>
    </div>
	<div class="item-detail">
		<ul class="km-nav km-nav-tabs clearfix" name="ItemInfo">
		  <li class="active"><a href="#ItemInfo" style="background-color: #337ab7;color: white;">Product Info</a></li>
		  <li><a href="#CustomerReview">Product Review(<em><?php echo $comments['count'];?></em>)</a></li>
		  <li><a href="#QuestionAnswer"><span>Enquiries(<em>0</em>)</span></a></li>
<!--		  <li><a href="#ShoppingTalk">Shopping Talk</a></li>-->
		  <li><a href="#PolicyNotice">Policy & Notice</a></li>
		</ul>
		<div id="ItemInfo" style="min-height:100px;">
			<?php echo $item->product_description;?>
		</div>
		<ul class="km-nav km-nav-tabs clearfix" id="CustomerReview">
		  <li><a href="#ItemInfo">Product Info</a></li>
		  <li class="active"><a href="#CustomerReview" style="background-color: #337ab7;color: white;">Product Review(<em><?php echo $comments['count'];?></em>)</a></li>
		  <li><a href="#QuestionAnswer"><span>Enquiries(<em>0</em>)</span></a></li>
<!--		  <li><a href="#ShoppingTalk">Shopping Talk</a></li>-->
		  <li><a href="#PolicyNotice">Policy & Notice</a></li>
		</ul>
		<div class="CustomerReview" style="min-height:100px;">
			<!--
			<div style="background-color:#F5F5F5;padding:20px;">
				<h4 style="line-height:30px;font-weight:600;">Post a Review</h4>
				<label for="newReviewTitle">Title</label>
				<input id="newReviewTitle" type="text" class="km-form-control" style="width:400px;height: 30px;padding: 0 5px;">
				<label for="newReviewContent">Content</label>
				<textarea id="newReviewContent" class="km-form-control" style="width:400px;height:100px;padding: 5px 5px;"></textarea>
				<button type="button" class="km-btn km-btn-primary" onclick="postReview('<?php echo $_GET['itemId'];?>');" style="padding: 2px 12px;margin-top:10px;">Post</button>
			</div>
			-->
			<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
				<div class="km-panel-heading">Review (<?php echo sizeof($comments['data']);?>)</div>
				<div class="km-panel-body" style="padding:0px;">
					<table class="km-table">
						<tbody>
						  <?php echo sizeof($comments['data'])<1?'No Reviews':'';?>
						  <?php foreach($comments['data'] as $key=>$comment):?>
						  <tr>
							<td class="value" style="width:86px;">
								<img src="/assets/images/home/fp<?php echo $key+1;?>.jpg" style="width:86px;height:86px;">
							</td>
							<td class="value" style="width:620px;text-align:left;">
								<ul>
									<li class="comment-list-title">
										<?php echo $comment->comment_title;?>
									</li>
									<li class="comment-list-option">
										[option]:Selection:Xiaomi MiBand Silicon Band / Color:Blue(+S$0.98)
									</li>
									<li class="comment-list-shortMessage">
										<?php echo $comment->comment_content;?> Fast delivery with reasonable quality. The packaging is unopened and new.
									</li>
								</ul>
							</td>
							<td class="value" style="text-align:right;">
								<ul>
									<li class="comment-list-time">
										<?php echo $comment->comment_time;?>
										<span style="margin-left: 10px;"><?php echo mb_substr($comment->user->user_username, 0 , 3).'******';?></span>
									</li>
									<li class="comment-list-rating">
										<?php echo $comment->comment_star;?>
										Highly Recommended
									</li>
								</ul>
							</td>
						  </tr>
						  <?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<ul class="km-nav km-nav-tabs clearfix" id="QuestionAnswer">
		  <li><a href="#ItemInfo">Product Info</a></li>
		  <li><a href="#CustomerReview">Product Review(<em><?php echo $comments['count'];?></em>)</a></li>
		  <li class="active"><a href="#QuestionAnswer" style="background-color: #337ab7;color: white;"><span>Enquiries(<em>0</em>)</span></a></li>
<!--		  <li><a href="#ShoppingTalk">Shopping Talk</a></li>-->
		  <li><a href="#PolicyNotice">Policy & Notice</a></li>
		</ul>
		<div class="QuestionAnswer" style="min-height:100px;">
			No Reviews
		</div>
<!--		<ul class="km-nav km-nav-tabs clearfix" id="ShoppingTalk">
		  <li><a href="#ItemInfo">Item Info</a></li>
		  <li><a href="#CustomerReview">Customer Review(<em>5</em>)</a></li>
		  <li><a href="#QuestionAnswer"><span>Question & Answer(<em>3</em>)</span></a></li>
		  <li class="active"><a href="#ShoppingTalk">Shopping Talk</a></li>
		  <li><a href="#PolicyNotice">Policy & Notice</a></li>
		</ul>
		<div class="ShoppingTalk">
		</div>-->
		<ul class="km-nav km-nav-tabs clearfix" id="PolicyNotice">
		  <li><a href="#ItemInfo">Product Info</a></li>
		  <li><a href="#CustomerReview">Product Review(<em><?php echo $comments['count'];?></em>)</a></li>
		  <li><a href="#QuestionAnswer"><span>Enquiries(<em>0</em>)</span></a></li>
<!--		  <li><a href="#ShoppingTalk">Shopping Talk</a></li>-->
		  <li class="active"><a href="#PolicyNotice" style="background-color: #337ab7;color: white;">Policy & Notice</a></li>
		</ul>
		<div class="PolicyNotice">
			<img src="http://static.image-gmkt.com/qoo10/front/en/goods/image/img_gsPolicy01.gif">
			<img src="http://static.image-gmkt.com/qoo10/front/en/goods/image/img_gsPolicy02.gif">
			<img src="http://static.image-gmkt.com/qoo10/front/en/goods/image/img_gsPolicy03.gif">
			<img src="http://static.image-gmkt.com/qoo10/front/en/goods/image/img_gsPolicy04.gif">
		</div>
		<div class="km-panel km-panel-primary main-floor" style="width: 98%;margin-top:20px;">
			<div class="km-panel-heading">Other Related Products</div>
			<div class="km-panel-body" style="padding:0px;">
				<div class="btn-prev"><img src="/assets/images/home/prev.png"></div>
				<ul id="relatedProducts" style="height:226px;width:100000px;overflow:hidden;">
					  <?php echo sizeof($relatedProducts)<1?'No Related Products':'';?>
					  <?php foreach($relatedProducts as $key=>$pro):?>
					  <li style="float:left;width:175px;margin-right:21px;">
					  	<a href="/home/item?itemId=<?php echo $pro->product_id;?>">
					  		<img src="<?php echo $pro->product_image;?>" width="175" height="175">
					  	</a>
					  	<p style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden; ">
					  		<a href="/home/item?itemId=<?php echo $pro->product_id;?>">
					  			<?php echo $pro->product_item_title_english;?>
					  		</a>
					  	</p>
					  	<p style="color: #4c4849;text-decoration: line-through;">SGD <?php echo $pro->product_reference_price;?></p>
					  	<p style="color: #d4232b;font-weight: bold;font-size: 14px;">SGD <?php echo $pro->product_sell_price;?></p>
					  </li>
					  <?php endforeach;?>
				</ul>
				<div class="btn-next" style="left:928px;"><img src="/assets/images/home/next.png"></div>
			</div>
		</div>
		<div class="km-panel km-panel-primary main-floor" style="width: 98%;margin-top:20px;">
			<div class="km-panel-heading">Recently Viewed</div>
			<div class="km-panel-body" style="padding:0px;">
				<!--
				<div class="btn-prev"><img src="/assets/images/home/prev.png"></div>
				-->
				<ul id="recentlyViewedProducts" style="height:226px;width:100000px;overflow:hidden;">
					  <?php echo sizeof($recentlyViewedProducts)<1?'No Related Products':'';?>
					  <?php foreach($recentlyViewedProducts as $key=>$pro):?>
					  <li style="float:left;width:175px;margin-right:21px;">
					  	<a href="/home/item?itemId=<?php echo $pro->product_id;?>">
					  		<img src="<?php echo $pro->product_image;?>" width="175" height="175">
					  	</a>
					  	<p style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden; ">
					  		<a href="/home/item?itemId=<?php echo $pro->product_id;?>">
					  			<?php echo $pro->product_item_title_english;?>
					  		</a>
					  	</p>
					  	<p style="color: #4c4849;text-decoration: line-through;">SGD <?php echo $pro->product_reference_price;?></p>
					  	<p style="color: #d4232b;font-weight: bold;font-size: 14px;">SGD <?php echo $pro->product_sell_price;?></p>
					  </li>
					  <?php endforeach;?>
				</ul>
				<!--
				<div class="btn-next" style="left:928px;"><img src="/assets/images/home/next.png"></div>
				-->
			</div>
		</div>
	</div>
</div>
<div class="km-modal-dialog" id="reportDiv" style="width:600px;">
	<div class="km-modal-content">
		<div class="km-modal-header">
			<button type="button" class="km-close"><span>&times;</span></button>
			<h4 class="km-modal-title">Report Abuse for Item</h4>
		</div>
		<div class="km-modal-body">
			<label for="customer_view_email" class="km-control-label" style="width:100px;">Target:</label>
			 Item Code  
			<span style="color:#109BFF;"><?php echo $_GET['itemId'];?></span><br>
			<label for="reportReason" class="km-control-label" style="width:100px;">Reason:</label>
			<input type="text" class="km-form-control" id="reportReason" style="width: 400px;height: 30px;padding: 0 5px;display: inline-block;"><br>
			<label for="reportDetails" class="km-control-label" style="width:100px;vertical-align: top;margin-top: 10px;">Details:</label>
			<textarea id="reportDetails" style="width:400px;height: 70px;margin-top:10px;"></textarea>
		</div>
		<div class="km-modal-footer">
			<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
			<button type="button" class="km-btn km-btn-primary" onclick="reportAbuse('<?php echo $_GET['itemId'];?>');">Report Abuse</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script src="/assets/js/unslider.min.js"></script>
<script>
$(function() {
    $('.banner').unslider({
//		speed: 500,               //  The speed to animate each slide (in milliseconds)
//		delay: 3000,              //  The delay between slide animations (in milliseconds)
//		complete: function() {},  //  A function that gets called after every slide animation
//		keys: true,               //  Enable keyboard (left, right) arrow shortcuts
		dots: true,               //  Display dot navigation
//		fluid: false              //  Support responsive design. May break non-responsive designs
	});
});
</script>