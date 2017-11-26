<?php
namespace Api\Model;
use Api\Model\BaseModel;
class ClassifyModel extends BaseModel {
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['name'] = $info['name'];
		return $data;
	}
}