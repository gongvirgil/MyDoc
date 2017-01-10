<?php
class Cmd {
	private $instance = null;
	public $cmdLine   = '';
	public $cmdReturn = '';
	public $cmdOutput = '';


	function __construct(){

	}

	/**
	 * [exeCmd 前台执行Cmd]
	 * @return [type] [description]
	 */
	private function exeCmd(){
		if(empty($this->cmdLine)) return false;
		exec($this->cmdLine, $this->cmdOutput, $this->cmdReturn);
	}
	/**
	 * [exeBackCmd 后台执行Cmd]
	 * @return [type] [description]
	 */
	private function exeBackCmd(){
		if(empty($this->cmdLine)) return false;
		$this->cmdLine .= " >/dev/null 2>/dev/null &";
		system($this->cmdLine,$this->cmdReturn);
	}

	public function execute($cmdLine,$type=0){
		$this->cmdLine = $cmdLine;
		switch ($type) {
			case 1:$this->exeBackCmd();break;
			default:$this->exeCmd();break;
		}
		$result['cmdLine']   = $this->cmdLine;
		$result['cmdOutput'] = $this->cmdOutput;
		$result['cmdReturn'] = $this->cmdReturn;
		return $result;
	}

	public static function DumpMysqlDataToFile($sql,$file,$dbName='talk'){
		$dbUser = (C("DB_USER"))?C("DB_USER"):"ddd";
		$dbPwd = (C("DB_PWD"))?C("DB_PWD"):"ddd";
		$cmdLine = sprintf("mysql -A -u %s -p%s -e \"use %s;set names utf8;%s;\"|sed 's/\\t/\",\"/g;s/^/\"/;s/$/\"/;s/\\n//g' > %s",$dbUser,$dbPwd,$dbName,$sql,$file);
		ExLog::log("执行导出sql到指定文件命令:".$cmdLine,log::INFO);
		exec($cmdLine, $output, $retvalue);
		ExLog::log("cmd returnValue:".$retvalue, Log::DEBUG);
		ExLog::log("cmd result:".print_r($output, true), Log::DEBUG);
		return $retvalue;
	}



}