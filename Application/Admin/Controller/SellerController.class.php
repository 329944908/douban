<?php
namespace Admin\Controller;
use Think\Controller;
class SellerController extends CommonController
{
	public $model = 'seller';
	public function _initialize(){
        $seller =D($this->model)->select();
        $addresslists =D($this->model)->Distinct(true)->field('address')->select();
        $this->assign('sellerlists', $seller);
        $this->assign('addresslists', $addresslists);
	}
	public function search() {
	  	$name = trim(I('get.name',''));
	  	$address = I('get.address','');
	  	$where = "name like '%{$name}%' and address ='{$address}'";
		$seller = D($this->model)->getList($where);
		$addresslists =D($this->model)->Distinct(true)->field('address')->select();
        if ($seller) {
            $this->assign('lists', $seller);
            $this->assign('addresslists', $addresslists);
            $this->display('/Seller/lists');
        } else {
           $this->error('搜索不到符合条件的店铺');
        }
    }
}