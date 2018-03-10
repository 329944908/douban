<?php
namespace Api\Model;
use Api\Model\BaseModel;
class AdModel extends BaseModel {
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['img'] = $info['image'];
		$data['url'] = $info['url'];
		$data['position'] = $info['position'];
		$data['status'] = $info['status'];
		return $data;
	}
}