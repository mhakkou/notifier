<?php

namespace Mhakkou\Notifier\Observers;

use Mhakkou\Notifier\Contracts\ObserverInterface;


class TelegramObserver implements ObserverInterface{
    public function update(string $message)
    {
        echo "[TELEGRAM OBSERVER] -  $message \n";
    }
}