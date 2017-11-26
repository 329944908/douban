<?php
namespace Admin\Controller;
use Admin\Controller;
class QuestionController extends CommonController {
    public function _initialize(){
        $this->checkLogin();
    }
    public $question_type = array(
        1 => array('name'=>'单选'),
        2 => array('name'=>'多选'),
        3 => array('name'=>'判断'),
        );
    public $question_category = array(
        1 => array('name'=>'科目1'),
        2 => array('name'=>'科目2'),
        3 => array('name'=>'科目3'),
        4 => array('name'=>'科目4'),
        );
	public function lists(){
        $limit = 20;
        $pageNum        = I('pageNum', 1);
        $orderField     = I('orderField', 'id');
        $orderDirection = I('orderDirection', 'desc');
        $numPerPage     = I('numPerPage', $limit);
        
        $offset = ($pageNum -1) * $numPerPage;
        if (I('request.id')) {
            $where['id'] = I('request.id');
        }
        if (I('request.title')) {
            $where['title'] = array('like','%'.I('request.title').'%');
        }
        if (I('request.question_type')) {
            $where['question_type'] = I('request.question_type');
        }
        if (I('request.category')) {
            $where['category'] = I('request.category');
        }

        $totalCount  = M('Question')->where($where)->count('id');
        $lists = M('Question')->where($where)->order($orderField.' '.$orderDirection)->limit($offset.','.$numPerPage)->select();
        foreach ($lists as $key=>$value) {
            $stem = M('question_stem')->where("question_id = {$value['id']}")->select();
            $str = '';
            foreach ($stem as $k => $v) {
                if ($v['is_true']) {
                    $str .= '<b>'.$v['stem_content'].'</b>';
                } else {
                    $str .= $v['stem_content'];
                }
                $str .= '|';
            }
            $lists[$key]['stem'] = $str;
        }
        $page = array('pageNum'=>$pageNum, 'orderField'=>$orderField, 'orderDirection'=>$orderDirection, 'numPerPage'=>$numPerPage, 'totalCount'=>$totalCount);
        $this->assign('page', $page);
        $this->assign('question_type',$this->question_type);
        $this->assign('category',$this->question_category);
        $this->assign('lists', $lists);
        $this->display();
    }

    /*
    充值功能
     */
    public function editorQuestion(){
        $id = I('get.id');
        $question_type=0;
        if ($id) {
            $question_info = M('Question')->where(array('id' => $id))->find();
            $question_stem = M('question_stem')->where(array('question_id'=>$id))->order('sn')->select();
            $question_stem_str = '';
            $answer = '';
            foreach($question_stem as $key=>$value) {
                $question_stem_str .= $value['stem_content']."\r\n";
                if ($value['is_true']) {
                    $answer .= $value['sn'].',';
                }
            }
            $question_info['answer'] = trim($answer,',');
            $question_info['question_stem_str'] = $question_stem_str;
            $question_type =$question_info['category'];
            $this->assign('question_info',$question_info);
        }
        $area = M('areas')->where(array('area_type'=>1))->select();
        $this->assign('area',$area);
        $this->assign('question_type',$question_type);
        $this->display();
    }
    public function saveQuestion(){
        $id = I('request.id', 0);
        
        $data['title']              = I('request.title','');
        $data['question_type']      = I('request.question_type',0);
        $data['category']           = I('request.category',0);
        $data['chapter']            = I('request.chapter',0);
        $data['province_id']        = I('request.province',0);
        $data['explain']            = I('request.explain',0);
        $data['stem_content']       = I('request.stem_content',0);
        $data['answer']             = I('request.answer',0);
        foreach ($data as $key=>$value) {
            if (!$value) {
                unset($data[$key]);
            }
        }
        $stem_content = explode("\r\n", trim($data['stem_content']));
        $answer = explode(",", str_replace("，", ",", $data['answer']));
        unset($data['stem_content']);
        unset($data['answer']);
        if ($data['question_type'] == '3') {
            $data['is_true'] = current($answer);
        }
        if ($id) {
            $data['update_time'] = time();
            M('Question')->where(array('id'=>$id))->save($data);
            if (is_array($stem_content) && !empty($stem_content)) {
                M('question_stem')->where(array('question_id'=>$id))->delete(); #删除题干
            }
        } else {
            $data['create_time'] = time();
            $id = M('Question')->add($data);
        }
        if (is_array($stem_content) && !empty($stem_content)) {
            foreach($stem_content as $key=>$value) {
                if (!$value) continue;
                $item['stem_content'] = $value;
                $item['sn']  =$key+1;
                if (in_array($key+1, $answer)) {
                    $item['is_true'] = 1;
                } else {
                    $item['is_true'] = 0;
                }
                $item['question_id'] = $id;
                M('question_stem')->add($item);
            }
        } 

        $result['statusCode'] = "200";
        $result['message']   = "修改成功";
        $result['navTabId'] = "question";
        $result['rel']   = "question";
        if (I('close_dialog') == 1) {
            $result['callbackType'] = "closeCurrent";
        }
        $result['forwardUrl']   = "";
        $result['confirmMsg'] = "";
        $this->ajaxReturn($result);
    }

