<?php
namespace Lib\Virgil;
class File {
	public function formatDir($dir){
		return substr($dir, -1)=="/"?$dir:($dir."/");
	}
	/**
	 * [createDir 创建目录]
	 * @param  [type]  $dir  [description]
	 * @param  integer $mode [description]
	 * @return [type]        [description]
	 */
	public function createDir($dir, $mode = 0777){
		$dir = $this->formatDir($dir);
	    if (is_dir($dir) || (@mkdir($dir, $mode) && @chmod($dir, $mode)) )
	        return true;
	    if (!$this->createDir(dirname($dir), $mode))
	        return false;
	    return (@mkdir($dir, $mode) && @chmod($dir, $mode));
	}
	/**
	 * [cleanDir 清空文件夹]
	 * @param  [type] $dir [description]
	 * @return [type]      [description]
	 */
	public function cleanDir($dir){
		$dir = $this->formatDir($dir);
		$dh=opendir($dir);
		while ($file=readdir($dh)) {
			if($file!="." && $file!="..") {
				$fullpath=$dir.$file;
				if(!is_dir($fullpath))	unlink($fullpath);
				else	$this->deleteDir($fullpath);
			}
		}
		closedir($dh);
		return true;	
	}
	/**
	 * [deleteDir 删除文件夹]
	 * @param  [type] $dir [description]
	 * @return [type]      [description]
	 */
	public function deleteDir($dir) {
		$this->cleanDir($dir);
		return rmdir($dir);
	}
	/**
	 * [renameDir 重命名文件夹]
	 * @param  [type] $dir     [description]
	 * @param  [type] $oldName [description]
	 * @param  [type] $newName [description]
	 * @return [type]          [description]
	 */
	public function renameDir($dir,$oldName,$newName){
		$dir = $this->formatDir($dir);
		$oldDir = $dir.$oldName;
		$newDir = $dir.$newName;
		if(!is_dir($oldDir))	return false;
		return rename($oldDir,$newDir);
	}
	/**
	 * [copyDir 复制文件夹]
	 * @param  [type]  $fromDir [description]
	 * @param  [type]  $toDir   [description]
	 * @param  integer $isCover [description]
	 * @return [type]           [description]
	 */
	public function copyDir($fromDir, $toDir, $isCover=1){
		$fromDir = $this->formatDir($fromDir);
		$toDir   = $this->formatDir($toDir);
		if(!is_dir($fromDir) || !is_dir($toDir))	return false;
		$dh=opendir($fromDir);
		while ($file=readdir($dh)) {
			if($file!="." && $file!="..") {
				$from_path = $fromDir.$file;
				$to_path   = $toDir.$file;
				if(!is_dir($from_path)){
					if(!file_exists($to_path) || $isCover==1)	copy($from_path,$to_path);
					//else 重命名文件
				}	
				else{
					if(!is_dir($to_path))	$this->createDir($to_path);
					$this->copyDir($from_path, $to_path, $isCover);
				}	
			}
		}
		closedir($dh);
		return true;
	}
	/**
	 * [cutDir 剪切文件夹]
	 * @param  [type]  $fromDir [description]
	 * @param  [type]  $toDir   [description]
	 * @param  integer $isCover [description]
	 * @return [type]           [description]
	 */
	public function cutDir($fromDir,$toDir,$isCover=1){
		$fromDir = $this->formatDir($fromDir);
		$toDir   = $this->formatDir($toDir);
		if(!is_dir($fromDir) || !is_dir($toDir))	return false;
		$dh=opendir($fromDir);
		while ($file=readdir($dh)) {
			if($file!="." && $file!="..") {
				$from_path = $fromDir.$file;
				$to_path   = $toDir.$file;
				if(!is_dir($from_path)){
					if(!file_exists($to_path) || $isCover==1)	copy($from_path,$to_path);
					//else 重命名文件
				}	
				else{
					if(!is_dir($to_path))	$this->createDir($to_path);
					$this->copyDir($from_path, $to_path, $isCover);
				}	
			}
		}
		closedir($dh);
		$this->deleteDir($fromDir);
		return true;	
	}
	/**
	 * [createFile 创建文件]
	 * @param  [type] $file [description]
	 * @param  string $mode [description]
	 * @return [type]       [description]
	 */
	public function createFile($file,$mode="w+"){
		$dir = dirname($file);
		if(!is_dir($dir)){
			if(!$this->createDir($dir)) return false;
		}
		$handle = fopen($file,$mode);
		if(!$handle) return false;
		fclose($handle);
		return true;
	}
	/**
	 * [deleteFile 删除文件]
	 * @param  [type] $file [description]
	 * @return [type]       [description]
	 */
	public function deleteFile($file){
		if(!is_file($file))	return false;
		return unlink($file);
	}
	/**
	 * [renameFile 重命名文件]
	 * @param  [type] $dir     [description]
	 * @param  [type] $oldName [description]
	 * @param  [type] $newName [description]
	 * @return [type]          [description]
	 */
	public function renameFile($dir,$oldName,$newName){
		$dir = $this->formatDir($dir);
		$oldFile = $dir.$oldName;
		$newFile = $dir.$newName;
		if(!is_file($oldFile))	return false;
		return rename($oldFile,$newFile);
	}
	/**
	 * [copyFile 复制文件]
	 * @param  [type]  $fromDir  [description]
	 * @param  [type]  $toDir    [description]
	 * @param  [type]  $fileName [description]
	 * @param  integer $isCover  [description]
	 * @return [type]            [description]
	 */
	public function copyFile($fromDir,$toDir,$fileName,$isCover=1){
		$fromDir = $this->formatDir($fromDir);
		$toDir   = $this->formatDir($toDir);
		$from_path = $fromDir.$file;
		$to_path   = $toDir.$file;
		if(!is_file($from_path))	return false;
		if(!file_exists($to_path) || $isCover==1)	copy($from_path,$to_path);
		//else 重命名文件
		return true;
	}
	/**
	 * [cutFile 剪切文件]
	 * @param  [type]  $fromDir  [description]
	 * @param  [type]  $toDir    [description]
	 * @param  [type]  $fileName [description]
	 * @param  integer $isCover  [description]
	 * @return [type]            [description]
	 */
	public function cutFile($fromDir,$toDir,$fileName,$isCover=1){
		$fromDir = $this->formatDir($fromDir);
		$toDir   = $this->formatDir($toDir);
		$from_path = $fromDir.$file;
		$to_path   = $toDir.$file;
		if(!is_file($from_path))	return false;
		if(!file_exists($to_path) || $isCover==1)	copy($from_path,$to_path);
		//else 重命名文件
		unlink($from_path);
		return true;
	}
	/**
	 * [sendFile 输出文件]
	 * @param  [type]  $file        [description]
	 * @param  string  $type        [description]
	 * @param  integer $newNameFlag [description]
	 * @return [type]               [description]
	 */
	public function sendFile($file,$type="image",$newNameFlag=0){
		if(!file_exists($file)){
			header("HTTP/1.1 404 Not Found");
		}else{
			$file_size = filesize($file);
			$file_name = basename($file);
			switch ($type) {
				case 'image':
					$image_type = exif_imagetype($file);
					$mime_type  = image_type_to_mime_type($image_type);
					header('content-type:'.$mime_type);
					header('content-length:'.$file_size);
					break;
				default:
					$file_name = $newNameFlag?"download".time():$file_name;
					header('content-type: application/octet-tream');
					header('Accept-Range: bytes');
					header('Content-Transfer-Encoding:binary');
					header('Accept-Length: '.$file_size);
					header('content-length: '.$file_size);
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Disposition: attachment;filename='.$file_name);
					break;
			}
			$fp = fopen($file,"r");   //   打开文件
			$buffer = 4*1024;
			$currentSize = 0;
			while (!feof($fp) && $currentSize<$file_size) {
				echo fread($fp,$buffer);
				$currentSize += $buffer;
			}
			fclose($fp);
		}
	}
}