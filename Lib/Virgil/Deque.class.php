<?php
namespace Lib\Virgil;
class Deque {
    public $queue = array();
    public static $instance;
    
    private function __construct() {}  // 私有构造函数，避免多次创建对象，导致对象的不唯一
    private function __clone() {}  // 避免克隆（保证单例对象的唯一性）

    public static function getInstance() { 
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * [inL description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function inL($value) {
        return array_push($this->queue, $value);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function outL() {
        return array_pop($this->queue);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function inR($value) {
        return array_unshift($this->queue, $value);
    }
    /**
     * [outR description]
     * @return [type] [description]
     */
    public function outR() {
        return array_shift($this->queue);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function getL() {
        return reset($this->queue);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function getR() {
        return end($this->queue);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function clean() {
        unset($this->queue);
    }
    /**
     * [outL description]
     * @return [type] [description]
     */
    public function length() {
        return count($this->queue);
    }
}

