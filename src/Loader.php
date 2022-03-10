<?php

namespace xyg\tool;

class Loader
{
    // 创建私有静态的数组保存该类对象组
    private static $instance = [];

    // 防止使用new直接创建对象
    private function __construct() {}

    // 防止使用clone克隆对象
    private function __clone() {}

    // 驱动器句柄
    public static function class($name = '', $isSameParentNamespace = true)
    {
        if ( PHP_VERSION_ID < 70000 ) {
            throw new \Exception('PHP版本要>=7.0.0');
        }
        if ( empty($name) ) {
            throw new \Exception('$name未定义');
        }
        if ( empty( self::$instance[$name] ) ) {
            $isSameParentNamespace ? $class = '\\xyg\\' : $class = '\\';
            $name = substr($name, 0, strrpos($name, '.')) . '.' . ucfirst(substr($name, strrpos($name, '.') + 1));
            $name = str_replace('.', '\\', $name);
            $class = $class . $name;
            if ( !class_exists($class) ) {
                throw new \Exception($class . '.php类库不存在');
            }
            self::$instance[$name] = new $class();
        }
        return self::$instance[$name];
    }

}