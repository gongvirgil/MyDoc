<?php
namespace Api\Controller;
use Think\Controller;

class AreaController extends Controller {
	/**
	 * [continent 洲]
	 * @return [type] [description]
	 */
    public function continent(){
        $name = I('name');
        $map['level'] = -1;
        if(!empty($name)) $map['name'] = $name;
        $data = M('area')->where($map)->order('id asc')->select();
        $this->ajaxReturn($data,'JSON');
    }
    /**
     * [country 国家]
     * @return [type] [description]
     */
    public function country(){
		$name           = I('name');
		$continent_name = I('continent_name');
        $map['level'] = 0;
        if(!empty($name)) $map['name'] = $name;
        if(!empty($continent_name)){
        	$continent_map['level'] = -1;
        	$continent_map['name'] = $continent_name;
        	$continent_id = M('area')->where($continent_map)->getField('id');
        	if(!empty($continent_id)) $map['pid'] = $continent_id;
        }
        $data = M('area')->where($map)->order('id asc')->select();
        $this->ajaxReturn($data,'JSON');
    }
    /**
     * [province 省]
     * @return [type] [description]
     */
    public function province(){
		$name           = I('name');
		$continent_name = I('continent_name');
		$country_name   = I('country_name');
        $map['level'] = 1;
        if(!empty($name)) $map['name'] = $name;

        if(!empty($country_name)){
        	$country_map['level'] = 0;
        	$country_map['name'] = $country_name;
        	$country_id = M('area')->where($country_map)->getField('id');
        	if(!empty($country_id)){
        		$map['pid'] = $country_id;
        	}
        }elseif(!empty($continent_name)){
        	$continent_map['level'] = -1;
        	$continent_map['name'] = $continent_name;
        	$continent_id = M('area')->where($continent_map)->getField('id');
        	if(!empty($continent_id)){
	        	$country_map['pid'] = $continent_id;
        		$country_ids = M('area')->where($country_map)->getField('GROUP_CONCAT(id)');
        		if(!empty($country_ids)){
        			$map['pid'] = array('in',$country_ids);
        		}
        	}
        }
        $data = M('area')->where($map)->order('id asc')->select();
        $this->ajaxReturn($data,'JSON');	
    }
    /**
     * [city 市]
     * @return [type] [description]
     */
    public function city(){
		$name           = I('name');
		$continent_name = I('continent_name');
		$country_name   = I('country_name');
		$province_name  = I('province_name');
        $map['level'] = 2;
        if(!empty($name)) $map['name'] = $name;
        if(!empty($province_name)){
        	$province_map['level'] = 1;
        	$province_map['name'] = $province_name;
        	$province_id = M('area')->where($province_map)->getField('id');
        	if(!empty($province_id)){
        		$map['pid'] = $province_id;
        	}
        }elseif(!empty($country_name)){
        	$country_map['level'] = 0;
        	$country_map['name'] = $country_name;
        	$country_id = M('area')->where($country_map)->getField('id');
        	if(!empty($country_id)){
        		$provice_map['pid'] = $country_id;
        		$province_ids = M('area')->where($provice_map)->getField('GROUP_CONCAT(id)');
        		if(!empty($province_ids)){
        			$map['pid'] = array('in',$province_ids);
        		}
        	}
        }elseif(!empty($continent_name)){
        	$continent_map['level'] = -1;
        	$continent_map['name'] = $continent_name;
        	$continent_id = M('area')->where($map)->getField('id');
        	if(!empty($continent_id)){
        		$country_map['pid'] = $continent_id;
        		$country_ids = M('area')->where($country_map)->getField('GROUP_CONCAT(id)');
        		if(!empty($country_ids)){
        			$provice_map['pid'] = array('in',$country_ids);
	        		$province_ids = M('area')->where($provice_map)->getField('GROUP_CONCAT(id)');
	        		if(!empty($province_ids)){
	        			$map['pid'] = array('in',$province_ids);
	        		}	
        		}
        	}
        }
        $data = M('area')->where($map)->order('id asc')->select();
        $this->ajaxReturn($data,'JSON');	
    }
    /**
     * [county 县]
     * @return [type] [description]
     */
    public function county(){
		$name           = I('name');
		$continent_name = I('continent_name');
		$country_name   = I('country_name');
		$province_name  = I('province_name');
		$city_name      = I('city_name');
        $map['level'] = 3;
        if(!empty($name)) $map['name'] = $name;
        if(!empty($city_name)){
        	$city_map['level'] = 2;
        	$city_map['name'] = $city_name;
        	$city_id = M('area')->where($city_map)->getField('id');
        	if(!empty($city_id)){
        		$map['pid'] = $city_id;
        	}
        }elseif(!empty($province_name)){
        	$province_map['level'] = 1;
        	$province_map['name'] = $province_name;
        	$province_id = M('area')->where($province_map)->getField('id');
        	if(!empty($province_id)){
        		$city_map['pid'] = $province_id;
	        	$city_ids = M('area')->where($city_map)->getField('GROUP_CONCAT(id)');
	        	if(!empty($city_ids)){
	        		$map['pid'] = array('in',$city_ids);
	        	}
        	}
        }elseif(!empty($country_name)){
        	$country_map['level'] = 0;
        	$country_map['name'] = $country_name;
        	$country_id = M('area')->where($country_map)->getField('id');
        	if(!empty($country_id)){
        		$provice_map['pid'] = $country_id;
        		$province_ids = M('area')->where($provice_map)->getField('GROUP_CONCAT(id)');
        		if(!empty($province_ids)){
        			$city_map['pid'] = array('in',$province_ids);
		        	$city_ids = M('area')->where($city_map)->getField('GROUP_CONCAT(id)');
		        	if(!empty($city_ids)){
		        		$map['pid'] = array('in',$city_ids);
		        	}
        		}
        	}
        }elseif(!empty($continent_name)){
        	$continent_map['level'] = -1;
        	$continent_map['name'] = $continent_name;
        	$continent_id = M('area')->where($map)->getField('id');
        	if(!empty($continent_id)){
        		$country_map['pid'] = $continent_id;
        		$country_ids = M('area')->where($country_map)->getField('GROUP_CONCAT(id)');
        		if(!empty($country_ids)){
        			$provice_map['pid'] = array('in',$country_ids);
	        		$province_ids = M('area')->where($provice_map)->getField('GROUP_CONCAT(id)');
	        		if(!empty($province_ids)){
	        			$city_map['pid'] = array('in',$province_ids);
			        	$city_ids = M('area')->where($city_map)->getField('GROUP_CONCAT(id)');
			        	if(!empty($city_ids)){
			        		$map['pid'] = array('in',$city_ids);
			        	}
	        		}	
        		}
        	}
        }
        $data = M('area')->where($map)->order('id asc')->select();
        $this->ajaxReturn($data,'JSON');
    }

}