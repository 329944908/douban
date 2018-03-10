<?php
namespace Admin\Controller;
use Think\Controller;
class SpecController extends CommonController
{
	public $model = 'Spec';
	public function lists() {
        $p      = isset($_GET['p']) ? $_GET['p'] : 1;
        $limit  = 20;
        $offset = ($p-1) * $limit;
        $where= $this->getMap();
        $lists = D($this->model)->getList($where, $offset, $limit);
        $page = D($this->model)->getPage($where,$p,$limit);
        $this->assign('page', $page);
        foreach ($lists as $key => $value) {
        	$items = D('SpecItem')->where("spec_id = {$value['id']}")->select();
        	$lists[$key]['item'] =  '';
        	foreach ($items as $v) {
			$lists[$key]['item'] = $v['item'].','.$lists[$key]['item'];
			}
        }
        $this->assign('lists', $lists);
        $this->display();
    }
	public function _initialize(){
		$goodsType = D('GoodsType')->select();
		$goodsType1 = $goodsType;
		foreach ($goodsType1 as $gt) {
			$goodsType1[$gt['id']] = $gt['name'];
		}
		$this->assign('items',$items);
        $this->assign('goodsType',$goodsType);
        $this->assign('goodsType1',$goodsType1);
	} 
	public function addItem(){
		$spec_id = $_GET['id'];
		$this->assign('spec_id',$spec_id);
		$this->display();
	}
	public function doAddItem(){
		$items = $_POST['item'];
		$spec_id = $_POST['spec_id'];
		$data = array();
 		$item = explode("\r\n", $items);
 		$specItemModel = D('SpecItem');
 		foreach ($item  as $key => $value){
 			$data['item'] = $value;
 			$data['spec_id'] = $spec_id;
 			$specItemModel->add($data);
 		}
 		$this->success('发布成功', 'lists');
	}
      
}
