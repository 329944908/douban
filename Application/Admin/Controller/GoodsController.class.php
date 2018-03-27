<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController
{
	public $model = 'goods'; // 本控制器使用的model
	public function _initialize(){
		$classify =D('classify')->getAll();
		$class =D('classify')->select();
		$sellerlists = D('seller')->select();
		$seller = D('seller')->select();
		foreach ($seller as $s) {
			$seller[$s['id']] = $s['name'];
		}
		foreach ($class as $c) {
			$class[$c['id']] = $c['name'];
		}
		$this->assign('class', $class);
		$this->assign('seller',$seller);
        $this->assign('classifylists', $classify);
        $this->assign('sellerlists', $sellerlists);
	}
	public function getMap(){    //获得where条件
		$name = trim(I('get.name',''));
        $classify_id = I('get.classify_id','');
		if($name){
            $where['name'] = array('like',"%{$name}%");
        }
        if($classify_id&&$classify_id!='all'){
            $where['classify_id'] = $classify_id;
        }
        return $where;
	}
	public function details(){
		$id = isset($_GET['id'])?$_GET['id']:0;
        $this->assign('goods_id',$id);
        $this->display();
	}
	public function addAetails(){
		$goods_id = I('post.goods_id');
		$details = I('post.editorValue');
        $res = D($this->model)->where(array('id'=>$goods_id))->setField('details',$details);
        if($res){
        	$this->success('su','/Admin/Goods/lists');
        }else{
        	echo "string";
        }
	}
}