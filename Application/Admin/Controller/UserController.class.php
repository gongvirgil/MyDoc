<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends \Auth\Controller\AuthController {
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
}