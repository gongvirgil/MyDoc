<?php
namespace Auth\Controller;
use Think\Controller;

class AccountController extends Controller {
	public function forgetPwd(){

	}
	public function test(){
        import("Vendor.Virgil.Mail");
    	$mail = new \Mail();
    	$template = file_get_contents('./Public/Templates/MailTemplate/1.html');
    	//exit($template);
    	$res = $mail->sendMail("ppmoli@126.com",'用户','测试一下哟',$template);
    	var_dump($res);
	}
}