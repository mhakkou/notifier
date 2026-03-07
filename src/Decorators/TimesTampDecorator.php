<?php

namespace Mhakkou\Notifier\Decorators;

use Mhakkou\Notifier\Decorators\NotificationDecorator;

class TimesTampDecorator extends NotificationDecorator {
    public function send(string $sender, string $recipient, string $subject, string $message): void
    {
        $this->notification->send($sender, $recipient, $subject, $message);
        echo "\n Sent at " . date('Y-m-d');
    }
}