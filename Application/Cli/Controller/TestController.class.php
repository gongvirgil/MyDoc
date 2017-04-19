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
        $arr = array();
        $books = M('chinese_rhyme')->group('book')->select();
        foreach ($books as $k => $v) {
            $arr[$v['book']] = $this->cc($v['book']);
        }
        file_put_contents("/var/www/mydoc/rhythm.json", json_encode($arr));
    }
    public function cc($book){
        $arr = array();
        $map['book'] = $book;
        $groups = M('chinese_rhyme')->field('concat(`group`,"(",`tone_type`,")") as group_type,group_concat(word) as words')->where($map)->group('group_type')->order('group_type asc')->select();
        //exit(M()->_sql());
        foreach ($groups as $k => $v) {
            $arr[$v['group_type']] = $v['words'];
        }  
        return $arr;  
    }
}