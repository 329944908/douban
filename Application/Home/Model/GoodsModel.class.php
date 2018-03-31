<?php
namespace Home\Model;
use Api\Model\BaseModel;
class GoodsModel extends BaseModel {
	public function format($info){
		$data = array();
		$data['id'] = $info['id'];
		$data['name'] = $info['name'];
		$data['price'] = $info['price'];
		$data['classify_id'] = $info['classify_id'];
		$data['is_hot'] = $info['is_hot'];
		$data['status'] = $info['status'];
		$data['market_price'] = $info['market_price'];
		$data['details'] = htmlentities($info['details']);
		return $data;
	}
	public function getGoodsByClassify($classify){
		if(is_array($classify)){
			$map['classify_id'] = array('in',$classify);
		}elseif(is_int($classify)){
			$map['classify_id'] = $classify;
		}else{
			echo "error";
			die();
		}
		$data = $this->where($map)->select();
		return $data;
	}
	/**
     * @param  $brand_id|帅选品牌id
     * @param  $price|帅选价格
     * @return array|mixed
     */
    function getGoodsIdByBrandPrice($brand_id, $price)
    {
        if (empty($brand_id) && empty($price))
            return array();
        $brand_select_goods=$price_select_goods=array();
        if ($brand_id) // 品牌查询
        {
            $brand_id_arr = explode('_', $brand_id);
            $brand_select_goods = $this->whereIn('brand_id',$brand_id_arr,'or')->getField('goods_id', true);
        }
        if ($price)// 价格查询
        {
            $price = explode('-', $price);
            $price[0] = intval($price[0]);
            $price[1] = intval($price[1]);
            $price_where=" price >= $price[0] and price <= $price[1] ";
            $price_select_goods = $this->where($price_where)->getField('goods_id', true);
        }
        if($brand_select_goods && $price_select_goods)
            $arr = array_intersect($brand_select_goods,$price_select_goods);
        else
            $arr = array_merge($brand_select_goods,$price_select_goods);
        return $arr ? $arr : array();
    }

}