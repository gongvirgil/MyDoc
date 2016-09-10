<?php
namespace Doc\Controller;
use Think\Controller;

class ProjectController extends BaseController {
	public function index(){
		$this->display(C('Template_path').'project.html');
	}
}