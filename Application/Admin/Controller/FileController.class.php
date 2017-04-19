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
    public function aa(){
        $File = new \Lib\Virgil\File();
        $a = $File->getFileExt('/var/www/mydoc/chinese.fff');
        echo json_encode(headers_list());
        var_dump($a);
/*
[
    "X-Powered-By: PHP/5.3.10-1ubuntu3.25", 
    "Expires: Thu, 19 Nov 1981 08:52:00 GMT", 
    "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0", 
    "Pragma: no-cache"
]
*/
    }
}