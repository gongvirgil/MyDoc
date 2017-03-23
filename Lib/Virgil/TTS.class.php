<?php
namespace Lib\Virgil;
class TTS {
	protected $client;
	protected $username;
	protected $password;
	protected $text;
	protected $convertID;
	protected $remoteURL;
	/**
	 * [__construct 初始化]
	 */
	public function __construct(){
		$url = "http://tts.itri.org.tw/TTSService/Soap_1_3.php?wsdl";
		$this->client = new SoapClient($url);
		$this->username = "ppmoli";
		$this->password = "gong19930312";
		$this->text     = "Hello World";
		$this->path     = PATH."Public/Downloads/TTS/";
		if(!is_dir($this->path))	$this->createDir($this->path);
		$this->name     = time().".wav";
		//$this->convertID = "";
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
	/**
	 * [ConvertSimple 文本转语音]
	 */
	public function ConvertSimple(){
		$result = $this->client->ConvertSimple($this->username,$this->password,$this->text);
		$resultArray = explode("&",$result);
		$resultCode      = $resultArray[0];
		$resultString    = $resultArray[1];
		$resultConvertID = $resultArray[2];
		if($resultCode==0)	$this->convertID = $resultConvertID;
	}
	/**
	 * [GetConvertStatus 获取结果]
	 */
	public function GetConvertStatus(){
		if(empty($this->convertID))	$this->ConvertSimple();
		$result = $this->client->GetConvertStatus($this->username,$this->password,$this->convertID);
		$resultArray = explode("&",$result);
		$resultCode   = $resultArray[0];
		$resultString = $resultArray[1];
		$statusCode   = $resultArray[2];
		$status       = $resultArray[3];
		$resultUrl    = $resultArray[4];

		if($statusCode==2)	$this->remoteURL = $resultUrl;
		else{
			sleep(1);
			$this->GetConvertStatus();
		}
	}
	/**
	 * [SaveLocal 下载到本地]
	 */
	public function SaveLocal(){
		$this->path .= date("Y-m-d")."/";
		if(!is_dir($this->path))	$this->createDir($this->path);
	    $fp = fopen($this->path.$this->name, 'w+');
	    $ch = curl_init($this->remoteURL);
	    curl_setopt($ch, CURLOPT_FILE, $fp);
	    curl_exec($ch);
	    curl_close($ch);
	    fclose($fp);
	}

	public function create($text=NULL,$path=NULL,$name=NULL){
		if(!empty($text))	$this->text = $text;
		if(!empty($path))	$this->path = $path;
		if(!empty($name))	$this->name = $name.".wav";
		$this->ConvertSimple();
		$this->GetConvertStatus();
		$this->SaveLocal();
		return $this->path.$this->name;
	}
}