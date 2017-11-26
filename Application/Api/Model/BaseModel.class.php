<?php
namespace Api\Model;
use Think\Model\RelationModel;
class BaseModel extends RelationModel {
	/**
	 *  get_called_class() 获取调用类的名称 ，可用于后期缓存优化
	 * @Author   Maying
	 * @DateTime 2017-04-05
	 * @E-mail   1977905246@qq.com
	 * @param    主键id
	 * @return   详情info
	 */
	public function getBasicInfo($id) {
		return $this->where(array('id'=>$id))->relation(true)->find();
	}

	/**
	 * @Author   Maying
	 * @DateTime 2017-04-05
	 * @E-mail   1977905246@qq.com
	 * @param    条件
	 * @param    偏移量
	 * @param    限制数量
	 * @return   结果array
	 * 
	 */
	public function getList($where= array(), $offset=0, $limit=20) {
		return $this->where($where)->limit($offset, $limit)->relation(true)->select();
	}

	/**
	 * @Author   Maying
	 * @DateTime 2017-04-05
	 * @E-mail   1977905246@qq.com
	 * @param    条件
	 * @return   数量
	 */
	public function getTotal($where= array()) {
		return $this->where($where)->count();
	}

	/**
	 * 控制器调用获取 页码展示html
	 * @Author   Maying
	 * @DateTime 2017-04-05
	 * @E-mail   1977905246@qq.com
	 * @param    条件
	 * @param    当前页码
	 * @param    每页数量
	 * @return   pageHtml
	 */
	public function getPage($where= array(), $p=1, $limit=20) {
		$total 		= $this->getTotal($where);
		$page_num 	= ceil($total/$limit);

		$_GET['p']	= '%s';
		$uri = urldecode(U(ACTION_NAME, $_GET));
	
		$page_class 			= 'footable-page';
		$page_arrow_class = $start_class = $end_class = 'footable-page-arrow';
		$page_active_class 		= 'active';
		$page_disabled_class 	= 'disabled';
		$page_target			= 'iframe0';

		$page = '<ul class="pagination pull-right">';
		if ($p != 1) {
			$page .= '
<li class="'.$start_class.'"><a href="'.sprintf($uri,1).'" target="'.$page_target.'">«</a></li>
<li class="'.$start_class.'"><a href="'.sprintf($uri,$p-1).'" target="'.$page_target.'">‹</a></li>
			';
		}

		for($i=1; $i<=$page_num;$i++) {
			if ($i == $p) {
				$current_page_class = $page_class.' '.$page_active_class;
			} else {
				$current_page_class = $page_class;
			}
			$page .= '
<li class="'.$current_page_class.'"><a href="'.sprintf($uri,$i).'" target="'.$page_target.'">'.$i.'</a></li>
			';
		}
		if ($p!=$page_num) {
			$page .= '
<li class="'.$end_class.'"><a href="'.sprintf($uri,$p+1).'" target="'.$page_target.'">›</a></li>
<li class="'.$end_class.'"><a href="'.sprintf($uri,$page_num).'" target="'.$page_target.'">»</a></li>	
			';
		}
		$page .= '</ul>';

		return $page;
	}

	/**
	 * 数据表字段信息
	 * @Author   Maying
	 * @DateTime 2017-04-09
	 * @E-mail   1977905246@qq.com
	 * @return   array    表字段信息
	 */
	public function getFields() {
		$field = $this->fields;
		$res['type'] = $field['_type'];
		$res['pk'] 	 = $field['_pk'];
		unset($field['_type']);
		unset($field['_pk']);
		$res['fields'] = $field;
		return $res;
	}
}