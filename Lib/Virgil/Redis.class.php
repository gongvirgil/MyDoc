<?php
namespace Lib\Virgil;
class Redis {
    public static $instance;
    public $redis;

    private function __construct(){}
    private function __clone(){}
	/**
	 * [init 初始化Redis]
	 * @param  array  $config [description]
	 * @return [type]         [description]
	 */
    public static function init($config=array()){ 
        if (null === self::$instance){
            self::$instance = new self();
            self::$instance->redis = new \Redis();
	        if(empty($config['server']))  $config['server'] = '127.0.0.1';
	        if(empty($config['port']))  $config['port'] = '6379';
            self::$instance->redis->connect($config['server'], $config['port']); 
        }
        return self::$instance;
    } 
    /**
     * [redis 获取redis对象]
     * @return [type] [description]
     */
    public function redis(){
        return $this->redis;
    }
    /**
     * [flushAll 清空数据]
     * @return [type] [description]
     */
    public function flushAll(){
        return $this->redis->flushAll();
    }
    /**
     * [set 设置值]
     * @param [type]  $key     [description]
     * @param [type]  $value   [description]
     * @param integer $timeOut [生命时间]
     */
    public function set($key, $value, $timeOut=0){
        $value = json_encode($value);
        $result = $this->redis->set($key, $value);
        if($timeOut > 0) $this->redis->setTimeout($key, $timeOut);
        return $result;
    }
    /**
     * [setTimeout 设置生命时间]
     * @param [type] $key     [description]
     * @param [type] $timeOut [description]
     */
    public function setTimeout($key, $timeOut){
        return $this->redis->setTimeout($key, $timeOut);
    }
    /**
     * [get 获取值]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function get($key){
        $result = $this->redis->get($key);
        $value = json_decode($result, true);
        return $value;
    }
    /**
     * [delete 删除一条数据]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function delete($key){
        return $this->redis->delete($key);
    } 
    /**
     * [exists 判断key是否存在]
     * @param  [type] $key [description]
     * @return [type]      [ture/false]
     */
    public function exists($key){
        return $this->redis->exists($key);
    }
    /**
     * [incr 自增]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function incr($key){
        return $this->redis->incr($key);
    }
    /**
     * [decr 自减]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function decr($key){
        return $this->redis->decr($key);
    }  
    /**
     * [keys 获取所有key]
     * @return [type] [description]
     */
    public function keys(){
        return $this->redis->keys('*');
    }
   /**
    * [type 获取value类型]
    * @param  [type] $key [description]
    * @return [type]      [0-none(不存在) 1-string(字符串)  2-set(集合) 3-list(列表) 4-zset(有序集) 5-hash(哈希表)]
    */
    public function type($key){
        return $this->redis->type($key);
    }

    /*******************String相关**********************/

    /*******************Set相关**********************/

    /*******************List相关**********************/

    /**
     * [push 入队列]
     * @param  [type]  $list   [description]
     * @param  [type]  $value [description]
     * @param  boolean $r     [description]
     * @return [type]         [description]
     */
    public function push($list, $value,$r=true){
        return $r ? $this->redis->rPush($list, $value) : $this->redis->lPush($list, $value);
    }
    /**
     * [pop 出队列]
     * @param  [type]  $list [description]
     * @param  boolean $l   [description]
     * @return [type]       [description]
     */
    public function pop($list, $l=true){
        return $l ? $this->redis->lPop($list) : $this->redis->rPop($list);
    }
    /**
     * [move description]
     * @param  [type] $list1 [description]
     * @param  [type] $list2 [description]
     * @return [type]        [description]
     */
    public function move($list1,$list2){
        return $this->redis->rpoplpush($list1,$list2);
    }
    /**
     * [size 获取队列长度]
     * @param  [type] $list [description]
     * @return [type]       [description]
     */
    public function size($list){
        return $this->redis->lsize($list);
    }
    /**
     * [getListMember description]
     * @param  [type]  $list  [description]
     * @param  integer $index [description]
     * @return [type]         [description]
     */
    public function getListMember($list, $index=0){
        return $this->redis->lget($list, $index);
    }
    /**
     * [updateListMember description]
     * @param  [type] $list  [description]
     * @param  [type] $index [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function updateListMember($list, $index, $value){
        return $this->redis->lset($list, $index, $value);
    }
    /**
     * [deleteListMembersByValue description]
     * @param  [type]  $list  [description]
     * @param  [type]  $value [description]
     * @param  integer $count [description]
     * @return [type]         [description]
     */
    public function deleteListMembersByValue($list, $value, $count=0){
        return $this->redis->lrem($list, $value, $count);
    }
    /**
     * [getListRange description]
     * @param  [type]  $list  [description]
     * @param  integer $start [description]
     * @param  integer $end   [description]
     * @return [type]         [description]
     */
    public function getListRange($list, $start=0, $end=-1){
        return $this->redis->lrange($list, $start, $end);
    }


