<?php
namespace Doc\Controller;
use Think\Controller;

class PageController extends BaseController {
	public function index(){
        $page_id = I("page_id/d");
        $item_id = $this->item_id = I("item_id/d");
        $this->page = D('Page')->getPage($page_id);
        $this->display();
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		$item_id = I("item_id/d");
		$cat_id  = I("cat_id/d")? I("cat_id/d") : 0;
		$page_id = I("page_id/d") ? I("page_id/d") : 0 ;
		$title   = I("title") ?I("title") : '默认页面';
		$content = I("content");
		$order   = I("order/d")? I("order/d") : 99;
		if(empty($item_id))	$this->error('找不到该项目');
		if($page_id > 0){
			$saveMap['title']   = $title;
			$saveMap['content'] = $content;
			$saveMap['order']   = $order;
			$saveMap['cat_id']  = $cat_id;
			$result = D('Page')->modify($page_id,$saveMap);
		}else{
			$author_uid      = $this->login_user['id'] ;
			$author_username = $this->login_user['username'];
			$result = $page_id = D('Page')->create($title,$content,$order,$item_id,$cat_id,$author_uid,$author_username);
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
	public function show(){
		$id = I('id/d');
		import("Vendor.Virgil.Parsedown");
		$page = D('Page')->getPage($id);
        $Parsedown = new \Parsedown();
        $page['content'] = $Parsedown->text(htmlspecialchars_decode($page['content']));
		$this->page = $page;
		$this->display();
	}
}