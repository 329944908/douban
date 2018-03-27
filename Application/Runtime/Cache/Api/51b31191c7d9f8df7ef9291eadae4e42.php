<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页-B2C商城|B2C</title>
	<link rel="stylesheet" href="/Public/api/css/b2c.css" type="text/css">
    <link rel="stylesheet" href="/Public/api/css/jquery.fullpage.css" type="text/css">
	<script type="text/javascript" src="/Public/api/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="/Public/api/js/jquery.fullPage.js"></script>
</head>
<body>
	<div class="header clearfix">
		<div class="box-header">
			<div class="new-header clearfix">
				<div class="header-left">
				    送货至：
	                <a href="javascript:void(0)" class="city">北京市，</a>
	                <i></i>
	                <span class="new-login">
	                	<a href="javascript:void(0)" class="login">
						<?php  if($_SESSION['me']){ echo $_SESSION['me']['name']; } else{ ?>
									<a href="<?php echo U('/user/login');?>" class="login">登录</a>
	                			<?php } ?>
	                	</a>
	                	<?php  if($_SESSION['me']){ ?>
	                		<a href="<?php echo U('/user/logout');?>" class="enroll">注销</a>
	                	<?php } else{ ?>
	                	<a href="<?php echo U('/user/reg');?>" class="enroll">注册</a>
	                	<?php }?>
	                </span>
				</div>
				<div class="header-right clearfix">
					<a href="javascript:void(0)">我的订单</a>
					<a href="javascript:void(0)">我的浏览</a>
					<a href="javascript:void(0)">我的收藏</a>
					<a href="javascript:void(0)">客户服务</a>
					<a href="javascript:void(0)">网站导航 <i></i></a>
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
	<div class="nav-box">
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
		<div class="nav-carousel">
		    <div class="page">
		    	<a href="javascript:void(0)" class="last-page"></a>
		    	<a href="javascript:void(0)" class="next-page"></a>
		    </div>
			<div class="clearfix carousel-img">
			   <div class="new-carousel">
			   	<?php foreach ($ad as $key => $value) { if($value['position']==1){ ?>
			   		<a href="<?php echo $value['url'];?>" style="background:#F6F6F6">
						<img src="<?php echo $value['img'];?>" alt="">
					</a>
			   	<?php }}?>
			   </div>
			   <div class="two-ad">
			   	    <a href="javascript:void()0">
			   	    	<img src="/Public/api/image/ad1.jpg" alt="">
			   	    </a>
			   	    <a href="javascript:void()0">
			   	    	<img src="/Public/api/image/ad2.jpg" alt="">
			   	    </a>
			   </div>
			</div>
			<div class="pagin">
				<a href="javascript:void(0)" ></a>
				<a href="javascript:void(0)" class="active"></a>
				<a href="javascript:void(0)"></a>
				<a href="javascript:void(0)"></a>
				<a href="javascript:void(0)"></a>
			</div>
            <div class="nav-goods">
                <div>
            		<a href="javascript:void(0)">
	            		<i class="ico-0"></i>
	            		全部商品分类
	            	</a>
            	</div>
            	<?php foreach ($classify as $key => $value) { ?>
            	<div>
            		<a href="javascript:void(0)">
	            		<i class="ico-<?php echo $key+1;?>"></i>
	            		<?php echo $value['name'];?>
	            	</a>
	            	<div class="make hide"></div>
	            	<div class="classify hide clearfix">
	            		<div class="new-classify">
	            			<span id="expret">
	            				<a href="javascript:void(0)" > 电池，电源，充电器
	            			    <i>></i>
	            			    </a>
	            			</span>
	            			<?php foreach ($value['child'] as $k => $v) { ?>	
                            <p>
                            	<a href="<?php echo U('/goods/lists',array('id'=>$v['id']));?>"><?php echo $v['name'];?></a> 
                            	<?php foreach ($v['c'] as $k2 => $v2) { ?>
                            		<a href="<?php echo U('/goods/lists',array('id'=>$v2['id']));?>"><?php echo $v2['name'];?></a> 
								<?php } ?>
                            </p>
                            <?php } ?>
	            		</div>
	            		<div class="make-img">
	            			<img src="/Public/api/image/make-img.jpg" alt="">
	            		</div>
	            	</div>
            	</div>
            	<?php } ?>
            </div>
		</div>
	</div>
	<div class="nav-fixed hide">
		<a href="javascript:void(0)" class="add">
			<span>1F</span>
			<span>数码</span>
		</a>
		<a href="javascript:void(0)">
			<span>2F</span>
			<span>电脑</span>
		</a>
		<a href="javascript:void(0)">
			<span>3F</span>
			<span>家用</span>
		</a>
		<a href="javascript:void(0)">
			<span>4F</span>
			<span>手机</span>
		</a>
	</div>
	<div class="content">
		<div class="box-ad clearfix">
		<?php foreach ($ad as $key => $value) { if($value['position']==2){?>
			<a href="<?php echo $value['url'];?>">
				<img src="<?php echo $value['img'];?>" alt="">
			</a>
		<?php }}?>
		</div>
		<div class="long-ad">
		<?php foreach ($ad as $key => $value) { if($value['position']==3){ ?>
				<a href="<?php echo $value['url'];?>">
				<img src="<?php echo $value['img'];?>" alt="">
			</a>
		<?php }} ?>
		</div>
		<div id="fullpage" class="new-fullpage clearfix">
				<?php foreach ($classify as $key => $value) { if($value['is_hot']){ foreach ($value['child'] as $k => $v) { if($v['is_hot']){ ?>
									<div class="section clearfix">
									<div class="section-left">
										<h3><?php echo $v['name'];?></h3>
										<a href="javascript:void(0)" class="make-big">
											<img src="/Public/api/image/section1.jpg" alt="">
										</a>
										<a href="javascript:void(0)" class="make-little">
											<img src="/Public/api/image/section2.jpg" alt="">
										</a>	
									</div>
									<p>
										<?php foreach ($v['c'] as $k2 => $v2) { $v['c'][$k2] = $v2['id'];?>
					                            <a href="javascript:void(0)"><?php echo $v2['name'];?></a> 
										<?php } ?>
								    	<a href="javascript:void(0)">更多 ></a>
								    </p>
									<div class="section-right">
									    <?php  foreach ($goods as $kg => $vg) { if(in_array($vg['classify_id'],$v['c'])!==false&&$vg['is_hot']&&$vg['status']){ ?>
												<a href="<?php echo U('/goods/goodsInfo',array('id'=>$vg['id']));?>">
													<p><?php echo $vg['name'];?></p>
													<span>￥<?php echo $vg['price'];?></span>
													<img src="<?php echo $vg['img'];?>" alt="">
												</a>
									    	  	<?php }?>
									    <?php } ?>
									</div>
									<div class="section-none">
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				<?php } ?>
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
	<div class="nav-top">
		<a href="javascript:void(0)" class="top-0">
			<div class="show hide">
				客服服务
			</div>
		</a>
		<a href="javascript:void(0)" class="top-1">
			<div class="show hide">
				客服服务
			</div>
		</a>
		<a href="javascript:void(0)" class="top-2">
			<div class="show hide">
				手机服务
			</div>
		</a>
		<a href="javascript:void(0)" class="top-3 hide">
			<div class="show hide">
				回到顶部
			</div>
		</a>
	</div>
	<script type="text/javascript" src="/Public/api/js/b2c.js"></script>
</body>
</html>