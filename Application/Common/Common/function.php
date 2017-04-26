<?php
/**
  * 控制模板中菜单的显示
  * @param rule string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
  * @param uid  int           认证用户的id
  * @param string mode        执行check的模式
  * @param relation string    如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
  * @return boolean           通过验证返回true;失败返回false
 */
function authCheck($rule,$uid,$type=1, $mode='url', $relation='or'){
  $auth=new \Think\Auth();
  //$groups=$auth->getGroups($uid);//获取当前uid所在的角色组id
  return $auth->check($rule,$uid,$type,$mode,$relation)?true:false;
}
function secsToStr($secs,$format="") {
  if($secs>=86400){$days=floor($secs/86400);$secs=$secs%86400;$r=$days.' day';if($days>1){$r.='s';}if($secs>0){$r.=', ';}}
  if($secs>=3600){$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.' hour';if($hours>1){$r.='s';}if($secs>0){$r.=', ';}}
  if($secs>=60){$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.' minute';if($minutes>1){$r.='s';}if($secs>0){$r.=', ';}}
  $r.=$secs.' second';if($secs>1){$r.='s';}
  return $r;
}
function microtime_float(){
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
/**
 * [arrToObj description]
 * @param  [type] $arr [description]
 * @return [type]      [description]
 */
function arrToObj($arr){
  if(!is_array($arr)) return $arr;
  $obj = new stdClass();
  if(is_array($arr) && count($arr)>0){
      foreach ($arr as $k => $v) {
          $k = strtolower(trim($k));
          if(!empty($k)) $obj->$k = arrToObj($v);
      }
      return $obj;
  }else{
    return false;
  }
}
function objToArr($obj) {
  if(!is_object($obj) && !is_array($obj)) return $obj;
  $obj = (array)$obj;
  foreach ($obj as $k => $v) {
      if (gettype($v)=='object' || gettype($v)=='array') $obj[$k] = (array)objToArr($v);
  }
  return $obj;
}
/**
 * utf8字符转换成Unicode字符
 * @param  [type] $str Utf-8字符
 * @return [type]           Unicode字符
 */
function utf8_to_unicode($str) {
    $unicode = 0;
    $unicode = (ord($str[0]) & 0x1F) << 12;
    $unicode |= (ord($str[1]) & 0x3F) << 6;
    $unicode |= (ord($str[2]) & 0x3F);
    return dechex($unicode);
}

/**
 * Unicode字符转换成utf8字符
 * @param  [type] $str Unicode字符
 * @return [type]              Utf-8字符
 */
function unicode_to_utf8($str) {
    $utf8_str = '';
    $code = intval(hexdec($str)); //这里注意转换出来的code一定得是整形，这样才会正确的按位操作
    $ord_1 = decbin(0xe0 | ($code >> 12));
    $ord_2 = decbin(0x80 | (($code >> 6) & 0x3f));
    $ord_3 = decbin(0x80 | ($code & 0x3f));
    $utf8_str = chr(bindec($ord_1)) . chr(bindec($ord_2)) . chr(bindec($ord_3));
    return $utf8_str;
}