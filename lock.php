<?php
/**
 * FileLock
 * 文件锁实现原子操作
 */
class FileLock {
	private $handle;		//锁文件指针
	private $path;			//锁文件目录
	private $file;			//锁文件
	/**
	 * [__construct 初始化]
	 */
	public function __construct($lock_name="default"){
		$this->path = "/home/cxl/MyDoc/Private/LockFiles/";
		if(!is_dir($this->path))	$this->createDir($this->path);
		$this->file = $this->path.$lock_name.".lock";
		$this->handle = fopen($this->file, 'w+');
	}
	/**
	 * [createDir 创建文件根目录]
	 * @param  [type]  $dir  [description]
	 * @param  integer $mode [description]
	 * @return [type]        [description]
	 */
	private function createDir($dir, $mode = 0777){
	    if (is_dir($dir) || (@mkdir($dir, $mode) && @chmod($dir, $mode)) )
	        return true;
	    if (!$this->createDir(dirname($dir), $mode))
	        return false;
	    return (@mkdir($dir, $mode) && @chmod($dir, $mode));
	}
	/**
	 * [setLock 上文件锁]
	 * @return [type]        [description]
	 */
	public function setLock(){
		return flock($this->handle, LOCK_EX + LOCK_NB);
	}
	/**
	 * [unLock 去文件锁]
	 * @return [type]         [description]
	 */
	public function unLock(){
		return flock($this->handle,LOCK_UN);
	}
	/**
	 * [destoryLock 销毁锁文件]
	 * @return [type] [description]
	 */
	public function destoryLock(){
		return unlink($this->file);
	}
}

/**
 * 
 * 测试用例
 * 
$test = new FileLock('test');//获取一个名为test的文件锁
$result =  $test->setLock();//上锁，失败说明另有进程上test锁
var_dump($result);
if($result===true) sleep(20);
$test->unLock();
exit('end');
 */