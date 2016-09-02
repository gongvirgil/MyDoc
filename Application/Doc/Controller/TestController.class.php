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

	}

}