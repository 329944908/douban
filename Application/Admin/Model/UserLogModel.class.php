<?php
namespace Admin\Model;
use Think\Model;
class UserLogModel extends Model {
	public function addLog($data){
		$this->add($data);
	}
	public function transformData($data){
		return $data;
	}
}