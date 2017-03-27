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
        $i=0;
        for($area = 0x00; $area <= 0xff; $area++){
          for($pos = 0x00; $pos <= 0xff; $pos++){
            $w = pack('CC', $area, $pos);

            $gb2312_name = iconv('GB2312', 'UTF-8', $w);
            $gbk_name = iconv('GBK', 'UTF-8', $w);
            $gb18030_name = iconv('GB18030', 'UTF-8', $w);
            $map['id'] = $i;
            $map['code'] = strtoupper(dechex($area).dechex($pos));

            if(strlen($gb2312_name)==3) $map['in_gb2312'] = 1;
            if(strlen($gbk_name)==3) $map['in_gbk'] = 1;
            if(strlen($gb18030_name)==3) $map['in_gb18030'] = 1;
            
            if(strlen($gb2312_name)==3) {
                $map['name'] = $gb2312_name;
            }elseif(strlen($gbk_name)==3){
                $map['name'] = $gbk_name;
            }elseif(strlen($gb18030_name)==3){
                $map['name'] = $gb18030_name;
            }else{
                $map['name'] = "";
            }
            $res = M('chinese_character')->add($map);
            $i++;
          }      
        }
        var_dump($i);
    }
    public function ab(){
        $w = pack('CC', 0xa9, 0x96);
        $a= iconv('GB2312', 'UTF-8', $w);
        if(!empty($a)) var_dump($a);
    }
}