<?php
namespace File\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class UploadController extends AuthController {
	protected $path = "";
	public function _initialize(){
		parent::_initialize();
		$this->path = D('Base')->getUploadPath($this->login_user['id']);
	}
    public function image(){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize       = 8388608 ;// 设置附件上传大小
			$upload->allowExts     = array('jpg');// 设置附件上传类型
			$upload->rootPath      = $this->path;
			$upload->savePath      =  "images/";// 设置附件上传目录
			$upload->saveName      = "time";
			$upload->uploadReplace = true;
			$info = $upload->upload();
			if(!$info) {// 上传错误提示错误信息
				$data['status'] = 0;
				$data['info'] = @$upload->getError();
				$this->ajaxReturn($data,'JSON');
			}else{// 上传成功
				$data['status'] = 1;
				$data['info'] = "上传成功";

				$data['file'] = $this->path.$info['file']['savepath'].$info['file']['savename'];
				$hash = sha1_file($data['file']);
				$url = U('File/Download/image/h/'.$hash);
				D('Image')->addImage($this->login_user['id'],$hash,$url,$data['file']);
				$this->ajaxReturn($data,'JSON');
			}
    }
    public function audio(){
    	var_dump(__file__);
		$this->display(C('Template_path').'audio.html');
    }
}