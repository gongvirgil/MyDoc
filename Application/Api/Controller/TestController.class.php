<?php
namespace Api\Controller;
use Think\Controller;
use Lib\Virgil;
class TestController extends Controller {
	public function aa(){
		$Redis = \Lib\Virgil\Redis::init();
		$Random = new \Lib\Virgil\Random();
		for ($i=0; $i < 10; $i++) {
			$arr[$i] = $Random->letter();
		}
		$Redis->set('numbers','1bcd');
		$numbers = $Redis->get('numbers');
		var_dump($numbers);
	}
	public function bb(){
		$Redis = \Lib\Virgil\Redis::init();
		$numbers = $Redis->get('numbers');
		var_dump($numbers);
	}
	public function cc(){
		$Redis = \Lib\Virgil\Redis::init();
		$numbers = $Redis->keys();
		var_dump($numbers);
		
	}
	public function getId(){
		$ids = M('test')->getField('id,1');
		for ($i=1; $i < 10000; $i++) { 
			if(!array_key_exists($i, $ids)){
				return $i;
			}
		}
		return 0;
	}
	public function dd(){
		phpinfo();
	}
}