<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$goodsModel = D('Goods');
    	$goodsPicModel = D('GoodsPic');
    	$adModel = D('Ad');
        $classifyModel = D('Classify');
    	$ad_data = $adModel->getList();
        $classify_data = $classifyModel->getAll();
    	foreach ($ad_data as $key => $value) {
    		$ad_data[$key] = $adModel->format($value);
            $ad_data[$key]['img'] = C('ImageUrl').$value['image'];
    	}
    	$goods_data = $goodsModel->getList();
    	foreach ($goods_data as $key => $value) {
    		$goods_data[$key] = $goodsModel->format($value);
    		$goods_image = $goodsPicModel->getPic($value['id']);
            if($goods_image){
                $goods_data[$key]['img'] = C('ImageUrl').$goods_image[0]['image'];
            }else{
                $goods_data[$key]['img'] = 'no image';
            }
    	}
    	// $result = array(
    	// 	"banner" => $ad_data,
    	// 	"goods"  => $goods_data,
    	// 	);
    	// _res($result);
        // var_dump($ad_data);
        // var_dump($classify_data);
        // var_dump($goods_data);
        $this->assign('ad',$ad_data);
        $this->assign('classify',$classify_data);
        $this->assign('goods',$goods_data);
        $this->display();
    }
}