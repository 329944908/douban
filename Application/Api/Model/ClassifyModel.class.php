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
	public function getChild($pid){
		$child = $this->where("parent_id={$pid}")->select();
		return $child;
	}
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