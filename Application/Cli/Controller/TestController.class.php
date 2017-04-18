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
        $handle = @fopen("/var/www/mydoc/chinese.txt", "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                $map['name'] = trim($buffer);
                if(!empty($map['name'])) M('chinese_vocabulary')->add($map);
            }
            fclose($handle);
        }
    }

    public function bb(){

        $str = '董懂动孔总笼拢桶捅蓊蠓汞懵';
        $length = mb_strlen($str,'utf-8');
        for ($i=0; $i < $length; $i++) { 
            $word = mb_substr( $str, $i, 1, 'utf-8' );
            $map['word']      = $word;
            $map['tone_type'] = '平';
            $map['group']     = '一董';
            $map['book']      = '平水韵';
            $info = M('chinese_rhyme')->add($map);
        }
    }
}