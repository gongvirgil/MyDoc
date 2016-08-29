<?php
namespace File\Controller;
use Think\Controller;

class AuthController extends Controller {
	protected function isLogin(){
		if(isset($_SESSION [C('USER_AUTH_KEY')]) && !empty($_SESSION [C('USER_AUTH_KEY')]))	return true;
		return false;
	}
	public function _initialize(){
		if(!$this->isLogin()) redirect(U('Auth/Login/index?redirect_url='.base64_encode($_SERVER['REQUEST_URI'])));
		$map['id'] = $_SESSION [C('USER_AUTH_KEY')];
		$this->login_user = D('User')->where($map)->find();
	}
}