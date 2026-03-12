<?php

namespace Mhakkou\Notifier\Services;

class NotificationLogger {
    private static $instance;

    private function __construct()
    {}

    private function __clone(){}
    public function __wakeup(){}

    public static function getInstance(){
        self::$instance =  self::$instance ? self::$instance : new NotificationLogger();
        return self::$instance;
    }

    public function log(string $message): string
    {
        return "[SINGLETON LOG] $message";
    }
}