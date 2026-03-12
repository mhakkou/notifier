<?php

namespace Mhakkou\Notifier\Decorators;

use Mhakkou\Notifier\Decorators\NotificationDecorator;

class TimesTampDecorator extends NotificationDecorator {
    public function send(string $sender, ?string $recipient, string $subject, string $message): string
    {
        $this->notification->send($sender, $recipient, $subject, $message);
        return "Sent at " . date('Y-m-d');
    }
}