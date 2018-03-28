<?php
namespace Home\Controller;
use Think\Controller;
class ClassifyController extends Controller {
    public function lists(){
    	$pid = I('get.pid',0);
    	if(!preg_match("/^\d+$/", $pid)){
    		_res('参数不合法',false,'1001');
    	}
    	$classifyModel = D('Classify');
        $where = array('parent_id'=>$pid);
    	$data = $classifyModel->getList($where);
    	foreach ($data as $key => $value) {
    		$data[$key] = $classifyModel->format($value);
    	}
    	$result = array(
    		"classify"=>$data,
    		);
    	_res($result);
    }
}