<?php
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
	    if (is_dir($dir) || (@mkdir($dir, $mode) && @chmod($dir, $mode)) )
	        return true;
	    if (!createDir(dirname($dir), $mode))
	        return false;
	    return (@mkdir($dir, $mode) && @chmod($dir, $mode));
	}
	/**
	 * [deleteDir 删除文件夹]
	 * @param  [type] $dir [description]
	 * @return [type]      [description]
	 */
	public function deleteDir($dir) {
		$dir = $this->formatDir($dir);
		$dh=opendir($dir);
		while ($file=readdir($dh)) {
			if($file!="." && $file!="..") {
				$fullpath=$dir.$file;
				if(!is_dir($fullpath))	unlink($fullpath);
				else	deleteDir($fullpath);
			}
		}
		closedir($dh);
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
		if(!is_dir($dir))	$this->createDir($dir);
		$handle = fopen($file,$mode);
		fclose($handle);
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
}