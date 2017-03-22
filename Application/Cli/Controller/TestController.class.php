<?php
namespace Cli\Controller;
use Think\Controller;
class TestController extends Controller {
    public function abc(){
        set_time_limit(0);
        $param = json_decode($_SERVER['argv'][2]);
        import("Vendor.Virgil.TTS");
        $TTS = new \TTS();
        $res = $TTS->create($param->text);
        var_dump($res);
    }
    public function exp(){
    	$user = C('DB_USER');
    	$pwd = C('DB_PWD');
    	$cmdLine = "bash ".PATH."Shell/test.sh";
        import("Vendor.Virgil.Cmd");
        $Cmd = new \Cmd();
        $res = $Cmd->execute($cmdLine);
        var_dump($res);
    }
    public function aaa(){
        $Cli = A('Admin/Cli');
        //$a = $Cli->createPro();
        var_dump($a);
        var_dump('$a');

    }
}