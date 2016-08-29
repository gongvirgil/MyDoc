<?php
namespace File\Controller;
use Think\Controller;
class MediaController extends AuthController {
    public function gallery(){
        $this->display(C('Template_path').'gallery.html');
    }
    public function audio(){
		$this->display(C('Template_path').'audio.html');
    }
}