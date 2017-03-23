<?php
namespace Admin\Model;
use Think\Model;

class BaseModel extends Model {
	protected $autoCheckFields = false;
	protected $path = "./Public/Uploads/";

	public function getUploadPath($userId=""){
		if(empty($userId))	$userId = $_SESSION [C('USER_AUTH_KEY')];
		$path = $this->path."user-".$userId."/";
		if(!is_dir($path)){
			$File = new \Lib\Virgil\File();
			$File->createDir($path);
		}
		return $path;
	}
}