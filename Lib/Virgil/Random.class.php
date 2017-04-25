<?php
namespace Lib\Virgil;
class Random {
	/**
	 * [color description]
	 * @return [type] [description]
	 */
	public function color(){
	    $color = '';
	    while(strlen($color)<6){
	        $color .= sprintf("%02X", mt_rand(0, 255));
	    }
	    return '#'.$color;
	}
}