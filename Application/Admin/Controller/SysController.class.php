<?php
namespace Admin\Controller;
use Think\Controller;
class SysController extends \Auth\Controller\AuthController {
	
	public function info(){
		$data = exec('whoami');
		#lsb_release -a
		$this->ajaxReturn($data,'JSON');
	}
}