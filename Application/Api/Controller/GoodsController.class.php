<?php
namespace Api\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function lists(){
    	$classify_parent_id = I('get.classify_parent_id',0);
        if(!$classify_parent_id){
            _res('参数不合法',false,'1001');
        }
    	$classify_id = I('get.classify_id',0);
    	$order = I('get.order',1);
    	$order_type = I('get.order_type',1);
        $goodsModel = D('Goods'); 
        $goodsPicModel = D('GoodsPic');
        $classifyModel = D('Classify');
        $all_classify_id = array();
        if($classify_id == 0){
            $classify = $classifyModel->getList(array('parent_id'=>$classify_parent_id));
            foreach ($classify as $key => $value) {
                $all_classify_id[] = $value['id'];
            }
            $where = array('classify_id'=>array('in',$all_classify_id));
        }else{
            $where = array('classify_id'=>$classify_id);
        }
        if($order==2){
            $order_name = 'price';
        }elseif($order== 1){
            $order_name  = 'id';
        }
        if($order_type==2){
            $order_type_name ='desc';
        }elseif($order_type == 1){
            $order_type_name ='asc';
        }
        $data = $goodsModel->getList($where,$order_name,$order_type_name);
        foreach ($data as $key => $value) {
            $data[$key] =  $goodsModel->format($value);
            $goods_image = $goodsPicModel->getPic($value['id']);
            $data[$key]['img'] = C('ImageUrl').$goods_image[0]['image'];
        }
        $result = array(
            "goods"=>$data,
            );
        _res($result);
    }
    public function info(){
    	$goods_id = I('get.id',0);
        if(!preg_match("/^\d+$/", $goods_id)|| !$goods_id){
            _res('参数不合法',false,'1001');
        }
        $goodsModel = D('Goods'); 
        $goodsPicModel = D('GoodsPic');
        $data = $goodsModel->getBasicInfo($goods_id);
        $data = $goodsModel->format($data);
        $goods_image = $goodsPicModel->getPic($goods_id);
        foreach ($goods_image as $key => $value) {
             $data['imgs'][$key] = $goodsPicModel->format($value);
        }
        $data['desc'] = '哈哈哈哈哈哈';
        $result = array(
            "goods"=>$data,
            );
        _res($result);
    }
}
