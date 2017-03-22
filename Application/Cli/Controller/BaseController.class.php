<?php
namespace Cli\Controller;
use Think\Controller;
class BaseController extends Controller {
    public $cliProgressFile;
    public $cliResultFile;
    public function __construct(){

    }
    /**
     * [createDir 创建文件根目录]
     * @param  [type]  $dir  [description]
     * @param  integer $mode [description]
     * @return [type]        [description]
     */
    public function createDir($dir, $mode = 0777){
        if (is_dir($dir) || (@mkdir($dir, $mode) && @chmod($dir, $mode)) )
            return true;
        if (!$this->createDir(dirname($dir), $mode))
            return false;
        return (@mkdir($dir, $mode) && @chmod($dir, $mode));
    }
}