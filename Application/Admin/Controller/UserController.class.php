<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends AuthController {
	public function index(){
		$this->display(C('Template_path').'userList.html');
	}
	public function dataList(){
		$start   = I('start');
		$length  = I('length');
		$search  = I('search');
		$columns = I('columns');
		$order   = I('order');

		$p = ceil($start/$length)+1;
		$row = $length;
		$searchStr = $search['value'];
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		
		$data = D('User')->userList($p,$row,$searchStr,$orderBy,"*");
		$this->ajaxReturn($data,'JSON');
	}
	public function profile(){
		$userId = I('userId');
		if(empty($userId)) $userId = $this->login_user['id'];
		$this->userInfo = D('User')->userInfo($userId,'id');
		$this->display(C('Template_path').'userProfile.html');
	}
}