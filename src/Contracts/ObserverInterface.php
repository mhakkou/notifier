<?php

namespace Mhakkou\Notifier\Contracts;

interface ObserverInterface {
    public function update(string $message);
}