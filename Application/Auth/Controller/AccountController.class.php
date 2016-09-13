<?php
namespace Auth\Controller;
use Think\Controller;

class AccountController extends Controller {
	public function forgetPwd(){

	}
	public function test(){
        import("Vendor.Virgil.Mail");
    	$mail = new \Mail();
    	$res = $mail->sendMail("gongqiang@emicnet.com",'用户','测试一下哟','<p>你好，我是一个测试的东西</p>');
    	var_dump($res);
	}
}