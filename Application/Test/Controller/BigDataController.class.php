<?php
namespace Test\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class BigDataController extends AuthController {
	public function index(){
		$this->display(C('Template_path').'bigDataList.html');
	}
	public function dataList(){
		$table = "pbx_00000005.e_sip_callcenter_history";
		$start     = I('start');
		$length    = I('length');
		$search    = I('search');
		$columns   = I('columns');
		$order     = I('order');
		$owner_uid   = empty($owner_uid)?$this->login_user['id']:$owner_uid;

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
		);
		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id desc':$param['orderBy'];

		$count = M()->table($table)->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = M()->table($table)->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		$this->ajaxReturn($ret,'JSON');
	}
}