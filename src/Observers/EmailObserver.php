<?php

namespace Mhakkou\Notifier\Observers;

use Mhakkou\Notifier\Contracts\ObserverInterface;

class EmailObserver implements ObserverInterface{
    public function update(string $message)
    {
        echo "[OBSERVER LOG ] - $message \n"; 
    }
}