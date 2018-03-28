<?php
namespace Home\Model;
use Api\Model\BaseModel;
	class CartModel extends BaseModel {
		protected $_link = array(
        'Goods' => array(
		    'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'Goods',
		    'foreign_key'   => 'goods_id',
		    'mapping_name'  => 'goods',
		),);
		public function add($data){
			$status = $this->where("goods_id = {$data['goods_id']} and user_id = {$data['user_id']}")->find();
			if($status){
				$data['goods_number'] = $data['goods_number']+$status['goods_number'];
				$res = $this->where("goods_id = {$data['goods_id']} and user_id = {$data['user_id']}")->setField('goods_number',"{$data['goods_number']}");
			}else{
				$res = parent::add($data);
			}
			return $res;
		}
	}