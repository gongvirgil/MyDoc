<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class CliController extends AuthController {
	public $fn;
	public $proFn;
	public $resFn;
	public $cmdLine;
	public function _initialize(){
		parent::_initialize();
		$this->fn = date('Ymd-His-').rand(1000,9999);
	}
	/**
	 * [createPro 创建进度临时文件]
	 * @param  string $content [description]
	 * @return [type]          [description]
	 */
	public function createPro($content="-1"){
		$this->proFn = PATH."Private/Temp/cliProgress/".$this->fn;
		if(!is_file($this->proFn)){
			import("Vendor.Virgil.File");
			$File = new \File();
			$File->createFile($this->proFn);	
		}
		file_put_contents($this->proFn, $content);
		return $this;
	}
	/**
	 * [createRes 创建结果临时文件]
	 * @param  string $content [description]
	 * @return [type]          [description]
	 */
	public function createRes($content="-1|Start"){
		$this->resFn = PATH."Private/Temp/cliResult/".$this->fn;
		if(!is_file($this->resFn)){
			import("Vendor.Virgil.File");
			$File = new \File();
			$File->createFile($this->resFn);	
		}
		file_put_contents($this->resFn, $content);
		return $this;
	}
	/**
	 * [createCmd 创建执行的Cmd命令行]
	 * @param  [type] $controller [description]
	 * @param  [type] $action     [description]
	 * @param  [type] $param      [description]
	 * @return [type]             [description]
	 */
	public function createCmd($controller,$action,$param=null){
		if(empty($param) || (!is_array($param) && !is_object($param))){
			$param = array();
		}elseif(is_object($param)){
			$param = objToArr($param);
		}
		$param['proFn'] = $this->proFn;
		$param['resFn'] = $this->resFn;
		$this->cmdLine = sprintf("php %scli.php %s/%s '%s'",PATH,$controller,$action,json_encode($param));
		return $this;
	}
	/**
	 * [run 执行]
	 * @return [type] [description]
	 */
	public function run(){
        import("Vendor.Virgil.Cmd");
        $Cmd = new \Cmd();
        return $Cmd->execute($this->cmdLine,1);
	}
}