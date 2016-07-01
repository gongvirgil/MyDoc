<?php
namespace Home\Controller;
use Think\Controller;

class CatalogController extends BaseController {
	public function index(){
		$this->item_id = I('item_id/d');
		$cat_id = I('cat_id/d');
		if(!empty($cat_id))	$this->catalog = D('Catalog')->getCatalog($cat_id);
		$this->display();
	}
	public function save(){
		$name    = I("name");
		$order   = I("order/d") ? I("order/d") : 99 ;
		$cat_id  = I("cat_id/d")? I("cat_id/d") : 0;
		$item_id =  I("item_id/d");
		if($cat_id>0){
			$saveMap['name']    = $name;
			$saveMap['order']   = $order;
			$result = D('Catalog')->modify($cat_id,$saveMap);
		}else{
			$result = $cat_id = D('Catalog')->create($name,$order,$item_id);
		}
		if(!$result){
			$data['info'] = "保存失败";
			$data['status'] = 0;
			$this->ajaxReturn($data,'JSON');
		}	
		$data['page_id'] = $page_id;
		$data['info'] = "保存成功";
		$data['status'] = 1;
		$this->ajaxReturn($data,'JSON');
	}
	public function catList(){
		$item_id = I('item_id/d');
		$catalogs = D('Catalog')->getCatalogs($item_id);
		if(!$catalogs){
			$data['info'] = "获取失败";
			$data['status'] = 0;
			$this->ajaxReturn($data,'JSON');
		}
		$data['data'] = $catalogs;
		$data['info'] = "获取成功";
		$data['status'] = 1;
		$this->ajaxReturn($data,'JSON');
	}
}