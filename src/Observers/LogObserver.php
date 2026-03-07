<?php

namespace Mhakkou\Notifier\Observers;

use Mhakkou\Notifier\Contracts\ObserverInterface;

class LogObserver implements ObserverInterface{
    public function update(string $message){
        echo "[LOG OBSERVER ] $message \n";
    }

}