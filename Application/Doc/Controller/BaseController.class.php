<?php
namespace Doc\Controller;
use Think\Controller;

class BaseController extends Controller {
	protected function isLogin(){
		if(isset($_SESSION [C('USER_AUTH_KEY')]) && !empty($_SESSION [C('USER_AUTH_KEY')]))	return true;
		return false;
	}
	public function _initialize(){
		if(!$this->isLogin()) redirect('Public/login');
		$map['id'] = $_SESSION [C('USER_AUTH_KEY')];
		$this->login_user = D('User')->where($map)->find();
	}
}