<?php
namespace extend;
class Redis extends \Redis{
    // 实例
    protected static $_instance = null;
    public static function getInstance(){
        if (null === self::$_instance) {
            self::$_instance = new self();
            $host = $_SERVER['REDIS_HOST'];
            $port = $_SERVER['REDIS_PORT'];
            self::$_instance->connect($host, $port);
        }
        return self::$_instance;
    }
}