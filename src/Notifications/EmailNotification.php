<?php

namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Enums\LogLevel;

class EmailNotification extends BaseNotification{

    public function send(string $sender, ?string $recipient, string $subject, string $message):void
    {
        echo "Message sent to $recipient via Email channel !";
        $this->log(logLevel: LogLevel::INFO, logMessage: 'Notification sent');
    }
}