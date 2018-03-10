<?php
namespace Api\Controller;
use Think\Controller;
class CartController extends Controller {
	public function lists(){
		$user_id = 1;
		$data = D('Cart')->where("user_id = {$user_id}")->relation(true)->select();
		foreach ($data as $key => $value) {
			$goods_image = D('GoodsPic')->getPic($value['goods_id']);
			$data[$key]['img'] = $goods_image[0]['image'];
		}
		$this->assign('data',$data);
		$this->display();
	}
	public function changNumber(){
		$data = array();
		$data['user_id'] = 1;
		$data['goods_id'] = intval(I('post.goods_id',0));
		$data['goods_number'] = intval(I('post.goods_number',0));
		$cart = D('Cart');
		$res = $cart->where("goods_id = {$data['goods_id']} and user_id = {$data['user_id']}")->setField('goods_number',"{$data['goods_number']}");
		 if($res){
            _res('修改成功',ture);
        }else{
            _res('修改失败',false,'1004');
        } 
	}
}