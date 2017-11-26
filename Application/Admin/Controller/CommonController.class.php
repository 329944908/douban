<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-type: text/html; charset=utf-8");
    }
    public function checkLogin(){
    	if (!$_SESSION['admin']['me']['id']) {
    		die('用户登录信息失效，请刷新后再试');
    	}
    }
    public function getMap(){
        return array();
    }
    /**

     * @Author   Maying
     * @DateTime 2017-04-05
     */
    /**
     * 公共列表方法 一次定义多处使用
     * 任何控制器只要继承commonController即可使用
     * 建议使用情况：仅一次查询不需要数据转换时使用
     * @Author   Maying
     * @DateTime 2017-04-05
     * @E-mail   1977905246@qq.com
     */
    public function lists() {
        $p      = isset($_GET['p']) ? $_GET['p'] : 1;
        $limit  = 20;
        $offset = ($p-1) * $limit;
        $where= $this->getMap();
        $lists = D($this->model)->getList($where, $offset, $limit);
        $page = D($this->model)->getPage($where,$p,$limit);
        $this->assign('page', $page);
        $this->assign('lists', $lists);
        $this->display();
    }

    /**
     * 新增 修改 保存
     * todo 未测试 
     * @Author   Maying
     * @DateTime 2017-04-05
     * @E-mail   1977905246@qq.com
     * @return   [type]
     */
    public function edit() {
        if ($id = I('id',0)) {
            D($this->model)->getBasicInfo($id);
        }
        $this->display();
    }
    public function addPic(){
          if ($id = I('id',0)) {
             D($this->model)->add($_POST);
        }
        $this->display();
    }
    public function save() {
        if ($id = I('id',0)) {
            D($this->model)->where(array('id'=>$id))->save($_POST);
        } else {
            D($this->model)->add($_POST);
        }
        $this->success('发布成功', 'lists');
    }
    public function online(){
        if ($id = I('get.id',0)) {
            D($this->model)->where(array('id'=>$id))->setField('status','1');
        }
        $this->success('上线成功');
    }
    public function outline(){
        if ($id = I('get.id',0)) {
            D($this->model)->where(array('id'=>$id))->setField('status','0');
        }
        $this->success('下线成功');
    }
}