<?php
namespace Api\Model;
use Api\Model\BaseModel;
class GoodsModel extends BaseModel {
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['name'] = $info['name'];
		$data['price'] = $info['price'];
		$data['classify_id'] = $info['classify_id'];
		$data['is_hot'] = $info['is_hot'];
		$data['status'] = $info['status'];
		$data['market_price'] = $info['market_price'];
		return $data;
	}
	public function getGoodsByClassify($classify){
		if(is_array($classify)){
			$map['classify_id'] = array('in',$classify);
		}elseif(is_int($classify)){
			$map['classify_id'] = $classify;
		}else{
			echo "error";
			die();
		}
		$data = $this->where($map)->select();
		return $data;
	}
}