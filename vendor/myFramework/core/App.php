<?php

namespace myFramework\core;

class App {
    public static $app;

    public function __construct() {
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}