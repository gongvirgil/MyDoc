<?php
namespace Article\Model;
use Think\Model;

class ArticleModel extends Model {
	/**
	 * [articleInfo description]
	 * @param  [type] $id     [description]
	 * @param  string $fields [description]
	 * @return [type]         [description]
	 */
	public function articleInfo($id,$fields="*"){
		if(empty($id))	return false;
		$map['id'] = $id;
		$articleInfo = $this->field($fields)->where($map)->find();
		if(empty($articleInfo))	return false;
		return $articleInfo;
	}
	/**
	 * [articleList description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function articleList($param){
		if(empty($param)) return false;

		$p       = empty($param['p'])?1:$param['p'];
		$row     = empty($param['row'])?10:$param['row'];
		$orderBy = empty($param['orderBy'])?'id desc':$param['orderBy'];

		$map['owner_uid'] = $param['owner_uid'];
		if(!empty($param['searchStr'])) $map['_string'] = "title like '%$searchStr%'";
		$count = $this->where($map)->count();
		$totalPage = ceil($count/$row);
		$first = ($p-1)*$row;
		$ret['recordsFiltered'] = $count;
		$ret['recordsTotal'] = $totalPage;
		$ret['data'] = $this->field($fields)->where($map)->limit($first.','.$row)->order($orderBy)->select();
		return $ret;
	}
	public function modifyArticle(){
		
	}
}