<?php
namespace Admin\Controller;
use Think\Controller;
class ExportController extends \Auth\Controller\AuthController {
    public function image(){
    	$hash = I('h');
    	$map['hash'] = $hash;
    	$info = D('Image')->where($map)->find();
        $File = new \Lib\Virgil\File();
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
    public function aa(){
        $Cli = new \Lib\Virgil\Cli();
        $a = $Cli->createPro()->createRes()->createCmd('Test','abc')->run();
        var_dump($a);
    }
    public function aa1(){
        
    }
}