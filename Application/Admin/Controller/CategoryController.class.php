<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends \Auth\Controller\AuthController {
	public function dataList(){
		$start     = I('start');
		$length    = I('length');
		$search    = I('search');
		$columns   = I('columns');
		$order     = I('order');
		$owner_uid = I('owner_uid');
		$owner_uid   = empty($owner_uid)?$this->login_user['id']:$owner_uid;

		$p = ceil($start/$length)+1;
		$row = $length;
		$searchStr = $search['value'];
		if(!empty($order) && is_array($order)) $orderBy = $columns[$order[0]['column']]['data']." ".$order[0]['dir'];
		$param = array(
			'owner_uid' => $owner_uid,
			'p'         => $p,
			'row'       => $row,
			'searchStr' => $searchStr,
			'orderBy'   => $orderBy,
			'fields'    => "*",
		);
		$data = D('Category')->categoryList($param);
		$this->ajaxReturn($data,'JSON');
	}
	public function modifyCategory(){
		$id            = I('id');
		$category_name = I('category_name');
		$keywords      = I('keywords');
		$description   = I('description');
		$father_id     = I('father_id');
		$owner_uid       = empty($owner_uid)?$this->login_user['id']:$owner_uid;

		$data = array(
			'id'            => $id,
			'owner_uid'     => $owner_uid,
			'category_name' => $category_name,
			'keywords'      => $keywords,
			'description'   => $description,
			'father_id'     => $father_id,
		);
		$result = D('Category')->modifyCategory($data);
		if($result===false) $this->fail('失败',U('Article/Category/index'));
		$this->success("成功",U('Article/Category/index'));
	}
	public function categoryInfo(){
		$id = I('category_id');
		$data = D('Category')->categoryInfo($id);
		if(empty($data)){
			$ret['status'] = 1;
			$ret['info'] = "获取失败";
		}else{
			$ret['status'] = 0;
			$ret['info'] = "获取成功";
			$ret['data'] = $data;
		}
		$this->ajaxReturn($ret,'JSON');
	}
}