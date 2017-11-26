<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function _initialize(){
        $this->checkLogin();
    }
    public $user_status = array(
        -1 => array('id'=>0, 'name'=>'开启中'),
        1 => array('id'=>1, 'name'=>'关闭中'),
    );
    public $formal_status = array(
        -1 => array('id'=>0, 'name'=>'未验证'),
        1 => array('id'=>1, 'name'=>'已验证'),
    );
	public function lists(){
        $limit = 20;
        $pageNum        = I('pageNum', 1);
        $orderField     = I('orderField', 'id');
        $orderDirection = I('orderDirection', 'desc');
        $numPerPage     = I('numPerPage', $limit);
        
        $offset = ($pageNum -1) * $numPerPage;
        if (I('request.realname')) {
            $where['realname'] = I('request.realname');
        }
        if (I('request.email')) {
            $where['email'] = I('request.email');
        }
        if (I('request.idcard')) {
            $where['idcard'] = I('request.idcard');
        }
        if (I('request.status')) {
            $where['is_del'] = I('request.status');
        }
        if (I('request.fstatus')) {
            $where['formal'] = I('request.fstatus');
        }
        if (I('request.province')) {
            $where['province'] = I('request.province');;
        }
        $totalCount  = M('User')->where($where)->count('id');
        $lists = M('User')->where($where)->order($orderField.' '.$orderDirection)->limit($offset.','.$numPerPage)->select();
        foreach ($lists as $k => &$v) {
            $v['time_length'] = round($v['time_length']/3600,1);
            // $area_id = I('request.province');
            // $province =  M('areas')->where(array('area_id'=>$area_id))->find();
            // $v['province_name'] =  $province['area_name'];
        }
        $areas = M('areas')->where(array('area_type'=>1))->select();
        $page = array('pageNum'=>$pageNum, 'orderField'=>$orderField, 'orderDirection'=>$orderDirection, 'numPerPage'=>$numPerPage, 'totalCount'=>$totalCount);
        $this->assign('page', $page);
        $this->assign('areas',$areas);
        $this->assign('lists',$lists);
        $this->assign('formal_status',$this->formal_status);
        $this->assign('user_status',$this->user_status);
        $this->display();
    }
    public function edit_permission(){
        $id = I('get.id');
        if ($id) {
            $user_info = M('user_permission')->where(array('uid' => $id))->find();
            $this->assign('user_info',$user_info);
            $uid = $user_info['uid'];
            $user = M('user')->where(array('id'=>$uid))->find();
            $user_info['realname'] = $user['realname'];
            $this->assign('user_info',$user_info);
        }
        $this->display();
    }
    /*
    充值功能
     */
    public function topUp(){
        $uid = I('get.uid');
        $userinfo = M('user')->where(array('id' => $uid))->find();
        $this->assign('info',$userinfo);
        $this->display();
    }

    public function doTopUp(){
        $time = intval(I('post.time'));
        $time_s = $time * 3600;
        $uid = I('post.id');
        $info = M('user')->where(array('id'=>$uid))->find();
        $data['update_time'] = time();
        $data['time_length'] = $info['time_length'] + $time_s;
        if (M('user')->where(array('id'=>$uid))->save($data)) {
            $log['user_id'] = $uid;
            $log['admin_id'] = $_SESSION['admin']['me']['id'];
            $log['value'] = $time_s;
            $log['create_time'] = time();
            D('UserLog')->addLog($log);
            
            $result['statusCode'] = "200";
            $result['message']   = "充值成功";
            //$result['navTabId'] = "user";
            //$result['rel']   = "user";
            
            $result['callbackType'] = "closeCurrent";
            
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";

            $this->ajaxReturn($result);
        }else{
            $this->error('服务器繁忙，充值失败');
        }
    }

    public function ajaxChangeStatus(){
        if (I('get.status')) {
            $data['is_del'] = I('get.status');
        }
        if (I('get.formal')) {
            $data['formal'] = I('get.formal');
            $data['time_length'] = 50 *3600;
        }
        $data['update_time'] = time();
        $id = I('get.id');
        if (M('user')->where(array('id'=>$id))->save($data)) {
            $result['statusCode'] = "200";
            $result['message']   = "修改成功";
            //$result['navTabId'] = "user";
            //$result['rel']   = "user";
            if (I('close_dialog') == 1) {
                $result['callbackType'] = "closeCurrent";
            }            
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";

            $this->ajaxReturn($result);
        }else{
            $this->error('修改失败');
        }
    }

    public function edit_user(){
        $id = I('get.id');
        if ($id) {
            $user_info = M('user')->where(array('id' => $id))->find();
            $user_info['time_length'] = round($user_info['time_length']/3600,1); 
            $this->assign('user_info',$user_info);
        }
        $areas = M('areas')->where(array('area_type'=>1))->select();
        $this->assign('areas',$areas);
        $this->display();
    }

    public function saveUser(){
        $data = I('post.');
        $id = I('post.id');
        if (M('user')->where(array('id' => $id ))->save($data)) {
            $result['message']   = "修改成功";
            if (I('close_dialog') == 1) {
                $result['callbackType'] = "closeCurrent";
            }
            $result['statusCode'] = "200";
            //$result['navTabId'] = "user";
            //$result['rel']   = "user";           
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";
        }else {
            $result['message']   = "修改失败";
        }
            
            $this->ajaxReturn($result);
    }

    public function ajaxChangePermission(){
        $id = I('post.uid');
        $data = I('post.');
        if (M('user_permission')->where(array('uid'=>$id))->save($data)) {
            $result['statusCode'] = "200";
            $result['message']   = "操作成功";
            //$result['navTabId'] = "user";
            //$result['rel']   = "user";
            $result['callbackType'] = "closeCurrent";
            $result['forwardUrl']   = "";
            $result['confirmMsg'] = "";
            $this->ajaxReturn($result);
        }
    }

    public function del(){
        $id = I('get.id');
        M('User')->where(array('id'=>$id))->delete();
        M('User_session')->where(array('user_id'=>$id))->delete();
        $result['statusCode'] = "200";
        $result['message']   = "删除成功";
        //$result['navTabId'] = "user";
        //$result['rel']   = "user";
        if (I('close_dialog') == 1) {
            $result['callbackType'] = "closeCurrent";
        }
        $result['forwardUrl']   = "";
        $result['confirmMsg'] = "";
        $this->ajaxReturn($result);
    }

    public function online(){
        $limit = 20;
        $pageNum        = I('pageNum', 1);
        $orderField     = I('orderField', 'user_id');
        $orderDirection = I('orderDirection', 'desc');
        $numPerPage     = I('numPerPage', $limit);
        
        $offset = ($pageNum -1) * $numPerPage;
        /*if (I('request.realname')) {
            $where['realname'] = I('request.realname');
        }
        if (I('request.email')) {
            $where['email'] = I('request.email');
        }
        if (I('request.idcard')) {
            $where['idcard'] = I('request.idcard');
        }
        if (I('request.status')) {
            $where['is_del'] = I('request.status');
        }
        if (I('request.fstatus')) {
            $where['formal'] = I('request.fstatus');
        }
        if (I('request.province')) {
            $where['province'] = I('request.province');;
        }*/
        $where['last_logout_time'] = array('gt',time()-600);
        $totalCount  = M('User_session')->where($where)->count('user_id');
        $lists = M('User_session')->where($where)->order($orderField.' '.$orderDirection)->limit($offset.','.$numPerPage)->select();
        foreach ($lists as $key => $value) {
            $user_info = M('User')->where(array('id'=>$value['user_id']))->find();
            $lists[$key]['realname'] = $user_info['realname'];
        }
        $page = array('pageNum'=>$pageNum, 'orderField'=>$orderField, 'orderDirection'=>$orderDirection, 'numPerPage'=>$numPerPage, 'totalCount'=>$totalCount);
        $this->assign('page', $page);
        $this->assign('lists',$lists);
        $this->display();
    }
}