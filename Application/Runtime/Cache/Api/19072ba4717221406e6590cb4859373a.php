<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="/Public/api/css/regcon.css" type="text/css">

	<script type="text/javascript" src="/Public/api/js/jquery-3.2.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
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
		<span>欢迎注册=</span>
	</div>
	<div class="recon-tab clearfix">
		<div class="clearfix">
			<span class="do-tab clearfix">
				<a href="javascript:void(0)" class="add-bg ">
					手机注册
				</a>
				<a href="javascript:void(0)">
					邮箱注册
				</a>
			</span>
			<span class="do-have">我已注册，马上<a href="javascript:void(0)">登录></a></span>
		</div>
	</div>
	<div class="tab-form">
		<div class="new-tabform">
		<form action="/api/user/doReg1" method="post">
			<div class="tab-line">
				<span>手机号码:</span>
				<input type="text" placeholder="请输入手机号码" name="phone" title="请填写此字段" class="click-phone" id="phone">
				<span id="chk"></span>
				<p class="hide">手机格式错误，请输入</p>
			</div>
			<div class="tab-line">
				<span>图像验证码:</span>
				<input type="text" placeholder="请输入验证码" name="verifyCode" class="line-pmg" title="请填写此字段" id="code_input">
				<span class="make-number">
					<!-- <i id="v_container"></i> -->
					<img src="/api/user/verifyCode" class="verify"></img>
				</span>
				<p class="hide">手机格式错误，请输入</p>
			</div>
			<div class="tab-line">
				<span>设置密码:</span>
				<input type="password" placeholder="填写6-16位数字与大小写字母组合" name="password" title="请填写此字段"  class="set-pass" id="set-pass">
				<p class="hide">手机格式错误，请输入</p>
			</div>
			<div class="tab-line">
				<span>确认密码:</span>
				<input type="password" placeholder="请再次输入密码" name="password2" title="请填写此字段" class="true-pass" id="true-pass">
				<p class="hide">手机格式错误，请输入</p>
			</div>
			<div class="check">
				<input type="checkbox" id="mycheck"><span>我已阅读并同意<a href="javascript:void(0)">《TPshop网服务协议》</a>
				</span>
			</div>
			<div class="check check-a check-about" >
				<input type="submit" name="" value="同意协议并注册">
			</div>
		</form>
		</div>
		<div class="new-tabform hide">
		<form action="/api/user/doReg2" method="post">
			<div class="tab-line">
				<span>邮箱:</span>
				<input type="text" placeholder="请输入邮箱账号" name="user-phone" title="请填写此字段" id="email">
				<p class="hide"></p>
			</div>
			<div class="tab-line">
				<span>图像验证码:</span>
				<input type="text" placeholder="请输入验证码" name="user-phone" class="line-pmg" title="请填写此字段" >
				<span class="make-number">
				    <img src="/api/user/verifyCode" class="verify"></img>
				</span>
				<p class="hide"></p>
			</div>
			<div class="tab-line">
				<span>设置密码:</span>
				<input type="password" placeholder="请输入密码" name="user-phone" title="请填写此字段" class="click-mi">
				<p class="hide"></p>

			</div>
			<div class="tab-line">
				<span>确认密码:</span>
				<input type="password" placeholder="请再次输入密码" name="user-phone" title="请填写此字段" class="click-que">
				<p class="hide"></p>

			</div>
			<div class="check">
				<input type="checkbox" id="hecheck"><span>我已阅读并同意<a href="javascript:void(0)">《TPshop网服务协议》</a>
				</span>
			</div>
			<div class="check check-a check-about" >
				<input type="submit" name="" value="同意协议并注册">
			</div>
		</form>
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
	<script type="text/javascript" src="/Public/api/js/segcon.js"></script>

</body>
</html>