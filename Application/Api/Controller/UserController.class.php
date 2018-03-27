<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
	public function verifyCode(){
			$config =    array(
			    'fontSize'    =>   15,    // 验证码字体大小
			    'length'      =>    4,     // 验证码位数
			    'useNoise'    =>    true, // 关闭验证码杂点
			);
			$Verify = new \Think\Verify($config);
			$Verify->entry();
	}
	public function login(){
		$this->display();
	}
	public function doLogin(){
		$email = I('get.email','');
		$password = I('get.password','');
		$verifyCode = I('get.verifyCode','');
		$userModel = D('User');
		$data = $userModel->getUserInfoByEmail($email);
		$res = check_verify($verifyCode, $id = '');
		if($data['email_verify']){
			if($password ==$data['password']){
				if($res){
					$_SESSION['me']  = $data;
					$this->success('', '/api/Index/index');
				}else{
					_res('验证码错误',false,'1004');
				}
			}else{
				_res('密码错误',false,'1002');
			}
		}else{
			$this->error('邮箱未激活');
		}
		
	}
	public function logout(){
			unset($_SESSION['me']);
		    $this->success('', '/api/Index/index'); 
	}
	public function reg(){
		$this->display();
	}
	public function doReg1(){
			$data = array();
			$data['phone'] = $_POST['phone'];
			$data['password'] = $_POST['password'];
			$verifyCode = $_POST['verifyCode'];
			if(!empty($data['phone'])&&!empty($data['password'])&&!empty($verifyCode)){
				$res = check_verify($verifyCode, $id = '');
				if($res){
					$userModel = D('User');
					$status = $userModel->add($data);
					if ($status){
		     			$this->success('注册成功','/api/user/login','100');
					}else{
		    			$this->error('注册失败');
					}
				}else{
					_res('验证码错误',false,'1004');
				}
					
			}else{
				_res('不能为空',false,'1005');
			}
					
	}
	public function doReg2(){
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = $_POST['password'];
		$data['token'] = $data['email'].'_'.time().'_'.rand(0,10000);
		$data['token'] =md5($data['token']);
		$status = sendEmail($data['email'],$data['token']);
		if($status){
			$userModel = D('User');
			$res = $userModel->add($data);
			if ($res){
     			$this->success('已发送信息到邮箱，请继续完成验证','/api/user/login');
			}else{
    			$this->error('注册失败');
			}
		}

	}
	public function activate_mailbox(){
		$token = $_GET['token'];
		$userModel=D('User');
		$res = $userModel->activate($token);
		if ($res){
     		$this->success('验证成功','/api/user/login');
		}else{
    		$this->error('注册失败');
		}
	}
	public function checkUserId(){
		$phone = I('get.phone','');
		if(!empty($phone)){
			$isMatched = preg_match('/^0?(13|14|15|17|18)[0-9]{9}$/',$phone);
			if($isMatched){
				$userModel = D('User');
				$data = $userModel->getUserInfoByPhone($phone);
				if($data){
					echo "<font color=red><nobr>此手机号已经注册过，请重新填写！</nobr></font>";
				}else{
					echo "<font color=green><nobr>该手机号可以注册</nobr></font>";
				}
			}else{
			echo "<font color=red><nobr>请输入有效的手机号码！</nobr></font>";
			}
		}else{
			echo "<font color=red><nobr>手机号不能为空</nobr></font>";
		}
		
	}
	public function checkUserEmail(){
		$email = I('get.email','');
		if(!empty($email)){
			$isMatched = preg_match("/^([0-9A-Za-z]+)@(?:qq|163)\.(?:cn|com)/",$email);
			if($isMatched){
				$userModel = D('User');
				$data = $userModel->getUserInfoByEmail($email);
				if($data){
					echo "<font color=red><nobr>此邮箱已经注册过，请重新填写！</nobr></font>";
				}else{
					echo "<font color=green><nobr>该邮箱可以注册</nobr></font>";
				}
			}else{
			echo "<font color=red><nobr>请输入有效的邮箱！</nobr></font>";
			}
		}else{
			echo "<font color=red><nobr>邮箱不能为空</nobr></font>";
		}
	}
	// public function check_verify(){
	// 	$verifyCode = I('get.verifyCode','');
	//     $verify = new \Think\Verify();
	//     $res = $verify->check($verifyCode,'');
	//     if ($res) {
	// 	}else{
	// 		$ret = false;
	// 	}
	// }
}