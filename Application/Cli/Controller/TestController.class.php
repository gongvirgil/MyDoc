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
    public function aaaa(){
        $pro = M('area_dict')->where('level=2')->order('id asc')->select();
        foreach ($pro as $k => $v) {
            $a = explode("市", $v['name']);
            $b = explode("地区", $v['name']);
            $c = explode("自治州", $v['name']);
            if(count($a)==2){
                M('area_dict')->where('id='.$v['id'])->save(array('level_type'=>"市"));
            }elseif(count($b)==2){
                M('area_dict')->where('id='.$v['id'])->save(array('level_type'=>"地区"));
            }elseif(count($c)==2){
                M('area_dict')->where('id='.$v['id'])->save(array('level_type'=>"自治州"));
            }else{
                var_dump($v);
               //M('area_dict')->where('id='.$v['id'])->save(array('level_type'=>"直辖市")); 
            }
        }
    }
    public function aaa(){
        $city = M('area_dict')->where('level=3')->order('id asc')->select();
        foreach ($city as $k => $v) {
            $pro = M('area_dict')->where('level=2 and id='.$v['pid'])->find();
            $map['merger_short_name'] = $pro['merger_short_name'].",".$v['short_name'];
            M('area_dict')->where('id='.$v['id'])->save($map);
        }   
    }

    public function aa(){
        $pro = M('area_dict')->where('level=2')->select();
        foreach ($pro as $k => $v) {
            $map['id'] = $v['id'];
            $id = M()->table('sh_area')->where("level=2 and name='".$v['name']."'")->getField('id');
            $city = M()->table('sh_area')->where('level=3 and pid='.$id)->select();
            foreach ($city as $k1 => $v1) {
                $map['id'] = $map['id']+1;
                $map['pid']= $v['id'];
                $map['level'] = 3;
                $map['name'] = $v1['name'];
                $map['merger_name'] = $v1['merger_name'];
                $map['short_name'] = $v1['shortname'];
                $map['merger_short_name'] = $v1[''];
                $map['en_name'] = $v1['pinyin'];
                $map['initial'] = $v1['first'];
                $map['code'] = $v1['code'];
                $map['zipcode'] = $v1['zip_code'];
                $map['longitude'] = $v1['lng'];
                $map['latitude'] = $v1['lat'];
                $res = M('area_dict')->add($map);
                if(!$res) var_dump(M()->_sql());
            }
        }
        
    }
}