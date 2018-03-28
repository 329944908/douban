<?php
namespace Home\Model;
use Api\Model\BaseModel;
class UserModel extends BaseModel {
	public function getUserInfoByEmail($email){
		$data = $this->where("email = '{$email}'")->find();
		return $data;
	}
	public function getUserInfoByPhone($phone){
		$data = $this->where("phone = '{$phone}'")->find();
		return $data;
	}
	public function activate($token){
		$data['email_verify'] =1;
        $res = $this->where("token = '{$token}'")->save($data);
        return $res;
	}
}