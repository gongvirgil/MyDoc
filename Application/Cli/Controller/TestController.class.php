<?php
namespace Cli\Controller;
use Think\Controller;
use Lib\Virgil;
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

/**
 * utf8字符转换成Unicode字符
 * @param  [type] $str Utf-8字符
 * @return [type]           Unicode字符
 */
public function utf8_to_unicode($str) {
    $unicode = 0;
    $unicode = (ord($str[0]) & 0x1F) << 12;
    $unicode |= (ord($str[1]) & 0x3F) << 6;
    $unicode |= (ord($str[2]) & 0x3F);
    return dechex($unicode);
}

/**
 * Unicode字符转换成utf8字符
 * @param  [type] $str Unicode字符
 * @return [type]              Utf-8字符
 */
public function unicode_to_utf8($str) {
    $utf8_str = '';
    $code = intval(hexdec($str));
    //这里注意转换出来的code一定得是整形，这样才会正确的按位操作
    $ord_1 = decbin(0xe0 | ($code >> 12));
    $ord_2 = decbin(0x80 | (($code >> 6) & 0x3f));
    $ord_3 = decbin(0x80 | ($code & 0x3f));
    $utf8_str = chr(bindec($ord_1)) . chr(bindec($ord_2)) . chr(bindec($ord_3));
    return $utf8_str;
}

    public function aaa(){
        try{
            $sql = "select * from mydoc11_chinese_character where unicode is null";
            $a = M()->query($sql);
        }catch( \Think\Exception $e){
            var_dump($e);
        }
    }


    public function aa(){
        $init = \Lib\Virgil\Redis::init();
        $Redis = $init->redis;
        $res = $init->push('numbers',array(1,2,3));
        //$res = $Redis->lPush('numbers',1,2,3);
        //var_dump($res);
        $numbers = $Redis->lrange('numbers',0,-1);
        var_dump($numbers);
    }
}