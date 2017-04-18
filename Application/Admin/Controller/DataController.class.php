<?php
namespace Admin\Controller;
use Think\Controller;
class DataController extends \Auth\Controller\AuthController{
	public function characterList(){
		$start     = I('start');
		$length    = I('length');	
		$columns   = I('columns');
		$order     = I('order');
		$searchStr = I('searchStr');
		$initial   = I('initial');

		$p = ceil($start/$length)+1;
		$row = $length;
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'p'         => $p,
			'row'       => $row,
			'orderBy'   => $orderBy,
			'fields'    => "*",
			'searchStr' => $searchStr,
			'initial'   => $initial,
		);
		$data = D('data')->characterList($param);
		$this->ajaxReturn($data,'JSON');
	}
	public function exportCharacter(){
		$columns   = I('columns');
		$order     = I('order');
		$searchStr = I('searchStr');
		$initial   = I('initial');

		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'orderBy'   => $orderBy,
			'fields'    => "*",
			'searchStr' => $searchStr,
			'initial'   => $initial,
		);

		$Cli = new \Lib\Virgil\Cli();
		$filename = ACTION_NAME.date('Y-m-d-H-i-s').".csv";
		$Cli->createPro()->createFile($filename)->createCmd(CONTROLLER_NAME,ACTION_NAME,$param)->run();
		$ret['proFn'] = $Cli->proFn;
		$ret['resFn'] = $Cli->resFn;
		$this->ajaxReturn($param,'JSON');
	}
	public function httpContentTypeList(){
		$start     = I('start');
		$length    = I('length');	
		$columns   = I('columns');
		$order     = I('order');
		$searchStr = I('searchStr');

		$p = ceil($start/$length)+1;
		$row = $length;
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'p'         => $p,
			'row'       => $row,
			'orderBy'   => $orderBy,
			'fields'    => "*",
			'searchStr' => $searchStr,
		);
		$data = D('data')->httpContentTypeList($param);
		$this->ajaxReturn($data,'JSON');
	}
}