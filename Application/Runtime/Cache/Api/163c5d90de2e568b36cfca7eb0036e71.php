<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<link rel="stylesheet" href="/Public/api/css/goodsinfo.css" type="text/css">
	<link rel="stylesheet" href="/Public/api/css/b2c.css" type="text/css">
	<script type="text/javascript" src="/Public/api/js/jquery-3.2.0.min.js"></script>	
    <!-- // <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script> -->
    <!-- <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet"> -->
    <!-- // <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script> -->
	<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
	<script src="/Public/api/js/distpicker.data.js"></script>
	<script src="/Public/api/js/distpicker.js"></script>
	<script src="/Public/api/js/main.js"></script>
</head>
<body>
	<div class="header clearfix">
		<div class="box-header">
			<div class="new-header clearfix">
				<div class="header-left">
				    送货至：
	                <a href="javascript:void(0)" class="city">北京市，
	                 <i></i>
	                </a>
	                <div class="city-hide hide">
	                	<div class="choose-city">
	                		<a href="javascript:void(0)" class="cap-city">北京市</a>
	                		<a href="javascript:void(0)" class="mun-city">市辖区</a>
	                		<a href="javascript:void(0)" class="area-city">朝阳区</a>
	                	</div>
	                	<div class="about-city">
	                		
	                	</div>
	                </div>
	                <span class="new-login">
	                	<a href="<?php echo U('/api/user/login');?>" class="login">登录</a>
	                	<a href="<?php echo U('/api/user/reg');?>" class="enroll">注册</a>
	                </span>
				</div>
				<div class="header-right clearfix">
					 <ul class="clearfix header-ul">
					 	<li>
					 		<a href="javascript:void(0)">我的订单</a>
					 	</li>
					 	<li>
					 		<a href="javascript:void(0)">我的浏览</a>
					 	</li>
					 	<li>
					 		<a href="javascript:void(0)">我的收藏</a>
					 	</li>
					 	<li>
					 		<a href="javascript:void(0)">客户服务</a>
					 	</li>
					 	<li>
					 		<a href="javascript:void(0)" class="webb">
							   	网站导航<i></i>
							   <span class="bigs"></span>  
							</a>
							<div class="web-hide clearfix hide">
	                       	   <a href="javascript:void(0)" class="web-about">优惠活动</a>
	                       	   <a href="javascript:void(0)" class="web-about">优惠活动</a>
	                       	   <a href="javascript:void(0)" class="web-about">优惠活动</a>
	                       </div>
					 	</li>
					 </ul>	
				</div>
			</div>
		</div>
		<div class="nav-search clearfix">
			<div class="search-middle">
				<span class="search-text clearfix">
					<input type="text" placeholder="请输入搜素关键词...">
				    <a href="javascript:void(0)">搜索</a>
				</span>
				<span class="clearfix">
					<a href="javascript:void(0)">小米</a>
					<a href="javascript:void(0)">手机</a>
					<a href="javascript:void(0)">iphone</a>
					<a href="javascript:void(0)">三星</a>
					<a href="javascript:void(0)">华为</a>
					<a href="javascript:void(0)">冰箱</a>
				</span>
			</div>
			<div class="shoping-abo">
				<div class="shoping clearfix">
					<i></i>
					我的购物车
					<sup>0</sup>
			    </div>
			    <div class="shoping-a hide">
					<span>
						<i></i>
						亲！购物车里没有商品哦
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="nav-carousel">
	    <div class="nav-select">
			<a href="javascript:void(0)">首页</a>
			<a href="javascript:void(0)">手机城</a>
			<a href="javascript:void(0)">珠宝</a>
			<a href="javascript:void(0)">家电城</a>
			<a href="javascript:void(0)">促销商品</a>
			<a href="javascript:void(0)">预售</a>
			<a href="javascript:void(0)">数码城</a>
			<a href="javascript:void(0)">团购</a>
	        <a href="javascript:void(0)">积分商城</a>
		</div>
		<div class="nav-goods clearfix" id="nav-goods">
	        <div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-0"></i>
	        		全部商品分类
	        	</a>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-1"></i>
	        		数码产品
	        	</a>
	        	<div class="make hide"></div>
	        	<div class="classify hide clearfix">
	        		<div class="new-classify">
	        			<span id="expret">
	        				<a href="javascript:void(0)" > 电池，电源，充电器
	        			    <i>></i>
	        			    </a>
	        			</span>
	                    <p>
	                    	<a href="javascript:void(0)">手机配件</a>
	                    	<a href="javascript:void(0)">电源电池充电器</a>
	                    	<a href="javascript:void(0)">贴膜，保护套</a> 	
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">摄影摄像</a>
	                    	<a href="javascript:void(0)">数码相机</a>
	                    	<a href="javascript:void(0)">镜头</a> <a href="javascript:void(0)">数码边框</a> 
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">运营商</a>
	                    	<a href="javascript:void(0)">选号码</a>
	                    	<a href="javascript:void(0)">办套餐</a>
	                    	<a href="javascript:void(0)">合约机</a>
	                    	<a href="javascript:void(0)">中国移动</a> 	
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">手机配件</a>
	                    	<a href="javascript:void(0)">电源电池充电器</a>
	                    	<a href="javascript:void(0)">贴膜，保护套</a> 	
	                    </p>
	        		</div>
	        		<div class="make-img">
	        			<img src="/Public/api/image/make-img.jpg" alt="">
	        		</div>
	        	</div>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-2"></i>
	        		家用电器
	        	</a>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-3"></i>
	        		电脑
	        	</a>
	        	<div class="make hide"></div>
	        	<div class="classify hide clearfix">
	        		<div class="new-classify">
	                    <p>
	                    	<a href="javascript:void(0)">手机配件</a>
	                    	<a href="javascript:void(0)">电源电池充电器</a>
	                    	<a href="javascript:void(0)">贴膜，保护套</a> 	
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">摄影摄像</a>
	                    	<a href="javascript:void(0)">数码相机</a>
	                    	<a href="javascript:void(0)">镜头</a> <a href="javascript:void(0)">数码边框</a> 
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">运营商</a>
	                    	<a href="javascript:void(0)">选号码</a>
	                    	<a href="javascript:void(0)">办套餐</a>
	                    	<a href="javascript:void(0)">合约机</a>
	                    	<a href="javascript:void(0)">中国移动</a> 	
	                    </p>
	                     <p>
	                    	<a href="javascript:void(0)">手机配件</a>
	                    	<a href="javascript:void(0)">电源电池充电器</a>
	                    	<a href="javascript:void(0)">贴膜，保护套</a> 	
	                    </p>
	        		</div>
	        		<div class="make-img">
	        			<img src="/Public/api/image/make-img.jpg" alt="">
	        		</div>
	        	</div>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-4"></i>
	        		家具
	        	</a>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-5"></i>
	        		服装
	        	</a>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-6"></i>
	        		箱包
	        	</a>
	    	</div>
	    	<div>
	    		<a href="javascript:void(0)">
	        		<i class="ico-7"></i>
	        		个人化妆
	        	</a>
	    	</div>	
	    </div>
	</div>
	<div class="detail-box clearfix">
		<div class="detail-header">
			<a href="javascript:void(0)">家用电器</a>
		    <i class="path-ico"></i>
            <a href="javascript:void(0)">大家电</a>
		    <i class="path-ico"></i>
		    <a href="javascript:void(0)">电视</a>
		    <i class="path-ico"></i>
		    <a href="javascript:void(0)">
			    <span>长虹(CHANGHONG) 49A1U 49英寸双64位4K超清智能网络LED液晶电视
			    </span>
		    </a>
		</div>
		<div class="introduction clearfix">
			<div class="introdu-img clearfix">
				<div class="introdu-box clearfix">
				    <div class="introdu-small clearfix">
				        <img src="/Public/api/image/goods_sub_thumb_115_236_236.jpeg" alt="small Image" class="bigb" id="showbox">
				        <div class="introdu-mask"></div>
				    </div>
				    <div class="introdu-big hide">
				        <img src="/Public/api/image/goods_sub_thumb_115_236_236.jpeg" alt="Big Image">
				    </div>
				</div>
				<div class="hover-lun clearfix">
		        	<a href="javascript:void(0)" class="a-before">
		        		<span>
		        			<img src="/Public/api/image/goods_sub_thumb_115_236_236.jpeg" alt="">
		        		</span>
		        	</a>
		        	<a href="javascript:void(0)" >
		        		<span>
		        			<img src="/Public/api/image/goods_sub_thumb_117_236_236.jpeg" alt="">
		        		</span>
		        	</a>
		        	<a href="javascript:void(0)">
		        		<span>
		        			<img src="/Public/api/image/goods_sub_thumb_116_236_236.jpeg" alt="">
		        		</span>
		        	</a>
		        	<a href="javascript:void(0)">
		        		<span>
		        			<img src="/Public/api/image/goods_sub_thumb_115_236_236.jpeg" alt="">
		        		</span>
		        	</a>
		        	<a href="javascript:void(0)">
		        		<span>
		        			<img src="/Public/api/image/goods_sub_thumb_114_236_236.jpeg" alt="">
		        		</span>
		        	</a>
		        </div>
				<div class="intro-mazi">
					<h1>
					    长虹(CHANGHONG) 49A1U 49英寸双64位4K超清智能网络LED液晶电视
					</h1>
					<div class="hei-datailcon">
						<div class="sell-hei ">
							<div class="clearfix">
								<span>商城价:</span>
								<span>￥6666</span>
							</div>
							<div class="clearfix sell-elaehei">
								<span>市场价:</span>
								<span>￥6666</span>
							</div>
						</div>
						<div class="number-hei">
							<a href="javascript:void(0)">
								<span>累积量</span>
								<span>3</span>
							</a href="javascript:void(0)">
							<a href="javascript:void(0)">
								<span>累积量</span>
								<span>3</span>
							</a href="javascript:void(0)">
						</div>
					</div>
					<div class="intro-city">
						<div class="intro-list">
							<span>配 送:</span>
							<div class="intro-makecity">
								<form class="form-inline">
								    <div data-toggle="distpicker">
								        <div class="form-group ">
								          <label class="sr-only" for="province1"></label>
								          <select class="form-control " id="province1"></select>
								        </div>
								        <div class="form-group">
								          <label class="sr-only" for="city1"></label>
								          <select class="form-control" id="city1"></select>
								        </div>
								        <div class="form-group">
								          <label class="sr-only" for="district1"></label>
								          <select class="form-control" id="district1"></select>
								        </div>
								    </div>
								</form>
							</div>
							<span>可配送</span>
						</div>
						<div class="intro-list">
							<span>服 务:</span>
							<span>由<a href="javascript:void(0)">最好的B2B2C商城</a>
							发货并提供售后服务</span>
						</div>
						<div class="intro-list">
							<span>尺 寸:</span>
							<div class="intro-makeci">
							<a href="javascript:void(0)">
								42
							</a>
							</div>
							
						</div>
						<div class="intro-list">
							<span>数 量:</span>
							<div class="intro-jinumber">
								<input id="min" name="" type="button" value="-" /> 
								<input id="text_box" name="" type="text" value="1" style="width:30px;text-align: center"/> 
								<input id="add" name="" type="button" value="+" /> 
							</div>
							<span>库存：100</span>
						</div>
						<div class="intro-list intro-lista">
							<a href="javascript:void(0)">立即购买</a>
							<a href="javascript:void(0)"><i></i>加入购物车</a>
						</div>
					</div>
				</div>
			</div>
			<div class="introdu-more">
                <div class="more-h2">
				    <h2>看了又看 <a href="javascript:void(0)">换一换</a></h2>
                </div>
                <div class="more-hope">
                	<a href="javascript:void(0)">
                		<img src="/Public/api/image/goods_thumb_1_206_206.jpeg" alt="">
                		<p>Apple iPhone 6s Plus 16哈哈哈哈</p>
                		<span>￥6666</span>
                	</a>
                </div> 
                <div class="more-hope">
                	<a href="javascript:void(0)">
                		<img src="/Public/api/image/goods_thumb_142_206_206.jpeg" alt="">
                		<p>Apple iPhone 6s Plus 16哈哈哈哈</p>
                		<span>￥6666</span>
                	</a>
                </div> 
			</div>
		</div>
		<div class="data-list">
			<div class="data-left">
				<div class="left-header">
					<div class="left-h2">
						<h2>热卖推荐</h2>
					</div>
					<div class="clearfix">
						<a href="javascript:void(0)">三星</a>
						<a href="javascript:void(0)">三星</a>
						<a href="javascript:void(0)">三星</a>
						<a href="javascript:void(0)">三星</a>
						<a href="javascript:void(0)">三星</a>
						<a href="javascript:void(0)">三星</a>
					</div>
				</div>
				<div class="left-bhot">
					<div class="left-h2">
						<h2>热卖推荐</h2>
					</div>
					<div class="more-hopehot">
	                	<a href="javascript:void(0)">
	                		<img src="/Public/api/image/goods_thumb_1_206_206.jpeg" alt="">
	                		<p>Apple iPhone 6s Plus 16哈哈哈哈</p>
	                		<span>￥6666</span>
	                	</a>
	                </div> 
	                 <div class="more-hopehot">
	                	<a href="javascript:void(0)">
	                		<img src="/Public/api/image/goods_thumb_1_206_206.jpeg" alt="">
	                		<p>haier海尔 BC-93TMPF 93升单门冰箱</p>
	                		<span>￥6666</span>
	                	</a>
	                </div> 
				</div>
			</div>
			<div class="data-right">
				<div class="right-tab clearfix">
					<a href="javascript:void(0)" class="tab-red">商品介绍</a>
					<a href="javascript:void(0)" >规则及介绍</a>
					<a href="javascript:void(0)">评论</a>
					<a href="javascript:void(0)">售后服务</a>
				</div>
				<div class="tab-numbid">
					<div class="numdiv-one">
						<p>商品名称：长虹(CHANGHONG) 49A1U 49英寸双64位4K超清智能网络LED液晶电视</p>
						<ul class="clearfix">
							<li><span>品牌</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>品牌：555</span></li>
							<li><span>：</span></li>
						</ul>
					</div>
					<div class="numdiv-one  hide">
						<div class="pin">
							<p>属性</p>
							<p><span>皮牌</span><span>长虹555555</span></p>
							<p>49A1U</p>
							<p>3840×2160</p>
							<p><span>屏幕尺寸</span><span>5</span></p>
							<p>属性</p>
							<p><span>皮牌</span><span>长虹555555</span></p>
						</div>
					</div>
					<div class="numdiv-one hide">
						<p>商品名称：长虹(CHANGHONG) 49A1U 49英寸双64位4K超清智能网络LED液晶电视</p>
						<ul class="clearfix">
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>品牌：555</span></li>
							<li><span>：</span></li>
						</ul>
					</div>
					<div class="numdiv-one hide">
						<p>商品名称：长虹(CHANGHONG) 49A1U 49英寸双64位4K超清智能网络LED液晶电视</p>
						<ul class="clearfix">
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>货号：TP0000065</span></li>
							<li><span>品牌：555</span></li>
							<li><span>：</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="floor">
		<div class="floor-make">
			<div>
				<span>
					<i class="make-0"></i>
					7天无理由退货
				</span>
				<span>
					<i class="make-1"></i>
					15天免费换货
				</span>
				<span>
					<i class="make-2"></i>
					正品行货 品质保障
				</span>
				<span>
					<i class="make-3"></i>
					专业售后服务
				</span>
			</div>
		</div>
		<div class="new-floor">
			<div class="floor-more clearfix">
				<div class="clearfix">
					<dl>
						<dt>购物指南</dt>
						<dd>
							<a href="javascript:void(0)">会员修改密码
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">修改个人资料
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员等级
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">
							常见问题
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员地址
							</a>
						</dd>
					</dl>
					<dl>
						<dt>购物指南</dt>
						<dd>
							<a href="javascript:void(0)">会员修改密码
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">修改个人资料
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员等级
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">
							常见问题
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员地址
							</a>
						</dd>
					</dl>
					<dl>
						<dt>购物指南</dt>
						<dd>
							<a href="javascript:void(0)">会员修改密码
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">修改个人资料
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员等级
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">
							常见问题
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员地址
							</a>
						</dd>
					</dl>
					<dl>
						<dt>购物指南</dt>
						<dd>
							<a href="javascript:void(0)">会员修改密码
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">修改个人资料
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员等级
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">
							常见问题
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员地址
							</a>
						</dd>
					</dl>
					<dl>
						<dt>购物指南</dt>
						<dd>
							<a href="javascript:void(0)">会员修改密码
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">修改个人资料
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员等级
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">
							常见问题
							</a>
						</dd>
						<dd>
							<a href="javascript:void(0)">会员地址
							</a>
						</dd>
					</dl>
					<span class="fend">
						<b>友情链接：</b>
						<div class="first">
							<a href="javascript:void(0)" >
							淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
							<a href="javascript:void(0)">
								淘宝商城
							</a>
						</div>
					</span>
				</div>
				<div>
					<span>联系我们</span>
					<span class="color">123456789</span>
					<p>周一至周日8:00-18:00</br>
					  (仅收市话费)
					</p>
					<a href="javascript:void(0)">
						<img src="/Public/api/image/qrcode.png" alt="">
					</a>
					<a href="javascript:void(0)">
						<img src="/Public/api/image/qrcode.png" alt="">
					</a>
				</div>
			</div>
		</div>
		<div class="over">
			<div class="new-over">
				<span>
					<a href="javascript:void(0)">关于我们</a>
					<a href="javascript:void(0)">关于我们</a>
					<a href="javascript:void(0)">关于我们</a>
					<a href="javascript:void(0)">关于我们</a>
					<a href="javascript:void(0)">关于我们</a>
					<a href="javascript:void(0)">关于我们</a>
				</span>
				<p>Copyright © 2016-2025 TPshop商城 版权所有 保留一切权利 备案号:粤12345678号
				</p>
				<p>
					<a href="javascript:void(0)" class="over-0"></a>
					<a href="javascript:void(0)" class="over-1"></a>
					<a href="javascript:void(0)" class="over-2"></a>
					<a href="javascript:void(0)" class="over-3"></a>
					<a href="javascript:void(0)" class="over-4"></a>
				</p>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="/Public/api/js/goodsinfo.js"></script>
    <script type="text/javascript" src="/Public/api/js/detail.js"></script>
	<script>
	$(document).ready(function(){
	//获得文本框对象
		var t = $("#text_box");
		//初始化数量为1,并失效减
		$('#min').attr('disabled',true);
		 //数量增加操作
		 $("#add").click(function(){ 
		  // 给获取的val加上绝对值，避免出现负数
		  t.val(Math.abs(parseInt(t.val()))+1);
		  if (parseInt(t.val())!=1){
		  $('#min').attr('disabled',false);
		  };
		 }) 
		 //数量减少操作
		 $("#min").click(function(){
		 t.val(Math.abs(parseInt(t.val()))-1);
		 if (parseInt(t.val())==1){
		 $('#min').attr('disabled',true);
		 };
         })

	})
		
    </script>
</body>
</html>