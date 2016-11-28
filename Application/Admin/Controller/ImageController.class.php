<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class ImageController extends Controller {
	public function index(){
		$this->display(C('Template_path').'imageList.html');
	}
}