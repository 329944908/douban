<?php
namespace Admin\Controller;
use Think\Controller;
class ClassifyController extends CommonController
{
	public $model = 'classify';
	public function _initialize(){
        $classify =D($this->model)->where('parent_id=0')->select();
        $this->assign('classifylists', $classify);
	}
	public function getMap(){    //获得where条件
		$name = trim(I('get.name',''));
        $parent_id = I('get.parent_id','');
		if($name){
            $where['name'] = array('like',"%{$name}%");
        }
        if(!empty($parent_id)&&$parent_id!='all'){
        	if($parent_id=='parent'){
        		$parent_id = 0;
        	}
            $where['parent_id'] = $parent_id;
        }
        return $where;
	}
}