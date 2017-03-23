<?php
namespace Auth\Controller;
use Think\Controller;

class AuthController extends Controller {
	protected function isLogin(){
		if(isset($_SESSION [C('USER_AUTH_KEY')]) && !empty($_SESSION [C('USER_AUTH_KEY')]))	return true;
		return false;
	}
	public function _initialize(){
		$USER_AUTH_GATEWAY = U('Auth/Login/index?redirect_url='.base64_encode($_SERVER['REQUEST_URI']));
		C('USER_AUTH_GATEWAY',$USER_AUTH_GATEWAY);
		\Lib\Virgil\Rbac::checkLogin();
		$map['id'] = $_SESSION[C('USER_AUTH_KEY')];
		$this->login_user = D('User')->where($map)->find();
		$this->module     = MODULE_NAME;
		$this->controller = CONTROLLER_NAME;
		$this->action     = ACTION_NAME;
		//Auth权限
        $Auth = new \Think\Auth();
        /*
        if($_SESSION['uname']==C('ADMIN_AUTH_KEY')){    
        //以用户名来判断是否是超级管理员，绕过验证，不用用户组来判断的原因是用户组有时候是中文，而且常删除或更改。
            return true;
        }
        */
		$isAuthCheck = true;
		$NO_AUTH_CHECK_ARRAY = C('NO_AUTH_CHECK');
		if(is_array($NO_AUTH_CHECK_ARRAY) && array_key_exists(MODULE_NAME, $NO_AUTH_CHECK_ARRAY)){
			if(!is_array($NO_AUTH_CHECK_ARRAY[MODULE_NAME])){
				$isAuthCheck = false;
			}elseif(array_key_exists(CONTROLLER_NAME, $NO_AUTH_CHECK_ARRAY[MODULE_NAME])){
				if(!is_array($NO_AUTH_CHECK_ARRAY[MODULE_NAME][CONTROLLER_NAME]) || array_key_exists(ACTION_NAME, $NO_AUTH_CHECK_ARRAY[MODULE_NAME][CONTROLLER_NAME])){
					$isAuthCheck = false;
				}
			}
		}
		if( $isAuthCheck && !$Auth->check(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,$this->login_user['id'])){
			exit('没有权限');
			//$this->error('没有权限',C('USER_AUTH_GATEWAY'));
		}
	}
	public function _empty(){
		$template = C('Template_path').strtolower(MODULE_NAME.'_'.CONTROLLER_NAME.'_'.ACTION_NAME.'.html');
		$this->display($template);
	}
}