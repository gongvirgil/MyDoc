<?php
namespace Admin\Model;
use Think\Model;

class DataModel {
	/**
	 * [characterList description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function characterList($param){
		if(empty($param)) return false;
		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id asc':$param['orderBy'];

		if(!empty($param['initial'])) $map['initial'] = $param['initial'];
		if(!empty($param['searchStr'])) $map['_string'] = "pinyin like '%$searchStr%'";
		$model = M('chinese_character');
		$count = $model->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $model->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
}