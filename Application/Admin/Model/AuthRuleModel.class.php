<?php
namespace Admin\Model;
use Think\Model;

class AuthRuleModel extends Model {
	/**
	 * [authRuleInfo description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function authRuleInfo($id){
		if(empty($info))	return false;
		$map['id'] = $id;
		$info = $this->where($map)->find();
		if(empty($info))	return false;
		return $info;
	}
	/**
	 * [authRuleList description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function authRuleList($param){
		if(empty($param)) return false;

		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id desc':$param['orderBy'];

		if(!empty($param['searchStr'])) $map['_string'] = "title like '%$searchStr%' OR name like '%$searchStr%'";
		$count = $this->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $this->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
	/**
	 * [modifyAuthRule description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function modifyAuthRule($data){
		$map['name']      = $data['name'];
		$map['title']     = $data['title'];
		$map['type']      = $data['type'];
		$map['status']    = $data['status'];
		$map['condition'] = $data['condition'];

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