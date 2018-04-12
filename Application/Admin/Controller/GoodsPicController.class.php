<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsPicController extends CommonController
{
	public $model = 'GoodsPic'; 
    public function add(){
        $id = isset($_GET['id'])?$_GET['id']:0;
        $this->assign('goods_id',$id);
        $this->display();
    }
    public function doAdd(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg', 'xls');// 设置附件上传类型
        $upload->rootPath  =     './Public/'; // 设置附件上传根目录
        $upload->savePath  =     'goods/'; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        var_dump($info);
        if(!$info) {// 上传错误提示错误信息  

              $this->error($upload->getError());  

        }else{// 上传成功 
            $data['filepath']= $info['file_data']['savepath'].$info['file_data']['savename'];
            $goods_id = I('post.goods_id');
            $data = array(
                'image'     => $data['filepath'],
                'goods_id'  => $goods_id,           
                );
            $result = D($this->model)->add($data);
            $file=['id'=>$result,'imagepath'=>$data['filepath']];
            echo json_encode($file);

        }
    }
}