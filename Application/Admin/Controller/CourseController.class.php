<?php
namespace Admin\Controller;

use Think\Controller;

class CourseController extends CommonController
{
	public $model = 'course'; // 本控制器使用的model
	public function _initialize(){
		$category =D('category')->where('parent_id=0')->select();//链接了category表
		foreach ($category as $key=>$value) {
			$child = D('category')->where('parent_id='.$value['id'])->select();
			$category[$key]['child'] = $child;
		}
		$cate =D('category')->where('status=1')->select();
		foreach ($cate as $c) {
			$cates[$c['id']] = $c['name'];
		}
		$this->assign('cates', $cates);

        $this->assign('courselists', $category);
	}
}