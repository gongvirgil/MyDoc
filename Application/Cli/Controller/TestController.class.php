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
        $a = \Lib\Virgil\Deque::getInstance();
        $a->inL(array(1,2));
        sleep(10);
        var_dump($a->queue);
    }
    public function bb(){     
        $a = \Lib\Virgil\Deque::getInstance();
        $a->inL(array(3,4));
        var_dump($a->queue);
    }
}