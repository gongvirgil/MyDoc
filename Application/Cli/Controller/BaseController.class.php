<?php
namespace Cli\Controller;
use Think\Controller;
class BaseController extends Controller {
    /**
     * [cleanRuntime 清空缓存]
     * @return [type] [description]
     */
    public function cleanRuntime(){
        $path = APP_PATH."Runtime/";
        $path1 = trim($_SERVER['argv'][2]);
        $path2 = trim($_SERVER['argv'][3]);
        if(!empty($path1)) $path .= $path1."/";
        if(!empty($path2)) $path .= $path2."/";
        $File = new \Lib\Virgil\File();
        $File->cleanDir($path);
        return true;
    }
}