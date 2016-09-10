<?php
namespace Auth\Controller;
use Think\Controller;

class VerifyController extends Controller {
	//生成验证码
	public function index(){
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