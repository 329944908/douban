<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function verify_c(){  
	    $Verify = new \Think\Verify();  
	    $Verify->fontSize = 18;  
	    $Verify->length   = 4;  
	    $Verify->useNoise = false;  
	    $Verify->codeSet = '0123456789';  
	    $Verify->imageW = 130;  
	    $Verify->imageH = 50;  
	    //$Verify->expire = 600;   	
	    $Verify->entry();  
	}

    public function index(){
		$this->display('index');
    }

    public function main () {
        $this->display('main');
    }
    public function dologin(){
    	$model  =  M('admin');
    	$email = I('post.email');
    	$password = md5(I('post.password'));
    	
		$result = $model->where(array('email' => $email, 'password' => $password))->find();
    	if ($result) {
    		$_SESSION['admin']['me'] = $result;
    		$this->redirect('index');
    	}else{
            $this->error('登陆失败');
        }
    	 
    }
    public function logout(){
    	$_SESSION['admin']['me'] = "";
    	$this->redirect('index');
    }
}