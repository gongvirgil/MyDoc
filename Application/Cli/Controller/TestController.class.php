<?php
namespace Cli\Controller;
use Think\Controller;
class TestController extends Controller {
    public function abc(){
        set_time_limit(0);
        $text = $_SERVER['argv'][2];
        import("Vendor.Virgil.TTS");
        $TTS = new \TTS();
        $res = $TTS->create($text);
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
}