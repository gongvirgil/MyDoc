<?php
namespace Auth\Controller;
use Think\Controller;

class AccountController extends Controller {
	public function forgetPwd(){
        C('USER_AUTH_GATEWAY',"/Auth/Login/index?redirect_url=".base64_encode($_SERVER['REQUEST_URI']));
        var_dump(C('USER_AUTH_GATEWAY'));
        var_dump(PHP_FILE);
        var_dump(MODULE_NAME);
        var_dump(CONTROLLER_NAME);
        var_dump(ACTION_NAME);
	}
	public function test(){
        import("Vendor.Virgil.Mail");
    	$mail = new \Mail();

        $this->email_info['title'] = "测试一下哟";
    	$template = $this->fetch('./Public/Templates/MailTemplate/1.html');

    	$res = $mail->sendMail("ppmoli@126.com",'用户','测试一下哟',$template);
    	var_dump($res);
	}
}