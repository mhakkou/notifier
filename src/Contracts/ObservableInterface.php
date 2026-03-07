<?php

namespace Mhakkou\Notifier\Contracts;

use Mhakkou\Notifier\Contracts\ObserverInterface;

interface ObservableInterface{
    public function attach(ObserverInterface $observer);

    public function detach(ObserverInterface $observer);

    public function notify();
}