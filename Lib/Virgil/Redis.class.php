<?php
namespace Lib\Virgil;
class Redis {
    public static $instance;
    public $redis;

    private function __construct() {}
    private function __clone() {}
	/**
	 * [init 初始化Redis]
	 * @param  array  $config [description]
	 * @return [type]         [description]
	 */
    public static function init($config=array()) { 
        if (null === self::$instance) {
            self::$instance = new self();
            self::$instance->redis = new Redis();
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
    public function redis() {  
        return $this->redis;  
    }  
    /**
     * [flushAll 清空数据]
     * @return [type] [description]
     */
    public function flushAll() {  
        return $this->redis->flushAll();  
    }  
    /**
     * [set 设置值]
     * @param [type]  $key     [description]
     * @param [type]  $value   [description]
     * @param integer $timeOut [生命时间]
     */
    public function set($key, $value, $timeOut=0) {  
        $value = json_encode($value, true);  
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
    public function get($key) {  
        $result = $this->redis->get($key);
        $value = json_decode($result, true);
        return $value;
    }  
    /**
     * [delete 删除一条数据]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function delete($key) {  
        return $this->redis->delete($key);  
    } 
    /**
     * [exists 判断key是否存在]
     * @param  [type] $key [description]
     * @return [type]      [ture/false]
     */
    public function exists($key) {  
        return $this->redis->exists($key);  
    }  
    /**
     * [incr 自增]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function incr($key) {  
        return $this->redis->incr($key);  
    }  
    /**
     * [decr 自减]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function decr($key) {  
        return $this->redis->decr($key);  
    }    
    /**
     * [push 入队列]
     * @param  [type]  $key   [description]
     * @param  [type]  $value [description]
     * @param  boolean $r     [description]
     * @return [type]         [description]
     */
    public function push($key, $value,$r=true) {  
        $value = json_encode($value, true);  
        return $r ? $this->redis->rPush($key, $value) : $this->redis->lPush($key, $value);  
    }  
    /**
     * [pop 出队列]
     * @param  [type]  $key [description]
     * @param  boolean $l   [description]
     * @return [type]       [description]
     */
    public function pop($key, $l=true) {  
        $val = $l ? $this->redis->lPop($key) : $this->redis->rPop($key);  
        return json_decode($val, true);
    }  
    /**
     * [keys 获取所有key]
     * @return [type] [description]
     */
    public function keys() {
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
}