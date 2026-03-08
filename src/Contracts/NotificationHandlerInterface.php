<?php

namespace Mhakkou\Notifier\Contracts;

interface NotificationHandlerInterface{
    public function setNext(NotificationHandlerInterface $handler):NotificationHandlerInterface;

    public function handle(string $priority, string $sender, string $recipient, string $subject, string $message):void;
}