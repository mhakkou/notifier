<?php

namespace Mhakkou\Notifier\Traits;

use Mhakkou\Notifier\Enums\LogLevel;

trait Loggable{
    public function log(LogLevel $logLevel, string $logMessage){
        $log = match($logLevel){
            LogLevel::INFO => '[INFO] '.$logMessage,
            LogLevel::WARNING => '[WARNING] '.$logMessage,
            LogLevel::ERROR => '[ERROR] '.$logMessage
        };
        echo $log;
    }
}