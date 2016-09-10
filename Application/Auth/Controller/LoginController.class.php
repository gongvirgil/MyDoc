<?php
namespace Auth\Controller;
use Think\Controller;

class LoginController extends Controller {
	//登录
    public function index(){
    	if(IS_POST){
			$username     = I("username");
			$email        = I("email");
			$password     = I("password");
			$v_code       = I("v_code");
			$redirect_url = base64_decode(I("redirect_url"));

			\Think\Log::write("登录信息：".json_encode($_REQUEST),'DEBUG');

			if( md5($v_code)!=$_SESSION[C('USER_AUTH_VERIFY_CODE')] )	$this->error("验证码错误");
			if(empty($email) || empty($password))	$this->error("参数不能为空");
			$userInfo = D('user')->userInfo($email);
			if(empty($userInfo))	$this->error("用户名错误","");
			if( $userInfo['login_error_count'] > 5 ){
				if(time()-$userInfo['last_login_time'] < 60*5)	$this->error("登录失败次数过多，请稍候再试");
				else	D('User')->loginError($email,'clear');
			}	
			$result = D('User')->checkLogin($email,$password);
			if(!$result)	$this->error("用户名密码错误");
			$_SESSION[C('USER_AUTH_KEY')] = $result['id'];
			$this->success("登录成功！",$redirect_url);
			die();
    	}
    	$this->redirect_url = I("redirect_url");
        $this->display(C('Template_path').'login.html');
    }
}