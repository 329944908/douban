<?php
namespace Admin\Model;
use Admin\Model\BaseModel;
class ClassifyModel extends BaseModel {
	public function getAll(){
		$data = $this->where("parent_id=0")->select();
		foreach ($data as $key => $value) {
			$data[$key]['child'] = $this->where("parent_id={$value['id']}")->select();
			foreach ($data[$key]['child']  as $k => $v) {
				$data[$key]['child'][$k]['c'] = $this->where("parent_id={$v['id']}")->select();
			}
		}
		return $data;
	} 
}