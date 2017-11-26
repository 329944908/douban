<?php
namespace Api\Model;
use Api\Model\BaseModel;
class GoodsModel extends BaseModel {
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['name'] = $info['name'];
		$data['price'] = $info['price'];
		$data['market_price'] = $info['market_price'];
		return $data;
	}
}