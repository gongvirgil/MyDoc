<?php
namespace Admin\Controller;
use Think\Controller;
class FileController extends \Auth\Controller\AuthController {
    public function index1(){
		$File = new \Lib\Virgil\File();
        $dir = MODULE_PATH."uploads/a/1/";
        $File->createDir($dir);
    }
    public function copyDir(){
        $File = new \Lib\Virgil\File();
    	$dir = MODULE_PATH."uploads/a/";
    	$dir1 = MODULE_PATH."uploads/b/";
    	$res = $File->copyDir($dir, $dir1, 0);
    	var_dump($res);
    }
}