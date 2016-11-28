<?php
namespace Article\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class IndexController extends AuthController {
    public function index(){
        $this->display(C('Template_path').'articleList.html');
    }
	public function dataList(){
		$start   = I('start');
		$length  = I('length');
		$search  = I('search');
		$columns = I('columns');
		$order   = I('order');
		$own_uid = I('own_uid');
		$own_uid = empty($own_uid)?$this->login_user['id']:$own_uid;

		$p = ceil($start/$length)+1;
		$row = $length;
		$searchStr = $search['value'];
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'own_uid'   => $own_uid,
			'p'         => $p,
			'row'       => $row,
			'searchStr' => $searchStr,
			'orderBy'   => $orderBy,
			'fields'    => "*",
		);
		$data = D('Article')->articleList($param);
		$this->ajaxReturn($data,'JSON');
	}
}