<?php
namespace Api\Model;
use Api\Model\BaseModel;
class GoodsPicModel extends BaseModel {
	protected $tableName = 'goods_image'; 
	public function getPic($id){
		$data = $this->where(array('goods_id'=>$id))->select();
		return $data;
	}
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['img'] = C('ImageUrl').$info['image'];
		return $data;
	}
}