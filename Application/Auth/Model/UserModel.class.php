<?php
namespace Auth\Model;
use Think\Model;

class UserModel extends Model {
	/**
	 * [userInfo description]
	 * @param  [type] $info [description]
	 * @return [type]           [description]
	 */
	public function userInfo($info,$type='email'){
		if(empty($info))	return false;
		$map[$type] = $info;
		$userInfo = $this->where($map)->find();
		if(empty($userInfo))	return false;
		return $userInfo;
	}
	/**
	 * [checkLogin description]
	 * @param  [type] $email [description]
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public function checkLogin($email,$password){
		if(empty($email) || empty($password))	return false;
		$userInfo = $this->userInfo($email);
		if(empty($userInfo))	return false;
		$this->updateLoginTime($email);
		if( $userInfo['password'] != md5($userInfo['salt'].$password.$userInfo['salt']) )	return false;
		$this->loginError($email,'clear');
		return $userInfo;
	}
	/**
	 * [loginError description]
	 * @param  [type] $email [description]
	 * @param  string $method   [description]
	 * @return [type]           [description]
	 */
	public function loginError($email,$method='count'){
		if(empty($email))	return false;
		$where['email'] = $email;
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
	 * @param  [type]  $email [description]
	 * @return boolean           [description]
	 */
	public function isExist($email){
		if(empty($email))	return false;
		$userInfo = $this->userInfo($email);
		if(empty($userInfo))	return false;
		return true;
	}
	/**
	 * [register description]
	 * @param  [type] $email [description]
	 * @param  [type] $password [description]
	 * @param  [type] $username [description]
	 * @param  [type] $realname [description]
	 * @return boolean          [description]
	 */
	public function register($email,$password,$username="",$realname=""){
		if(empty($email) || empty($password))	return false;
		if($this->isExist($email))	return false;
		$map['email']    = $email;
		$map['username'] = $username;
		$map['realname'] = $realname;
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
	 * @param  [type] $email [description]
	 * @param  [type] $password [description]
	 * @return boolean          [description]
	 */
	public function updatePwd($email,$password){
		if(empty($email) || empty($password))	return false;
		$userInfo = $this->userInfo($email);
		$map['password'] = md5($userInfo['salt'].$password.$userInfo['salt']);
		$where['id'] = $userInfo['id'];
		$result = $this->where($where)->save($map);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [updateLoginTime description]
	 * @param  [type] $email [description]
	 * @return [type]           [description]
	 */
	public function updateLoginTime($email){
		if(empty($email))	return false;
		$where['email'] = $email;
		$map['last_login_time'] = time();
		$map['last_login_ip']   = get_client_ip();
		$result = $this->where($where)->save($map);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [setResetPwdSign description]
	 * @param [type] $email [description]
	 */
	public function setResetPwdSign($email){
		if(empty($email))	return false;
		$userInfo = $this->userInfo($email);
		if(empty($userInfo))	return false;
		$map['reset_pwd_time'] = time();
		$where['id'] = $userInfo['id'];
		$this->where($where)->save($map);
		$resetPwdSign = md5($userInfo['username'].$userInfo['salt'].$userInfo['email'].$map['reset_pwd_time']);
		return substr($resetPwdSign,8,8);
	}
	/**
	 * [checkResetPwdSign description]
	 * @param  [type] $email [description]
	 * @param  [type] $sign  [description]
	 * @return [type]        [description]
	 */
	public function checkResetPwdSign($email,$sign){
		if(empty($email) || empty($sign))	return false;
		$userInfo = $this->userInfo($email);
		if(empty($userInfo))	return false;
		if($userInfo['reset_pwd_time'] < time()-2*60*60) return false;
		$resetPwdSign = md5($userInfo['username'].$userInfo['salt'].$userInfo['email'].$userInfo['reset_pwd_time']);
		if(substr($resetPwdSign,8,8) != $sign) return false;
		return true;
	}
}