<?php
namespace File\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class ExportController extends AuthController {
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
    public function test(){
        $file_name   = "成绩单-".date("Y-m-d H:i:s");
        $file_suffix = "xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$file_name.$file_suffix\"");
        //根据业务，自己进行模板赋值。
        $context = $this->fetch(C('ExcelTemplate_path').'excel.html');
        echo $context;
    }
}