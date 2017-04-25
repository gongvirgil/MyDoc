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

    public function aaa(){
        file_put_contents("/var/www/mydoc/a.txt", getmypid()."\r\n");
        exit();
        $File = new \Lib\Virgil\File();
        $a = $File->getFileExt('/var/www/mydoc/chinese.fff');
        echo json_encode(headers_list());
        var_dump($a);
/*
[
    "X-Powered-By: PHP/5.3.10-1ubuntu3.25", 
    "Expires: Thu, 19 Nov 1981 08:52:00 GMT", 
    "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0", 
    "Pragma: no-cache"
]
*/
    }

    public function unicode_decode($name){
      $json = '{"str":"'.$name.'"}';
      $arr = json_decode($json,true);
      if(empty($arr)) return '';
      return $arr['str'];
    }

    public function aaaa(){
        for ($i=0; $i < 65536; $i++) {
            $hex = dechex($i);
            $unicode = sprintf("%04s", $hex);
            $name = $this->unicode_decode("\u".$unicode);
            if(strlen($name)<1){
                var_dump($i);
                var_dump($unicode);
                var_dump($name);   
                exit();
            }
            exit('end');
            $map['name'] = $name;    
            $res1 = M('chinese_character')->where($map)->find();$sql = M()->_sql();
            if(empty($res1['name'])) continue;
            $res2 = M('chinese_character')->where('unicode="'.$unicode.'"')->find();
            if(!empty($res1) && empty($res2)){
                var_dump($i);
                var_dump($hex);
                var_dump($unicode);
                var_dump($name);
                var_dump($res1);
                var_dump($sql);
                exit();
            }
            
        }
    }
    public function bbbb(){
        $sql = "
            DROP TABLE IF EXISTS `mydoc_unicode`;
            CREATE TABLE `mydoc_unicode` (
              `id` int(10) NOT NULL COMMENT 'id',
              `unicode` varchar(20) NOT NULL DEFAULT '' COMMENT '字符编码',
              `name` varchar(20) DEFAULT NULL COMMENT '字符名',
              `length` tinyint(2) DEFAULT NULL COMMENT '字符长度',
              PRIMARY KEY (`id`),
              KEY `unicode`(`unicode`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='unicode字符表';";
        $a = M('', '', 'DB_CONFIG_ACTIVE')->execute($sql);
        for ($i=0; $i < 65536; $i++) {
            $hex = dechex($i);
            $unicode = sprintf("%04s", $hex);
            $name = $this->unicode_decode("\u".$unicode);
            $map['id'] = $i;
            $map['name'] = $name;
            $map['unicode'] = $unicode;
            $map['length'] = strlen($name);
            M('unicode')->add($map);
        }
        exit('end');
    }
}