<?php
namespace Admin\Model;
use Think\Model;

class PageNodeModel extends Model {
	public function pageNodeList($pid=0){
		$nodes = $this->getChildrenNodes($pid);
		if(!empty($nodes)){
			foreach ($nodes as $k => $v) {
				$nodes[$k]['children'] = $this->pageNodeList($v['id']);
			}
		}
		return $nodes;
	}
	public function getChildrenNodes($pid=0){
		$map['pid']    = $pid;
		$map['status'] = 1;
		$data = $this->where($map)->select();
		return $data;
	}
	public function modifyPageNode($data){
		$map['name']     = $data['name'];
		$map['rulename'] = $data['rulename'];
		$map['level']    = $data['level'];
		$map['pid']      = $data['pid'];
		$map['status']   = $data['status'];
		$map['url']      = $data['url'];
		if($data['node_id']>0){
			$where['id'] = $data['node_id'];
			$this->where($where)->save($map);
		}else{
			$data['node_id'] = $this->add($map);
		}
		return $data['node_id'];
	}
}