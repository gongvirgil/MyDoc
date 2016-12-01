<?php
namespace Admin\Model;
use Think\Model;

class AuthGroupModel extends Model {
	/**
	 * [authGroupInfo description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function authGroupInfo($id){
		if(empty($info))	return false;
		$map['id'] = $id;
		$info = $this->where($map)->find();
		if(empty($info))	return false;
		return $info;
	}
	/**
	 * [authGroupList description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function authGroupList($param){
		if(empty($param)) return false;

		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id desc':$param['orderBy'];

		if(!empty($param['searchStr'])) $map['_string'] = "title like '%$searchStr%'";
		$count = $this->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $this->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
	/**
	 * [modifyAuthGroup description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function modifyAuthGroup($data){
		$map['title']  = $data['title'];
		$map['status'] = $data['status'];
		$map['rules']  = $data['rules'];

		if($data['id']>0){
			//$map['update_time'] = time();
			$where['id'] = $data['id'];
			$res = $this->where($where)->save($map);
		}else{
			//$map['create_time'] = time();
			$res = $data['id'] = $this->add($map);
		}
		if(!$res) return false;
		return $data;
	}
}