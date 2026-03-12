<?php

namespace Mhakkou\Notifier\Traits;

use Mhakkou\Notifier\Enums\LogLevel;

trait Loggable{
    public function log(LogLevel $logLevel, string $logMessage): string{
        $log = match($logLevel){
            LogLevel::INFO => '[INFO] '.$logMessage,
            LogLevel::WARNING => '[WARNING] '.$logMessage,
            LogLevel::ERROR => '[ERROR] '.$logMessage
        };
        return  $log;
    }
}