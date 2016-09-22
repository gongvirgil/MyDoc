<?php
namespace Doc\Controller;
use Think\Controller;

class TestController extends Controller {


	public function a(){
		set_time_limit(0);
		import("Vendor.Virgil.TTS");
        $TTS = new \TTS();
        $res = $TTS->create("你是我的小呀小苹果");
        var_dump($res);
	}
	public function b(){
		import("Vendor.Virgil.Image1");
        $Image = new \Image1('./Public/img/pic1.jpg');
        var_dump($Image-> imageInfo);exit();
        $Image->show();
	}

}