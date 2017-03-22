<?php
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model {
	/**
	 * [categoryInfo description]
	 * @param  [type] $id     [description]
	 * @param  string $fields [description]
	 * @return [type]         [description]
	 */
	public function categoryInfo($id,$fields="*"){
		if(empty($id))	return false;
		$map['id'] = $id;
		$categoryInfo = $this->field($fields)->where($map)->find();
		if(empty($categoryInfo))	return false;
		return $categoryInfo;
	}
	/**
	 * [articleList description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function categoryList($param){
		if(empty($param)) return false;
		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id desc':$param['orderBy'];

		$map['owner_uid'] = $param['owner_uid'];
		if(!empty($param['searchStr'])) $map['_string'] = "category_name like '%$searchStr%'";
		$count = $this->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $this->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
	/**
	 * [modifyCategory description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function modifyCategory($data){
		$map['category_name'] = $data['category_name'];
		$map['keywords']      = $data['keywords'];
		$map['description']   = $data['description'];
		$map['father_id']     = $data['father_id'];
		$map['owner_uid']     = $data['owner_uid'];

		if($data['id']>0){
			$map['update_time'] = time();
			$where['id'] = $data['id'];
			$res = $this->where($where)->save($map);
		}else{
			$map['create_time'] = time();
			$res = $data['id'] = $this->add($map);
		}
		if(!$res) return false;
		return $data;
	}
}