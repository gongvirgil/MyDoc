<?php
namespace Home\Model;
use Think\Model;
use Home\Model\BaseModel;

class UserModel extends BaseModel {
	/**
	 * [userInfo description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function userInfo($username){
		if(empty($username))	return false;
		$map['username'] = $username;
		$userInfo = $this->where($map)->find();
		if(empty($userInfo))	return false;
		return $userInfo;
	}
	/**
	 * [checkLogin description]
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public function checkLogin($username,$password){
		if(empty($username) || empty($password))	return false;
		$userInfo = $this->userInfo($username);
		if(empty($userInfo))	return false;
		$this->updateLoginTime($username);
		if( $userInfo['password'] != md5($userInfo['salt'].$password.$userInfo['salt']) )	return false;
		$this->loginError($username,'clear');
		return $userInfo;
	}
	/**
	 * [loginError description]
	 * @param  [type] $username [description]
	 * @param  string $method   [description]
	 * @return [type]           [description]
	 */
	public function loginError($username,$method='count'){
		if(empty($username))	return false;
		$where['username'] = $username;
		switch ($method) {
			case 'increase'://+1
				$this->where($where)->setInc('login_error_count');
				return true;
				break;
			case 'clear'://=0
				$map['login_error_count'] = 0;
				$this->where($where)->save($map);
				return true;
				break;
			case 'count'://count
				$count = $this->where($where)->getField('login_error_count');
				return $count;
				break;
		}
	}
	/**
	 * [isExist description]
	 * @param  [type]  $username [description]
	 * @return boolean           [description]
	 */
	public function isExist($username){
		if(empty($username))	return false;
		$userInfo = $this->userInfo($username);
		if(empty($userInfo))	return false;
		return true;
	}
	/**
	 * [register description]
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return boolean          [description]
	 */
	public function register($username,$password){
		if(empty($username) || empty($password))	return false;
		if($this->isExist($username))	return false;
		$map['username'] = $username;
		$map['salt']     = $salt = \Org\Util\String::randString();
		$map['password'] = md5($salt.$password.$salt);
		$map['reg_time'] = time();
		$map['reg_ip']   = get_client_ip();
		$result = $this->add($map);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [updatePwd description]
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return boolean          [description]
	 */
	public function updatePwd($username,$password){
		if(empty($username) || empty($password))	return false;
		$userInfo = $this->userInfo($username);
		$map['password'] = md5($userInfo['salt'].$password.$userInfo['salt']);
		$where['id'] = $userInfo['id'];
		$result = $this->where($where)->save($map);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [updateLoginTime description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function updateLoginTime($username){
		if(empty($username))	return false;
		$where['username'] = $username;
		$map['last_login_time'] = time();
		$map['last_login_ip']   = get_client_ip();
		$result = $this->where($where)->save($map);
		if(!$result)	return false;
		return true;
	}
}