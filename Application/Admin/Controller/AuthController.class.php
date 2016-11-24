<?php
namespace Admin\Controller;
use Think\Controller;

class AuthController extends Controller {
	protected function isLogin(){
		if(isset($_SESSION [C('USER_AUTH_KEY')]) && !empty($_SESSION [C('USER_AUTH_KEY')]))	return true;
		return false;
	}
	public function _initialize(){
		$USER_AUTH_GATEWAY = U('Auth/Login/index?redirect_url='.base64_encode($_SERVER['REQUEST_URI']));
		C('USER_AUTH_GATEWAY',$USER_AUTH_GATEWAY);
		import("Vendor.Virgil.Rbac");
		\Rbac::checkLogin();
		$map['id'] = $_SESSION[C('USER_AUTH_KEY')];
		$this->login_user = D('User')->where($map)->find();
		$this->module     = MODULE_NAME;
		$this->controller = CONTROLLER_NAME;
		$this->action     = ACTION_NAME;
	}
}