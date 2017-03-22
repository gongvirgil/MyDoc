<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class FileController extends AuthController {
    public function index(){
        $this->display(C('Template_path').'file.html');
    }
    public function index1(){
		import("Vendor.Virgil.File");
        $File = new \File();
        $dir = MODULE_PATH."uploads/a/1/";
        $File->createDir($dir);
    }
    public function copyDir(){
        import("Vendor.Virgil.File");
    	$File = new \File();
    	$dir = MODULE_PATH."uploads/a/";
    	$dir1 = MODULE_PATH."uploads/b/";
    	$res = $File->copyDir($dir, $dir1, 0);
    	var_dump($res);
    }
}