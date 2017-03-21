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
