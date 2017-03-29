<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends \Auth\Controller\AuthController {
    public function aa(){
    	$ar = A('Cli/Base')->cleanRuntime();
    	var_dump($ar);
    }
}