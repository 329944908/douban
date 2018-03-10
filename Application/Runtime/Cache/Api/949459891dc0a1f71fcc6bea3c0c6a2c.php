<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>b2c 登录</title>
	<link rel="stylesheet" href="/Public/api/css/login.css" type="text/css">
	<script type="text/javascript" src="/Public/api/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="/Public/api/js/login.js"></script>
	<script type="text/javascript">
	$(function() {
		$('.verify').click(function(){
			newsrc="/Api/User/verifyCode/v/"+Math.random();
			$('.verify').attr('src',newsrc);
		})
	})
	</script>
</head>
<body>
	<div class="login-welcome">
		<span>欢迎登录</span>
	</div>
	<div class="login">
		<div class="new-login">
			<a href="javascript:void(0)" class="login-bg">
				<img src="/Public/api/image/login.jpg" alt="">
			</a>
			<div class="login-from">
			<form action="/api/user/doLogin" method="get">
				<h4>账号登录</h4>
				<div class="big-login">
					<div class="user-input clearfix">
						<span class="user-pw"></span>
						<input type="text" name="email" placeholder="手机号/邮箱" class="click-phone">
				        <p class="hide"></p>

					</div>
					<div class="user-input clearfix">
						<span class="user-pmi"></span>
						<input type="password" name="password" placeholder="密码" class="set-pass">
				        <p class="hide"></p>

					</div>
					<div class="user-input clearfix chemk">
						<input type="text" class="do-try" name="verifyCode" placeholder="验证码">
						<img src="/api/user/verifyCode" class="verify"></img>
					</div>
					<a href="javascript:void(0)">忘记密码？</a>
					<div class="red-login">
					    <input type="submit" name="" value="登录" >
					</div>
				</form>
				</div>
				<div class="login-link clearfix" >
					<a href="javascript:void(0)">
						<i class="link-0"></i>
						<span>支付宝</span>
					</a>
					<a href="javascript:void(0)">
						<i class="link-1"></i>
						<span>微信</span>
					</a>
					<a href="javascript:void(0)">
						<i class="link-2"></i>
						<span>QQ</span>
					</a>
				</div>
				<div class="now-go">
					<a href="javascript:void(0)">
						<i></i>
					    <span>立即注册</span>
					</a>
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
	<div class="fixed-flow hide">
		<div class="fixed-box clearfix">
			<span>信息<a href="javascript:void(0)" class="fixed-a"></a></span>
			<div class="fixed-text clearfix">
				<i>	</i>
				<span>请用手机号或邮箱注册</span>
				<a href="javascript:void(0)">确认</a>
			</div>
		</div>
	</div>
</body>
</html>