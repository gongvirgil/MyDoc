<?php
namespace Doc\Model;
use Think\Model;
use Doc\Model\BaseModel;

class ItemModel extends BaseModel {
	/**
	 * [create description]
	 * @param  [type] $name        [description]
	 * @param  string $description [description]
	 * @param  string $password    [description]
	 * @return [type]              [description]
	 */
	public function create($uid,$username,$name,$description="",$password=""){
		if(empty($name))	return false;
		$map['name']        = $name;
		$map['description'] = $description;
		$map['password']    = $password;
		$map['create_time'] = time();
		$map['uid']         = $uid;
		$map['username']    = $username;
		$result = $this->add($map);
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
		$map['id'] = $id;
		if(!empty($saveMap['name']))		$save['name']        = $saveMap['name'];
		if(!empty($saveMap['description']))	$save['description'] = $saveMap['description'];
		if(!empty($saveMap['password']))	$save['password']    = $saveMap['password'];
		$save['update_time'] = time();
		$result = $this->where($map)->save($save);
		if(!$result)	return false;
		return true;
	}
	/**
	 * [updateTime description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function updateTime($id){
		if(empty($id))	return false;
		$map['id'] = $id;
		$save['update_time'] = time();
		$result = $this->where($map)->save($save);
		if(!$result)	return false;
		return true;	
	}
	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id){
		if(empty($id))	return false;
		$map['id'] = $id;
		$result = $this->where($map)->delete();
		if(!$result)	return false;
		return true;
	}
	/**
	 * [getListByUid description]
	 * @param  [type] $uid [description]
	 * @return [type]      [description]
	 */
	public function getListByUid($uid){
		if(empty($uid))	return false;
		$map['uid'] = $uid;
		$list = $this->where($uid)->select();
		if(!$list)	return false;
		return $list;
	}
	/**
	 * [getItem description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getItem($id){
		if(empty($id))	return false;
		$map['id'] = $id;
		$info = $this->where($map)->find();
		if(!$info)	return false;
		return $info;
	}
}