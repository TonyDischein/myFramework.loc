<?php

namespace myFramework\core;

class Registry {
    use TSingleton;

    public static $objects = [];

    protected function __construct() {
        require_once ROOT . '/config/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

    public function __get($name)
    {
        if (is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    public function __set($name, $object)
    {
        if (!isset(self::$objects[$name])) {
            self::$objects[$name] = new $object;
        }
    }

    public function getList() {
        echo "<pre>";
        var_dump(self::$objects);
        echo "</pre>";
    }

    /**
     * Other implementation, used for multilingual
     */

    public static $properties = [];

    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    public function getProperty($name) {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties() {
        return self::$properties;
    }
}