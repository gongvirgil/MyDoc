<?php
namespace Cli\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){
    	import("Vendor.Virgil.Cmd");
    	$Cmd = new \Cmd();
    	$res = $Cmd->aa()->bb();
    	var_dump($res);
    }
    public function aa(){
    	var_dump(123);
    	exit("**");
    }
}