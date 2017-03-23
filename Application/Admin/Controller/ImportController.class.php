<?php
namespace Admin\Controller;
use Think\Controller;
class ImportController extends \Auth\Controller\AuthController{
	protected $path = "";
	public function __construct(){
		$this->path = D('Base')->getUploadPath($this->login_user['id']);
	}
    public function image(){
    	$hash = I('h');
    	$map['hash'] = $hash;
    	$info = D('Image')->where($map)->find();
        $File = new \Lib\Virgil\File();
    	$File->sendFile($info['path'],'image');
    }
    public function aa(){
        $Cli = new \Lib\Virgil\Cli();
        $a = $Cli->createPro()->createRes()->createCmd('Test','abc')->run();
        var_dump($a);
    }
}