    /*******************Zset相关**********************/

    /*******************Hash相关**********************/

    /**
     * [hashSet 哈希表设置key值]
     * @param  [type]  $hTable      [description]
     * @param  [type]  $hKey        [description]
     * @param  [type]  $hValue      [description]
     * @param  boolean $replaceFlag [description]
     * @return [type]               [description]
     */
    public function hashSet($hTable, $hKey, $hValue, $replaceFlag=false){
        if( $replaceFlag && $this->redis->hExists($hTable, $hKey) ){
            $this->redis->hSet($hTable, $hKey, $hValue);
            return true;
        }
        return $this->redis->hSetNx($hTable, $hKey, $hValue);
    }
    /**
     * [hashGet 哈希表获取key值]
     * @param  [type] $hTable [description]
     * @param  [type] $hKey   [description]
     * @return [type]         [description]
     */
    public function hashGet($hTable, $hKey){
        return $this->redis->hGet($hTable, $hKey);
    }
    /**
     * [hashDel 哈希表删除key]
     * @param  [type] $hTable [description]
     * @param  [type] $hKey   [description]
     * @return [type]         [description]
     */
    public function hashDel($hTable, $hKey){
        return $this->redis->hDel($hTable, $hKey);
    }
    /**
     * [hashExists 哈希表是否存在key]
     * @param  [type] $hTable [description]
     * @param  [type] $hKey   [description]
     * @return [type]         [description]
     */
    public function hashExists($hTable, $hKey){
        return $this->redis->hExists($hTable, $hKey);
    }
    /**
     * [hashMultiSet 哈希表设置多个key值]
     * @param  [type] $hTable [description]
     * @param  [type] $hArray [description]
     * @return [type]         [description]
     */
    public function hashMultiSet($hTable, $hArray){
        return $this->redis->hMSet($hTable, $hArray);
    }
    /**
     * [hashMultiGet 哈希表获取多个key值]
     * @param  [type] $hTable [description]
     * @param  [type] $hArray [description]
     * @return [type]         [description]
     */
    public function hashMultiGet($hTable, $hArray){
        return $this->redis->hMGet($hTable, $hArray);
    }
    /**
     * [hashLength 哈希表key的个数]
     * @param  [type] $hTable [description]
     * @return [type]         [description]
     */
    public function hashLength($hTable){
        return $this->redis->hLen($hTable);
    }
    /**
     * [hashKeys 获取哈希表所有key]
     * @param  [type] $hTable [description]
     * @return [type]         [description]
     */
    public function hashKeys($hTable){
        return $this->redis->hKeys($hTable);
    }
    /**
     * [hashVals 获取哈希表所有value]
     * @param  [type] $hTable [description]
     * @return [type]         [description]
     * 
     */
    public function hashVals($hTable){
        return $this->redis->hVals($hTable);
    }    
    /**
     * [hashArrays 获取哈希表所有key-value]
     * @return [type] [description]
     */
    public function hashArrays($hTable){
        return $this->redis->hGetAll($hTable);
    }
    /**
     * [hashIncByInt 哈希表key自增]
     * @param  [type] $hTable [description]
     * @param  [type] $hKey   [description]
     * @return [type]         [description]
     */
    public function hashIncByInt($hTable, $hKey){
        return $this->redis->hIncrBy($hTable, $hKey);
    }
    /**
     * [hashIncByFloat 哈希表key自增浮点数值]
     * @param  [type] $hTable [description]
     * @param  [type] $hKey   [description]
     * @return [type]         [description]
     */
    public function hashIncByFloat($hTable, $hKey){
        return $this->redis->hIncrByFloat($hTable, $hKey);
    } 
}