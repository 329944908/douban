<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Common\logic\SearchWordLogic;
include_once "Application\Common\logic\SearchWordLogic.php";
class GoodsController extends Controller {
    public function lists(){
        $id = $_GET['id']; 
        $classifyModel = D('classify');
        $goodsModel = D('goods'); 
        $goodsPicModel = D('GoodsPic');
        $child = $classifyModel->getChild($id);
        if($child){
            $parent_classify = $classifyModel->getBasicInfo($id);
            if($parent_classify['parent_id']==0){
                $temp_child =array();
                $classify = array();
                foreach ($child as $key => $value) {
                    $temp_child[] =  $classifyModel->getChild($value['id']);
                }
                foreach ($temp_child as $key => $value) {
                    foreach ($value as $key => $value) {
                        $classify[] = $value['id'];
                    }
                }
                $this->assign('child',$child);
            }else{
                foreach ($child as $key => $value) {
                    $classify[] = $value['id'];
                } 
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
        if($parent_classify['parent_id'] != 0){
            $parent_parent_classify = $classifyModel->getBasicInfo($parent_classify['parent_id']);
            $parent_classify_brother = $classifyModel->getChild($parent_parent_classify['id']);
            $this->assign('parent_parent_classify',$parent_parent_classify);
            $this->assign('parent_classify_brother',$parent_classify_brother);
        }
        $this->assign('classify_data',$classify_data);
        $this->assign('parent_classify',$parent_classify);
        $this->assign('goods',$goods);
        $this->display();
    }
    public function goodsInfo(){
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
        $data['details'] = html_entity_decode($data['details']);
        $classifyModel = D('classify');
        $classify_data = $classifyModel->getAll();  
        $classifyArr = $classifyModel->getParent_classify($data['classify_id']);
        $this->assign('classify_data',$classify_data);
        $this->assign('classifyArr',$classifyArr);
        $this->assign('goods',$data);
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
    public function search()
    {
        //C('URL_MODEL',0);
        $filter_param = array(); // 帅选数组                        
        $id = I('get.id/d', 0); // 当前分类id
        //$brand_id = I('brand_id', 0);
        $sort = I('sort', 'id'); // 排序
        $sort_asc = I('sort_asc', 'asc'); // 排序
        //$price = I('price', ''); // 价钱
        //$start_price = trim(I('start_price', '0')); // 输入框价钱
        //$end_price = trim(I('end_price', '0')); // 输入框价钱
        //if ($start_price && $end_price) $price = $start_price . '-' . $end_price; // 如果输入框有价钱 则使用输入框的价钱
        $q = urldecode(trim(I('q', ''))); // 关键字搜索
        empty($q) && $this->error('请输入搜索词');
        $id && ($filter_param['id'] = $id); //加入帅选条件中                       
        //$brand_id && ($filter_param['brand_id'] = $brand_id); //加入帅选条件中
        //$price && ($filter_param['price'] = $price); //加入帅选条件中
        $q && ($_GET['q'] = $filter_param['q'] = $q); //加入帅选条件中
        //$goodsLogic = new GoodsLogic(); // 前台商品操作逻辑类
        $SearchWordLogic = new SearchWordLogic();
        $where = $SearchWordLogic->getSearchWordWhere($q);
        //$where['is_on_sale'] = 1;
        //$where['exchange_integral'] = 0;//不检索积分商品
        $searchWordModel = D('SearchWord');
        $goodsModel = D('Goods');
        $goodsPicModel = D('GoodsPic');
        $classifyModel = D('classify');
        $classify_data = $classifyModel->getAll(); 
        $searchWordModel->where(array('keywords'=>$q))->setInc('search_num');
        $goodsHaveSearchWord =$goodsModel->where($where)->count();
        if ($goodsHaveSearchWord) {
            $SearchWordIsHave = $searchWordModel ->where(array('keywords'=>$q))->find();
            if($SearchWordIsHave){
                $searchWordModel->where(array('id',$SearchWordIsHave['id']))->setField(array('goods_num'=>$goodsHaveSearchWord));
            }else{
                $SearchWordData = [
                    'keywords' => $q,
                    'pinyin_full' => $SearchWordLogic->getPinyinFull($q),
                    'pinyin_simple' => $SearchWordLogic->getPinyinSimple($q),
                    'search_num' => 1,
                    'goods_num' => $goodsHaveSearchWord
                ];
                $searchWordModel->add($SearchWordData);
            }
        }
        if ($id) {
            $classify_id_arr = getCatGrandson($id);
            $where['classify_id'] = array('in', implode(',', $classify_id_arr));
        }
        $search_goods = $goodsModel->where($where)->getField('id,classify_id');
        $filter_goods_id = array_keys($search_goods);
        $filter_classify_id = array_unique($search_goods); // 分类需要去重
        if ($filter_classify_id) {
            $cateArr = $classifyModel->where("id", "in", implode(',', $filter_cat_id))->select();
            $tmp = $filter_param;
            foreach ($cateArr as $k => $v) {
                $tmp['id'] = $v['id'];
                $cateArr[$k]['href'] = U("/Home/goods/search", $tmp);
            }
        }
        //过滤帅选的结果集里面找商品        
        // if ($brand_id || $price) {
        //     // 品牌或者价格
        //     $goods_id_1 = $goodsModel->getGoodsIdByBrandPrice($brand_id, $price); // 根据 品牌 或者 价格范围 查找所有商品id
        //     $filter_goods_id = array_intersect($filter_goods_id, $goods_id_1); // 获取多个帅选条件的结果 的交集
        // }
        //$filter_menu = $goodsLogic->get_filter_menu($filter_param, 'search'); // 获取显示的帅选菜单
        //$filter_price = $goodsLogic->get_filter_price($filter_goods_id, $filter_param, 'search'); // 帅选的价格期间
        //$filter_brand = $goodsLogic->get_filter_brand($filter_goods_id, $filter_param, 'search'); // 获取指定分类下的帅选品牌

        $count = count($filter_goods_id);
        $page = new Page($count, 20);
        if ($count > 0) {
            $goods_list = $goodsModel->where(['status' => 1, 'id' => ['in', implode(',', $filter_goods_id)]])->order("$sort $sort_asc")->limit($page->firstRow . ',' . $page->listRows)->select();
            foreach ($goods_list as $key => $value) {
            $goods_image = $goodsPicModel->getPic($value['id']);
            if($goods_image){
                foreach ($goods_image as $k => $v) {
                    $goods_list[$key]['imgs'][$k]['img'] = C('ImageUrl').$goods_image[$k]['image'];
                }
            }else{
                $goods_list[$key]['imgs'] = 'no image';
            }
        }
            // $filter_goods_id2 = get_arr_column($goods_list, 'id');
            // if ($filter_goods_id2)
            //      $goods_images = $goodsPicModel->where("goods_id", "in", implode(',', $filter_goods_id2))->select();
        }
        //var_dump($goods_images);
        // var_dump($goods_list);die();
        if($sort_asc=='asc'){
            $sort_asc='desc';
        }else{
            $sort_asc='asc';
        }
        $this->assign('sort_asc', $sort_asc);
        $this->assign('count', $count);
        $this->assign('goods_list', $goods_list);
        $this->assign('classify_data',$classify_data);
        //var_dump($goods_list)
        // $this->assign('goods_images', $goods_images);  // 相册图片
        //$this->assign('filter_menu', $filter_menu);  // 帅选菜单
        //$this->assign('filter_brand', $filter_brand);  // 列表页帅选属性 - 商品品牌
        //$this->assign('filter_price', $filter_price);// 帅选的价格期间
        //$this->assign('cateArr', $cateArr);
        //$this->assign('filter_param', $filter_param); // 帅选条件
        //$this->assign('cat_id', $id);
        //$this->assign('page', $page);// 赋值分页输出
        $this->assign('q', I('q'));
        //C('TOKEN_ON', false);
        $this->display();
    }
}
