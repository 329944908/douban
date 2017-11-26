<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class SystemController extends CommonController
{
  public function _initialize(){
        $this->checkLogin();
    }
  public function lists(){
        $limit = 20;
        $pageNum        = I('pageNum', 1);
        $orderField     = I('orderField', 'id');
        $orderDirection = I('orderDirection', 'desc');
        $numPerPage     = I('numPerPage', $limit);
        
        $offset = ($pageNum -1) * $numPerPage;

        if (I('request.email')) {
            $where['email'] = I('request.email');
        }
        if (I('request.id')) {
            $where['id'] = I('request.id');
        }
        $totalCount  = M('admin')->where($where)->count('id');
        $lists = M('admin')->where($where)->order($orderField.' '.$orderDirection)->limit($offset.','.$numPerPage)->select();
        $page = array('pageNum'=>$pageNum, 'orderField'=>$orderField, 'orderDirection'=>$orderDirection, 'numPerPage'=>$numPerPage, 'totalCount'=>$totalCount);
        $this->assign('page', $page);
        $this->assign('lists',$lists);
        $this->display();
    }
	public function status(){
		$systemStatus = M('system')->where(array('id'=>1))->find();
		$this->assign('systemStatus',$systemStatus);
		$this->display();
	}
	public function ajaxChangeStatus(){
		$data = I('post.');
		if (M('system')->where(array('id'=>1))->save($data)) {
			$result['statusCode'] = "200";
            $result['message']   = "操作成功";
            $result['navTabId'] = "system";
            $result['rel']   = "system";
            $result['callbackType'] = "closeCurrent";
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";
            $this->ajaxReturn($result);
        }
	}
	public function ajaxDoAdd(){
		$pattern="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
		$data = I('post.');
		if(!preg_match($pattern,$data['email'])){
            echo "<script>alert('邮箱格式错误!');</script>";
       	}else{
            if($data['password']!=$data['ckpassword']){
            	echo "<script>alert('两次输入的密码不一致!');</script>";
            }
       	}
    $data['password'] = md5($data['password']);
		if (M('admin')->add($data)) {
			$result['statusCode'] = "200";
            $result['message']   = "操作成功";
            $result['navTabId'] = "system";
            $result['rel']   = "system";
            $result['callbackType'] = "closeCurrent";
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";
            $this->ajaxReturn($result);
        }
	}

	public function ajaxDoChange(){
		$aid = $_SESSION['admin']['me']['id'];
		$data = I('post.');
		$oldpasswd = M('admin')->where(array('id'=>$aid))->field('password')->find();
		$oldpwd = md5($data['oldpwd']);
		if($oldpasswd['password'] != $oldpwd){
            echo "<script>alert('原始密码错误!');</script>";
       	}else{
            if($data['password']!=$data['ckpassword']){
            	echo "<script>alert('两次输入的密码不一致!');</script>";
            }
       	}
    	$map['password'] = md5($data['password']);
     	$results = M('admin')->where(array('id'=>$aid))->save($map);
		if ($results) {
			echo "<script>alert('修改成功!');location.href='/admin/Index/logout'</script>";
        }else{
        	echo "<script>alert('修改失败!新密码不可和原密码相同');history.back();</script>";
        }
	}

  public function edit(){
    $id = I('get.id');
    $admin = M('admin')->where("id=$id")->find();
    $this->assign('admin',$admin);
    $this->assign('id',$id);
    $this->display();
  }

  public function saveData(){
    $id = I('post.id');
    $data['email'] = I('post.email');
    $data['nickname'] = I('post.nickname');
    if (I('post.password')) {
      $data['password'] = md5(I('post.password'));
    }
    M('admin')->where("id = $id")->save($data);
    $result['statusCode'] = "200";
    $result['message']   = "操作成功";
    $result['navTabId'] = "system";
    $result['rel']   = "system";
    $result['callbackType'] = "closeCurrent";
    $result['forwardUrl']   = "";
    $result['confirmMsg'] = "";
    $this->ajaxReturn($result);
  }

  public function delete(){
    $id = I('get.id');
    M('admin')->where('id='.$id)->delete();
    $result['statusCode'] = "200";
    $result['message']   = "操作成功";
    $result['navTabId'] = "system";
    $result['rel']   = "system";
    $this->ajaxReturn($result);
  }
}