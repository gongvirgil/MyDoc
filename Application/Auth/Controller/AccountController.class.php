<?php
namespace Auth\Controller;
use Think\Controller;

class AccountController extends Controller {
	public function forgetPwd(){
        if(IS_POST){
            $username     = I("username");
            $email        = I("email");
            $v_code       = I("v_code");

            \Think\Log::write("找回密码：".json_encode($_REQUEST),'DEBUG');

            if( md5($v_code)!=$_SESSION[C('USER_AUTH_VERIFY_CODE')] )   $this->error("验证码错误");
            if(empty($email))   $this->error("参数不能为空");
            $userInfo = D('user')->userInfo($email);
            if(empty($userInfo))    $this->error("用户名错误");

            import("Vendor.Virgil.Mail");
            $mail = new \Mail();
            $resetPwdSign = D('user')->setResetPwdSign($userInfo['email']);
            $email_info['title']           = "forgetPwd";
            $email_info['email']           = $userInfo['email'];
            $email_info['username']        = $userInfo['username'];
            $email_info['createNewPwdUrl'] = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].U('Auth/Account/resetPwd/t/'.$userInfo['username'].'-'.$resetPwdSign);
            $this->email_info = $email_info;
            $template = $this->fetch(C('MailTemplate_path').'forgetPwd.html');
            $result = $mail->sendMail($userInfo['email'],$userInfo['username'],'forgetPwd',$template);
            if($result !== true) $this->success("邮件发送失败");
            $this->success("邮件发送成功");
            die();
        }
        $this->display(C('Template_path').'forgetPwd.html');
	}
    public function resetPwd(){
        $t = trim($_GET["t"]);
        list($username,$sign) = explode("-", $t);
        if(empty($username) || empty($sign))   $this->error("参数不能为空",__APP__);
        $userInfo = D('user')->userInfo($username,'username');
        if(empty($userInfo))    $this->error("用户名错误",__APP__);
        if($userInfo['reset_pwd_time'] < time()-2*60*60) $this->error("重置密码链接已失效",__APP__);
        $res = D('user')->checkResetPwdSign($userInfo['email'],$sign);
        if($res !== true) $this->error("重置密码链接错误",__APP__);
        if(IS_POST){
            $password    = I('password');
            $re_password = I("re_password");

            \Think\Log::write("重设密码：".json_encode($_REQUEST),'DEBUG');

            if(empty($password) || empty($re_password))  $this->error("密码不能为空");
            if($password!=$re_password)  $this->error("两次密码不一致");

            $result = D('user')->updatePwd($userInfo['email'],$password);
            if($result !== true) $this->error("重置密码失败");
            $this->success("重置密码成功",U('Auth/Login/index'));
            die();
        }
        $this->display(C('Template_path').'resetPwd.html');  
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