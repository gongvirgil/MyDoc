<?php
class Cmd {
	private $instance = null;
	public $cmdLine   = '';
	public $cmdReturn = '';
	public $cmdOutput = '';


	function __construct(){

	}


	public function exucteCmd($cmdLine){
		if(empty($cmdLine)) return false;
		$this->cmdLine = $cmdLine;
		exec($cmdLine, $this->cmdOutput, $cmdReturn);

		//return $this->instance;
	}

	public function excuteBackCmd($cmdLine){
		if(empty($cmdLine)) return false;
		$this->cmdLine .= " >/dev/null 2>/dev/null &";
		system($cmdLine,$cmdReturn);

		//return $this->instance;
	}

	public function getCmdResult(){
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