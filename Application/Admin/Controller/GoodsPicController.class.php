<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsPicController extends CommonController
{
	public $model = 'GoodsPic'; 
    public function add(){
        $id = isset($_GET['id'])?$_GET['id']:0;
        $this->assign('goods_id',$id);
        $this->display();
    }
    public function doAdd(){
    	$image = uploadFile('image','goods');
    	$goods_id = I('post.goods_id');
    	$data = array(
				'image' 	=> $image,
				'goods_id' 	=> $goods_id,			
				);
        $res = D($this->model)->add($data);
        if($res){
        	$this->success('su','/Admin/Goods/lists');
        }
    }
}