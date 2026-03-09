<?php

namespace Mhakkou\Notifier\Traits;

trait Loggable{
    public function log(string $logMessage){
        $log = '[LOG] '.$logMessage;
        echo $log;
    }
}