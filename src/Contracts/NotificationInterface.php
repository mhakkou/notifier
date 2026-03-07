<?php

namespace Mhakkou\Notifier\Contracts;


interface NotificationInterface{
    public function send(string $sender, string $recipient, string $subject, string $message):void;
}