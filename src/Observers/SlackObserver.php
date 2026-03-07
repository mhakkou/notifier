<?php

namespace Mhakkou\Notifier\Observers;

use Mhakkou\Notifier\Contracts\ObserverInterface;

class SlackObserver implements ObserverInterface {
    public function update(string $message){
        echo "[SLAC OBSERVER ] - $message \n";
    }
}