<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController
{
	public $model = 'category';
	public function _initialize(){
        $category =D($this->model)->where('parent_id=0')->select();
        $this->assign('catelists', $category);
	}
}