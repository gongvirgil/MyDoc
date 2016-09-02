<?php
namespace File\Model;
use Think\Model;

class ImageModel extends Model {
	public function addImage($owner_uid=0,$hash,$url,$path,$title="",$extension="",$is_remote=0){
		$map['hash']        = $hash;
		$map['path']        = $path;
		$map['url']         = $url;
		$map['title']       = $title;
		$map['extension']   = $extension;
		$map['is_remote']   = $is_remote;
		$map['owner_uid']   = $owner_uid;
		$map['create_time'] = time();
		return $this->add($map);
	}

	public function getListByOwner($owner_uid){
		if(empty($owner_uid))	return false;
		$map['owner_uid'] = $owner_uid;
		$list = $this->where($map)->select();
		if(!$list)	return false;
		return $list;
	}
}