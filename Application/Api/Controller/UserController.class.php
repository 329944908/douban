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
			$res = check_verify($verifyCode, $id = '');
			if($res){
					$userModel = D('User');
					$status = $userModel->add($data);
					if ($status){
		     			$this->success('注册成功','/api/user/login');
					}else{
		    			$this->error('注册失败');
					}
			}else{
					_res('验证码错误',false,'1004');
			}		
	}
	public function doReg2(){
			$data = array();
			$data['email'] = $_POST['email'];
			$data['password'] = $_POST['password'];
			$data['verifyCode'] = $_POST['verifyCode'];
			$userModel = D('User');
			$status = $userModel->add($data);
			if ($status){
     			$this->success('注册成功','/api/user/login');
			}else{
    			$this->error('注册失败');
			}
	}
	public function checkUserId(){
		$phone = I('get.phone','');
		$userModel = D('User');
		$data = $userModel->getUserInfoByPhone($phone);
		if($data){
			echo "<font color=red><nobr>此手机号已经注册过，请重新填写！</nobr></font>";
		}else{
			echo "<font color=green><nobr>该手机号可以注册</nobr></font>";
		}
	}
	public function checkEmail($email){
		$email = I('get.email','');
		$userModel = D('User');
		if(preg_match("/^([0-9A-Za-z]+)@(?:qq|163)\.(?:cn|com)/", $email)){
			$data = $usermodel->getUserInfoByEmail($email);
			if(!$data){
				_res('该邮箱不存在',false,'1007');
			}	
		}else{
			 _res('邮箱格式错误',false,'1004');
		}
	}
}