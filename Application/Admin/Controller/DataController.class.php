<?php
namespace Admin\Controller;
use Think\Controller;
class DataController extends \Auth\Controller\AuthController{
	public function characterList(){
		$start   = I('start');
		$length  = I('length');
		$search  = I('search');
		$columns = I('columns');
		$order   = I('order');
		$initial = I('initial');

		$p = ceil($start/$length)+1;
		$row = $length;
		$searchStr = $search['value'];
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'p'         => $p,
			'row'       => $row,
			'searchStr' => $searchStr,
			'orderBy'   => $orderBy,
			'fields'    => "*",
			'initial'   => $initial,
		);
		$data = D('data')->characterList($param);
		$this->ajaxReturn($data,'JSON');
	}
}