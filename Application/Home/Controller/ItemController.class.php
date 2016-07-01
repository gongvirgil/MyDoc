<?php
namespace Home\Controller;
use Think\Controller;

class ItemController extends BaseController {
	public function index(){
		$this->items = D('Item')->getListByUid($this->login_user['id']);
		$this->display();
	}
	public function add(){
		if(IS_POST){
			$name        = I('name');
			$description = I('description');
			$password    = I('password');
			if(empty($name))	$this->error("项目名不能为空");
			$uid      = $this->login_user['id'];
			$username = $this->login_user['username'];
			$result = D('Item')->create($uid,$username,$name,$description,$password);
			if(!$result)	$this->error("添加失败，请重新添加");
			$this->success("添加成功",U('Home/Item/index'));
			die();
		}
		$this->display();
	}
	public function show(){
		$id      = I('id');
		$page_id = I('page_id');
		$keyword = I("keyword");
		$this->item = D('Item')->getItem($id);
		$this->pages = D('Page')->getPages($id,0,$keyword);
		$catalogs = D('Catalog')->getCatalogs($id);
		foreach ($catalogs as $k => $v) {
			$catalogs[$k]['pages'] = D('Page')->getPages($id,$v['id'],$keyword);
		}
		$this->catalogs = $catalogs;
		$this->page_id = $page_id;
		$this->isItemCreator = 1;
		$this->isItemMember  = 1;
		$this->display();
	}
}