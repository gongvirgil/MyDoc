<?php
namespace Doc\Controller;
use Think\Controller;

class PublicController extends Controller {
	//登录
    public function login(){
    	if(IS_POST){
			$username = I("username");
			$password = I("password");
			$v_code   = I("v_code");

			\Think\Log::write("登录信息：".json_encode($_REQUEST),'DEBUG');

			if( md5($v_code)!=$_SESSION[C('USER_AUTH_VERIFY_CODE')] )	$this->error("验证码错误");
			if(empty($username) || empty($password))	$this->error("参数不能为空");
			$userInfo = D('user')->userInfo($username);
			if(empty($userInfo))	$this->error("用户名错误","");
			if( $userInfo['login_error_count'] > 5 ){
				if(time()-$userInfo['last_login_time'] < 60*5)	$this->error("登录失败次数过多，请稍候再试");
				else	D('User')->loginError($username,'clear');
			}	
			$result = D('User')->checkLogin($username,$password);
			if(!$result)	$this->error("用户名密码错误");
			$_SESSION[C('USER_AUTH_KEY')] = $result['id'];
			$this->success("登录成功！",U('Doc/Item/index'));
			die();
    	}
        $this->display();
    }
    //注册
    public function register(){
    	if(IS_POST){
			$username    = I("username");
			$password    = I("password");
			$re_password = I("re_password");
			$v_code      = I("v_code");

			\Think\Log::write("注册信息：".json_encode($_REQUEST),'DEBUG');

			if( md5($v_code)!=$_SESSION[C('USER_AUTH_VERIFY_CODE')] )	$this->error("验证码错误");
			if(empty($username) || empty($password) || empty($re_password) || empty($v_code))	$this->error("参数不能为空");
			if($password != $re_password)	$this->error("两次密码不一致");
			$result = D('User')->register($username,$password);
			if(!$result)	$this->error("注册失败");
			$this->success("注册成功！",U('Doc/Public/login'));
			die();
    	}
        $this->display();
    }
    //注销
    public function logout(){
    	unset($_SESSION[C('USER_AUTH_KEY')]);
    	$this->success("注销成功");
    }
	//生成验证码
	public function verify(){
		unset($_SESSION[C('USER_AUTH_VERIFY_CODE')]);
		//生成验证码图片
		Header("Content-type: image/PNG");
		$im = imagecreate(44,18); // 画一张指定宽高的图片
		$back = ImageColorAllocate($im, 245,245,245); // 定义背景颜色
		imagefill($im,0,0,$back); //把背景颜色填充到刚刚画出来的图片中
		$vcodes = "";
		srand((double)microtime()*1000000);
		//生成4位数字
		for($i=0;$i<4;$i++){
		$font = ImageColorAllocate($im, rand(100,255),rand(0,100),rand(100,255)); // 生成随机颜色
		$authnum=rand(1,9);
		$vcodes.=$authnum;
		imagestring($im, 5, 2+$i*10, 1, $authnum, $font);
		}
		$_SESSION[C('USER_AUTH_VERIFY_CODE')] = md5($vcodes);

		for($i=0;$i<200;$i++) //加入干扰象素
		{
		$randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); // 画像素点函数
		}
		ImagePNG($im);
		ImageDestroy($im);
	}
}