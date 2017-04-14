<?php
namespace Cli\Controller;
use Think\Controller;
class TestController extends Controller {
    public function abc(){
        set_time_limit(0);
        $param = json_decode($_SERVER['argv'][2]);
        $TTS = new \Lib\Virgil\TTS();
        $res = $TTS->create($param->text);
        var_dump($res);
    }
    public function exp(){
    	$user = C('DB_USER');
    	$pwd = C('DB_PWD');
    	$cmdLine = "bash ".PATH."Shell/test.sh";
        $Cmd = new \Lib\Virgil\Cmd();
        $res = $Cmd->execute($cmdLine);
        var_dump($res);
    }


    public function aa(){
        $a = M('content_type')->select();
        $arr = array();
        foreach ($a as $k => $v) {
            $arr[$v['ext']] = $v['content_type'];
        }
        echo(json_encode($arr));
    }
}