<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends CommonController{
	public $model = 'Ad';
	// public function _initialize(){
 //        $adLists =D($this->model)->select();
 //        $this->assign('adLists', $adLists);
	// }
	public function save() {
        $info = D($this->model)->getBasicInfo($id);
        $image  = uploadFile('image','ads');
        $image2 =$_POST['imagePath'];
        if(empty($image)){
            $image=$image2;
        }
		$_POST['image'] = $image;
        unset($_POST['imagePath']);
        if ($id = I('id',0)) {
            D($this->model)->where(array('id'=>$id))->save($_POST);
        } else {
            D($this->model)->add($_POST);
        }
        $this->success('发布成功', 'lists');
    }
}