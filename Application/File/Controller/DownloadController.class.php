<?php
namespace File\Controller;
use Think\Controller;

class DownloadController extends AuthController {
	protected $path = "";
	public function _initialize(){
		parent::_initialize();
		$this->path = D('Base')->getUploadPath($this->login_user['id']);
	}
    public function image(){
    	$hash = I('h');
    	$map['hash'] = $hash;
    	$info = D('Image')->where($map)->find();
        import("Vendor.Virgil.File");
    	$File = new \File();
    	$File->sendFile($info['path'],'image');
    }
    public function audio(){
    	var_dump(__file__);
		$this->display(C('Template_path').'audio.html');
    }
}