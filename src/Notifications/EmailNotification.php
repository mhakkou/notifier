<?php

namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;

class EmailNotification extends BaseNotification{

    public function send(string $sender, string $recipient, string $subject, string $message):void
    {
        echo "Message sent to $recipient via Email channel !";
        $this->log($recipient);
    }
}