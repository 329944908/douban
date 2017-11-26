<?php
namespace Api\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function lists(){
    	$classify_parent_id = I('get.classify_parent_id',0);
    	$classify_id = I('get.classify_id',0);
    	$order = I('get.order',1);
    	$order_type = I('get.order_type',1);
        $goodsModel = D('Goods'); 
        $goodsPicModel = D('GoodsPic');
        $classifyModel = D('Classify');
        if($classify_id == 0){
            $classify = $classifyModel->getList();
        }
        $where = array('classify_id'=>$classify_id);
        $data = $goodsModel->getList($where);
        foreach ($data as $key => $value) {
            $data[$key] =  $goodsModel->format($value);
            $goods_image = $goodsPicModel->getPic($value['id']);
            $goods_data[$key]['img'] = C('ImageUrl').$goods_image[0]['image'];
        }
        $result = array(
            "goods"=>$data,
            );
        _res($result);
    }
    public function info(){
    	
    }
}
