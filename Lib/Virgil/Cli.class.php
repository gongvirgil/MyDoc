<?php
namespace Lib\Virgil;
class Cli {
	public $fn;
	public $proFn;
	public $resFn;
	public $fileUrl;
	public $cmdLine;
	public function __construct(){
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
			$File = new \Lib\Virgil\File();
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
			$File = new \Lib\Virgil\File();
			$File->createFile($this->resFn);	
		}
		file_put_contents($this->resFn, $content);
		return $this;
	}
	public function createFile($filename=null){
		if(empty($filename)) $filename = ;
		$file = PATH."Private/Temp/createFile/".$filename;
		if(!is_file($file)){
			$File = new \Lib\Virgil\File();
			$File->createFile($file);	
		}
		$this->fileUrl = ;
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
		if(!empty($this->proFn)) $param['proFn'] = $this->proFn;
		if(!empty($this->resFn)) $param['resFn'] = $this->resFn;
		$this->cmdLine = sprintf("php %scli.php %s/%s '%s'",PATH,$controller,$action,json_encode($param));
		return $this;
	}
	/**
	 * [run 执行]
	 * @return [type] [description]
	 */
	public function run(){
        $Cmd = new \Lib\Virgil\Cmd();
        return $Cmd->execute($this->cmdLine,1);
	}
}