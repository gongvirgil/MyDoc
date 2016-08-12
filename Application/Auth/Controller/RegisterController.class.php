<?php
namespace Auth\Controller;
use Think\Controller;

class RegisterController extends Controller {
    //注册
    public function index(){
    	if(IS_POST){
			$username     = I("username");
			$password     = I("password");
			$re_password  = I("re_password");
			$v_code       = I("v_code");
			$redirect_url = I("redirect_url");

			\Think\Log::write("注册信息：".json_encode($_REQUEST),'DEBUG');

			if( md5($v_code)!=$_SESSION[C('USER_AUTH_VERIFY_CODE')] )	$this->error("验证码错误");
			if(empty($username) || empty($password) || empty($re_password) || empty($v_code))	$this->error("参数不能为空");
			if($password != $re_password)	$this->error("两次密码不一致");
			$result = D('User')->register($username,$password);
			if(!$result)	$this->error("注册失败");
			$this->success("注册成功！",$redirect_url);
			die();
    	}
        $this->display(C('Template_path').'register.html');
    }
}