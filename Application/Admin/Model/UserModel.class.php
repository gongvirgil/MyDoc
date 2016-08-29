<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model {
	/**
	 * [userInfo description]
	 * @param  [type] $info [description]
	 * @return [type]           [description]
	 */
	public function userInfo($info,$type='email'){
		if(empty($info))	return false;
		$map[$type] = $info;
		$userInfo = $this->where($map)->find();
		if(empty($userInfo))	return false;
		return $userInfo;
	}
	/**
	 * [userList description]
	 * @param  integer $p         [description]
	 * @param  integer $row       [description]
	 * @param  string  $searchStr [description]
	 * @param  string  $orderBy   [description]
	 * @param  string  $fields    [description]
	 * @return [type]             [description]
	 */
	public function userList($p=1,$row=10,$searchStr="",$orderBy="id desc",$fields="*"){
		if(!empty($searchStr)) $map['_string'] = "email like '%$searchStr%' or username like '%$searchStr%' or realname like '%$searchStr%'";
		$count = $this->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $this->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
}