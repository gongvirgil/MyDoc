<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class MediaController extends AuthController {
    public function gallery(){
        $this->list = D('Image')->getListByOwner($this->login_user['id']);
        $this->display(C('Template_path').'gallery.html');
    }
    public function audio(){
		$this->display(C('Template_path').'audio.html');
    }
    public function video(){
		$this->display(C('Template_path').'video.html');	
    }
}