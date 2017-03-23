<?php
namespace Lib\Virgil;
Class Image1 {
	public $imageUrl;
	public $imageInfo;
	public $newImage;
	public $saveImageUrl;
	public $saveImageInfo;
	public function __construct($imageUrl){
		$this-> imageUrl = $imageUrl;
		$this->get_info();
	}
	private function get_info(){
        /**
         * 处理原图片的信息,先检测图片是否存在,不存在则给出相应的信息
         */
         @$SIZE = getimagesize($this-> imageUrl);
		if(!$SIZE){
			exit($this-> ERROR['unalviable']);
		}
       
         // 得到原图片的信息类型、宽度、高度
			$this-> imageInfo['mime'] = $SIZE['mime'];
			$this-> imageInfo['width'] = $SIZE[0];
			$this-> imageInfo['height'] = $SIZE[1];
       
         // 创建图片
        switch($SIZE[2]){
         case 1:
				$this-> newImage = imagecreatefromgif($this-> imageUrl);
				$this-> imageInfo['type']   = "imagejpeg";
				$this-> imageInfo['ext']    = "jpg";
             break;
         case 2:
				$this-> newImage = imagecreatefromjpeg($this-> imageUrl);
				$this-> imageInfo['type']   = "imagegif";
				$this-> imageInfo['ext']    = "gif";
             break;
         case 3:
				$this-> newImage = imagecreatefrompng($this-> imageUrl);
				$this-> imageInfo['type']   = "imagepng";
				$this-> imageInfo['ext']    = "png";
             break;
             }
       
        /**
         * 文字颜色转换16进制转换成10进制
         */
         preg_match_all("/([0-f]){2,2}/i", $this-> FONT_COLOR, $MATCHES);
         if(count($MATCHES) == 3){
				$this-> imageInfo['color']['RED']   = hexdec($MATCHES[0][0]);
				$this-> imageInfo['color']['GREEN'] = hexdec($MATCHES[0][1]);
				$this-> imageInfo['color']['BLUE']  = hexdec($MATCHES[0][2]);
         }
	}
	public function scaling($param,$type=0){
		switch ($type) {
			case 1:
			$ratio = $param / $this-> imageInfo['width'];
			break;
			
			case 2:
			$ratio = $param / $this-> imageInfo['width'];
				break;
			default:
				# code...
				break;
		}
	}
}