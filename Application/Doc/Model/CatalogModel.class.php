<?php
namespace Doc\Model;
use Think\Model;
use Doc\Model\BaseModel;

class CatalogModel extends BaseModel {
	/**
	 * [create description]
	 * @param  [type]  $name    [description]
	 * @param  integer $order   [description]
	 * @param  [type]  $item_id [description]
	 * @return [type]           [description]
	 */
	public function create($name,$order=0,$item_id){
		if(empty($name) || empty($item_id))	return false;
		$map['name']        = $name;
		$map['order']       = $order;
		$map['item_id']     = $item_id;
		$map['create_time'] = time();
		$cat_id = $this->add($map);
		if(!$cat_id)	return false;

		D('Item')->updateTime($item_id);
		return $cat_id;
	}
	/**
	 * [modify description]
	 * @param  [type] $id      [description]
	 * @param  array  $saveMap [description]
	 * @return [type]          [description]
	 */
	public function modify($id,array $saveMap){
		if(empty($id) || empty($saveMap) || !is_array($saveMap))	return false;
		$map['id'] = $id;
		if(!empty($saveMap['name']))	$save['name']   = $saveMap['name'];
		if(!empty($saveMap['order']))	$save['order'] = $saveMap['order'];
		$save['update_time'] = time();
		$result = $this->where($map)->save($save);
		if(!$result)	return false;

		D('Item')->updateTime($item_id);
		return true;
	}
	/**
	 * [getCatalog description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getCatalog($id){
		if(empty($id))	return false;
		$map['id'] = $id;
		$info = $this->where($map)->find();
		if(!$info)	return false;
		return $info;
	}
	/**
	 * [getCatalogs description]
	 * @param  [type] $item_id [description]
	 * @return [type]          [description]
	 */
	public function getCatalogs($item_id){
		if(empty($item_id))	return false;
		$map['item_id'] = $item_id;
		$catalogs = $this->where($map)->select();
		if(!$catalogs)	return false;
		return $catalogs;
	}
}