<?php

namespace Mhakkou\Notifier\Decorators;

use Mhakkou\Notifier\Decorators\NotificationDecorator;

class SenderDecorator extends NotificationDecorator {
    public function send(string $sender, ?string $recipient, string $subject, string $message): string
    {
        $this->notification->send($sender, $recipient, $subject, $message);
        return "Sent by $sender ";
    }
}