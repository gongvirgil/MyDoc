<?php
namespace Doc\Model;
use Think\Model;
use Doc\Model\BaseModel;

class PageModel extends BaseModel {
	/**
	 * [getPage description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getPage($id){
		if(empty($id))	return false;
		$map['id'] = $id;
		$info = $this->where($map)->find();
		if(!$info)	return false;
		return $info;
	}
	/**
	 * [create description]
	 * @param  [type] $title           [description]
	 * @param  [type] $content         [description]
	 * @param  [type] $order           [description]
	 * @param  [type] $item_id         [description]
	 * @param  [type] $cat_id          [description]
	 * @param  [type] $author_uid      [description]
	 * @param  [type] $author_username [description]
	 * @return [type]                  [description]
	 */
	public function create($title,$content,$order,$item_id,$cat_id,$author_uid,$author_username){
		$map['title']           = $title;
		$map['content']         = $content;
		$map['order']           = $order;
		$map['item_id']         = $item_id;
		$map['cat_id']          = $cat_id;
		$map['author_uid']      = $author_uid;
		$map['author_username'] = $author_username;
		$map['create_time']     = time();
		$page_id = $this->add($map);
		if(!$page_id)	return false;

		D('Item')->updateTime($item_id);
		return $page_id;
	}
	/**
	 * [saveHistory description]
	 * @param  [type] $page_id [description]
	 * @return [type]          [description]
	 */
	public function saveHistory($page_id){
		if(empty($page_id))	return false;
		$pageInfo = $this->getPage($page_id);

		$map['page_id']         = $pageInfo['id'];
		$map['item_id']         = $pageInfo['item_id'];
		$map['title']           = $pageInfo['title'];
		$map['content']         = $pageInfo['content'];
		$map['order']           = $pageInfo['order'];
		$map['create_time']     = $pageInfo['create_time'];
		$map['author_uid']      = $pageInfo['author_uid'];
		$map['author_username'] = $pageInfo['author_username'];

		$result = M('PageHistory')->add($pageInfo);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [modify description]
	 * @param  [type] $id      [description]
	 * @param  array  $saveMap [description]
	 * @return [type]          [description]
	 */
	public function modify($id,array $saveMap){
		if(empty($id) || empty($saveMap) || !is_array($saveMap))	return false;
		$this->saveHistory($id);

		$map['id'] = $id;
		if(!empty($saveMap['title']))	$save['title']   = $saveMap['title'];
		if(!empty($saveMap['content']))	$save['content'] = $saveMap['content'];
		if(!empty($saveMap['order']))	$save['order']   = $saveMap['order'];
		if(!empty($saveMap['cat_id']))	$save['cat_id']  = $saveMap['cat_id'];
		$save['update_time'] = time();
		$result = $this->where($map)->save($save);
		if(!$result)	return false;

		D('Item')->updateTime($item_id);
		return true;
	}
	/**
	 * [getPages description]
	 * @param  [type]  $item_id [description]
	 * @param  integer $cat_id  [description]
	 * @param  string  $keyword [description]
	 * @return [type]           [description]
	 */
	public function getPages($item_id,$cat_id=null,$keyword=""){
		$map['item_id'] = $item_id;
		if($cat_id!==null)	$map['cat_id']  = $cat_id;
		$map['_string'] = "title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		$pages = D('Page')->where($map)->select();
		if(!$pages)	return false;
		return $pages;
	}
}