    public function del(){
        $id = I('get.id');
        M('Question')->where(array('id'=>$id))->delete();
        $result['statusCode'] = "200";
        $result['message']   = "删除成功";
        $result['navTabId'] = "question";
        $result['rel']   = "question";
        if (I('close_dialog') == 1) {
            $result['callbackType'] = "closeCurrent";
        }
        $result['forwardUrl']   = "";
        $result['confirmMsg'] = "";
        $this->ajaxReturn($result);
    }

    public function batch(){
        $this->display();
    }

    /**
     * 批量导入题库
     * @return [type] [description]
     */
    public function batchQuestion(){
        $question_type = I('post.question_type',0);
        $file = uploadFile('file');
        if (!$file) {
            $this->error('文件出错');
        }
        $list = readExcel('./Public/'.$file);
        unset($list[1]);
        foreach($list as $key=>$value){
            if (!$value[2]) {
                continue;
            }
            if ($question_type == 1) {
                $stem_content = array($value[3],$value[4],$value[5],$value[6]);
                $answer = strtoupper($value[7]);
                
                $find = array('A','B','C','D','，');
                $replace = array(1,2,3,4,',');
                $answer = str_replace($find,$replace,$answer);
                $answer = explode(',',$answer);
                if ($question_type == '3') {
                    $data['is_true'] = current($answer);
                }
                $data['explain'] = $value[8]?$value[8]:'';
                $data['category'] = $value[9];
                $data['chapter'] = $value[10];
                $data['province_id'] = $value[11];
            } elseif ($question_type == 2){
                $stem_content = array($value[3],$value[4],$value[5],$value[6],$value[7]);
                $answer = strtoupper($value[8]);
                $find = array('A','B','C','D','E','，');
                $replace = array(1,2,3,4,5,',');
                $answer = str_replace($find,$replace,$answer);
                $answer = explode(',',$answer);
                if ($question_type == '3') {
                    $data['is_true'] = current($answer);
                }
                $data['explain'] = $value[9]?$value[9]:'';
                $data['category'] = $value[10];
                $data['chapter'] = $value[11];
                $data['province_id'] = $value[12];
            }
            $data['title'] = $value[2];
            $data['level'] = $value[1];
            $data['question_type'] = (int)$question_type;
            $data['create_time'] = time();
            $id = M('Question')->add($data);
        
            if (is_array($stem_content) && !empty($stem_content)) {
                foreach($stem_content as $key=>$value) {
                    if (!$value) continue;
                    $item['stem_content'] = $value;
                    $item['sn']  =$key+1;
                    if (in_array($key+1, $answer)) {
                        $item['is_true'] = 1;
                    } else {
                        $item['is_true'] = 0;
                    }
                    $item['question_id'] = $id;
                    M('question_stem')->add($item);
                }
            } 
        }
        redirect(U('admin/index/index'));
    }

    public function batchDel(){
        $id = I('post.ids');
        $id = explode(',',$id);
        $list = M('Question')->where(array('id'=>array('in',$id)))->delete();
        $result['statusCode'] = "200";
        $result['message']   = "删除成功";
        $result['navTabId'] = "question";
        $result['rel']   = "question";
        if (I('close_dialog') == 1) {
            $result['callbackType'] = "closeCurrent";
        }
        $result['forwardUrl']   = "";
        $result['confirmMsg'] = "";
        $this->ajaxReturn($result);
    }
}
