<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$goodsModel = D('Goods');
    	$goodsPicModel = D('GoodsPic');
    	$adModel = D('Ad');
    	$ad_data = $adModel->getList();
    	foreach ($ad_data as $key => $value) {
    		$ad_data[$key] = $adModel->format($value);
    	}
    	$goods_data = $goodsModel->getList();
    	foreach ($goods_data as $key => $value) {
    		$goods_data[$key] = $goodsModel->format($value);
    		$goods_image = $goodsPicModel->getPic($value['id']);
    		$goods_data[$key]['img'] = C('ImageUrl').$goods_image[0]['image'];
    	}
    	$result = array(
    		"banner" => $ad_data,
    		"goods"  => $goods_data,
    		);
    	_res($result);
    }
}