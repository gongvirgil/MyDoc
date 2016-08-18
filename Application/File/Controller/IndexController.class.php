<?php
namespace File\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
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