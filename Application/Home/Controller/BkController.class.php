<?php
namespace Home\Controller;
use Think\Controller;
class BkController extends Controller {
	public function xinfang(){
		$house_info = array(
			'title'=>'大运河孔雀城',
			'seTitle'=>'大运河孔雀城温莎郡',
			'images'=>array(
				array(
					'id'=>1,
					'image_path'=>'https://image1.ljcdn.com/hdic-resblock/df800b5f-4430-4767-a5d4-4b07e547b988.jpg.1000x.jpg'
				),
				array(
					'id'=>2,
					'image_path'=>'https://image1.ljcdn.com/hdic-resblock/c5715294-179e-40aa-938b-5f91ce5c1f48.jpg.1000x.jpg'
				),
				array(
					'id'=>3,
					'image_path'=>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg'
				),
			),
			'price'=>'630',
			'type'=>'2室1厅',
			'area'=>'90.34',
			'open_time'=>'预计五月开盘',
			'address'=>'顺义新城第二十一街区',
			'status'=>1,
		);
		$typs_conditions = array(
			array(
				'id'=>1,
				'name'=>'四室',
			),
			array(
				'id'=>2,
				'name'=>'三室',
			),
			array(
				'id'=>3,
				'name'=>'二室',
			),
		);
		$comments = array(
			'tab_score'=>array(
				array('name'=>'周围配套','scor3.6e'=>3.6),
				array('name'=>'交通方便','score'=>3.7),
				array('name'=>'交通方便','score'=>4.2),
			),
			'comment'=>array(
				array(
					'user_id'=>11,
					'user_name'=>'王晓易',
					'user_image'=>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
					'user_score'=>array(
						array('name'=>'配套','score'=>3),
						array('name'=>'交通','score'=>3),
						array('name'=>'交通','score'=>3),
					),
					'user_comment'=>'离市区比较远，周边设施还在建设中，配套环境什么的也算还好，户型特别方正。平常逛街方便.......',
					'create_time'=>'2017年07月26日',
				),
				array(
					'user_id'=>22,
					'user_name'=>'马大哈',
					'user_image'=>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
					'user_score'=>array(
						array('name'=>'配套','score'=>3.9),
						array('name'=>'交通','score'=>3.9),
						array('name'=>'交通','score'=>3.9),
					),
					'user_comment'=>'离市区比较远，周边设施还在建设中，配套环境什么的也算还好，户型特别方正。平常逛街方便.......',
					'create_time'=>'2018年08月28日',
				),
			),
		);
		$questions=array(
			array(
				'id'=>200,
				'question'=>'房子好看不？',
				'attention_num'=>1982,
				'answer_num'=>98,
			),
			array(
				'id'=>201,
				'question'=>'小区绿化多吗？',
				'attention_num'=>1982,
				'answer_num'=>98,
			),
			array(
				'id'=>202,
				'question'=>'窗户大不大？',
				'attention_num'=>1982,
				'answer_num'=>98,
			),
		); 
		$hotlists=array(
			array(
				'id'=>1,
				'title'=>'西山甲一号山甲',
				'image'=>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'address'=>'朝阳 孙河板块',
				'uprice'=>87152,
			),
			array(
				'id'=>2,
				'title'=>'霞公府',
				'image'=>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'address'=>'东城北京饭店',
				'uprice'=>62317,
			),
		);
		$result = array(
			'house_info' => $house_info,
			'typs_conditions'=>$typs_conditions,
			'comments'	 => $comments,
			'questions'  => $questions,
			'hotlists'   => $hotlists,
		);
		_res($result);
	}
	public function getListsByType(){
		$type_id = $_GET['type_id']?$_GET['type_id']:1;
		$typs_conditions = array(
			array(
				'id'=>1,
				'name'=>'四室',
			),
			array(
				'id'=>2,
				'name'=>'三室',
			),
			array(
				'id'=>3,
				'name'=>'二室',
			),
		);
				$houses = array(
			array(
				'id'	 =>1,
				'title'  =>'三室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>2,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
			array(
				'id'	 =>2,
				'title'  =>'四室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>1,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
			array(
				'id'	 =>3,
				'title'  =>'两室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>3,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
			array(
				'id'	 =>4,
				'title'  =>'四室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>1,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
			array(
				'id'	 =>5,
				'title'  =>'三室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>2,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
			array(
				'id'	 =>6,
				'title'  =>'两室',
				'image'  =>'https://image1.ljcdn.com/hdic-resblock/ba1250ad-8d72-4633-8e1b-7e08e13dccc1.jpg.1000x.jpg',
				'status' =>1,
				'price'  =>1876,
				'type_id'=>3,
				'tabs'   =>array('多卫','干净','房型方正'),
			),
		);
		foreach ($typs_conditions as $key => $value) {
			$type_ids[] = $value['id'];
		}
		if(!in_array($type_id,$type_ids)){
			_res('没有该类型',false,'1002');
		}
		foreach ($houses as $key => $value) {
			if($value['type_id']==$type_id){
				$house_lists[] = $value; 
			}
		}
		$result = array(
			'house_lists'=>$house_lists,
		);
		_res($result);
	}
}