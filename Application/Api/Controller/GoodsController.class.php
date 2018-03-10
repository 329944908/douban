<?php
namespace Api\Controller;
use Think\Controller;
class GoodsController extends Controller {
    // public function lists(){
    // 	$classify_parent_id = I('get.classify_parent_id',0);
    //     if(!$classify_parent_id){
    //         _res('参数不合法',false,'1003');
    //     }
    //     $classify_id = I('get.classify_id',0);
    // 	$order = I('get.order',1);
    // 	$order_type = I('get.order_type',1);
    //     $goodsModel = D('Goods'); 
    //     $goodsPicModel = D('GoodsPic');
    //     $classifyModel = D('Classify');
    //     $child = $classifyModel->getChild($classify_parent_id);
    //     if($classify_id!==0){
    //         $res = $classifyModel->getBasicInfo($classify_id);
    //         if(!$res || $res['status']==0){
    //             _res('分类不存在或已下线',false,'1002');
    //         }
    //     }
    //     $all_classify_id = array();
    //     if($classify_id == 0){
    //         $classify = $classifyModel->getList(array('parent_id'=>$classify_parent_id,'status'=>1));
    //         foreach ($classify as $key => $value) {
    //             $all_classify_id[] = $value['id'];
    //         }
    //         $where = array('classify_id'=>array('in',$all_classify_id),'status'=>1);
    //     }else{
    //         $where = array('classify_id'=>$classify_id,'status'=>1);
    //     }
    //     if($order==2){
    //         $order_name = 'price';
    //     }elseif($order== 1){
    //         $order_name  = 'id';
    //     }
    //     if($order_type==2){
    //         $order_type_name ='desc';
    //     }elseif($order_type == 1){
    //         $order_type_name ='asc';
    //     }
    //     $data = $goodsModel->getList($where,$order_name,$order_type_name);
    //     foreach ($data as $key => $value) {
    //         $data[$key] =  $goodsModel->format($value);
    //         $goods_image = $goodsPicModel->getPic($value['id']);
    //         if($goods_image){
    //             $data[$key]['img'] = C('ImageUrl').$goods_image[0]['image'];
    //         }else{
    //             $data[$key]['img'] = 'no image';
    //         }   
    //     }
    //     $result = array(
    //         "goods"=>$data,
    //         );
    //     _res($result);
    // }
    public function lists(){
        $id = $_GET['id']; 
        $classifyModel = D('classify');
        $goodsModel = D('goods'); 
        $goodsPicModel = D('GoodsPic');
        $child = $classifyModel->getChild($id);
        if($child){
            $parent_classify = $classifyModel->getBasicInfo($id); 
            $classify = array();
            foreach ($child as $key => $value) {
                $classify[] = $value['id'];
            }
        }else{
            $classify = $classifyModel->getBasicInfo($id); 
            $parent_classify = $classifyModel->getBasicInfo($classify['parent_id']);
            $classify_brother = $classifyModel->getChild($parent_classify['id']); 
            $this->assign('classify',$classify);
            $this->assign('classify_brother',$classify_brother);
        } 
        $goods = $goodsModel->getGoodsByClassify($classify);
        foreach ($goods as $key => $value) {
            $goods_image = $goodsPicModel->getPic($value['id']);
            if($goods_image){
                foreach ($goods_image as $k => $v) {
                    $goods[$key]['imgs'][$k]['img'] = C('ImageUrl').$goods_image[$k]['image'];
                }
            }else{
                $goods[$key]['imgs'] = 'no image';
            }
        }
        $classify_data = $classifyModel->getAll();  
        $this->assign('classify_data',$classify_data);
        $parent_parent_classify = $classifyModel->getBasicInfo($parent_classify['parent_id']); 
        $parent_classify_brother = $classifyModel->getChild($parent_parent_classify['id']); 
        $this->assign('parent_classify',$parent_classify);
        $this->assign('parent_parent_classify',$parent_parent_classify);
        $this->assign('parent_classify_brother',$parent_classify_brother);
        $this->assign('goods',$goods);
        $this->display();
    }
    public function info(){
    	$goods_id = I('get.id',0);
        if(!preg_match("/^\d+$/", $goods_id)|| !$goods_id){
            _res('参数不合法',false,'1001');
        }
        $goodsModel = D('Goods'); 
        $goodsPicModel = D('GoodsPic');
        $data = $goodsModel->getBasicInfo($goods_id);
        $data = $goodsModel->format($data);
        $goods_image = $goodsPicModel->getPic($goods_id);
        if($goods_image){
            foreach ($goods_image as $key => $value) {
                 $data['imgs'][$key] = $goodsPicModel->format($value);
            }
        }else{
                $data['imgs'][$key] = 'no image';
        }
        $data['desc'] = '哈哈哈哈哈哈';
        // $result = array(
        //     "goods"=>$data,
        //     );
        // _res($result);
        $this->assign('data',$data);
        $this->display();
    }
    public function addCart(){
        $data = array();
        $data['user_id'] = 2;
        $data['goods_id'] = intval(I('post.goods_id',0));
        $data['goods_number'] = intval(I('post.num',0));
        $goodsModel = D('Goods'); 
        $goods_info=$goodsModel->getBasicInfo($data['goods_id']);
        $data['price'] = floatval($goods_info['price']);
        $cart = D('Cart');
        $res = $cart->add($data);
        if($res){
            _res('添加成功',ture);
        }else{
            _res('添加失败',false,'1004');
        }   
    }
}
