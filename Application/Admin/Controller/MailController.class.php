<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class MailController extends AuthController {
    public function index(){
        $this->display(C('Template_path').'mail.html');
    }
	public function inBox(){
		$this->display(C('Template_path').'inBox.html');
	}
	public function outBox(){
		$this->display(C('Template_path').'outBox.html');
	}
}