<?php
namespace Admin\Controller;
use Think\Controller;
class DownloadController extends \Auth\Controller\AuthController {
	protected $path = "";
	public function _initialize(){
		parent::_initialize();
		$this->path = D('Base')->getUploadPath($this->login_user['id']);
	}
    public function image(){
    	$hash = I('h');
    	$map['hash'] = $hash;
    	$info = D('Image')->where($map)->find();
        $File = new \Lib\Virgil\File();
    	$File->sendFile($info['path'],'image');
    }
    public function audio(){
    	var_dump(__file__);
		$this->display(C('Template_path').'audio.html');
    }
}