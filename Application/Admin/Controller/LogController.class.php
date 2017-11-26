<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends CommonController {
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
        $totalCount  = M('UserLog')->where($where)->count('id');
        $lists = M('UserLog')->where($where)->order($orderField.' '.$orderDirection)->limit($offset.','.$numPerPage)->select();
        foreach ($lists as $k => &$v) {
            $v['value'] = $v['value']/3600;
            $user_info = M('User')->where('id='.$v['user_id'])->find();
            $admin_info = M('Admin')->where('id='.$v['admin_id'])->find();
            $v['admin_name'] = $admin_info['nickname'];
            $v['admin_email'] = $admin_info['email'];
            $v['user_name'] = $user_info['realname'];
            $v['user_email'] = $user_info['email'];
        }
        $page = array('pageNum'=>$pageNum, 'orderField'=>$orderField, 'orderDirection'=>$orderDirection, 'numPerPage'=>$numPerPage, 'totalCount'=>$totalCount);
        $this->assign('page', $page);
        $this->assign('lists',$lists);
        $this->display();
    }
}