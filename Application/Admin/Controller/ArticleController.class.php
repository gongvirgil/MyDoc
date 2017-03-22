<?php
namespace Admin\Controller;
use Think\Controller;
use Auth\Controller\AuthController;
class ArticleController extends AuthController {
    public function index(){
        $this->display(C('Template_path').'articleList.html');
    }
	public function dataList(){
		$start     = I('start');
		$length    = I('length');
		$search    = I('search');
		$columns   = I('columns');
		$order     = I('order');
		$owner_uid = I('owner_uid');
		$owner_uid = empty($owner_uid)?$this->login_user['id']:$owner_uid;

		$p = ceil($start/$length)+1;
		$row = $length;
		$searchStr = $search['value'];
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'owner_uid'   => $owner_uid,
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